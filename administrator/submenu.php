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
require '../controller/c_submenu.php';
$bagian = "Administrator";
$juhal = "Sub Menu";

?>


<body class="fixed-left">
    <div class="rowspin">
        <div class="spinn">
            <i class="fa fa-spin fa-circle-o-notch spinn2"></i>
        </div>
    </div>
    hgdhtdhfkhf
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
                    </div>
                    <!-- end row -->

                    <div class="row">
                        <div class="col-lg-4">

                            <div class="card-box">
                                <div class="dropdown pull-right">

                                </div>

                                <h4 class="header-title m-t-0">Input Menu Sidebar<br></h4>
                                <br>
                                <form class="form-horizontal group-border-dashed" id="formmenu">
                                    <input type="hidden" name="inputsubmenu">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Menu Parent</label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2" id="nparent" name="mparent">
                                                <option>Pilih Kategori</option>
                                                <?php foreach ($menu as $row) : ?>
                                                    <option value="<?= $row["id"] ?>">
                                                        <?= ucwords($row["menu"]) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Nama Menu</label>
                                        <div class="col-sm-8">
                                            <input autofocus type="text" class="form-control" required name="nmenu" id="nmenu" placeholder="Masukkan Nama menu"></input>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">URL</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" required name="nurl" id="nurl" placeholder="Masukkan URL"></input>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-6 m-t-15">
                                            <button type="submit" class="btn btn-success waves-effect waves-light" name="tombol-menu" id="tombol-menu">
                                                Input menu
                                            </button>
                                            <!-- <button type="reset" class="btn btn-default waves-effect m-l-5">
                                                    Cancel
                                                </button> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- end col -->

                        <div class="col-lg-8">
                            <div class="card-box table-responsive">

                                <h4 class="header-title m-t-0 m-b-30">Menu Sidebar</h4>

                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Menu Parent</th>
                                            <th>Nama Sub Menu</th>
                                            <th>url</th>
                                            <th>icon</th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($submenu as $sm) : ?>
                                            <tr>
                                                <td width="2%" ;><?= $i ?></td>
                                                <td><?= $sm["menu"] ?></td>
                                                <td><?= $sm["title"] ?></td>
                                                <td><?= $sm["url"] ?></td>
                                                <td><?= $sm["icon"] ?></td>
                                                <td>
                                                    <a class="on-default edit-row badge badge-success tombol-edit" data-id="<?= $sm['id']; ?>" data-menu="<?= $sm['title']; ?>" data-url="<?= $sm['url']; ?>" id=""><i class="fa fa-pencil"></i></a>
                                                    <input type="hidden" class="delete_id_value" value="<?= $sm["id"] ?>">
                                                    <a class="on-default remove-row badge badge-danger tombol-hapus " data-id="<?= $sm['id'] ?>"><i class="fa fa-trash-o"></i></a>
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

    <!-- modaledit -->
    <div id="modaledit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h2 class="modal-title">Edit Menu</h2>
                </div>

                <form id="formupdate">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" class="id" name="update-submenu">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="namamenu" class="control-label">Nama menu</label>
                                        <input type="text" class="form-control menu" id="umenu" name="unama">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="namamenu" class="control-label">url</label>
                                        <input type="text" class="form-control url" id="uurl" name="uurl">
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success waves-effect" id="tombol-update">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div><!-- /.modal -->
    <!-- akhir modal edit -->

    <?php require '../include/scriptfooter.php'; ?>

</body>

</html>

<script>
    // function myFunction() {
    //     document.getElementById("formmenu").enctype = "multipart/form-data";
    // }
    $(document).ready(function() {
        $('#tombol-menu').click(function(e) {
            e.preventDefault();
            var dataform = $('#formmenu')[0];
            var data = new FormData(dataform);
            // console.log(data);
            var nparent = $('#nparent').val();
            var nmenu = $('#nmenu').val();
            var nurl = $('#nurl').val();


            if (nmenu == "") {
                swal("Nama menu belum di isi!", "", "error")
            } else if (nparent == "Pilih Kategori") {
                swal("Menu Parent belum di pilih!", "", "error")
            } else if (nurl == "") {
                swal("URL belum di isi!", "", "error")

            } else {
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
                        // alert(hasil);
                        // console.log('ok');
                        //sukses
                        if (hasil == 1) {
                            swal("Nama menu sudah ada!", "", "error")
                        } else if (hasil == 2) {
                            swal("URL Sudah ada ", "", "error")
                        } else if (hasil == 3) {
                            swal("Input Eror, Coba Lagi ", "", "error")
                        } else if (hasil == 4) {
                            swal({
                                title: "Update Berhasil!",
                                type: "success",
                                //text: "I will close in 2 seconds.",
                                timer: 2000,
                                showConfirmButton: false
                            })
                            location.reload();

                        }
                    }
                });
            }
        })

        //$('.tombol-edit').on('click', function() {
        $('#datatable').on('click', '.tombol-edit', function() {

            const id = $(this).data('id');
            const menu = $(this).data('menu');
            const url = $(this).data('url');

            $('.id').val(id);
            $('.menu').val(menu);
            $('.url').val(url);
            $('#modaledit').modal('show');
        });

        $('#tombol-update').click(function(e) {


            e.preventDefault();
            var dataform = $('#formupdate')[0];
            var data = new FormData(dataform);
            // console.log(data);

            var umenu = $('#umenu').val();
            var uurl = $('#uurl').val();

            // console.log(umenu);
            // console.log(uurl);

            if (umenu == "") {
                swal("Nama menu belum di isi!", "", "error")
            } else if (uurl == "") {
                swal("URL belum di isi!", "", "error")
            } else {
                $.ajax({
                    url: '../models/edit.php',
                    type: 'post',
                    data: data,
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function() {
                        // $('.spinn').show();
                        $('.rowspin').css('display', 'flex');
                    },
                    success: function(hasil) {
                        $('.spinn').hide();
                        // alert(hasil);
                        console.log(hasil);
                        //sukses
                        if (hasil == 1) {
                            swal("Tidak Berhasil ditambahkan!", "", "error")
                        } else if (hasil == 2) {
                            swal({
                                title: "Update Berhasil!",
                                type: "success",
                                //text: "I will close in 2 seconds.",
                                timer: 2000,
                                showConfirmButton: false
                            })
                            location.reload();

                        }
                    }
                });
            }




        })

        $('#datatable').on('click', '.tombol-hapus', function(e) {

            console.log('ok');
            const tabel = 'user_sub_menu';
            const id = $(this).data('id');

            e.preventDefault();
            const href = $(this).attr('href');
            swal({
                title: 'Anda Yakin ingin menghapus?',
                text: "Data Akan Dihapus",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Iya',
                cancelButtonText: `Tidak`
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        url: '../models/delete.php',
                        type: 'post',
                        data: {
                            'tabel': tabel,
                            'delete_id': id
                        },
                        beforeSend: function() {
                            $('.spinn').show();
                        },
                        success: function(hasil) {
                            // alert(hasil);

                            //sukses
                            if (hasil == 2) {

                            } else if (hasil == 3) {

                                swal({
                                    title: "Update Berhasil!",
                                    type: "success",
                                    //text: "I will close in 2 seconds.",
                                    timer: 2000,
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