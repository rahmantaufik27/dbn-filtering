<!--  
	Aturan pembentukan soal beserta jawaban-jawabannya

	Tipe soal : basis beda - expanded power rule
	Prosedure benar :
		(A.B)^m = (A^m).(B^m)
		(A/B)^m = (A^m)/(B^m)
	Prosedure salah :

	*selain tipe, operator perkalian/pembagian disini berlaku
-->

<?php
	// function diffbaseQuestion(){
		//**harusnya beda antara bil1 dan bil2
		// $bil1 = mt_rand(2, 5);
		// $bil2 = mt_rand(2, 5);
		$bil_r = array(2, 3, 5);
		shuffle($bil_r);
		$bil1 = $bil_r[0];
		$bil2 = $bil_r[1];
		// while(in_array(($pn1 = mt_rand(-10, 10)), array(0)));
		// while(in_array(($pn2 = mt_rand(-10, 10)), array(0)));
		//**harusnya jangan keluar pangkat 0 dikedua pangkat
		$pn1 = mt_rand(-2, 3);
		$pn2 = mt_rand(-2, 3);
		while(in_array(($pn3 = mt_rand(-2, 3)), array(0, 1)));
		//random operator
		/*$opr_rnd = array('*', ':');
		$opr = $opr_rnd[array_rand($opr_rnd)];*/
	// }
?>

<html>
<head>
	<title>basis beda - expanded power rule</title>
	<!-- mathematical markup language javascript (MathJax) -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
	<script type="text/x-mathjax-config">
	MathJax.Hub.Config({
		jax: ["input/TeX","output/HTML-CSS"],
		displayAlign: "left",
		tex2jax: {inlineMath: [["$","$"],["\\(","\\)"]]}
	});
	</script>
	<style>
		a{
			text-decoration: none;
		}
	</style>
</head>

<body>
	<h4>6. Soal tipe basis beda dengan prosedure expanded power rule perkalian/pembagian</h4>
	$$(<?php echo $bil1 ?>^{<?php echo $pn1 ?>} \times <?php echo $bil2 ?>^{<?php echo $pn2 ?>})^{<?php echo $pn3 ?>} = $$
	<?php
		// bertindak sebagai operator
		$opr = "*";
		$opt1 = expandedRule($bil1, $bil2, $pn1, $pn2, $pn3, $opr);
		echo round($opt1, 5)."<br/>";
		//**hindari hasil E+2 dsb
		// echo sprintf('%.6f', $opt1)."<br/>";
		$opt2 = expandedMCRule($bil1, $bil2, $pn1, $pn2, $pn3, $opr);
		echo round($opt2, 5)."<br/>";
		$opt3 = expandedMCRule2($bil1, $bil2, $pn1, $pn2, $pn3, $opr);
		echo round($opt3, 5)."<br/>";
		// $opt4 = expandedMCRule3($bil1, $bil2, $pn1, $pn2, $pn3, $opr);
		// echo round($opt4, 5)."<br/>";
		$opt5 = expandedMCRule4($bil1, $bil2, $pn1, $pn2, $pn3, $opr);
		echo round($opt5, 5)."<br/>";
		$opt6 = expandedMCRule5($bil1, $bil2, $pn1, $pn2, $pn3, $opr);
		echo round($opt6, 5)."<br/>";
		// $opt7 = expandedMCRule6($bil1, $bil2, $pn1, $pn2, $pn3, $opr);
		// echo round($opt7, 7)."<br/>";
	?>
	$$\left(<?php echo $bil1 ?>^{<?php echo $pn1 ?>} \over <?php echo $bil2 ?>^{<?php echo $pn2 ?>}\right)^{<?php echo $pn3 ?>} = $$
	<?php
		// bertindak sebagai operator
		$opr = ":";
		$opt1 = expandedRule($bil1, $bil2, $pn1, $pn2, $pn3, $opr);
		echo round($opt1, 5)."<br/>";
		//**hindari hasil E+2 dsb
		// echo sprintf('%.6f', $opt1)."<br/>";
		$opt2 = expandedMCRule($bil1, $bil2, $pn1, $pn2, $pn3, $opr);
		echo round($opt2, 5)."<br/>";
		$opt3 = expandedMCRule2($bil1, $bil2, $pn1, $pn2, $pn3, $opr);
		echo round($opt3, 5)."<br/>";
		// $opt4 = expandedMCRule3($bil1, $bil2, $pn1, $pn2, $pn3, $opr);
		// echo round($opt4, 5)."<br/>";
		$opt5 = expandedMCRule4($bil1, $bil2, $pn1, $pn2, $pn3, $opr);
		echo round($opt5, 5)."<br/>";
		$opt6 = expandedMCRule5($bil1, $bil2, $pn1, $pn2, $pn3, $opr);
		echo round($opt6, 5)."<br/>";
		// $opt7 = expandedMCRule6($bil1, $bil2, $pn1, $pn2, $pn3, $opr);
		// echo round($opt7, 7)."<br/>";
	?>
