<?php

namespace App\Services\Math;

use Illuminate\Http\Request;

class SameBaseService
{
    public function index()
    {
        return "success";
    }

    public function createQuestion1($params)
    {
        return "$$ " .
            $params->bil1 .
            " ^{ " .
                $params->pn1 .
            " } \\times " .
            $params->bil1 .
            "^{ " .
            $params->pn2 .
            " } = $$";
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
    
    public function identifyPower ($params) {
        // $answer;
        if ($params->pn < 0) {
			$params->pn = abs($params->pn);
            $answer = "$$ 1 \over ". $params->bil1 . "^{ ". $params->pn ."} $$";		
            
		// //jika pangkat 0, maka 1
        } else if ($params->pn == 0) {
            $answer = "$$ 1 $$";		

		// //jika pangkat biasa
        } else {
            $answer = "$$ { ". $params->bil1 ."^{ ". $params->pn ."  }}$$";
            // $answer = " $${  ". $params->bil1 ." ^{ ". $params->pn ." }}$$";
        }
        return $answer;
    }
}
