<?php

function isPrime($n){
    if($n == 1) return false;
    if($n == 2) return true;
    for($x = 2; $x <= sqrt($n); $x++){
        if($n % $x == 0) return false;
    }
    return true;
}

function sumFibonanciPrime($jumlah)
{
  $angka_awal=0;
  $angka_sekarang=1;
  $prime =0;
  $i=0; 
  $n=0;	
  //simpan string angka awal
   $hasil = "$angka_awal $angka_sekarang";

  while ($angka_sekarang <= $jumlah)
  {
    // hitung angka fibonacci
    $output = $angka_sekarang + $angka_awal;
    // hasilnya ditambahkan ke string $hasil


    //siapkan angka untuk perhitungan berikutnya
    $angka_awal = $angka_sekarang;
    $angka_sekarang = $output;
	 if (isPrime($output)==true){
	      $hasil = $hasil." $output";
		  $prime = $prime+$angka_sekarang;
	  }
	  	  $i++;

  }
  return $prime;
}

echo sumFibonanciPrime(20);
