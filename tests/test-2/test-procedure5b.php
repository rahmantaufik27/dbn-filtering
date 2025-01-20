<!--  
	Variabel basis koma
-->

<?php
	// function commabase(){
		while(in_array(($num = mt_rand(2, 7)), array(4)));
		$pcomr = array(1, 2, 3);
		shuffle($pcomr);
		$pcom = $pcomr[0];
		$pcom2 = $pcomr[1];
		$com = pow(10, $pcom);
		$com2 = pow(10, $pcom2);
		$pns = array(-3, -2, -1, 4, 5);
		shuffle($pns);
		$pn = $pns[0];
		$pn2 = $pns[1];
	// }

	// function commabaseQuestion(){
		$bil_com = $com;
		$bil = $num/(int)$bil_com;
	// }

	// function commabase2Question(){
		$bil_com2 = $com2;
		$bil2 = $num/(int)$bil_com2;
	// }
?>

<html>
<head>
	<title>basis koma - dasar dan quotient rule</title>
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
	<h4>18. Soal tipe basis koma dasar (CC)</h4>
	$$(<?php echo $bil ?>)^{<?php echo $pn ?>}$$
	<?php
		$opt1 = commaRule($num, $pcom, $pn);
		$opt2 = commaMCRule($num, $pcom, $pn);
		$opt3 = commaMCRule2($num, $pcom, $pn);
		$opt4 = commaMCRule3($num, $pcom, $pn);
		$opt5 = commaMCRule4($num, $pcom, $pn);
	?>
	<h4>19. Soal tipe basis koma dengan operasi quotient rule (CC2-QR)</h4>
	$$\frac{(<?php echo $bil ?>)^{<?php echo $pn ?>}}{(<?php echo $bil2 ?>)^{<?php echo $pn2 ?>}} =$$
	<?php
		$opt1 = qCommaRule($num, $pn, $pn2, $pcom, $pcom2);
		$opt2 = qCommaMCRule($num, $pn, $pn2, $pcom, $pcom2);
		$opt3 = qCommaMCRule2($num, $pn, $pn2, $pcom, $pcom2);
		$opt4 = pCommaRule($num, $pn, $pn2, $pcom, $pcom2);
		$opt5 = powCommaRule($num, $pn, $pn2, $pcom, $pcom2);
	?>
	<h4>20. Soal tipe basis koma dengan operasi product rule (CC2-PR)</h4>
	$$(<?php echo $bil ?>)^{<?php echo $pn ?>} \times (<?php echo $bil2 ?>)^{<?php echo $pn2 ?>} =$$
	<?php
		$opt1 = pCommaRule($num, $pn, $pn2, $pcom, $pcom2);
		$opt2 = pCommaMCRule($num, $pn, $pn2, $pcom, $pcom2);
		$opt3 = pCommaMCRule2($num, $pn, $pn2, $pcom, $pcom2);
		$opt4 = qCommaRule($num, $pn, $pn2, $pcom, $pcom2);
		$opt5 = powCommaRule($num, $pn, $pn2, $pcom, $pcom2);
	?>
	<h4>21. Soal tipe basis koma dengan operasi power rule (CC2-PPR)</h4>
	$$(<?php echo $bil ?>^{<?php echo $pn ?>})^{<?php echo $pn2 ?>} =$$
	<?php
		$opt1 = powCommaRule($num, $pn, $pn2, $pcom, $pcom2);
		$opt1 = powCommaMCRule($num, $pn, $pn2, $pcom, $pcom2);
		$opt1 = powCommaMCRule2($num, $pn, $pn2, $pcom, $pcom2);
		$opt4 = pCommaRule($num, $pn, $pn2, $pcom, $pcom2);
		$opt5 = qCommaRule($num, $pn, $pn2, $pcom, $pcom2);
	?>

</body>
</html>

