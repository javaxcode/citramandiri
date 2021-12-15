<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("location:../index"); // jika belum login, maka dikembalikan ke index
    exit;
}

require '../include/fungsi.php';

if (isset($_GET['tanggal'])) {
    $getDate = $_GET['tanggal'];
    $filterByDates = query("SELECT * FROM absensi WHERE tanggal = '$getDate'");
    foreach ($filterByDates as $key => $filterByDate) {
        switch (1) {
            case $filterByDate['hadir']:
                echo  "hadir|";
                break;
            case $filterByDate['sakit']:
                echo  "sakit|";
                break;
            case $filterByDate['ijin']:
                echo  "ijin|";
                break;
            case $filterByDate['alfa']:
                echo  "alfa|";
                break;
            default:
                echo  "hadir|";
        }
    }
    die();
}

require '../include/header.php';
// require '../include/fungsi_rupiah.php';
// require '../include/fungsi_indotgl.php';
require '../controller/c_absensi.php';
$bagian = "HRD";
$juhal = "Absensi";
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
                        <div class="col-lg-12">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-box">
                                        <div id="calendarAbsensi"></div>
                                    </div>
                                </div> <!-- end col -->
                            </div> <!-- end row -->

                            <!-- BEGIN MODAL -->
                            <div class="modal fade none-border" id="event-modal">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"><strong>Absensi Harian</strong></h4>
                                        </div>
                                        <form id="formAbsensi">
                                            <div>
                                                <input type="hidden" class="form-control" name="inputabsensi"
                                                    id="inputabsensi" value="inputabsensi" />
                                                <input type="hidden" class="form-control" name="tanggal" id="tanggal" />
                                                <?php foreach ($karyawans as $key => $karyawan) : ?>
                                                <div class="row" style="display:flex;align-items:center;">

                                                    <div class="col-md-4" style="padding: .5rem; ">
                                                        <input type="text" class="form-control" name="nama[<?= $key ?>]"
                                                            maxlength="25" value="<?= ucwords($karyawan["nama"]) ?>"
                                                            readonly />
                                                        <input type="hidden" class="form-control"
                                                            name="nip[<?= $key ?>]" id="nip[<?= $key ?>]"
                                                            value="<?= $karyawan["nip"] ?>" />
                                                    </div>

                                                    <div class="col-md-8" style="padding: .5rem; ">
                                                        <div class="radio radio-success radio-inline">
                                                            <input type="radio" id="hadir<?= $key ?>" value="hadir"
                                                                name="absensi[<?= $key ?>]" checked>
                                                            <label for="hadir<?= $key ?>"> Hadir </label>
                                                        </div>
                                                        <div class="radio radio-primary radio-inline">
                                                            <input type="radio" id="ijin<?= $key ?>" value="ijin"
                                                                name="absensi[<?= $key ?>]">
                                                            <label for="ijin<?= $key ?>"> Izin </label>
                                                        </div>
                                                        <div class="radio radio-info radio-inline">
                                                            <input type="radio" id="sakit<?= $key ?>" value="sakit"
                                                                name="absensi[<?= $key ?>]">
                                                            <label for="sakit<?= $key ?>"> Sakit </label>
                                                        </div>
                                                        <div class="radio radio-danger radio-inline">
                                                            <input type="radio" id="alfa<?= $key ?>" value="alfa"
                                                                name="absensi[<?= $key ?>]">
                                                            <label for="alfa<?= $key ?>"> Alfa </label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <?php endforeach; ?>

                                            </div>
                                            <div class="modal-footer">
                                                <!-- <button type="button" class="btn btn-default waves-effect"
                                                data-dismiss="modal">Close</button> -->
                                                <button type="submit"
                                                    class="btn btn-success save-event waves-effect waves-light">Simpan</button>
                                                <!-- <button type="button"
                                                class="btn btn-danger delete-event waves-effect waves-light"
                                                data-dismiss="modal">Delete</button> -->
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end col-12 -->
                    </div> <!-- end row -->

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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const calendarElm = document.querySelector('#calendarAbsensi');
        const calendar = new FullCalendar.Calendar(calendarElm, {
            height: "auto",
            contentHeight: "100%",
            themeSystem: 'sketchy',
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: 'today'
            },
            hiddenDays: [ 0 ],
            initialDate: new Date().toISOString().slice(0, 10),
            initialView: 'dayGridMonth',
            selectable: true,
            // selectMirror: true,
            select: function(arg) {
                $('#event-modal').modal('show');
                $('#event-modal').find("#tanggal").val(arg.startStr)
                $('#event-modal').find(".modal-title").html("Absensi Tanggal " + arg.startStr)
                const tanggalGet = arg.startStr
                $.ajax({
                    url: `index.php?tanggal=${tanggalGet}`,
                    type: 'GET',
                    beforeSend: function() {
                        $('.spinn').show();
                    },
                    success: function(result) {
                        const datas = result.split("|")

                        datas.forEach((data, key) => {
                            $("#" + data + key).prop("checked", true);
                        })
                    }
                })
                // calendar.addEvent({
                //     title: title,
                //     start: arg.start,
                //     end: arg.end,
                //     allDay: arg.allDay
                // })
                calendar.unselect()
            },
            eventClick: function(arg) {
                $('#event-modal').modal('show');
                $('#event-modal').find("#tanggal").val(arg.event.startStr)
                $('#event-modal').find(".modal-title").html("Absensi Tanggal " + arg.event.startStr)
                const tanggalGet = arg.event.startStr
                $.ajax({
                    url: `index.php?tanggal=${tanggalGet}`,
                    type: 'GET',
                    beforeSend: function() {
                        $('.spinn').show();
                    },
                    success: function(result) {
                        const datas = result.split("|")

                        datas.forEach((data, key) => {
                            $("#" + data + key).prop("checked", true);
                        })
                    }
                })
                // if (confirm('Are you sure you want to delete this event?')) {
                //     arg.event.remove()
                // }
            },
            editable: true,
            dayMaxEvents: true, // allow "more" link when too many events
            events: [
                <?php foreach ($events as $key => $event) :
                        $tanggal = $event['tanggal'];
                        $hadir = query("SELECT * FROM absensi WHERE tanggal = '$tanggal' AND hadir = '1'");
                        $sakit = query("SELECT * FROM absensi WHERE tanggal = '$tanggal' AND sakit = '1'");
                        $ijin = query("SELECT * FROM absensi WHERE tanggal = '$tanggal' AND ijin = '1'");
                        $alfa = query("SELECT * FROM absensi WHERE tanggal = '$tanggal' AND alfa = '1'");
                    ?>
                <?php if (count($hadir) > 0) : ?> {
                    title: 'Hadir : <?= count($hadir) ?>',
                    start: '<?= $event['tanggal'] ?>'
                },
                <?php endif ?>
                <?php if (count($ijin) > 0) : ?> {
                    title: 'Ijin : <?= count($ijin) ?>',
                    start: '<?= $event['tanggal'] ?>'
                },
                <?php endif ?>
                <?php if (count($sakit) > 0) : ?> {
                    title: 'Sakit : <?= count($sakit) ?>',
                    start: '<?= $event['tanggal'] ?>'
                },
                <?php endif ?>
                <?php if (count($alfa) > 0) : ?> {
                    title: 'Alfa : <?= count($alfa) ?>',
                    start: '<?= $event['tanggal'] ?>',
                },
                <?php endif ?>
                <?php endforeach ?>
            ],
            eventOrder: true,
            eventClassNames: function(arg) {
                if (arg.event._def.title.includes('Hadir')) {
                    return [ 'btn-success' ]
                } else if (arg.event._def.title.includes('Ijin')) {
                    return [ 'btn-primary' ]
                } else if (arg.event._def.title.includes('Sakit')) {
                    return [ 'btn-info' ]
                } else if (arg.event._def.title.includes('Alfa')) {
                    return [ 'btn-danger' ]
                }
            }
        });
        calendar.render();

        $('#formAbsensi').submit(function(e) {

            e.preventDefault();
            var dataform = $('#formAbsensi')[0];
            var data = new FormData(dataform);

            // if (tanggungan > 3) {
            //     swal("Tanggungan tidak boleh lebih dari 3!", "", "error")
            // } else {
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
                success: function(result) {
                    console.log(result)
                    if (result == 1) {
                        swal("Input Gagal!", "", "error")
                    } else if (result == 3) {
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
            // }
        })
    });
    </script>

</body>

</html>