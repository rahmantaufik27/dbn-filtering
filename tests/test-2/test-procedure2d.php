<?php
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
		$pn_r = array(-5, -4, -3, -2, -1, 2, 3, 4, 5);
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
	<?php 
		if($var=='int'){
			//variablenya harus alphabet
			$bil1 = array('p', 'q', 'r');
			$bil1 = $bil1[array_rand($bil1)];
		}
	?>
	<h4>8. Soal tipe basis sama dengan kombinasi antar rule (COR3)</h4>
	$${\left(<?php echo $bil1 ?>^{<?php echo $pn1 ?>} \over <?php echo $bil1 ?>^{<?php echo $pn2 ?>} \right)^{<?php echo $pn3 ?>}} \times {<?php echo $bil1 ?>^{<?php echo $pn4 ?>} \over (<?php echo $bil1 ?>^{<?php echo $pn5 ?>})^{<?php echo $pn6 ?>}} = $$
	<?php
		$opt1 = combinationRule($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
		$opt2 = combinationMCRule($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
		$opt3 = combinationMCRule2($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
		$opt4 = combinationMCRule3($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
		$opt5 = combinationMCRule4($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
	?>
	<h4>9. Soal tipe basis sama dengan kombinasi antar rule (COR3)</h4>
	$${<?php echo $bil1 ?>^{<?php echo $pn1 ?>}} \times {\left(\sqrt{<?php echo $bil1 ?>^{<?php echo $pn2 ?>} \over <?php echo $bil1 ?>^{<?php echo $pn3 ?>}} \right)^{<?php echo $pns2 ?>}} \times {(<?php echo $bil1 ?>^{<?php echo $pn5 ?>})^{<?php echo $pn6 ?>}} = $$
	<?php
		$opt1 = combination2Rule($bil1, $pn1, $pn2, $pn3, $pns2, $pn5, $pn6); //pn4 diganti jadi pns2
		$opt2 = combination2MCRule($bil1, $pn1, $pn2, $pn3, $pns2, $pn5, $pn6);
		$opt3 = combination2MCRule2($bil1, $pn1, $pn2, $pn3, $pns2, $pn5, $pn6);
		$opt4 = combination2MCRule3($bil1, $pn1, $pn2, $pn3, $pns2, $pn5, $pn6);
		$opt5 = combination2MCRule4($bil1, $pn1, $pn2, $pn3, $pns2, $pn5, $pn6);
	?>
	<h4>10. Soal tipe basis sama dengan kombinasi antar rule (COR3)</h4>
	$${{\left(<?php echo $bil1 ?>^{<?php echo $pns4 ?>} \over (<?php echo $bil1 ?>^{<?php echo $pns1 ?>})^{<?php echo $pns1b ?>} \right)^{<?php echo $pns1c ?>}} \times {<?php echo $bil1; ?>^{<?php echo $pns1d.$pns4 ?>}} = {<?php echo $bil1; ?>^{<?php echo $pns1e ?>}}}$$
	<?php echo "Nilai ".$pns4." adalah...<br/>"; ?>
	<?php
		$opt1 = combination3Rule($bil1, $pns4, $pns1, $pns1b, $pns1c, $pns1d, $pns1e);
		echo round($opt1, 3)."<br/>";
		$opt2 = combination3MCRule($bil1, $pns4, $pns1, $pns1b, $pns1c, $pns1d, $pns1e);
		echo round($opt2, 3)."<br/>";
		$opt3 = combination3MCRule2($bil1, $pns4, $pns1, $pns1b, $pns1c, $pns1d, $pns1e);
		echo round($opt3, 3)."<br/>";
		$opt4 = combination3MCRule3($bil1, $pns4, $pns1, $pns1b, $pns1c, $pns1d, $pns1e);
		echo round($opt4, 3)."<br/>";
		$opt5 = combination3MCRule4($bil1, $pns4, $pns1, $pns1b, $pns1c, $pns1d, $pns1e);
		echo round($opt5, 3)."<br/>";
	?>
	<h4>11. Soal tipe basis sama dengan kombinasi antar rule (COR3)</h4>
	$${\left({<?php echo $bil1 ?>^{<?php echo $pn1 ?>} \times <?php echo $bil1 ?>^{{<?php echo $pns3 ?>} \over {<?php echo $pn5 ?>}}} \over (<?php echo $bil1 ?>^{<?php echo $pn3 ?>})^{<?php echo $pn4 ?>} \right)^{<?php echo $pn5 ?>}} = $$
	<?php
		$opt1 = combination4Rule($bil1, $pn1, $pns3, $pn3, $pn4, $pn5, $pn6);
		$opt2 = combination4MCRule($bil1, $pn1, $pns3, $pn3, $pn4, $pn5, $pn6);
		$opt3 = combination4MCRule2($bil1, $pn1, $pns3, $pn3, $pn4, $pn5, $pn6);
		$opt4 = combination4MCRule3($bil1, $pn1, $pns3, $pn3, $pn4, $pn5, $pn6);
		$opt5 = combination4MCRule4($bil1, $pn1, $pns3, $pn3, $pn4, $pn5, $pn6);
	?>

</body>
</html>

<?php

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

	function combinationRule($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn1 = $pn1*$pn3; //harusnya pake fungsi power rule
		$pn2 = $pn2*$pn3;
		$pn_a = $pn1-$pn2;  //harusnya pake fungsi quotient rule
		$pn5 = $pn5*$pn6;
		$pn_b = $pn4-$pn5;
		$pn = $pn_a + $pn_b;  //harusnya pake fungsi product rule
		identifyPowerForm($bil1, $pn);
	}

	//kalau siswa pilih kombinasi ini, maka miskonsepsinya ditambah quotient rule
	function combinationMCRule($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn1 = $pn1*$pn3;
		$pn2 = $pn2*$pn3;
		$pn_a = $pn1/$pn2;  //harusnya pake fungsi quotient mc rule
		$pn5 = $pn5*$pn6;
		$pn_b = $pn4/$pn5;
		$pn = $pn_a + $pn_b;
		identifyPowerForm($bil1, $pn);
	}

	//kalau siswa pilih kombinasi ini, maka miskonsepsinya ditambah product rule
	function combinationMCRule2($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn1 = $pn1*$pn3;
		$pn2 = $pn2*$pn3;
		$pn_a = $pn1-$pn2;
		$pn5 = $pn5*$pn6;
		$pn_b = $pn4-$pn5;
		$pn = $pn_a * $pn_b;
		identifyPowerForm($bil1, $pn);
	}

	//kalau siswa pilih kombinasi ini, maka miskonsepsinya ditambah power rule
	function combinationMCRule3($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn1 = $pn1+$pn3;
		$pn2 = $pn2+$pn3;
		$pn_a = $pn1-$pn2;
		$pn5 = $pn5+$pn6;
		$pn_b = $pn4-$pn5;
		$pn = $pn_a + $pn_b;
		identifyPowerForm($bil1, $pn);
	}	

	//kalau siswa pilih kombinasi ini, maka miskonsepsinya ditambah quotient rule, power rule dan product rule
	function combinationMCRule4($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn1 = $pn1+$pn3;
		$pn2 = $pn2+$pn3;
		if($pn2==0) $pn2 = 1; //pembaginya tidak boleh 0
		$pn_a = $pn1/$pn2;
		$pn5 = $pn5+$pn6;
		if($pn5==0) $pn5 = 1;
		$pn_b = $pn4/$pn5;
		$pn = $pn_a * $pn_b;
		identifyPowerForm($bil1, $pn);
	}

	function combination2Rule($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn_a = $pn1;
		$pn_b = $pn2-$pn3;
		$pn_c = $pn5*$pn6;
		$pn = $pn_a+$pn_b+$pn_c;
		identifyPowerForm($bil1, $pn);
	}

	function combination2MCRule($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		if($pn3==0) $pn3 = 1;
		$pn_a = $pn1;
		$pn_b = $pn2/$pn3;
		$pn_c = $pn5*$pn6;
		$pn = $pn_a+$pn_b+$pn_c;
		identifyPowerForm($bil1, $pn);
	}

	function combination2MCRule2($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn_a = $pn1;
		$pn2 = $pn2*$pn4;
		$pn3 = $pn3*$pn4;
		$pn_b = $pn2-$pn3;
		$pn_c = $pn5*$pn6;
		$pn = $pn_a+$pn_b+$pn_c;
		identifyPowerForm($bil1, $pn);
	}

	function combination2MCRule3($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn_a = $pn1;
		$pn2 = $pn2*$pn4;
		$pn3 = $pn3*$pn4;
		$pn_b = $pn2-$pn3;
		$pn_c = $pn5+$pn6;
		$pn = $pn_a+$pn_b+$pn_c;
		identifyPowerForm($bil1, $pn);
	}

	function combination2MCRule4($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		if($pn3==0) $pn3 = 1;
		$pn_a = $pn1;
		$pn_b = $pn2/$pn3;
		$pn_c = $pn5+$pn6;
		$pn = $pn_a*$pn_b*$pn_c;
		identifyPowerForm($bil1, $pn);
	}

	function combination3Rule($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn_a = (1*$pn4)+$pn5;
		$pn2 = $pn2*$pn3*$pn4;
		$pn_b = $pn6+$pn2;
		$res = $pn_b/$pn_a;
		return $res;
		// identifyPowerForm($bil1, $pn);
	}

	function combination3MCRule($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn_a = (1*$pn4)+$pn5;
		$pn2 = $pn2*$pn3*$pn4;
		$pn_b = $pn6-$pn2;
		$res = $pn_b/$pn_a;
		return $res;
		// identifyPowerForm($bil1, $pn);
	}

	function combination3MCRule2($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn_a = (1*$pn4)*$pn5;
		$pn2 = $pn2*$pn3*$pn4;
		$pn_b = $pn6+$pn2;
		$res = $pn_b/$pn_a;
		return $res;
		// identifyPowerForm($bil1, $pn);
	}

	function combination3MCRule3($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn_a = (1*$pn4)+$pn5;
		$pn2 = $pn2+$pn3+$pn4;
		$pn_b = $pn6+$pn2;
		$res = $pn_b/$pn_a;
		return $res;
		// identifyPowerForm($bil1, $pn);
	}

	function combination3MCRule4($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn_a = (1*$pn4)*$pn5;
		$pn2 = $pn2+$pn3+$pn4;
		$pn_b = $pn6-$pn2;
		$res = $pn_b/$pn_a;
		return $res;
		// identifyPowerForm($bil1, $pn);
	}

	function combination4Rule($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn_a = ($pn1*$pn5)+$pn2;
		$pn_b = $pn3*$pn4*$pn5;
		$pn = $pn_a-$pn_b;
		identifyPowerForm($bil1, $pn);
	}

	function combination4MCRule($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn_a = ($pn1*$pn5)+$pn2;
		$pn_b = $pn3*$pn4*$pn5;
		$pn = $pn_a/$pn_b;
		identifyPowerForm($bil1, $pn);
	}

	function combination4MCRule2($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn_a = ($pn1+$pn2)*$pn5;
		$pn_b = $pn3*$pn4*$pn5;
		$pn = $pn_a-$pn_b;
		identifyPowerForm($bil1, $pn);
	}

	function combination4MCRule3($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn_a = ($pn1*$pn2)+$pn5;
		$pn_b = $pn3+$pn4+$pn5;
		$pn = $pn_a-$pn_b;
		identifyPowerForm($bil1, $pn);
	}

	function combination4MCRule4($bil1, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn_a = ($pn1+$pn5)*$pn2;
		$pn_b = $pn3+$pn4+$pn5;
		$pn = $pn_a-$pn_b;
		identifyPowerForm($bil1, $pn);
	}
?>