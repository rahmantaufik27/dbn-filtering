<!--  
	akar-akaran
-->

<?php
	// function rootsQuestion(){
		$bil = mt_rand(2, 5); //bilangan diluar akar
		$bil2 = mt_rand(2, 5); //bilangan diluar akar
		$p = array(2, 3, 5); //penentu akar
		$p = $p[array_rand($p)];
		if($p == '2'){
			$akar = 2;
			$roots2 = array(18, 32, 50, 72, 98, 128, 162, 200);
			shuffle($roots2);
			$bilr = $roots2[0];
			$bilr2 = $roots2[1];
			$bilr3 = $roots2[2];
			$bilp = $bilr/2;
			$bilp2 = $bilr2/2;
			$bilp3 = $bilr3/2;
			// echo $bilr."= 2 x ".$bilp;
		}elseif($p == '3'){
			$akar = 3;
			$roots3 = array(12, 27, 48, 75, 108, 147, 192, 243, 300);
			shuffle($roots3);
			$bilr = $roots3[0];
			$bilr2 = $roots3[1];
			$bilr3 = $roots3[2];
			$bilp = $bilr/3;
			$bilp2 = $bilr2/3;
			$bilp3 = $bilr3/3;
			// $bilp = $bilr/3;
			// echo $bilr."= 3 x ".$bilp;
		}else{
			$akar = 5;
			$roots5 = array(20, 45, 80, 125, 180, 245, 320, 405, 500);
			shuffle($roots5);
			$bilr = $roots5[0];
			$bilr2 = $roots5[1];
			$bilr3 = $roots5[2];
			$bilp = $bilr/5;
			$bilp2 = $bilr2/5;
			$bilp3 = $bilr3/5;
			// $bilp = $bilr/5;
			// echo $bilr."= 5 x ".$bilp;
		}
		// die();
	// }

	// function rootsAlpQuestion(){
		$bilra_r = array('a', 'b', 'c', 'd'); //akar basis alphabet
		shuffle($bilra_r);
		$bilra = $bilra_r[0];
		$bilra2 = $bilra_r[1];
		$pn = mt_rand(2, 5);
		$pn2 = mt_rand(2, 5);
	// }
?>

<html>
<head>
	<title>basis akar - numerik dan campuran</title>
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
	<h4>27. Soal tipe basis akar dasar sederhana (FPC)</h4>
	$$\sqrt{<?php echo $bilra ?>^<?php echo $pn ?>}=$$
	<?php
		rootsConvForm($bilra, $pn);
		rootsConvMCForm($bilra, $pn);
		rootsConvMC2Form($bilra, $pn);
		rootsConvMC3Form($bilra, $pn);
		rootsConvMC4Form($bilra, $pn);
	?>
	<h4>28. Soal tipe basis akar dasar (FPC2)</h4>
	$$\sqrt{<?php echo $bilr ?>}=$$
	<?php
		rootsRule($bilp, $akar);
		rootsMCRule($bilp, $akar);
		rootsMCRule2($bilp, $akar);
		rootsMCRule3($bilp, $akar);
		rootsMCRule4($bilp, $akar);
		// rootsMCRule5($bilp, $akar);
	?>
	<h4>29. Soal tipe basis akar variabel alphabet dan numerik (FPC3)</h4>
	$$\sqrt{{<?php echo $bilr ?>}{<?php echo $bilra ?>^<?php echo $pn ?>}{<?php echo $bilra2 ?>^<?php echo $pn2 ?>}}=$$
	<?php
		alpSimRootsRule($bilp, $akar, $bilra, $bilra2, $pn, $pn2);
		alpSimRootsMCRule($bilp, $akar, $bilra, $bilra2, $pn, $pn2);
		alpSimRootsMCRule2($bilp, $akar, $bilra, $bilra2, $pn, $pn2);
		alpSimRootsMCRule3($bilp, $akar, $bilra, $bilra2, $pn, $pn2);
		alpSimRootsMCRule4($bilp, $akar, $bilra, $bilra2, $pn, $pn2);
	?>

</body>
</html>

