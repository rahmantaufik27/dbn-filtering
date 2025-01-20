<!--  
	akar-akaran
-->
<?php
	// function alpFracPow2Question(){
		$bil1 = array('a', 'b', 'c');
		$bil1 = $bil1[array_rand($bil1)];

		// $bil2 = mt_rand(3, 5);
		// $pn = mt_rand(1, 5);
		$p = array(1, 1, 2, 5, 4);
		$pp = array(2, 3, 5, 4, 6);
		$rn = array(0, 1, 2, 3, 4);
		shuffle($rn);
		$pn_p = $p[$rn[0]];
		$pn_pp = $pp[$rn[0]];
		$pn_p2 = $p[$rn[1]];
		$pn_pp2 = $pp[$rn[1]];
		$pn_a = null;
	// }

	// function simFracPowQuestion(){
		$bil2 = mt_rand(2, 3);
		$pn = mt_rand(2, 3); //pangkat biasa
		$bil2_r = pow($bil2, $pn);
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
	<h4>24. Soal tipe operasi basis pangkat pecahan (FPC3-PPR)</h4>
	<?php echo "Sederhanakan ke dalam bentuk lain "; ?>
	$$\left({<?php echo $bil2_r ?>^{{<?php echo $pn_p ?>\over<?php echo $pn_pp ?>}}}\right)^<?php echo $pn ?>=$$
	<?php
		oprPowFracPowRule($bil2, $pn, $pn_p, $pn_pp, $pn_a);
		oprPowFracPowMCRule($bil2, $pn, $pn_p, $pn_pp, $pn_a);
		oprPowFracPowMCRule2($bil2, $pn, $pn_p, $pn_pp, $pn_a);
		oprPowFracPowMCRule3($bil2, $pn, $pn_p, $pn_pp, $pn_a);
		oprPowFracPowMCRule4($bil2, $pn, $pn_p, $pn_pp, $pn_a);
	?>

	<h4>25. Soal tipe operasi basis pangkat pecahan (FPC3-PR)</h4>
	<?php echo "Hitung dan ubahlah ke dalam bentuk lain "; ?>
	$${<?php echo $bil2_r ?>^{{<?php echo $pn_p ?>\over<?php echo $pn_pp ?>}} \times {<?php echo $bil2 ?>^{{<?php echo $pn_p2 ?>\over<?php echo $pn_pp2 ?>}}}}=$$
	<?php
		oprProFracPowRule($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_pp2, $pn_a);
		oprProFracPowMCRule($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_pp2, $pn_a);
		oprProFracPowMCRule2($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_pp2, $pn_a);
		oprProFracPowMCRule3($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_pp2, $pn_a);
		oprQuoFracPowRule($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_pp2, $pn_a);
	?>
	<h4>26. Soal tipe operasi basis pangkat pecahan (FPC3-QR)</h4>
	<?php echo "Hitung dan ubahlah ke dalam bentuk lain "; ?>
	$${{<?php echo $bil2_r ?>^{{<?php echo $pn_p ?>\over<?php echo $pn_pp ?>}}}\over{<?php echo $bil2 ?>^{{<?php echo $pn_p2 ?>\over<?php echo $pn_pp2 ?>}}}} =$$
	<?php
		oprQuoFracPowRule($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_pp2, $pn_a);
		oprQuoFracPowMCRule($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_pp2, $pn_a);
		oprQuoFracPowMCRule2($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_pp2, $pn_a);
		oprQuoFracPowMCRule3($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_pp2, $pn_a);
		oprProFracPowRule($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_pp2, $pn_a);
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

	function FracPowForm2($bil, $pn_p, $pn_a){
		?>
			$$\sqrt[<?php echo $pn_a ?>]{<?php echo $bil ?>^{<?php echo $pn_p ?>}}$$
		<?php
	}

	function FracPowForm3($bil, $pn_p, $pn_a){
		?>
			$$1 \over {\sqrt[<?php echo $pn_a ?>]{<?php echo $bil ?>^{<?php echo $pn_p ?>}}}$$
		<?php
	}

	function FracPowForm4($bil, $pn_p, $pn_a){
		?>
			$$\sqrt[<?php echo $pn_a ?>]{1 \over {<?php echo $bil ?>^{<?php echo $pn_p ?>}}}$$
		<?php
	}

	function oprProFracPowRule($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_pp2, $pn_a){
		$pnb = $pn_pp*$pn_pp2;
		$pn_p = $pn_p*$pn; //pangkat pembilang pertama dikali dengan pangkat dari bilangan
		$pna1 = ($pnb/$pn_pp)*$pn_p;
		$pna2 = ($pnb/$pn_pp2)*$pn_p2;
		$pna = $pna1+$pna2;
		$pn = $pna/$pnb;
		if(is_double($pn) == false){
			identifyPowerForm($bil2, $pn);
		}else{
			FracPowForm2($bil2, $pna, $pnb);
		}
	}

	function oprProFracPowMCRule($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_pp2, $pn_a){
		$pnb = $pn_pp*$pn_pp2;
		$pna1 = ($pnb/$pn_pp)*$pn_p;
		$pna2 = ($pnb/$pn_pp2)*$pn_p2;
		$pna = $pna1+$pna2;
		$pn = $pna/$pnb;
		if(is_double($pn) == false){
			identifyPowerForm($bil2, $pn);
		}else{
			FracPowForm2($bil2, $pna, $pnb);
		}
	}

	function oprProFracPowMCRule2($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_pp2, $pn_a){
		$pnb = $pn_pp+$pn_pp2;
		$pn_p = $pn_p*$pn;
		$pna = $pn_p+$pn_p2;
		$pn = $pna/$pnb;
		if(is_double($pn) == false){
			identifyPowerForm($bil2, $pn);
		}else{
			FracPowForm2($bil2, $pna, $pnb);
		}
	}

	function oprProFracPowMCRule3($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_pp2, $pn_a){
		$pnb = $pn_pp+$pn_pp2;
		$pna = $pn_p+$pn_p2;
		$pn = $pna/$pnb;
		if(is_double($pn) == false){
			identifyPowerForm($bil2, $pn);
		}else{
			FracPowForm2($bil2, $pna, $pnb);
		}
	}

	function oprQuoFracPowRule($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_pp2, $pn_a){
		$pnb = $pn_pp*$pn_pp2;
		$pn_p = $pn_p*$pn; //pangkat pembilang pertama dikali dengan pangkat dari bilangan
		$pna1 = ($pnb/$pn_pp)*$pn_p;
		$pna2 = ($pnb/$pn_pp2)*$pn_p2;
		$pna = $pna1-$pna2;
		$pn = $pna/$pnb;
		if(is_double($pn) == false){
			identifyPowerForm($bil2, $pn);
		}else{
			if($pnb < 0 || $pna < 0){
				$pnb = abs($pnb);
				$pna = abs($pna);
				FracPowForm3($bil2, $pna, $pnb);
			}else{
				FracPowForm2($bil2, $pna, $pnb);
			}
		}
	}

	function oprQuoFracPowMCRule($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_pp2, $pn_a){
		$pnb = $pn_pp*$pn_pp2;
		$pna1 = ($pnb/$pn_pp)*$pn_p;
		$pna2 = ($pnb/$pn_pp2)*$pn_p2;
		$pna = $pna1-$pna2;
		$pn = $pna/$pnb;
		if(is_double($pn) == false){
			identifyPowerForm($bil2, $pn);
		}else{
			if($pnb < 0 || $pna < 0){
				$pnb = abs($pnb);
				$pna = abs($pna);
				FracPowForm3($bil2, $pna, $pnb);
			}else{
				FracPowForm2($bil2, $pna, $pnb);
			}
		}
	}

	function oprQuoFracPowMCRule2($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_pp2, $pn_a){
		$pnb = $pn_pp-$pn_pp2;
		$pn_p = $pn_p*$pn;
		$pna = $pn_p-$pn_p2;
		$pn = $pna/$pnb;
		if(is_double($pn) == false){
			identifyPowerForm($bil2, $pn);
		}else{
			if($pnb < 0 || $pna < 0){
				$pnb = abs($pnb);
				$pna = abs($pna);
				FracPowForm3($bil2, $pna, $pnb);
			}else{
				FracPowForm2($bil2, $pna, $pnb);
			}
		}
	}

	function oprQuoFracPowMCRule3($bil2, $pn, $pn_p, $pn_p2, $pn_pp, $pn_pp2, $pn_a){
		$pnb = $pn_pp-$pn_pp2;
		$pna = $pn_p-$pn_p2;
		$pn = $pna/$pnb;
		if(is_double($pn) == false){
			identifyPowerForm($bil2, $pn);
		}else{
			if($pnb < 0 || $pna < 0){
				$pnb = abs($pnb);
				$pna = abs($pna);
				FracPowForm3($bil2, $pna, $pnb);
			}else{
				FracPowForm2($bil2, $pna, $pnb);
			}
		}
	}
?>