<?php
	function commaBase($num, $pn, $pn2){
		?>
			$$<?php echo $num ?>^{<?php echo $pn ?>} \times <?php echo 10 ?>^{<?php echo $pn2 ?>}$$				
		<?php
	}
	//prosedure benar power rule untuk eksponen dasar basis koma
	function commaRule($num, $pcom, $pn){
		$pcom = 0-$pcom;
		$pn2 = $pcom*$pn;
		commaBase($num, $pn, $pn2);
	}

	function commaMCRule($num, $pcom, $pn){
		$pcom = 0-$pcom+1;
		$pn2 = $pcom*$pn;
		commaBase($num, $pn, $pn2);
	}

	function commaMCRule2($num, $pcom, $pn){
		$pcom = 0-$pcom-1;
		$pn2 = $pcom*$pn;
		commaBase($num, $pn, $pn2);
	}

	function commaMCRule3($num, $pcom, $pn){
		// $pn = $pn-2;
		// $pcom = 0-$pcom;
		$pn2 = $pcom*$pn;
		commaBase($num, $pn, $pn2);
	}

	function commaMCRule4($num, $pcom, $pn){
		$pcom = 0-$pcom;
		$pn2 = $pcom+$pn; //salah di ppr juga
		commaBase($num, $pn, $pn2);
	}

	//prosedure benar power rule basis koma dengan operasi quotient rule
	function qCommaRule($num, $pn, $pn2, $pcom, $pcom2){
		$pnr = $pn-$pn2;
		$pcom = 0-$pcom;
		$pcom2 = 0-$pcom2;
		$pcom = $pcom*$pn;
		$pcom2 = $pcom2*$pn2;
		$pcomr = $pcom-$pcom2;
		commaBase($num, $pnr, $pcomr);
	}

	//prosedure salah power rule basis koma dengan operasi quotient rule
	function qCommaMCRule($num, $pn, $pn2, $pcom, $pcom2){
		$pnr = $pn-$pn2;
		$pcom = 0-$pcom+1;
		$pcom2 = 0-$pcom2+1;
		$pcom = $pcom*$pn;
		$pcom2 = $pcom2*$pn2;
		$pcomr = $pcom-$pcom2;
		commaBase($num, $pnr, $pcomr);
	}

	function qCommaMCRule2($num, $pn, $pn2, $pcom, $pcom2){
		$pnr = $pn-$pn2;
		$pcom = 0-$pcom-1;
		$pcom2 = 0-$pcom2-1;
		$pcom = $pcom*$pn;
		$pcom2 = $pcom2*$pn2;
		$pcomr = $pcom-$pcom2;
		commaBase($num, $pnr, $pcomr);
	}

	//prosedure benar power rule basis koma dengan operasi product rule
	function pCommaRule($num, $pn, $pn2, $pcom, $pcom2){
		$pnr = $pn+$pn2;
		$pcom = 0-$pcom;
		$pcom2 = 0-$pcom2;
		$pcom = $pcom*$pn;
		$pcom2 = $pcom2*$pn2;
		$pcomr = $pcom+$pcom2;
		commaBase($num, $pnr, $pcomr);
	}

	//prosedure salah power rule basis koma dengan operasi product rule
	function pCommaMCRule($num, $pn, $pn2, $pcom, $pcom2){
		$pnr = $pn+$pn2;
		$pcom = 0-$pcom+1;
		$pcom2 = 0-$pcom2+1;
		$pcom = $pcom*$pn;
		$pcom2 = $pcom2*$pn2;
		$pcomr = $pcom+$pcom2;
		commaBase($num, $pnr, $pcomr);
	}

	function pCommaMCRule2($num, $pn, $pn2, $pcom, $pcom2){
		$pnr = $pn+$pn2;
		$pcom = 0-$pcom-1;
		$pcom2 = 0-$pcom2-1;
		$pcom = $pcom*$pn;
		$pcom2 = $pcom2*$pn2;
		$pcomr = $pcom+$pcom2;
		commaBase($num, $pnr, $pcomr);
	}

	//prosedure benar power rule basis koma dengan operasi product rule
	function powCommaRule($num, $pn, $pn2, $pcom, $pcom2){
		$pnr = $pn*$pn2;
		$pcom = 0-$pcom;
		$pcomr = $pcom*$pn2;
		commaBase($num, $pnr, $pcomr);
	}

	//prosedure benar power rule basis koma dengan operasi power rule
	function powCommaMCRule($num, $pn, $pn2, $pcom, $pcom2){
		$pnr = $pn*$pn2;
		$pcom = 0-$pcom+1;
		$pcomr = $pcom*$pn2;
		commaBase($num, $pnr, $pcomr);
	}

	function powCommaMCRule2($num, $pn, $pn2, $pcom, $pcom2){
		$pnr = $pn*$pn2;
		$pcom = 0-$pcom-1;
		$pcomr = $pcom*$pn2;
		commaBase($num, $pnr, $pcomr);
	}

?>