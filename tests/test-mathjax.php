<?php
		$bil = mt_rand(1, 5);
		$pn = mt_rand(-5, 5);

	// function samebaseQuestion(){
		$bil1 = mt_rand(1, 10);
		$pn1 = mt_rand(-10, 10);
		// $pn2 = mt_rand(-10, 10);
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
	<input type="button" onclick="UpdateMath()" value="Generate Random Question" id="step" />
	<!-- $\newcommand{\result}{<?php echo $bil ?>^{<?php echo $pn ?>}}$
	$$\result$$ -->
	<div id="question">
		${}$
	</div>
	<br/>
	<div id="opt1">
		${}$
	</div>
	<div id="opt2">
		${}$
	</div>
	<div id="opt3">
		${}$
	</div>
	<div id="opt4">
		${}$
	</div>
</body>
</html>

<script>
	/*function UpdateMath2(TeX){
		console.log(TeX);
	}*/

	var bil = "<?php echo $bil ?>";
	var pn = "<?php echo $pn ?>";

	(function () {
	var QUEUE = MathJax.Hub.queue; //salah satu metode (mathjax) untuk merubah nilai matematika sehingga bisa ditampilkan
	var math, math1, math2, math3, math4 = null;
	var TeX, TeX1, TeX2, TeX3, TeX4;

	//merubah script mathjax menjadi teks matematika yang bisa ditampilkan
	QUEUE.Push(function () {
		// math = document.getElementById("opt")[0];
		math = MathJax.Hub.getAllJax("question")[0];
		math1 = MathJax.Hub.getAllJax("opt1")[0];
		math2 = MathJax.Hub.getAllJax("opt2")[0];
		math3 = MathJax.Hub.getAllJax("opt3")[0];
		math4 = MathJax.Hub.getAllJax("opt4")[0];
		// console.log(math);
	});

	//menampilkannya di window
	UpdateMath = function () {	
		//parameter tex bisa diganti dengan inputan eksponen
		/*TeX = "{2^2} + {2^\\frac{1}{2}} = {1^{-5}}";
		TeX = "\\sqrt{2} \\over {-2} ";*/
		TeX = "{{"+bil+"}^{"+pn+"}}";
		TeX1 = "a. {{"+bil+"}^{"+pn+"}}";
		TeX2 = "b. {1 \\over {{"+bil+"}^{"+pn+"}}}";
		TeX3 = "c. \\sqrt{{"+bil+"}^{"+pn+"}}";
		TeX4 = "d. \\sqrt["+pn+"]{"+bil+"}";
		QUEUE.Push(["Text",math,"\\displaystyle{"+TeX+"}"]);
		QUEUE.Push(["Text",math1,"\\displaystyle{"+TeX1+"}"]);
		QUEUE.Push(["Text",math2,"\\displaystyle{"+TeX2+"}"]);
		QUEUE.Push(["Text",math3,"\\displaystyle{"+TeX3+"}"]);
		QUEUE.Push(["Text",math4,"\\displaystyle{"+TeX4+"}"]);
		// QUEUE.Push(["Text",math,"x+1"]);
		// console.log(TeX);
	}
	})();
</script>