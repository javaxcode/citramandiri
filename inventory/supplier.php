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
include '../controller/c_supplier.php';
$bagian = "Inventory";
$juhal = "Supplier";
?>


<body class="fixed-left">
    <div class="rowspin">
        <div class="spinn">
            <i class="fa fa-spin fa-circle-o-notch spinn2"></i>
        </div>
    </div>
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
                                    <!-- <h4 class="header-title m-t-0">Kode Supplier : <?php echo $kp; ?></h4> -->
                                </div>

                                <h4 class="header-title m-t-0">Input Supplier <br></h4>
                                <br>
                                <form class="form-horizontal group-border-dashed" id="formsupplier">
                                    <input type="hidden" value="inputsupplier" id="inputsupplier" name="inputsupplier">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Nama Supplier</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" required name="nsupplier"
                                                id="nsupplier" placeholder="Nama Supplier"></input>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">No Telp</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="nohp" id="nohp"
                                                placeholder="No Telp"></input>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Alamat</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="alamat" id="alamat"
                                                placeholder="Alamat Supplier"></input>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Nama Bank</label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2" name="bank" id="bank">

                                                <?php foreach ($bank as $supplier) : ?>
                                                <option value="<?= $supplier["kodebank"] ?>">
                                                    <?= ucwords($supplier["namabank"]) ?></option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">No Rekening</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="norek" id="norek"
                                                placeholder="Masukkan No Rekening"></input>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-6 m-t-15">
                                            <button type="submit" class="btn btn-success waves-effect waves-light"
                                                name="supplier" id="tombol-supplier">
                                                Input Supplier
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
                                <!-- <div class="dropdown pull-right">
                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
                                            <i class="zmdi zmdi-more-vert"></i>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="#">Action</a></li>
                                            <li><a href="#">Another action</a></li>
                                            <li><a href="#">Something else here</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">Separated link</a></li>
                                        </ul>
                                    </div> -->

                                <h4 class="header-title m-t-0 m-b-30">Daftar Supplier</h4>

                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Supplier</th>
                                            <th>Nama Supplier</th>
                                            <th>Nama Bank</th>
                                            <th>No Rekening</th>
                                            <th>No Telp</th>
                                            <th>Action </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($suppliers as $supplier) : ?>
                                        <tr>
                                            <td width="2%" ;><?= $i ?></td>
                                            <td>
                                                <?= $supplier["kodesupplier"] ?></td>
                                            <td><?= ucwords($supplier["namasupplier"]) ?></td>
                                            <td><?= ucwords($supplier["namabank"]) ?></td>
                                            <td><?= ucwords($supplier["norek"]) ?></td>
                                            <td><?= $supplier["nohp"] ?></td>
                                            <td>
                                                <a class="on-default edit-row badge badge-success tombol-edit"
                                                    data-norek="<?= $supplier['norek']; ?>"
                                                    data-bank="<?= $supplier['kodebank']; ?>"
                                                    data-id="<?= $supplier['kodesupplier']; ?>"
                                                    data-nama="<?= $supplier['namasupplier']; ?>"
                                                    data-nohp="<?= $supplier['nohp']; ?>"
                                                    data-alamat="<?= $supplier['alamatsupplier']; ?>" id=""><i
                                                        class="fa fa-pencil"></i></a>
                                                <?php if ($_SESSION['userlevel'] == 1) : ?>
                                                |
                                                <input type="hidden" class="delete_id_value"
                                                    value="<?= $supplier["id"] ?>">
                                                <a
                                                    class="on-default remove-row badge badge-danger tombol-deletesupplier"><i
                                                        class="fa fa-trash-o"></i></a>
                                                <?php endif ?>
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

    <div id="modaledit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
        style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h2 class="modal-title">Edit Supplier</h2>
                </div>
                <form id="formupdate">
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" class="id" name="update-supplier">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="namasupplier" class="control-label">Nama
                                            Supplier</label>
                                        <input type="text" class="nama form-control" id="unama" name="unama">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nohpsupplier" class="control-label">No Telp
                                        </label>
                                        <input type="text" class="nohp form-control" id="unohp" name="unohp">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Nama Bank</label>
                                        <select class="form-control select2 ubank" name="ubank" id="ubank">
                                            <option>Pilih Bank</option>
                                            <?php foreach ($bank as $supplier) : ?>
                                            <option value="<?= $supplier["kodebank"] ?>">
                                                <?= ucwords($supplier["namabank"]) ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="unorek" class="control-label">No Rekening</label>
                                        <input type="text" class="form-control unorek" name="unorek" id="unorek"
                                            placeholder="Masukkan No Rekening"></input>

                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="alamatsupplier" class="control-label">Alamat</label>
                                        <textarea class="form-control alamat" rows="2" id="ualamat"
                                            name="ualamat"></textarea>
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

    <?php require '../include/scriptfooter.php'; ?>

</body>

