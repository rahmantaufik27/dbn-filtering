<?php
	// function identifikasi pangkat
		$bil = mt_rand(1, 5);
		$pn = mt_rand(-5, 5);

	// function samebaseQuestion(){
		$bil1 = mt_rand(1, 10);
		$pn1 = mt_rand(-10, 10);
		while(in_array(($pn2 = mt_rand(-10, 10)), array(0)));
	// }
?>

<html>
<head>
	<title>test prosedure</title>
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
	<!-- this.value bisa diganti/diisi dengan inputan eksponen-->
	<!-- <input id="MathInput" size="50" onchange="UpdateMath(this.value)" /> -->
	<!-- $\newcommand{\result}{<?php echo $bil ?>^{<?php echo $pn ?>}}$
	$$\result$$ -->
	<!-- $$<?php echo $bil ?>^{<?php echo $pn ?>}$$ -->
	<?php
		/*$bil1 = powerIden($bil, $pn)[0];
		$opt1 = powerIden($bil, $pn)[1];
		$bil1b = powerIdenMC($bil, $pn)[0];
		$opt2 = powerIdenMC($bil, $pn)[1];*/
		// shuffleOpt($bil1, $opt1, $opt2, $opt3, $opt4, $opt5);
		
		// generate prosedure ke bentuk matematika
		$opt1 = identifyPower($bil, $pn);
		$opt2 = identifyPowerMC($bil, $pn);
		// echo $opt2;
	?>
	<input type="button" onclick="UpdateMath()" value="Generate Random Question" id="step" />
	<br/>
	<div id="question">
		${}$
	</div>
	<div id="op1">
		${}$
	</div>
	<div id="op2">
		${}$
	</div>
	<!-- <div id="op3">
		${}$
	</div>
	<div id="op4">
		${}$
	</div> -->
</body>
</html>

<?php
	//prosedure miskonsepsi dari identifikasi pangkat minus/zero/biasa
	function identifyPowerMC($bil, $pn){
		if($pn<0){
			$pn = abs($pn);
			//$pn nya belum ke bawa
			$res = '{{"+bil+"}\\\times{"+pn+"}}';
		}elseif($pn==0){
			$res = "0";
		}else{
			$res = '{{"+bil+"}\\\times{"+pn+"}}';
		}
		return $res;
	}

	//prosedure identifikasi pangkat minus/zero/biasa
	function identifyPower($bil, $pn){
		//jika pangkat minus, maka 1/pangkat absolute
		if($pn<0){
			$pn = abs($pn);
			//$pn nya belum ke bawa
			$res = '{1\\\over{{"+bil+"}^{"+pn+"}}}';
		}elseif($pn==0){
			$res = "1";
		}else{
			$res = '{{"+bil+"}^{"+pn+"}}';
		}
		return $res;
	}

?>

<script>
	/*function UpdateMath2(TeX){
		console.log(TeX);
	}*/

	//variabel dari php ke js
	var bil = "<?php echo $bil ?>";
	var bil1 = "<?php echo $bil1 ?>";
	var pn = "<?php echo $pn ?>";
	var pn1 = "<?php echo $pn1 ?>";
	var pn2 = "<?php echo $pn2 ?>";
	var opt1 = "<?php echo $opt1 ?>";
	var opt2 = "<?php echo $opt2 ?>";

	(function () {
	var QUEUE = MathJax.Hub.queue; //salah satu metode (mathjax) untuk merubah nilai matematika sehingga bisa ditampilkan
	var math, math1, math2, math3, math4 = null;
	var TeX, TeX1, TeX2, TeX3, TeX4;

	/*var arrTeX = new Array("a. {{"+bil+"}^{"+pn+"}}",
		"b. {1 \\over {{"+bil+"}^{"+pn+"}}}",
		"c. \\sqrt{{"+bil+"}^{"+pn+"}}",
		"d. \\sqrt["+pn+"]{"+bil+"}"
	);
	console.log(shuffle(arrTeX));*/

	//merubah script mathjax menjadi teks matematika yang bisa ditampilkan
	QUEUE.Push(function () {
		math = MathJax.Hub.getAllJax("question")[0];
		math1 = MathJax.Hub.getAllJax("op1")[0];
		math2 = MathJax.Hub.getAllJax("op2")[0];
		// math3 = MathJax.Hub.getAllJax("op3")[0];
		// math4 = MathJax.Hub.getAllJax("op4")[0];
	});

	//menampilkannya di window
	UpdateMath = function () {	
		TeX = "{{"+bil+"}^{"+pn+"}} =";
		TeX1 = "a."+opt1;
		TeX2 = "b."+opt2;
		// TeX3 = "c. \\sqrt{{"+bil+"}^{"+pn+"}}";
		// TeX4 = "d. \\sqrt["+pn+"]{"+bil+"}";
		QUEUE.Push(["Text",math,"\\displaystyle{"+TeX+"}"]);
		QUEUE.Push(["Text",math1,"\\displaystyle{"+TeX1+"}"]);
		QUEUE.Push(["Text",math2,"\\displaystyle{"+TeX2+"}"]);
		// QUEUE.Push(["Text",math3,"\\displaystyle{"+TeX3+"}"]);
		// QUEUE.Push(["Text",math4,"\\displaystyle{"+TeX4+"}"]);
		// console.log(opt2);
	}
	})();
</script>