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
		while(in_array(($pn1 = mt_rand(-5, 5)), array(0, 1)));
		while(in_array(($pn2 = mt_rand(-5, 5)), array(0, 1)));
		while(in_array(($pn3 = mt_rand(-5, 5)), array(0, 1)));
		while(in_array(($pn4 = mt_rand(-5, 5)), array(0, 1)));
		while(in_array(($pn5 = mt_rand(-5, 5)), array(0, 1)));
		while(in_array(($pn6 = mt_rand(-5, 5)), array(0, 1)));
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
	<h4>7. Soal tipe basis variabel alfabet dengan kombinasi rule</h4>
	$$\frac{(<?php echo $alp1 ?>^{<?php echo $pn1 ?>} \times <?php echo $alp2 ?>^{<?php echo $pn2 ?>})^{<?php echo $pn3 ?>}}{(<?php echo $alp1 ?>^{<?php echo $pn4 ?>} \times <?php echo $alp2 ?>^{<?php echo $pn5 ?>})^{<?php echo $pn6 ?>}}=$$
	<?php
		alpCombRule($alp1, $alp2, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
		alpCombMCRule($alp1, $alp2, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
		alpCombMCRule2($alp1, $alp2, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
		alpCombMCRule3($alp1, $alp2, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
		alpCombMCRule4($alp1, $alp2, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
	?>
	<br/>
	$$\left(\frac{<?php echo $alp1 ?>^{<?php echo $pn1 ?>} \times <?php echo $alp2 ?>^{<?php echo $pn2 ?>}}{<?php echo $alp1 ?>^{<?php echo $pn4 ?>} \times <?php echo $alp2 ?>^{<?php echo $pn5 ?>}}\right) ^{<?php echo $pn6 ?>} = $$
	<?php
		alpCombRule($alp1, $alp2, $pn1, $pn2, $pn6, $pn4, $pn5, $pn6);
		alpCombMCRule($alp1, $alp2, $pn1, $pn2, $pn6, $pn4, $pn5, $pn6);
		alpCombMCRule2($alp1, $alp2, $pn1, $pn2, $pn6, $pn4, $pn5, $pn6);
		alpCombMCRule3($alp1, $alp2, $pn1, $pn2, $pn6, $pn4, $pn5, $pn6);
		alpCombMCRule4($alp1, $alp2, $pn1, $pn2, $pn6, $pn4, $pn5, $pn6);
	?>
	<h4>8. Soal tipe operasi basis variabel alfabet dengan kombinasi rule</h4>

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
		$pna = $pn1*$pn2*$pn3;
		$pnb = $pn4*$pn5*$pn6;
		$pnb = $pna-$pnb;
		$pna = NULL;
		$alp1 = "(".$alp1;
		$alp2 = $alp2.")";
		idenCombPowerForm($alp1, $alp2, $pna, $pnb);
	}

	//prosedure salah kombinasi rule untuk eksponen dasar basis alphabet
	function alpCombMCRule4($alp1, $alp2, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pna = $pn1+$pn2+$pn3;
		$pnb = $pn4+$pn5+$pn6;
		$pnb = $pna-$pnb;
		$pna = NULL;
		$alp1 = "(".$alp1;
		$alp2 = $alp2.")";
		idenCombPowerForm($alp1, $alp2, $pna, $pnb);
	}

	//prosedure salah kombinasi rule untuk eksponen dasar basis alphabet
	function alpCombMCRule5($alp1, $alp2, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn1 = $pn1*$pn3;
		$pn2 = $pn2*$pn3;
		$pn4 = $pn4*$pn6;
		$pn5 = $pn5*$pn6;
		$pna = $pn1+$pn4;
		$pnb = $pn2+$pn5;
		$alp1 = $pna.$alp1;
		$alp2 = $pnb.$alp2;
		$pna = NULL;
		$pnb = NULL;
		idenCombPowerForm($alp1, $alp2, $pna, $pnb);
	}

	//prosedure benar identifikasi pangkat minus/zero/biasa (konversi pangkat)
	function idenCombPowerForm($alp1, $alp2, $pna, $pnb){
		//karena bukan pengembalian nilai, jadi seperti ini dulu sementara
		?>
			$$<?php echo $alp1 ?>^{<?php echo $pna ?>}<?php echo $alp2 ?>^{<?php echo $pnb ?>}$$		
		<?php
		/*//jika pangkat minus, maka 1/pangkat absolute
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
		}*/
	}
?>