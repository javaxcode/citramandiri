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
require '../controller/c_karyawan.php';
$bagian = "HRD";
$juhal = "Karyawan";

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

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <div class="dropdown pull-right">
                                    <button class="btn btn-primary waves-effect waves-light btn-xs m-b-5"
                                        data-toggle="modal" data-target="#modalkaryawan">Input Karyawan</button>

                                </div>
                                <h4 class="header-title m-t-0 m-b-30">Data Karyawan
                                </h4>
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Email</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>NIP</th>
                                            <th>Status</th>
                                            <th>Gaji Pokok</th>
                                            <th>Total Gaji</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($kodekaryawan as $row) : ?>

                                        <tr>
                                            <td width="2%" ;><?= $i ?></td>
                                            <td width="5%"><?= $row["email"] ?></td>
                                            <td width="5%"><?= $row["nama"] ?></td>
                                            <td width="10%" ;>
                                                <?php
                                                    $kj = $row["jabatan"];
                                                    $tampil = query("SELECT namajabatan FROM jabatan WHERE kodejabatan ='$kj' ")[0];
                                                    echo $tampilkode = $tampil['namajabatan'];
                                                    ?>
                                            </td>
                                            <td width="10%" ;><?= $row["nip"] ?></td>
                                            <td width="10%">
                                                <?php
                                                    $st = $row["status"];
                                                    if ($st != 1) {
                                                        echo "Belum Nikah";
                                                    } else {
                                                        echo "Menikah";
                                                    }
                                                    ?>
                                            </td>
                                            <td><?= format_rupiah($row["gajipokok"]) ?></td>
                                            <td><?= format_rupiah($row["totalgaji"])  ?></td>


                                            <td>
                                                <a class="on-default edit-row badge badge-info btn-edit"
                                                    data-nip="<?= $row['nip']; ?>" data-email="<?= $row['email']; ?>"
                                                    data-nama="<?= $row['nama']; ?>"
                                                    data-kodejabatan="<?= $row["jabatan"] ?>"
                                                    data-status="<?= $row["status"]; ?>"
                                                    data-tanggungan="<?= $row["tanggungan"]; ?>"
                                                    data-gajipokok="<?= $row["gajipokok"]; ?>">Details</a>
                                                |
                                                <input type="hidden" class="delete_id_value" value="<?= $row["id"] ?>">
                                                <a class="on-default remove-row badge badge-danger btn-delete"><i
                                                        class="fa fa-trash-o"></i></a>
                                            </td>

                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->

                    <div id="modalkaryawan" class="modal fade" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">×</button>
                                    <h2 class="modal-title">Input Karyawan</h2>
                                </div>
                                <form id="formKaryawan" method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" value="inputkaryawan" id="inputkaryawan"
                                            name="inputkaryawan">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="email" class="control-label">Email</label>
                                                    <input required type="email" class="form-control" id="email"
                                                        name="email">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="nama" class="control-label">Nama</label>
                                                    <input required type="text" class="form-control" id="nama"
                                                        name="nama">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kodejabatan" class="control-label">Jabatan</label>
                                                    <select required class="form-control select2" name="kodejabatan"
                                                        id="kodejabatan">
                                                        <option value="">Pilih Jabatan</option>
                                                        <?php foreach ($kodejabatan as $row) : ?>
                                                        <option value="<?= $row['kodejabatan'] ?>">
                                                            <?= ucwords($row["namajabatan"]) ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="datepicker-autoclose" class="control-label">Tanggal
                                                        Masuk Kerja</label>
                                                    <input required type="text" class="form-control"
                                                        id="datepicker-autoclose" value="<?= date('m/d/Y') ?>"
                                                        name="tanggal">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="statusmenikah" class="control-label">Status</label>
                                                    <select placeholder="Pilih Status"
                                                        class="form-control statusmenikah" name="statusmenikah"
                                                        id="statusmenikah" required>
                                                        <option value="" selected disabled>Pilih Status</option>
                                                        <option value="1">Menikah</option>
                                                        <option value="0">Belum Menikah</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 tanggungan" style="display: none;">
                                                <div class="form-group">
                                                    <label for="tanggungan" class="control-label">Tanggungan</label>
                                                    <input value="0" min="0" max="3" required type="number"
                                                        class="form-control" id="tanggungan" name="tanggungan">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="gajipokok" class="control-label">Gaji Pokok</label>
                                                    <input required type="number" class="form-control" id="gajipokok"
                                                        placeholder="3000000" name="gajipokok">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button id="btnInput" type="submit"
                                            class="btn btn-default waves-effect">Input</button>
                                        <!-- <button type="button" class="btn btn-info waves-effect waves-light">Save changes</button> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div id="modaledit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                        aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">×</button>
                                    <h2 class="modal-title">Edit Karyawan</h2>
                                </div>
                                <form id="formKaryawanEdit" method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" value="update-karyawan" id="update-karyawan"
                                            name="update-karyawan">
                                        <input type="hidden" id="nipedit" name="nipedit">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="emailedit" class="control-label">Email</label>
                                                    <input required type="email" class="form-control" id="emailedit"
                                                        name="emailedit">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="namaedit" class="control-label">Nama</label>
                                                    <input required type="text" class="form-control" id="namaedit"
                                                        name="namaedit">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="kodejabatanedit" class="control-label">Jabatan</label>
                                                    <select required class="form-control select2" name="kodejabatanedit"
                                                        id="kodejabatanedit">
                                                        <option value="">Pilih Jabatan</option>
                                                        <?php foreach ($kodejabatan as $row) : ?>
                                                        <option value="<?= $row['kodejabatan'] ?>">
                                                            <?= ucwords($row["namajabatan"]) ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="statusmenikahedit" class="control-label">Status</label>
                                                    <select placeholder="Pilih Status"
                                                        class="form-control statusmenikah" name="statusmenikahedit"
                                                        id="statusmenikahedit" required>
                                                        <option value="" selected disabled>Pilih Status</option>
                                                        <option value="1">Menikah</option>
                                                        <option value="0">Belum Menikah</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 tanggungan" style="display: none;">
                                                <div class="form-group">
                                                    <label for="tanggunganedit" class="control-label">Tanggungan</label>
                                                    <input value="0" min="0" max="3" required type="number"
                                                        class="form-control" id="tanggunganedit" name="tanggunganedit">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="gajipokokedit" class="control-label">Gaji Pokok</label>
                                                    <input required type="number" class="form-control"
                                                        id="gajipokokedit" placeholder="3000000" name="gajipokokedit">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button id="btnEdit" type="submit"
                                            class="btn btn-default waves-effect">Edit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

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

    const selectStatuses = document.querySelectorAll(".statusmenikah")

    selectStatuses.forEach(selectStatus => {
        selectStatus.addEventListener("change", () => {
            const tanggunganInput = selectStatus.parentElement.parentElement.parentElement
                .querySelector(".tanggungan")
            if (selectStatus.value == "1") {
                tanggunganInput.style.display = "block"
            } else {
                tanggunganInput.style.display = "none"
                tanggunganInput.querySelector("input").value = 0
            }
        })
    })

    $('#formKaryawan').submit(function(e) {

        e.preventDefault();
        var dataform = $('#formKaryawan')[0];
        var data = new FormData(dataform);

        if (tanggungan > 3) {
            swal("Tanggungan tidak boleh lebih dari 3!", "", "error")
        } else {
            $.ajax({
                url: '../models/input.php',
                type: 'POST',
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
            })
        }
    })

    $('#datatable').on('click', '.btn-edit', function() {
        const nip = $(this).data('nip');
        const email = $(this).data('email');
        const nama = $(this).data('nama');
        const kodejabatan = $(this).data('kodejabatan');
        const status = $(this).data('status');
        const tanggungan = $(this).data('tanggungan');
        const gajipokok = $(this).data('gajipokok');

        if (status == 1) {
            document.querySelector('#tanggunganedit').parentElement.parentElement.style.display =
                'block';
        } else {
            document.querySelector('#tanggunganedit').parentElement.parentElement.style.display =
                'none';
        }

        $('#nipedit').val(nip);
        $('#emailedit').val(email);
        $('#namaedit').val(nama);
        $("#kodejabatanedit").select2("val", kodejabatan);
        $('#statusmenikahedit').val(status);
        $('#tanggunganedit').val(tanggungan);
        $('#gajipokokedit').val(gajipokok);

        $('#modaledit').modal('show');
    });

    $('#formKaryawanEdit').submit(function(e) {

        e.preventDefault();
        var dataform = $('#formKaryawanEdit')[0];
        var data = new FormData(dataform);

        var tanggungan = $('#tanggunganedit').val();

        if (tanggungan > 3) {
            swal("Tanggungan tidak boleh lebih dari 3!", "", "error")
        } else {
            $.ajax({
                url: '../models/edit.php',
                type: 'POST',
                data: data,
                enctype: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('.spinn').show();
                },
                success: function(hasil) {
                    console.log(hasil);
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
            })
        }
    })

    $('.btn-delete').click(function(e) {
        e.preventDefault();
        var tabel = 'karyawan';
        var iddelete = $(this).closest('tr').find('.delete_id_value').val();
        swal({
            title: "Apakah Anda Yakin?",
            text: "Data Anda Akan Terhapus!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {


                $.ajax({
                    url: '../models/delete.php',
                    type: 'post',
                    data: {
                        'tabel': tabel,
                        'delete_id': iddelete
                    },
                    success: function(hasil) {
                        if (hasil == 2) {

                        } else if (hasil == 3) {
                            swal("Deleted!",
                                "Hapus Data Berhasil.",
                                "success");
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