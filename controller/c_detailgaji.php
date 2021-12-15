<?php

if(isset($_GET['nip']) && isset($_GET['tanggal'])) {

    $nip = $_GET['nip'];
    $tanggal = $_GET['tanggal'];

    $prevMonth = date('m', strtotime($tanggal .' -1 months'));
    if($prevMonth == '12') {
        $yearNow = date('Y') - 1;
    } else {
        $yearNow = date('Y');
    }

    $salary = query("SELECT * FROM gaji WHERE tanggal = '$tanggal' AND nip = '$nip'")[0];
    $positionCode = query("SELECT jabatan FROM karyawan WHERE nip = '$nip'")[0]['jabatan'];
    $position = query("SELECT namajabatan FROM jabatan WHERE kodejabatan = '$positionCode'")[0]['namajabatan'];
    
    $hadir = query("SELECT hadir FROM absensi WHERE month(tanggal) = '$prevMonth' AND year(tanggal) = '$yearNow' AND nip = '$nip' AND hadir = '1'");
    $totalhadir = count($hadir);

    $sakit = query("SELECT sakit FROM absensi WHERE month(tanggal) = '$prevMonth' AND year(tanggal) = '$yearNow' AND nip = '$nip' AND sakit = '1'");
    $totalsakit = count($sakit);

    $ijin = query("SELECT ijin FROM absensi WHERE month(tanggal) = '$prevMonth' AND year(tanggal) = '$yearNow' AND nip = '$nip' AND ijin = '1'");
    $totalijin = count($ijin);

    $alfa = query("SELECT alfa FROM absensi WHERE month(tanggal) = '$prevMonth' AND year(tanggal) = '$yearNow' AND nip = '$nip' AND alfa = '1'");
    $totalalfa = count($alfa);
    
}