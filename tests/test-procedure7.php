<!--  
	akar-akaran
-->

<?php
	// function alpFracPowQuestion(){
		$bil1 = array('a', 'b', 'c');
		$bil1 = $bil1[array_rand($bil1)];
		// $bil2 = mt_rand(3, 5);
		// $pn = mt_rand(1, 5);
		$p = array(2, 3);
		$p = $p[array_rand($p)];
		if($p == 2){
			$pn_p = array(2, 6, 10, 14, 18); //pangkat pembilang
			$pn_p = $pn_p[array_rand($pn_p)];
			$pn_pp = 4; //pangkat penyebut
			$pn_a = " "; //pangkar diluar akar
		}else{
			$pn_p = array(2, 4, 8, 10, 14); //pangkat pembilang kedua
			$pn_p = $pn_p[array_rand($pn_p)];
			$pn_pp = 6;
			$pn_a = "3";
		}
	// }

	// function simFracPowQuestion(){
		$bil2 = mt_rand(2, 3);
		$pn = mt_rand(2, 3);
	// }

	// function opsFracPowQuestion(){
		// $bil2 = mt_rand(2, 3);
		// $pn = mt_rand(1, 5);
	// }
?>

<html>
<head>
	<title>basis pangkat pecahan</title>
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
	<h4>15. Soal tipe basis pangkat pecahan dasar</h4>
	$$<?php echo $bil1 ?>^{{<?php echo $pn_p ?>\over<?php echo $pn_pp ?>}}=$$
	<?php
		alpFracPowRule($bil1, $pn_p, $pn_pp, $pn_a);
		alpFracPowMCRule($bil1, $pn_p, $pn_pp, $pn_a);
		alpFracPowMCRule2($bil1, $pn_p, $pn_pp, $pn_a);
		alpFracPowMCRule3($bil1, $pn_p, $pn_pp, $pn_a);
		alpFracPowMCRule4($bil1, $pn_p, $pn_pp, $pn_a);
	?>
	<h4>16. Soal tipe penyederhanaan basis pangkat pecahan</h4>
	<?php
		$bil2_r = pow($bil2, $pn);
	?>
	$$<?php echo $bil2_r ?>^{{<?php echo $pn_p ?>\over<?php echo $pn_pp ?>}}=$$
	<?php
		simfracPowRule($bil2, $pn, $pn_p, $pn_pp, $pn_a);
		simfracPowMCRule($bil2, $pn, $pn_p, $pn_pp, $pn_a);
		simfracPowMCRule2($bil2, $pn, $pn_p, $pn_pp, $pn_a);
		simfracPowMCRule3($bil2_r, $pn, $pn_p, $pn_pp, $pn_a); //bilangannya tidak disederhanakan
		simfracPowMCRule4($bil2_r, $pn, $pn_p, $pn_pp, $pn_a);
	?>
	<h4>17. Soal tipe operasi basis pangkat pecahan</h4>

</body>
</html>

<?php

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

	function FracPowForm($bil, $pn_p, $pn_pp, $pn_a){
		?>
			$$\sqrt[<?php echo $pn_a ?>]{<?php echo $bil ?>^{<?php echo $pn_p ?>}}$$
		<?php
	}

	function FracPowMCForm($bil, $pn_p, $pn_pp, $pn_a){
		?>
			$$\sqrt[<?php echo $pn_a ?>]{<?php echo $pn_p ?><?php echo $bil ?>}$$
		<?php
	}

	function alpFracPowRule($bil1, $pn_p, $pn_pp, $pn_a){
		$pn_p = $pn_p/2;
		FracPowForm($bil1, $pn_p, $pn_pp, $pn_a);
	}

	function alpFracPowMCRule($bil1, $pn_p, $pn_pp, $pn_a){
		$pn_p = $pn_p/2;
		$temp = $pn_p;
		$pn_p = $pn_pp/2;
		$pn_a = $temp;
		FracPowForm($bil1, $pn_p, $pn_pp, $pn_a);
	}

	function alpFracPowMCRule2($bil1, $pn_p, $pn_pp, $pn_a){
		$pn_a = $pn_pp;
		FracPowMCForm($bil1, $pn_p, $pn_pp, $pn_a);
	}

	function alpFracPowMCRule3($bil1, $pn_p, $pn_pp, $pn_a){
		$temp = $pn_p;
		$pn_p = $pn_pp;
		$pn_a = $temp;
		FracPowForm($bil1, $pn_p, $pn_pp, $pn_a);
	}

	function alpFracPowMCRule4($bil1, $pn_p, $pn_pp, $pn_a){
		$pn_p = $pn_p/2;
		FracPowMCForm($bil1, $pn_p, $pn_pp, $pn_a);
	}

	//harusnya bisa lebih disederhanakan lagi tapi malas
	function simfracPowRule($bil2, $pn, $pn_p, $pn_pp, $pn_a){
		$pn_p = $pn*$pn_p;
		if($pn_p%$pn_pp == 0){
			$pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}else{
			$pn_p = $pn_p/2;
			$pn_pp = $pn_pp/2;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}
	}

	function simfracPowMCRule($bil2, $pn, $pn_p, $pn_pp, $pn_a){
		// $pn_p = $pn*$pn_p;
		if($pn_p%$pn_pp == 0){
			// $pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}else{
			// $pn_p = $pn_p/2;
			$pn_a = $pn_pp;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}
	}


	function simfracPowMCRule2($bil2, $pn, $pn_p, $pn_pp, $pn_a){
		// $pn_p = $pn*$pn_p;
		if($pn_p%$pn_pp == 0){
			// $pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}else{
			$pn_p = $pn_p*2;
			$pn_a = $pn_pp;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}
	}

	function simfracPowMCRule3($bil2, $pn, $pn_p, $pn_pp, $pn_a){
		// $pn_p = $pn*$pn_p;
		if($pn_p%$pn_pp == 0){
			// $pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}else{
			// $pn_p = $pn_p/2;
			$pn_a = $pn_pp;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}
	}

	function simfracPowMCRule4($bil2, $pn, $pn_p, $pn_pp, $pn_a){
		$pn_p = $pn*$pn_p;
		if($pn_p%$pn_pp == 0){
			$pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}else{
			$pn_p = $pn_p/2;
			$pn_pp = $pn_pp/2;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}
	}

?>