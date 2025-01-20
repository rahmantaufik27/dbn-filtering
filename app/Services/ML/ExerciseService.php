<?php

namespace App\Services\ML;

// use Illuminate\Http\Request;
// use RtLopez\Decimal;
use App\ExerciseResult;
use App\ExerciseCommit;
use App\ProbabilitiesKLInitial;
use App\ProbabilitiesMCInitial;
use App\Student;
use App\User;
use Illuminate\Support\Facades\DB;
use function _\union;
use function _\difference;
class ExerciseService
{
    public function insertExerciseResult($input) {
        $data = ExerciseResult::create([
            'id_exercise_commit' => $input->id_exercise_commit,
            'score' => $input->score,
            'grade' => $input->grade,
            'id_knowledge_level' => $input->id_knowledge_level,
            'id_misconception' => $input->id_misconception,
            'timer' => $input->timer,
            'misconception_ml' => $input->misconception_ml,
        ]);

        return $data;
    }

    public function initialProbKnowledgeLevel($idStudent, $grade, $idLastCommit) {
        $checkAttempt = $this->checkAttempt($idStudent);
        // dd($checkAttempt);
        $initProba = $this->getProbabilitiesInit($idStudent);
        $initProbaMC = $this->getProbabilitiesInitMC($idStudent);
        $knowledgeLevel = $this->getKnowledgeLevel($idStudent);
        $probaTrans = $this->getProbabilitiesTrans();
        $probaEmis = $this->getProbabilitiesEmission();
        $ProbaTransMC = $this->getProbabilitiesTransMC();
        $probaEmisMC = $this->getProbabilitiesEmissionMC();
        // dd($probaEmisMC);
        $getIdMC = $this->getIdMC($idStudent);
        $st_class = $knowledgeLevel->id_role;
        // dd($st_class);
        $i_kl = array(0.14, 0.75, 0.11);
        $i_mc = array(0.05, 0.05, 0.05, 0.05, 0.05, 0.025, 0.05, 0.05, 0.025, 0.025, 0.1, 0.1, 0.09, 0.09, 0.09, 0.105);
        if ($st_class == 4){ //cek role siswa
            $mc = 16;
        }else{
            $mc = ""; /* jika kelas kontrol mc nya null */
        }
        // dd($checkAttempt);

        if ($checkAttempt >= 0) {
            // $i_kl = array(0.14, 0.75, 0.11);
            $i_kl = array($initProba->C1, $initProba->C2, $initProba->C3); //untuk latihan yang ke dua dst. inisial probabilitas nya berdasarkan result probabilitas di latihan sebelumnya
            if ($st_class == 4){ //cek role siswa
                // $i_mc = array(0.105, 0.05, 0.05, 0.05, 0.05, 0.025, 0.05, 0.05, 0.025, 0.025, 0.105, 0.105, 0.07, 0.07, 0.07, 0.1);
                $i_mc = array($initProbaMC->PRQRPPR, $initProbaMC->PRQRFR, $initProbaMC->PRQRRR, $initProbaMC->PRPPRFR, $initProbaMC->PRPPRRR, $initProbaMC->PRFRRR, $initProbaMC->QRPPRFR, $initProbaMC->QRPPRRR, $initProbaMC->QRFRRR, $initProbaMC->PPRFRRR, $initProbaMC->PRQRPPRFR, $initProbaMC->PRQRPPRRR, $initProbaMC->PRQRFRRR, $initProbaMC->PRPPRFRRR, $initProbaMC->QRPPRFRRR, $initProbaMC->PRQRPPRFRRR);
            }
        }

        // var_dump($i_kl);echo "<br>";echo "<br>";
        // var_dump($i_mc);echo "<br>";echo "<br>";

        $kl = $knowledgeLevel->competency;
        // dd($kl);
        $pr_kl = array(0, 0, 0);
        $temp = array(0, 0, 0);
        $pos_kl = array(0, 0, 0);
        $pr_mc = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        $il = 0;
        $total = 0;
        $total1 = array(0,0,0);
        $total2 = 0;
        $et_mc = [];
        $pos_mc2 = [];

        if ($knowledgeLevel->competency == 'C1') {
            $t_kl[0] = array($probaTrans[0]->C1, $probaTrans[0]->C2, $probaTrans[0]->C3);
            $t_kl[1] = array($probaTrans[1]->C1, $probaTrans[1]->C2, $probaTrans[1]->C3);
            $t_kl[2] = array($probaTrans[2]->C1, $probaTrans[2]->C2, $probaTrans[2]->C3);
        } elseif ($knowledgeLevel->competency == 'C2') {
            $t_kl[0] = array($probaTrans[1]->C1, $probaTrans[1]->C2, $probaTrans[1]->C3);
            $t_kl[1] = array($probaTrans[2]->C1, $probaTrans[2]->C2, $probaTrans[2]->C3);
            $t_kl[2] = array($probaTrans[0]->C1, $probaTrans[0]->C2, $probaTrans[0]->C3);
        } else {
            $t_kl[0] = array($probaTrans[2]->C1, $probaTrans[2]->C2, $probaTrans[2]->C3);
            $t_kl[1] = array($probaTrans[0]->C1, $probaTrans[0]->C2, $probaTrans[0]->C3);
            $t_kl[2] = array($probaTrans[1]->C1, $probaTrans[1]->C2, $probaTrans[1]->C3);
        }
    
        $e_kl[0] = array($probaEmis[0]->C1, $probaEmis[0]->C2, $probaEmis[0]->C3);
        $e_kl[1] = array($probaEmis[1]->C1, $probaEmis[1]->C2, $probaEmis[1]->C3);
        $e_kl[2] = array($probaEmis[2]->C1, $probaEmis[2]->C2, $probaEmis[2]->C3);
        $e_kl[3] = array($probaEmis[3]->C1, $probaEmis[3]->C2, $probaEmis[3]->C3);
        $e_kl[4] = array($probaEmis[4]->C1, $probaEmis[4]->C2, $probaEmis[4]->C3);
        
       
        // dd($e_kl[0]);
        // dd($t_mc);
        // dd($i_mc[1] * $t_mc[1][1]);
        
        /*ALGORITMA FILTERING HMM*/
        
        /*UPDATE TRANSISI KNOWLEDGE LEVEL*/
        for($c=0; $c<3; $c++){
            for($p=0; $p<3; $p++){
                $pr_kl[$c] += $t_kl[$p][$c] * $i_kl[$p];
            }		
        }
        
        //cek grade
        if($grade == 'E'){
            $j = 0;
        }elseif($grade == 'D'){
            $j = 1;
        }elseif($grade == 'C'){
            $j = 2;
        }elseif($grade == 'B'){
            $j = 3;
        }else{
            $j = 4;
        }
        
        //cek tipe siswa (eksperimen = kl + mc / kontrol = mc)
        if ($st_class == 4) {
            $e_mc[0] = array($probaEmisMC[0]->C1, $probaEmisMC[0]->C2, $probaEmisMC[0]->C3);
            $e_mc[1] = array($probaEmisMC[1]->C1, $probaEmisMC[1]->C2, $probaEmisMC[1]->C3);
            $e_mc[2] = array($probaEmisMC[2]->C1, $probaEmisMC[2]->C2, $probaEmisMC[2]->C3);
            $e_mc[3] = array($probaEmisMC[3]->C1, $probaEmisMC[3]->C2, $probaEmisMC[3]->C3);
            $e_mc[4] = array($probaEmisMC[4]->C1, $probaEmisMC[4]->C2, $probaEmisMC[4]->C3);
            $e_mc[5] = array($probaEmisMC[5]->C1, $probaEmisMC[5]->C2, $probaEmisMC[5]->C3);
            $e_mc[6] = array($probaEmisMC[6]->C1, $probaEmisMC[6]->C2, $probaEmisMC[6]->C3);
            $e_mc[7] = array($probaEmisMC[7]->C1, $probaEmisMC[7]->C2, $probaEmisMC[7]->C3);
            $e_mc[8] = array($probaEmisMC[8]->C1, $probaEmisMC[8]->C2, $probaEmisMC[8]->C3);
            $e_mc[9] = array($probaEmisMC[9]->C1, $probaEmisMC[9]->C2, $probaEmisMC[9]->C3);
            $e_mc[10] = array($probaEmisMC[10]->C1, $probaEmisMC[10]->C2, $probaEmisMC[10]->C3);
            $e_mc[11] = array($probaEmisMC[11]->C1, $probaEmisMC[11]->C2, $probaEmisMC[11]->C3);
            $e_mc[12] = array($probaEmisMC[12]->C1, $probaEmisMC[12]->C2, $probaEmisMC[12]->C3);
            $e_mc[13] = array($probaEmisMC[13]->C1, $probaEmisMC[13]->C2, $probaEmisMC[13]->C3);
            $e_mc[14] = array($probaEmisMC[14]->C1, $probaEmisMC[14]->C2, $probaEmisMC[14]->C3);
            $e_mc[15] = array($probaEmisMC[15]->C1, $probaEmisMC[15]->C2, $probaEmisMC[15]->C3);
            // var_dump($e_mc);echo "<br>";echo "<br>";
            // var_dump("mc". $mc);
            if($mc == 1){
                $l = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
            }elseif($mc == 2){
                $l = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 0);
            }elseif($mc == 3){
                $l = array(2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 0, 1);
            }elseif($mc == 4){
                $l = array(3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 0, 1, 2);
            }elseif($mc == 5){
                $l = array(4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 0, 1, 2, 3);
            }elseif($mc == 6){
                $l = array(5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 0, 1, 2, 3, 4);
            }elseif($mc == 7){
                $l = array(6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 0, 1, 2, 3, 4, 5);
            }elseif($mc == 8){
                $l = array(7, 8, 9, 10, 11, 12, 13, 14, 15, 0, 1, 2, 3, 4, 5, 6);
            }elseif($mc == 9){
                $l = array(8, 9, 10, 11, 12, 13, 14, 15, 0, 1, 2, 3, 4, 5, 6, 7);
            }elseif($mc == 10){
                $l = array(9, 10, 11, 12, 13, 14, 15, 0, 1, 2, 3, 4, 5, 6, 7, 8);
            }elseif($mc == 11){
                $l = array(10, 11, 12, 13, 14, 15, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
            }elseif($mc == 12){
                $l = array(11, 12, 13, 14, 15, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
            }elseif($mc == 13){
                $l = array(12, 13, 14, 15, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11);
            }elseif($mc == 14){
                $l = array(13, 14, 15, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
            }elseif($mc == 15){
                $l = array(14, 15, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13);
            }elseif($mc == 16){
                $l = array(15, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14);
            }else{
                $l = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
            }
            // dd($l);
            $t_mc[$l[0]] = array($ProbaTransMC[0]->PRQRPPR, $ProbaTransMC[0]->PRQRFR, $ProbaTransMC[0]->PRQRRR, $ProbaTransMC[0]->PRPPRFR, $ProbaTransMC[0]->PRPPRRR, $ProbaTransMC[0]->PRFRRR, $ProbaTransMC[0]->QRPPRFR, $ProbaTransMC[0]->QRPPRRR, $ProbaTransMC[0]->QRFRRR, $ProbaTransMC[0]->PPRFRRR, $ProbaTransMC[0]->PRQRPPRFR, $ProbaTransMC[0]->PRQRPPRRR, $ProbaTransMC[0]->PRQRFRRR, $ProbaTransMC[0]->PRPPRFRRR, $ProbaTransMC[0]->QRPPRFRRR, $ProbaTransMC[0]->PRQRPPRFRRR);
            $t_mc[$l[1]] = array($ProbaTransMC[1]->PRQRPPR, $ProbaTransMC[1]->PRQRFR, $ProbaTransMC[1]->PRQRRR, $ProbaTransMC[1]->PRPPRFR, $ProbaTransMC[1]->PRPPRRR, $ProbaTransMC[1]->PRFRRR, $ProbaTransMC[1]->QRPPRFR, $ProbaTransMC[1]->QRPPRRR, $ProbaTransMC[1]->QRFRRR, $ProbaTransMC[1]->PPRFRRR, $ProbaTransMC[1]->PRQRPPRFR, $ProbaTransMC[1]->PRQRPPRRR, $ProbaTransMC[1]->PRQRFRRR, $ProbaTransMC[1]->PRPPRFRRR, $ProbaTransMC[1]->QRPPRFRRR, $ProbaTransMC[1]->PRQRPPRFRRR);
            $t_mc[$l[2]] = array($ProbaTransMC[2]->PRQRPPR, $ProbaTransMC[2]->PRQRFR, $ProbaTransMC[2]->PRQRRR, $ProbaTransMC[2]->PRPPRFR, $ProbaTransMC[2]->PRPPRRR, $ProbaTransMC[2]->PRFRRR, $ProbaTransMC[2]->QRPPRFR, $ProbaTransMC[2]->QRPPRRR, $ProbaTransMC[2]->QRFRRR, $ProbaTransMC[2]->PPRFRRR, $ProbaTransMC[2]->PRQRPPRFR, $ProbaTransMC[2]->PRQRPPRRR, $ProbaTransMC[2]->PRQRFRRR, $ProbaTransMC[2]->PRPPRFRRR, $ProbaTransMC[2]->QRPPRFRRR, $ProbaTransMC[2]->PRQRPPRFRRR);
            $t_mc[$l[3]] = array($ProbaTransMC[3]->PRQRPPR, $ProbaTransMC[3]->PRQRFR, $ProbaTransMC[3]->PRQRRR, $ProbaTransMC[3]->PRPPRFR, $ProbaTransMC[3]->PRPPRRR, $ProbaTransMC[3]->PRFRRR, $ProbaTransMC[3]->QRPPRFR, $ProbaTransMC[3]->QRPPRRR, $ProbaTransMC[3]->QRFRRR, $ProbaTransMC[3]->PPRFRRR, $ProbaTransMC[3]->PRQRPPRFR, $ProbaTransMC[3]->PRQRPPRRR, $ProbaTransMC[3]->PRQRFRRR, $ProbaTransMC[3]->PRPPRFRRR, $ProbaTransMC[3]->QRPPRFRRR, $ProbaTransMC[3]->PRQRPPRFRRR);
            $t_mc[$l[4]] = array($ProbaTransMC[4]->PRQRPPR, $ProbaTransMC[4]->PRQRFR, $ProbaTransMC[4]->PRQRRR, $ProbaTransMC[4]->PRPPRFR, $ProbaTransMC[4]->PRPPRRR, $ProbaTransMC[4]->PRFRRR, $ProbaTransMC[4]->QRPPRFR, $ProbaTransMC[4]->QRPPRRR, $ProbaTransMC[4]->QRFRRR, $ProbaTransMC[4]->PPRFRRR, $ProbaTransMC[4]->PRQRPPRFR, $ProbaTransMC[4]->PRQRPPRRR, $ProbaTransMC[4]->PRQRFRRR, $ProbaTransMC[4]->PRPPRFRRR, $ProbaTransMC[4]->QRPPRFRRR, $ProbaTransMC[4]->PRQRPPRFRRR);
            $t_mc[$l[5]] = array($ProbaTransMC[5]->PRQRPPR, $ProbaTransMC[5]->PRQRFR, $ProbaTransMC[5]->PRQRRR, $ProbaTransMC[5]->PRPPRFR, $ProbaTransMC[5]->PRPPRRR, $ProbaTransMC[5]->PRFRRR, $ProbaTransMC[5]->QRPPRFR, $ProbaTransMC[5]->QRPPRRR, $ProbaTransMC[5]->QRFRRR, $ProbaTransMC[5]->PPRFRRR, $ProbaTransMC[5]->PRQRPPRFR, $ProbaTransMC[5]->PRQRPPRRR, $ProbaTransMC[5]->PRQRFRRR, $ProbaTransMC[5]->PRPPRFRRR, $ProbaTransMC[5]->QRPPRFRRR, $ProbaTransMC[5]->PRQRPPRFRRR);
            $t_mc[$l[6]] = array($ProbaTransMC[6]->PRQRPPR, $ProbaTransMC[6]->PRQRFR, $ProbaTransMC[6]->PRQRRR, $ProbaTransMC[6]->PRPPRFR, $ProbaTransMC[6]->PRPPRRR, $ProbaTransMC[6]->PRFRRR, $ProbaTransMC[6]->QRPPRFR, $ProbaTransMC[6]->QRPPRRR, $ProbaTransMC[6]->QRFRRR, $ProbaTransMC[6]->PPRFRRR, $ProbaTransMC[6]->PRQRPPRFR, $ProbaTransMC[6]->PRQRPPRRR, $ProbaTransMC[6]->PRQRFRRR, $ProbaTransMC[6]->PRPPRFRRR, $ProbaTransMC[6]->QRPPRFRRR, $ProbaTransMC[6]->PRQRPPRFRRR);
            $t_mc[$l[7]] = array($ProbaTransMC[7]->PRQRPPR, $ProbaTransMC[7]->PRQRFR, $ProbaTransMC[7]->PRQRRR, $ProbaTransMC[7]->PRPPRFR, $ProbaTransMC[7]->PRPPRRR, $ProbaTransMC[7]->PRFRRR, $ProbaTransMC[7]->QRPPRFR, $ProbaTransMC[7]->QRPPRRR, $ProbaTransMC[7]->QRFRRR, $ProbaTransMC[7]->PPRFRRR, $ProbaTransMC[7]->PRQRPPRFR, $ProbaTransMC[7]->PRQRPPRRR, $ProbaTransMC[7]->PRQRFRRR, $ProbaTransMC[7]->PRPPRFRRR, $ProbaTransMC[7]->QRPPRFRRR, $ProbaTransMC[7]->PRQRPPRFRRR);
            $t_mc[$l[8]] = array($ProbaTransMC[8]->PRQRPPR, $ProbaTransMC[8]->PRQRFR, $ProbaTransMC[8]->PRQRRR, $ProbaTransMC[8]->PRPPRFR, $ProbaTransMC[8]->PRPPRRR, $ProbaTransMC[8]->PRFRRR, $ProbaTransMC[8]->QRPPRFR, $ProbaTransMC[8]->QRPPRRR, $ProbaTransMC[8]->QRFRRR, $ProbaTransMC[8]->PPRFRRR, $ProbaTransMC[8]->PRQRPPRFR, $ProbaTransMC[8]->PRQRPPRRR, $ProbaTransMC[8]->PRQRFRRR, $ProbaTransMC[8]->PRPPRFRRR, $ProbaTransMC[8]->QRPPRFRRR, $ProbaTransMC[8]->PRQRPPRFRRR);
            $t_mc[$l[9]] = array($ProbaTransMC[9]->PRQRPPR, $ProbaTransMC[9]->PRQRFR, $ProbaTransMC[9]->PRQRRR, $ProbaTransMC[9]->PRPPRFR, $ProbaTransMC[9]->PRPPRRR, $ProbaTransMC[9]->PRFRRR, $ProbaTransMC[9]->QRPPRFR, $ProbaTransMC[9]->QRPPRRR, $ProbaTransMC[9]->QRFRRR, $ProbaTransMC[9]->PPRFRRR, $ProbaTransMC[9]->PRQRPPRFR, $ProbaTransMC[9]->PRQRPPRRR, $ProbaTransMC[9]->PRQRFRRR, $ProbaTransMC[9]->PRPPRFRRR, $ProbaTransMC[9]->QRPPRFRRR, $ProbaTransMC[9]->PRQRPPRFRRR);
            $t_mc[$l[10]] = array($ProbaTransMC[10]->PRQRPPR, $ProbaTransMC[10]->PRQRFR, $ProbaTransMC[10]->PRQRRR, $ProbaTransMC[10]->PRPPRFR, $ProbaTransMC[10]->PRPPRRR, $ProbaTransMC[10]->PRFRRR, $ProbaTransMC[10]->QRPPRFR, $ProbaTransMC[10]->QRPPRRR, $ProbaTransMC[10]->QRFRRR, $ProbaTransMC[10]->PPRFRRR, $ProbaTransMC[10]->PRQRPPRFR, $ProbaTransMC[10]->PRQRPPRRR, $ProbaTransMC[10]->PRQRFRRR, $ProbaTransMC[10]->PRPPRFRRR, $ProbaTransMC[10]->QRPPRFRRR, $ProbaTransMC[10]->PRQRPPRFRRR);
            $t_mc[$l[11]] = array($ProbaTransMC[11]->PRQRPPR, $ProbaTransMC[11]->PRQRFR, $ProbaTransMC[11]->PRQRRR, $ProbaTransMC[11]->PRPPRFR, $ProbaTransMC[11]->PRPPRRR, $ProbaTransMC[11]->PRFRRR, $ProbaTransMC[11]->QRPPRFR, $ProbaTransMC[11]->QRPPRRR, $ProbaTransMC[11]->QRFRRR, $ProbaTransMC[12]->PPRFRRR, $ProbaTransMC[11]->PRQRPPRFR, $ProbaTransMC[11]->PRQRPPRRR, $ProbaTransMC[11]->PRQRFRRR, $ProbaTransMC[11]->PRPPRFRRR, $ProbaTransMC[11]->QRPPRFRRR, $ProbaTransMC[11]->PRQRPPRFRRR);
            $t_mc[$l[12]] = array($ProbaTransMC[12]->PRQRPPR, $ProbaTransMC[12]->PRQRFR, $ProbaTransMC[12]->PRQRRR, $ProbaTransMC[12]->PRPPRFR, $ProbaTransMC[12]->PRPPRRR, $ProbaTransMC[12]->PRFRRR, $ProbaTransMC[12]->QRPPRFR, $ProbaTransMC[12]->QRPPRRR, $ProbaTransMC[12]->QRFRRR, $ProbaTransMC[12]->PPRFRRR, $ProbaTransMC[12]->PRQRPPRFR, $ProbaTransMC[12]->PRQRPPRRR, $ProbaTransMC[12]->PRQRFRRR, $ProbaTransMC[12]->PRPPRFRRR, $ProbaTransMC[12]->QRPPRFRRR, $ProbaTransMC[12]->PRQRPPRFRRR);
            $t_mc[$l[13]] = array($ProbaTransMC[13]->PRQRPPR, $ProbaTransMC[13]->PRQRFR, $ProbaTransMC[13]->PRQRRR, $ProbaTransMC[13]->PRPPRFR, $ProbaTransMC[13]->PRPPRRR, $ProbaTransMC[13]->PRFRRR, $ProbaTransMC[13]->QRPPRFR, $ProbaTransMC[13]->QRPPRRR, $ProbaTransMC[13]->QRFRRR, $ProbaTransMC[13]->PPRFRRR, $ProbaTransMC[13]->PRQRPPRFR, $ProbaTransMC[13]->PRQRPPRRR, $ProbaTransMC[13]->PRQRFRRR, $ProbaTransMC[13]->PRPPRFRRR, $ProbaTransMC[13]->QRPPRFRRR, $ProbaTransMC[13]->PRQRPPRFRRR);
            $t_mc[$l[14]] = array($ProbaTransMC[14]->PRQRPPR, $ProbaTransMC[14]->PRQRFR, $ProbaTransMC[14]->PRQRRR, $ProbaTransMC[14]->PRPPRFR, $ProbaTransMC[14]->PRPPRRR, $ProbaTransMC[14]->PRFRRR, $ProbaTransMC[14]->QRPPRFR, $ProbaTransMC[14]->QRPPRRR, $ProbaTransMC[14]->QRFRRR, $ProbaTransMC[14]->PPRFRRR, $ProbaTransMC[14]->PRQRPPRFR, $ProbaTransMC[14]->PRQRPPRRR, $ProbaTransMC[14]->PRQRFRRR, $ProbaTransMC[14]->PRPPRFRRR, $ProbaTransMC[14]->QRPPRFRRR, $ProbaTransMC[14]->PRQRPPRFRRR);
            $t_mc[$l[15]] = array($ProbaTransMC[15]->PRQRPPR, $ProbaTransMC[15]->PRQRFR, $ProbaTransMC[15]->PRQRRR, $ProbaTransMC[15]->PRPPRFR, $ProbaTransMC[15]->PRPPRRR, $ProbaTransMC[15]->PRFRRR, $ProbaTransMC[15]->QRPPRFR, $ProbaTransMC[15]->QRPPRRR, $ProbaTransMC[15]->QRFRRR, $ProbaTransMC[15]->PPRFRRR, $ProbaTransMC[15]->PRQRPPRFR, $ProbaTransMC[15]->PRQRPPRRR, $ProbaTransMC[15]->PRQRFRRR, $ProbaTransMC[15]->PRPPRFRRR, $ProbaTransMC[15]->QRPPRFRRR, $ProbaTransMC[15]->PRQRPPRFRRR);
            // dd($t_mc);

            /*UPDATE TRANSISI MISKONSEPSI*/
		    for($c=0; $c<16; $c++){
                for($p=0; $p<16; $p++){
                    $pr_mc[$c] += (float)$t_mc[$p][$c] * (float)$i_mc[$p];
                    // var_dump($pr_mc[$c]);echo "<br>";
			    }		
            }
            // echo "<br>";
            // var_dump($pr_mc);echo "<br>";echo "<br>";
		    
		    //transpose
    		for($c=0; $c<3; $c++){
    			for($p=0; $p<16; $p++){
    				$et_mc[$c][$p] = $e_mc[$p][$c];
    			}		
    		}
            // var_dump($et_mc);echo "<br>";echo "<br>";
    		
            //cek knowledge level siswa
            // var_dump($kl);echo "<br>";echo "<br>";
    		if($kl == 'C1'){
    			$ls = 0;
    		}elseif($kl == 'C2'){
    			$ls = 1;
    		}else{
    			$ls = 2;
            }
            // var_dump($ls);echo "<br>";echo "<br>";
            // var_dump($kl);echo "<br>";echo "<br>";
    		
    		/*UPDATE PRIOR MISKONSEPSI*/
    		for($p=0; $p<16; $p++){
    			$temp2[$p] = $et_mc[$ls][$p] * $pr_mc[$p];
    			$total2 += $temp2[$p];
    		}
            // var_dump($temp2);echo "<br>";echo "<br>";
    
    		// $total3 = 0;
    		for($p=0; $p<16; $p++){
    			$pos_mc3[$p] = $temp2[$p] / $total2;
    			// $total3 += $pos_mc[$p];
    		}
            // var_dump($pos_mc3);echo "<br>";echo "<br>";
    		
    		$storeProbaInitMC = $this->storeProbaInitMC($idStudent, $pos_mc3);
            // dd($storeProbaInitMC);
    		
    		/*PEMILIHAN MISKONSEPSI*/
    		for($c=0; $c<16; $c++){
    			if($pos_mc3[$c] > $pos_mc3[$il]){
    				$il = $c;
    			}
    		}
    		$il = $il+1; //insert index miskonsepsi terbesar kedalam database
    		
    		/*UPDATE EMISI MISKONSEPSI BERDASARKAN KNOWLEDGE LEVEL*/
    		/*e-step miskonsepsi*/
    		for($c=0; $c<3; $c++){
    			for($p=0; $p<16; $p++){
    				$temp1[$c][$p] = $et_mc[$c][$p] * $pr_mc[$p];
    				$total1[$c] += $temp1[$c][$p];
    			}	
            }
            // var_dump($temp1);echo "<br>";echo "<br>";
            
    		
    		/*m-step miskonsepsi*/
    		for($c=0; $c<3; $c++){
    			for($p=0; $p<16; $p++){
    				$pos_mc[$c][$p] = $temp1[$c][$p] / $total1[$c];
    				// $total2 += $pos_mc[$c];
    			}
            }
            // var_dump($pos_mc);echo "<br>";echo "<br>";

            
            /*UPDATE EMISI KNOWLEDGE BERDASARKAN GRADE*/
		    //transpose
    		for($c=0; $c<16; $c++){
    			for($p=0; $p<3; $p++){
    				$pos_mc2[$c][$p] = $pos_mc[$p][$c];
    			}		
            }
            
            $k = 0;
    		// for($i=1; $i<=16; $i++){
    		// 	if($mc == $i){
    		// 		$k = $i-1;
    		// 	}
    		// }
    		$k = $il - 1;
            
            /*e-step knowledge level*/
    		for($c=0; $c<3; $c++){
    			// $temp[$c] = $e_kl[$j][$c] * $et_mc[$k][$c] * $pr_kl[$c] ;
                $temp[$c] = $e_kl[$j][$c] * $pos_mc2[$k][$c] * $pr_kl[$c] ;
                // var_dump($temp[$c]);
                
                $total += $temp[$c];
            }
            // var_dump($temp);
            // dd($total);
    		
        }else{
            for($c=0; $c<3; $c++){
    			$temp[$c] = $e_kl[$j][$c] * $pr_kl[$c];
                $total += $temp[$c];
                
    		}		
        }
        
        /*m-step knowledge level*/
        //$total = $temp[0] + $temp[1] + $temp[2];
        // var_dump("total " . $total);
        // var_dump("total" . $temp);
        for($c=0; $c<3; $c++){

            $pos_kl[$c] = (float)$temp[$c] / (float)$total;
            // var_dump("temo". $temp[$c]);    
        }
        // var_dump($pos_kl);echo "<br>";echo "<br>";
        // dd($pos_kl);


        $storeProbaInit = $this->storeProbaInit($idStudent, $pos_kl);
        // dd($storeProbaInit);
        /*PEMILIHAN KNOWLEDGE LEVEL*/
        $id_kl_student = 0;
        if($pos_kl[0] > $pos_kl[1] && $pos_kl[0] > $pos_kl[2]){
            $id_kl_student = 1;
        }elseif($pos_kl[1] > $pos_kl[0] && $pos_kl[1] > $pos_kl[2] ){
            $id_kl_student = 2;
        }else{
            $id_kl_student = 3;
        }
        // dd($id_kl_student);
    	//update knowledge level (C1/C2/C3) to db
        
        $id_question_package = 0;
        if ($id_kl_student == 1) { //knowledge level C1
            $id_question_package = 1; //pilih paket soal ke 1
        } elseif ($id_kl_student == 2){ //knowledge level C2
            $id_question_package = 2; //pilih paket soal ke 2
        } else { //knowledge level C3
            $id_question_package = 3; //pilih paket soal ke 3
        }
        // $id_question_package = 4;
        // ganti sama fikri
        $id_question_package = 5;
        // var_dump($id_kl_student);echo "<br>";echo "<br>";
        // dd($il);

        $result = new \stdClass;

        // if ($checkAttempt == 0) {
            // ganti sama fikri, please un-comment if needed
            // $id_question_package = 1;
            // $il =  16;
            // $id_kl_student = 1;
        // }

        // dd($checkAttempt);
        // $result->id_knowledge_level = 0;
        // $result->il = $il;
        
        // if ($checkAttempt > 1) {
            $storeKL = $this->storeKL($idStudent, $id_kl_student, $id_question_package, $il);
            $result->id_knowledge_level = $storeKL["id_knowledge_level"] ? $storeKL["id_knowledge_level"] : 0;
            $result->il = $il;
        // }
        // dd($storeKL);

      
            // dd($result);
        return $result;
    }

    function storeProbaInit($idStudent, $proba) {
        // dd($proba);
        $data = ProbabilitiesKLInitial::create([
            'id_student' => $idStudent,
            'C1' => $proba[0],
            'C2' => $proba[1],
            'C3' => $proba[2],
        ]);
        return $data;
    }

    function storeProbaInitMC($idStudent, $probaMC)
    {
        // dd($probaMC);
        $data = ProbabilitiesMCInitial::create([
            'id_student' => $idStudent,
            'PRQRPPR' => $probaMC[0],
            'PRQRFR' => $probaMC[1],
            'PRQRRR' => $probaMC[2],
            'PRPPRFR' => $probaMC[3],
            'PRPPRRR' => $probaMC[4],
            'PRFRRR' => $probaMC[5],
            'QRPPRFR' => $probaMC[6],
            'QRPPRRR' => $probaMC[7],
            'QRFRRR' => $probaMC[8],
            'PPRFRRR' => $probaMC[9],
            'PRQRPPRFR' => $probaMC[10],
            'PRQRPPRRR' => $probaMC[11],
            'PRQRFRRR' => $probaMC[12],
            'PRPPRFRRR' => $probaMC[13],
            'QRPPRFRRR' => $probaMC[14],
            'PRQRPPRFRRR' => $probaMC[15],
        ]);
        return $data;
    }

    function storeKL($idStudent, $id_kl_student, $id_question_package, $il) {
        // dd($id_question_package);
        $user = Student::where('id_user', $idStudent)->first();
        if ($user) {
            $user->id_knowledge_level = $id_kl_student;
            $user->id_question_package = $id_question_package;
            $user->id_misconception = $il;
            $user->save();
        } else {
            return false;
        }
        return $user;
    }

    function checkAttempt($idStudent) {
        $data = DB::table('exercise_commits')
        ->select('attempt')
        ->where('id_student', $idStudent)
        ->orderBy('id', 'desc')
        ->first();
        if ($data) {
            return $data->attempt;
        } else {
            return 0;
        }
    }

    function getProbabilitiesInit($idStudent) {
        $data = DB::table('probabilities_kl_initials')
        ->where('id_student', $idStudent)
        ->orderBy('id', 'desc')
        ->first();
        return $data;
    }
    
    function getProbabilitiesInitMC($idStudent) {
        $data = DB::table('probabilities_mc_initials')
        ->where('id_student', $idStudent)
        ->orderBy('id', 'desc')
        ->first();
        return $data;
    }

    function getKnowledgeLevel($idStudent) {
        $data = DB::table('students')
        ->select('students.*', 'users.id_role', 'knowledge_levels.competency')
        ->leftJoin('knowledge_levels', 'knowledge_levels.id','students.id_knowledge_level')
        ->leftJoin('users', 'users.id', 'students.id_user')
        ->where('students.id_user', $idStudent)
        ->first();
        return $data;
    }
    
    /*function getIdRole($idStudent) {
        $data = DB::table('students')
        ->select('students.*', 'users.id_role', 'knowledge_levels.competency')
        ->leftJoin('knowledge_levels', 'knowledge_levels.id','students.id_knowledge_level')
        ->leftJoin('users', 'users.id', 'students.id_user')
        ->where('id_user', $idStudent)
        ->first();
        return $data;
    }*/
    
    function getIdMC($idStudent) {
        $data = DB::table('students')
        ->select('id_misconception')
        ->where('id_user', $idStudent)
        ->first();
        return $data;
    }

    function getProbabilitiesTrans() {
        $data = DB::table('probabilities_kl_transitions')
        ->orderBy('id','asc')
        ->get();
        return $data;
    }

    function getProbabilitiesEmission() {
        $data = DB::table('probabilities_kl_emissions')
        ->orderBy('id','asc')
        ->get();
        return $data;
    }
    
    function getProbabilitiesTransMC() {
        $data = DB::table('probabilities_mc_transitions')
        ->orderBy('id','asc')
        ->get();
        // dd($data);
        return $data;
    }

    function getProbabilitiesEmissionMC() {
        $data = DB::table('probabilities_mc_emissions')
        ->orderBy('id','asc')
        ->get();
        // dd($data);
        return $data;
    }

    public function getMisconception ($idExercise) {
        $data = DB::table('exercises_per_questions')
        ->select('misconceptions')
        ->where('id_exercise_commit', $idExercise)
        ->whereNotNull('misconceptions')
        ->get();
        return $data;
    }

    function getListMisconception () {
        $data = DB::table('misconceptions')
        ->get();
        return $data;
    }

    public function conclusionMisconcep ($miscopception) {
        $lastIndex = sizeof($miscopception);
        // dd($lastIndex);
        if ($lastIndex > 0 ) {
            for ($i = 0; $i < sizeof($miscopception); $i++) {
                if ($i == 0) {
                    $a = $miscopception[$i]->misconceptions .",";
                } elseif ($i == $lastIndex - 1) {
                    $a .= $miscopception[$i]->misconceptions;
                } else {
                    $a .= $miscopception[$i]->misconceptions .",";
                }
            }
            $arrMiconcep = explode(',', $a);
            $uniqueMisconcep = union($arrMiconcep, $arrMiconcep); 
            $listMisconcep = $this->getListMisconception();
            for ($j = 1; $j < sizeof($listMisconcep); $j++) {
                $arrMisconcepDB = explode(',', $listMisconcep[$j]->code);
                $var = difference($uniqueMisconcep, $arrMisconcepDB);
                if (sizeof($var) == 0) {
                    return $listMisconcep[$j]->id;
                }
                $arrMisconcepDB = '';
            }
        }
        return 0;
    }


    public function lastExercise ($idStudent) {
        $data = DB::table('exercise_commits')
        ->select('exercise_results.*')
        ->leftJoin('exercise_results', 'exercise_results.id_exercise_commit', DB::raw('(SELECT MAX(exercise_commits.id) as last_exercise from exercise_commits)'))
        ->where('exercise_commits.id_student', $idStudent)
        ->orderByDesc('exercise_results.id')
        ->first();
        return $data;
    }

    function getLastMisconcep ($idLastCommit) {
        $data = DB::table('exercise_results')
        ->where('id_exercise_commit', $idLastCommit)
        ->first();

        return $data;
    }

    function getStudent ($id, $exercise) {
        $data = DB::table('users')
        ->leftJoin('students', 'students.id_user', 'users.id')
        ->leftJoin('exercise_commits', 'exercise_commits.id_student', 'users.id')
        ->where('exercise_commits.id_student', $id)
        ->where('exercise_commits.id', $exercise)
        ->first();
        return $data;
    }

}