<?php
//$saldo_kas = query("SELECT saldo FROM kas WHERE id=1")[0];
// $saldo_mutasi = $saldo_kas['saldo'];


$kodeakune = query("SELECT * FROM kodeakun WHERE kodeakun3!='526' AND kodeakun2='52' OR kodeakun2='51'   ORDER BY ketkode3 ASC");
$kodeakunp = query("SELECT * FROM kodeakun WHERE kodeakun3='433' OR kodeakun3='434' ORDER BY id ASC");

$bulansebelumnya = date('m', strtotime('-1 month', strtotime(date('Y-m-d'))));
$tahunsebelumnya = date('Y', strtotime('-1 month', strtotime(date('Y-m-d'))));
if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM kas ")) === 1) {

    // $kass = query("SELECT * FROM kas WHERE month(tanggal) ='03' AND year(tanggal) ='2021' ORDER BY id DESC LIMIT 1")[0];
    // $saldokass = $kass["saldo"];

    $saldokass = 0;
} else {
    $saldokass = 0;
}

// if (isset($_POST["tampilkan"])) {
//     $bulan = $_POST["bulan"];
//     $tahun = $_POST["tahun"];
//     $t = $tahun."-".$bulan."-15";

//     $bulansebelumnya = date('m', strtotime('-1 month', strtotime(date($t))));
//     $tahunsebelumnya = date('Y', strtotime('-1 month', strtotime(date($t))));

//     if ($bulan === "00" AND $tahun === "00") {
//         $kaskecil = query("SELECT * FROM kas ORDER BY tanggal DESC, id DESC");

//         $jumlahi = "SELECT SUM(input) AS total_i FROM kas "; //perintah untuk menjumlahkan
//         $hasili = mysqli_query($conn, $jumlahi); //melakukan query dengan varibel $jumlahkan
//         $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
//         $totali = $saldokass + $inp['total_i'];

//         $jumlaho = "SELECT SUM(output) AS total_o FROM kas "; //perintah untuk menjumlahkan
//         $hasilo = mysqli_query($conn, $jumlaho); //melakukan query dengan varibel $jumlahkan
//         $out = mysqli_fetch_array($hasilo); //menyimpan hasil query ke variabel $t
//         $totalo = $out['total_o'];

//         $jumlahsaldo = $totali - $totalo;
//     }elseif($bulan === "00"){
//         $kaskecil = query("SELECT * FROM kas WHERE year(tanggal) ='$tahun' ORDER BY tanggal DESC, id DESC");

//         $jumlahi = "SELECT SUM(input) AS total_i FROM kas WHERE year(tanggal) ='$tahun'"; //perintah untuk menjumlahkan
//         $hasili = mysqli_query($conn, $jumlahi); //melakukan query dengan varibel $jumlahkan
//         $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
//         $totali = $saldokass + $inp['total_i'];

//         $jumlaho = "SELECT SUM(output) AS total_o FROM kas WHERE year(tanggal) ='$tahun'"; //perintah untuk menjumlahkan
//         $hasilo = mysqli_query($conn, $jumlaho); //melakukan query dengan varibel $jumlahkan
//         $out = mysqli_fetch_array($hasilo); //menyimpan hasil query ke variabel $t
//         $totalo = $out['total_o'];

//         $jumlahsaldo = $totali - $totalo;
//     }elseif($tahun === "00"){
//         $kaskecil = query("SELECT * FROM kas WHERE month(tanggal) ='$bulan' ORDER BY tanggal DESC, id DESC");

//         $jumlahi = "SELECT SUM(input) AS total_i FROM kas WHERE month(tanggal) ='$bulan'"; //perintah untuk menjumlahkan
//         $hasili = mysqli_query($conn, $jumlahi); //melakukan query dengan varibel $jumlahkan
//         $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
//         $totali = $saldokass + $inp['total_i'];

//         $jumlaho = "SELECT SUM(output) AS total_o FROM kas WHERE month(tanggal) ='$bulan'"; //perintah untuk menjumlahkan
//         $hasilo = mysqli_query($conn, $jumlaho); //melakukan query dengan varibel $jumlahkan
//         $out = mysqli_fetch_array($hasilo); //menyimpan hasil query ke variabel $t
//         $totalo = $out['total_o'];

//         $jumlahsaldo = $totali - $totalo;
//     }else{
//         $kaskecil = query("SELECT * FROM kas WHERE month(tanggal) ='$bulan' AND year(tanggal) ='$tahun' ORDER BY tanggal DESC, id DESC");

//         $jumlahi = "SELECT SUM(input) AS total_i FROM kas WHERE month(tanggal) ='$bulan' AND year(tanggal) ='$tahun'"; //perintah untuk menjumlahkan
//         $hasili = mysqli_query($conn, $jumlahi); //melakukan query dengan varibel $jumlahkan
//         $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
//         $totali = $saldokass + $inp['total_i'];

//         $jumlaho = "SELECT SUM(output) AS total_o FROM kas WHERE month(tanggal) ='$bulan' AND year(tanggal) ='$tahun'"; //perintah untuk menjumlahkan
//         $hasilo = mysqli_query($conn, $jumlaho); //melakukan query dengan varibel $jumlahkan
//         $out = mysqli_fetch_array($hasilo); //menyimpan hasil query ke variabel $t
//         $totalo = $out['total_o'];

