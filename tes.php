<?php
require 'include/fungsi.php';

// $jumlahi = "SELECT SUM(input) AS total_i FROM kas "; //perintah untuk menjumlahkan
// $hasili = mysqli_query($conn, $jumlahi); //melakukan query dengan varibel $jumlahkan
// $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
// $totali = $inp['total_i'];

// $jumlaho = "SELECT SUM(output) AS total_o FROM kas "; //perintah untuk menjumlahkan
// $hasilo = mysqli_query($conn, $jumlaho); //melakukan query dengan varibel $jumlahkan
// $out = mysqli_fetch_array($hasilo); //menyimpan hasil query ke variabel $t
// $totalo = $out['total_o'];

// $kaskecil = query("SELECT * FROM kas ORDER BY tanggal DESC, id DESC");

// // $jumlahis = "SELECT SUM(input) AS total_i FROM kas WHERE month(tanggal) ='$bulansebelumnya' AND year(tanggal) ='$tahunsebelumnya'"; //perintah untuk menjumlahkan
// // $hasilis = mysqli_query($conn, $jumlahis); //melakukan query dengan varibel $jumlahkan
// // $inps = mysqli_fetch_array($hasilis); //menyimpan hasil query ke variabel $t
// // $totalis = $saldokass + $inps['total_i'];

// // $jumlahos = "SELECT SUM(output) AS total_o FROM kas WHERE month(tanggal) ='$bulansebelumnya' AND year(tanggal) ='$tahunsebelumnya'"; //perintah untuk menjumlahkan
// // $hasilos = mysqli_query($conn, $jumlahos); //melakukan query dengan varibel $jumlahkan
// // $outs = mysqli_fetch_array($hasilos); //menyimpan hasil query ke variabel $t
// // $totalos = $outs['total_o'];

// // $saldobulanlalu = $totalis - $totalos;

// $jumlahsaldo = $totali - $totalo;

// echo $totali;
// echo "<br>";
// echo $totalo;
// echo "<br>";
// echo $jumlahsaldo;
// echo "<br>";
//echo $tglbulansebelumnya = date('t-m-Y', strtotime('-1 month', strtotime(date('Y-m-d'))));
// echo date('t-m-Y');
// echo date('t - ' . $bulansebelumnya . ' - Y');

$jumHari = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));

$prevMonth = date('n', strtotime('-1 months'));
if($prevMonth == '12') {
    $yearNow = date('Y') - 1;
} else {
    $yearNow = date('Y');
}

$tanggal = "12-01-2021";
$prevMonth2 = date('m', strtotime($tanggal .' -1 months'));

var_dump($prevMonth);
var_dump($prevMonth2);
var_dump($yearNow);

// $karyawans = query("SELECT * FROM karyawan ORDER BY nama ASC ");

// foreach ($karyawans as $karyawan) {
//     $nip = $karyawan['nip'];
//     $gaji = $karyawan['gajipokok'];
//     echo $karyawan['nama'] . ' - ';

//     $jumlahi = "SELECT SUM(hadir) AS total_i FROM absensi WHERE month(tanggal) = '11' AND nip = '$nip' "; //perintah untuk menjumlahkan
//     $hasili = mysqli_query($conn, $jumlahi); //melakukan query dengan varibel $jumlahkan
//     $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
//     echo $totalhadir = $inp['total_i'];
//     //echo "<br>";

//     $jumlahi = "SELECT SUM(ijin) AS total_i FROM absensi WHERE month(tanggal) = '11' AND nip = '$nip' "; //perintah untuk menjumlahkan
//     $hasili = mysqli_query($conn, $jumlahi); //melakukan query dengan varibel $jumlahkan
//     $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
//     echo $totalijin = $inp['total_i'];
//     //echo "<br>";

//     $jumlahi = "SELECT SUM(sakit) AS total_i FROM absensi WHERE month(tanggal) = '11' AND nip = '$nip' "; //perintah untuk menjumlahkan
//     $hasili = mysqli_query($conn, $jumlahi); //melakukan query dengan varibel $jumlahkan
//     $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
//     echo $totalsakit = $inp['total_i'];
//     //echo "<br>";

