<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login | Skote - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="http://localhost/perpus/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="http://localhost/perpus/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="http://localhost/perpus/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="http://localhost/perpus/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="account-pages my-5 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-5">
                        <h1 class="display-2 fw-medium">4<i class="bx bx-buoy bx-spin text-primary display-3"></i>4</h1>
                        <h4 class="text-uppercase">Sorry, page not found <br>
                            <h1><?php echo $heading; ?></h1>
                            <?php echo $message; ?>
                        </h4>

                        <div class="mt-5 text-center">
                            <a class="btn btn-primary waves-effect waves-light"
                                href="http://localhost/perpus/dashboard">Back to
                                Dashboard</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-8 col-xl-6">
                    <div>
                        <img src="assets/images/error-img.png" alt="" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- JAVASCRIPT -->
    <script src="http://localhost/perpus/assets/libs/jquery/jquery.min.js"></script>
    <script src="http://localhost/perpus/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="http://localhost/perpus/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="http://localhost/perpus/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="http://localhost/perpus/assets/libs/node-waves/waves.min.js"></script>

    <!-- App js -->
    <script src="http://localhost/perpus/assets/js/app.js"></script>
</body>


</html>