//         $jumlahis = "SELECT SUM(input) AS total_i FROM kas WHERE month(tanggal) ='$bulansebelumnya' AND year(tanggal) ='$tahunsebelumnya'"; //perintah untuk menjumlahkan
//         $hasilis = mysqli_query($conn, $jumlahis); //melakukan query dengan varibel $jumlahkan
//         $inps = mysqli_fetch_array($hasilis); //menyimpan hasil query ke variabel $t
//         $totalis = $saldokass + $inps['total_i'];

//         $jumlahos = "SELECT SUM(output) AS total_o FROM kas WHERE month(tanggal) ='$bulansebelumnya' AND year(tanggal) ='$tahunsebelumnya'"; //perintah untuk menjumlahkan
//         $hasilos = mysqli_query($conn, $jumlahos); //melakukan query dengan varibel $jumlahkan
//         $outs = mysqli_fetch_array($hasilos); //menyimpan hasil query ke variabel $t
//         $totalos = $outs['total_o'];

//         $saldobulanlalu = $totalis - $totalos;

//         $jumlahsaldo = $saldobulanlalu + ($totali - $totalo);
//     }



// } else {
// $jumlahi = "SELECT SUM(input) AS total_i FROM kas WHERE month(tanggal) ='$month' AND year(tanggal) ='$year'"; //perintah untuk menjumlahkan
// $hasili = mysqli_query($conn, $jumlahi); //melakukan query dengan varibel $jumlahkan
// $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
// $totali = $saldokass + $inp['total_i'];

// $jumlaho = "SELECT SUM(output) AS total_o FROM kas WHERE month(tanggal) ='$month' AND year(tanggal) ='$year'"; //perintah untuk menjumlahkan
// $hasilo = mysqli_query($conn, $jumlaho); //melakukan query dengan varibel $jumlahkan
// $out = mysqli_fetch_array($hasilo); //menyimpan hasil query ke variabel $t
// $totalo = $out['total_o'];

// $kaskecil = query("SELECT * FROM kas ORDER BY tanggal DESC, id DESC");

// $jumlahis = "SELECT SUM(input) AS total_i FROM kas WHERE month(tanggal) ='$bulansebelumnya' AND year(tanggal) ='$tahunsebelumnya'"; //perintah untuk menjumlahkan
// $hasilis = mysqli_query($conn, $jumlahis); //melakukan query dengan varibel $jumlahkan
// $inps = mysqli_fetch_array($hasilis); //menyimpan hasil query ke variabel $t
// $totalis = $saldokass + $inps['total_i'];

// $jumlahos = "SELECT SUM(output) AS total_o FROM kas WHERE month(tanggal) ='$bulansebelumnya' AND year(tanggal) ='$tahunsebelumnya'"; //perintah untuk menjumlahkan
// $hasilos = mysqli_query($conn, $jumlahos); //melakukan query dengan varibel $jumlahkan
// $outs = mysqli_fetch_array($hasilos); //menyimpan hasil query ke variabel $t
// $totalos = $outs['total_o'];

// $saldobulanlalu = $totalis - $totalos;

// $jumlahsaldo = $saldobulanlalu + ($totali - $totalo);
//}

$jumlahi = "SELECT SUM(input) AS total_i FROM kas "; //perintah untuk menjumlahkan
$hasili = mysqli_query($conn, $jumlahi); //melakukan query dengan varibel $jumlahkan
$inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
$totali = $inp['total_i'];

$jumlaho = "SELECT SUM(output) AS total_o FROM kas "; //perintah untuk menjumlahkan
$hasilo = mysqli_query($conn, $jumlaho); //melakukan query dengan varibel $jumlahkan
$out = mysqli_fetch_array($hasilo); //menyimpan hasil query ke variabel $t
$totalo = $out['total_o'];

$kaskecil = query("SELECT * FROM kas ORDER BY tanggal DESC, id DESC");

// $jumlahis = "SELECT SUM(input) AS total_i FROM kas WHERE month(tanggal) ='$bulansebelumnya' AND year(tanggal) ='$tahunsebelumnya'"; //perintah untuk menjumlahkan
// $hasilis = mysqli_query($conn, $jumlahis); //melakukan query dengan varibel $jumlahkan
// $inps = mysqli_fetch_array($hasilis); //menyimpan hasil query ke variabel $t
// $totalis = $saldokass + $inps['total_i'];

// $jumlahos = "SELECT SUM(output) AS total_o FROM kas WHERE month(tanggal) ='$bulansebelumnya' AND year(tanggal) ='$tahunsebelumnya'"; //perintah untuk menjumlahkan
// $hasilos = mysqli_query($conn, $jumlahos); //melakukan query dengan varibel $jumlahkan
// $outs = mysqli_fetch_array($hasilos); //menyimpan hasil query ke variabel $t
// $totalos = $outs['total_o'];

// $saldobulanlalu = $totalis - $totalos;

$jumlahsaldo = $totali - $totalo;