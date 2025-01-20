<?php

namespace App\Services\ML;

// use Illuminate\Http\Request;
// use RtLopez\Decimal;
class ConvertionScore
{
    public function convertScore ($sc, $idPackage) {
        /*if ($idPackage == 4 || $idPackage == 5){ //cek idpackage di student
    		if($sc <= 139){
    			if($sc > 99 && $sc <= 139){
    				$gr = "C";
    			}elseif($sc > 69 && $sc <= 99){
    				$gr = "D";
    			}else{
    				$gr = "E";
    			}
    		}else{
    			if($sc > 139 && $sc <= 159){
    				$gr = "B";
    			}else{
    				$gr = "A";
    			}
    		}
    	}else{
    		if($sc <= 75){
    			if($sc > 65 && $sc <= 75){
    				$gr = "C";
    			}elseif($sc > 50 && $sc <= 65){
    				$gr = "D";
    			}else{
    				$gr = "E";
    			}
    		}else{
    			if($sc > 75 && $sc <= 80){
    				$gr = "B";
    			}else{
    				$gr = "A";
    			}
    		}	
    	}*/
    	if ($idPackage == 4 || $idPackage == 5){ //cek idpackage di student
    		if($sc <= 150){
    			if($sc > 100 && $sc <= 150){
    				$gr = "C";
    			}elseif($sc > 50 && $sc <= 100){
    				$gr = "D";
    			}else{
    				$gr = "E";
    			}
    		}else{
    			if($sc > 150 && $sc <= 170){
    				$gr = "B";
    			}else{
    				$gr = "A";
    			}
    		}
    	}else{
    		if($sc <= 75){
    			if($sc > 50 && $sc <= 75){
    				$gr = "C";
    			}elseif($sc > 25 && $sc <= 50){
    				$gr = "D";
    			}else{
    				$gr = "E";
    			}
    		}else{
    			if($sc > 75 && $sc <= 85){
    				$gr = "B";
    			}else{
    				$gr = "A";
    			}
    		}	
    	}
        return $gr;
    }
}