<?php
	//inisiasi variabel untuk proses ml
	//untuk sementara di input manual, nnti ambil di db
	$sc = 90;
	$st_class = 1; //cek status kelas student 0 (kontrol) atau 1 (eksperimen) di db
	$attemp = 1;
	$mc = 12; //miskonsepsi indeks ke-1
	$kl = 'C2';

	$pr_kl = array(0, 0, 0);
	$temp = array(0, 0, 0);
	$pos_kl = array(0, 0, 0);
	$i_kl = array(0.24, 0.65, 0.11);
	$i_mc = array(0.105, 0.05, 0.05, 0.05, 0.05, 0.025, 0.05, 0.05, 0.025, 0.025, 0.105, 0.105, 0.07, 0.07, 0.07, 0.1);
	$pr_mc = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
	$il = 0; //index terbesar
	$total = 0;
	$total1 = array(0,0,0);
	$et_mc = [];
	$pos_mc2 = [];
	
	//menentukan grade berdasarkan skor siswa
	if($sc <= 75){
		if($sc > 65 && $sc <= 75){
			$gr = "C";
		}elseif($sc > 50 && $sc <= 65){
			$gr = "D";
		}else{
			$gr = "E";
		}
	}else{
		if($sc > 75 && $sc <= 80){
			$gr = "B";
		}else{
			$gr = "A";
		}
	}

	//inisiasi probabilitas knowledge level awal
	/*if($attemp == 1){
		$i_kl = array(0.24, 0.65, 0.11);
	}else{
		$i_kl = array($pos_kl[0], $pos_kl[1], $pos_kl[2]); //untuk latihan yang ke dua dst. inisial probabilitas nya berdasarkan result probabilitas di latihan sebelumnya
	}*/

	//inisiasi probabilitas transisi knowledge level t+1 dari knowledge level t
	if($kl == 'C1'){
		$t_kl[0] = array(0.4842, 0.4737, 0.0421);
		$t_kl[1] = array(0.3494, 0.5301, 0.1205);
		$t_kl[2] = array(0.1628, 0.5116, 0.3256);
	}elseif($kl == 'C2'){
		$t_kl[0] = array(0.3494, 0.5301, 0.1205);
		$t_kl[1] = array(0.1628, 0.5116, 0.3256);
		$t_kl[2] = array(0.4842, 0.4737, 0.0421);
	}else{
		$t_kl[0] = array(0.1628, 0.5116, 0.3256);
		$t_kl[1] = array(0.4842, 0.4737, 0.0421);
		$t_kl[2] = array(0.3494, 0.5301, 0.1205);
	}

	$e_kl[0] = array(0.6641, 0.3359, 0);
	$e_kl[1] = array(0.2366, 0.7176, 0.0458);
	$e_kl[2] = array(0.0857, 0.2857, 0.6286);
	$e_kl[3] = array(0, 0.15, 0.85);
	$e_kl[4] = array(0, 0.1, 0.9);

	/*$mc = 10;
	for($i=0; $i<16; $i++){
		if($mc-1 == $i){
			$l = array(
				0 => $mc
			);
			var_dump($l_mc);
		}
	}*/

	if($mc == 1){
		$l = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);
	}elseif($mc == 2){
		$l = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 0);
	}elseif($mc == 3){
		$l = array(2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 0, 1);
	}elseif($mc == 4){
		$l = array(3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 0, 1, 2);
	}elseif($mc == 5){
		$l = array(4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 0, 1, 2, 3);
	}elseif($mc == 6){
		$l = array(5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 0, 1, 2, 3, 4);
	}elseif($mc == 7){
		$l = array(6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 0, 1, 2, 3, 4, 5);
	}elseif($mc == 8){
		$l = array(7, 8, 9, 10, 11, 12, 13, 14, 15, 0, 1, 2, 3, 4, 5, 6);
	}elseif($mc == 9){
		$l = array(8, 9, 10, 11, 12, 13, 14, 15, 0, 1, 2, 3, 4, 5, 6, 7);
	}elseif($mc == 10){
		$l = array(9, 10, 11, 12, 13, 14, 15, 0, 1, 2, 3, 4, 5, 6, 7, 8);
	}elseif($mc == 11){
		$l = array(10, 11, 12, 13, 14, 15, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
	}elseif($mc == 12){
		$l = array(11, 12, 13, 14, 15, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
	}elseif($mc == 13){
		$l = array(12, 13, 14, 15, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11);
	}elseif($mc == 14){
		$l = array(13, 14, 15, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
	}elseif($mc == 15){
		$l = array(14, 15, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13);
	}else{
		$l = array(15, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14);
	}

	$t_mc[$l[0]] = array(0.1, 0.05, 0.05, 0.05, 0.05, 0, 0.05, 0.05, 0, 0, 0.12, 0.12, 0.07, 0.07, 0.07, 0.15);
	$t_mc[$l[1]] = array(0.05, 0.1, 0.05, 0.05, 0, 0.05, 0.05, 0, 0.05, 0, 0.12, 0.07, 0.12, 0.07, 0.07, 0.15);
	$t_mc[$l[2]] = array(0.05, 0.05, 0.1, 0, 0.05, 0.05, 0, 0.05, 0.05, 0, 0.07, 0.12, 0.12, 0.07, 0.07, 0.15);
	$t_mc[$l[3]] = array(0.05, 0.05, 0, 0.1, 0.05, 0.05, 0.05, 0, 0, 0.05, 0.12, 0.07, 0.07, 0.12, 0.07, 0.15);
	$t_mc[$l[4]] = array(0.05, 0, 0.05, 0.05, 0.1, 0.05, 0, 0.05, 0, 0.05, 0.07, 0.12, 0.07, 0.12, 0.07, 0.15);
	$t_mc[$l[5]] = array(0, 0.05, 0.05, 0.05, 0.05, 0.1, 0, 0, 0.05, 0.05, 0.07, 0.07, 0.12, 0.12, 0.07, 0.15);
	$t_mc[$l[6]] = array(0.05, 0.05, 0, 0.05, 0, 0, 0.1, 0.05, 0.05, 0.05, 0.12, 0.07, 0.07, 0.07, 0.12, 0.15);
	$t_mc[$l[7]] = array(0.05, 0, 0.05, 0, 0.05, 0, 0.05, 0.1, 0.05, 0.05, 0.07, 0.12, 0.07, 0.07, 0.12, 0.15);
	$t_mc[$l[8]] = array(0, 0.05, 0.05, 0, 0, 0.05, 0.05, 0.05, 0.1, 0.05, 0.07, 0.07, 0.12, 0.07, 0.12, 0.15);
	$t_mc[$l[9]] = array(0, 0, 0, 0.05, 0.05, 0.05, 0.05, 0.05, 0.05, 0.1, 0.07, 0.07, 0.07, 0.12, 0.12, 0.15);
	$t_mc[$l[10]] = array(0.05, 0.05, 0.02, 0.05, 0.02, 0.02, 0.05, 0.02, 0.02, 0.02, 0.15, 0.065, 0.065, 0.065, 0.065, 0.27);
	$t_mc[$l[11]] = array(0.05, 0.02, 0.05, 0.02, 0.05, 0.02, 0.02, 0.05, 0.02, 0.02, 0.065, 0.15, 0.065, 0.065, 0.065, 0.27);
	$t_mc[$l[12]] = array(0.02, 0.05, 0.05, 0.02, 0.02, 0.05, 0.02, 0.02, 0.05, 0.02, 0.065, 0.065, 0.15, 0.065, 0.065, 0.27);
	$t_mc[$l[13]] = array(0.02, 0.02, 0.02, 0.05, 0.05, 0.05, 0.02, 0.02, 0.02, 0.05, 0.065, 0.065, 0.065, 0.15, 0.065, 0.27);
	$t_mc[$l[14]] = array(0.02, 0.02, 0.02, 0.02, 0.02, 0.02, 0.05, 0.05, 0.05, 0.05, 0.065, 0.065, 0.065, 0.065, 0.15, 0.27);
	$t_mc[$l[15]] = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0.135, 0.135, 0.135, 0.135, 0.135, 0.325);

	$e_mc[0] = array(0.3005, 0.4865, 0.213);
	$e_mc[1] = array(0.301, 0.5, 0.199);
	$e_mc[2] = array(0.341, 0.5, 0.159);
	$e_mc[3] = array(0.301, 0.5, 0.199);
	$e_mc[4] = array(0.341, 0.5, 0.159);
	$e_mc[5] = array(0.3127, 0.51, 0.1773);
	$e_mc[6] = array(0.301, 0.5, 0.199);
	$e_mc[7] = array(0.341, 0.5, 0.159);
	$e_mc[8] = array(0.3127, 0.51, 0.1773);
	$e_mc[9] = array(0.3127, 0.51, 0.1773);
	$e_mc[10] = array(0.485, 0.3872, 0.1278);
	$e_mc[11] = array(0.485, 0.3872, 0.1278);
	$e_mc[12] = array(0.5288, 0.3702, 0.101);
	$e_mc[13] = array(0.5288, 0.3702, 0.101);
	$e_mc[14] = array(0.5288, 0.3702, 0.101);
	$e_mc[15] = array(0.6508, 0.3242, 0.025);

	/*$et_mc[0] = array(0.2, 0.5, 0.3);
	$et_mc[1] = array(0.35, 0.45, 0.2);
	$et_mc[2] = array(0.35, 0.45, 0.2);
	$et_mc[3] = array(0.35, 0.45, 0.2);
	$et_mc[4] = array(0.35, 0.45, 0.2);
	$et_mc[5] = array(0.425, 0.375, 0.2);
	$et_mc[6] = array(0.425, 0.375, 0.2);
	$et_mc[7] = array(0.425, 0.375, 0.2);
	$et_mc[8] = array(0.425, 0.375, 0.2);
	$et_mc[9] = array(0.425, 0.375, 0.2);
	$et_mc[10] = array(0.5, 0.4, 0.1);
	$et_mc[11] = array(0.5, 0.4, 0.1);
	$et_mc[12] = array(0.55, 0.35, 0.1);
	$et_mc[13] = array(0.55, 0.35, 0.1);
	$et_mc[14] = array(0.55, 0.35, 0.1);
	$et_mc[15] = array(0.65, 0.35, 0);*/

	/*algoritma filtering HMM */
	/*tahap 1: update nilai transisi knowledge level*/
	for($c=0; $c<3; $c++){
		for($p=0; $p<3; $p++){
			// $pr_kl[$c] += $t_kl[$p][$c] * $i_kl[$p] * $e_kl[$p][$c];
			$pr_kl[$c] += $t_kl[$p][$c] * $i_kl[$p];
		}		
	}
	// var_dump($pr_kl);

	if($gr == 'E'){
		$j = 0;
	}elseif($gr == 'D'){
		$j = 1;
	}elseif($gr == 'C'){
		$j = 2;
	}elseif($gr == 'B'){
		$j = 3;
	}else{
		$j = 4;
	}

	//cek tipe siswa
	if($st_class == 1){
		//update miskonsepsi berdasarkan transisi dan emisi
		//update transisi miskonsepsi
		for($c=0; $c<16; $c++){
			for($p=0; $p<16; $p++){
				$pr_mc[$c] += $t_mc[$p][$c] * $i_mc[$p];
			}		
		}
		// var_dump($pr_mc);

		//transpose
		for($c=0; $c<3; $c++){
			for($p=0; $p<16; $p++){
				$et_mc[$c][$p] = $e_mc[$p][$c];
			}		
		}
		// var_dump($et_mc);

		if($kl == 'C1'){
			$l = 0;
		}elseif($kl == 'C2'){
			$l = 1;
		}else{
			$l = 2;
		}

		/*// normalisasi
		// $et_mc2 = [];
		// $ttl = 0;
		for($p=0; $p<16; $p++){
			$ttl += $et_mc[$l][$p];
		}

		for($p=0; $p<16; $p++){
			$et_mc2[$l][$p] = $et_mc[$l][$p] / $ttl;
		}
		// var_dump($et_mc2[$l]);*/

		//update emisi miskonsepsi //
		/*e-step miskonsepsi*/
		for($c=0; $c<3; $c++){
			for($p=0; $p<16; $p++){
				$temp1[$c][$p] = $et_mc[$c][$p] * $pr_mc[$p];
				$total1[$c] += $temp1[$c][$p];
			}	
		}
		// var_dump($temp1);

		/*m-step miskonsepsi*/

		for($c=0; $c<3; $c++){
			for($p=0; $p<16; $p++){
				$pos_mc[$c][$p] = $temp1[$c][$p] / $total1[$c];
				// $total2 += $pos_mc[$c];
			}
		}
		// var_dump($pos_mc);
		// var_dump(max($pos_mc));

		//pemilihan miskonsepsi berdasarkan hasil filtering*/
		for($c=0; $c<16; $c++){
			if($pos_mc[$l][$c] > $pos_mc[$l][$il]){
				$il = $c;
			}
		}
		$il = $il+1; //insert index miskonsepsi terbesar kedalam database
		var_dump($il);echo "<br/>";

	/*tahap 2: update nilai emisi knowledge level*/

	/*E-STEP KNOWLEDGE LEVEL*/
		//transpose
		for($c=0; $c<16; $c++){
			for($p=0; $p<3; $p++){
				$pos_mc2[$c][$p] = $pos_mc[$p][$c];
			}		
		}
		// var_dump($pos_mc2);

		for($i=1; $i<=16; $i++){
			if($mc == $i){
				$k = $i-1;
			}
		}

		for($c=0; $c<3; $c++){
			// $temp[$c] = $e_kl[$j][$c] * $et_mc[$k][$c] * $pr_kl[$c] ;
			$temp[$c] = $e_kl[$j][$c] * $pos_mc2[$k][$c] * $pr_kl[$c] ;
			$total += $temp[$c];
		}
	}else{
		for($c=0; $c<3; $c++){
			$temp[$c] = $e_kl[$j][$c] * $pr_kl[$c];
			$total += $temp[$c];
		}	
	}	
	// var_dump($pos_mc2);

	/*M-STEP KNOWLEDGE LEVEL*/
	// $total = $temp[0] + $temp[1] + $temp[2];
	// var_dump($total);
	for($c=0; $c<3; $c++){
			$pos_kl[$c] = $temp[$c] / $total;
	}
	//update $pos_kl to db (ada relasinya dengan siswa dan untuk prior probability siswa di latihan selanjutnya)
	var_dump($pos_kl);
	echo "<br/>";
	var_dump($gr);
	echo "<br/>";


	/*tahap 3: pemilihan knowledge level berdasarkan hasil filtering*/
	if($pos_kl[0] > $pos_kl[1] && $pos_kl[0] > $pos_kl[2]){
		echo "C1";
	}elseif($pos_kl[1] > $pos_kl[0] && $pos_kl[1] > $pos_kl[2] ){
		echo "C2";
	}else{
		echo "C3";
	}
	//update knowledge level (C1/C2/C3) to db

	//catatan yang bisa diperbaiki
	//seharusnya outputnya array dari P(X1), yang mana terdiri dari beberapa nilai probabilitas disetiap transisi knowledge level (lihat tabel exel)
?>