//     $jumlahi = "SELECT SUM(alfa) AS total_i FROM absensi WHERE month(tanggal) = '11' AND nip = '$nip' "; //perintah untuk menjumlahkan
//     $hasili = mysqli_query($conn, $jumlahi); //melakukan query dengan varibel $jumlahkan
//     $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
//     echo $totalalfa = $inp['total_i'];

//     echo ' - ';

//     $gajiperhari = $gaji / $jumHari;
//     $potongangaji = ($gajiperhari / 2);

//     // echo $Tgaji = ($gajiperhari * $totalhadir) - ($potongangaji * $totalijin) - ($potongangaji * $totalsakit) - ($gajiperhari * $totalalfa);

//     echo $Tgaji = $gaji;


//     $statuskaryawan = $karyawan['status'];
//     $tanggungan = $karyawan['tanggungan'];

//     if ($statuskaryawan == 0) {
//         if ($tanggungan == 0) {
//             $ptkp = 54000000;
//         } elseif ($tanggungan == 1) {
//             $ptkp = 58500000;
//         } elseif ($tanggungan == 2) {
//             $ptkp = 63000000;
//         } elseif ($tanggungan == 3) {
//             $ptkp = 67500000;
//         }
//     } elseif ($statuskaryawan == 1) {
//         if ($tanggungan == 0) {
//             $ptkp = 58500000;
//         } elseif ($tanggungan == 1) {
//             $ptkp = 63000000;
//         } elseif ($tanggungan == 2) {
//             $ptkp = 67500000;
//         } elseif ($tanggungan == 3) {
//             $ptkp = 72000000;
//         }
//     }

//     $biayajabatan = ($Tgaji * 5) / 100;
//     $GajiBersihPPH = $Tgaji - ($biayajabatan + $karyawan['bpjs']);
//     $GajiBersihPPH1tahun = $GajiBersihPPH * 12;

//     if ($GajiBersihPPH1tahun > $ptkp) {
//         $pkp = $GajiBersihPPH1tahun - $ptkp;
//         $PPH21Setahun = ($pkp * 5) / 100;
//         $PPH21Bulanini = $PPH21Setahun / 12;
//     } elseif ($GajiBersihPPH1tahun < $ptkp) {
//         $PPH21Bulanini = 0;
//     }
//     echo ' - ';
//     echo $PPH21Bulanini;
//     echo "<br>";
// }



// $jumlahi = "SELECT SUM(hadir) AS total_i FROM absensi WHERE tanggal = '2021-11-02' "; //perintah untuk menjumlahkan
// $hasili = mysqli_query($conn, $jumlahi); //melakukan query dengan varibel $jumlahkan
// $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
// echo $totali = $inp['total_i'];
// echo "<br>";

// $jumlahi = "SELECT SUM(ijin) AS total_i FROM absensi WHERE tanggal = '2021-11-02' "; //perintah untuk menjumlahkan
// $hasili = mysqli_query($conn, $jumlahi); //melakukan query dengan varibel $jumlahkan
// $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
// echo $totali = $inp['total_i'];
// echo "<br>";

// $jumlahi = "SELECT SUM(sakit) AS total_i FROM absensi WHERE tanggal = '2021-11-02' "; //perintah untuk menjumlahkan
// $hasili = mysqli_query($conn, $jumlahi); //melakukan query dengan varibel $jumlahkan
// $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
// echo $totali = $inp['total_i'];
// echo "<br>";

// $jumlahi = "SELECT SUM(alfa) AS total_i FROM absensi WHERE tanggal = '2021-11-02' "; //perintah untuk menjumlahkan
// $hasili = mysqli_query($conn, $jumlahi); //melakukan query dengan varibel $jumlahkan
// $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
// echo $totali = $inp['total_i'];
// echo "<br>";

// echo "<hr>";


// $hasil_claim_list = mysqli_query($conn, "SELECT * FROM gaji");
// $i = 0;

// while ($i < mysqli_num_fields($hasil_claim_list)) {

//     $fld = mysqli_fetch_field_direct($hasil_claim_list, $i);
//     echo $nama_field = $fld->name;
//     echo "<br>";
//     $i = $i + 1;
// }
// echo $i;
