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

		$pn_r = array(-9, -8, -7, -6, -5, -4, -3, -2, -1, 1, 2, 3, 4, 5, 6, 7, 8, 9);
		shuffle($pn_r);
		$pn1 = $pn_r[0];
		$pn2 = $pn_r[1];
		$pn3 = $pn_r[2];
	// }
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
	<h4>2b. Soal tipe basis sama dengan prosedure product rule dan quotient rule</h4>
	$$<?php echo $bil1 ?>^{<?php echo $pn1 ?>} \times <?php echo $bil1 ?>^{<?php echo $pn2 ?>} : <?php echo $bil1 ?>^{<?php echo $pn3 ?>} = $$
	<?php
		$opt1 = proqueRule($bil1, $pn1, $pn2, $pn3, $var);
		$opt2 = proproRule($bil1, $pn1, $pn2, $pn3, $var);
		$opt3 = powproRule($bil1, $pn1, $pn2, $pn3, $var);
		$opt4 = powqueRule($bil1, $pn1, $pn2, $pn3, $var);
		$opt5 = powpowRule($bil1, $pn1, $pn2, $pn3, $var);
	?>
	<h4>2c. Soal tipe basis sama dengan prosedure product rule dan power rule</h4>
	$$(<?php echo $bil1 ?>^{<?php echo $pn1 ?>})^{<?php echo $pn2 ?>} \times <?php echo $bil1 ?>^{<?php echo $pn3 ?>} = $$
	<?php
		$opt1 = powproRule($bil1, $pn1, $pn2, $pn3, $var);
		$opt2 = proqueRule($bil1, $pn1, $pn2, $pn3, $var);
		$opt3 = proproRule($bil1, $pn1, $pn2, $pn3, $var);
		$opt4 = powqueRule($bil1, $pn1, $pn2, $pn3, $var);
		$opt5 = powpowRule($bil1, $pn1, $pn2, $pn3, $var);
	?>
	<h4>2d. Soal tipe basis sama dengan prosedure power rule dan quotient rule</h4>
	$${(<?php echo $bil1 ?>^{<?php echo $pn1 ?>})^{<?php echo $pn2 ?>} \over <?php echo $bil1 ?>^{<?php echo $pn3 ?>}} = $$
	<?php
		$opt1 = powqueRule($bil1, $pn1, $pn2, $pn3, $var);
		$opt2 = proqueRule($bil1, $pn1, $pn2, $pn3, $var);
		$opt3 = powproRule($bil1, $pn1, $pn2, $pn3, $var);
		$opt4 = proproRule($bil1, $pn1, $pn2, $pn3, $var);
		$opt5 = powpowRule($bil1, $pn1, $pn2, $pn3, $var);
	?>
</body>
</html>

<?php

	function proproRule($bil1, $pn1, $pn2, $pn3, $var){
		$pn_a = $pn1+$pn2;
		$pn = $pn_a+$pn3;
		identifyPowerForm($bil1, $pn);
	}

	function proqueRule($bil1, $pn1, $pn2, $pn3, $var){
		$pn_a = $pn1+$pn2;
		$pn = $pn_a-$pn3;
		identifyPowerForm($bil1, $pn);
	}

	function powproRule($bil1, $pn1, $pn2, $pn3, $var){
		$pn_a = $pn1*$pn2;
		$pn = $pn_a+$pn3;
		identifyPowerForm($bil1, $pn);
	}

	function powqueRule($bil1, $pn1, $pn2, $pn3, $var){
		$pn_a = $pn1*$pn2;
		$pn = $pn_a-$pn3;
		identifyPowerForm($bil1, $pn);
	}

	function powpowRule($bil1, $pn1, $pn2, $pn3, $var){
		$pn_a = $pn1*$pn2;
		$pn = $pn_a*$pn3;
		identifyPowerForm($bil1, $pn);
	}

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