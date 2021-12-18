<?php

require '../include/fungsi.php';
date_default_timezone_set('Asia/Jakarta');
$date = new DateTime();

// var_dump($_POST);

if (isset($_POST['kasmasuk'])) {
    //var_dump($_POST);

    $butl = substr($date->format('Y-m-d'), 5, 2);
    $thl = substr($date->format('Y-m-d'), 2, 2);
    $kodekas = "KM";
    $kodebulan = $thl . $butl;

    $kodeakun = $_POST["kodeakun"];
    $tangg = $_POST["tanggal"];
    $tanggal = date('Y-m-d', strtotime($tangg));
    $butli = date('m', strtotime($tangg));

    // if ($butli != $butl) {
    //     echo 2;
    //     return false;
    // }



    $kas = query("SELECT * FROM kas WHERE kodekas ='KM' ORDER BY id DESC LIMIT 1")[0];
    if ($kas['kodekas'] . $kas['kodebulan'] != $kodekas . $thl . $butl) {
        $newkodetr = "0001";
    } else {
        $lastkode = query("SELECT * FROM kas WHERE kodekas ='KM' ORDER BY id DESC LIMIT 1")[0];
        $lk = $lastkode['kodetr'];
        $noUrut = (int) $lastkode['kodetr'];
        $noUrut++;
        $newkodetr = sprintf("%04s", $noUrut);
    }

    $payto = htmlspecialchars($_POST["payto"]);
    $keterangan = htmlspecialchars($_POST["keterangan"]);
    $input = htmlspecialchars($_POST["jumlahinput"]);
    $output = 0;
    $saldokas = query("SELECT saldo FROM kas ORDER BY id DESC LIMIT 1")[0];
    $saldo = $saldokas['saldo'] + $input;


    //query insert data
    $query = "INSERT INTO kas 
                VALUES 
                ('','$tanggal','$kodekas','$kodebulan','$newkodetr','$payto','$keterangan','$input','$output','$saldo','$kodeakun')
            ";

    $masuk_data = mysqli_query($conn, $query);
    if ($masuk_data) {

        echo 3;
    } else {
        echo 1;
    }
} else if (isset($_POST['kaskeluar'])) {

    $butl = substr($date->format('Y-m-d'), 5, 2);
    $thl = substr($date->format('Y-m-d'), 2, 2);
    $kodekas = "KK";
    $kodebulan = $thl . $butl;

    $kodeakun = $_POST["kodeakunout"];
    $tangg = $_POST["tanggalout"];
    $tanggal = date('Y-m-d', strtotime($tangg));
    $butli = date('m', strtotime($tangg));

    // if ($butli != $butl) {
    //     echo 2;
    //     return false;
    // }



    $kas = query("SELECT * FROM kas WHERE kodekas ='$kodekas' ORDER BY id DESC LIMIT 1")[0];
    if ($kas['kodekas'] . $kas['kodebulan'] != $kodekas . $thl . $butl) {
        $newkodetr = "0001";
    } else {
        $lastkode = query("SELECT * FROM kas WHERE kodekas ='$kodekas' ORDER BY id DESC LIMIT 1")[0];
        $lk = $lastkode['kodetr'];
        $noUrut = (int) $lastkode['kodetr'];
        $noUrut++;
        $newkodetr = sprintf("%04s", $noUrut);
    }

    $payto = htmlspecialchars($_POST["paytoout"]);
    $keterangan = htmlspecialchars($_POST["keteranganout"]);
    $input = 0;
    $output = htmlspecialchars($_POST["jumlahoutput"]);
    $saldokas = query("SELECT saldo FROM kas ORDER BY id DESC LIMIT 1")[0];
    $saldo = $saldokas['saldo'] - $output;


    //query insert data
    $query = "INSERT INTO kas 
                VALUES 
                ('','$tanggal','$kodekas','$kodebulan','$newkodetr','$payto','$keterangan','$input','$output','$saldo','$kodeakun')
            ";

    $masuk_data = mysqli_query($conn, $query);
    if ($masuk_data) {

        echo 3;
    } else {
        echo 1;
    }
} else if (isset($_POST["klien"])) {
    $kodeklien = query("SELECT * FROM klien ORDER BY id DESC LIMIT 1")[0];
    $kodem = substr($kodeklien['kodeklien'], 1);
    $noUrut = (int) $kodem;
    $noUrut++;
    $newkodetr = sprintf("%03s", $noUrut);

    $kode = "K";
    $km = $kode . $newkodetr;

    $nklien = htmlspecialchars($_POST["nklien"]);
    $nama = "0";
    $alamat = "0";
    $nohp = "0";
    $bank = "0";
    $norek = "0";

    //query insert data
    $query = "INSERT INTO klien 
                VALUES 
                ('','$km','$nklien','$nama','$alamat','$nohp','$bank','$norek')
            ";
    $masuk_data = mysqli_query($conn, $query);
    if ($masuk_data) {

        echo 3;
    } else {
        echo 1;
    }
} else if (isset($_POST["proyek"])) {

    $tangg = $_POST["tanggal"];
    $tanggal = date('Y-m-d', strtotime($tangg));
    $bul = date('m', strtotime($tangg));
    $t = substr(date('Y', strtotime($tangg)), 2, 2);

    $butl = substr($date->format('Y-m-d'), 5, 2);
    $thl = substr($date->format('Y-m-d'), 2, 2);
    $kodeproyek = "PSRS";
    $kodebulan = $bul . $t;

    $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM proyek"));
    if ($cekdata > 0) {

        $kas = query("SELECT * FROM proyek WHERE month(tanggalpjt) ='$bul' ORDER BY id DESC LIMIT 1")[0];

        if (substr($kas['noproyek'], 7, 2) != $bul) {
            $newkodetr = "001";
        } else {
            $lastkode = query("SELECT * FROM proyek WHERE month(tanggalpjt) ='$bul' ORDER BY id DESC LIMIT 1")[0];
            $lk = substr($lastkode['noproyek'], 4, 3);
            $noUrut = (int) $lk;
            $noUrut++;
            $newkodetr = sprintf("%03s", $noUrut);
        }
    } else {
        $newkodetr = "001";
    }

    $tanggalpro = $tanggal;
    $tanggalpjt = $tanggal;
    $noproposal = "PRO" . $kodebulan . $newkodetr;
    $noproyek = "PSRS" . $newkodetr . $kodebulan;

    //$novoucher = htmlspecialchars($_POST["nv"]);
    $namaklien = htmlspecialchars($_POST["kodeklien"]);
    $outlet = htmlspecialchars($_POST["outlet"]);
    $tempat = htmlspecialchars($_POST["tempat"]);
    $nilaiproyek = htmlspecialchars($_POST["nilaiproyek"]);
    $pekerjaan = htmlspecialchars($_POST["pekerjaan"]);
    $keterangan = "";
    $status = "";
    $diskon = "";

    //query insert data
    $query = "INSERT INTO proyek 
                VALUES 
                ('','$tanggalpro','$tanggalpjt','$noproposal','$noproyek','$namaklien','$outlet','$tempat','$pekerjaan','$nilaiproyek','$keterangan','$status','$diskon')
            ";
    $masuk_data = mysqli_query($conn, $query);
    if ($masuk_data) {

        echo 3;
    } else {
        echo 1;
    }
} else if (isset($_POST['pembayaranproyek'])) {
    //var_dump($_POST);

    $pk = htmlspecialchars($_POST["pk"]);
    $kodeproyek = htmlspecialchars($_POST["noproyek"]);
    $payto = $_POST["payto"];
    $kodeakun = 411;
    $tangg = $_POST["tanggal"];
    $tanggal = date('Y-m-d', strtotime($tangg));
    $input = htmlspecialchars($_POST["jumlahinput"]);

    $butl = substr($date->format('Y-m-d'), 5, 2);
    $thl = substr($date->format('Y-m-d'), 2, 2);
    $kodekas = "KBMP";
    $kodebulan = $thl . $butl;

    $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pembayaran WHERE kodekas = '$kodekas' AND kodebulan ='$kodebulan' "));

    if ($cekdata) {
        $kas = query("SELECT * FROM pembayaran WHERE kodekas = '$kodekas' AND kodebulan ='$kodebulan' ORDER BY id DESC LIMIT 1")[0];
        if ($kas['kodekas'] . $kas['kodebulan'] != $kodekas . $kodebulan) {
            $newkodetr = "0001";
        } else {
            $lastkode = query("SELECT * FROM pembayaran  WHERE kodekas = '$kodekas' AND kodebulan ='$kodebulan' ORDER BY id DESC LIMIT 1")[0];
            $lk = $lastkode['kodetr'];
            $noUrut = (int) $lastkode['kodetr'];
            $noUrut++;
            $newkodetr = sprintf("%04s", $noUrut);
        }
    } else {
        $newkodetr = "0001";
    }

    $detpro = query("SELECT * FROM proyek WHERE noproyek = '$kodeproyek' ")[0];

    $kodeklien = $detpro['namaklien'];
    $detklien = query("SELECT * FROM klien WHERE kodeklien = '$kodeklien' ")[0];
    $nk = $detklien['namaklien'];
    $ok = $detpro['outlet'];
    $keterangan = $nk . " / " . $ok . " " . "-" . " " . $pk;
    $saldokas = query("SELECT saldo FROM pembayaran ORDER BY id DESC LIMIT 1")[0];
    $output = 0;
    $saldo = $saldokas['saldo'] + $input;

    $saldodp = $kodekas . $kodebulan . $newkodetr;

    $query = "INSERT INTO pembayaran 
                VALUES 
                ('','$tanggal','$kodekas','$kodebulan','$newkodetr','$kodeproyek','$payto','$kodeakun','$keterangan','$input','$output','$saldo')
            ";

    $masuk_data = mysqli_query($conn, $query);
    if ($masuk_data) {

        echo 3;
    } else {
        echo 1;
    }
} else if (isset($_POST["maintenance"])) {

    $tangg = $_POST["tanggal"];
    $tanggal = date('Y-m-d', strtotime($tangg));
    $bul = date('m', strtotime($tangg));
    $t = substr(date('Y', strtotime($tangg)), 2, 2);

    $butl = substr($date->format('Y-m-d'), 5, 2);
    $thl = substr($date->format('Y-m-d'), 2, 2);
    $kodeproyek = "MSRS";
    $kodebulan = $bul . $t;

    $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM maintenance"));
    if ($cekdata > 0) {
        $kas = query("SELECT * FROM maintenance WHERE month(tanggalpjt) ='$bul' ORDER BY id DESC LIMIT 1")[0];

        if (substr($kas['noproyek'], 7, 2) != $bul) {
            $newkodetr = "001";
        } else {
            $lastkode = query("SELECT * FROM maintenance WHERE month(tanggalpjt) ='$bul' ORDER BY id DESC LIMIT 1")[0];
            $lk = substr($lastkode['noproyek'], 4, 3);
            $noUrut = (int) $lk;
            $noUrut++;
            $newkodetr = sprintf("%03s", $noUrut);
        }
    } else {
        $newkodetr = "001";
    }


    $tanggalpro = $tanggal;
    $tanggalpjt = $tanggal;
    $noproposal = "PRO" . $kodebulan . $newkodetr;
    $noproyek = "MSRS" . $newkodetr . $kodebulan;

    //$novoucher = htmlspecialchars($_POST["nv"]);
    $namaklien = htmlspecialchars($_POST["kodeklien"]);
    $outlet = htmlspecialchars($_POST["outlet"]);
    $tempat = htmlspecialchars($_POST["tempat"]);
    $nilaiproyek = htmlspecialchars($_POST["nilaiproyek"]);
    $pekerjaan = htmlspecialchars($_POST["pekerjaan"]);
    $keterangan = "";
    $status = "";
    $diskon = "";

    //query insert data
    $query = "INSERT INTO maintenance 
                VALUES 
                ('','$tanggalpro','$tanggalpjt','$noproposal','$noproyek','$namaklien','$outlet','$tempat','$pekerjaan','$nilaiproyek','$keterangan','$status','$diskon')
            ";
    $masuk_data = mysqli_query($conn, $query);
    if ($masuk_data) {

        echo 3;
    } else {
        echo 1;
    }
} else if (isset($_POST['pembayaranmaintenance'])) {
    //var_dump($_POST);

    $pk = htmlspecialchars($_POST["pk"]);
    $kodeproyek = htmlspecialchars($_POST["noproyek"]);
    $payto = $_POST["payto"];
    $kodeakun = 411;
    $tangg = $_POST["tanggal"];
    $tanggal = date('Y-m-d', strtotime($tangg));
    $input = htmlspecialchars($_POST["jumlahinput"]);

    $butl = substr($date->format('Y-m-d'), 5, 2);
    $thl = substr($date->format('Y-m-d'), 2, 2);
    $kodekas = "KBMP";
    $kodebulan = $thl . $butl;

    $cekdata = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM pembayaran WHERE kodekas = '$kodekas' AND kodebulan ='$kodebulan' "));

    if ($cekdata) {
        $kas = query("SELECT * FROM pembayaran WHERE kodekas = '$kodekas' AND kodebulan ='$kodebulan' ORDER BY id DESC LIMIT 1")[0];
        if ($kas['kodekas'] . $kas['kodebulan'] != $kodekas . $kodebulan) {
            $newkodetr = "0001";
        } else {
            $lastkode = query("SELECT * FROM pembayaran  WHERE kodekas = '$kodekas' AND kodebulan ='$kodebulan' ORDER BY id DESC LIMIT 1")[0];
            $lk = $lastkode['kodetr'];
            $noUrut = (int) $lastkode['kodetr'];
            $noUrut++;
            $newkodetr = sprintf("%04s", $noUrut);
        }
    } else {
        $newkodetr = "0001";
    }

    $detpro = query("SELECT * FROM maintenance WHERE noproyek = '$kodeproyek' ")[0];

    $kodeklien = $detpro['namaklien'];
    $detklien = query("SELECT * FROM klien WHERE kodeklien = '$kodeklien' ")[0];
    $nk = $detklien['namaklien'];
    $ok = $detpro['outlet'];
    $keterangan = $nk . " / " . $ok . " " . "-" . " " . $pk;
    $saldokas = query("SELECT saldo FROM pembayaran ORDER BY id DESC LIMIT 1")[0];
    $output = 0;
    $saldo = $saldokas['saldo'] + $input;

    $saldodp = $kodekas . $kodebulan . $newkodetr;

    $query = "INSERT INTO pembayaran 
                VALUES 
                ('','$tanggal','$kodekas','$kodebulan','$newkodetr','$kodeproyek','$payto','$kodeakun','$keterangan','$input','$output','$saldo')
            ";

    $masuk_data = mysqli_query($conn, $query);
    if ($masuk_data) {
        echo 3;
    } else {
        echo 1;
    }
} else if (isset($_POST['inputjabatan'])) {

    $cekdata = mysqli_query($conn, "SELECT * FROM jabatan ");
    //cek ada data?
    if (mysqli_num_rows($cekdata) > 0) {
        $kodejabatan = query("SELECT * FROM jabatan ORDER BY kodejabatan DESC LIMIT 1")[0];
        $kodes = substr($kodejabatan['kodejabatan'], 3);
        $noUrut = (int) $kodes;
        $noUrut++;
        $newkodetr = sprintf("%03s", $noUrut);
    } else {
        $newkodetr = "001";
    }

    $kode = "JAB";
    $kp = $kode . $newkodetr;

    $njabatan = strtolower(htmlspecialchars($_POST["njabatan"]));

    $ceknama = mysqli_query($conn, "SELECT * FROM jabatan WHERE namajabatan ='$njabatan' ");

    if (mysqli_fetch_assoc($ceknama)) {
        echo 2;
        return false;
    }

    //query insert data
    $query = "INSERT INTO jabatan 
                VALUES 
                ('','$kp','$njabatan','1')
            ";

    $masuk_data = mysqli_query($conn, $query);
    if ($masuk_data) {

        echo 3;
    } else {
        echo 1;
    }
} else if (isset($_POST['inputkaryawan'])) {
    $email = $_POST["email"];
    $nama = $_POST["nama"];
    $kodejabatan = $_POST["kodejabatan"];
    $tanggal = $_POST["tanggal"];
    $gajipokok = $_POST["gajipokok"];
    $tanggungan = $_POST["tanggungan"];
    $statusmenikah = $_POST["statusmenikah"];

    $year = date('Y', strtotime($tanggal));
    $month = date('m', strtotime($tanggal));
    $date = date('d', strtotime($tanggal));

    $combineDate = $year . $month . $date;

    $isNipAvailable = mysqli_query($conn, "SELECT nip FROM karyawan WHERE nip LIKE '$combineDate%' ORDER BY nip DESC LIMIT 1");

    if (mysqli_num_rows($isNipAvailable) > 0) {
        $numberCode = substr(mysqli_fetch_assoc($isNipAvailable)["nip"], 8);
        $numberCodeToInt = (int) $numberCode;
        $numberCodeToInt++;
        $nip = $combineDate . sprintf("%03s", $numberCodeToInt);
    } else {
        $nip = $combineDate . "001";
    }

    $insertKaryawan = "INSERT INTO karyawan (id, email, nama, jabatan, masukkerja, status, tanggungan, nip, gajipokok, tunjjabatan, tunjrumah, tunjpulsa, tunjmakan, bpjs, totalgaji, aktif) VALUES ('','$email','$nama','$kodejabatan','$year-$month-$date','$statusmenikah','$tanggungan','$nip','$gajipokok','0','0','0','0','0','$gajipokok','1')";

    $isSuccess = mysqli_query($conn, $insertKaryawan);
    echo ($isSuccess) ? 3 : 1;
} else if (isset($_POST['inputabsensi'])) {
    $absensies = $_POST["absensi"];
    $tanggal = $_POST["tanggal"];
    $names = $_POST["nama"];
    $nips = $_POST["nip"];
    $year = date('Y', strtotime($tanggal));
    $month = date('m', strtotime($tanggal));
    $date = date('d', strtotime($tanggal));
    $combineDate = "ABS" . $year . $month . $date;
    $statuses = "'0','0','0','0','0'";
    $statusUpdates = "hadir='0',lembur='0',sakit='0',ijin='0',alfa='0'";

    foreach ($absensies as $key => $absensi) {
        $isExactAbsenAvailable = mysqli_query($conn, "SELECT * FROM absensi WHERE tanggal = '$tanggal' AND nip = '$nips[$key]'");

        $isAbsenAvailable = mysqli_query($conn, "SELECT kodeabs FROM absensi WHERE kodeabs LIKE '$combineDate%' ORDER BY kodeabs DESC LIMIT 1");

        if (mysqli_num_rows($isAbsenAvailable) > 0) {
            $numberCode = substr(mysqli_fetch_assoc($isAbsenAvailable)["kodeabs"], 11);
            $numberCodeToInt = (int) $numberCode;
            $numberCodeToInt++;
            $kodeabs = $combineDate . sprintf("%03s", $numberCodeToInt);
        } else {
            $kodeabs = $combineDate . "001";
        }

        switch ($absensi) {
            case "hadir":
                $statusUpdates = "hadir='1',lembur='0',sakit='0',ijin='0',alfa='0'";
                $statuses = "'1','0','0','0','0'";
                break;
            case "sakit":
                $statusUpdates = "hadir='0',lembur='0',sakit='1',ijin='0',alfa='0'";
                $statuses = "'0','0','1','0','0'";
                break;
            case "ijin":
                $statusUpdates = "hadir='0',lembur='0',sakit='0',ijin='1',alfa='0'";
                $statuses = "'0','0','0','1','0'";
                break;
            case "alfa":
                $statusUpdates = "hadir='0',lembur='0',sakit='0',ijin='0',alfa='1'";
                $statuses = "'0','0','0','0','1'";
                break;
            default:
                $statusUpdates = "hadir='0',lembur='0',sakit='0',ijin='0',alfa='0'";
                $statuses = "'0','0','0','0','0'";
        }

        if (mysqli_num_rows($isExactAbsenAvailable) > 0) {
            $queryAbsensi = "UPDATE absensi SET $statusUpdates WHERE tanggal = '$tanggal' AND nip = '$nips[$key]' ";
        } else {
            $queryAbsensi = "INSERT INTO absensi (id, tanggal, kodeabs, nama, nip, hadir, lembur, sakit, ijin, alfa) VALUES ('','$tanggal','$kodeabs','$names[$key]','$nips[$key]', $statuses)";
        }

        $isSuccess = mysqli_query($conn, $queryAbsensi);
    }

    echo ($isSuccess) ? 3 : 1;
} else if (isset($_POST['inputgaji'])) {
    $prevMonth = date('n', strtotime('-1 months'));

    if ($prevMonth == '12') {
        $yearNow = date('Y') - 1;
    } else {
        $yearNow = date('Y');
    }

    $dateNow = date('Y-m-d');
    $yearNow = date('Y');
    $monthNow = date('n');
    $jumHari = cal_days_in_month(CAL_GREGORIAN, $prevMonth, $yearNow) - 4;

    $karyawans = query("SELECT * FROM karyawan ORDER BY nama ASC");

    $checkGaji = query("SELECT * FROM gaji WHERE month(tanggal) = '$monthNow' AND year(tanggal) = '$yearNow'");

    if (count($checkGaji) > 0) {
        echo 1;
    } else {
        foreach ($karyawans as $karyawan) {
            $name = $karyawan['nama'];
            $nip = $karyawan['nip'];
            $gaji = $karyawan['gajipokok'];
            $bpjs = $karyawan['bpjs'];
            $tjabatan = $karyawan['tunjjabatan'];
            $trumah = $karyawan['tunjrumah'];
            $tpulsa = $karyawan['tunjpulsa'];
            $tmakan = $karyawan['tunjmakan'];

            $checkLastKodeAbs = query("SELECT * FROM absensi WHERE nip = '$nip' AND month(tanggal) = '$prevMonth' AND year(tanggal) = '$yearNow' ORDER BY tanggal DESC LIMIT 1")[0];

            $kodeabs = $checkLastKodeAbs['kodeabs'];

            $hadir = query("SELECT * FROM absensi WHERE month(tanggal) = '$prevMonth' AND nip = '$nip' AND hadir = '1'");
            $totalhadir = count($hadir);

            $sakit = query("SELECT * FROM absensi WHERE month(tanggal) = '$prevMonth' AND nip = '$nip' AND sakit = '1'");
            $totalsakit = count($sakit);

            $ijin = query("SELECT * FROM absensi WHERE month(tanggal) = '$prevMonth' AND nip = '$nip' AND ijin = '1'");
            $totalijin = count($ijin);

            $alfa = query("SELECT * FROM absensi WHERE month(tanggal) = '$prevMonth' AND nip = '$nip' AND alfa = '1'");
            $totalalfa = count($alfa);

            // hitung gaji per hari
            $gajiperhari = round($gaji / $jumHari);

            // hitung 50% gaji per hari
            $potongangaji = round($gajiperhari / 2);

            // hitung total gaji
            $totalgaji = ($gajiperhari * $totalhadir) - ($potongangaji * $totalijin) - ($potongangaji * $totalsakit) - ($gajiperhari * $totalalfa);

            $potonganalfa = $gajiperhari * $totalalfa;
            $potonganijin = $potongangaji * $totalijin;
            $potongansakit = $potongangaji * $totalsakit;

            $statuskaryawan = $karyawan['status'];
            $tanggungan = $karyawan['tanggungan'];

            // cek status pernikahan, untuk menghitung penghasilan tidak kena pajak
            if ($statuskaryawan == 0) {
                if ($tanggungan == 0) {
                    $ptkp = 54000000;
                } elseif ($tanggungan == 1) {
                    $ptkp = 58500000;
                } elseif ($tanggungan == 2) {
                    $ptkp = 63000000;
                } elseif ($tanggungan == 3) {
                    $ptkp = 67500000;
                }
            } elseif ($statuskaryawan == 1) {
                if ($tanggungan == 0) {
                    $ptkp = 58500000;
                } elseif ($tanggungan == 1) {
                    $ptkp = 63000000;
                } elseif ($tanggungan == 2) {
                    $ptkp = 67500000;
                } elseif ($tanggungan == 3) {
                    $ptkp = 72000000;
                }
            }

            // 5% dari total gaji
            $biayajabatan = ($totalgaji * 5) / 100;

            $gajiBersihPPH = $totalgaji - ($biayajabatan + $karyawan['bpjs']);

            $gajiBersihPPH1tahun = $gajiBersihPPH * 12;

            if ($gajiBersihPPH1tahun > $ptkp) {
                $pkp = $gajiBersihPPH1tahun - $ptkp;
                $PPH21Setahun = ($pkp * 5) / 100;
                $PPH21Bulanini = $PPH21Setahun / 12;
            } elseif ($gajiBersihPPH1tahun < $ptkp) {
                $PPH21Bulanini = 0;
            }

            $queryGaji = "INSERT INTO gaji (id, tanggal, kodeabs, nama, nip, keterangan, gp, tjabatan, tpulsa, tmakan, bpjs, lembur, totalgaji, cicilan, alfa, ijin, sakit, totalbon, pph21, totalbayar, status) VALUES ('', '$dateNow', '$kodeabs', '$name', '$nip', 'keterangan','$gaji','$tjabatan','$tpulsa','$tmakan','$bpjs','0','$gaji','0','$potonganalfa','$potonganijin','$potongansakit','0','$PPH21Bulanini','$totalgaji','1')";

            $isSuccess = mysqli_query($conn, $queryGaji);
        }

        echo ($isSuccess) ? 3 : 1;
    }
} else if (isset($_POST['inputmenu'])) {

    $menu = $_POST['nmenu'];
    $url = $_POST['nurl'];

    $cekdata = mysqli_query($conn, "SELECT * FROM user_menu WHERE menu = '$menu'");


    if (mysqli_num_rows($cekdata) > 0) {
        echo 1;
    } else {
        $cekurl = mysqli_query($conn, "SELECT * FROM user_menu WHERE url = '$url'");
        if (mysqli_num_rows($cekurl) > 0) {
            echo 2;
        } else {
            $query = "INSERT INTO user_menu SET 
                       menu ='$menu',
                       url  = '$url'
                     ";
            $masuk_data = mysqli_query($conn, $query);
            if ($masuk_data) {
                echo 4;
            } else {

                echo 3;
            }
        }
    }
} else if (isset($_POST['inputsubmenu'])) {

    $mparent = $_POST['mparent'];
    $menu = $_POST['nmenu'];
    $url = $_POST['nurl'];


    $cekdata = mysqli_query($conn, "SELECT * FROM user_sub_menu WHERE title = '$menu'");

    if (mysqli_num_rows($cekdata) > 0) {
        echo 1;
    } else {
        $cekurl = mysqli_query($conn, "SELECT * FROM user_sub_menu WHERE url = '$url'");
        if (mysqli_num_rows($cekurl) > 0) {
            echo 2;
        } else {
            $query = "INSERT INTO user_sub_menu 
                        VALUES 
                        ('','$mparent','$menu','$url','','','')
                     ";
            $masuk_data = mysqli_query($conn, $query);
            if ($masuk_data) {
                echo 4;
            } else {
                echo 3;
            }
        }
    }
}