</html>

<script>
$(document).ready(function() {
    $('#tombol-supplier').click(function(e) {

        e.preventDefault();
        var dataform = $('#formsupplier')[0];
        var data = new FormData(dataform);

        var inputsupplier = $('#inputsupplier').val();
        var nsupplier = $('#nsupplier').val();
        var nohp = $('#nohp').val();
        var alamat = $('#alamat').val();

        if (nsupplier == "") {
            swal("Nama Supplier belum di isi!", "", "error")
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
                    // $('.spinn').show();
                    $('.rowspin').css('display', 'flex');
                },
                success: function(hasil) {
                    // alert(hasil);
                    $('.spinn').hide();
                    console.log(hasil);
                    //sukses
                    if (hasil == 1) {
                        swal("Input Gagal!", "", "error")
                    } else if (hasil == 2) {
                        swal("Tanggal tidak sesuai dengan bulan ini!", "", "error")
                    } else if (hasil == 3) {
                        swal({
                            title: "Input Berhasil!",
                            type: "success",
                            //text: "I will close in 2 seconds.",
                            timer: 2000,
                            showConfirmButton: false
                        })
                        location.reload();

                    } else if (hasil == 4) {
                        swal("Nama Supplier Sudah Terdaftar!", "", "error")
                    }
                }
            });
        }
    })

    // $('#tombol-updatesupplier').click(function(e) {
    //     //alert("klik");
    //     e.preventDefault();
    //     var dataform = $('#formupdatesupplier')[0];
    //     var data = new FormData(dataform);

    //     var updatesupplier = $('#updatesupplier').val();
    //     var idsupplier = $('#idsupplier').val();
    //     var namasupplier = $('#namasupplier').val();
    //     var nohpsupplier = $('#nohpsupplier').val();
    //     var alamatsupplier = $('#alamatsupplier').val();
    //     //alert(nsupplier);

    //     if (namasupplier == " ") {
    //         swal("Nama Supplier belum di isi!", "", "error")
    //     } else {
    //         $.ajax({
    //             url: '../models/edit.php',
    //             type: 'post',
    //             data: data,
    //             enctype: 'multipart/form-data',
    //             processData: false,
    //             contentType: false,
    //             cache: false,
    //             beforeSend: function() {
    //                 $('.spinn').show();
    //             },
    //             success: function(hasil) {
    //                 // alert(hasil);
    //                 console.log(hasil);
    //                 //sukses
    //                 if (hasil == 1) {
    //                     swal("Input Gagal!", "", "error")

    //                 } else if (hasil == 3) {
    //                     swal({
    //                         title: "Edit Berhasil!",
    //                         type: "success",
    //                         //text: "I will close in 2 seconds.",
    //                         timer: 2000,
    //                         showConfirmButton: false
    //                     })
    //                     location.reload();
    //                 }
    //             }
    //         });
    //     }
    // })

    // $('.tombol-edit').on('click', function() {
    $('#datatable').on('click', '.tombol-edit', function() {

        const id = $(this).data('id');
        const nama = $(this).data('nama');
        const nohp = $(this).data('nohp');
        const alamat = $(this).data('alamat');
        const bank = $(this).data('bank');
        const norek = $(this).data('norek');


        $('.id').val(id);
        $('.nama').val(nama);
        $('.nohp').val(nohp);
        $('.alamat').val(alamat);
        $('.ubank').val(bank);
        $('#ubank').trigger('change');
        $('.unorek').val(norek);
        $('#modaledit').modal('show');
    });

    $('#tombol-update').click(function(e) {

        // alert('ok');
        e.preventDefault();
        var dataform = $('#formupdate')[0];
        var data = new FormData(dataform);
        console.log(data);

        var namasupplier = $('#unama').val();
        var nohpsupplier = $('#unohp').val();
        var alamatsupplier = $('#ualamat').val();
        var ubank = $('#ubank').val();
        var unorek = $('#unorek').val();

        if (namasupplier == "") {
            swal("namasupplier belum di isi!", "", "error")
        } else if (nohpsupplier == "") {
            swal("nohpsupplier belum di isi!", "", "error")
        } else {
            $.ajax({
                url: '../models/edit.php',
                // url: '../controller/c_supplier.php',
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
                    // alert(hasil);
                    $('.spinn').hide();
                    // console.log(hasil);
                    //sukses
                    if (hasil == 1) {
                        swal("Tidak Berhasil ditambahkan!", "", "error")
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
        }
    })

    // $('.tombol-deletesupplier').click(function(e) {
    $('#datatable').on('click', '.tombol-deletesupplier', function(e) {
        e.preventDefault();
        //alert('hapus');
        //var delete = 'delete';
        var tabel = 'supplier';
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
            closeOnCancel: false,
            beforeSend: function() {
                $('.spinn').show();
            },
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
                        // alert(hasil);
                        console.log(hasil);
                        //sukses
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