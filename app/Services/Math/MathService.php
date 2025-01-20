<?php

namespace App\Services\Math;

// use Illuminate\Http\Request;
// use RtLopez\Decimal;
class MathService
{
    public function index()
    {
        return "success";
    }

    // 1. Soal tipe identifikasi pangkat sederhana (PC)
    public function createQuestion1 ($params) {
	    return "$$ ". $params->bil ." ^{ ".  $params->pn ." } = $$";
    }

    // 2. Soal tipe basis sama dengan prosedure product rule (PR)
    public function createQuestion2 ($params) {
	    return "$$ ". $params->bil1 ." ^{ ".  $params->pn1 ." } \\times ". $params->bil1 ." ^{ ".  $params->pn2 ." } = $$";
    }

    // 3. Soal tipe basis sama dengan prosedure quotient rule (QR)
    public function createQuestion3 ($params) {
	    return "$$ ". $params->bil1 ." ^{ ".  $params->pn1 ." } : ". $params->bil1 ." ^{ ". $params->pn2 ." } = $$";
    }

    // 4. Soal tipe basis sama dengan power to power rule (PPR)
    public function createQuestion4 ($params) {
        return "$$ ( ". $params->bil1 ." ^{ ". $params->pn1 ." })^{ ". $params->pn2 ." } = $$ ";
    }
    
    // 5. Soal tipe basis sama dengan prosedure product rule dan quotient rule (COR2-PRQR)
    public function createQuestion5 ($params) {
	    return "$$ ". $params->bil1 ." ^{ ".  $params->pn1 ." } \\times ". $params->bil1 ." ^{ ". $params->pn2 ." } : ". $params->bil1 ." ^{ ".  $params->pn3  ." } = $$";
    }

    // 6. Soal tipe basis sama dengan prosedure power rule dan product rule (COR2-PPRPR)
    public function createQuestion6 ($params) {
        return "$$ ( ". $params->bil1 ." ^{ ". $params->pn1 ." })^{ ". $params->pn2 ." } \\times ". $params->bil1 ." ^{ ". $params->pn3 ." } = $$";
    }

    // 7. Soal tipe basis sama dengan prosedure power rule dan quotient rule  (COR2-PPRQR)
    public function createQuestion7 ($params) {
	    return "$$ {( ". $params->bil1 ." ^{ ". $params->pn1 ." })^{ ". $params->pn2 ." } \\over ". $params->bil1 ."^{ ".  $params->pn3 ." }} = $$";
    }

    public function createQuestion8a ($params) {
        // return "$$ { \\left( ". $params->bil1 ." ^{ ". $params->pn1 ."} \\over ". $params->bil1 ."^{ ". $params->pn2 ." } \\right)^{ ". $params->pn3 ." }} \\times { ". $params->bil1 ." ^{ ". $params->pn4 ." } \\over (". $params->bil1 ."^{ ". $params->pn5 ." })^{ ". $params->pn6 ." }} = $$";
        return "$$ { \\left( ". $params->bil1 ." ^{ ". $params->pn1 ."} \\over ". $params->bil1 ."^{ ". $params->pn2 ." } \\right)^{ ". $params->pn3 ." }} \\times { ". $params->bil1 ." ^{ ". $params->pn4 ." }} = $$";
    }

    public function createQuestion8b ($params) {
	    return "$$ { ". $params->bil1 ." ^{ ". $params->pn1 ." }} \\times { \\left( \\sqrt{ ". $params->bil1 ." ^{". $params->pn2 ." } \\over ". $params->bil1 ." ^{ ". $params->pn3 ." }} \\right)^{ ". $params->pn4 ." }} \\times {( ". $params->bil1 ." ^{ ". $params->pn5 ." })^{ ". $params->pn6 ." }} = $$";

    }

    public function createQuestion8c ($params) {
    	return "$$ {{ \\left( ". $params->bil1 . " ^{ ". $params->pn1 ." } \\over ( ". $params->bil1 ." ^{ ". $params->pn2 ." })^{ ". $params->pn3 ." } \\right)^{ ". $params->pn4 ." }} \\times { ". $params->bil1 ." ^{ ". $params->pn5.$params->pn1  ."}} = { ". $params->bil1 ."^{ ". $params->pn6 ." }}} $$";

    }
    
    public function createQuestion8d ($params) {
    	return "$$ { \\left({ ". $params->bil1 ." ^{ ". $params->pn1 ." } \\times ". $params->bil1 ." ^{{ ". $params->pn2 ."  } \\over { ". $params->pn5 ." }}} \\over ( ". $params->bil1 ." ^{ ". $params->pn3 ." })^{ ". $params->pn4 ." } \\right)^{ ". $params->pn5 ." }} = $$";
    }

    // 9. Soal tipe basis beda dengan prosedure expanded power rule perkalian/pembagian (EPR) 
    public function createQuestion9 ($params) {
        if ($params->pn1 == 1 ) $params->pn1 = null;
        if ($params->pn2 == 1 ) $params->pn2 = null;
        if ($params->pn3 == 1 ) $params->pn3 = null;

        if ($params->opr == "*") {
            $question = "$$ (". $params->bil1 . "^{ ". $params->pn1 ." } \\times ". $params->bil2 . " ^{ ". $params->pn2 ." })^{ ". $params->pn3 ." } = $$";
        } else {
	        $question = "$$ \\left(". $params->bil1 ."^{ ". $params->pn1 ."} \\over ". $params->bil2 ."^{ ". $params->pn2 ." } \\right )^{ ". $params->pn3 ." } = $$";
        }
        return $question;
    }

    // identify form
    // 10. Soal tipe basis variabel alfabet dengan kombinasi rule (EPR2)
    public function createQuestion10 ($params) {
        if ($params->pn1 == 1 ) $params->pn1 = null;
        if ($params->pn2 == 1 ) $params->pn2 = null;
        if ($params->pn3 == 1 ) $params->pn3 = null;
        if ($params->pn4 == 1 ) $params->pn4 = null;
        if ($params->pn5 == 1 ) $params->pn5 = null;
        if ($params->pn6 == 1 ) $params->pn6 = null;

        if ($params->subType == 'a') {
            return  "$$ \\frac { ( ". $params->alp1 ." ^{ ". $params->pn1 ." } \\times ". $params->alp2 ." ^{ ". $params->pn2 ." })^{ ". $params->pn3 ." }}{( ". $params->alp1 ." ^{ ". $params->pn4 ." } \\times ". $params->alp2 ." ^{ ".  $params->pn5 ." })^{ ". $params->pn6 ." }} = $$";
        } else {
            return "$$ \\left(\\frac{ ". $params->alp1 ." ^{ ". $params->pn1 ." } \\times ". $params->alp2 ." ^{ ". $params->pn2 ." }}{ ". $params->alp1 ." ^{ ". $params->pn4 ." } \\times ". $params->alp2 ."^{ ". $params->pn5 ." }} \\right) ^{ ". $params->pn6 ." } = $$";
        }
    }

    // identify form
    // 11. Soal tipe basis variabel alfabet dengan kombinasi rule  (EPR3)
    public function createQuestion11 ($params) {
        if ($params->pn1 == 1 ) $params->pn1 = null;
        if ($params->pn2 == 1 ) $params->pn2 = null;
        if ($params->pn3 == 1 ) $params->pn3 = null;
        if ($params->pn4 == 1 ) $params->pn4 = null;
        if ($params->pn5 == 1 ) $params->pn5 = null;
        if ($params->pn6 == 1 ) $params->pn6 = null;
        if ($params->subType == 'a') {
            return "$$ \\frac{{( ". $params->alp1 ." ^{ ". $params->pn1 ." }}{ ". $params->alp2 ." ^{ ". $params->pn2 ." }})^{ ". $params->pn3 ."}} {{(". $params->alp1b ."^{ ". $params->pn4 ."}}{ ".  $params->alp2b ." ^{ ".  $params->pn5 ." }})^{ ". $params->pn6 ." }} = $$";
        } else {
            return "$$ \\left( \\frac{{ ". $params->alp1 ." ^{ ". $params->pn1 ." }} { ". $params->alp2 ." ^{ ". $params->pn2 ." }}}{{ ". $params->alp1b ." ^{ ".  $params->pn4 ." }} { ". $params->alp2b ." ^{ ". $params->pn5 ." }}} \\right) ^{ ". $params->pn6 ." } = $$";
        }
    }

    // 12. Soal tipe basis koma dasar (CC)
    public function createQuestion18 ($params) {
        if ($params->pn == 1 ) $params->pn = null;

    	return "$$ (". $params->bil .")^{ ". $params->pn ."} = $$ ";
    }

    // 13. Soal tipe basis koma dengan operasi quotient rule (CC2-QR)
    public function createQuestion19 ($params) {
        if ($params->pn == 1 ) $params->pn = null;
        if ($params->pn2 == 1 ) $params->pn2 = null;
	    return "$$ \\frac{( ". $params->bil ." )^{ ". $params->pn ." }}{( ". $params->bil2 ." )^{ ". $params->pn2 ." }} = $$ ";
    }

    // 14. Soal tipe basis koma dengan operasi product rule (CC2-PR)
    public function createQuestion20 ($params) {
        if ($params->pn == 1 ) $params->pn = null;
        if ($params->pn2 == 1 ) $params->pn2 = null;

    	return "$$ (". $params->bil ." )^{ ". $params->pn ." } \\times ( ". $params->bil2 ." )^{ ". $params->pn2 ." } = $$";
    }

    public function createQuestion21 ($params) {
        if ($params->pn == 1 ) $params->pn = null;
        if ($params->pn2 == 1 ) $params->pn2 = null;

    	return "$$ (". $params->bil ." ^{ ". $params->pn ." })^{ ". $params->pn2 ." } = $$";
    }

    // <h4>14. Soal tipe basis variabel alfabet dengan kombinasi rule (EPR2)</h4>
    public function createQuestion14($params) {
	    return "$$ \\frac{( ". $params->alp1 ." ^{ ". $params->pn1 ." } \\times ". $params->alp2 ." ^{ ". $params->pn2 ." })^{ ". $params->pn3 ." }}{( ". $params->alp1 ." ^{ ". $params->pn4 ." } \\times ". $params->alp2 ." ^{ ". $params->pn5 ." })^{ ". $params->pn6 ." }}=$$";
    }

    
    // 15. Soal tipe basis koma dengan operasi power rule  (CC2-PPR)
    public function createQuestion15 ($params) {
    	return "$$ \\left(\\frac{ ". $params->alp1 ." ^{ ". $params->pn1 ."} \\times ". $params->alp2 ." ^{ ". $params->pn2 ." }}{ ". $params->alp1 ." ^{ ". $params->pn4 ." } \\times  ". $params->alp2 ." ^{ ". $params->pn5 ." }} \\right ) ^{ ". $params->pn6 ."  } = $$ ";

    
    }

    public function createQuestion22 ($params) {
        if ($params->pn == 1 ) $params->pn = null;
        if ($params->pn_p == 1 ) $params->pn_p = null;

    	return "$$ ". $params->bil1 ." ^{{ ". $params->pn_p ." \\over ". $params->pn_pp ." }} = $$ ";
    }

    // 16. Soal tipe basis pangkat pecahan dasar (FPC)
    public function createQuestion16 ($params) {
        
	    return "$$ \\frac{{( ". $params->alp1 ." ^{ ". $params->pn1 ." }}{ ". $params->alp2 ." ^{{ ". $params->pn2 . " } \\over{  ". $params->pn3 ."  }}})^{ ". $params->pn3 ." }} {{( ". $params->alp1b ." ^{ ". $params->pn4 ." }}{ ". $params->alp2b ." ^{ ". $params->pn5 ." }})^{ ". $params->pn6 ."}} \\times { ". $params->alp2b ." ^{ ". $params->pn1 ." }}{ ". $params->alp2 ." ^{  ".  $params->pn8 ." }} = $$";

    }

    public function createQuestion23 ($params) {
        if ($params->pn == 1 ) $params->pn = null;
        if ($params->pn_p == 1 ) $params->pn_p = null;
        return "$$ ". $params->bil2_r ." ^{{ ".  $params->pn_p ." \\over ". $params->pn_pp ." }} = $$";
    }
    // 17. Soal tipe penyederhanaan basis pangkat pecahan (FPC2)
    public function createQuestion17 ($params) {
	    return "$$ \\left(\\frac{{". $params->alp1 ." ^{ ". $params->pn1 ." }} { ". $params->alp2 ." ^{{ ". $params->pn2 ." } \\over{ ". $params->pn6 ." }}}}{{ ". $params->alp1b ." ^{ ". $params->pn4 ." }} { ". $params->alp2b ." ^{ ". $params->pn5 ." }}} \\right) ^{". $params->pn6 ."} \\times {". $params->alp2 ."^{". $params->pn1 ."}}{". $params->alp2b ."^{". $params->pn8 ."}} = $$";
    }

    // 18. Soal tipe operasi basis pangkat pecahan (FPC3-PR)
    public function createQuestion24 ($params) {
        return "$$ {". $params->bil2_r ." ^{{ ". $params->pn_p ." \\over ". $params->pn_pp ." }} \\times { ". $params->bil2 ."^{{ ". $params->pn_p2 ." \\over ". $params->pn_pp2 ." }}}} = $$ ";
    }

    // 19. Soal tipe operasi basis pangkat pecahan (FPC3-QR)
    public function createQuestion25 ($params) {
        return "$$ {{ ". $params->bil2_r ." ^{{ ". $params->pn_p ." \\over ". $params->pn_pp ." }}} \\over{ ". $params->bil2 ." ^{{ ". $params->pn_p2 ." \\over ". $params->pn_pp2 ." }}}} = $$ ";
    }

    // 20. Soal tipe operasi basis pangkat pecahan (FPC3-PPR)
    public function createQuestion26 ($params) {
    	return "$$ {{ ". $params->bil2_r ." ^{{ ". $params->pn_p ." \\over ". $params->pn_pp ." }}} \\over { ". $params->bil2 ." ^{{ ". $params->pn_p2 ." \\over ". $params->pn_pp2 ." }}}} = $$";
        // return "$$ \\left({ ". $params->bil2_r ."^{{ ". $params->pn_p ." \\over ". $params->pn_pp ." }}} \\right)^ ". $params->pn ." = $$";
    }

