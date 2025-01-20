<!--  
	Aturan pembentukan soal beserta jawaban-jawabannya

	Tipe soal : Penyederhanaan pangkat
	Prosedure benar :
		A^m = A...A
		A^0 = 1
		A^-m = 1/A...A
	Prosedure salah :
		A^m = A . m
		A^0 = 0
		A^-m = (-A)^m
		A^m = m^A
		A^m = A^m+1
		A^m = A^m-1
		A^(-m) = -A^m //**harusnya kalau ada pangkat minus

	Tipe soal : Product rule A^m . A^n
	Prosedure benar :
		A^(m+n)
	Prosedure salah :
		A^(m.n)
		A^(m-n)
		(A.A)^(m.n)
		(A.A)^(m+n) 
		(A+A)^(m+n)

	Tipe soal : Quotient rule A^m / A^n
	Prosedure benar :
		A^(m-n)
	Prosedure salah :
		A^(m.n)
		A^(m+n)
		A^(m/n)
		(-A)^(m-n)
		(A/A)^(m/n)

	Tipe soal : power to power rule (A^m)^n
	Prosedure benar :
		A^(m.n)
	Prosedure salah :
		A^(m-n)
		A^(m+n)
		(A.n)^(m)
		(A.n)^(m.n)
-->

<?php
	// function idenPowerQuestion(){
		$bil = mt_rand(2, 5); //random 2,5
		while(in_array(($pn = mt_rand(-5, 5)), array(-1, 1))); //random -5 sampai 5, tp tidak boleh mengandung nilai -1, 0, 1
		// $pn = 0;
	// }

	// function samebaseQuestion(){
		//random alphanumerik
		$bil1 = array('p', 'q', 'r', '3', '5', '6', '7');
		$bil1 = $bil1[array_rand($bil1)];
		if($bil1 == 'p' || $bil1 == 'q' || $bil1 == 'r'){
			$var = 'alp';
		}else{
			$var = 'int';
		}
		// $alp = array_rand($bil1_arr);
		// $bil1 = mt_rand(2, 5);
		// while(in_array(($pn1 = mt_rand(-10, 10)), array(0)));
		// while(in_array(($pn2 = mt_rand(-10, 10)), array(0)));
		$pn_r = array(-9, -8, -7, -6, -5, -4, -3, -2, -1, 1, 2, 3, 4, 5, 6, 7, 8, 9);
		shuffle($pn_r);
		$pn1 = $pn_r[0];
		$pn2 = $pn_r[1];
		$pn3 = $pn_r[2];
		$pn4 = $pn_r[3];
		$pn5 = $pn_r[4];
		$pn6 = $pn_r[5];
		//nilai kedua pangkatnya tidak akan sama
		//**harusnya kalau pangkat satu tidak dimunculkan angkanya
	// }

	/*function randdomsamebaseQuestion(){
		//random operator
		$opr_rnd = array(
			'pr', //untuk product rule
			'q', //untuk quotient rule
			'pp',  //untuk power to power rule
		);
	}*/
?>

