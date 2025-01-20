<?php

namespace App\Http\Controllers;

use DB;
use App\Services\Math\MathService;
use App\Services\Math\SameBaseService;
use App\User;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MathController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MathService $mathService, SameBaseService $sameBaseService)
    {
        $this->middleware('auth');
        $this->mathService = $mathService;
        $this->sameBaseService = $sameBaseService;
    }

    

    public function alphabetbaseQuestion($type)
    {
        $alp_rnd = array('p', 'q', 'r', 's');
        shuffle($alp_rnd);
        $alp1 = $alp_rnd[0];
        $alp2 = $alp_rnd[1];
        while (in_array($pn1 = mt_rand(-5, 5), array(0, 1)));
        while (in_array($pn2 = mt_rand(-5, 5), array(0, 1)));
        while (in_array($pn3 = mt_rand(-5, 5), array(0, 1)));
        while (in_array($pn4 = mt_rand(-5, 5), array(0, 1)));
        while (in_array($pn5 = mt_rand(-5, 5), array(0, 1)));
        while (in_array($pn6 = mt_rand(-5, 5), array(0, 1)));
        $var = 'alp';
        $param = new \stdClass();

        if ($type == 14) {

            $param->alp1 = $alp1;
            $param->alp2 = $alp2;
            $param->pn1 = $pn1;
            $param->pn2 = $pn2;
            $param->pn3 = $pn3;
            $param->pn4 = $pn4;
            $param->pn5 = $pn5;
            $param->pn6 = $pn6;
            $qCode = $type;

            $question = $this->mathService->createQuestion14($param);
            $message = "Sederhanakan bentuk eksponen dibawah ini";
            $answer1 = $this->mathService->alpCombRule($param);
            $answer2 = $this->mathService->alpCombMCRule($param);
            $answer3 = $this->mathService->alpCombMCRule2($param);
            $answer4 = $this->mathService->alpCombMCRule3($param);
            $answer5 = $this->mathService->alpCombMCRule4($param);
            $answer1->code = "true";
            $answer2->code = "PR,PPR";
            $answer3->code = "PR,QR";
            $answer4->code = "PR,QR,PPR";
            $answer5->code = "PR,QR,PPR";
        } elseif ($type == 15) {

            $param->alp1 = $alp1;
            $param->alp2 = $alp2;
            $param->pn1 = $pn1;
            $param->pn2 = $pn2;
            $param->pn3 = $pn6;
            $param->pn4 = $pn4;
            $param->pn5 = $pn5;
            $param->pn6 = $pn6;
            // $qCode = "EPR2B";
            $qCode = $type;


            $question = $this->mathService->createQuestion15($param);
            $message = "Sederhanakan bentuk eksponen dibawah ini";
            $answer1 = $this->mathService->alpCombRule($param);
            $answer2 = $this->mathService->alpCombMCRule($param);
            $answer3 = $this->mathService->alpCombMCRule2($param);
            $answer4 = $this->mathService->alpCombMCRule3($param);
            $answer5 = $this->mathService->alpCombMCRule4($param);
            $answer1->code = "true";
            $answer2->code = "PR,PPR";
            $answer3->code = "PR,QR";
            $answer4->code = "PR,QR,PPR";
            $answer5->code = "PR,QR,PPR";

            // $alp_rnd = array(1, 2, 3);
            // $alp_rnd2 = array('p', 'q', 'r', 's');
            // shuffle($alp_rnd);
            // shuffle($alp_rnd2);
            // $alp = $alp_rnd[0];
            // $alpb = $alp_rnd[1];
            // $alp1 = pow(2, $alp);
            // $alp1b = pow(2, $alpb);
            // $alp2 = $alp_rnd2[0];
            // $alp2b = $alp_rnd2[1];
            // // while(in_array(($pn1 = mt_rand(-3, 3)), array(0, 1)));
            // $pn1 = null; //pangkatnya diganti alp / alpb
            // while(in_array(($pn2 = mt_rand(-3, 3)), array(0, 1)));
            // while(in_array(($pn3 = mt_rand(-3, 3)), array(0, 1)));
            // // while(in_array(($pn4 = mt_rand(-3, 3)), array(0, 1)));
            // $pn4 = null; //pangkatnya diganti alp / alpb
            // while(in_array(($pn5 = mt_rand(-3, 3)), array(0, 1)));
            // while(in_array(($pn6 = mt_rand(-3, 3)), array(0, 1)));

            // $subType = array("a", "b");
            // $shuffType = array_rand($subType);
            // $param = new \stdClass();
            // $param->alp = $alp;
            // $param->alp1 = $alp1;
            // $param->alp2 = $alp2;
            // $param->alpb = $alpb;
            // $param->alp1b = $alp1b;
            // $param->alp2b = $alp2b;
            // $param->pn1 = $pn1;
            // $param->pn2 = $pn2;
            // $param->pn3 = $pn3;
            // $param->pn4 = $pn4;
            // $param->pn5 = $pn5;
            // $param->pn6 = $pn6;
            // $param->subType = $subType[$shuffType];
            // $question = $this->mathService->createQuestion11($param);
            // if ($subType[$shuffType] == 'b') {
            //     $param->pn3 = $pn6;
            // }
            // $answer1 = $this->mathService->alpNumRule($param);
            // $answer2 = $this->mathService->alpNumMCRule($param);
            // $answer3 = $this->mathService->alpNumMCRule2($param);
            // $answer4 = $this->mathService->alpNumMCRule3($param);
            // $answer5 = $this->mathService->alpNumMCRule4($param);
            // $answer1->code = "true";
            // $answer2->code = "EPR3,PR,PPR";
            // $answer3->code = "EPR3,PR,QR";
            // $answer4->code = "EPR3";
            // $answer5->code = "EPR3,PR,PPR";
        }
        $result = array(
            "question" => array( $message, $question),
            "answer" => array($answer1, $answer2, $answer3, $answer4, $answer5),
            "qCode" => $qCode
        );
        shuffle($result["answer"]);
        return $result;
    }

    public function alphabetbaseQuestion2($type)
    {
        $alp_rnd = array(1, 2, 3);
		$alp_rnd2 = array('p', 'q', 'r', 's');
		$alp_pn = array(-2, 3, 4, 5);
		shuffle($alp_rnd);
		shuffle($alp_rnd2);
		shuffle($alp_pn);
		$alp = $alp_rnd[0];
		$alpb = $alp_rnd[1];
		$alp1 = pow(2, $alp);
		$alp1b = pow(2, $alpb);
		$alp2 = $alp_rnd2[0];
		$alp2b = $alp_rnd2[1];

        $pn1 = 1; //pangkatnya diganti alp / alpb
		$pn2 = $alp_pn[0];
		$pn3 = $alp_pn[1];
		$pn4 = 1; //pangkatnya diganti alp / alpb
		$pn5 = $alp_pn[2];
		$pn6 = $alp_pn[3];
		$pn7 = 1;
        $pn8 = 2;

        $param = new \stdClass();
        $param->alp1 = $alp1;
        $param->alp1b = $alp1b;

        $param->alp = $alp;
        $param->alpb = $alpb;
        $param->alp2 = $alp2;
        $param->alp2b = $alp2b;
        $param->pn1 = $pn1;
        $param->pn2 = $pn2;
        $param->pn3 = $pn3;
        $param->pn4 = $pn4;
        $param->pn5 = $pn5;
        $param->pn6 = $pn6;
        $param->pn7 = $pn7;
        $param->pn8 = $pn8;
        
        if ($type == 16) {
            // $qCode = "EPR3-FR";
            $qCode = $type;


            $question = $this->mathService->createQuestion16($param);
            $message = "Sederhanakan bentuk eksponen dibawah ini";
            $answer1 = $this->mathService->alpNumRule($param);
            $answer2 = $this->mathService->alpNumMCRule($param);
            $answer3 = $this->mathService->alpNumMCRule2($param);
            $answer4 = $this->mathService->alpNumMCRule3($param);
            $answer5 = $this->mathService->alpNumMCRule4($param);
        } elseif ($type == 17) {
            // $qCode = "EPR3B-FR";
            $qCode = $type;


            $question = $this->mathService->createQuestion17($param);
            $message = "Sederhanakan bentuk eksponen dibawah ini";
            $param->pn3 = $pn6;
            $param->pn7 = $pn8;
            $param->pn8 = $pn7;
            $answer1 = $this->mathService->alpNumRule($param);
            $answer2 = $this->mathService->alpNumMCRule($param);
            $answer3 = $this->mathService->alpNumMCRule2($param);
            $answer4 = $this->mathService->alpNumMCRule3($param);
            $answer5 = $this->mathService->alpNumMCRule4($param);
        }
        $answer1->code = "true";
        $answer2->code = "PR,PPR";
        $answer3->code = "PR,QR";
        $answer4->code = "PPR";
        $answer5->code = "PPR";
        $result = array(
            "qCode" => $qCode,

            "question" => array( $message, $question),
            "answer" => array($answer1, $answer2, $answer3, $answer4, $answer5)
        );
        shuffle($result["answer"]);
        return $result;
    }

    public function sameBase($type)
    {
        // idenPowerQuestion

        $bil = mt_rand(2, 5); /* random 2,5 */
        while (
            in_array($pn = mt_rand(-5, 5), array(-1, 1))
        ); /* random -5 sampai 5, tp tidak boleh mengandung nilai -1, 0, 1 */

        //random alphanumerik
        $bil1 = array('p', 'q', 'r', '3', '5', '6', '7');
        $bil1 = $bil1[array_rand($bil1)];
        if ($bil1 == 'p' || $bil1 == 'q' || $bil1 == 'r') {
            $var = 'alp';
        } else {
            $var = 'int';
        }

		$pn_r = array(-6, -5, -4, -3, -2, -1, 3, 4, 5, 6);
        shuffle($pn_r);
        $pn1 = $pn_r[0];
		$pn2 = $pn_r[1];
		$pn3 = $pn_r[2];
		$pn4 = $pn_r[3];
		$pn5 = $pn_r[4];
		$pn6 = $pn_r[5];
        
        $param = new \stdClass();
        // $param->bil = $bil;
        // $param->pn = $pn;
        // $param->pn1 = $pn1;
        // $param->pn2 = $pn2;
        // $param->pn3 = $pn3;
        // $param->pn4 = $pn4;
        // $param->pn5 = $pn5;
        // $param->pn6 = $pn6;
        // $param->var = $var;

        if ($type == 1) {
            /* tipe soal satu */
            $param->bil = $bil;
            $param->pn = $pn;
            // $qCode = "PC";
            $qCode = $type;


            $question = $this->mathService->createQuestion1($param);
            $message = "";
            $answer1 = $this->mathService->powerIden($param);
            $answer2 = $this->mathService->powerIdenMC($param);
            $answer3 = $this->mathService->powerIdenMC2($param);
            $answer4 = $this->mathService->powerIdenMC3($param);
            $answer5 = $this->mathService->powerIdenMC4($param);

            $answer1->code = "true";
            $answer2->code = "PC";
            $answer3->code = "PC";
            $answer4->code = "PC";
            $answer5->code = "PC";
        } elseif ($type == 2) {
            /* tipe soal dua */
            $param->bil1 = $bil1;
            $param->pn1 = $pn1;
            $param->pn2 = $pn2;
            $param->var = $var;
            // $qCode = "PR";
            $qCode = $type;


            $question = $this->mathService->createQuestion2($param);
            $message = "Sederhanakan bentuk eksponen dibawah ini";
            $answer1 = $this->mathService->productRule($param);
            $answer2 = $this->mathService->quotientRule($param);
            $answer3 = $this->mathService->powerRule($param);
            $answer4 = $this->mathService->productMCRule($param);
            $answer5 = $this->mathService->productMCRule3($param);

            $answer1->code = "true";
            $answer2->code = "PR,QR";
            $answer3->code = "PR,PPR";
            $answer4->code = "PR";
            $answer5->code = "PR";
        } elseif ($type == 3) {
            /* tipe soal tiga */
            $param->bil1 = $bil1;
            $param->pn1 = $pn1;
            $param->pn2 = $pn2;
            $param->var = $var;
            // $qCode = "QR";
            $qCode = $type;


            $question = $this->mathService->createQuestion3($param);
            $message = "Sederhanakan bentuk eksponen dibawah ini";
            $answer1 = $this->mathService->quotientRule($param);
            $answer2 = $this->mathService->productRule($param);
            $answer3 = $this->mathService->powerRule($param);
            $answer4 = $this->mathService->quotientMCRule2($param);
            $answer5 = $this->mathService->quotientMCRule3($param);

            $answer1->code = "true";
            $answer2->code = "PR,QR";
            $answer3->code = "QR,PPR";
            $answer4->code = "QR";
            $answer5->code = "QR";
        } elseif ($type == 4) {
            /* tipe soal empat */
            $param->bil1 = $bil1;
            $param->pn1 = $pn1;
            $param->pn2 = $pn2;
            $param->var = $var;
            // $qCode = "PPR";
            $qCode = $type;


            $question = $this->mathService->createQuestion4($param);
            $message = "Sederhanakan bentuk eksponen dibawah ini";
            $answer1 = $this->mathService->powerRule($param);
            $answer2 = $this->mathService->quotientRule($param);
            $answer3 = $this->mathService->productRule($param);
            $answer4 = $this->mathService->powerMCRule($param);
            $answer5 = $this->mathService->powerMCRule2($param);

            $answer1->code = "true";
            $answer2->code = "QR,PPR";
            $answer3->code = "PR,PPR";
            $answer4->code = "PPR";
            $answer5->code = "PPR";
        } elseif ($type == 5) {
            /* tipe soal lima */
            $param->bil1 = $bil1;
            $param->pn1 = $pn1;
            $param->pn2 = $pn2;
            $param->pn3 = $pn3;
            $param->var = $var;
            // $qCode = "COR2-PRQR";
            $qCode = $type;


            $question = $this->mathService->createQuestion5($param);
            $message = "Sederhanakan bentuk eksponen dibawah ini";
            $answer1 = $this->mathService->proqueRule($param);
            $answer2 = $this->mathService->proproRule($param);
            $answer3 = $this->mathService->powproRule($param);
            $answer4 = $this->mathService->powqueRule($param);
            $answer5 = $this->mathService->powpowRule($param);

            $answer1->code = "true";
            $answer2->code = "PR,QR ";
            $answer3->code = "PR,QR,PPR ";
            $answer4->code = "PR,PPR ";
            $answer5->code = "PR,QR,PPR";
        } elseif ($type == 6) {
            /* tipe soal enam */
            $param->bil1 = $bil1;
            $param->pn1 = $pn1;
            $param->pn2 = $pn2;
            $param->pn3 = $pn3;
            $param->var = $var;
            // $qCode = "COR2-PPRPR";
            $qCode = $type;


            $question = $this->mathService->createQuestion6($param);
            $message = "Sederhanakan bentuk eksponen dibawah ini";
            $answer1 = $this->mathService->powproRule($param);
            $answer2 = $this->mathService->proqueRule($param);
            $answer3 = $this->mathService->proproRule($param);
            $answer4 = $this->mathService->powqueRule($param);
            $answer5 = $this->mathService->powpowRule($param);

            $answer1->code = "true";
            $answer2->code = "PR,QR,PPR";
            $answer3->code = "PR,PPR ";
            $answer4->code = "PR,QR";
            $answer5->code = "PR,PPR";
            
        } elseif ($type == 7) {
            /* tipe soal tujuh */
            $param->bil1 = $bil1;
            $param->pn1 = $pn1;
            $param->pn2 = $pn2;
            $param->pn3 = $pn3;
            $param->var = $var;
            // $qCode = "COR2-PPRQR";
            $qCode = $type;


            $question = $this->mathService->createQuestion7($param);
            $message = "Sederhanakan bentuk eksponen dibawah ini";
            $answer1 = $this->mathService->powqueRule($param);
            $answer2 = $this->mathService->proqueRule($param);
            $answer3 = $this->mathService->powproRule($param);
            $answer4 = $this->mathService->proproRule($param);
            $answer5 = $this->mathService->powpowRule($param);

            $answer1->code = "true";
            $answer2->code = "PR,PPR";
            $answer3->code = "PR,QR";
            $answer4->code = "PR,QR,PPR";
            $answer5->code = "PR,QR,PPR";

        } 
        // elseif ($type == 8) {
        //     /* tipe soal delapan */
        //     $subType = array('a','b','c','d');
        //     shuffle($subType);
        //     if($var=='int'){
        //         //variablenya harus alphabet
        //         $bil1 = array('p', 'q', 'r');
        //         $bil1 = $bil1[array_rand($bil1)];
        //         $param->bil1 = $bil1;
        //     }
        //     $question = $this->mathService->createQuestion8($param, $subType);
        //     if ($subType[0] == 'a') {
        //         $answer1 = $this->mathService->combinationRule($param);
        //         $answer2 = $this->mathService->combinationMCRule($param);
        //         $answer3 = $this->mathService->combinationMCRule2($param);
        //         $answer4 = $this->mathService->combinationMCRule3($param);
        //         $answer5 = $this->mathService->combinationMCRule4($param);
                
        //     } elseif ($subType[0] == 'b') {
        //         $answer1 = $this->mathService->combination2Rule($param);
        //         $answer2 = $this->mathService->combination2MCRule($param);
        //         $answer3 = $this->mathService->combination2MCRule2($param);
        //         $answer4 = $this->mathService->combination2MCRule3($param);
        //         $answer5 = $this->mathService->combination2MCRule4($param);
        //     } elseif ($subType[0] == 'c') {
        //         $answer1 = $this->mathService->combination3Rule($param);
        //         $answer2 = $this->mathService->combination3MCRule($param);
        //         $answer3 = $this->mathService->combination3MCRule2($param);
        //         $answer4 = $this->mathService->combination3MCRule3($param);
        //         $answer5 = $this->mathService->combination3MCRule4($param);
        //     } elseif ($subType[0] == 'd') {
        //         $answer1 = $this->mathService->combination4Rule($param);
        //         $answer2 = $this->mathService->combination4MCRule($param);
        //         $answer3 = $this->mathService->combination4MCRule2($param);
        //         $answer4 = $this->mathService->combination4MCRule3($param);
        //         $answer5 = $this->mathService->combination4MCRule4($param);
        //     }

        //     $answer1->code = "true";
        //     $answer2->code = "CoR,QR";
        //     $answer3->code = "CoR,PR";
        //     $answer4->code = "CoR,PPR";
        //     $answer5->code = "CoR,QR,PR,PPR";
            
        // }
        // dd($question);
        $result = array(
            "qCode" => $qCode,

            "question" => array( $message, $question),
            "answer" => array($answer1, $answer2, $answer3, $answer4, $answer5)
        );
        shuffle($result["answer"]);
        return $result;
        // return view('exercise.exercise')->with($result);
    }


    public function sameBase2 ($type) 
    {
        //random alphanumerik
		$bil1 = array('p', 'q', 'r', '3', '5', '6', '7');
		$bil1 = $bil1[array_rand($bil1)];
		if($bil1 == 'p' || $bil1 == 'q' || $bil1 == 'r'){
			$var = 'alp';
		}else{
			$var = 'int';
        }
        
        $pn_r = array(-5, -3, -1, 2, 3, 4, 5);
		shuffle($pn_r);
		//nilai pangkat-pangkatnya tidak akan sama
		$pn1 = $pn_r[0];
		$pn2 = $pn_r[1];
		$pn3 = $pn_r[2];
		$pn4 = $pn_r[3];
		$pn5 = $pn_r[4];
		$pn6 = $pn_r[5];
		//pangkat spesial
		$pns = array(-4, -2, 2, 6, 8);
		shuffle($pns);
		$pns1 = $pns[0];
		$pns1b = $pns[1];
		$pns1c = $pns[2];
		$pns1d = $pns[3];
		$pns1e = $pns[4];
		$pns2 = 2;
		while(in_array(($pns3 = mt_rand(-3, 3)), array(0, 1, 2)));
		$pns4b = array('x', 'y', 'z');
        $pns4 = $pns4b[array_rand($pns4b)];
        
        $param = new \stdClass();
        if($var=='int'){
            //variablenya harus alphabet
            $bil1 = array('p', 'q', 'r');
            $bil1 = $bil1[array_rand($bil1)];
        }
        if ($type == 8) {
            $param->bil1 = $bil1;
            $param->pn1 = $pn1;
            $param->pn2 = $pn2;
            $param->pn3 = $pn3;
            $param->pn4 = $pn4;
            // $param->pn5 = $pn5;
            // $param->pn6 = $pn6;
            // $qCode = "COR3";
            $qCode = $type;


            $question = $this->mathService->createQuestion8a($param);
            $message = "Sederhanakan bentuk eksponen dibawah ini";
            $answer1 = $this->mathService->combinationRule($param);
            $answer2 = $this->mathService->combinationMCRule($param);
            $answer3 = $this->mathService->combinationMCRule2($param);
            $answer4 = $this->mathService->combinationMCRule3($param);
            $answer5 = $this->mathService->combinationMCRule4($param);
            $answer1->code = "true";
            $answer2->code = "QR";
            $answer3->code = "PR";
            $answer4->code = "PPR";
            $answer5->code = "QR,PR,PPR";
        } elseif ($type == 9) {
            $param->bil1 = $bil1;
            $param->pn1 = $pn1;
            $param->pn2 = $pn2;
            $param->pn3 = $pn3;
            $param->pn4 = $pns2;
            $param->pn5 = $pn5;
            $param->pn6 = $pn6;
            // $qCode = "COR3-RR";
            $qCode = $type;


            $question = $this->mathService->createQuestion8b($param);
            $message = "Sederhanakan bentuk eksponen dibawah ini";
            $answer1 = $this->mathService->combination2Rule($param);
            $answer2 = $this->mathService->combination2MCRule($param);
            $answer3 = $this->mathService->combination2MCRule2($param);
            $answer4 = $this->mathService->combination2MCRule3($param);
            $answer5 = $this->mathService->combination2MCRule4($param);
            $answer1->code = "true";
            $answer2->code = "QR";
            $answer3->code = "RR";
            $answer4->code = "PPR,RR";
            $answer5->code = "QR,PR,PPR";
        } elseif ($type == 10) {
            $param->bil1 = $bil1;            
            $param->pn1 = $pns4;
            $param->pn2 = $pns1;
            $param->pn3 = $pns1b;
            $param->pn4 = $pns1c;
            $param->pn5 = $pns1d;
            $param->pn6 = $pns1e;
            // $qCode = "COR3-V";
            $qCode = $type;


            $question = $this->mathService->createQuestion8c($param);
            $message = "Nilai dari pangkat huruf dibawah ini adalah";     
            $answer1 = $this->mathService->combination3Rule($param);
            $answer2 = $this->mathService->combination3MCRule($param);
            $answer3 = $this->mathService->combination3MCRule2($param);
            $answer4 = $this->mathService->combination3MCRule3($param);
            $answer5 = $this->mathService->combination3MCRule4($param);
            $answer1->code = "true";
            $answer2->code = "QR";
            $answer3->code = "PR";
            $answer4->code = "PPR";
            $answer5->code = "PR,QR,PPR";
        } elseif ($type == 11) {
            $param->bil1 = $bil1;                        
            $param->pn1 = $pn1;
            $param->pn2 = $pns3;
            $param->pn3 = $pn3;
            $param->pn4 = $pn4;
            $param->pn5 = $pn5;
            $param->pn6 = $pn6;
            // $qCode = "COR3-FR";
            $qCode = $type;


            $question = $this->mathService->createQuestion8d($param);
            $message = "Sederhanakan bentuk eksponen dibawah ini";
            $answer1 = $this->mathService->combination4Rule($param);
            $answer2 = $this->mathService->combination4MCRule($param);
            $answer3 = $this->mathService->combination4MCRule2($param);
            $answer4 = $this->mathService->combination4MCRule3($param);
            $answer5 = $this->mathService->combination4MCRule4($param);
            $answer1->code = "true";
            $answer2->code = "QR";
            $answer3->code = "FR";
            $answer4->code = "PR,PPR,FR";
            $answer5->code = "PR,PPR";
        }
      
        $result = array(
            "qCode" => $qCode,

            "question" => array( $message, $question),
            "answer" => array($answer1, $answer2, $answer3, $answer4, $answer5)
        );
        shuffle($result["answer"]);
        return $result;
    }

    /*public function diffbaseQuestion($type)
    {
        $bil_r = array(2, 3, 5);
        shuffle($bil_r);
        $bil1 = $bil_r[0];
        $bil2 = $bil_r[1];

        $pn1 = mt_rand(-2, 3);
        $pn2 = mt_rand(-2, 3);
        while (in_array($pn3 = mt_rand(-2, 3), array(0, 1)));

        $opr = array("*", "/");
        $randOpr = array_rand($opr);
        $param = new \stdClass();
        $param->bil1 = $bil1;
        $param->bil2 = $bil2;
        $param->pn1 = $pn1;
        $param->pn2 = $pn2;
        $param->pn3 = $pn3;
        $param->opr = $opr[$randOpr];

        if ($type == 11) {
            // $qCode = "A";
            $qCode = $type;


            $question = $this->mathService->createQuestion9($param);
            $message = "Sederhanakan bentuk eksponen dibawah ini";   
            $answer1 = $this->mathService->expandedRule($param);
            $answer2 = $this->mathService->expandedMCRule($param);
            $answer3 = $this->mathService->expandedMCRule2($param);
            $answer4 = $this->mathService->expandedMCRule3($param);
            $answer5 = $this->mathService->expandedMCRule4($param);
            // $answer6 = $this->mathService->expandedMCRule5($param);
            $answer1->code = "true";
            $answer2->code = "QR";
            $answer3->code = "FR";
            $answer4->code = "PR,PPR,FR";
            $answer5->code = "PR,PPR";
            // $answer7 = $this->mathService->expandedMCRule6($param);
        }

        $result = array(
            "qCode" => $qCode,

            "question" => array( $message, $question),
            "answer" => array(
                $answer1,
                $answer2,
                $answer3,
                $answer4,
                $answer5,
            )
            // "answer1" => $answer1,
            // "answer2" => $answer2,
            // "answer3" => $answer3,
            // "answer4" => $answer4,
        );
        shuffle($result["answer"]);
        return $result;
        // return view('exercise.exercise')->with($result);
    }*/

    public function commaBase($type)
    {
        // function commabase(){
            while(in_array(($num = mt_rand(2, 7)), array(4)));
            $pcomr = array(1, 2, 3);
            shuffle($pcomr);
            $pcom = $pcomr[0];
            $pcom2 = $pcomr[1];
            $com = pow(10, $pcom);
            $com2 = pow(10, $pcom2);
            $pns = array(-3, -2, -1, 4, 5);
            shuffle($pns);
            $pn = $pns[0];
            $pn2 = $pns[1];
        // }

        // function commabaseQuestion(){
            $bil_com = $com;
            $bil = $num/(int)$bil_com;
        // }

        // function commabase2Question(){
            $bil_com2 = $com2;
            $bil2 = $num/(int)$bil_com2;
        // }

        $param = new \stdClass();
        $param->bil = $bil;
        $param->bil2 = $bil2;
        $param->pn = $pn;
        $param->pn2 = $pn2;
        $param->num = $num;
        $param->bil_com = $bil_com;
        $param->bil_com2 = $bil_com2;
        $param->pcom = $pcom;
        $param->pcom2 = $pcom2;

        if ($type == 18) {
            // $qCode = "CC";
            $qCode = $type;


            $question = $this->mathService->createQuestion18($param);
            $message = "Ubahlah bentuk eksponen dibawah ini kedalam bentuk lain";
            $answer1 = $this->mathService->commaRule($param);
            $answer2 = $this->mathService->commaMCRule($param);
            $answer3 = $this->mathService->commaMCRule2($param);
            $answer4 = $this->mathService->commaMCRule3($param);
            $answer5 = $this->mathService->commaMCRule4($param);
            $answer1->code = "true";
            $answer2->code = "CC";
            $answer3->code = "CC";
            $answer4->code = "CC";
            $answer5->code = "CC";
        } elseif ($type == 19) {
            // $qCode = "CC2-QR";
            $qCode = $type;


            $question = $this->mathService->createQuestion19($param);
            $message = "Ubahlah bentuk eksponen dibawah ini kedalam bentuk lain";
            $answer1 = $this->mathService->qCommaRule($param);
            $answer2 = $this->mathService->qCommaMCRule($param);
            $answer3 = $this->mathService->qCommaMCRule2($param);
            $answer4 = $this->mathService->pCommaRule($param);
            $answer5 = $this->mathService->powCommaRule($param);
            $answer1->code = "true";
            $answer2->code = "QR";
            $answer3->code = "QR";
            $answer4->code = "PR,QR";
            $answer5->code = "QR,PPR";
        } elseif ($type == 20) {
            // $qCode = "CC2-PR";
            $qCode = $type;


            $question = $this->mathService->createQuestion20($param);
            $message = "Ubahlah bentuk eksponen dibawah ini kedalam bentuk lain";
            $answer1 = $this->mathService->pCommaRule($param);
            $answer2 = $this->mathService->pCommaMCRule($param);
            $answer3 = $this->mathService->pCommaMCRule2($param);
            $answer4 = $this->mathService->qCommaRule($param);
            $answer5 = $this->mathService->powCommaRule($param);
            $answer1->code = "true";
            $answer2->code = "PR";
            $answer3->code = "PR";
            $answer4->code = "PR,QR";
            $answer5->code = "PR,PPR";
        } elseif ($type == 21) {
            // $qCode = "CC2-PPR";
            $qCode = $type;


            $question = $this->mathService->createQuestion21($param);
            $message = "Ubahlah bentuk eksponen dibawah ini kedalam bentuk lain";
            $answer1 = $this->mathService->powCommaRule($param);
            $answer2 = $this->mathService->powCommaMCRule($param);
            $answer3 = $this->mathService->powCommaMCRule2($param);
            $answer4 = $this->mathService->pCommaRule($param);
            $answer5 = $this->mathService->qCommaRule($param);
            $answer1->code = "true";
            $answer2->code = "PPR";
            $answer3->code = "PPR";
            $answer4->code = "PR,PPR";
            $answer5->code = "QR,PPR";
        }

        $result = array(
            "qCode" => $qCode,

            "question" => array( $message, $question),
            "answer" => array($answer1, $answer2, $answer3, $answer4, $answer5)
        );
        shuffle($result["answer"]);
        return $result;
    }

    public function rootsBase1($type) 
    {
        // function alpFracPowQuestion(){
        $bil1 = array('a', 'b', 'c');
        $bil1 = $bil1[array_rand($bil1)];

        // $bil2 = mt_rand(3, 5);
        // $pn = mt_rand(1, 5);
        $p = array(2, 3);
        $p = $p[array_rand($p)];
        if($p == 2){
            $pn_pr = array(2, 6, 10);
            shuffle($pn_pr);
            $pn_p = $pn_pr[0];  //pangkat pembilang
            $pn_p2 = $pn_pr[1];
            $pn_pp = 4; //pangkat penyebut
            $pn_a = " "; //pangkar diluar akar
        }else{
            $pn_pr = array(2, 4, 8);
            shuffle($pn_pr);
            $pn_p = $pn_pr[0];
            $pn_p2 = $pn_pr[1];
            $pn_pp = 6;
            $pn_a = "3";
        }
        // }

        // function simFracPowQuestion(){
        $bil2 = mt_rand(2, 3);
        $pn = mt_rand(2, 3); //pangkat biasa
        // }

        // function opsFracPowQuestion(){
        // $bil2 = mt_rand(2, 3);
        // $pn = mt_rand(1, 5);
        // }
        $bil2_r = pow($bil2, $pn);
        $param = new \stdClass();
        $param->bil1 = $bil1;
        $param->bil2 = $bil2;
        $param->pn = $pn;
        $param->pn_p = $pn_p;
        $param->pn_a = $pn_a;
        $param->pn_p2 = $pn_p2;
        $param->pn_pp = $pn_pp;
        $param->bil2_r = $bil2_r;

        if ($type == 22) {
            // $qCode = "FPC";
            $qCode = $type;


            $question = $this->mathService->createQuestion22($param);
            $message = "Ubahlah bentuk eksponen dibawah ini kedalam bentuk lain";
            $answer1 = $this->mathService->alpFracPowRule($param);
            $answer2 = $this->mathService->alpFracPowMCRule($param);
            $answer3 = $this->mathService->alpFracPowMCRule2($param);
            $answer4 = $this->mathService->alpFracPowMCRule3($param);
            $answer5 = $this->mathService->alpFracPowMCRule4($param);
            $answer1->code = "true";
            $answer2->code = "FR";
            $answer3->code = "FR";
            $answer4->code = "FR";
            $answer5->code = "FR";
        } elseif ($type == 23) {
            // $qCode = "FPC2";
            $qCode = $type;


            $param->bil2_r = pow($bil2, $pn);
            $question = $this->mathService->createQuestion23($param);
            $message = "Ubahlah dan sederhanakan bentuk eksponen dibawah ini kedalam bentuk lain";
            $answer1 = $this->mathService->simfracPowRule($param);
            $answer2 = $this->mathService->simfracPowMCRule($param);
            $answer3 = $this->mathService->simfracPowMCRule2($param);
            $param->bil2 = $bil2_r;
            $answer4 = $this->mathService->simfracPowMCRule3($param);
            $answer5 = $this->mathService->simfracPowMCRule4($param);
            $answer1->code = "true";
            $answer2->code = "FR";
            $answer3->code = "FR";
            $answer4->code = "FR";
            $answer5->code = "FR";
        }
        //  elseif ($type == 24) {
        //     // $qCode = "FPC3-PR";
        //     $qCode = $type;


        //     $question = $this->mathService->createQuestion24($param);
        //     $message = "";
        //     $answer1 = $this->mathService->oprPowFracPowRule($param);
        //     $answer2 = $this->mathService->oprPowFracPowMCRule($param);
        //     $answer3 = $this->mathService->oprPowFracPowMCRule2($param);
        //     $answer4 = $this->mathService->oprPowFracPowMCRule3($param);
        //     $answer5 = $this->mathService->oprQuoFracPowRule($param);
        //     $answer1->code = "true";
        //     $answer2->code = "PR,FR";
        //     $answer3->code = "PR,FR";
        //     $answer4->code = "PR,FR";
        //     $answer5->code = "PR,QR,FR";
        // }
       
        $result = array(
            "qCode" => $qCode,

            "question" => array( $message, $question),
            "answer" => array($answer1, $answer2, $answer3, $answer4, $answer5)
        );
        shuffle($result["answer"]);
        return $result;
    }

    public function rootsBase2($type)
    {
        // function rootsQuestion(){
        $bil = mt_rand(2, 5); //bilangan diluar akar
        $bil2 = mt_rand(2, 5); //bilangan diluar akar
        $p = array(2, 3, 5); //penentu akar
        $p = $p[array_rand($p)];
        if ($p == '2') {
            $akar = 2;
            //$roots2 = array(18, 32, 50, 72, 98, 128, 162, 200);
            $roots2 = array(18, 32, 50, 200);
            shuffle($roots2);
            $bilr = $roots2[0];
            $bilr2 = $roots2[1];
            $bilr3 = $roots2[2];
            $bilp = $bilr / 2;
            $bilp2 = $bilr2 / 2;
            $bilp3 = $bilr3 / 2;
            // echo $bilr."= 2 x ".$bilp;
        } elseif ($p == '3') {
            $akar = 3;
            //$roots3 = array(12, 27, 48, 75, 108, 147, 192, 243, 300);
            $roots3 = array(12, 27, 75, 300);
            shuffle($roots3);
            $bilr = $roots3[0];
            $bilr2 = $roots3[1];
            $bilr3 = $roots3[2];
            $bilp = $bilr / 3;
            $bilp2 = $bilr2 / 3;
            $bilp3 = $bilr3 / 3;
            // $bilp = $bilr/3;
            // echo $bilr."= 3 x ".$bilp;
        } else {
            $akar = 5;
            //$roots5 = array(20, 45, 80, 180, 245, 320, 405, 500);
            $roots5 = array(20, 45, 80, 500);
            shuffle($roots5);
            $bilr = $roots5[0];
            $bilr2 = $roots5[1];
            $bilr3 = $roots5[2];
            $bilp = $bilr / 5;
            $bilp2 = $bilr2 / 5;
            $bilp3 = $bilr3 / 5;
            // $bilp = $bilr/5;
            // echo $bilr."= 5 x ".$bilp;
        }
        // die();
        // }

        // function rootsAlpQuestion(){
        $bilra_r = array('a', 'b', 'c', 'd'); //akar basis alphabet
        shuffle($bilra_r);
        $bilra = $bilra_r[0];
        $bilra2 = $bilra_r[1];
        $pn = mt_rand(2, 5);
        $pn2 = mt_rand(2, 5);
        // }

        $param = new \stdClass();
        $param->bilr = $bilr;
        $param->bilr2 = $bilr2;
        $param->bilr3 = $bilr3;
        $param->bilp = $bilp;
        $param->bilp2 = $bilp2;
        $param->bilp3 = $bilp3;
        $param->akar = $akar;
        $param->bil = $bil;
        $param->bil2 = $bil2;
        $param->bilra = $bilra;
        $param->bilra2 = $bilra2;
        $param->pn = $pn;
        $param->pn2 = $pn2;

        if ($type == 27) {
            // $qCode = "RC";
            $qCode = $type;


            $question = $this->mathService->createQuestion27($param);
            $message = "Ubahlah bentuk eksponen dibawah ini kedalam bentuk lain";
            $answer1 = $this->mathService->rootsConvForm($param);
            $answer2 = $this->mathService->rootsConvMCForm($param);
            $answer3 = $this->mathService->rootsConvMC2Form($param);
            $answer4 = $this->mathService->rootsConvMC3Form($param);
            $answer5 = $this->mathService->rootsConvMC4Form($param);
            $answer1->code = "true";
            $answer2->code = "FR,RR";
            $answer3->code = "FR,RR";
            $answer4->code = "FR,RR";
            $answer5->code = "FR,RR";
        } elseif ($type == 28) {
            // $qCode = "RC2";
            $qCode = $type;


            $question = $this->mathService->createQuestion28($param);
            $message = "Ubahlah dan sederhanakan bentuk eksponen dibawah ini kedalam bentuk lain";
            $answer1 = $this->mathService->rootsRule($param);
            $answer2 = $this->mathService->rootsMCRule($param);
            $answer3 = $this->mathService->rootsMCRule2($param);
            $answer4 = $this->mathService->rootsMCRule3($param);
            $answer5 = $this->mathService->rootsMCRule4($param);
            $answer1->code = "true";
            $answer2->code = "RR";
            $answer3->code = "RR";
            $answer4->code = "RR";
            $answer5->code = "RR";
        } elseif ($type == 29) {
            // $qCode = "RC3";
            $qCode = $type;

            $question = $this->mathService->createQuestion29($param);
            $message = "Ubahlah dan sederhanakan bentuk eksponen dibawah ini kedalam bentuk lain";
            $answer1 = $this->mathService->alpSimRootsRule($param);
            $answer2 = $this->mathService->alpSimRootsMCRule($param);
            $answer3 = $this->mathService->alpSimRootsMCRule2($param);
            $answer4 = $this->mathService->alpSimRootsMCRule3($param);
            $answer5 = $this->mathService->alpSimRootsMCRule4($param);
            $answer1->code = "true";
            $answer2->code = "RR";
            $answer3->code = "RR";
            $answer4->code = "RR";
            $answer5->code = "RR";
        }

        $result = array(
            "qCode" => $qCode,
            "question" => array( $message, $question),
            "answer" => array( $answer1, $answer2, $answer3, $answer4, $answer5)
        );
        shuffle($result["answer"]);
        return $result;
    }

    public function rootsBase3($type) {
        // function alpFracPow2Question(){
		$bil1 = array('a', 'b', 'c');
		$bil1 = $bil1[array_rand($bil1)];

		// $bil2 = mt_rand(3, 5);
		// $pn = mt_rand(1, 5);
		$p = array(1, 1, 2, 5, 4);
		$pp = array(2, 3, 5, 4, 6);
		// $rn = array(0, 1, 2, 3, 4);
		$rn = array(0, 1, 2);
		shuffle($rn);
		$pn_p = $p[$rn[0]];
		$pn_pp = $pp[$rn[0]];
		$pn_p2 = $p[$rn[1]];
		$pn_pp2 = $pp[$rn[1]];
        $pn_a = null;
        
       

	// }

	// function simFracPowQuestion(){
		$bil2 = mt_rand(2, 3);
		$pn = mt_rand(2, 3); //pangkat biasa
		$bil2_r = pow($bil2, $pn);
    // }
    
        $param = new \stdClass();
        $param->bil2 = $bil2;
        $param->bil2_r = $bil2_r;
        $param->pn = $pn;
        $param->pn_p = $pn_p;
        $param->pn_p2 = $pn_p2;
        $param->pn_pp = $pn_pp;
        $param->pn_pp2 = $pn_pp2;
        $param->pn_a = $pn_a;

        if ($type == 24) {
            //$qCode = "FPC3-PR";
            $qCode = $type;
            $question = $this->mathService->createQuestion24($param);
            $message = "Hitung dan ubahlah ke dalam bentuk lain";
            $answer1 = $this->mathService->oprProFracPowRule($param);
            $answer2 = $this->mathService->oprProFracPowMCRule($param);
            $answer3 = $this->mathService->oprProFracPowMCRule2($param);
            $answer4 = $this->mathService->oprProFracPowMCRule3($param);
            $answer5 = $this->mathService->oprQuoFracPowRule($param);
            $answer1->code = "true";
            $answer2->code = "PR,FR";
            $answer3->code = "PR,FR";
            $answer4->code = "PR,FR";
            $answer5->code = "PR,QR,FR";

        } elseif ($type == 25) {
            // $qCode = "FPC3-QR";
            $qCode = $type;

            $question = $this->mathService->createQuestion25($param);
            $message = "Ubahlah dan sederhanakan bentuk eksponen dibawah ini kedalam bentuk lain";
            $answer1 = $this->mathService->oprQuoFracPowRule($param);
            $answer2 = $this->mathService->oprQuoFracPowMCRule($param);
            $answer3 = $this->mathService->oprQuoFracPowMCRule2($param);
            $answer4 = $this->mathService->oprQuoFracPowMCRule3($param);
            $answer5 = $this->mathService->oprProFracPowRule($param);
            $answer1->code = "true";
            $answer2->code = "QR,FR";
            $answer3->code = "QR,FR";
            $answer4->code = "QR,FR";
            $answer5->code = "PR,QR,FR";
        } elseif ($type == 26) {
            // $qCode = "FPC3-QR";
            $qCode = $type;


            $question = $this->mathService->createQuestion25($param);
            $message = "Ubahlah dan sederhanakan bentuk eksponen dibawah ini kedalam bentuk lain";
            $answer1 = $this->mathService->oprQuoFracPowRule($param);
            $answer2 = $this->mathService->oprQuoFracPowMCRule($param);
            $answer3 = $this->mathService->oprQuoFracPowMCRule2($param);
            $answer4 = $this->mathService->oprQuoFracPowMCRule3($param);
            $answer5 = $this->mathService->oprProFracPowRule($param);
            $answer1->code = "true";
            $answer2->code = "QR,FR";
            $answer3->code = "QR,FR";
            $answer4->code = "QR,FR";
            $answer5->code = "PR,QR,FR";
        }
        $result = array(
            "qCode" => $qCode,

            "question" => array( $message, $question),
            "answer" => array( $answer1, $answer2, $answer3, $answer4, $answer5)
        );
        shuffle($result["answer"]);
        return $result;
    }

    public function getType()
    {
        $id = Auth::user()->id;
        $role = Auth::user()->id_role;

        if ($role == 3 || $role == 4) {
            $data = DB::table('students')
                ->where('id_user', $id)
                ->leftJoin('question_packages','question_packages.id', 'students.id_question_package')
                ->first();
            $res = array();
            $resObj = new \stdClass;
            $resObj->type = $data->questions_types_set;
            $resObj->id_student = $data->id_user;
            $resObj->id_question_type = $data->id_question_package;
            array_push($res, $resObj);
            return $res;
        }
    }

    public function main()
    {
        $type = $this->getType();
        $resultType = explode(',', $type[0]->type);
        $sameBase = array(1, 2, 3, 4, 5, 6, 7);
        $sameBase2 = array(8, 9, 10, 11);
        // $diffBase = array(12, 13);
        $alphabetbase = array(14, 15);
        $alphabetbase2 = array(16, 17);
        $commaBase = array(18, 19, 20, 21);
        $rootsbase1 = array(22, 23);
        $rootsbase3 = array(24, 25, 26);
        $rootsbase2 = array(27, 28, 29);
        $resFinal = array(
            "data" => array(),
            "dataUser" => $type
        );
        // dd($type);

        foreach ($resultType as $item) {
            if (in_array($item, $sameBase)) {
                $data = $this->sameBase($item);
            } elseif (in_array($item, $sameBase2)) {
                $data = $this->sameBase2($item);
            } 
            // elseif (in_array($item, $diffBase)) {
            //     $data = $this->diffbaseQuestion($item);
            // } 
            elseif (in_array($item, $commaBase)) {
                $data = $this->commaBase($item);
            } 
            elseif (in_array($item, $alphabetbase)) {
                $data = $this->alphabetbaseQuestion($item);
            } elseif (in_array($item, $alphabetbase2)) {
                $data = $this->alphabetbaseQuestion2($item);
            } 
            elseif (in_array($item, $rootsbase1)) {
                $data = $this->rootsBase1($item);
            } 
            elseif (in_array($item, $rootsbase2)) {
                $data = $this->rootsBase2($item);
            }
            elseif (in_array($item, $rootsbase3)) {
                $data = $this->rootsBase3($item);
            }
            array_push($resFinal["data"], $data);
        }

        // uncomment to activate pagination
        // return $resFinal;
        return view('exercise.exercise')->with($resFinal);
    }

    public function getIndex()
    {
        return view('exercise.exercise');
    }
    
    
}
