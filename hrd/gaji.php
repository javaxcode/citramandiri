<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("location:../index"); // jika belum login, maka dikembalikan ke index
    exit;
}
require '../include/fungsi.php';
require '../include/header.php';
require '../include/fungsi_rupiah.php';
require '../include/fungsi_indotgl.php';
require '../controller/c_gaji.php';
$bagian = "HRD";
$juhal = "Gaji";
?>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <?php require '../include/topbar.php'; ?>

        <?php require '../include/sidebar.php'; ?>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container">

                    <div id="modalgaji" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-full">
                            <div class="modal-content">
                                <div class="modal-header" style="display: flex;flex-wrap: wrap;width: 100%;align-items: center;">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="
                                    position: absolute;right: 1rem;top: 1rem;">×</button>
                                    <h2 class="modal-title">Daftar Gaji Karyawan</h2>
                                    <div style="margin-left: auto;">
                                        <button class="btn btn-info waves-effect waves-light">Total Gaji Rp. <b id="totalGaji">0 </b></button>
                                        <button class="btn btn-primary waves-effect waves-light">Total Bayar Rp. <b id="totalBayar">0 </b></button>
                                        <?php if(count($salaraies) > 0) { ?>
                                            <button class="btn btn-success waves-effect waves-light" disabled>Gaji Sudah Diinputkan</button>
                                        <?php } else { ?>
                                            <button id="btnInputGaji" type="submit" class="btn btn-success waves-effect waves-light">Input Gaji</button>
                                            <form id="formInputGaji" action="../models/input" method="post">
                                                <input type="hidden" name="inputgaji">
                                            </form>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="modal-body" style="padding-bottom: 1rem;">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <!-- <th>Tanggal</th> -->
                                                <th>Nama</th>
                                                <th>Keterangan</th>
                                                <th>Gaji Pokok</th>
                                                <th>BPJS</th>
                                                <th>Lembur</th>
                                                <th>Total Gaji</th>
                                                <th>Cicilan</th>
                                                <th>Sakit</th>
                                                <th>Ijin</th>
                                                <th>Alfa</th>
                                                <th>Bayar Bon</th>
                                                <th>Bayar Gaji</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <script> 
                                                    let subTotalGaji = 0; 
                                                    let subTotalBayar = 0;
                                                    const totalGaji = document.querySelector("#totalGaji");
                                                    const totalBayar = document.querySelector("#totalBayar");
                                            </script>
                                            <?php $i = 1; ?>
                                            <?php foreach ($karyawans as $karyawan) : 
                                                    $nip = $karyawan['nip'];
                                                    $gaji = $karyawan['gajipokok'];

                                                    $hadir = query("SELECT * FROM absensi WHERE month(tanggal) = '$prevMonth' AND year(tanggal) = '$yearNow' AND nip = '$nip' AND hadir = '1'");
                                                    $totalhadir = count($hadir);

                                                    $sakit = query("SELECT * FROM absensi WHERE month(tanggal) = '$prevMonth' AND year(tanggal) = '$yearNow' AND nip = '$nip' AND sakit = '1'");
                                                    $totalsakit = count($sakit);

                                                    $ijin = query("SELECT * FROM absensi WHERE month(tanggal) = '$prevMonth' AND year(tanggal) = '$yearNow' AND nip = '$nip' AND ijin = '1'");
                                                    $totalijin = count($ijin);

                                                    $alfa = query("SELECT * FROM absensi WHERE month(tanggal) = '$prevMonth' AND year(tanggal) = '$yearNow' AND nip = '$nip' AND alfa = '1'");
                                                    $totalalfa = count($alfa);

                                                    // hitung gaji per hari
                                                    $gajiperhari = round($gaji / $jumHari);
                                                
                                                    // hitung 50% gaji per hari
                                                    $potongangaji = round($gajiperhari / 2);
                                                
                                                    // hitung total gaji
                                                    $totalgaji = ($gajiperhari * $totalhadir) - ($potongangaji * $totalijin) - ($potongangaji * $totalsakit) - ($gajiperhari * $totalalfa);
                                                    echo "
                                                        <script>
                                                            subTotalGaji += parseInt(". $gaji .");
                                                            subTotalBayar += parseInt(". $totalgaji .");
                                                        </script>
                                                    ";

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
                                                    echo "
                                                        <script>
                                                            totalGaji.innerHTML = (subTotalGaji+'').replace(/\B(?=(?:\d{3})+\b)/g,'.');
                                                            totalBayar.innerHTML = (subTotalBayar+'').replace(/\B(?=(?:\d{3})+\b)/g,'.');
                                                        </script>
                                                    ";
                                                ?>
                                            <tr>
                                                <td width="2%" ;><?= $i ?></td>
                                                <td width="5%"><?= $karyawan["nama"] . ' | ' . $karyawan["nip"]?></td>
                                                <td>Keterangan</td>
                                                <td><?= format_rupiah($karyawan["gajipokok"]) ?></td>
                                                <td><?= format_rupiah($karyawan["bpjs"]) ?></td>
                                                <td>0</td>
                                                <td><?= format_rupiah($karyawan["totalgaji"]) ?></td>
                                                <td>0</td>
                                                <td><?= format_rupiah($potongangaji * $totalsakit) ?></td>
                                                <td><?= format_rupiah($potongangaji * $totalijin) ?></td>
                                                <td><?= format_rupiah($potongangaji * $totalalfa) ?></td>
                                                <td>0</td>
                                                <td><?= format_rupiah($totalgaji) ?></td>
                                            </tr>
                                            <?php $i++; ?>
                                            <?php endforeach; ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal -->

                    <div id="detailGajiModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-full">
                            <div class="modal-content">
                                <div class="modal-header" style="display: flex;flex-wrap: wrap;width: 100%;align-items: center;">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="
                                    position: absolute;right: 1rem;top: 1rem;">×</button>
                                    <!-- <h2 class="modal-title">Daftar Gaji Karyawan</h2>
                                    <div style="margin-left: auto;">
                                        <button class="btn btn-info waves-effect waves-light">Total Gaji Rp. <b id="totalGaji">0 </b></button>
                                        <button class="btn btn-primary waves-effect waves-light">Total Bayar Rp. <b id="totalBayar">0 </b></button>
                                    </div> -->
                                </div>
                                <div class="modal-body" style="padding-bottom: 1rem;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <div class="dropdown pull-right">
                                    <button class="btn btn-primary waves-effect waves-light btn-xs m-b-5"
                                        data-toggle="modal" data-target="#modalgaji">Lihat daftar gaji</button>
                                </div>
                                <h4 class="header-title m-t-0 m-b-30">Data Gaji | Tanggal <?= date('d-m-Y', strtotime($salaraies[0]['tanggal'])); ?>
                                </h4>
                                <table id="datatable" class="table table-striped table-bordered datatable-gaji">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <!-- <th>Tanggal</th> -->
                                            <th>Nama</th>
                                            <th>Keterangan</th>
                                            <th>Gaji Pokok</th>
                                            <th>BPJS</th>
                                            <th>Lembur</th>
                                            <th>Total Gaji</th>
                                            <th>Cicilan</th>
                                            <th>Sakit</th>
                                            <th>Ijin</th>
                                            <th>Alfa</th>
                                            <th>Bayar Bon</th>
                                            <th>Bayar Gaji</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($salaraies as $salary) : ?>
                                            <tr>
                                                <td width="2%" ;><?= $i ?></td>
                                                <td width="5%"><?= $salary["nama"] . ' | ' . $salary["nip"]?></td>
                                                <td><button class="btn btn-primary btn-detail-gaji" data-toggle="modal" data-target="#detailGajiModal" data-nip="<?= $salary['nip'] ?>" data-tanggal="<?= $salary['tanggal'] ?>"> Rincian Gaji </button></td>
                                                <td><?= format_rupiah($salary["gp"]) ?></td>
                                                <td><?= format_rupiah($salary["bpjs"]) ?></td>
                                                <td>0</td>
                                                <td><?= format_rupiah($salary["totalgaji"]) ?></td>
                                                <td>0</td>
                                                <td><?= format_rupiah($salary["sakit"]) ?></td>
                                                <td><?= format_rupiah($salary["ijin"]) ?></td>
                                                <td><?= format_rupiah($salary["alfa"]) ?></td>
                                                <td>0</td>
                                                <td><?= format_rupiah($salary["totalbayar"]) ?></td>
                                            </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- container -->

            </div> <!-- content -->

            <?php require '../include/footer.php'; ?>

        </div>


        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

        <?php require '../include/rightsidebar.php'; ?>



    </div>
    <!-- END wrapper -->

    <?php require '../include/scriptfooter.php'; ?>

</body>

</html>

<script>
$(document).ready(function() {
    $('#btnInputGaji').click(function(e) {
        $('#formInputGaji').submit()
    })

    $('.datatable-gaji').on('click', '.btn-detail-gaji', function() {
        const nip = $(this).data('nip');
        const tanggal = $(this).data('tanggal');
        $("#detailGajiModal .modal-body").load(`./detail-gaji?nip=${nip}&tanggal=${tanggal}`);
    })
    // $('.btn-detail-gaji').click(function(e) {
    //     // $('#formInputGaji').submit()
        
    // })

    $('#formInputGaji').submit(function(e) {
        e.preventDefault();
        
        var dataform = $('#formInputGaji')[0];
        var data = new FormData(dataform);

        swal({
            title: "Apakah rincian gaji sudah sesuai?",
            // text: "Rincian gaji sudah sesuai?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, sudah sesuai",
            cancelButtonText: "Belum, saya cek lagi",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                $.ajax({
                    url: '../models/input.php',
                    type: 'post',
                    data: data,
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function() {
                        $('.spinn').show();
                    },
                    success: function(hasil) {
                        if (hasil == 1) {
                            swal("Input Gagal!", "", "error")
                        } else if (hasil == 3) {
                            swal({
                                title: "Input Berhasil!",
                                type: "success",
                                timer: 1000,
                                showConfirmButton: false
                            })
                            location.reload();
                        }
                    }
                });
            } else {
                swal("Cancelled", "", "error");
            }
        });
    });
})
</script>