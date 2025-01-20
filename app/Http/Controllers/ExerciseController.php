<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ExerciseCommit;
use App\ExercisePerQuestion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\ML\ConvertionScore;
use App\Services\ML\ExerciseService;

class ExerciseController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ConvertionScore $convertionScore, ExerciseService $exerciseService)
    {
        $this->middleware('auth');
        $this->convertionScore = $convertionScore;
        $this->exerciseService = $exerciseService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('exercise.exercise');
    }

    public function addExercise()
    {
        return view('exercise.exercise-add');
    }

    public function editExercise()
    {
        return view('exercise.exercise-edit');
    }

    public function store (Request $request) {
        $input = $request->all();
        $user = User::create([
            'username' => $input['name'],
            'email' => $input['name'].'@mail.id',
            'password' => bcrypt($input['name']),
            'id_role' => '1'
        ]);
        
        // var_dump($user);
        return $user;
        // dd($data);
    }

    public function storeExerciseCommit (Request $request) {
        $input = $request->all();
        $checkData = DB::table('exercise_commits')
        // ->where('id_question_package', $input['id_question_package'])
        ->where('id_student', $input['id_student'])
        ->orderByDesc('id')
        ->first();
        
        if ($checkData) {
            $lastExercise = $this->exerciseService->lastExercise($input['id_student']);
            $attempt = $checkData->attempt + 1;
            if ($input['id_question_package'] == '4' || $input['id_question_package'] == '5') {
                $attempt = 0;
            }
            $data = ExerciseCommit::create([
                'id_question_package' => $input['id_question_package'],
                'id_student' => $input['id_student'],
                'attempt' => $attempt,
            ]);
            $data->id_last_commit = $lastExercise->id_exercise_commit;
        } else {
            $attempt = 1;
            if ($input['id_question_package'] == '4' || $input['id_question_package'] == '5') {
                $attempt = 0;
            }
            $data = ExerciseCommit::create([
                'id_question_package' => $input['id_question_package'],
                'id_student' => $input['id_student'],
                'attempt' => $attempt,
            ]);
        }
        return response()->json($data);
    }


    public function storeExerciseResult (Request $request) {
        $input = $request->all();
        $id = Auth::user()->id;
        $student = $this->exerciseService->getStudent($id, $input["data"]["id_exercise_commits"]);
        // dd($student);
        for ($l = 1 ; $l <= $input['data']['total_question'] ; $l++) {
            if (sizeof($input['question']['q'.$l]) < 1) {
                return response()->json(['message' => 'Please Fill All Question'], 400);
            }
        }
        $j = 0;
        for ($i = 0; $i < sizeof($input["question"]); $i++) {
            $j = $i + 1;
            $correctness = 0;
            if (sizeof($input['question']['q'.$j]) > 1) {
                $misC = $input["question"]["q".$j]["miscCode"];
                if ($input["question"]["q".$j]["miscCode"] == "true") {
                    $correctness = 1;
                    $misC = null;
                }
                $data = ExercisePerQuestion::create([
                    'id_exercise_commit' => $input["data"]["id_exercise_commits"],
                    'id_question_type'=> $input["question"]["q".$j]["qCode"],
                    'correctness' => $correctness,
                    'misconceptions' => $misC,
                    'timer' => $input["question"]["q".$j]["timeQ"]
                ]);
            }
        }

        $checkTrueAnswer = DB::table('exercises_per_questions')
        ->where('id_exercise_commit',$input["data"]["id_exercise_commits"] ) 
        ->where('correctness', 1)
        ->count();
        $score = $checkTrueAnswer * 10;
        $grade = $this->convertionScore->convertScore($score, $student->id_question_package);
        // dd($grade);

        $ml = $this->exerciseService->initialProbKnowledgeLevel($id, $grade, $input["data"]["id_last_commit"]);
        // dd($ml);
        $getMisconcep = $this->exerciseService->getMisconception($input["data"]["id_exercise_commits"]);
        $conclusionMisconcep = $this->exerciseService->conclusionMisconcep($getMisconcep);
        // dd($conclusionMisconcep);
        $paramExerciseResult = new \stdClass();
        $paramExerciseResult->id_exercise_commit = $input["data"]["id_exercise_commits"];
        $paramExerciseResult->score = $score;
        $paramExerciseResult->grade = $grade;
        $paramExerciseResult->id_knowledge_level = $ml->id_knowledge_level;
        $paramExerciseResult->id_misconception = $conclusionMisconcep;
        $paramExerciseResult->timer = $input['data']['timer'];
        $paramExerciseResult->misconception_ml = $ml->il;

        $result = new \stdClass();
        if ($ml) {
            $saveExerciseResult = $this->exerciseService->insertExerciseResult($paramExerciseResult);
            $result->score = $score;
            $result->grade = $grade;
            $result->name = $student->name;
            $result->attempt = $student->attempt;
            $result->id_question_package = $student->id_question_package;
            $result->id_misconception = $ml->il;
            $result->competency = $saveExerciseResult->id_knowledge_level;
            return response()->json($result);
        } else {
            $result->score = "";
            $result->grade = "";
            return response()->json($result);

        }

    }
}
