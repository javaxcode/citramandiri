<?php
$kodeklienn = query("SELECT id, kodeklien, namaklien FROM klien ORDER BY namaklien ASC ");

if(isset($_POST["tampilkan"])) {
    $bulan = $_POST["bulan"];
    $tahun = $_POST["tahun"];

    if ($bulan === "00" AND $tahun === "00") {
        $proyek = query("SELECT * FROM proyek WHERE noproyek != '' ORDER BY id DESC");

        $jumlahi = "SELECT SUM(nilaiproyek) AS total_i FROM proyek   "; //perintah untuk menjumlahkan
        $hasili = mysqli_query($conn, $jumlahi) ;//melakukan query dengan varibel $jumlahkan
        $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
        $totali = $inp['total_i'];

        $jumlahot = "SELECT SUM(input) AS total_ot FROM pembayaran WHERE kodekas ='KBMP'"; //perintah untuk menjumlahkan
        $hasilot = mysqli_query($conn, $jumlahot) ;//melakukan query dengan varibel $jumlahkan
        $inpot = mysqli_fetch_array($hasilot); //menyimpan hasil query ke variabel $t
        $totalot = $totali-$inpot['total_ot'];
    }elseif($bulan === "00"){
        $proyek = query("SELECT * FROM proyek WHERE noproyek != '' AND year(tanggalpjt) ='$tahun' ORDER BY id DESC");

        $jumlahi = "SELECT SUM(nilaiproyek) AS total_i FROM proyek WHERE noproyek != '' AND year(tanggalpjt) ='$tahun' "; //perintah untuk menjumlahkan
        $hasili = mysqli_query($conn, $jumlahi) ;//melakukan query dengan varibel $jumlahkan
        $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
        $totali = $inp['total_i'];

        $jumlahot = "SELECT SUM(input) AS total_ot FROM pembayaran WHERE kodekas ='KBMP' WHERE noproyek != '' AND year(tanggalpjt) ='$tahun' "; //perintah untuk menjumlahkan
        $hasilot = mysqli_query($conn, $jumlahot) ;//melakukan query dengan varibel $jumlahkan
        $inpot = mysqli_fetch_array($hasilot); //menyimpan hasil query ke variabel $t
        $totalot = $totali-$inpot['total_ot'];

        //$jumlahsaldo = $totali;
    }elseif($tahun === "00"){
        $proyek = query("SELECT * FROM proyek WHERE noproyek != '' AND month(tanggalpjt) ='$bulan' ORDER BY id DESC");

        $jumlahi = "SELECT SUM(nilaiproyek) AS total_i FROM proyek WHERE noproyek != '' AND month(tanggalpjt) ='$bulan' "; //perintah untuk menjumlahkan
        $hasili = mysqli_query($conn, $jumlahi) ;//melakukan query dengan varibel $jumlahkan
        $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
        $totali = $inp['total_i'];

        $jumlahot = "SELECT SUM(input) AS total_ot FROM pembayaran WHERE kodekas ='KBMP' WHERE noproyek != '' AND month(tanggalpjt) ='$bulan' "; //perintah untuk menjumlahkan
        $hasilot = mysqli_query($conn, $jumlahot) ;//melakukan query dengan varibel $jumlahkan
        $inpot = mysqli_fetch_array($hasilot); //menyimpan hasil query ke variabel $t
        $totalot = $totali-$inpot['total_ot'];

        //$jumlahsaldo = $totali;
    }else{
        $proyek = query("SELECT * FROM proyek WHERE noproyek != '' AND month(tanggalpjt) ='$bulan' AND year(tanggalpjt) ='$tahun' ORDER BY id DESC");

        $jumlahi = "SELECT SUM(nilaiproyek) AS total_i FROM proyek WHERE noproyek != '' AND month(tanggalpjt) ='$bulan' AND year(tanggalpjt) ='$tahun' "; //perintah untuk menjumlahkan
        $hasili = mysqli_query($conn, $jumlahi) ;//melakukan query dengan varibel $jumlahkan
        $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
        $totali = $inp['total_i'];

        $jumlahot = "SELECT SUM(input) AS total_ot FROM pembayaran WHERE kodekas ='KBMP' WHERE noproyek != '' AND month(tanggalpjt) ='$bulan' AND year(tanggalpjt) ='$tahun' "; //perintah untuk menjumlahkan
        $hasilot = mysqli_query($conn, $jumlahot) ;//melakukan query dengan varibel $jumlahkan
        $inpot = mysqli_fetch_array($hasilot); //menyimpan hasil query ke variabel $t
        $totalot = $totali-$inpot['total_ot'];

        //$jumlahsaldo = $totali;
    }

    


}else{
    $proyek = query("SELECT * FROM proyek WHERE noproyek != '' ORDER BY id DESC");

    $jumlahi = "SELECT SUM(nilaiproyek) AS total_i FROM proyek   "; //perintah untuk menjumlahkan
    $hasili = mysqli_query($conn, $jumlahi) ;//melakukan query dengan varibel $jumlahkan
    $inp = mysqli_fetch_array($hasili); //menyimpan hasil query ke variabel $t
    $totali = $inp['total_i'];

    $jumlahot = "SELECT SUM(input) AS total_ot FROM pembayaran WHERE kodekas ='KBMP'"; //perintah untuk menjumlahkan
    $hasilot = mysqli_query($conn, $jumlahot) ;//melakukan query dengan varibel $jumlahkan
    $inpot = mysqli_fetch_array($hasilot); //menyimpan hasil query ke variabel $t
    $totalot = $totali-$inpot['total_ot'];
}