<?php
if (isset($_POST['filter-date'])) {
    $bulan = $_POST['bulan'];
    $tahun = $_POST['tahun'];
    if ($_POST['bulan'] == "00") {
        $kaskecil = query("SELECT * FROM kas ORDER BY tanggal DESC, id DESC");
    } else {
        $kaskecil = query("SELECT * FROM kas WHERE tanggal LIKE '$tahun-$bulan%'");
    }
}