<?php
	
	function rootsConvForm($bilra, $pn){
		if($pn%2==0){
			$pn = $pn/2;
			?>
				$$<?php echo $bilra ?>^{{<?php echo $pn ?>}}$$		
			<?php
		}else{
			?>
				$$<?php echo $bilra ?>^{{<?php echo $pn ?>}\over{2}}$$		
			<?php
		}
	}

	function rootsConvMCForm($bilra, $pn){
		if($pn%3==0){
			$pn = $pn/3;
			?>
				$$<?php echo $bilra ?>^{{1}\over{2}}$$		
			<?php
		}else{
			?>
				$$<?php echo $bilra ?>^{{<?php echo $pn ?>}\over{3}}$$		
			<?php
		}
	}

	function rootsConvMC2Form($bilra, $pn){
		?>
			$$<?php echo $bilra ?>^{{<?php echo $pn ?>}}$$		
		<?php
	}

	function rootsConvMC3Form($bilra, $pn){
		?>
			$$<?php echo $bilra ?>^{{2}\over{<?php echo $pn ?>}}$$		
		<?php
	}

	function rootsConvMC4Form($bilra, $pn){
		?>
			$$<?php echo $bilra ?>^{{1}\over{<?php echo $pn ?>}}$$		
		<?php
	}

	function rootsForm($billa, $bilda){
		?>
			$$<?php echo $billa ?>\sqrt{<?php echo $bilda ?>}$$		
		<?php
	}

	function alpRootsForm($billa, $bilda, $bilra, $bilra2, $pn, $pn2, $pn_b, $pn_b2){
		if($pn_b==-1 && $pn_b2==-1){
			?>
				$${<?php echo $billa ?>}{<?php echo $bilra ?>^{<?php echo $pn ?>}}{<?php echo $bilra2 ?>^{<?php echo $pn2 ?>}}{\sqrt{<?php echo $bilda ?>}}$$
			<?php
		}elseif($pn_b==-1){
			?>
				$${<?php echo $billa ?>}{<?php echo $bilra ?>^{<?php echo $pn ?>}}{<?php echo $bilra2 ?>^{<?php echo $pn2 ?>}}{\sqrt{<?php echo $bilda ?><?php echo $bilra2 ?>^{<?php echo $pn_b2 ?>}}}$$
			<?php
		}elseif($pn_b2==-1){
			?>
				$${<?php echo $billa ?>}{<?php echo $bilra ?>^{<?php echo $pn ?>}}{<?php echo $bilra2 ?>^{<?php echo $pn2 ?>}}{\sqrt{<?php echo $bilda ?><?php echo $bilra ?>^{<?php echo $pn_b ?>}}}$$
			<?php
		}else{
			?>
				$${<?php echo $billa ?>}{<?php echo $bilra ?>^{<?php echo $pn ?>}}{<?php echo $bilra2 ?>^{<?php echo $pn2 ?>}}{\sqrt{<?php echo $bilda ?><?php echo $bilra ?>^{<?php echo $pn_b ?>}<?php echo $bilra2 ?>^{<?php echo $pn_b2 ?>}}}$$
			<?php
		}
	}

	function alpRootsMCForm($billa, $bilda, $bilra, $bilra2, $pn, $pn2, $pn_b, $pn_b2){
		if($pn_b==-2 && $pn_b2==-2){
			?>
				$${<?php echo $billa ?>}\sqrt{{<?php echo $bilda ?><?php echo $bilra ?>^<?php echo $pn ?>}{<?php echo $bilra2 ?>^<?php echo $pn2 ?>}}$$
			<?php
		}elseif($pn_b==-1 && $pn_b2==-1){
			?>
				$${<?php echo $billa ?>}{\sqrt{<?php echo $bilda ?>{<?php echo $bilra ?>^{<?php echo $pn ?>}}{<?php echo $bilra2 ?>^{<?php echo $pn2 ?>}}}}$$
			<?php
		}elseif($pn_b==-1){
			?>
				$${<?php echo $billa ?>}<?php echo $bilra2 ?>^{<?php echo $pn_b2 ?>}{\sqrt{<?php echo $bilda ?>{<?php echo $bilra ?>^{<?php echo $pn ?>}}{<?php echo $bilra2 ?>^{<?php echo $pn2 ?>}}}}$$
			<?php
		}elseif($pn_b2==-1){
			?>
				$${<?php echo $billa ?>}<?php echo $bilra ?>^{<?php echo $pn_b ?>}{\sqrt{<?php echo $bilda ?>{<?php echo $bilra ?>^{<?php echo $pn ?>}}{<?php echo $bilra ?>^{<?php echo $pn ?>}}}}$$
			<?php
		}else{
			?>
				$${<?php echo $billa ?>}{<?php echo $bilra ?>^{<?php echo $pn_b ?>}}{<?php echo $bilra2 ?>^{<?php echo $pn_b2 ?>}}{\sqrt{<?php echo $bilda ?><?php echo $bilra ?>^{<?php echo $pn ?>}<?php echo $bilra2 ?>^{<?php echo $pn2 ?>}}}$$
			<?php
		}
	}


	//prosedure benar bentuk akar dasar
	function rootsRule($bilp, $akar){
		$billa = sqrt($bilp); //bilangan diluar akar
		$bilda = $akar; //bilangan didalam akar
		rootsForm($billa, $bilda); //**harusnya nilai yang direturn
	}

	//prosedure salah bentuk akar dasar
	function rootsMCRule($bilp, $akar){
		$billa = $bilp/2;
		if($billa == 2){ //kalau hasilnya dua sama kaya jawaban benar
			$billa = $billa*2;
		}
		$bilda = $akar;
		rootsForm($billa, $bilda);
	}

	//prosedure salah 2 bentuk akar dasar
	function rootsMCRule2($bilp, $akar){
		$bilda = sqrt($bilp); //ditukar
		$billa = $akar;
		rootsForm($billa, $bilda);
	}

	//prosedure salah 3 bentuk akar dasar
	function rootsMCRule3($bilp, $akar){ //merujuk pada miskonsepsi pangkat dasar
		$billa = sqrt($bilp);
		$bilda = $billa*2; //nilai yang akar dikali dua
		$billa = $akar; //ditukar
		rootsForm($billa, $bilda);
	}

	function rootsMCRule4($bilp, $akar){
		$billa = $bilp*$akar;
		if($billa%2 == 0){
			$billa = $billa-2;
			$billa = $billa/2;
			$bilda = 2;
		}else{
			$billa = $billa-3;
			$billa = $billa/2;
			$bilda = 3;
		}
		rootsForm($billa, $bilda);
	}

	function rootsMCRule5($bilp, $akar){
		$billa = $bilp * $akar;
		echo sqrt($billa);
	}

	//prosedure benar penyederhanaan akar
	/*function simRootsRule($bilp, $bilp2, $bilp3, $akar){
		$billa = sqrt($bilp)+sqrt($bilp2)+sqrt($bilp3); //bilangan diluar akar
		$bilda = $akar; //bilangan didalam akar
		rootsForm($billa, $bilda); //**harusnya nilai yang direturn
	}*/

	//prosedure benar penyederhanaan akar 2
	function simRootsRule($bil, $bil2, $bilp, $bilp2, $bilp3, $akar){
		$billa = ($bil*(sqrt($bilp3)))+($bil2*(sqrt($bilp2)))-(sqrt($bilp)); //bilangan diluar akar
		$bilda = $akar; //bilangan didalam akar
		rootsForm($billa, $bilda); //**harusnya nilai yang direturn
	}

	function simRootsMCRule($bil, $bil2, $bilp, $bilp2, $bilp3, $akar){
		$billa = ($bil+(sqrt($bilp3)))+($bil2+(sqrt($bilp2)))-(sqrt($bilp)); //bilangan diluar akar
		$bilda = $akar; //bilangan didalam akar
		rootsForm($billa, $bilda); //**harusnya nilai yang direturn
	}

	//adanya kemungkinan hasil yang sama dengan prosedur benar, sedikit tapi gk tau kenapa
	function simRootsMCRule2($bil, $bil2, $bilp, $bilp2, $bilp3, $akar){
		$billa = ($bil*($bilp3/2))+($bil2*($bilp2/2))-($bilp/2); //bilangan diluar akar
		$bilda = $akar; //bilangan didalam akar
		rootsForm($billa, $bilda); //**harusnya nilai yang direturn
	}

	function simRootsMCRule3($bil, $bil2, $bilp, $bilp2, $bilp3, $akar){
		$billa = $bil+$bil2; //bilangan diluar akar
		$bilda = ($bilp3*$akar)+($bilp2*$akar)-($bilp*$akar); //bilangan didalam akar
		rootsForm($billa, $bilda); //**harusnya nilai yang direturn
	}

	function simRootsMCRule4($bil, $bil2, $bilp, $bilp2, $bilp3, $akar){
		$billa = ($bil+($bilp3/2))+($bil2+($bilp2/2))-($bilp/2); //bilangan diluar akar
		$bilda = $akar; //bilangan didalam akar
		rootsForm($billa, $bilda); //**harusnya nilai yang direturn
	}

	//prosedure benar bentuk akar dasar
	/*function rootsAlpRule($bilra, $bilra2, $pn, $pn2){
		if($pn%2 == 0){
			$pn = $pn/2;
			$pn_b = -1;
		}else{
			$pn_b = $pn-1;
			$pn = $pn_b/2;
			// $pn = $pn."/2";
		}
		if($pn2%2 == 0){
			$pn2 = $pn2/2;
			$pn_b2 = -1;
		}else{
			$pn_b2 = $pn2-1;
			$pn2 = $pn_b2/2;
			// $pn = $pn."/2";
		}
		fracPowForm($bilra, $bilra2, $pn, $pn2, $pn_b, $pn_b2); //**harusnya nilai yang direturn
	}*/

	//prosedure benar bentuk akar dasar
	function alpSimRootsRule($bilp, $akar, $bilra, $bilra2, $pn, $pn2){
		$billa = sqrt($bilp); //bilangan diluar akar
		$bilda = $akar; //bilangan didalam akar
		if($pn%2 == 0){
			$pn = $pn/2;
			$pn_b = -1; //penanda kalau variabel tersebut hilang
		}else{
			$pn_b = $pn-1;
			$pn = $pn_b/2;
			$pn_b = 1;  //penanda kalau variabel tersebut ada dan berpangkat 1
			// $pn = $pn."/2";
		}
		if($pn2%2 == 0){
			$pn2 = $pn2/2;
			$pn_b2 = -1;
		}else{
			$pn_b2 = $pn2-1;
			$pn2 = $pn_b2/2;
			$pn_b2 = 1;
			// $pn = $pn."/2";
		}
		alpRootsForm($billa, $bilda, $bilra, $bilra2, $pn, $pn2, $pn_b, $pn_b2); //**harusnya nilai yang direturn
	}

	function alpSimRootsMCRule($bilp, $akar, $bilra, $bilra2, $pn, $pn2){
		$bilda = sqrt($bilp); //ditukar
		$billa = $akar;
		if($pn%2 == 0){
			$pn = $pn/2;
			$pn_b = -1; //penanda kalau variabel tersebut hilang
		}else{
			$pn_b = $pn-1;
			$pn = $pn_b/2;
			$pn_b = 1;  //penanda kalau variabel tersebut ada dan berpangkat 1
			// $pn = $pn."/2";
		}
		if($pn2%2 == 0){
			$pn2 = $pn2/2;
			$pn_b2 = -1;
		}else{
			$pn_b2 = $pn2-1;
			$pn2 = $pn_b2/2;
			$pn_b2 = 1;
			// $pn = $pn."/2";
		}
		// $pn_b = 2;
		// $pn_b2 = 2;
		alpRootsMCForm($billa, $bilda, $bilra, $bilra2, $pn, $pn2, $pn_b, $pn_b2); //**harusnya nilai yang direturn
	}

	function alpSimRootsMCRule2($bilp, $akar, $bilra, $bilra2, $pn, $pn2){
		$billa = $bilp/2;
		if($billa == 2){ //kalau hasilnya dua sama kaya jawaban benar
			$billa = $billa*2;
		}
		$bilda = $akar;
		if($pn%2 == 0){
			$pn = $pn/2;
			$pn_b = -1; //penanda kalau variabel tersebut hilang
		}else{
			$pn_b = $pn-1;
			$pn = $pn_b/2;
			$pn_b = 1;  //penanda kalau variabel tersebut ada dan berpangkat 1
			// $pn = $pn."/2";
		}
		if($pn2%2 == 0){
			$pn2 = $pn2/2;
			$pn_b2 = -1;
		}else{
			$pn_b2 = $pn2-1;
			$pn2 = $pn_b2/2;
			$pn_b2 = 1;
			// $pn = $pn."/2";
		}
		alpRootsForm($billa, $bilda, $bilra, $bilra2, $pn, $pn2, $pn_b, $pn_b2); //**harusnya nilai yang direturn
	}

	function alpSimRootsMCRule3($bilp, $akar, $bilra, $bilra2, $pn, $pn2){
		$billa = sqrt($bilp);
		$bilda = $billa*2; //nilai yang akar dikali dua
		$billa = $akar; //ditukar
		if($pn%2 == 0){
			$pn = $pn/2;
			$pn_b = -1; //penanda kalau variabel tersebut hilang
		}else{
			$pn_b = $pn-1;
			$pn = $pn_b/2;
			$pn_b = 1;  //penanda kalau variabel tersebut ada dan berpangkat 1
			// $pn = $pn."/2";
		}
		if($pn2%2 == 0){
			$pn2 = $pn2/2;
			$pn_b2 = -1;
		}else{
			$pn_b2 = $pn2-1;
			$pn2 = $pn_b2/2;
			$pn_b2 = 1;
			// $pn = $pn."/2";
		}
		alpRootsForm($billa, $bilda, $bilra, $bilra2, $pn, $pn2, $pn_b, $pn_b2); //**harusnya nilai yang direturn
	}

	function alpSimRootsMCRule4($bilp, $akar, $bilra, $bilra2, $pn, $pn2){
		$billa = sqrt($bilp); //bilangan diluar akar
		$bilda = $akar; //bilangan didalam akar
		$pn_b = -2; //penanda kalau variabel dengan pangkat tidak diakarkan
		$pn_b2 = -2;
		alpRootsMCForm($billa, $bilda, $bilra, $bilra2, $pn, $pn2, $pn_b, $pn_b2); //**harusnya nilai yang direturn
	}
?>