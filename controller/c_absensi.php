<?php
$karyawans = query("SELECT * FROM karyawan ORDER BY nama ASC ");

$events =  query("SELECT * FROM absensi GROUP BY tanggal");

//$kodejabatan = query("SELECT * FROM jabatan WHERE kodejabatan != 'JAB00' ORDER BY kodejabatan ASC ");