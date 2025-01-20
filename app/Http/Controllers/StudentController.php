<?php

namespace App\Http\Controllers;
use DB;
use App\User;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Datatables;
use Yajra\Datatables\Datatables;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $data = array(
    //         'data' => DB::table('students')
    //         ->select('students.*','knowledge_levels.competency','knowledge_levels.name as knowledge_name','users.id as id_user','roles.name as student_type')
    //         ->leftJoin('knowledge_levels','knowledge_levels.id','students.id_knowledge_level')
    //         ->leftJoin('rule_of_bugs','rule_of_bugs.id','students.id_rule_of_bug')
    //         ->leftJoin('users','users.id','students.id_user')
    //         ->leftJoin('roles','roles.id','users.id_role')
    //         ->where('students.deleted_at', NULL)
    //         ->get()
    //     );
    //     dd($data);
    //     return view('student.student')->with($data);
    // }

    public function getIndex()
    {
        return view('student.student');
    }

    public function getIndexResult()
    {
        return view('student.student-result');
    }

    public function anyData() {
        // $data = Datatables::of(User::query())->make(true);
        $model = User::query();

        return Datatables::of(  DB::table('students')
        ->select('students.id_user','students.nis', 'students.name', 'students.class'
        // DB::raw('max(attempt) total_attempt, ROUND(AVG(score),2) as avg_score, 
        // TIME_TO_SEC(AVG(360*HOUR(timer) + 60*MINUTE(timer) + SECOND(timer)) ) as avg_time,
        // CASE
        //     WHEN AVG(score) >= 75 THEN
        //         "GOOD"
        //     ELSE
        //      "POOR"
        // END avg_grade,
        
        // CASE
        //     WHEN AVG(score) >= 75 THEN
        //         "GOOD"
        //     ELSE
        //      "POOR"
        // END avg_competency')
        )
        // ->leftJoin('exercise_commits', 'exercise_commits.id_student','students.id_user')
        // ->leftJoin('students', 'students.id_user','exercise_commits.id_student')
        // ->leftJoin('exercise_results', 'exercise_results.id_exercise_commit', 'exercise_commits.id')
        // ->where('students.id_user', 1)
        // ->groupBy('exercise_commits.id_student')
    )->make(true);
        
        
        // Datatables::of( DB::table('students')
        //         ->select(DB::raw('distinct(students.nis)'),
        //         'students.name', 'students.nis', 'students.class',
        //         'knowledge_levels.competency',
        //         'knowledge_levels.name as knowledge_name',
        //         'roles.name as student_type',
        //         'question_packages.package'
        //         ,'exercise_results.timer', 'exercise_commits.id as exercise'
        //          )
        //         ->leftJoin('exercise_commits', DB::raw('(select max(ec.id) from exercise_commits as ec where ec.id_student = students.id_user)'), 'students.id_user')
        //         ->leftJoin('exercise_results', 'exercise_results.id_exercise_commit', 'exercise_commits.id')
        //         ->leftJoin('knowledge_levels','knowledge_levels.id','students.id_knowledge_level')
        //         ->leftJoin('users','users.id','students.id_user')
        //         ->leftJoin('roles','roles.id','users.id_role')
        //         ->leftJoin('question_packages', 'question_packages.id', 'students.id_question_package')
        //         ->where('students.deleted_at', NULL)
        //         ->get())
        //         ->make(true);
    }

    public function addStudent()
    {
        $data = array(
            'knowledge' => DB::table('knowledge_levels')->get(),
            'student' => DB::table('roles')->whereIn('id', [3,4])->get()
        );
        // dd($data);
        return view('student.student-add')->with($data);
    }

    public function create(Request $request)
    {
        $input = $request->all();
        $user = User::create([
            'username' => $input['nis'],
            'email' => $input['nis'].'@mail.id',
            'password' => bcrypt($input['password']),
            'id_role' => $input['id_role']
        ]);
        $student = Student::create([
            'id_user' => $user->id,
            'nis' => $input['nis'],
            'name' => $input['name'],
            'class' => $input['class'],
            'id_knowledge_level' => $input['id_knowledge_level'],
            'id_rule_of_bug' => 0
        ]);
        return redirect('/student');



    }

    public function editStudent($id)
    {
        $data = array(
            'data' => DB::table('students')
            ->select('students.*','knowledge_levels.competency','knowledge_levels.name as knowledge_name','users.id as id_user')
            ->leftJoin('knowledge_levels','knowledge_levels.id','students.id_knowledge_level')
            ->leftJoin('users','users.id','students.id_user')
            ->leftJoin('question_packages', 'question_packages.id', 'students.id_question_package')
            ->where('students.deleted_at', NULL)
            ->where('users.id', $id)
            ->first(),
            'knowledge' => DB::table('knowledge_levels')->get(),
            'student' => DB::table('roles')->whereIn('id', [3,4])->get()
        );
        return view('student.student-edit')->with($data);
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        $student = Student::where('id_user', $id)->delete();
        return redirect('/student');

    }

    public function update(Request $request, $id) 
    {
        $input = $request->all();
        // dd($input);
        $user = User::find($id);
        // dd($user);
        $student = Student::where('id_user', $id)->first();
        if ($user && $student) {
            $user->id_role = $input['id_role'];
            $user->username = $input['nis'];
            $user->email = $input['nis'].'@mail.id';
            $user->save();

            Student::where('id_user', $id)
            ->update([
                'name' => $input['name'],
                'class' => $input['class'],
                'nis' => $input['nis'],
                'id_knowledge_level' => $input['id_knowledge_level'],
                'id_rule_of_bug' => 0
            ]);
            return redirect('/student');

        }
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $data = array(
            'data' => DB::table('students')
            ->select('students.*','knowledge_levels.competency','knowledge_levels.name as knowledge_name','users.id as id_user','roles.name as type')
            ->leftJoin('knowledge_levels','knowledge_levels.id','students.id_knowledge_level')
            // ->leftJoin('rule_of_bugs','rule_of_bugs.id','students.id_rule_of_bug')
            ->leftJoin('users','users.id','students.id_user')
            ->leftJoin('roles','roles.id','users.id_role')
            ->where('students.deleted_at', NULL)
            ->where('users.id', $id)
            ->first(),
        );
        return view('profile.profile')->with($data);
    }


    public function detailStudent($id) 
    {
        $data = array(
            'data' => $id
        );
        return view('student.student-detail-exercise', $data);

    }

    public function detailExerciseStudent($id) 
    {
        $data = array(
            'data' => $id
        );
        return view('student.detail-exercise', $data);

    }

    public function detailExerciseData($id)
    {
        // query detail exercise per student
        return Datatables::of( DB::table('exercise_commits')
            ->select('exercise_commits.id as id_exercise_commit','students.nis',
            'exercises_per_questions.*',
            DB::raw('CASE
                    WHEN exercises_per_questions.correctness = 0 THEN
                        "SALAH"
                    ELSE
                     "BENAR"
                 END correctness'), 'students.name as student_name','students.class','exercise_commits.attempt', 'question_types.code', 'question_types.name')
            ->leftJoin('exercises_per_questions', 'exercises_per_questions.id_exercise_commit', 'exercise_commits.id')
            ->leftJoin('question_types', 'question_types.id', 'exercises_per_questions.id_question_type')
            ->leftJoin('students', 'students.id_user', 'exercise_commits.id_student')
            ->where('exercises_per_questions.id_exercise_commit', $id)
        )->make(true);
    }

    public function detailStudentData ($id)
    {
        $user = User::find($id);
        if ($user) {
            // query detail student
            $data = Datatables::of( DB::table('students')
                ->select('students.nis',
                'roles.name as role',
                'exercise_commits.id as id_exercise_commit',
                'students.id_user',
                'students.name',
                'students.class', 
                'exercise_commits.attempt',
                'question_packages.package',
                'exercise_results.grade',
                'exercise_results.score',
                'knowledge_levels.competency',
                'misconceptions.code',
                'msc.code as code_ml',
                'exercise_results.timer'
                )
                ->leftJoin('users','users.id','students.id_user')
                ->leftJoin('roles', 'roles.id', 'users.id_role')
                ->leftJoin('exercise_commits', 'exercise_commits.id_student', 'students.id_user')
                ->leftJoin('exercise_results', 'exercise_results.id_exercise_commit', 'exercise_commits.id')
                ->leftJoin('misconceptions', 'misconceptions.id', 'exercise_results.id_misconception')
                ->leftJoin('misconceptions as msc', 'msc.id', 'exercise_results.misconception_ml')
                ->leftJoin('knowledge_levels', 'knowledge_levels.id', 'exercise_results.id_knowledge_level')
                ->leftJoin('question_packages', 'question_packages.id', 'exercise_commits.id_question_package')
                ->where('students.deleted_at', NULL)
                ->where('users.id', $id)
                ->whereNotNull('exercise_results.score')

                ->get())->make(true);
                return $data;
            
            // dd($data);
            // return view('student.student-detail')->with($data);
        } else {
            return redirect('/student');
        }
    }


    public function detailExercise($id) {
        $user = Student::find($id);
        if ($user) {
            $data = Datatables::of( DB::table('exercise_commits')
                ->select('exercise_commits.*', 'question_types.code', 'question_types.name')
                ->leftJoin('question_types', 'question_types.id', 'exercise_commits.id_question_type')
                ->where('exercise_commits.id', 1)
            )->make(true);
        }

    }


    public function overAllStudent() {
        $data = Datatables::of( DB::table('students')
            ->select(DB::raw('COUNT(attempt) total_attempt, ROUND(AVG(score),2) as avg_score, 
            TIME_TO_SEC(AVG(360*HOUR(timer) + 60*MINUTE(timer) + SECOND(timer)) ) as avg_time,
            CASE
                WHEN AVG(score) >= 75 THEN
                    "GOOD"
                ELSE
                 "POOR"
            END avg_grade,
            
            CASE
                WHEN AVG(score) >= 75 THEN
                    "GOOD"
                ELSE
                 "POOR"
            END avg_competency
            '))
            ->leftJoin('exercise_commits', 'exercise_commits.id_student','students.id_user')
            ->leftJoin('exercise_results', 'exercise_results.id_exercise_commit', 'exercise_commits.id')
            ->where('students.id_user', 1)
            ->groupBy('students.id_user')
        )->make(true);
    }


    public function detail ($id) 
    {
        // try {
           

            
            $user = Student::find($id);
            if ($user) {
                
                $data = array(
                    'data' => DB::table('students')
                    ->select('students.*','knowledge_levels.competency','knowledge_levels.name as knowledge_name','users.id as id_user','roles.name as type')
                    ->leftJoin('knowledge_levels','knowledge_levels.id','students.id_knowledge_level')
                    ->leftJoin('rule_of_bugs','rule_of_bugs.id','students.id_rule_of_bug')
                    ->leftJoin('users','users.id','students.id_user')
                    ->leftJoin('roles','roles.id','users.id_role')
                    ->where('students.deleted_at', NULL)
                    ->where('users.id', $id)
                    ->first(),
                );
                return view('profile.profile-student')->with($data);
            } else {
                return redirect('/student');
            }
        // } catch (\Exception $e) {
        //     // report($e);
        //     return view('/student');
        // }

    }


    public function perStudent() {
        return Datatables::of(  DB::table('students')
        ->select('students.id_user','students.nis', 'students.name', 'roles.name as role','students.class',
        'question_packages.package','misconceptions.code', 'knowledge_levels.competency'
        ,
        DB::raw('count(exercise_commits.attempt) total_attempt, ROUND(AVG(exercise_results.score),2) as avg_score, 
        SEC_TO_TIME(SUM(360*HOUR(exercise_results.timer) +  60*MINUTE(exercise_results.timer) + SECOND(exercise_results.timer))) as avg_time,
        CASE
            WHEN AVG(exercise_results.score) >= 75 THEN
                "GOOD"
            ELSE
             "POOR"
        END avg_grade,
        
        CASE
            WHEN AVG(exercise_results.score) >= 75 THEN
                "GOOD"
            ELSE
             "POOR"
        END avg_competency')
        )
        ->leftJoin('knowledge_levels', 'knowledge_levels.id', 'students.id_knowledge_level')
        ->leftJoin('misconceptions', 'misconceptions.id', 'students.id_misconception')
        ->leftJoin('question_packages', 'question_packages.id', 'students.id_question_package')
        ->leftJoin('exercise_commits', 'exercise_commits.id_student','students.id_user')
        // ->leftJoin('students', 'students.id_user','exercise_commits.id_student')
        ->leftJoin('exercise_results', 'exercise_results.id_exercise_commit', 'exercise_commits.id')
        // ->where('students.id_user', 1)
        ->leftJoin('users','users.id','students.id_user')
        ->leftJoin('roles', 'roles.id','users.id_role')
        ->whereNotNull('exercise_results.score')
        ->where('exercise_commits.attempt','!=',0)
        ->groupBy('students.id_user')
        )->make(true);
    }

    public function perExercise(){
        $data = Datatables::of( DB::table('students')
        ->select('students.nis', 
        'roles.name as role',
        'exercise_commits.id as id_exercise_commit',
        'students.id_user',
        'students.name',
        'students.class', 
        'exercise_commits.attempt',
        'question_packages.package',
        'msc.code as code_ml',
        'exercise_results.grade',
        'exercise_results.score',
        'knowledge_levels.competency',
        'misconceptions.code',
        'exercise_results.timer'
        )
        ->leftJoin('users','users.id','students.id_user')
        ->leftJoin('roles', 'roles.id', 'users.id_role')
        ->leftJoin('exercise_commits', 'exercise_commits.id_student', 'students.id_user')
        ->leftJoin('exercise_results', 'exercise_results.id_exercise_commit', 'exercise_commits.id')
        ->leftJoin('misconceptions', 'misconceptions.id', 'exercise_results.id_misconception')
        ->leftJoin('misconceptions as msc', 'msc.id', 'exercise_results.misconception_ml')
        ->leftJoin('knowledge_levels', 'knowledge_levels.id', 'exercise_results.id_knowledge_level')
        ->leftJoin('question_packages', 'question_packages.id', 'exercise_commits.id_question_package')
        ->where('students.deleted_at', NULL)
        ->whereNotNull('exercise_results.score')
        ->get())->make(true);
        // dd($data);
        return $data;
    }

    public function perQuestion(){
        return Datatables::of( DB::table('exercise_commits')
            ->select('students.nis',  
            'exercises_per_questions.*', 
            DB::raw('CASE
                    WHEN exercises_per_questions.correctness = 0 THEN
                        "SALAH"
                    ELSE
                     "BENAR"
                 END correctness'), 
                 'students.name as student_name','students.class',
                 'exercise_commits.attempt', 'question_types.code', 
                 'question_types.name',
                 'question_packages.package'
                 )
            ->leftJoin('exercises_per_questions', 'exercises_per_questions.id_exercise_commit', 'exercise_commits.id')
            ->leftJoin('question_types', 'question_types.id', 'exercises_per_questions.id_question_type')
            ->leftJoin('students', 'students.id_user', 'exercise_commits.id_student')
            ->leftJoin('question_packages', 'question_packages.id', 'exercise_commits.id_question_package')
            ->get()
        )->make(true);
    }
}