<html>
<head>
	<title>basis sama - macam-macam rule</title>
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
	<h4>1. Soal tipe identifikasi pangkat sederhana (PC)</h4>
	$$<?php echo $bil ?>^{<?php echo $pn ?>}$$
	<?php
		$bil1a = powerIden($bil, $pn);
		echo $bil1a."<br/>";
		// $opt1 = powerIden($bil, $pn)[1];
		$bil1b = powerIdenMC($bil, $pn)[0];
		echo $bil1b;
		$bil1c = powerIdenMC2($bil, $pn);
		$bil1d = powerIdenMC3($bil, $pn);
		echo $bil1d."<br/>";
		$bil1e = powerIdenMC4($bil, $pn);
		echo $bil1e;
		// $opt2 = powerIdenMC($bil, $pn)[1];
		// shuffleOpt($bil1, $opt1, $opt2, $opt3, $opt4, $opt5);
	?>
	<h4>2. Soal tipe basis sama dengan prosedure product rule (PR)</h4>
	$$<?php echo $bil1 ?>^{<?php echo $pn1 ?>} \times <?php echo $bil1 ?>^{<?php echo $pn2 ?>} = $$
	<!-- pilihan ganda dihasilkan berdasarkan prosedure-prosedure tertentu -->
	<!-- option 1 adalah jawaban yang benar dengan prosedure sesuai -->
	<!-- setiap option mengandung jawaban dan nilai benar/salah -->
	<!-- setiap option dishuffle/dirandom  -->
	<?php
		// die();
		$opt1 = productRule($bil1, $pn1, $pn2, $var);
		$opt2 = quotientRule($bil1, $pn1, $pn2, $var);
		$opt3 = powerRule($bil1, $pn1, $pn2, $var);
		$opt4 = productMCRule($bil1, $pn1, $pn2, $var);
		$opt5 = productMCRule3($bil1, $pn1, $pn2, $var);
		// $opt5 = productMCRule2($bil1, $pn1, $pn2, $var);
		// shuffleOpt($bil1, $opt1, $opt2, $opt3, $opt4, $opt5);
	?>
	<h4>3. Soal tipe basis sama dengan prosedure quotient rule (QR)</h4>
	$$<?php echo $bil1 ?>^{<?php echo $pn1 ?>} : <?php echo $bil1 ?>^{<?php echo $pn2 ?>} = $$
	<?php
		$opt1 = quotientRule($bil1, $pn1, $pn2, $var);
		$opt2 = productRule($bil1, $pn1, $pn2, $var);
		$opt3 = powerRule($bil1, $pn1, $pn2, $var);
		$opt4 = quotientMCRule2($bil1, $pn1, $pn2, $var);
		$opt5 = quotientMCRule3($bil1, $pn1, $pn2, $var);
		/*shuffleOpt($bil1, $opt1, $opt2, $opt3, $opt4, $opt5);*/
	?>
	<h4>4. Soal tipe basis sama dengan power to power rule (PPR)</h4>
	$$(<?php echo $bil1 ?>^{<?php echo $pn1 ?>})^{<?php echo $pn2 ?>} = $$
	<?php
		$opt1 = powerRule($bil1, $pn1, $pn2, $var);
		$opt2 = quotientRule($bil1, $pn1, $pn2, $var);
		$opt3 = productRule($bil1, $pn1, $pn2, $var);
		$opt4 = powerMCRule($bil1, $pn1, $pn2, $var);
		$opt5 = powerMCRule2($bil1, $pn1, $pn2, $var);
		/*shuffleOpt($bil1, $bil2, $bil3, $opt1, $opt2, $opt3, $opt4, $opt5);*/
	?>
	<?php 
		if($var=='int'){
			//variablenya harus alphabet
			$bil1 = array('p', 'q', 'r');
			$bil1 = $bil1[array_rand($bil1)];
		}
	?>

</body>
</html>

