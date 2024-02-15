<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title><?= $judul ?> | E-Perpus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->

    <link rel="shortcut icon" href="<?= base_url()?>assets/images/favicon.ico">
    <!-- DataTables -->
    <link href="<?= base_url()?>assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url()?>assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet"
        type="text/css" />
    <!-- Bootstrap Css -->
    <link href="<?= base_url()?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url()?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url()?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


    <link href="<?= base_url()?>assets/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet"
        type="text/css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style type="text/css">
    .tgl_akhir {
        margin-left: -20px
    }

    .btn-filter {
        margin-left: -15px;
    }

    .btn-refresh {
        margin-left: -100px;
    }

    .btn-pdf {
        margin-left: -165px;
    }
    </style>
</head>

<body>

    <body data-sidebar="dark" data-keep-enlarged="true" class="vertical-collapsed">

        <!-- Loader -->
        <div id="preloader">
            <div id="status">
                <div class="spinner-chase">
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                    <div class="chase-dot"></div>
                </div>
            </div>
        </div>

        <!-- Begin page -->
        <div id="layout-wrapper">
            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">
                            <a href="" class="logo logo-dark">
                                <span class="logo-sm">
                                    <img src="<?= base_url()?>assets/images/logo.svg" alt="" height="22">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url()?>assets/images/logo-dark.png" alt="" height="17">
                                </span>
                            </a>

                            <a href="" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="<?= base_url()?>assets/images/logo.svg" alt="" height="35">
                                </span>
                                <span class="logo-lg">
                                    <img src="<?= base_url()?>assets/images/logo.png" alt="" height="75">
                                </span>
                            </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                            id="vertical-menu-btn">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <div class="dropdown d-inline-block">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.png"
                                    alt="Header Avatar" />
                                <span class="d-none d-xl-inline-block ms-1"
                                    key="t-henry"><?= $this->session->userdata('nama') ?></span>

                            </button>

                        </div>
                    </div>

                </div>
            </header>

            <!-- ========== Left Sidebar Start ========== -->
            <?php
				$this->load->view('menu')
			?>

            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="container-fluid">
                    <div class="page-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-sm-flex align-items-center justify-content-between">
                                        <h4 class="mb-sm-0 font-size-18"> <?= $judul ?></h4>
                                    </div>
                                </div>
                            </div>
                            <?php
									$this->load->view($content);	
																?>
                        </div>
                    </div>
                </div>


                <script src="<?= base_url()?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
                <script src="<?= base_url()?>assets/libs/metismenu/metisMenu.min.js"></script>
                <script src="<?= base_url()?>assets/libs/simplebar/simplebar.min.js"></script>
                <script src="<?= base_url()?>assets/libs/node-waves/waves.min.js"></script>

                <!-- App js -->
                <script src="<?= base_url()?>assets/js/app.js"></script>

                <script src="<?= base_url()?>assets/libs/apexcharts/apexcharts.min.js"></script>

                <!-- dashboard blog init -->
                <script src="<?= base_url()?>assets/js/pages/dashboard-job.init.js"></script>

                <!-- Required datatable js -->
                <script src="<?= base_url()?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
                <script src="<?= base_url()?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
                <script src="<?= base_url()?>assets/js/pages/datatables.init.js"></script>

                <script src="<?= base_url()?>assets/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

                <script src="<?= base_url()?>assets/libs/%40chenfengyuan/datepicker/datepicker.min.js"></script>

                <!-- form advanced init -->
                <!-- <script src="<?= base_url()?>assets/js/pages/form-advanced.init.js"></script> -->

    </body>

    <!-- Mirrored from themesbrand.com/skote/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Jan 2023 07:04:47 GMT -->


</html>