    // 21. Soal tipe basis akar dasar sederhana (RC)
    public function createQuestion27 ($params) {
	    return "$$ \\sqrt{ ". $params->bilra ." ^ ". $params->pn ." } = $$ ";
    }

    // 22. Soal tipe basis akar dasar (RC2)
    public function createQuestion28 ($params) {
        return "$$ \\sqrt{".$params->bilr ." } = $$";   
    }

    // 23. Soal tipe basis akar variabel alphabet dan numerik (RC3)
    public function createQuestion29 ($params) {
        if ($params->pn == 1 ) $params->pn = null;
        if ($params->pn2 == 1 ) $params->pn2 = null;

        return "$$ \\sqrt{{ ". $params->bilr ." }{ ". $params->bilra ." ^ ". $params->pn ." }{ ". $params->bilra2 ." ^ ". $params->pn2 ." }} = $$";
    }

    function powerIden($params){
        $res = pow($params->bil, $params->pn);
        
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 2;
        return $data;
    }
    
    function powerIdenMC($params){

        $param = new \stdClass(); 
        $param->bil = $params->bil;
        $param->pn = $params->pn;

        /* result */
		$res = $this->identifyPowerMCForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 2;
        return $data;

		// identifyPowerMCForm($bil, $pn);
	}

	function powerIdenMC2($params){
		$temp = $params->pn+1;
		$pn = $params->bil;
        $bil = $temp;
        
        $param = new \stdClass(); 
        $param->bil = $bil;
        $param->pn = $pn;

        /* result */
		$res = $this->identifyPowerMCForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 2;
        return $data;
		// identifyPowerMCForm($bil, $pn);
	}

	function powerIdenMC3($params){
		$pn = $params->pn+1;
        $res = pow($params->bil, $pn);
        
        /* result */
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 2;
        return $data;
		// return $bil;
		// identifyPowerForm($bil, $pn);
	}

	function powerIdenMC4($params){
		$pn = $params->pn+2;
        $res = pow($params->bil, $pn);
        
        /* result */
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 2;
        return $data;
		// return $bil;
		// identifyPowerForm($bil, $pn);
    }
    
    function identifyPowerMCForm($params){
		//jika pangkat minus, maka 1/pangkat absolute
		if($params->pn<0){
			$pn = abs($params->pn);
			$bil = pow($params->bil, $pn);
            $res = "$$ - ". $bil ." $$";		 
		//jika pangkat 0, maka 1
		}elseif($params->pn==0){
            $res = "$$ 0 $$";		

		//jika pangkat biasa
		}else{
			$bil = $params->bil*$params->pn;
            // $bil1 = pow($bil1, $pn);
            $res = "$$ {". $bil ." } $$";
			// $rss = '\result';
			// echo $rss;
        }
        return $res;
	}

    public function productRule ($params) {
        /* create formula */
        $pn = $params->pn1 + $params->pn2;
        
        /* assign into object */        
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;

        /* result */
		$res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 2;
        return $data;
    }
    
    public function quotientRule($params){
        /* create formula */
        $pn = $params->pn1 - $params->pn2;
        
        /* assign to obejct */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;
        
        /* result */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
    }
    
    public function powerRule($params){
        /* create formula */
        $pn = $params->pn1 * $params->pn2;

        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;

        /* result */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
    }

    public function proqueRule($params){
		$pn_a = $params->pn1 + $params->pn2;
        $pn = $pn_a - $params->pn3;
        
        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;

        /* result */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
    }
    
    function powproRule($params){
		$pn_a = $params->pn1 * $params->pn2;
        $pn = $pn_a + $params->pn3;
        
        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;

        /* result */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
    }
    
    function powqueRule($params){
		$pn_a = $params->pn1 * $params->pn2;
        $pn = $pn_a - $params->pn3;
        
         /* assign into object */
         $param = new \stdClass(); 
         $param->bil1 = $params->bil1;
         $param->pn = $pn;
 
         /* result */
         $res = $this->identifyPower($param);
         $data = new \stdClass(); 
         $data->res = $res;
         $data->val = 1;
         return $data;
    }
    
    function combinationRule($params){
		$pn1 = $params->pn1 * $params->pn3; //harusnya pake fungsi power rule
		$pn2 = $params->pn2 * $params->pn3;
		$pn_a = $pn1 - $pn2;  //harusnya pake fungsi quotient rule
// 		$pn5 = $params->pn5 * $params->pn6;
		$pn_b = $params->pn4;
        $pn = $pn_a + $pn_b;  //harusnya pake fungsi product rule
        
        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;
 
        /* result */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
    }
    
    function combinationMCRule($params){
		$pn1 = $params->pn1 * $params->pn3;
		$pn2 = $params->pn2 * $params->pn3;
		$pn_a = $pn1/$pn2;  //harusnya pake fungsi quotient mc rule
// 		$pn5 = $params->pn5 * $params->pn6;
		$pn_b = $params->pn4;
        $pn = $pn_a + $pn_b;
        
        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;
 
        /* result */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
    }
    
    function combinationMCRule2($params){
		$pn1 = $params->pn1*$params->pn3;
		$pn2 = $params->pn2*$params->pn3;
		$pn_a = $pn1-$pn2;
// 		$pn5 = $params->pn5*$params->pn6;
		$pn_b = $params->pn4;
        $pn = $pn_a * $pn_b;
        
        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;
 
        /* result */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
    }
    
    
    function combinationMCRule3($params){
		$pn1 = $params->pn1+$params->pn3;
		$pn2 = $params->pn2+$params->pn3;
		$pn_a = $pn1-$pn2;
// 		$pn5 = $params->pn5+$params->pn6;
		$pn_b = $params->pn4;
        $pn = $pn_a + $pn_b;
        
        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;

        /* result */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
    }
    
    function combinationMCRule4($params){
		$pn1 = $params->pn1+$params->pn3;
		$pn2 = $params->pn2+$params->pn3;
		if($pn2==0) $pn2 = 1; //pembaginya tidak boleh 0
		$pn_a = $pn1/$pn2;
// 		$pn5 = $params->pn5+$params->pn6;
// 		if($pn5==0) $pn5 = 1;
		$pn_b = $params->pn4;
        $pn = (0-$pn_a) * $pn_b;
        
        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;

        /* result */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
    }
    
    function combination2Rule($params){
        $pn_a = $params->pn1;
		$pn_b = $params->pn2-$params->pn3;
		$pn_c = $params->pn5*$params->pn6;
        $pn = $pn_a+$pn_b+$pn_c;
        
		// $pn2 = $params->pn2 * $params->pn4;
		// $pn3 = $params->pn3 * $params->pn4;
		// $pn_a = $pn2 - $pn3;
		// $pn_a = $params->pn1 + $pn_a;
		// $pn_b = $params->pn5 * $params->pn6;
        // $pn = $pn_a+$pn_b;
        
        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;
 
        /* result */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
    }
    
    function combination2MCRule($params){
		$pn2 = $params->pn2*$params->pn4;
		$pn3 = $params->pn3*$params->pn4;
		$pn_a = $pn2/$pn3;
		$pn_a = $params->pn1+$pn_a;
		$pn_b = $params->pn5*$params->pn6;
        $pn = $pn_a+$pn_b;
        
        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;
 
        /* result */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
    }

