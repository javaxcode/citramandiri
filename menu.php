<?php
session_start();

if (!isset($_SESSION['email'])) {
    header("location:index"); // jika belum login, maka dikembalikan ke index
    exit;
} else {
    require 'include/fungsi.php';

    $user = query("SELECT * FROM admin WHERE email = '" . $_SESSION['email'] . "'")[0];
    $email = $user["email"];
    $username = $user["username"];
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- App Favicon -->
    <link rel="shortcut icon" href="assets/images/logofav.png">

    <!-- App title -->
    <title>SKUT</title>

    <!-- App CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

    <script src="assets/js/modernizr.min.js"></script>

</head>

<body>


    <div class="account-pages-menu"></div>
    <div class="clearfix"></div>

    <!-- HOME -->
    <section>
        <div class="container-alt">
            <div class="wrapper-page">
                <div class="text-center">

                    <!-- <h4 class="text-info m-t-0 font-600">Sejuk Karya Utama Teknik</h4> -->
                    <img src="assets/images/logocitramandiri.png">
                    <br>
                    <a href="index.html" class="logo"><span>PT. Citra <span></span> Mandiri</span></a>

                </div>
            </div>
            <!-- end wrapper page -->

            <div class="col-lg-4">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Administration</h3>
                    </div>
                    <div class="panel-body text-center">
                        <a href="administration/"><img src="assets/images/administrasi1.png" style="width: 125px;" class="img-circle"></a>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-4">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Project</h3>
                    </div>
                    <div class="panel-body text-center">
                        <a href="project/"><img src="assets/images/coldstorage.png" style="width: 125px;" class="img-circle"></a>
                    </div>
                </div>
            </div><!-- end col -->
            <div class="col-lg-4">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Maintenance</h3>
                    </div>
                    <div class="panel-body text-center">
                        <a href="maintenance/"><img src="assets/images/maintenance.png" style="width: 125px;" class="img-circle"></a>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-lg-4">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-center">Inventory</h3>
                    </div>
                    <div class="panel-body text-center">
                        <a href="inventory/"><img src="assets/images/inventory1.png" style="width: 125px;" class="img-circle"></a>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="row" style="margin: 1% 0;">
                <div class="col-lg-4">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Accounting</h3>
                        </div>
                        <div class="panel-body text-center">
                            <a href="accounting/"><img src="assets/images/accounting.jpg" style="width: 125px;" class="img-circle"></a>
                        </div>
                    </div>
                </div><!-- end col -->


                <div class="col-lg-4">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">HRD & Payroll</h3>
                        </div>
                        <div class="panel-body text-center">
                            <a href="hrd/"><img src="assets/images/payroll1.jpg" style="width: 125px;" class="img-circle"></a>
                        </div>
                    </div>
                </div><!-- end col -->


                <div class="col-lg-4">
                    <div class="panel panel-color panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center">Administrator</h3>
                        </div>
                        <div class="panel-body text-center">
                            <a href="administrator/"><img src="assets/images/logoadministrator1.png" style="width: 125px;" class="img-circle"></a>
                        </div>
                    </div>
                </div><!-- end col -->







            </div>
            <!-- end row -->

        </div>
    </section>
    <!-- END HOME -->



    <script>
        var resizefunc = [];
    </script>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <script src="assets/js/jquery.core.js"></script>
    <script src="assets/js/jquery.app.js"></script>

</body>

</html>