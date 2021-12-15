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
require '../controller/c_detailgaji.php';
$bagian = "HRD";
$juhal = "Gaji";
?>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="container">



            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <p><strong>Nama : </strong> <?= $salary['nama'] ?></p>
                                    <p class="m-t-10"><strong>Jabatan : </strong>
                                        <span class="label label-pink">
                                            <?= $position ?>
                                        </span>
                                    </p>
                                    <p class="m-t-10"><strong>NIP : </strong><?= $_GET['nip'] ?></p>
                                </div>
                                <div class="pull-right">
                                    <h3 class="logo invoice-logo">Skut</h3>
                                    <h4>
                                        Slip Gaji
                                        <br>
                                        <strong><?= date('d-m-Y', strtotime($_GET['tanggal'])) ?></strong>
                                    </h4>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="table-responsive">
                                        <table class="table m-t-30">
                                            <thead>
                                                <tr>
                                                    <th>Absensi</th>
                                                    <th>Hari</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Hadir</td>
                                                    <td><?= $totalhadir ?></td>
                                                </tr>
                                                <!-- <tr>
                                                    <td>Lembur</td>
                                                    <td>0</td>
                                                </tr> -->
                                                <!-- <tr>
                                                            <td>Lembur Minggu</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Luar Kota</td>
                                                            <td>0</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Hari Kerja</td>
                                                            <td>25</td>
                                                        </tr> -->
                                                <tr>
                                                    <td>Sakit</td>
                                                    <td><?= $totalsakit ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Ijin</td>
                                                    <td><?= $totalijin ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Alfa</td>
                                                    <td><?= $totalalfa ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="table-responsive">
                                        <table class="table m-t-30">
                                            <thead>
                                                <tr>
                                                    <th>Rincian Gaji</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Gaji Pokok</td>
                                                    <td>Rp. <?= format_rupiah($salary['gp']) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Tunj. Makan @Rp.0</td>
                                                    <td>Rp. 0</td>
                                                </tr>
                                                <tr>
                                                    <td>Lembur</td>
                                                    <td>Rp. 0</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total Gaji</strong></td>
                                                    <td><strong>Rp. <?= format_rupiah($salary['gp']) ?></strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="table-responsive">
                                        <table class="table m-t-30">
                                            <thead>
                                                <tr>
                                                    <th>Potongan</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Angs. Pinjaman</td>
                                                    <td>Rp. 0</td>
                                                </tr>
                                                <tr>
                                                    <td>Kasbon</td>
                                                    <td>Rp. 0</td>
                                                </tr>
                                                <tr>
                                                    <td>Alfa</td>
                                                    <td>Rp. <?= format_rupiah($salary['alfa']) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Ijin</td>
                                                    <td>Rp. <?= format_rupiah($salary['ijin']) ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Sakit</td>
                                                    <td>Rp. <?= format_rupiah($salary['sakit']) ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Total Potongan</strong></td>
                                                    <td><strong>Rp. <?= format_rupiah($salary['alfa'] + $salary['sakit'] + $salary['ijin']) ?></strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8 col-sm-6 col-xs-12 col-md-offset-3">
                                    <p class="text-right"><b>PPH 21 :</b> Rp. <?= format_rupiah($salary['pph21']) ?></p>
                                    <hr>
                                    <h3 class="text-right">Gaji Bersih : Rp. <?= format_rupiah($salary['totalbayar']) ?></h3>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="clearfix m-t-40">
                                    <h5 class="small text-inverse font-600">Keterangan</h5>
                                    <small>
                                        Lembur = 1X / Hari (220,000)
                                    </small>
                                    <br>
                                    <small>
                                        Sakit = Potong 50% / Hari (Uang berobat dapat di reimburse)
                                    </small>
                                    <br>
                                    <small>
                                        Ijin = Potong 50% / Hari (di itung cuti)<br>
                                        Alfa = Potong 1X / Hari
                                    </small>
                                </div>
                            </div>
                            <hr>
                            <!-- <div class="hidden-print"> -->
                            <!-- <div class="pull-right"> -->
                            <!--  <a href="javascript:window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a> -->
                            <!-- <button type="submit" class="btn btn-success waves-effect waves-light" >Gaji Sudah di masukkan ABS211115</button> -->
                            <!-- </div> -->
                            <!-- </div>     -->
                        </div>
                    </div>

                </div>

            </div>
            <!-- end row -->
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
            console.log(nip);
            $("#detailGajiModal .modal-body").load("../menu");
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