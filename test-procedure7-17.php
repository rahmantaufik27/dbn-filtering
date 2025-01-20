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
	$$\left({<?php echo $bil2_r ?>^{{<?php echo $pn_p ?>\over<?php echo $pn_pp ?>}}}\right)^<?php echo $pn ?>=$$
	<?php
		oprPowFracPowRule($bil2, $pn, $pn_p, $pn_pp, $pn_a);
		oprPowFracPowMCRule($bil2, $pn, $pn_p, $pn_pp, $pn_a);
		oprPowFracPowMCRule2($bil2, $pn, $pn_p, $pn_pp, $pn_a);
		oprPowFracPowMCRule3($bil2, $pn, $pn_p, $pn_pp, $pn_a);
		oprPowFracPowMCRule4($bil2, $pn, $pn_p, $pn_pp, $pn_a);
	?>
	<!-- $$\left({<?php echo $bil2_r ?>^{{<?php echo $pn_p ?>\over<?php echo $pn_pp ?>}} \times {{<?php echo $bil2_r3 ?>^{{<?php echo $pn_p ?>\over<?php echo $pn_pp ?>}}}}}\right)^<?php echo $pn ?>=$$ -->
	$${<?php echo $bil2_r ?>^{{<?php echo $pn_p ?>\over<?php echo $pn_pp ?>}} \times {<?php echo $bil2 ?>^{{<?php echo $pn_p2 ?>\over<?php echo $pn_pp ?>}}}}=$$
	<?php
		oprProFracPowRule($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a);
		oprProFracPowMCRule($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a);
		oprProFracPowMCRule2($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a);
		oprProFracPowMCRule3($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a);
		oprProFracPowMCRule4($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a);
	?>
	$${{<?php echo $bil2_r ?>^{{<?php echo $pn_p ?>\over<?php echo $pn_pp ?>}}}\over{<?php echo $bil2 ?>^{{<?php echo $pn_p2 ?>\over<?php echo $pn_pp ?>}}}} =$$
	<?php
		oprQuoFracPowRule($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a);
		oprQuoFracPowMCRule($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a);
		oprQuoFracPowMCRule2($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a);
		oprQuoFracPowMCRule3($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a);
		oprQuoFracPowMCRule4($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a);
	?>
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
		//harusnya dibagian dalam akar di masukan ke dalam function identifypowerform
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

	function oprPowFracPowRule($bil2, $pn, $pn_p, $pn_pp, $pn_a){
		$pn_p = $pn_p*$pn;
		$pn_p = $pn_p*$pn; //dua kali perkalian
		if($pn_p%$pn_pp != 0){
			$pn_p = $pn_p/2;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
			$pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}
	}

	//misconception perhitungan pecahan, merujuk ke pangkat pecahan dasar
	function oprPowFracPowMCRule($bil2, $pn, $pn_p, $pn_pp, $pn_a){
		$pn_p = $pn_p*$pn;
		$pn_pp = $pn_pp*$pn;
		$bil2 = pow($bil2,$pn);
		if($pn_p%$pn_pp != 0){
			$pn_a = $pn_pp;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
			$pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}
	}

	//misconception merujuk ke power rule dan pangkat pecahan juga
	function oprPowFracPowMCRule2($bil2, $pn, $pn_p, $pn_pp, $pn_a){
		$pna = $pn_p+$pn;
		$pn_p = $pna+$pn;
		if($pn_p%$pn_pp != 0){
			$pn_p = $pn_p/2;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
			$pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}
	}

	//misconception merujuk ke power rule dan pangkat pecahan juga
	function oprPowFracPowMCRule3($bil2, $pn, $pn_p, $pn_pp, $pn_a){
		$pna = $pn*$pn_pp; //operasikan dalam penyebut dulu
		$pnb = $pn_p+$pna;
		$pn_p = $pnb*$pn;
		if($pn_p%$pn_pp != 0){
			$pn_p = $pn_p/2;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
			$pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}
	}

	function oprPowFracPowMCRule4($bil2, $pn, $pn_p, $pn_pp, $pn_a){
		$bil2 = $bil2*$pn;
		$bil2 = $bil2*$pn;
		if($pn_p%$pn_pp != 0){
			$pn_a = $pn_pp;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
			$pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}
	}

	function oprProFracPowRule($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a){
		$pna = $pn_p*$pn;
		$pn_p = $pn_p2+$pna;
		if($pn_p%$pn_pp != 0){
			$pn_p = $pn_p/2;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
			$pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}
	}

	function oprProFracPowMCRule($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a){
		$pna = $pn_p*$pn;
		$pn_p = $pn_p2*$pna;
		if($pn_p%$pn_pp != 0){
			$pn_p = $pn_p/2;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
			$pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}
	}

	function oprProFracPowMCRule2($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a){
		$pna = $pn_p*$pn;
		$pn_p = $pn_p2*$pna;
		$pn_pp = $pn_pp*$pn_pp;
		if($pn_p%$pn_pp != 0){
			$pn_p = $pn_p/2;
			$pn_a = $pn_pp/2;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
			$pn_p = $pn_p/$pnb;
			identifyPowerForm($bil2, $pn_p);
		}
	}

	function oprProFracPowMCRule3($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a){
		$pna = $pn_p*$pn;
		$pn_p = $pna*$pn_pp;
		$pn_pp = $pn_p2*$pn_pp;
		if($pn_p%$pn_pp != 0){
			$pn_p = $pn_p/2;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
			$pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}
	}

	function oprProFracPowMCRule4($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a){
		$bil2b = pow($bil2, $pn);
		$bil2 = $bil2b*$bil2;
		$pn_p = $pn_p+$pn_p2;
		if($pn_p%$pn_pp != 0){
			$pn_p = $pn_p/2;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
			$pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}
	}

	function oprQuoFracPowRule($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a){
		$pna = $pn_p*$pn;
		$pn_p = $pna-$pn_p2;
		if($pn_p%$pn_pp != 0){
			$pn_p = $pn_p/2;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
			$pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}
	}

	function oprQuoFracPowMCRule($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a){
		$pna = $pn_p*$pn;
		$pn_p = $pna/$pn_p2;
		if($pn_p%$pn_pp != 0){
			$pn_p = $pn_p/2;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
			$pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}
	}

	function oprQuoFracPowMCRule2($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a){
		$pna = $pn_p*$pn;
		$pn_p = $pna*$pn_pp;
		$pn_pp = $pn_p2*$pn_pp;
		if($pn_p%$pn_pp != 0){
			$pn_p = $pn_p/2;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
			$pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}
	}

	function oprQuoFracPowMCRule3($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a){
		$bil2b = pow($bil2, $pn);
		$bil2 = $bil2b/$bil2;
		$pn_p = $pn_p/$pn_p2;
		$pn_pp = 1;
		if($pn_p%$pn_pp != 0){
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
			$pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}
	}

	function oprQuoFracPowMCRule4($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_a){
		$bil2b = pow($bil2, $pn);
		$bil2 = $bil2b/$bil2;
		$pn_p = $pn_p-$pn_p2;
		if($pn_p%$pn_pp != 0){
			$pn_p = $pn_p/2;
			FracPowForm($bil2, $pn_p, $pn_pp, $pn_a);
		}else{
			$pn_p = $pn_p/$pn_pp;
			identifyPowerForm($bil2, $pn_p);
		}
	}
?>