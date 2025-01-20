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
		$alp_rnd = array(1, 2, 3);
		$alp_rnd2 = array('p', 'q', 'r', 's');
		shuffle($alp_rnd);
		shuffle($alp_rnd2);
		$alp = $alp_rnd[0];
		$alpb = $alp_rnd[1];
		$alp1 = pow(2, $alp);
		$alp1b = pow(2, $alpb);
		$alp2 = $alp_rnd2[0];
		$alp2b = $alp_rnd2[1];
		// while(in_array(($pn1 = mt_rand(-3, 3)), array(0, 1)));
		$pn1 = null; //pangkatnya diganti alp / alpb
		while(in_array(($pn2 = mt_rand(-3, 3)), array(0, 1)));
		while(in_array(($pn3 = mt_rand(-3, 3)), array(0, 1)));
		// while(in_array(($pn4 = mt_rand(-3, 3)), array(0, 1)));
		$pn4 = null; //pangkatnya diganti alp / alpb
		while(in_array(($pn5 = mt_rand(-3, 3)), array(0, 1)));
		while(in_array(($pn6 = mt_rand(-3, 3)), array(0, 1)));
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
	<h4>7c. Soal tipe basis variabel alfabet dengan kombinasi rule</h4>
	$$\frac{{(<?php echo $alp1 ?>^{<?php echo $pn1 ?>}}{<?php echo $alp2 ?>^{<?php echo $pn2 ?>}})^{<?php echo $pn3 ?>}} {{(<?php echo $alp1b ?>^{<?php echo $pn4 ?>}}{<?php echo $alp2b ?>^{<?php echo $pn5 ?>}})^{<?php echo $pn6 ?>}}=$$
	<?php
		alpNumRule($alp, $alpb, $alp2, $alp2b, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
		alpNumMCRule($alp, $alpb, $alp2, $alp2b, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
		alpNumMCRule2($alp, $alpb, $alp2, $alp2b, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
		alpNumMCRule3($alp, $alpb, $alp1, $alp1b, $alp2, $alp2b, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
		alpNumMCRule4($alp, $alpb, $alp1, $alp1b, $alp2, $alp2b, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6);
	?>
	<h4>7d. Soal tipe basis variabel alfabet dengan kombinasi rule</h4>
	$$\left(\frac{{<?php echo $alp1 ?>^{<?php echo $pn1 ?>}} {<?php echo $alp2 ?>^{<?php echo $pn2 ?>}}}{{<?php echo $alp1b ?>^{<?php echo $pn4 ?>}} {<?php echo $alp2b ?>^{<?php echo $pn5 ?>}}}\right) ^{<?php echo $pn6 ?>} = $$
	<?php
		alpNumRule($alp, $alpb, $alp2, $alp2b, $pn1, $pn2, $pn6, $pn4, $pn5, $pn6); //$pn2, $pn6 sebagai pengganti $pn3
		alpNumMCRule($alp, $alpb, $alp2, $alp2b, $pn1, $pn2, $pn6, $pn4, $pn5, $pn6);
		alpNumMCRule2($alp, $alpb, $alp2, $alp2b, $pn1, $pn2, $pn6, $pn4, $pn5, $pn6);
		alpNumMCRule3($alp, $alpb, $alp1, $alp1b, $alp2, $alp2b, $pn1, $pn2, $pn6, $pn4, $pn5, $pn6);
		alpNumMCRule4($alp, $alpb, $alp1, $alp1b, $alp2, $alp2b, $pn1, $pn2, $pn6, $pn4, $pn5, $pn6);
	?>

</body>
</html>

<?php

	//prosedure benar kombinasi rule untuk eksponen dasar basis alphabet
	function alpNumRule($alp, $alpb, $alp2, $alp2b, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn1 = $alp*$pn3;
		$pn4 = $alpb*$pn6;
		$pna = $pn1-$pn4;
		$pnb = $pn2*$pn3;
		$pnc = $pn5*$pn6;
		$alp1 = 2;
		idenCombPowerForm($alp1, $alp2, $alp2b, $pna, $pnb, $pnc); //**harusnya nilai yang direturn, supaya bisa identifikasi bentuknya
		// return $pn;
	}

	//prosedure salah kombinasi rule untuk eksponen dasar basis alphabet
	function alpNumMCRule($alp, $alpb, $alp2, $alp2b, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn1 = $alp;
		$pn4 = $alpb;
		$pna = $pn1-$pn4;
		$pnb = $pn2+$pn3;
		$pnc = $pn5+$pn6;
		$alp1 = 2;
		idenCombPowerForm($alp1, $alp2, $alp2b, $pna, $pnb, $pnc);
	}

	//prosedure salah kombinasi rule untuk eksponen dasar basis alphabet
	function alpNumMCRule2($alp, $alpb, $alp2, $alp2b, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pn1 = $alp*$pn3;
		$pn4 = $alpb*$pn6;
		$pna = $pn1+$pn4;
		$pnb = $pn2*$pn3;
		$pnc = $pn5*$pn6;
		$alp1 = 2;
		idenCombPowerForm($alp1, $alp2, $alp2b, $pna, $pnb, $pnc);
	}

	//prosedure salah kombinasi rule untuk eksponen dasar basis alphabet
	function alpNumMCRule3($alp, $alpb, $alp1, $alp1b, $alp2, $alp2b, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pna = 1*$pn3;
		$pnc = 1*$pn6;
		$pnb = $pn2*$pn3;
		$pnd = $pn5*$pn6;
		idenCombPowerForm2($alp1, $alp1b, $alp2, $alp2b, $pna, $pnb, $pnc, $pnd);
	}

	//prosedure salah kombinasi rule untuk eksponen dasar basis alphabet
	function alpNumMCRule4($alp, $alpb, $alp1, $alp1b, $alp2, $alp2b, $pn1, $pn2, $pn3, $pn4, $pn5, $pn6){
		$pna = 1+$pn3;
		$pnc = 1+$pn6;
		$pnb = $pn2+$pn3;
		$pnd = $pn5+$pn6;
		idenCombPowerForm2($alp1, $alp1b, $alp2, $alp2b, $pna, $pnb, $pnc, $pnd);
	}

	//prosedure benar identifikasi pangkat minus/zero/biasa (konversi pangkat)
	function idenCombPowerForm($alp1, $alp2, $alp2b, $pna, $pnb, $pnc){
		//karena bukan pengembalian nilai, jadi seperti ini dulu sementara
		?>
			$${<?php echo $alp1 ?>^{<?php echo $pna ?>}}{<?php echo $alp2 ?>^{<?php echo $pnb ?>}}{<?php echo $alp2b ?>^{<?php echo $pnc ?>}}$$		
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

	function idenCombPowerForm2($alp1, $alp1b, $alp2, $alp2b, $pna, $pnb, $pnc, $pnd){
		//karena bukan pengembalian nilai, jadi seperti ini dulu sementara
		?>
			$${<?php echo $alp1 ?>^{<?php echo $pna ?>}}{<?php echo $alp2 ?>^{<?php echo $pnb ?>}}{<?php echo $alp1b ?>^{<?php echo $pnc ?>}}{<?php echo $alp2b ?>^{<?php echo $pnd ?>}}$$		
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
