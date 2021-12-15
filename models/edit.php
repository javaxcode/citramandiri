<?php

require '../include/fungsi.php';
date_default_timezone_set('Asia/Jakarta');
$date = new DateTime();

if (isset($_POST["updateproyek"])) {
    //var_dump($_POST);
    $noproyek = htmlspecialchars($_POST["noproyek"]);
    $namaklien = htmlspecialchars($_POST["kodeklien"]);
    $outlet = htmlspecialchars($_POST["outlet"]);
    $tempat = htmlspecialchars($_POST["tempat"]);
    $nilaiproyek = htmlspecialchars($_POST["nilaiproyek"]);
    $pekerjaan = htmlspecialchars($_POST["pekerjaan"]);
    $keterangan = htmlspecialchars($_POST["keterangan"]);

    $idp = query("SELECT id FROM proyek WHERE noproyek ='$noproyek'")[0];
    $idd = $idp['id'];

    $query = "UPDATE proyek SET
                namaklien = '$namaklien',
                outlet = '$outlet',
                tempat = '$tempat',
                pekerjaan = '$pekerjaan',
                keterangan = '$keterangan',
                nilaiproyek = '$nilaiproyek'
        WHERE id = $idd
    ";
    $masuk_data = mysqli_query($conn, $query);
    if ($masuk_data) {

        echo 3;
    } else {
        echo 1;
    }
} else if (isset($_POST["updatemaintenance"])) {
    //var_dump($_POST);
    $noproyek = htmlspecialchars($_POST["noproyek"]);
    $namaklien = htmlspecialchars($_POST["kodeklien"]);
    $outlet = htmlspecialchars($_POST["outlet"]);
    $tempat = htmlspecialchars($_POST["tempat"]);
    $nilaiproyek = htmlspecialchars($_POST["nilaiproyek"]);
    $pekerjaan = htmlspecialchars($_POST["pekerjaan"]);
    $keterangan = htmlspecialchars($_POST["keterangan"]);

    $idp = query("SELECT id FROM maintenance WHERE noproyek ='$noproyek'")[0];
    $idd = $idp['id'];

    $query = "UPDATE maintenance SET
                namaklien = '$namaklien',
                outlet = '$outlet',
                tempat = '$tempat',
                pekerjaan = '$pekerjaan',
                keterangan = '$keterangan',
                nilaiproyek = '$nilaiproyek'
        WHERE id = $idd
    ";
    $masuk_data = mysqli_query($conn, $query);
    if ($masuk_data) {

        echo 3;
    } else {
        echo 1;
    }
} else if (isset($_POST["update-transaksi"])) {

    $input = $_POST['input'];
    $keterangan = $_POST['keterangan'];
    $id = $_POST['update-transaksi'];

    $query = "UPDATE pembayaran SET
                     keterangan = '$keterangan',
                     input = '$input'
             WHERE id = '$id'
      ";
    $masuk_data = mysqli_query($conn, $query);
    if ($masuk_data) {
        echo 3;
    } else {
        echo 1;
    }
} else if (isset($_POST["update-supplier"])) {

    $namasupplier = $_POST['unama'];
    $nohpsupplier = $_POST['unohp'];
    $alamatsupplier = $_POST['ualamat'];
    $bank = $_POST['ubank'];
    $norek = $_POST['unorek'];
    $id = $_POST['update-supplier'];

    $query = "UPDATE supplier SET
                     namasupplier = '$namasupplier',
                     nohp = '$nohpsupplier',
                     alamatsupplier = '$alamatsupplier',
                     kodebank ='$bank',
                     norek ='$norek'
             WHERE kodesupplier = '$id'
      ";
} else if (isset($_POST["update-jabatan"])) {


    $kodejabatan = $_POST['update-jabatan'];
    $namajabatan = $_POST['namajabatan'];

    // var_dump($kodeoutlet);
    // die;

    $query = "UPDATE jabatan SET
                     namajabatan = '$namajabatan',
                     status = '1'
             WHERE kodejabatan = '$kodejabatan'
      ";
    $masuk_data = mysqli_query($conn, $query);
    if ($masuk_data) {
        echo 3;
    } else {
        echo 1;
    }
} else if (isset($_POST["update-karyawan"])) {
    $nip = $_POST["nipedit"];
    $email = $_POST["emailedit"];
    $nama = $_POST["namaedit"];
    $kodejabatan = $_POST["kodejabatanedit"];
    $gajipokok = $_POST["gajipokokedit"];
    $tanggungan = $_POST["tanggunganedit"];
    $statusmenikah = $_POST["statusmenikahedit"];

    $updateKaryawan = "UPDATE karyawan SET email = '$email', nama = '$nama', jabatan = '$kodejabatan', status = '$statusmenikah', tanggungan = '$tanggungan', gajipokok = '$gajipokok' WHERE nip = '$nip'";

    $isSuccess = mysqli_query($conn, $updateKaryawan);
    echo ($isSuccess) ? 3 : 1;
}