    function combination2MCRule2($params){
		$pn2 = $params->pn2*$params->pn4;
		$pn3 = $params->pn3*$params->pn4;
		$pn_a = $pn2-$pn3;
		$pn_a = $params->pn1*$pn_a;
		$pn_b = $params->pn5*$params->pn6;
        $pn = $pn_a*$pn_b;
        
        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;

        /* result */
        $res = $this->identifyPowerRoots($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
    }
    
    function combination2MCRule3($params){
        $pn_a = $params->pn1;
		$pn2 = $params->pn2*$params->pn4;
		$pn3 = $params->pn3*$params->pn4;
		$pn_b = $pn2-$pn3;
		$pn_c = $params->pn5+$params->pn6;
        $pn = $pn_a+$pn_b+$pn_c;
        

		// $pn2 = $params->pn2+$params->pn4;
		// $pn3 = $params->pn3+$params->pn4;
		// $pn_a = $pn2-$params->pn3;
		// $pn_a = $params->pn1+$pn_a;
		// $pn_b = $params->pn5+$params->pn6;
        // $pn = $pn_a+$pn_b;
        
        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;

        /* result */
        $res = $this->identifyPowerRoots($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
	}
	
	function combination2MCRule4($params){
		// $pn2 = $params->pn2+$params->pn4;
		// $pn3 = $params->pn3+$params->pn4;
        if($params->pn3==0) {
            $params->pn3 = 1;
            
        }
        $pn_a = $params->pn1;
        $pn_b = $params->pn2/$params->pn3;
        $pn_c = $params->pn5+$params->pn6;
        $pn = $pn_a*$pn_b*$pn_c;
		// $pn_a = $params->pn2/$pn3;
		// $pn_a = $params->pn1*$pn_a;
		// $pn_b = $params->pn5+$params->pn6;
        // $pn = $pn_a*$pn_b;
        
         /* assign into object */
         $param = new \stdClass(); 
         $param->bil1 = $params->bil1;
         $param->pn = $pn;
  
         /* result */
         $res = $this->identifyPower($param);
         $data = new \stdClass(); 
         $data->res = $res;
         $data->val = 1;
         return $data;
		// identifyPowerForm($bil1, $pn);
    }

	function combination3Rule($params){
        $pn_a = (1*$params->pn4)+$params->pn5;
		$pn2 = $params->pn2*$params->pn3*$params->pn4;
		$pn_b = $params->pn6+$pn2;
		if($pn_a==0) $pn_a = 1;
        $res = $pn_b/$pn_a;
        
		// $pn2 = $params->pn2 * $params->pn3;
		// $pn_a = $params->pn1 * $params->pn4;
		// $pn_b = $pn2*$params->pn4;
		// $pn = $pn_a-$pn_b;
        // $pn = $pn+$params->pn5;
        
        // /* assign into object */
        // $param = new \stdClass(); 
        // $param->bil1 = $params->bil1;
        // $param->pn = $pn;
 
        // /* result */
        // $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
    }
	
	function combination3MCRule($params){
        $pn_a = (1*$params->pn4)*$params->pn5;
		$pn2 = $params->pn2*$params->pn3*$params->pn4;
		$pn_b = $params->pn6-$pn2;
		if($pn_a==0) $pn_a = 1;
		$res = $pn_b/$pn_a;

		// $pn2 = $params->pn2*$params->pn3;
		// $pn_a = $params->pn1*$params->pn4;
		// $pn_b = $pn2*$params->pn4;
		// $pn = $pn_a/$pn_b;
        // $pn = $pn+$params->pn5;
        
        // /* assign into object */
        // $param = new \stdClass(); 
        // $param->bil1 = $params->bil1;
        // $param->pn = $pn;
 
        // /* result */
        // $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
    }

    function combination3MCRule2($params){
        $pn_a = (1*$params->pn4)*$params->pn5;
		$pn2 = $params->pn2*$params->pn3*$params->pn4;
		$pn_b = $params->pn6+$pn2;
		if($pn_a==0) $pn_a = 1;
		$res = $pn_b/$pn_a;


		// $pn2 = $params->pn2*$params->pn3;
		// $pn_a = $params->pn1*$params->pn4;
		// $pn_b = $pn2*$params->pn4;
		// $pn = $pn_a-$pn_b;
        // $pn = $pn*$params->pn5;
        
        //  /* assign into object */
        //  $param = new \stdClass(); 
        //  $param->bil1 = $params->bil1;
        //  $param->pn = $pn;
 
        //  /* result */
        //  $res = $this->identifyPower($param);
         $data = new \stdClass(); 
         $data->res = $res;
         $data->val = 1;
         return $data;
    }
    
    function combination3MCRule3($params){

        $pn_a = (1*$params->pn4)+$params->pn5;
		$pn2 = $params->pn2+$params->pn3+$params->pn4;
		$pn_b = $params->pn6+$pn2;
		if($pn_a==0) $pn_a = 1;
        $res = $pn_b/$pn_a;
        
		// $pn2 = $params->pn2+$params->pn3;
		// $pn_a = $params->pn1+$params->pn4;
		// $pn_b = $pn2+$params->pn4;
		// $pn = $pn_a-$pn_b;
        // $pn = $pn+$params->pn5;
        
        // /* assign into object */
        // $param = new \stdClass(); 
        // $param->bil1 = $params->bil1;
        // $param->pn = $pn;

        // /* result */
        // $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
	}
	
	function combination3MCRule4($params){
        $pn_a = (1*$params->pn4)*$params->pn5;
		$pn2 = $params->pn2+$params->pn3+$params->pn4;
		$pn_b = $params->pn6-$pn2;
		if($pn_a==0) $pn_a = 1;
        $res = $pn_b/$pn_a;
        
		// $pn2 = $params->pn2+$params->pn3;
		// $pn_a = $params->pn1+$params->pn4;
		// $pn_b = $pn2+$params->pn4;
		// if($pn_b==0) $pn_b = 1;
		// $pn = $pn_a/$pn_b;
        // $pn = $pn*$params->pn5;
        
        //  /* assign into object */
        //  $param = new \stdClass(); 
        //  $param->bil1 = $params->bil1;
        //  $param->pn = $pn;
  
        //  /* result */
        //  $res = $this->identifyPower($param);
         $data = new \stdClass(); 
         $data->res = $res;
         $data->val = 1;
         return $data;
		// identifyPowerForm($bil1, $pn);
    }
   
    function combination4Rule($params){
        $pn_a = ($params->pn1*$params->pn5)+$params->pn2;
		$pn_b = $params->pn3*$params->pn4*$params->pn5;
        $pn = $pn_a-$pn_b;
        
		// $pn_a = $params->pn1+$params->pn2;
		// $pn_b = $params->pn3*$params->pn4;
		// $pn_a = $pn_a*$params->pn5;
		// $pn_b = $pn_b*$params->pn5;
        // $pn = $pn_a-$pn_b;
        
        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;
 
        /* result */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
	}
   
    function combination4MCRule($params){
        $pn_a = ($params->pn1*$params->pn5)+$params->pn2;
		$pn_b = $params->pn3*$params->pn4*$params->pn5;
		$pn = $pn_a/$pn_b;

		// $pn_a = $params->pn1+$params->pn2;
		// $pn_b = $params->pn3*$params->pn4;
		// $pn_a = $pn_a*$params->pn5;
		// $pn_b = $pn_b*$params->pn5;
        // $pn = $pn_a/$pn_b;

        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;
 
        /* result */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
	}
    
    function combination4MCRule2($params){
        $pn_a = ($params->pn1+$params->pn2)*$params->pn5;
		$pn_b = $params->pn3*$params->pn4*$params->pn5;
        $pn = $pn_a-$pn_b;
        
		// $pn_a = $params->pn1*$params->pn2;
		// $pn_b = $params->pn3*$params->pn4;
		// $pn_a = $pn_a*$params->pn5;
		// $pn_b = $pn_b*$params->pn5;
        // $pn = $pn_a-$pn_b;
        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;

        /* result */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
    }
    
    function combination4MCRule3($params){
        $pn_a = ($params->pn1*$params->pn2)+$params->pn5;
		$pn_b = $params->pn3+$params->pn4+$params->pn5;
        $pn = $pn_a-$pn_b;
        
		// $pn_a = $params->pn1+$params->pn2;
		// $pn_b = $params->pn3+$params->pn4;
		// $pn_a = $pn_a+$params->pn5;
		// $pn_b = $pn_b+$params->pn5;
        // $pn = $pn_a-$pn_b;
        
        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;

        /* result */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;
	}

    function combination4MCRule4($params){

        $pn_a = ($params->pn1+$params->pn5)*$params->pn2;
		$pn_b = $params->pn3+$params->pn4+$params->pn5;
        $pn = $pn_a-$pn_b;
        
		// $pn_a = $params->pn1*$params->pn2;
		// $pn_b = $params->pn3+$params->pn4;
		// $pn_a = $pn_a+$params->pn5;
		// $pn_b = $pn_b+$params->pn5;
		// if($pn_b==0) $pn_b = 1;
        // $pn = $pn_a/$pn_b;

        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;
 
        /* result */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 1;
        return $data;

		// identifyPowerForm($bil1, $pn);
	}
    
    public function productMCRule($params){
        /* create formula */
        // dd($params);
        if ($params->var == 'int') {
            $bil1 = $params->bil1 + $params->bil1;
        } else {
            $bil1 = "2".$params->bil1;
        }
        $pn = $params->pn1 + $params->pn2;
        if($pn==0) $pn = 1;
        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $bil1;
        $param->pn = $pn;
        
        /* result generate identify power */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }

    function powerMCRule($params){
		if($params->var == 'int'){
			$bil1 = $params->bil1*$params->pn2;
		}else{
			$bil1 = $params->pn2.$params->bil1;
		}
        $pn = $params->pn1;
        
        /* assign into object */
        $param = new \stdClass(); 
        $param->bil1 = $bil1;
        $param->pn = $pn;
        
        /* result generate identify power */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
	}

    //     // $bil1 = $params->bil1 * $params->bil1;
        
    //     // $pn = abs($params->pn1)+abs($params->pn2);

    //     // $param = new \stdClass(); 
    //     // $param->bil1 = $params->bil1;
    //     // $param->pn = $pn;
    //     // $res = $this->identifyPower($param);
        
    //     // $data->res = $res;
    //     // $data->val = 0;
    //     // return $data;
    // }
    
    public function productMCRule2($params){
        /* create formula */
        if($params->var == 'int'){
			$bil1 = $params->bil1 * $params->bil1;
		}else{
			$bil1 = $params->bil1;
		}
        $pn = $params->pn1 * $params->pn2;
        
        /* assign inti object */
        $param = new \stdClass(); 
        $param->bil1 = $bil1;
        $param->pn = $pn;
        
        /* result generate identify power */
        $res = $this->identifyPower($param);
        $data = new \stdClass();
        $data->res = $res;
        $data->val = 0;
        return $data;
    }

    //prosedure miskonsepsi quotient rule 2 untuk eksponen dasar basis sama
	function quotientMCRule2($params){
		//dibulatkan pangkatnya
		$pn = $params->pn1/$params->pn2;
        $pn = round($pn, 5);
        
        /* assign inti object */
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;
        
        /* result generate identify power */
        $res = $this->identifyPower($param);
        $data = new \stdClass();
        $data->res = $res;
        $data->val = 0;
        return $data;
		// identifyPowerForm($bil1, $pn);
		// return $pn;
	}
    

    function productMCRule3($params){
        /* create formula */
		if($params->var == 'int'){
			$bil1 = $params->bil1 * $params->bil1;
		}else{
			$bil1 = $params->bil1.$params->bil1;
		}
        $pn = $params->pn1 + $params->pn2;
        if($pn==0) $pn = 1;
        /* assign inti object */
        $param = new \stdClass(); 
        $param->bil1 = $bil1;
        $param->pn = $pn;
        
        /* result generate identify power */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    //prosedure miskonsepsi quotient rule 3 untuk eksponen dasar basis sama
	//tidak berlaku (mirip dengan jawaban benar) jika pangkatnya bernilai 0
	function quotientMCRule3($params){
		if($params->var == 'int'){
			$bil1 = $params->bil1/$params->bil1;
		}else{
			// $bil1 = "1".$bil1;
			$bil1 = "1";
		}
		$pn = $params->pn1-$params->pn2;
		/*if($pn == 0){
			$pn = $pn1/$pn2;
			$pn = round($pn, 5);
			identifyPowerForm($bil1, $pn);
		}else{
			identifyPowerForm($bil1, $pn);
        }*/
        
        /* assign inti object */
        $param = new \stdClass(); 
        $param->bil1 = $bil1;
        $param->pn = $pn;
        
        /* result generate identify power */
        $res = $this->identifyPower($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
		// identifyPowerForm($bil1, $pn);
		// return array($bil1, $pn);
    }
    

    //prosedure miskonsepsi power to power rule 2 untuk eksponen dasar basis sama
	function powerMCRule2($params){
		if($params->var == 'int'){
			$bil1 = $params->bil1*$params->pn2;
		}else{
			$bil1 = $params->pn2.$params->bil1;
		}
        $pn = $params->pn1*$params->pn2;
        
         /* assign inti object */
         $param = new \stdClass(); 
         $param->bil1 = $bil1;
         $param->pn = $pn;
         
         /* result generate identify power */
         $res = $this->identifyPower($param);
         $data = new \stdClass(); 
         $data->res = $res;
         $data->val = 0;
         return $data;
		// identifyPowerForm($bil1, $pn);
		// return array($bil1, $pn);
	}



    // /* identify power */
    public function identifyPower ($params) {
        // $answer;

        if ($params->pn < 0) {
            $params->pn = abs($params->pn);
            // if ($params->pn == 1 ) $params->pn = null;

            $first = 1;
            $answer = "$$  ". $first ." \\over ". $params->bil1 . "^{". $params->pn ."} $$";		
            
		// //jika pangkat 0, maka 1
        } else if ($params->pn == 0) {
            $answer = "$$ 1 $$";		

		// //jika pangkat biasa
        } else {
            if ($params->pn == 1 ) $params->pn = null;
            $answer = "$$ {". $params->bil1 ."^{". $params->pn ."}} $$";
            // $answer = " $${  ". $params->bil1 ." ^{ ". $params->pn ." }}$$";
        }
        return $answer;
    }

    // /* identify power */
    public function identifyPowerSpecial ($params) {
        // $answer;

        if ($params->pn < 0) {
            $params->pn = abs($params->pn);
            // if ($params->pn == 1 ) $params->pn = null;

            $first = 1;
            $answer = $first ." \\over ". $params->bil1 . "^{". $params->pn ."}";		
            
		// //jika pangkat 0, maka 1
        } else if ($params->pn == 0) {
            $answer = "1";		

		// //jika pangkat biasa
        } else {
            if ($params->pn == 1 ) $params->pn = null;
            $answer = "{". $params->bil1 ."^{". $params->pn ."}}";
            // $answer = " $${  ". $params->bil1 ." ^{ ". $params->pn ." }}$$";
        }
        return $answer;
    }
    // /* identify power */
    public function identifyPowerRoots ($params) {
        // $answer;

        if ($params->pn < 0) {
            $params->pn = abs($params->pn);
            // if ($params->pn == 1 ) $params->pn = null;

            $first = 1;
            $answer = "$$  \\sqrt{". $first ." \\over ". $params->bil1 . "^{". $params->pn ."}} $$";		
            
		// //jika pangkat 0, maka 1
        } else if ($params->pn == 0) {
            $answer = "$$ \\sqrt{ 1 } $$";		

		// //jika pangkat biasa
        } else {
            if ($params->pn == 1 ) $params->pn = null;
            $answer = "$$ \\sqrt{{". $params->bil1 ."^{". $params->pn ."}}} $$";
            // $answer = " $${  ". $params->bil1 ." ^{ ". $params->pn ." }}$$";
        }
        return $answer;
    }


    // /* expandable rule */
    public function expandedRule($params){
		$pn1 = $params->pn1 * $params->pn3;
		$pn2 = $params->pn2 * $params->pn3;
		$bil1 = pow($params->bil1, $pn1);
		$bil2 = pow($params->bil2, $pn2);
		if($params->opr == "*"){
			$res = $bil1 * $bil2;
		}else{
			$res = $bil1 / $bil2;
		}
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }

    public function expandedMCRule ($params) {
		$pn1 = $params->pn1 * $params->pn3;
		$pn2 = $params->pn2 * $params->pn3;
		if($params->opr == "*"){
			$pn = $pn1 + $pn2;
			$bil = $params->bil1 * $params->bil2;
		}else{
			$pn = $pn1-$pn2;
			$bil = $params->bil1 / $params->bil2;
        }
        $res = pow($bil, $pn);
        // $he = number_format($res, 5, '.', '');
        // dd($res, $he);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
	}

    public function expandedMCRule2($params){
		$bil1 = pow($params->bil1, $params->pn1);
		$bil2 = pow($params->bil2, $params->pn2);
		if($params->opr=="*"){
			$bil = $bil1 * $bil2;
		}else{
			$bil = $bil1 / $bil2;
		}
		$res = $bil * $params->pn3;
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    public function expandedMCRule3($params){
		$pn1 = $params->pn1 * $params->pn3;
		$pn2 = $params->pn2 * $params->pn3;
		$pn = $pn1 + $pn2;
		$bil = $params->bil1 + $params->bil2;
		$res = pow($bil, $pn);
		$data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    function expandedMCRule4($params){
		$pn = $params->pn1 * $params->pn2 * $params->pn3;
		if($params->opr == "*"){
			$bil = $params->bil1 * $params->bil2;
		}else{
			$bil = $params->bil1 / $params->bil2;
		}
		$res = pow($bil, $pn);
        
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    function expandedMCRule5($params){
		// $pn1 = $pn1+$pn3;
		// $pn2 = $pn2+$pn3;
		$pn = $params->pn1 + $params->pn2 + $params->pn3;
		if($pn == 0){
			$pn = abs($params->pn1)+abs($params->pn2)+abs($params->pn3); //diabsolutekan, menghindari pangkat bernilai 0
		}
		if($params->opr=="*"){
			$bil = $params->bil1 * $params->bil2;
		}else{
			$bil = $params->bil1 / $params->bil2;
		}
        $res = pow($bil, $pn);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    public function expandedMCRule6($params){
		$pn = $params->pn1 + $params->pn2;
		$pn = $pn * $params->pn3;
		$bil = $params->bil1 * $params->bil2;
		$res = pow($bil, $pn);
        
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    

    public function alpCombRule($params){
		$pn1 = $params->pn1 * $params->pn3;
		$pn2 = $params->pn2 * $params->pn3;
		$pn4 = $params->pn4 * $params->pn6;
		$pn5 = $params->pn5 * $params->pn6;
		$pna = $pn1 - $pn4;
        $pnb = $pn2 - $pn5;
        
        $param = new \stdClass(); 
        $param->alp1 = $params->alp1;
        $param->alp2 = $params->alp2;
        $param->pna = $pna;
        $param->pnb = $pnb;
        
        /* result generate idenCombPowerForm */
        $res = $this->idenCombPowerForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }

    function alpCombMCRule($params){
		$pn1 = $params->pn1 + $params->pn3;
		$pn2 = $params->pn2 + $params->pn3;
		$pn4 = $params->pn4 + $params->pn6;
		$pn5 = $params->pn5 + $params->pn6;
		$pna = $pn1 - $pn4;
        $pnb = $pn2 - $pn5;
        
        $param = new \stdClass(); 
        $param->alp1 = $params->alp1;
        $param->alp2 = $params->alp2;
        $param->pna = $pna;
        $param->pnb = $pnb;
        
        /* result generate idenCombPowerForm */
        $res = $this->idenCombPowerForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    } 
    

    function alpCombMCRule2($params){
		$pn1 = $params->pn1 * $params->pn3;
		$pn2 = $params->pn2 * $params->pn3;
		$pn4 = $params->pn4 * $params->pn6;
		$pn5 = $params->pn5 * $params->pn6;
		$pna = $pn1 + $pn4;
		$pnb = $pn2 + $pn5;
        
        $param = new \stdClass(); 
        $param->alp1 = $params->alp1;
        $param->alp2 = $params->alp2;
        $param->pna = $pna;
        $param->pnb = $pnb;
        
        /* result generate idenCombPowerForm */
        $res = $this->idenCombPowerForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    function alpCombMCRule3($params){
		$pna = $params->pn1 * $params->pn2 * $params->pn3;
		$pnb = $params->pn4 * $params->pn5 * $params->pn6;
		$pnb = $pna - $pnb;
		$pna = NULL;
		$alp1 = $params->alp1;
		// $alp1 = "(".$params->alp1;
        // $alp2 = $params->alp2.")";
        $alp2 = $params->alp2;
        
        $param = new \stdClass(); 
        $param->alp1 = $alp1;
        $param->alp2 = $alp2;
        $param->pna = $pna;
        $param->pnb = $pnb;
        
        /* result generate idenCombPowerForm */
        $res = $this->idenCombPowerForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    function alpCombMCRule4($params){
		$pna = $params->pn1 + $params->pn2 + $params->pn3;
		$pnb = $params->pn4 + $params->pn5 + $params->pn6;
		$pnb = $pna - $pnb;
		$pna = NULL;
		$alp1 = $params->alp1;
		// $alp1 = "(".$params->alp1;
        // $alp2 = $params->alp2.")";
        $alp2 = $params->alp2;
        
        $param = new \stdClass(); 
        $param->alp1 = $alp1;
        $param->alp2 = $alp2;
        $param->pna = $pna;
        $param->pnb = $pnb;
        
        /* result generate idenCombPowerForm */
        $res = $this->idenCombPowerForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    

    function alpCombMCRule5($params){
		$pn1 = $params->pn1 * $params->pn3;
		$pn2 = $params->pn2 * $params->pn3;
		$pn4 = $params->pn4 * $params->pn6;
		$pn5 = $params->pn5 * $params->pn6;
		$pna = $params->pn1 + $params->pn4;
		$pnb = $params->pn2 + $params->pn5;
		$alp1 = $pna.$params->alp1;
		$alp2 = $pnb.$params->alp2;
		$pna = NULL;
        $pnb = NULL;
        
        $param = new \stdClass(); 
        $param->alp1 = $alp1;
        $param->alp2 = $alp2;
        $param->pna = $pna;
        $param->pnb = $pnb;
        
        /* result generate idenCombPowerForm */
        $res = $this->idenCombPowerForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    function alpNumRule($params){

        $pn1 = $params->alp*$params->pn3;
		$pn4 = $params->alpb*$params->pn6;
		$pna = $pn1-$pn4;
		$pnb = (($params->pn2/$params->pn3)*$params->pn3)+$params->pn8;
		$pnc = 0-$params->pn5*$params->pn6+$params->pn7;
        $alp1 = 2;
        
        // idenCombPowerMultiForm($alp1, $alp2, $alp2b, $pna, $pnb, $pnc);
        
		// $pn1 = $params->alp*$params->pn3;
		// $pn4 = $params->alpb*$params->pn6;
		// $pna = $pn1-$pn4;
		// $pnb = $params->pn2*$params->pn3;
		// $pnc = $params->pn5*$params->pn6;
        // $alp1 = 2;
        
        $param = new \stdClass(); 
        $param->alp1 = $alp1;
        $param->alp2 = $params->alp2;
        $param->alp2b = $params->alp2b;
        $param->pna = $pna;
        $param->pnb = $pnb;
        $param->pnc = $pnc;
        
        /* result generate idenCombPowerForm */
        $res = $this->idenCombPowerMultiForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
		// return $pn;
    }
    
    function alpNumMCRule($params){

        $pn1 = $params->alp;
		$pn4 = $params->alpb;
		$pna = $pn1-$pn4;
		$pnb = (($params->pn2/$params->pn3)*$params->pn3)*$params->pn8;
		$pnc = 0-($params->pn5+$params->pn6)*$params->pn7;
        $alp1 = 2;
        
        // idenCombPowerMultiForm($alp1, $alp2, $alp2b, $pna, $pnb, $pnc);
        

		// $pn1 = $params->alp;
		// $pn4 = $params->alpb;
		// $pna = $pn1-$pn4;
		// $pnb = $params->pn2+$params->pn3;
		// $pnc = $params->pn5+$params->pn6;
        // $alp1 = 2;
        
        $param = new \stdClass(); 
        $param->alp1 = $alp1;
        $param->alp2 = $params->alp2;
        $param->alp2b = $params->alp2b;
        $param->pna = $pna;
        $param->pnb = $pnb;
        $param->pnc = $pnc;
        
        /* result generate idenCombPowerForm */
        $res = $this->idenCombPowerMultiForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    //prosedure salah kombinasi rule untuk eksponen dasar basis alphabet
	function alpNumMCRule2($params){
        $pn1 = $params->alp*$params->pn3;
		$pn4 = $params->alpb*$params->pn6;
		$pna = $pn1+$pn4;
		$pnb = (($params->pn2/$params->pn3)*$params->pn3)+$params->pn8;
		$pnc = 0-$params->pn5*$params->pn6+$params->pn7;
		$alp1 = 2;
        // idenCombPowerMultiForm($alp1, $alp2, $alp2b, $pna, $pnb, $pnc);
        

		// $pn1 = $params->alp*$params->pn3;
		// $pn4 = $params->alpb*$params->pn6;
		// $pna = $pn1+$pn4;
		// $pnb = $params->pn2*$params->pn3;
		// $pnc = $params->pn5*$params->pn6;
        // $alp1 = 2;
        
        $param = new \stdClass(); 
        $param->alp1 = $alp1;
        $param->alp2 = $params->alp2;
        $param->alp2b = $params->alp2b;
        $param->pna = $pna;
        $param->pnb = $pnb;
        $param->pnc = $pnc;
        
        /* result generate idenCombPowerForm */
        $res = $this->idenCombPowerMultiForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    function alpNumMCRule3($params){
        $pna = null;
		$pnc = null;
		$pnb = (($params->pn2/$params->pn3)*$params->pn3)+$params->pn8;	
		$pnd = 0-$params->pn5*$params->pn6+$params->pn7;
        // idenCombPowerMultiForm2($alp1, $alp1b, $alp2, $alp2b, $pna, $pnb, $pnc, $pnd);
        
		// $pna = null; //null itu pangkat satu
		// $pnc = null;
		// $pnb = $params->pn2*$params->pn3;
        // $pnd = $params->pn5*$params->pn6;
        
        $param = new \stdClass(); 
        $param->alp1 = $params->alp1;
        $param->alp1b = $params->alp1b;
        $param->alp2 = $params->alp2;
        $param->alp2b = $params->alp2b;
        $param->pna = $pna;
        $param->pnb = $pnb;
        $param->pnc = $pnc;
        $param->pnd = $pnd;
        
        /* result generate idenCombPowerForm */
        $res = $this->idenCombPowerMultiForm2($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }

    function alpNumMCRule4($params){
        $pna = null;
		$pnb = (($params->pn2/$params->pn3)*$params->pn3)+$params->pn8;
		$pnc = 0-$params->pn5*$params->pn6+$params->pn7;
        $alp1 = $params->alp1/$params->alp1b;
        
        // idenCombPowerMultiForm($alp1, $alp2, $alp2b, $pna, $pnb, $pnc);
        
		// $pna = null; //null itu pangkat satu
		// $pnc = null;
		// $pnb = $params->pn2+$params->pn3;
        // $pnd = $params->pn5+$params->pn6;
        
        $param = new \stdClass(); 
        $param->alp1 = $alp1;
        $param->alp1b = $params->alp1b;
        $param->alp2 = $params->alp2;
        $param->alp2b = $params->alp2b;
        $param->pna = $pna;
        $param->pnb = $pnb;
        $param->pnc = $pnc;
        
        /* result generate idenCombPowerForm */
        $res = $this->idenCombPowerMultiForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
	}
    
    function idenCombPowerForm3($params){
        //karena bukan pengembalian nilai, jadi seperti ini dulu sementara
        if ($params->pna == 1 ) $params->pna = null;
        if ($params->pnb == 1 ) $params->pnb = null;
        if ($params->pnc == 1 ) $params->pnc = null;
        if ($params->pnd == 1 ) $params->pnd = null;
        return "$$ {". $params->alp1 ." ^{ ". $params->pna ." }}{ ". $params->alp2 ." ^{ ". $params->pnb ." }}{ ". $params->alp1b ." ^{ ". $params->pnc ." }}{ ". $params->alp2b ." ^{ ". $params->pnd ." }} $$";		
	}
    
    function idenCombPowerForm2($params) {
        //karena bukan pengembalian nilai, jadi seperti ini dulu sementara
        if ($params->pna == 1 ) $params->pna = null;
        if ($params->pnb == 1 ) $params->pnb = null;
        if ($params->pnc == 1 ) $params->pnc = null;
        
        return "$$ {". $params->alp1 ." ^{ ". $params->pna ." }}{ ". $params->alp2 ." ^{ ". $params->pnb ." }}{  ".  $params->alp2b . " ^{ ".  $params->pnc ." }} $$ ";		
    }

    function idenCombPowerForm($params) {
        if($params->pna >= 0 && $params->pnb >= 0){
			if($params->pna == 0){
                return "$$ ". $params->alp2 ." ^{ ". $params->pnb ."}$$";		
			}elseif($params->pnb == 0){
                return "$$ ". $params->alp1 ."^{ ". $params->pna ." }$$";		
			}else{
                return "$$ ". $params->alp1 ." ^{  ".$params->pna." }  ".$params->alp2." ^{ ".$params->pnb." }$$";		
			}
		}elseif($params->pna >= 0 && $params->pnb < 0){
			$pnb = abs($params->pnb);
			if($params->pna == 0){
                return "$$ {1} \\over {   ". $params->alp2  ."^{   ". $pnb  ."}} $$";		
				 
			}else{
                return "$$ { ". $params->alp1  ."^{   ". $params->pna  ."}} \over {   ". $params->alp2  ."^{   ". $pnb  ."}} $$	";	
			}
		}elseif($params->pna < 0 && $params->pnb >= 0){
			$pna = abs($params->pna);
			if($params->pnb == 0){
                return "$$ {1} \\over { ". $params->alp1  ."^{ ". $pna  ."}} $$";		
			}else{
                return "$$ { ". $params->alp2  ."^{ ". $params->pnb  ."}} \over { ". $params->alp1  ."^{ ". $pna  ."}} $$";		
			}
		}else{
			$pna = abs($params->pna);
			$pnb = abs($params->pnb);
			return " $$ 1 \\over { ". $params->alp1 ." ^{ ". $pna ." } ". $params->alp2 ."^{ ". $pnb ."}}$$";		
        }
        
        // if ($params->pna == 1 ) $params->pna = null;
        // if ($params->pnb == 1 ) $params->pnb = null;
		// //karena bukan pengembalian nilai, jadi seperti ini dulu sementara
        
        // $param1 = new \stdClass(); 
        // $param1->bil1 = $params->alp1;
        // $param1->pn   = $params->pna;
        
        // /* result generate identify power */
        // $res1 = $this->identifyPower($param1);

        // $param2 = new \stdClass(); 
        // $param2->bil1 = $params->alp2;
        // $param2->pn   = $params->pnb;
        
        // /* result generate identify power */
        // $res2 = $this->identifyPower($param2);


        // // return "$$ ". $params->alp1 ." ^{ ". $params->pna ." } ". $params->alp2 ." ^{ ". $params->pnb ." }$$";		
        // // return $res1 ."". $res2 . "$$ ". $params->alp1 ." ^{ ". $params->pna ." } ". $params->alp2 ." ^{ ". $params->pnb ." }$$";		
        // return $res1 . " ". $res2 ;
    }


    function commaRule($params){

        $pcom = 0-$params->pcom;
        $pn2 = $pcom*$params->pn;
        
		// $num = pow($params->num, $params->pn);
		// $bil_com = pow($params->bil_com, $params->pn);
		// $res = $num / $bil_com;
        // return $res;
        $param = new \stdClass(); 
        $param->num = $params->num;
        $param->pn = $params->pn;
        $param->pn2 = $pn2;

        $res = $this->commaBase($param);

        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }

    function commaBase($params){
        return "$$ ". $params->num ." ^{ ". $params->pn ." } \\times ". 10 ." ^{ ". $params->pn2 ." } $$";				
	}
    
    function commaMCRule($params){

        $pcom = 0-$params->pcom+1;
        $pn2 = $pcom*$params->pn;
        
        $param = new \stdClass(); 
        $param->num = $params->num;
        $param->pn = $params->pn;
        $param->pn2 = $pn2;

        $res = $this->commaBase($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
		// return $res;
    }
    
    function commaMCRule2($params){
        $pcom = 0-$params->pcom-1;
        $pn2 = $pcom*$params->pn;

        $param = new \stdClass(); 
        $param->num = $params->num;
        $param->pn = $params->pn;
        $param->pn2 = $pn2;
        $res = $this->commaBase($param);

		// $num = pow($params->num, $params->pn);
		// $pn = $params->pn - 1;
		// $bil_com = pow($params->bil_com, $pn);
        // $res = $num / $bil_com;
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
		// return $res;
    }
    
    function commaMCRule3($params){
		$pn2 = $params->pcom*$params->pn;

        $param = new \stdClass(); 
        $param->num = $params->num;
        $param->pn = $params->pn;
        $param->pn2 = $pn2;
        $res = $this->commaBase($param);
		
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
		// return $res;
    }
    
    function commaMCRule4($params){
        $pcom = 0-$params->pcom;
        $pn2 = $pcom+$params->pn; //salah di ppr juga

        $param = new \stdClass(); 
        $param->num = $params->num;
        $param->pn = $params->pn;
        $param->pn2 = $pn2;
        $res = $this->commaBase($param);

        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
		// return $res;
    }
    
    // //prosedure salah power rule basis koma dengan operasi quotient rule
	function qCommaMCRule($params){

        $pnr = $params->pn-$params->pn2;
		$pcom = 0-$params->pcom+1;
		$pcom2 = 0-$params->pcom2+1;
		$pcom = $pcom*$params->pn;
		$pcom2 = $pcom2*$params->pn2;
        $pcomr = $pcom-$pcom2;

        $param = new \stdClass(); 
        $param->num = $params->num;
        $param->pn = $pnr;
        $param->pn2 = $pcomr;
        $res = $this->commaBase($param);
        
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
		// return $res;
	}

	function qCommaMCRule2($params){
        $pnr = $params->pn-$params->pn2;
		$pcom = 0-$params->pcom-1;
		$pcom2 = 0-$params->pcom2-1;
		$pcom = $pcom*$params->pn;
		$pcom2 = $pcom2*$params->pn2;
        $pcomr = $pcom-$pcom2;
        
        $param = new \stdClass(); 
        $param->num = $params->num;
        $param->pn = $pnr;
        $param->pn2 = $pcomr;
        $res = $this->commaBase($param);

        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
		// return $res;
	}

	function qCommaMCRule3($params){
		$pnr = $params->pn - $params->pn2;
		$num = pow($params->num, $pnr);
		$pcom = 0-$params->pcom+2;
		$pcom2 = 0-$params->pcom2+2;
		$pcom = $pcom*$params->pn;
		$pcom2 = $pcom2*$params->pn2;
		$pcomr = $pcom-$pcom2;
		$bil_com = pow(10, $pcomr);
        $res = $num/$bil_com;
        
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
		// return $res;
	}

	function qCommaMCRule4($params){
		$pnr = $params->pn - $params->pn2;
		$num = pow($params->num, $pnr);
		// var_dump($num);
		$pcom = 0-$params->pcom-2;
		$pcom2 = 0-$params->pcom2-2;
		$pcom = $pcom*$params->pn;
		$pcom2 = $pcom2*$params->pn2;
		$pcomr = $pcom-$pcom2;
		// var_dump($pcomr);
		$bil_com = pow(10, $pcomr);
		// var_dump($bil_com);
        $res = $num/$bil_com;
        
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
		// return $res;
    }

    //prosedure benar power rule basis koma dengan operasi product rule
	function pCommaRule($params){
        $pnr = $params->pn+$params->pn2;
		$pcom = 0-$params->pcom;
		$pcom2 = 0-$params->pcom2;
		$pcom = $pcom*$params->pn;
		$pcom2 = $pcom2*$params->pn2;
        $pcomr = $pcom+$pcom2;
        
        $param = new \stdClass(); 
        $param->num = $params->num;
        $param->pn = $pnr;
        $param->pn2 = $pcomr;
        $res = $this->commaBase($param);

        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
	}

    //prosedure salah power rule basis koma dengan operasi product rule
	function pCommaMCRule($params){
		$pnr = $params->pn+$params->pn2;
		$pcom = 0-$params->pcom+1;
		$pcom2 = 0-$params->pcom2+1;
		$pcom = $pcom*$params->pn;
		$pcom2 = $pcom2*$params->pn2;
        $pcomr = $pcom+$pcom2;

        $param = new \stdClass(); 
        $param->num = $params->num;
        $param->pn = $pnr;
        $param->pn2 = $pcomr;
        $res = $this->commaBase($param);
        
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    function pCommaMCRule2($params){
		$pnr = $params->pn+$params->pn2;
		$pcom = 0-$params->pcom-1;
		$pcom2 = 0-$params->pcom2-1;
		$pcom = $pcom*$params->pn;
		$pcom2 = $pcom2*$params->pn2;
        $pcomr = $pcom+$pcom2;

        $param = new \stdClass(); 
        $param->num = $params->num;
        $param->pn = $pnr;
        $param->pn2 = $pcomr;
        $res = $this->commaBase($param);
        
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }

    //prosedure benar power rule basis koma dengan operasi product rule
	function powCommaRule($params){
        $pnr = $params->pn*$params->pn2;
		$pcom = 0-$params->pcom;
        $pcomr = $pcom*$params->pn*$params->pn2;
        
        $param = new \stdClass(); 
        $param->num = $params->num;
        $param->pn = $pnr;
        $param->pn2 = $pcomr;
        $res = $this->commaBase($param);

        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    //prosedure benar power rule basis koma dengan operasi power rule
	function powCommaMCRule($params){
        $pnr = $params->pn*$params->pn2;
		$pcom = 0-$params->pcom+1;
        $pcomr = $pcom*$params->pn*$params->pn2;
        
        $param = new \stdClass(); 
        $param->num = $params->num;
        $param->pn = $pnr;
        $param->pn2 = $pcomr;
        $res = $this->commaBase($param);

        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
	}

	function powCommaMCRule2($params){
        $pnr = $params->pn*$params->pn2;
		$pcom = 0-$params->pcom-1;
        $pcomr = $pcom*$params->pn*$params->pn2;
        
        $param = new \stdClass(); 
        $param->num = $params->num;
        $param->pn = $pnr;
        $param->pn2 = $pcomr;
        $res = $this->commaBase($param);

        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
	}
    
    function rootsForm($params){
        return "$$  $params->billa \\sqrt {  $params->bilda } $$";		
	}

    function rootsRule($params) {
        $billa = sqrt($params->bilp); //bilangan diluar akar
        $bilda = $params->akar; //bilangan didalam akar
        
        $param = new \stdClass(); 
        $param->billa = $billa;
        $param->bilda = $bilda;
        
        /* result generate idenCombPowerForm */
        $res = $this->rootsForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }

    function rootsMCRule($params){
		$billa = $params->bilp/2;
		if($billa == 2){ //kalau hasilnya dua sama kaya jawaban benar
			$billa = $billa*2;
		}
        $bilda = $params->akar;

        $param = new \stdClass(); 
        $param->billa = $billa;
        $param->bilda = $bilda;

        $res = $this->rootsForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    

    function rootsMCRule2($params){
		$bilda = sqrt($params->bilp); //ditukar
        $billa = $params->akar;

        $param = new \stdClass(); 
        $param->billa = $billa;
        $param->bilda = $bilda;

        $res = $this->rootsForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    

    function rootsMCRule3($params){ //merujuk pada miskonsepsi pangkat dasar
		$billa = sqrt($params->bilp);
		$bilda = $billa*2; //nilai yang akar dikali dua
        $billa = $params->akar; //ditukar
        
        $param = new \stdClass(); 
        $param->billa = $billa;
        $param->bilda = $bilda;

        $res = $this->rootsForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    function rootsMCRule4($params){
		$billa = $params->bilp * $params->akar;
		if($billa%2 == 0){
			$billa = $billa-2;
			$billa = $billa/2;
			$bilda = 2;
		}else{
			$billa = $billa-3;
			$billa = $billa/2;
			$bilda = 3;
        }
        
        $param = new \stdClass(); 
        $param->billa = $billa;
        $param->bilda = $bilda;

        $res = $this->rootsForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    function rootsMCRule5($params){
		$billa = $params->bilp * $params->akar;
		echo sqrt($billa);
    }
    

    function simRootsRule($params){
		$billa = ($params->bil*(sqrt($params->bilp3)))+($params->bil2*(sqrt($params->bilp2)))-(sqrt($params->bilp)); //bilangan diluar akar
        $bilda = $params->akar; //bilangan didalam akar
        
        $param = new \stdClass(); 
        $param->billa = $billa;
        $param->bilda = $bilda;

        $res = $this->rootsForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    function simRootsMCRule($params){
		$billa = ($params->bil+(sqrt($params->bilp3)))+($params->bil2+(sqrt($params->bilp2)))-(sqrt($params->bilp)); //bilangan diluar akar
        $bilda = $params->akar; //bilangan didalam akar
        
        $param = new \stdClass(); 
        $param->billa = $billa;
        $param->bilda = $bilda;

        $res = $this->rootsForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }

    //adanya kemungkinan hasil yang sama dengan prosedur benar, sedikit tapi gk tau kenapa
	function simRootsMCRule2($params){
		$billa = ($params->bil*($params->bilp3/2))+($params->bil2*($params->bilp2/2))-($params->bilp/2); //bilangan diluar akar
        $bilda = $params->akar; //bilangan didalam akar
        
        $param = new \stdClass(); 
        $param->billa = $billa;
        $param->bilda = $bilda;

        $res = $this->rootsForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    function simRootsMCRule3($params){
		$billa = $params->bil + $params->bil2; //bilangan diluar akar
		$bilda = ($params->bilp3 * $params->akar)+($params->bilp2 * $params->akar)-($params->bilp * $params->akar); //bilangan didalam akar
        
        $param = new \stdClass(); 
        $param->billa = $billa;
        $param->bilda = $bilda;

        $res = $this->rootsForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    function simRootsMCRule4($params){
		$billa = ($params->bil + ($params->bilp3/2))+($params->bil2+($params->bilp2/2))-($params->bilp/2); //bilangan diluar akar
        $bilda = $params->akar; //bilangan didalam akar
        
        $param = new \stdClass(); 
        $param->billa = $billa;
        $param->bilda = $bilda;

        $res = $this->rootsForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    

    public function alpRootsForm($params){
        if ($params->pn == 1 ) $params->pn = null;
        if ($params->pn2 == 1 ) $params->pn2 = null;
        if ($params->pn_b == 1 ) $params->pn_b = null;
        if ($params->pn_b2 == 1 ) $params->pn_b2 = null;

		if($params->pn_b==-1 && $params->pn_b2==-1){
			$res = "$$ { ". $params->billa ." } { ". $params->bilra ."^{ ". $params->pn ."} } { ". $params->bilra2 . "^{ ". $params->pn2 ." }} { \\sqrt { ". $params->bilda ." }} $$";
		}elseif($params->pn_b==-1){
			$res = "$$ { ". $params->billa ." } { ". $params->bilra ."^{ ". $params->pn ."} } { ". $params->bilra2 . "^{ ". $params->pn2 . "}} { \\sqrt { ". $params->bilda ." ". $params->bilra2 ."^{ ". $params->pn_b2 ."}}} $$";
		}elseif($params->pn_b2==-1){
			$res = "$$ { ". $params->billa ." } { ". $params->bilra ."^{ ". $params->pn ."} } { ". $params->bilra2 . "^{ ". $params->pn2 ." }} { \\sqrt { ". $params->bilda ." ". $params->bilra ."^{ ". $params->pn_b ."}}} $$";
		}else{
			$res = "$$ { ". $params->billa ."} {". $params->bilra ."^{ ". $params->pn ." } } { ". $params->bilra2 ." ^{ ".  $params->pn2 ." }} { \\sqrt { ". $params->bilda ." ". $params->bilra ." ^{ ". $params->pn_b ." } ". $params->bilra2 ."^{ ". $params->pn_b2 ." }}} $$";
        }
        return $res;
    }

    public function alpRootsMCForm($params){
		if($params->pn_b==-2 && $params->pn_b2==-2){
			$res = "$$ { ". $params->billa ."} \\sqrt {{ ". $params->bilda ." ". $params->bilra ." ^ ". $params->pn ." }{ ". $params->bilra2 ." ^ ". $params->pn2 ." }}$$";
		}elseif($params->pn_b==-1 && $params->pn_b2==-1){
			$res = "$$ { ". $params->billa ."}{ \\sqrt { ". $params->bilda ."{". $params->bilra ." ^{ ". $params->pn ." }}{ ". $params->bilra2 ." ^{ ". $params->pn2 ." }}}}$$";
		}elseif($params->pn_b==-1){
			$res = "$$ { ". $params->billa ."}". $params->bilra2 ."^{". $params->pn_b2 ."}{ \\sqrt{ ". $params->bilda ." { ". $params->bilra ." ^{ ". $params->pn ." }}{ ". $params->bilra2 ." ^{ ". $params->pn2 ." }}}}$$";
		}elseif($params->pn_b2==-1){
			$res = "$$ { ". $params->billa ."} ". $params->bilra ."^{". $params->pn_b ."}{ \\sqrt{ ". $params->bilda ." { ". $params->bilra ." ^{ ". $params->pn ."}}{ ".  $params->bilra ." ^{ ".  $params->pn ."}}}}$$";
		}else{
			$res = "$${ ". $params->billa ."}{ ". $params->bilra ."^{". $params->pn_b ."}}{ ". $params->bilra2 ." ^{ ". $params->pn_b2 ." }}{ \\sqrt{ ". $params->bilda ." ". $params->bilra ." ^{ ". $params->pn ." } ". $params->bilra2 ." ^{ ". $params->pn_2 ."}}}$$";
        }
        return $res;
	}
    
    public function alpSimRootsRule($params){
		$billa = sqrt($params->bilp); //bilangan diluar akar
		$bilda = $params->akar; //bilangan didalam akar
		if($params->pn%2 == 0){
			$pn = $params->pn/2;
			$pn_b = -1; //penanda kalau variabel tersebut hilang
		}else{
			$pn_b = $params->pn-1;
			$pn = $pn_b/2;
			$pn_b = 1;  //penanda kalau variabel tersebut ada dan berpangkat 1
			// $pn = $pn."/2";
		}
		if($params->pn2%2 == 0){
			$pn2 = $params->pn2/2;
			$pn_b2 = -1;
		}else{
			$pn_b2 = $params->pn2-1;
			$pn2 = $pn_b2/2;
			$pn_b2 = 1;
			// $pn = $pn."/2";
        }
        
        $param = new \stdClass(); 
        $param->billa = $billa;
        $param->bilda = $bilda;
        $param->bilra = $params->bilra;
        $param->bilra2 = $params->bilra2;
        $param->pn = $pn;
        $param->pn2 = $pn2;
        $param->pn_b = $pn_b;
        $param->pn_b2 = $pn_b2;

        $res = $this->alpRootsForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    public function alpSimRootsMCRule2($params){
		$billa = $params->bilp/2;
		if($billa == 2){ //kalau hasilnya dua sama kaya jawaban benar
			$billa = $billa*2;
		}
		$bilda = $params->akar;
		if($params->pn%2 == 0){
			$pn = $params->pn/2;
			$pn_b = -1; //penanda kalau variabel tersebut hilang
		}else{
			$pn_b = $params->pn-1;
			$pn = $pn_b/2;
			$pn_b = 1;  //penanda kalau variabel tersebut ada dan berpangkat 1
			// $pn = $pn."/2";
		}
		if($params->pn2%2 == 0){
			$pn2 = $params->pn2/2;
			$pn_b2 = -1;
		}else{
			$pn_b2 = $params->pn2-1;
			$pn2 = $pn_b2/2;
			$pn_b2 = 1;
			// $pn = $pn."/2";
        }
        
        $param = new \stdClass(); 
        $param->billa = $billa;
        $param->bilda = $bilda;
        $param->bilra = $params->bilra;
        $param->bilra2 = $params->bilra2;
        $param->pn = $pn;
        $param->pn2 = $pn2;
        $param->pn_b = $pn_b;
        $param->pn_b2 = $pn_b2;

        $res = $this->alpRootsForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    function alpSimRootsMCRule($params){
		$bilda = sqrt($params->bilp); //ditukar
		$billa = $params->akar;
		if($params->pn%2 == 0){
			$pn = $params->pn/2;
			$pn_b = -1; //penanda kalau variabel tersebut hilang
		}else{
			$pn_b = $params->pn-1;
			$pn = $pn_b/2;
			$pn_b = 1;  //penanda kalau variabel tersebut ada dan berpangkat 1
			// $pn = $pn."/2";
		}
		if($params->pn2%2 == 0){
			$pn2 = $params->pn2/2;
			$pn_b2 = -1;
		}else{
			$pn_b2 = $params->pn2-1;
			$pn2 = $pn_b2/2;
			$pn_b2 = 1;
			// $pn = $pn."/2";
		}
		// $pn_b = 2;
        // $pn_b2 = 2;
        
        $param = new \stdClass(); 
        $param->billa = $billa;
        $param->bilda = $bilda;
        //$param->bilra = $params->bilra;
        //$param->bilra2 = $params->bilra2;
        $param->bilra = $params->bilra2;
        $param->bilra2 = $params->bilra;
        $param->pn = $pn;
        $param->pn2 = $pn2;
        $param->pn_b = $pn_b;
        $param->pn_b2 = $pn_b2;

        $res = $this->alpRootsForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
		// alpRootsMCForm($billa, $bilda, $bilra, $bilra2, $pn, $pn2, $pn_b, $pn_b2); //**harusnya nilai yang direturn
	}

    public function alpSimRootsMCRule3($params){
		$billa = sqrt($params->bilp);
		$bilda = $billa*2; //nilai yang akar dikali dua
		$billa = $params->akar; //ditukar
		if($params->pn%2 == 0){
			$pn = $params->pn/2;
			$pn_b = -1; //penanda kalau variabel tersebut hilang
		}else{
			$pn_b = $params->pn-1;
			$pn = $pn_b/2;
			$pn_b = 1;  //penanda kalau variabel tersebut ada dan berpangkat 1
			// $pn = $pn."/2";
		}
		if($params->pn2%2 == 0){
			$pn2 = $params->pn2/2;
			$pn_b2 = -1;
		}else{
			$pn_b2 = $params->pn2-1;
			$pn2 = $pn_b2/2;
			$pn_b2 = 1;
			// $pn = $pn."/2";
        }
        
        $param = new \stdClass(); 
        $param->billa = $billa;
        $param->bilda = $bilda;
        $param->bilra = $params->bilra;
        $param->bilra2 = $params->bilra2;
        $param->pn = $pn;
        $param->pn2 = $pn2;
        $param->pn_b = $pn_b;
        $param->pn_b2 = $pn_b2;

        $res = $this->alpRootsForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
		// alpRootsForm($billa, $bilda, $bilra, $bilra2, $pn, $pn2, $pn_b, $pn_b2); //**harusnya nilai yang direturn
    }


    public function alpSimRootsMCRule4($params){
		$billa = sqrt($params->bilp); //bilangan diluar akar
		$bilda = $params->akar; //bilangan didalam akar
		$pn_b = -2; //penanda kalau variabel dengan pangkat tidak diakarkan
        $pn_b2 = -2;
        
        $param = new \stdClass(); 
        $param->billa = $billa;
        $param->bilda = $bilda;
        $param->bilra = $params->bilra;
        $param->bilra2 = $params->bilra2;
        $param->pn = $params->pn;
        $param->pn2 = $params->pn2;
        $param->pn_b = $pn_b;
        $param->pn_b2 = $pn_b2;

        $res = $this->alpRootsMCForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;

		// alpRootsMCForm($billa, $bilda, $bilra, $bilra2, $pn, $pn2, $pn_b, $pn_b2); //**harusnya nilai yang direturn
    }
    

    public function FracPowForm($params){
        if ($params->pn_a == 1 ) $params->pn_a = null;
        if ($params->pn_p == 1 ) $params->pn_p = null;

		return "$$ \\sqrt [ ". $params->pn_a ." ]{ ". $params->bil ." ^{ ". $params->pn_p ." }} $$";
    }

    public function alpFracPowRule($params){
        $pn_p = $params->pn_p/2;
        
        $param = new \stdClass(); 
        $param->bil = $params->bil1;
        $param->pn_p = $pn_p;
        $param->pn_pp = $params->pn_pp;
        $param->pn_a = $params->pn_a;

        $res = $this->FracPowForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    function alpFracPowMCRule($params){
		$pn_p = $params->pn_p/2;
		$temp = $pn_p;
		$pn_p = $params->pn_pp/2;
        $pn_a = $temp;
        
        $param = new \stdClass(); 
        $param->bil = $params->bil1;
        $param->pn_p = $pn_p;
        $param->pn_pp = $params->pn_pp;
        $param->pn_a = $pn_a;

        $res = $this->FracPowForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }


    public function alpFracPowMCRule2($params){
        $pn_a = $params->pn_pp;
        
        $param = new \stdClass(); 
        $param->bil = $params->bil1;
        $param->pn_p = $params->pn_p;
        $param->pn_pp = $params->pn_pp;
        $param->pn_a = $pn_a;

        $res = $this->FracPowMCForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    public function alpFracPowMCRule3($params){
		$temp = $params->pn_p;
		$pn_p = $params->pn_pp;
        $pn_a = $temp;
        
        $param = new \stdClass(); 
        $param->bil = $params->bil1;
        $param->pn_p = $pn_p;
        $param->pn_pp = $params->pn_pp;
        $param->pn_a = $pn_a;

        $res = $this->FracPowForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    public function alpFracPowMCRule4($params){
        $pn_p = $params->pn_p/2;
        
        $param = new \stdClass(); 
        $param->bil = $params->bil1;
        $param->pn_p = $pn_p;
        $param->pn_pp = $params->pn_pp;
        $param->pn_a = $params->pn_a;

        $res = $this->FracPowMCForm($param);
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }

    function FracPowMCForm($params){
		return "$$ \\sqrt[ ". $params->pn_a ." ]{ ". $params->pn_p ." ". $params->bil ."}$$";
	}


    // //harusnya bisa lebih disederhanakan lagi tapi malas
	public function simfracPowRule($params){
		$pn_p = $params->pn * $params->pn_p;
		if($pn_p % $params->pn_pp == 0){
            $pn_p = $pn_p/$params->pn_pp;
            
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn   = $pn_p;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;

			// identifyPowerForm($bil2, $pn_p);
		}else{
			$pn_p = $pn_p/2;
            $pn_pp = $params->pn_pp/2;
            
            $param = new \stdClass(); 
            $param->bil = $params->bil2;
            $param->pn_p = $pn_p;
            $param->pn_pp = $pn_pp;
            $param->pn_a = $params->pn_a;

            $res = $this->FracPowForm($param);
            $data = new \stdClass(); 
            $data->res = $res;
            $data->val = 0;
            return $data;
			// FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}
    }
    
    function simfracPowMCRule($params){
		if($params->pn_p % $params->pn_pp == 0){
            
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn   = $params->pn_p;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
		}else{
            $pn_a = $params->pn_pp;
            $param = new \stdClass(); 
            $param->bil = $params->bil2;
            $param->pn_p = $params->pn_p;
            $param->pn_pp = $params->pn_pp;
            $param->pn_a = $pn_a;

            $res = $this->FracPowForm($param);
            $data = new \stdClass(); 
            $data->res = $res;
            $data->val = 0;
            return $data;
		}
    }
    

    function simfracPowMCRule2($params){
		// $pn_p = $pn*$pn_p;
		if($params->pn_p%$params->pn_pp == 0){
            // $pn_p = $pn_p/$pn_pp;
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn   = $params->pn_p;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// identifyPowerForm($bil2, $pn_p);
		}else{
			$pn_p = $params->pn_p*2;
            $pn_a = $params->pn_pp;
            
            $param = new \stdClass(); 
            $param->bil = $params->bil2;
            $param->pn_p = $pn_p;
            $param->pn_pp = $params->pn_pp;
            $param->pn_a = $pn_a;

            $res = $this->FracPowForm($param);
            $data = new \stdClass(); 
            $data->res = $res;
            $data->val = 0;
            return $data;
			// FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}
    }
    
    function simfracPowMCRule3($params){
		// $pn_p = $pn*$pn_p;
		if($params->pn_p%$params->pn_pp == 0){
            // $pn_p = $pn_p/$pn_pp;
            
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn   = $params->pn_p;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// identifyPowerForm($bil2, $pn_p);
		}else{
			// $pn_p = $pn_p/2;
            $pn_a = $params->pn_pp;
            
            $param = new \stdClass(); 
            $param->bil = $params->bil2;
            $param->pn_p = $params->pn_p;
            $param->pn_pp = $params->pn_pp;
            $param->pn_a = $pn_a;

            $res = $this->FracPowForm($param);
            $data = new \stdClass(); 
            $data->res = $res;
            $data->val = 0;
            return $data;
			// FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}
    }
    
    function simfracPowMCRule4($params){
		$pn_p = $params->pn*$params->pn_p;
		if($pn_p%$params->pn_pp == 0){
            $pn_p = $pn_p/$params->pn_pp;
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn   = $pn_p;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// identifyPowerForm($bil2, $pn_p);
		}else{
			$pn_p = $pn_p/2;
            $pn_pp = $params->pn_pp/2;
            
            $param = new \stdClass(); 
            $param->bil = $params->bil2;
            $param->pn_p = $pn_p;
            $param->pn_pp = $pn_pp;
            $param->pn_a = $params->pn_a;

            $res = $this->FracPowForm($param);
            $data = new \stdClass(); 
            $data->res = $res;
            $data->val = 0;
            return $data;

			// FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}
    }
    
    function oprProFracPowRule($params){
        $pnb = $params->pn_pp*$params->pn_pp2;
		$pn_p = $params->pn_p*$params->pn; //pangkat pembilang pertama dikali dengan pangkat dari bilangan
		$pna1 = ($pnb/$params->pn_pp)*$pn_p;
		$pna2 = ($pnb/$params->pn_pp2)*$params->pn_p2;
		$pna = $pna1+$pna2;
		$pn = $pna/$pnb;
		if(is_double($pn) == false){
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn   = $pn_p;

            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
		}else{
            $param = new \stdClass(); 
            $param->bil = $params->bil2;
            $param->pn_p = $pna;
            $param->pn_a = $pnb;

            $res = $this->FracPowForm2($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// FracPowForm2($bil2, $pna, $pnb);
        }
        

		// $pna = $params->pn_p*$params->pn;
		// $pn_p = $params->pn_p2+$pna;
		// if($pn_p%$params->pn_pp != 0){
        //     $pn_p = $pn_p/2;
            
        //     $param = new \stdClass(); 
        //     $param->bil = $params->bil2;
        //     $param->pn_p = $pn_p;
        //     $param->pn_pp = $params->pn_pp;
        //     $param->pn_a = $params->pn_a;

        //     $res = $this->FracPowForm($param);
        //     $data = new \stdClass(); 
        //     $data->res = $res;
        //     $data->val = 0;
        //     return $data;

		// 	// FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		// }else{
        //     $pn_p = $pn_p/$params->pn_pp;
            
        //     $param = new \stdClass(); 
        //     $param->bil1 = $params->bil2;
        //     $param->pn   = $pn_p;
            
        //     /* result generate identify power */
        //     $res = $this->identifyPower($param);
        //     $data = new \stdClass();
        //     $data->res = $res;
        //     $data->val = 0;
        //     return $data;
		// 	// identifyPowerForm($bil2, $pn_p);
		// }
    }

    function FracPowForm2($params){
        if ($params->pn_p == 1 ) $params->pn_p = null;
		return "$$ \\sqrt[".$params->pn_a ."]{".$params->bil ."^{".$params->pn_p ."}} $$";
	}
    
    function oprProFracPowMCRule($params){
        $pnb = $params->pn_pp*$params->pn_pp2;
		$pna1 = ($pnb/$params->pn_pp)*$params->pn_p;
		$pna2 = ($pnb/$params->pn_pp2)*$params->pn_p2;
		$pna = $pna1+$pna2;
		$pn = $pna/$pnb;
		if(is_double($pn) == false){
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn   = $pn;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// identifyPowerForm($bil2, $pn);
		}else{
            $param = new \stdClass(); 
            $param->bil = $params->bil2;
            $param->pn_p = $pna;
            $param->pn_a = $pnb;

            $res = $this->FracPowForm2($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// FracPowForm2($bil2, $pna, $pnb);
        }
        
		// $pna = $params->pn_p*$params->pn;
		// $pn_p = $params->pn_p2*$pna;
		// if($pn_p%$params->pn_pp != 0){
        //     $pn_p = $pn_p/2;
        //     $param = new \stdClass(); 
        //     $param->bil = $params->bil2;
        //     $param->pn_p = $pn_p;
        //     $param->pn_pp = $params->pn_pp;
        //     $param->pn_a = $params->pn_a;

        //     $res = $this->FracPowForm($param);
        //     $data = new \stdClass(); 
        //     $data->res = $res;
        //     $data->val = 0;
        //     return $data;

		// 	// FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		// }else{
        //     $pn_p = $pn_p/$params->pn_pp;
        //     $param = new \stdClass(); 
        //     $param->bil1 = $params->bil2;
        //     $param->pn   = $pn_p;
            
        //     /* result generate identify power */
        //     $res = $this->identifyPower($param);
        //     $data = new \stdClass();
        //     $data->res = $res;
        //     $data->val = 0;
        //     return $data;
		// 	// identifyPowerForm($bil2, $pn_p);
		// }
	}
    

    function oprProFracPowMCRule2($params){
        $pnb = $params->pn_pp+$params->pn_pp2;
		$pn_p = $params->pn_p*$params->pn;
		$pna = $pn_p+$params->pn_p2;
		$pn = $pna/$pnb;
		if(is_double($pn) == false){
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn   = $pn;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// identifyPowerForm($bil2, $pn);
		}else{
            $param = new \stdClass(); 
            $param->bil = $params->bil2;
            $param->pn_p = $pna;
            $param->pn_a = $pnb;

            $res = $this->FracPowForm2($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// FracPowForm2($bil2, $pna, $pnb);
        }
        

		// $pna = $params->pn_p*$params->pn;
		// $pn_p = $params->pn_p2*$pna;
		// $pn_pp = $params->pn_pp*$params->pn_pp;
		// if($pn_p%$pn_pp != 0){
		// 	$pn_p = $pn_p/2;
        //     $pn_a = $pn_pp/2;
            
        //     $param = new \stdClass(); 
        //     $param->bil = $params->bil2;
        //     $param->pn_p = $pn_p;
        //     $param->pn_pp = $pn_pp;
        //     $param->pn_a = $pn_a;

        //     $res = $this->FracPowForm($param);
        //     $data = new \stdClass(); 
        //     $data->res = $res;
        //     $data->val = 0;
        //     return $data;
		// 	// FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		// }else{
        //     $pn_p = $pn_p/$pn_pp;
            
        //     $param = new \stdClass(); 
        //     $param->bil1 = $params->bil2;
        //     $param->pn   = $pn_p;
            
        //     /* result generate identify power */
        //     $res = $this->identifyPower($param);
        //     $data = new \stdClass();
        //     $data->res = $res;
        //     $data->val = 0;
        //     return $data;

		// 	// identifyPowerForm($bil2, $pn_p);
		// }
    }
    
    function oprProFracPowMCRule3($params){
        $pnb = $params->pn_pp+$params->pn_pp2;
		$pna = $params->pn_p+$params->pn_p2;
		$pn = $pna/$pnb;
		if(is_double($pn) == false){
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn   = $pn;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// identifyPowerForm($bil2, $pn);
		}else{
            $param = new \stdClass(); 
            $param->bil = $params->bil2;
            $param->pn_p = $pna;
            $param->pn_a = $pnb;

            $res = $this->FracPowForm2($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// FracPowForm2($bil2, $pna, $pnb);
        }
        
		// $pna = $params->pn_p*$params->pn;
		// $pn_p = $pna*$params->pn_pp;
		// $pn_pp = $params->pn_p2*$params->pn_pp;
		// if($pn_p%$pn_pp != 0){
        //     $pn_p = $pn_p/2;
            
        //     $param = new \stdClass(); 
        //     $param->bil = $params->bil2;
        //     $param->pn_p = $pn_p;
        //     $param->pn_pp = $pn_pp;
        //     $param->pn_a = $params->pn_a;

        //     $res = $this->FracPowForm($param);
        //     $data = new \stdClass(); 
        //     $data->res = $res;
        //     $data->val = 0;
        //     return $data;
		// 	// FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		// }else{
        //     $pn_p = $pn_p/$pn_pp;
            
        //     $param = new \stdClass(); 
        //     $param->bil1 = $params->bil2;
        //     $param->pn   = $pn_p;
            
        //     /* result generate identify power */
        //     $res = $this->identifyPower($param);
        //     $data = new \stdClass();
        //     $data->res = $res;
        //     $data->val = 0;
        //     return $data;
		// 	// identifyPowerForm($bil2, $pn_p);
		// }
    }
    
    function oprProFracPowMCRule4($params){
		$bil2b = pow($params->bil2, $params->pn);
		$bil2 = $bil2b*$params->bil2;
		$pn_p = $params->pn_p+$params->pn_p2;
		if($pn_p%$params->pn_pp != 0){
            $pn_p = $pn_p/2;
            
            $param = new \stdClass(); 
            $param->bil = $params->bil2;
            $param->pn_p = $pn_p;
            $param->pn_pp = $params->pn_pp;
            $param->pn_a = $params->pn_a;

            $res = $this->FracPowForm($param);
            $data = new \stdClass(); 
            $data->res = $res;
            $data->val = 0;
            return $data;

			// FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
            $pn_p = $pn_p/$params->pn_pp;
            
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn   = $pn_p;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// identifyPowerForm($bil2, $pn_p);
		}
	}

    public function qCommaRule($params){
        $pnr = $params->pn-$params->pn2;
		$pcom = 0-$params->pcom;
		$pcom2 = 0-$params->pcom2;
		$pcom = $pcom*$params->pn;
		$pcom2 = $pcom2*$params->pn2;
        $pcomr = $pcom-$pcom2;

        $param = new \stdClass(); 
        $param->num = $params->num;
        $param->pn = $pnr;
        $param->pn2 = $pcomr;
        $res = $this->commaBase($param);
        
        $data = new \stdClass(); 
        $data->res = $res;
        $data->val = 0;
        return $data;
    }

    public function proproRule($params){
		$pn_a = $params->pn1 + $params->pn2;
        $pn = $pn_a + $params->pn3;
        
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;
        
        /* result generate identify power */
        $res = $this->identifyPower($param);
        $data = new \stdClass();
        $data->res = $res;
        $data->val = 0;
        return $data;
    }

    function FracPowForm3($params){
        if ($params->pn_p == 1 ) $params->pn_p = null;
        return "$$ 1 \\over { \\sqrt[ ". $params->pn_a ." ]{ ". $params->bil ." ^{ ". $params->pn_p ." }}} $$";
	}

    function oprQuoFracPowRule($params){
        $pnb = $params->pn_pp*$params->pn_pp2;
		$pn_p = $params->pn_p*$params->pn; //pangkat pembilang pertama dikali dengan pangkat dari bilangan
		$pna1 = ($pnb/$params->pn_pp)*$pn_p;
		$pna2 = ($pnb/$params->pn_pp2)*$params->pn_p2;
		$pna = $pna1-$pna2;
		$pn = $pna/$pnb;
		if(is_double($pn) == false){
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn = $pn;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;

			// identifyPowerForm($bil2, $pn);
		}else{
			if($pnb < 0 || $pna < 0){
				$pnb = abs($pnb);
                $pna = abs($pna);
                
                $param = new \stdClass(); 
                $param->bil = $params->bil2;
                $param->pn_p = $pna;
                $param->pn_a = $pnb;
    
                $res = $this->FracPowForm3($param);
                $data = new \stdClass();
                $data->res = $res;
                $data->val = 0;
                return $data;

				// FracPowForm3($bil2, $pna, $pnb);
			}else{
                $param = new \stdClass(); 
                $param->bil = $params->bil2;
                $param->pn_p = $pna;
                $param->pn_a = $pnb;
    
                $res = $this->FracPowForm2($param);
                $data = new \stdClass();
                $data->res = $res;
                $data->val = 0;
                return $data;
				// FracPowForm2($bil2, $pna, $pnb);
			}
        }
        

		// $pna = $params->pn_p*$params->pn;
		// $pn_p = $pna-$params->pn_p2;
		// if($pn_p%$params->pn_pp != 0){
        //     $pn_p = $pn_p/2;
            
        //     $param = new \stdClass(); 
        //     $param->bil = $params->bil2;
        //     $param->pn_p = $pn_p;
        //     $param->pn_pp = $params->pn_pp;
        //     $param->pn_a = $params->pn_a;

        //     $res = $this->FracPowForm($param);
        //     $data = new \stdClass(); 
        //     $data->res = $res;
        //     $data->val = 0;
        //     return $data;
            
		// 	// FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		// }else{
        //     $pn_p = $pn_p/$params->pn_pp;
            
        //     $param = new \stdClass(); 
        //     $param->bil1 = $params->bil2;
        //     $param->pn   = $pn_p;
            
        //     /* result generate identify power */
        //     $res = $this->identifyPower($param);
        //     $data = new \stdClass();
        //     $data->res = $res;
        //     $data->val = 0;
        //     return $data;
		// 	// identifyPowerForm($bil2, $pn_p);
		// }
    }
    
    function oprQuoFracPowMCRule($params){
        $pnb = $params->pn_pp*$params->pn_pp2;
		$pna1 = ($pnb/$params->pn_pp)*$params->pn_p;
		$pna2 = ($pnb/$params->pn_pp2)*$params->pn_p2;
		$pna = $pna1-$pna2;
		$pn = $pna/$pnb;
		if(is_double($pn) == false){
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn   = $pn;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// identifyPowerForm($bil2, $pn);
		}else{
			if($pnb < 0 || $pna < 0){
				$pnb = abs($pnb);
                $pna = abs($pna);
                
                $param = new \stdClass(); 
                $param->bil = $params->bil2;
                $param->pn_p = $pna;
                $param->pn_a = $pnb;
    
                $res = $this->FracPowForm3($param);
                $data = new \stdClass();
                $data->res = $res;
                $data->val = 0;
                return $data;
				// FracPowForm3($bil2, $pna, $pnb);
			}else{
                $param = new \stdClass(); 
                $param->bil = $params->bil2;
                $param->pn_p = $pna;
                $param->pn_a = $pnb;
    
                $res = $this->FracPowForm2($param);
                $data = new \stdClass();
                $data->res = $res;
                $data->val = 0;
                return $data;
				// FracPowForm2($bil2, $pna, $pnb);
			}
        }
        
		// $pna = $params->pn_p*$params->pn;
		// $pn_p = $pna/$params->pn_p2;
		// if($pn_p%$params->pn_pp != 0){
        //     $pn_p = $pn_p/2;
            
        //     $param = new \stdClass(); 
        //     $param->bil = $params->bil2;
        //     $param->pn_p = $pn_p;
        //     $param->pn_pp = $params->pn_pp;
        //     $param->pn_a = $params->pn_a;

        //     $res = $this->FracPowForm($param);
        //     $data = new \stdClass(); 
        //     $data->res = $res;
        //     $data->val = 0;
        //     return $data;
		// 	// FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		// }else{
        //     $pn_p = $pn_p/$params->pn_pp;
            
        //     $param = new \stdClass(); 
        //     $param->bil1 = $params->bil2;
        //     $param->pn   = $pn_p;
            
        //     /* result generate identify power */
        //     $res = $this->identifyPower($param);
        //     $data = new \stdClass();
        //     $data->res = $res;
        //     $data->val = 0;
        //     return $data;
		// 	// identifyPowerForm($bil2, $pn_p);
		// }
    }
    
    function oprQuoFracPowMCRule2($params){
        $pnb = $params->pn_pp-$params->pn_pp2;
		$pn_p = $params->pn_p*$params->pn;
		$pna = $pn_p-$params->pn_p2;
		$pn = $pna/$pnb;
		if(is_double($pn) == false){
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn   = $pn;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// identifyPowerForm($bil2, $pn);
		}else{
			if($pnb < 0 || $pna < 0){
				$pnb = abs($pnb);
                $pna = abs($pna);
                
                $param = new \stdClass(); 
                $param->bil = $params->bil2;
                $param->pn_p = $pna;
                $param->pn_a = $pnb;
    
                $res = $this->FracPowForm3($param);
                $data = new \stdClass();
                $data->res = $res;
                $data->val = 0;
                return $data;
				// FracPowForm3($bil2, $pna, $pnb);
			}else{
                $param = new \stdClass(); 
                $param->bil = $params->bil2;
                $param->pn_p = $pna;
                $param->pn_a = $pnb;
    
                $res = $this->FracPowForm2($param);
                $data = new \stdClass();
                $data->res = $res;
                $data->val = 0;
                return $data;
				// FracPowForm2($bil2, $pna, $pnb);
			}
        }
        
		// $pna = $params->pn_p*$params->pn;
		// $pn_p = $pna*$params->pn_pp;
		// $pn_pp = $params->pn_p2*$params->pn_pp;
		// if($pn_p%$pn_pp != 0){
        //     $pn_p = $pn_p/2;
            
        //     $param = new \stdClass(); 
        //     $param->bil = $params->bil2;
        //     $param->pn_p = $pn_p;
        //     $param->pn_pp = $pn_pp;
        //     $param->pn_a = $params->pn_a;

        //     $res = $this->FracPowForm($param);
        //     $data = new \stdClass(); 
        //     $data->res = $res;
        //     $data->val = 0;
        //     return $data;
		// 	// FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		// }else{
        //     $pn_p = $pn_p/$pn_pp;
            
        //     $param = new \stdClass(); 
        //     $param->bil1 = $params->bil2;
        //     $param->pn   = $pn_p;
            
        //     /* result generate identify power */
        //     $res = $this->identifyPower($param);
        //     $data = new \stdClass();
        //     $data->res = $res;
        //     $data->val = 0;
        //     return $data;
		// 	// identifyPowerForm($bil2, $pn_p);
		// }
    }
    
    function oprQuoFracPowMCRule3($params){
        $pnb = $params->pn_pp-$params->pn_pp2;
		$pna = $params->pn_p-$params->pn_p2;
		$pn = $pna/$pnb;
		if(is_double($pn) == false){
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn   = $pn;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// identifyPowerForm($bil2, $pn);
		}else{
			if($pnb < 0 || $pna < 0){
				$pnb = abs($pnb);
                $pna = abs($pna);
                
                $param = new \stdClass(); 
                $param->bil = $params->bil2;
                $param->pn_p = $pna;
                $param->pn_a = $pnb;
    
                $res = $this->FracPowForm3($param);
                $data = new \stdClass();
                $data->res = $res;
                $data->val = 0;
                return $data;
				// FracPowForm3($bil2, $pna, $pnb);
			}else{
                $param = new \stdClass(); 
                $param->bil = $params->bil2;
                $param->pn_p = $pna;
                $param->pn_a = $pnb;
    
                $res = $this->FracPowForm2($param);
                $data = new \stdClass();
                $data->res = $res;
                $data->val = 0;
                return $data;
				// FracPowForm2($bil2, $pna, $pnb);
			}
        }
        
		// $bil2b = pow($params->bil2, $params->pn);
		// $bil2 = $bil2b/$params->bil2;
		// $pn_p = $params->pn_p/$params->pn_p2;
		// $pn_pp = 1;
		// if($pn_p%$pn_pp != 0){

        //     $param = new \stdClass(); 
        //     $param->bil = $bil2;
        //     $param->pn_p = $pn_p;
        //     $param->pn_pp = $pn_pp;
        //     $param->pn_a = $params->pn_a;

        //     $res = $this->FracPowForm($param);
        //     $data = new \stdClass(); 
        //     $data->res = $res;
        //     $data->val = 0;
        //     return $data;
		// 	// FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		// }else{
        //     $pn_p = $pn_p/$pn_pp;
            
        //     $param = new \stdClass(); 
        //     $param->bil1 = $params->bil2;
        //     $param->pn   = $pn_p;
            
        //     /* result generate identify power */
        //     $res = $this->identifyPower($param);
        //     $data = new \stdClass();
        //     $data->res = $res;
        //     $data->val = 0;
        //     return $data;
		// 	// identifyPowerForm($bil2, $pn_p);
		// }
    }
    
    function oprQuoFracPowMCRule4($params){
		$bil2b = pow($params->bil2, $params->pn);
		$bil2 = $bil2b/$params->bil2;
		$pn_p = $params->pn_p-$params->pn_p2;
		if($pn_p%$params->pn_pp != 0){
            $pn_p = $pn_p/2;
            $param = new \stdClass(); 
            $param->bil = $bil2;
            $param->pn_p = $pn_p;
            $param->pn_pp = $params->pn_pp;
            $param->pn_a = $params->pn_a;

            $res = $this->FracPowForm($param);
            $data = new \stdClass(); 
            $data->res = $res;
            $data->val = 0;
            return $data;
			// FracPowForm($bil2, $pn_p, $params->pn_pp, $params->pn_a);
		}else{
            $pn_p = $pn_p/$params->pn_pp;
            
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn   = $pn_p;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// identifyPowerForm($bil2, $pn_p);
		}
    }
    
    function oprPowFracPowRule($params){
		$pn_p = $params->pn_p*$params->pn;
		$pn_p = $pn_p*$params->pn; //dua kali perkalian
		if($pn_p%$params->pn_pp != 0){
            $pn_p = $pn_p/2;
            
            $param = new \stdClass(); 
            $param->bil = $params->bil2;
            $param->pn_p = $pn_p;
            $param->pn_pp = $params->pn_pp;
            $param->pn_a = $params->pn_a;

            $res = $this->FracPowForm($param);
            $data = new \stdClass(); 
            $data->res = $res;
            $data->val = 0;
            return $data;
			// FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
            $pn_p = $pn_p/$params->pn_pp;
            
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn   = $pn_p;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// identifyPowerForm($bil2, $pn_p);
		}
    }
    
    //misconception perhitungan pecahan, merujuk ke pangkat pecahan dasar
	function oprPowFracPowMCRule($params){
		$pn_p = $params->pn_p*$params->pn;
		$pn_pp = $params->pn_pp*$params->pn;
		$bil2 = pow($params->bil2,$params->pn);
		if($pn_p%$pn_pp != 0){
            $pn_a = $pn_pp;

            $param = new \stdClass(); 
            $param->bil = $bil2;
            $param->pn_p = $pn_p;
            $param->pn_pp = $pn_pp;
            $param->pn_a = $pn_a;

            $res = $this->FracPowForm($param);
            $data = new \stdClass(); 
            $data->res = $res;
            $data->val = 0;
            return $data;
			// FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
            $pn_p = $pn_p/$pn_pp;
            
            $param = new \stdClass(); 
            $param->bil1 = $bil2;
            $param->pn   = $pn_p;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// identifyPowerForm($bil2, $pn_p);
		}
	}
    
    //misconception merujuk ke power rule dan pangkat pecahan juga
	function oprPowFracPowMCRule2($params){
		$pna = $params->pn_p+$params->pn;
		$pn_p = $pna+$params->pn;
		if($pn_p%$params->pn_pp != 0){
            $pn_p = $pn_p/2;
            
            $param = new \stdClass(); 
            $param->bil = $params->bil2;
            $param->pn_p = $pn_p;
            $param->pn_pp = $params->pn_pp;
            $param->pn_a = $params->pn_a;

            $res = $this->FracPowForm($param);
            $data = new \stdClass(); 
            $data->res = $res;
            $data->val = 0;
            return $data;

			// FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
            $pn_p = $pn_p/$params->pn_pp;
            
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn   = $pn_p;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// identifyPowerForm($bil2, $pn_p);
		}
    }
    
    //misconception merujuk ke power rule dan pangkat pecahan juga
	function oprPowFracPowMCRule3($params){
		$pna = $params->pn*$params->pn_pp; //operasikan dalam penyebut dulu
		$pnb = $params->pn_p+$pna;
		$pn_p = $pnb+$params->pn;
		if($pn_p%$params->pn_pp != 0){
            $pn_p = $pn_p/2;
            
            $param = new \stdClass(); 
            $param->bil = $params->bil2;
            $param->pn_p = $pn_p;
            $param->pn_pp = $params->pn_pp;
            $param->pn_a = $params->pn_a;

            $res = $this->FracPowForm($param);
            $data = new \stdClass(); 
            $data->res = $res;
            $data->val = 0;
            return $data;

			// FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
            $pn_p = $pn_p/$params->pn_pp;
            
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn   = $pn_p;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// identifyPowerForm($bil2, $pn_p);
		}
    }

    function oprPowFracPowMCRule4($params){
		$bil2 = $params->bil2*$params->pn;
		$bil2 = $bil2*$params->pn;
		if($params->pn_p%$params->pn_pp != 0){
            $pn_a = $params->pn_pp;
            
            $param = new \stdClass(); 
            $param->bil = $bil2;
            $param->pn_p = $params->pn_p;
            $param->pn_pp = $params->pn_pp;
            $param->pn_a = $pn_a;

            $res = $this->FracPowForm($param);
            $data = new \stdClass(); 
            $data->res = $res;
            $data->val = 0;
            return $data;
			// FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
            $pn_p = $params->pn_p/$params->pn_pp;
            
            $param = new \stdClass(); 
            $param->bil1 = $params->bil2;
            $param->pn   = $pn_p;
            
            /* result generate identify power */
            $res = $this->identifyPower($param);
            $data = new \stdClass();
            $data->res = $res;
            $data->val = 0;
            return $data;
			// identifyPowerForm($bil2, $pn_p);
		}
    }
    
    public function rootsConvForm($params){
		if($params->pn%2==0){
            $pn = $params->pn/2;
            $res = "$$ ".$params->bilra ."^{{". $pn ." }} $$";
		}else{
            $res = "$$ ". $params->bilra ." ^{{ ". $params->pn ." } \\over{2}} $$";
        }
        $data = new \stdClass();
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    
    public function rootsConvMCForm($params){
		if($params->pn%3==0){
			$pn = $params->pn/3;
			$res = "$$ ". $params->bilra . "^{{1} \\over{2}} $$";		
		}else{
            $res = "$$ ". $params->bilra ." ^{{ ".  $params->pn ." } \\over{3}} $$";
        }
        $data = new \stdClass();
        $data->res = $res;
        $data->val = 0;
        return $data;
	}

    public function rootsConvMC2Form($params){
        $res = "$$ ". $params->bilra ." ^{{ ". $params->pn ." }} $$";
        $data = new \stdClass();
        $data->res = $res;
        $data->val = 0;
        return $data;
    }
    

    public function rootsConvMC3Form($params){
        $res = "$$ ". $params->bilra ." ^{{2} \\over{ ". $params->pn ." }} $$";
        $data = new \stdClass();
        $data->res = $res;
        $data->val = 0;
        return $data;
	}

	public function rootsConvMC4Form($params){
        $res = "$$ ". $params->bilra ." ^{{1} \\over{ ". $params->pn ."}} $$";
        $data = new \stdClass();
        $data->res = $res;
        $data->val = 0;
        return $data;
	}
    
    // function powproRule($params){
	// 	$pn_a = $params->pn1 * $params->pn2;
    //     $pn = $pn_a + $params->pn3;
        
    //     $param = new \stdClass(); 
    //     $param->bil1 = $params->bil1;
    //     $param->pn = $pn;
        
    //     /* result generate identify power */
    //     $res = $this->identifyPower($param);
    //     $data = new \stdClass();
    //     $data->res = $res;
    //     $data->val = 0;
    //     return $data;
    // }
    
   
    
    function powpowRule($params){
		$pn_a = $params->pn1 * $params->pn2;
        $pn = $pn_a * $params->pn3;
        
        $param = new \stdClass(); 
        $param->bil1 = $params->bil1;
        $param->pn = $pn;
        
        /* result generate identify power */
        $res = $this->identifyPower($param);
        $data = new \stdClass();
        $data->res = $res;
        $data->val = 0;
        return $data;
    }


    function idenCombPowerMultiForm($params){
		if($params->pna >= 0 && $params->pnb >= 0 && $params->pnc >= 0){
            return " $$ { ". $params->alp1 ." ^{ ". $params->pna ." }}{ ". $params->alp2 ." ^{ ". $params->pnb ."}}{". $params->alp2b ." ^{ ". $params->pnc ." }}$$";		
		}elseif($params->pna >= 0 && $params->pnb >= 0 && $params->pnc < 0){
			$pnc = abs($params->pnc);
			return "$$ { ". $params->alp1 ." ^{ ". $params->pna ."}}{ ". $params->alp2 ."^{ ". $params->pnb ." }} \\over { ". $params->alp2b ." ^{ ". $pnc ."}}$$";		
		}elseif($params->pna >= 0 && $params->pnb < 0 && $params->pnc >= 0){
			$pnb = abs($params->pnb);
			return "$$ { ". $params->alp1 ."^{ ". $params->pna ." }}{ ". $params->alp2b ." ^{ ". $params->pnc ." }} \\over { ". $params->alp2 ." ^{ ". $pnb ." }}$$";		
		}elseif($params->pna < 0 && $params->pnb >= 0 && $params->pnc >= 0){
			$pna = abs($params->pna);
			return "$$ { ". $params->alp2 ."^{ ". $params->pnb ." }}{ ". $params->alp2b ." ^{ ". $params->pnc ." }} \\over { ". $params->alp1 ." ^{ ". $pna ." }} $$";		
		}elseif($params->pna >= 0 && $params->pnb < 0 && $params->pnc < 0){
			$pnb = abs($params->pnb);
			$pnc = abs($params->pnc);
			return "$$ { ". $params->alp1 ." ^{ ". $params->pna ." }} \\over { ". $params->alp2 ."^{ ". $pnb ."}}{ ". $params->alp2b ." ^{ ". $pnc ." }} $$";		
		}elseif($params->pna < 0 && $params->pnb >= 0 && $params->pnc < 0){
			$pna = abs($params->pna);
			$pnc = abs($params->pnc);
			return "$$ { ". $params->alp2 ." ^{ ". $params->pnb ." }} \\over { ". $params->alp1 ." ^{ ". $pna ." }}{ ". $params->alp2b ." ^{ ". $pnc ."}} $$";		
		}elseif($params->pna < 0 && $params->pnb < 0 && $params->pnc >= 0){
			$pna = abs($params->pna);
			$pnb = abs($params->pnb);
			return "$$ { ". $params->alp2b ." ^{ ". $params->pnc ."}} \\over { ". $params->alp1 ." ^{ ". $pna ." }}{ ". $params->alp2 ." ^{ ". $pnb ."}}$$";		
		}else{
			$pna = abs($params->pna);
			$pnb = abs($params->pnb);
			$pnc = abs($params->pnc);
			return "$$ 1 \\over { ". $params->alp1 ." ^{ ". $pna . "}}{ ". $params->alp2 ." ^{ ". $pnb ."}}{ ". $params->alp2b ." ^{ ". $pnc ." }} $$";		
		}
	}

	function idenCombPowerMultiForm2($params){
		if($params->pnb >= 0 && $params->pnd >= 0){
			return "$$ { ". $params->alp1 ." ^{ ". $params->pna ." }}{ ". $params->alp2 ." ^{ ". $params->pnb ." }}{ ". $params->alp1b ." ^{ ". $params->pnc ." }}{ ". $params->alp2b ." ^{ ". $params->pnd ." }} $$";		
		}elseif($params->pnb >= 0 && $params->pnd < 0){
			$pnd = abs($params->pnd);
            return "$$ { ". $params->alp1 ." ^{ ". $params->pna ." }}{ ". $params->alp2 ." ^{ ". $params->pnb ." }} \\over { ".$params->alp1b." ^{ ". $params->pnc ." }}{ ".$params->alp2b." ^{ ". $pnd ." }}$$";		
		}elseif($params->pnb < 0 && $params->pnd >= 0){
			$pnb = abs($params->pnb);
			return "$$ { ". $params->alp1b ." ^{ ". $params->pnc ." }}{ ". $params->alp2b ." ^{ ". $params->pnd ."}} \\over { ". $params->alp1 ." ^{ ". $params->pna ." }}{ ". $params->alp2 ." ^{ ". $pnb ."}}$$";		
		}else{
			$pnb = abs($params->pnb);
			$pnd = abs($params->pnd);
			return "$$ 1 \\over { ". $params->alp1 ." ^{ ". $params->pna ." }} { ". $params->alp2 ." ^{ ". $pnb ." }}{ ". $params->alp1b ." ^{ ". $params->pnc ." }}{ ". $params->alp2b  ."^{ ". $pnd ." }}$$";		
		}
	}
    
    // function powproRule($bil1, $pn1, $pn2, $pn3, $var){
	// 	$pn_a = $params->pn1 * $params->pn2;
    //     $pn = $pn_a + $params->pn3;
        
    //     $param = new \stdClass(); 
    //     $param->bil1 = $params->bil1;
    //     $param->pn = $pn;
        
    //     /* result generate identify power */
    //     $res = $this->identifyPower($param);
    //     $data = new \stdClass();
    //     $data->res = $res;
    //     $data->val = 0;
    //     return $data;
    // }
    
    // function powpowRule($bil1, $pn1, $pn2, $pn3, $var){
	// 	$pn_a = $params->pn1 * $params->pn2;
    //     $pn = $pn_a*$params->pn3;
        
    //     $param = new \stdClass(); 
    //     $param->bil1 = $params->bil1;
    //     $param->pn = $pn;
        
    //     /* result generate identify power */
    //     $res = $this->identifyPower($param);
    //     $data = new \stdClass();
    //     $data->res = $res;
    //     $data->val = 0;
    //     return $data;
	// 	// identifyPowerForm($bil1, $pn);
	// }

    
    




    


    





    

    

    





    


   
}
