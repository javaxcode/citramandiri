<?php
// $kodekaryawan = query("SELECT * FROM karyawan ORDER BY nama ASC ");
$kodejabatan = query("SELECT * FROM jabatan WHERE kodejabatan != 'JAB000' ORDER BY kodejabatan ASC ");
$prevMonth = date('n', strtotime('-1 months'));
if($prevMonth == '12') {
    $yearNow = date('Y') - 1;
} else {
    $yearNow = date('Y');
}

$monthNow = date('n');
$jumHari = cal_days_in_month(CAL_GREGORIAN, $prevMonth, $yearNow) - 4;

$karyawans = query("SELECT * FROM karyawan ORDER BY nama ASC ");

$salaraies = query("SELECT * FROM gaji WHERE month(tanggal) = '$monthNow' AND year(tanggal) = '$yearNow'");