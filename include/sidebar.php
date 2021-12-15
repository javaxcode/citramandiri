<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!-- User -->
        <!-- <div class="user-box">
            <div class="user-img">
                <img src="../assets/images/users/avatar-1.jpg" alt="user-img" title="Mat Helme"
                    class="img-circle img-thumbnail img-responsive">
                <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
            </div>
            <h5><a href="#">Mat Helme</a> </h5>
            <ul class="list-inline">
                <li>
                    <a href="#">
                        <i class="zmdi zmdi-settings"></i>
                    </a>
                </li>

                <li>
                    <a href="#" class="text-custom">
                        <i class="zmdi zmdi-power"></i>
                    </a>
                </li>
            </ul>
        </div> -->
        <!-- End User -->

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>
                <?php if ($bagian == "Administration") : ?>
                    <li class="text-muted menu-title"><?= $bagian  ?></li>
                    <li>
                        <a href="../menu" class="waves-effect"><i class="zmdi zmdi-format-underlined"></i>
                            <span> Menu </span> </a>
                    </li>
                    <li>
                        <a href="index" class="waves-effect active"><i class="zmdi zmdi-view-dashboard"></i>
                            <span> Kas Kecil </span> </a>
                    </li>
                    <a href="../inventory/supplier">
                        <li class="text-muted menu-title">Inventory</li>
                    </a>
                    <a href="../hrd">
                        <li class="text-muted menu-title">HRD & Payroll</li>
                    </a>
                    <a href="../project">
                        <li class="text-muted menu-title">Project</li>
                    </a>
                    <a href="../maintenance">
                        <li class="text-muted menu-title">Maintenance</li>
                    </a>

                <?php elseif ($bagian == "Inventory") : ?>
                    <a href="../administration">
                        <li class="text-muted menu-title">Administration</li>
                    </a>
                    <li class="text-muted menu-title"><?= $bagian  ?></li>
                    <li>
                        <a href="../inventory/supplier" class="waves-effect"><i class="zmdi zmdi-format-underlined"></i>
                            <span> Supplier </span> </a>
                    </li>
                    <a href="../hrd">
                        <li class="text-muted menu-title">HRD & Payroll</li>
                    </a>
                    <a href="../project">
                        <li class="text-muted menu-title">Project</li>
                    </a>
                    <a href="../maintenance">
                        <li class="text-muted menu-title">Maintenance</li>
                    </a>

                <?php elseif ($bagian == "Project") : ?>
                    <a href="../administration">
                        <li class="text-muted menu-title">Administration</li>
                    </a>
                    <a href="../inventory/supplier">
                        <li class="text-muted menu-title">Inventory</li>
                    </a>
                    <a href="../hrd">
                        <li class="text-muted menu-title">HRD & Payroll</li>
                    </a>
                    <li class="text-muted menu-title"><?= $bagian  ?></li>
                    <li>
                        <a href="../menu" class="waves-effect"><i class="zmdi zmdi-format-underlined"></i>
                            <span> Menu </span> </a>
                    </li>
                    <li>
                        <a href="index" class="waves-effect <?php if ($juhal == "Project") {
                                                                echo  'active';
                                                            } ?>"><i class="zmdi zmdi-view-dashboard"></i>
                            <span> <?= $bagian  ?> </span> </a>
                    </li>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect <?php if ($juhal == "Klien") {
                                                                                echo  'active';
                                                                            } ?>"><i class="zmdi zmdi-invert-colors"></i>
                            <span> Data Master </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="klien">Klien </a></li>
                        </ul>
                    </li>


                    <a href="../maintenance">
                        <li class="text-muted menu-title">Maintenance</li>
                    </a>
                <?php elseif ($bagian == "Maintenance") : ?>
                    <a href="../administration">
                        <li class="text-muted menu-title">Administration</li>
                    </a>
                    <a href="../inventory/supplier">
                        <li class="text-muted menu-title">Inventory</li>
                    </a>
                    <a href="../hrd">
                        <li class="text-muted menu-title">HRD & Payroll</li>
                    </a>
                    <a href="../project">
                        <li class="text-muted menu-title">Project</li>
                    </a>
                    <li class="text-muted menu-title"><?= $bagian  ?></li>
                    <li>
                        <a href="../menu" class="waves-effect"><i class="zmdi zmdi-format-underlined"></i>
                            <span> Menu </span> </a>
                    </li>
                    <li>
                        <a href="index" class="waves-effect <?php if ($juhal == "Maintenance") {
                                                                echo  'active';
                                                            } ?>"><i class="zmdi zmdi-view-dashboard"></i>
                            <span> <?= $bagian  ?> </span> </a>
                    </li>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect <?php if ($juhal == "Klien") {
                                                                                echo  'active';
                                                                            } ?>"><i class="zmdi zmdi-invert-colors"></i>
                            <span> Data Master </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="klien">Klien </a></li>
                        </ul>
                    </li>

                <?php elseif ($bagian == "HRD") : ?>

                    <a href="../administration">
                        <li class="text-muted menu-title">Administration</li>
                    </a>
                    <a href="../inventory/supplier">
                        <li class="text-muted menu-title">Inventory</li>
                    </a>
                    <li class="text-muted menu-title"><?= $bagian  ?></li>

                    <li>
                        <a href="index" class="waves-effect <?php if ($juhal == "Absensi") {
                                                                echo 'active';
                                                            } ?> "><i class="zmdi zmdi-view-dashboard"></i>
                            <span> Absensi </span> </a>
                    </li>
                    <li>
                        <a href="gaji" class="waves-effect <?php if ($juhal == "Gaji") {
                                                                echo  'active';
                                                            } ?>"><i class="zmdi zmdi-view-dashboard"></i>
                            <span> Gaji </span> </a>
                    </li>
                    <li>
                        <a href="karyawan" class="waves-effect <?php if ($juhal == "Karyawan") {
                                                                    echo  'active';
                                                                } ?>"><i class="zmdi zmdi-view-dashboard"></i>
                            <span> Karyawan </span> </a>
                    </li>
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect <?php if ($juhal == "Jabatan") {
                                                                                echo  'active';
                                                                            } ?>"><i class="zmdi zmdi-invert-colors"></i>
                            <span> Data Master </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="jabatan">Jabatan </a></li>
                        </ul>
                    </li>
                    <a href="../project">
                        <li class="text-muted menu-title">Project</li>
                    </a>

                    <a href="../maintenance">
                        <li class="text-muted menu-title">Maintenance</li>
                    </a>

                <?php endif; ?>



            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
<!-- Left Sidebar End -->