<!--  
	Variabel alphabet (kombinasi antar rule)
	prosedur salah/miskonsepsi berdasarkan rule-rule yang berlaku

	Tipe soal : Product rule A^m . A^n
	Prosedure benar :
		A^(m+n)
	Prosedure salah :
		A^(m.n)
		A^(m-n)
		(A.A)^(m.n)
		(A.A)^(m+n) 
		(A+A)^(m+n)
-->

<?php
	// function alphabetbaseQuestion(){
		$alp_rnd = array('p', 'q', 'r', 's');
		shuffle($alp_rnd);
		$alp1 = $alp_rnd[0];
		$alp2 = $alp_rnd[1];
		$pn_a = array(-5, -4, -3, -2, -1, 2, 3, 4, 5);
		shuffle($pn_a);
		$pn1 = $pn_a[0];
		$pn4 = $pn_a[1];
		$pn2 = $pn_a[2];
		$pn5 = $pn_a[3];
		$pn_b = array(-5, -4, -3, -2, -1, 2, 3, 4, 5);
		shuffle($pn_b);
		$pn3 = $pn_b[0];
		$pn6 = $pn_b[1];
		$var = 'alp';
		//**harusnya kalau pangkat satu tidak dimunculkan angkanya
	// }
?>

<html>
<head>
	<title>basis variabel alphabet - kombinasi rule</title>
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
	<h4>14. Soal tipe basis variabel alfabet dengan kombinasi rule (EPR2)</h4>
	$$\frac{(<?php echo $alp1 ?>^{<?php echo $pn1 ?>} \times <?php echo $alp2 ?>^{<?php echo $pn2 ?>})^{<?php echo $pn3 ?>}}{(<?php echo $alp1 ?>^{<?php echo $pn4 ?>} \times <?php echo $alp2 ?>^{<?php echo $pn5 ?>})^{<?php echo $pn6 ?>}}=$$
	<?php
		alpCombRule($alp1, $alp2, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
		alpCombMCRule($alp1, $alp2, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
		alpCombMCRule2($alp1, $alp2, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
		alpCombMCRule3($alp1, $alp2, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
		alpCombMCRule4($alp1, $alp2, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
	?>
	<h4>15. Soal tipe basis variabel alfabet dengan kombinasi rule (EPR2)</h4>
	$$\left(\frac{<?php echo $alp1 ?>^{<?php echo $pn1 ?>} \times <?php echo $alp2 ?>^{<?php echo $pn2 ?>}}{<?php echo $alp1 ?>^{<?php echo $pn4 ?>} \times <?php echo $alp2 ?>^{<?php echo $pn5 ?>}}\right) ^{<?php echo $pn6 ?>} = $$
	<?php
		alpCombRule($alp1, $alp2, $pn1, $pn2, $pn6, $pn4, $pn5, $pn6);
		alpCombMCRule($alp1, $alp2, $pn1, $pn2, $pn6, $pn4, $pn5, $pn6);
		alpCombMCRule2($alp1, $alp2, $pn1, $pn2, $pn6, $pn4, $pn5, $pn6);
		alpCombMCRule3($alp1, $alp2, $pn1, $pn2, $pn6, $pn4, $pn5, $pn6);
		alpCombMCRule4($alp1, $alp2, $pn1, $pn2, $pn6, $pn4, $pn5, $pn6);
	?>

</body>
</html>

<?php

	//prosedure benar kombinasi rule untuk eksponen dasar basis alphabet
	function alpCombRule($alp1, $alp2, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn1 = $pn1*$pn3;
		$pn2 = $pn2*$pn3;
		$pn4 = $pn4*$pn6;
		$pn5 = $pn5*$pn6;
		$pna = $pn1-$pn4;
		$pnb = $pn2-$pn5;
		idenCombPowerForm($alp1, $alp2, $pna, $pnb); //**harusnya nilai yang direturn, supaya bisa identifikasi bentuknya
		// return $pn;
	}

	//prosedure salah kombinasi rule untuk eksponen dasar basis alphabet
	function alpCombMCRule($alp1, $alp2, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn1 = $pn1+$pn3;
		$pn2 = $pn2+$pn3;
		$pn4 = $pn4+$pn6;
		$pn5 = $pn5+$pn6;
		$pna = $pn1-$pn4;
		$pnb = $pn2-$pn5;
		idenCombPowerForm($alp1, $alp2, $pna, $pnb);
	}

	//prosedure salah kombinasi rule untuk eksponen dasar basis alphabet
	function alpCombMCRule2($alp1, $alp2, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn1 = $pn1*$pn3;
		$pn2 = $pn2*$pn3;
		$pn4 = $pn4*$pn6;
		$pn5 = $pn5*$pn6;
		$pna = $pn1+$pn4;
		$pnb = $pn2+$pn5;
		idenCombPowerForm($alp1, $alp2, $pna, $pnb);
	}

	//prosedure salah kombinasi rule untuk eksponen dasar basis alphabet
	function alpCombMCRule3($alp1, $alp2, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pna = $pn1+$pn4;
		$pnc = $pn2*$pn3;
		$pnd = $pn5*$pn6;
		$pnb = $pnc+$pnd;
		idenCombPowerForm($alp1, $alp2, $pna, $pnb);
	}

	//prosedure salah kombinasi rule untuk eksponen dasar basis alphabet
	function alpCombMCRule4($alp1, $alp2, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pna = $pn1-$pn4;
		$pnc = $pn2*$pn3;
		$pnd = $pn5*$pn6;
		$pnb = $pnc+$pnd;
		idenCombPowerForm($alp1, $alp2, $pna, $pnb);
	}

	//prosedure benar identifikasi pangkat minus/zero/biasa (konversi pangkat)
	function idenCombPowerForm($alp1, $alp2, $pna, $pnb){
		//karena bukan pengembalian nilai, jadi seperti ini dulu sementara
		if($pna >= 0 && $pnb >= 0){
			if($pna == 0){
				?>
					$$<?php echo $alp2 ?>^{<?php echo $pnb ?>}$$		
				<?php	
			}elseif($pnb == 0){
				?>
					$$<?php echo $alp1 ?>^{<?php echo $pna ?>}$$		
				<?php	
			}else{
				?>
					$$<?php echo $alp1 ?>^{<?php echo $pna ?>}<?php echo $alp2 ?>^{<?php echo $pnb ?>}$$		
				<?php
			}
		}elseif($pna >= 0 && $pnb < 0){
			$pnb = abs($pnb);
			if($pna == 0){
				?>
					$${1} \over {<?php echo $alp2 ?>^{<?php echo $pnb ?>}}$$		
				<?php
			}else{
				?>
					$${<?php echo $alp1 ?>^{<?php echo $pna ?>}} \over {<?php echo $alp2 ?>^{<?php echo $pnb ?>}}$$		
				<?php
			}
		}elseif($pna < 0 && $pnb >= 0){
			$pna = abs($pna);
			if($pnb == 0){
				?>
					$${1} \over {<?php echo $alp1 ?>^{<?php echo $pna ?>}}$$		
				<?php
			}else{
				?>
					$${<?php echo $alp2 ?>^{<?php echo $pnb ?>}} \over {<?php echo $alp1 ?>^{<?php echo $pna ?>}}$$		
				<?php
			}
		}else{
			$pna = abs($pna);
			$pnb = abs($pnb);
			?>
				$$1 \over {<?php echo $alp1 ?>^{<?php echo $pna ?>}<?php echo $alp2 ?>^{<?php echo $pnb ?>}}$$		
			<?php
		}
		
	}
?>
