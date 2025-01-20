<!--  
	Variabel basis koma
-->

<?php
	// function commabase(){
		while(in_array(($num = mt_rand(2, 8)), array(4)));
		$pcomr = array(1, 2, 3, 4);
		shuffle($pcomr);
		$pcom = $pcomr[0];
		$pcom2 = $pcomr[1];
		$com = pow(10, $pcom);
		$com2 = pow(10, $pcom2);
		while(in_array(($pn = mt_rand(-5, 5)), array(0)));
		while(in_array(($pn2 = mt_rand(-5, 5)), array(0)));
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
	<h4>9. Soal tipe basis koma dasar</h4>
	$$(<?php echo $bil ?>)^{<?php echo $pn ?>}$$
	<?php
		$opt1 = commaRule($num, $bil_com, $pn);
		echo round($opt1, 7)."<br/>"; //harus diperbaiki E+2 sekiannya
		$opt2 = commaMCRule($num, $bil_com, $pn);
		echo round($opt2, 7)."<br/>";
		$opt3 = commaMCRule2($num, $bil_com, $pn);
		echo round($opt3, 7)."<br/>";
		$opt4 = commaMCRule3($num, $bil_com, $pn);
		echo round($opt4, 7)."<br/>";
		$opt5 = commaMCRule4($num, $bil_com, $pn);
		echo round($opt5, 7)."<br/>";
	?>
	<h4>10. Soal tipe basis koma dengan operasi quotient rule</h4>
	$$\frac{(<?php echo $bil ?>)^{<?php echo $pn ?>}}{(<?php echo $bil2 ?>)^{<?php echo $pn2 ?>}} =$$
	<?php
		$opt1 = qCommaRule($num, $pn, $pn2, $pcom, $pcom2);
		echo round($opt1, 7)."<br/>";
		$opt2 = qCommaMCRule($num, $pn, $pn2, $pcom, $pcom2);
		echo round($opt2, 7)."<br/>";
		$opt3 = qCommaMCRule2($num, $pn, $pn2, $pcom, $pcom2);
		echo round($opt3, 7)."<br/>";
		$opt4 = qCommaMCRule3($num, $pn, $pn2, $pcom, $pcom2);
		echo round($opt4, 7)."<br/>";
		$opt5 = qCommaMCRule4($num, $pn, $pn2, $pcom, $pcom2);
		echo round($opt5, 7)."<br/>";
	?>

</body>
</html>

<?php

	//prosedure benar power rule untuk eksponen dasar basis koma
	function commaRule($num, $bil_com, $pn){
		$num = pow($num, $pn);
		$bil_com = pow($bil_com, $pn);
		$res = $num/$bil_com;
		return $res;
	}

	function commaMCRule($num, $bil_com, $pn){
		$num = pow($num, $pn);
		$pn = $pn+1;
		$bil_com = pow($bil_com, $pn);
		$res = $num/$bil_com;
		return $res;
	}

	function commaMCRule2($num, $bil_com, $pn){
		$num = pow($num, $pn);
		$pn = $pn-1;
		$bil_com = pow($bil_com, $pn);
		$res = $num/$bil_com;
		return $res;
	}

	function commaMCRule3($num, $bil_com, $pn){
		$num = pow($num, $pn);
		$pn = $pn+2;
		$bil_com = pow($bil_com, $pn);
		$res = $num/$bil_com;
		return $res;
	}

	function commaMCRule4($num, $bil_com, $pn){
		$num = pow($num, $pn);
		$pn = $pn-2;
		$bil_com = pow($bil_com, $pn);
		$res = $num/$bil_com;
		return $res;
	}

	//prosedure benar power rule basis koma dengan operasi quotient rule
	function qCommaRule($num, $pn, $pn2, $pcom, $pcom2){
		$pnr = $pn-$pn2;
		$num = pow($num, $pnr);
		// var_dump($num);
		$pcom = 0-$pcom;
		$pcom2 = 0-$pcom2;
		$pcom = $pcom*$pn;
		$pcom2 = $pcom2*$pn2;
		$pcomr = $pcom-$pcom2;
		// var_dump($pcomr);
		$bil_com = pow(10, $pcomr);
		// var_dump($bil_com);
		$res = $num/$bil_com;
		return $res;
	}

	//prosedure salah power rule basis koma dengan operasi quotient rule
	function qCommaMCRule($num, $pn, $pn2, $pcom, $pcom2){
		$pnr = $pn-$pn2;
		$num = pow($num, $pnr);
		// var_dump($num);
		$pcom = 0-$pcom+1;
		$pcom2 = 0-$pcom2+1;
		$pcom = $pcom*$pn;
		$pcom2 = $pcom2*$pn2;
		$pcomr = $pcom-$pcom2;
		// var_dump($pcomr);
		$bil_com = pow(10, $pcomr);
		// var_dump($bil_com);
		$res = $num/$bil_com;
		return $res;
	}

	function qCommaMCRule2($num, $pn, $pn2, $pcom, $pcom2){
		$pnr = $pn-$pn2;
		$num = pow($num, $pnr);
		// var_dump($num);
		$pcom = 0-$pcom-1;
		$pcom2 = 0-$pcom2-1;
		$pcom = $pcom*$pn;
		$pcom2 = $pcom2*$pn2;
		$pcomr = $pcom-$pcom2;
		// var_dump($pcomr);
		$bil_com = pow(10, $pcomr);
		// var_dump($bil_com);
		$res = $num/$bil_com;
		return $res;
	}

	function qCommaMCRule3($num, $pn, $pn2, $pcom, $pcom2){
		$pnr = $pn-$pn2;
		$num = pow($num, $pnr);
		// var_dump($num);
		$pcom = 0-$pcom+2;
		$pcom2 = 0-$pcom2+2;
		$pcom = $pcom*$pn;
		$pcom2 = $pcom2*$pn2;
		$pcomr = $pcom-$pcom2;
		// var_dump($pcomr);
		$bil_com = pow(10, $pcomr);
		// var_dump($bil_com);
		$res = $num/$bil_com;
		return $res;
	}

	function qCommaMCRule4($num, $pn, $pn2, $pcom, $pcom2){
		$pnr = $pn-$pn2;
		$num = pow($num, $pnr);
		// var_dump($num);
		$pcom = 0-$pcom-2;
		$pcom2 = 0-$pcom2-2;
		$pcom = $pcom*$pn;
		$pcom2 = $pcom2*$pn2;
		$pcomr = $pcom-$pcom2;
		// var_dump($pcomr);
		$bil_com = pow(10, $pcomr);
		// var_dump($bil_com);
		$res = $num/$bil_com;
		return $res;
	}

?>