<?php

	//prosedure benar product rule untuk eksponen dasar basis sama
	function productRule($bil1, $pn1, $pn2, $var){
		$pn = $pn1+$pn2;
		identifyPowerForm($bil1, $pn);
		// return $pn;
	}

	//prosedure salah/miskonsepsi product rule untuk eksponen dasar basis sama
	function productMCRule($bil1, $pn1, $pn2, $var){
		if($var == 'int'){
			$bil1 = $bil1+$bil1;
		}else{
			$bil1 = "2".$bil1;
		}
		$pn = $pn1+$pn2;
		if($pn==0) $pn = 1;
		identifyPowerForm($bil1, $pn);
		// return array($bil1, $pn);
	}

	//prosedure miskonsepsi product rule 2 untuk eksponen dasar basis sama
	function productMCRule2($bil1, $pn1, $pn2, $var){
		if($var == 'int'){
			$bil1 = $bil1*$bil1;
		}else{
			$bil1 = $bil1;
		}
		$pn = $pn1*$pn2;
		identifyPowerForm($bil1, $pn);
		// return array($bil1, $pn);
	}

	//prosedure miskonsepsi product rule 3 untuk eksponen dasar basis sama
	//mirip dengan mc1 jika pangkatnya bernilai nol
	function productMCRule3($bil1, $pn1, $pn2, $var){
		if($var == 'int'){
			$bil1 = $bil1*$bil1;
		}else{
			$bil1 = $bil1.$bil1;
		}
		$pn = $pn1+$pn2;
		if($pn==0) $pn = 1;
		/*if($pn == 0){
			$pn = abs($pn1)+abs($pn2);
			identifyPowerForm($bil1, $pn);
		}else{
			identifyPowerForm($bil1, $pn);
		}*/
		identifyPowerForm($bil1, $pn);
		// return array($bil1, $pn);
	}

	//prosedure benar quotient rule untuk eksponen dasar basis sama
	function quotientRule($bil1, $pn1, $pn2, $var){
		$pn = $pn1-$pn2;
		identifyPowerForm($bil1, $pn);
		// return $pn;
	}

	//prosedure miskonsepsi quotient rule untuk eksponen dasar basis sama
	function quotientMCRule($bil1, $pn1, $pn2, $var){
		if($var == 'int'){
			$bil1 = 0-$bil1;
		}else{
			$bil1 = "-".$bil1;
		}
		$pn = abs($pn1)-$pn2;
		identifyPowerForm($bil1, $pn);
		// return array($bil1, $pn);
	}

	//prosedure miskonsepsi quotient rule 2 untuk eksponen dasar basis sama
	function quotientMCRule2($bil1, $pn1, $pn2, $var){
		//dibulatkan pangkatnya
		$pn = $pn1/$pn2;
		$pn = round($pn, 5);
		identifyPowerForm($bil1, $pn);
		// return $pn;
	}

	//prosedure miskonsepsi quotient rule 3 untuk eksponen dasar basis sama
	//tidak berlaku (mirip dengan jawaban benar) jika pangkatnya bernilai 0
	function quotientMCRule3($bil1, $pn1, $pn2, $var){
		if($var == 'int'){
			$bil1 = $bil1/$bil1;
		}else{
			// $bil1 = "1".$bil1;
			$bil1 = "1";
		}
		$pn = $pn1-$pn2;
		/*if($pn == 0){
			$pn = $pn1/$pn2;
			$pn = round($pn, 5);
			identifyPowerForm($bil1, $pn);
		}else{
			identifyPowerForm($bil1, $pn);
		}*/
		identifyPowerForm($bil1, $pn);
		// return array($bil1, $pn);
	}

	//prosedure benar power to power rule untuk eksponen dasar basis sama
	function powerRule($bil1, $pn1, $pn2, $var){
		$pn = $pn1*$pn2;
		identifyPowerForm($bil1, $pn);
		// return $pn;
	}

	//prosedure miskonsepsi power to power rule untuk eksponen dasar basis sama
	function powerMCRule($bil1, $pn1, $pn2, $var){
		if($var == 'int'){
			$bil1 = $bil1*$pn2;
		}else{
			$bil1 = $pn2.$bil1;
		}
		$pn = $pn1;
		identifyPowerForm($bil1, $pn);
		// return array($bil1, $pn);
	}

	//prosedure miskonsepsi power to power rule 2 untuk eksponen dasar basis sama
	function powerMCRule2($bil1, $pn1, $pn2, $var){
		if($var == 'int'){
			$bil1 = $bil1*$pn2;
		}else{
			$bil1 = $pn2.$bil1;
		}
		$pn = $pn1*$pn2;
		identifyPowerForm($bil1, $pn);
		// return array($bil1, $pn);
	}

	function powerIden($bil, $pn){
		$bil = pow($bil, $pn);
		return $bil;
	}

	function powerIdenMC($bil, $pn){
		identifyPowerMCForm($bil, $pn);
	}

	function powerIdenMC2($bil, $pn){
		$temp = $pn+1;
		$pn = $bil;
		$bil = $temp;
		identifyPowerMCForm($bil, $pn);
	}

	function powerIdenMC3($bil, $pn){
		$pn = $pn+1;
		$bil = pow($bil, $pn);
		return $bil;
		// identifyPowerForm($bil, $pn);
	}

	function powerIdenMC4($bil, $pn){
		$pn = $pn+2;
		$bil = pow($bil, $pn);
		return $bil;
		// identifyPowerForm($bil, $pn);
	}

	//prosedure benar identifikasi pangkat minus/zero/biasa (konversi pangkat)
	function identifyPowerForm($bil1, $pn){
		//jika pangkat minus, maka 1/pangkat absolute
		if($pn<0){
			$pn = abs($pn);
			?>
				$$1 \over <?php echo $bil1 ?>^{<?php echo $pn ?>}$$		
			<?php

		//jika pangkat 0, maka 1
		}elseif($pn==0){
			?>
				$$1$$		
			<?php

		//jika pangkat biasa
		}else{
			?>
				$${<?php echo $bil1 ?>^{<?php echo $pn ?>}}$$
			<?php
			// $rss = '\result';
			// echo $rss;
		}
	}

	function identifyPowerMCForm($bil1, $pn){
		//jika pangkat minus, maka 1/pangkat absolute
		if($pn<0){
			$pn = abs($pn);
			$bil1 = pow($bil1, $pn);
			?>
				$$-<?php echo $bil1 ?>$$		
			<?php

		//jika pangkat 0, maka 1
		}elseif($pn==0){
			?>
				$$0$$		
			<?php

		//jika pangkat biasa
		}else{
			$bil1 = $bil1*$pn;
			// $bil1 = pow($bil1, $pn);
			?>
				$${<?php echo $bil1 ?>}$$
			<?php
			// $rss = '\result';
			// echo $rss;
		}
	}

?>