</body>
</html>

<?php
	
	//prosedure benar expanded power rule untuk basis beda
	function expandedRule($bil1, $bil2, $pn1, $pn2, $pn3, $opr){
		$pn1 = $pn1*$pn3;
		$pn2 = $pn2*$pn3;
		$bil1 = pow($bil1, $pn1);
		$bil2 = pow($bil2, $pn2);
		if($opr=="*"){
			$res = $bil1*$bil2;
		}else{
			$res = $bil1/$bil2;
		}
		// identifyPower($res, $pn);
		return $res;
	}

	//prosedure miskonsepsi expanded power rule untuk basis beda
	function expandedMCRule($bil1, $bil2, $pn1, $pn2, $pn3, $opr){
		$pn1 = $pn1*$pn3;
		$pn2 = $pn2*$pn3;
		if($opr=="*"){
			$pn = $pn1+$pn2;
			$bil = $bil1*$bil2;
		}else{
			$pn = $pn1-$pn2;
			$bil = $bil1/$bil2;
		}
		$res = pow($bil, $pn);
		return $res;
	}

	//sama dengan miskonsepsi pertama jika pangka diluar satu
	function expandedMCRule2($bil1, $bil2, $pn1, $pn2, $pn3, $opr){
		$bil1 = pow($bil1, $pn1);
		$bil2 = pow($bil2, $pn2);
		if($opr=="*"){
			$bil = $bil1*$bil2;
		}else{
			$bil = $bil1/$bil2;
		}
		$res = $bil*$pn3;
		return $res;
	}

	//sama dengan miskonsepsi pertama jika kedua bilangannya sama dan hasil pangkatnya 0
	function expandedMCRule3($bil1, $bil2, $pn1, $pn2, $pn3, $opr){
		$pn1 = $pn1*$pn3;
		$pn2 = $pn2*$pn3;
		$pn = $pn1+$pn2;
		$bil = $bil1+$bil2;
		$res = pow($bil, $pn);
		return $res;
	}

	function expandedMCRule4($bil1, $bil2, $pn1, $pn2, $pn3, $opr){
		// $pn1 = $pn1*$pn3;
		// $pn2 = $pn2*$pn3;
		$pn = $pn1*$pn2*$pn3;
		if($opr=="*"){
			$bil = $bil1*$bil2;
		}else{
			$bil = $bil1/$bil2;
		}
		$res = pow($bil, $pn);
		return $res;
	}

	//sama dengan miskonsepsi keempat jika hasil pangkatnya 0 atau sama, tapi kemungkinannya kecil
	function expandedMCRule5($bil1, $bil2, $pn1, $pn2, $pn3, $opr){
		// $pn1 = $pn1+$pn3;
		// $pn2 = $pn2+$pn3;
		$pn = $pn1+$pn2+$pn3;
		if($pn == 0){
			$pn = abs($pn1)+abs($pn2)+abs($pn3); //diabsolutekan, menghindari pangkat bernilai 0
		}
		if($opr=="*"){
			$bil = $bil1*$bil2;
		}else{
			$bil = $bil1/$bil2;
		}
		$res = pow($bil, $pn);
		return $res;
	}

	//sama dengan miskonsepsi pertama
	function expandedMCRule6($bil1, $bil2, $pn1, $pn2, $pn3, $opr){
		$pn = $pn1+$pn2;
		$pn = $pn*$pn3;
		$bil = $bil1*$bil2;
		$res = pow($bil, $pn);
		return $res;
	}


?>