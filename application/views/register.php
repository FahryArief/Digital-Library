<!doctype html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Jan 2023 07:04:47 GMT -->

<head>

    <meta charset="utf-8" />
    <title>Daftar | E-Perpus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url()?>assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="<?= base_url()?>assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url()?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url()?>assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Daftar Akun</h5>
                                        <p>E-Perpus</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div>
                                <a href="<?= base_url() ?>" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="assets/images/logo.png" alt="" class="rounded-circle" height="50">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <?= $this->session->flashdata('info'); ?>

                                <form action="<?= base_url()?>register/simpan" method="post">

                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Enter Name" required>
                                        <div class="invalid-feedback">
                                            Please Enter Name
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" name="username" class="form-control" id="username"
                                            placeholder="Enter username" required>
                                        <div class="invalid-feedback">
                                            Please Enter Username
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            placeholder="Enter password" required>
                                        <div class="invalid-feedback">
                                            Please Enter Password
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="jenkel" class="form-label">Jenis Kelamin</label>
                                        <select class="form-control" name="jenkel" id="jenkel" required>
                                            <option value="" selected disabled>- Pilih Jenis Kelamin -</option>
                                            <option value="Laki Laki">Laki - Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Silahkan Pilih Jenis Kelamin Anda
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" name="alamat" id="alamat" required>

                                        <div class="invalid-feedback">
                                            Silahkan Masukkan Alamat Anda
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="no_hp" class="form-label">No. HandPhone</label>
                                        <input name="no_hp" class="form-control" required type="number">
                                        <div class="invalid-feedback">
                                            Silahkan Masukkan Nomor Handphone Anda
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control" id="email"
                                            placeholder="Enter email" required>
                                        <input type="hidden" name="level" value="Peminjam">
                                        <div class="invalid-feedback">
                                            Please Enter Email
                                        </div>
                                    </div>
                                    <div class="mt-4 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light"
                                            type="submit">Register</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-2 text-center">

                        <div>
                            <p>Already have an account ? <a href="<?= base_url()  ?>login"
                                    class="fw-medium text-primary">
                                    Login</a> </p>
                            <p>© <script>
                                document.write(new Date().getFullYear())
                                </script> E-Perpus. Crafted with <i class="mdi mdi-heart text-danger"></i> by Fahry
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- end account-pages -->

    <!- - JAVASCRIPT -->
        <script src="<?= base_url()?>assets/libs/jquery/jquery.min.js"></script>
        <script src="<?= base_url()?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url()?>assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="<?= base_url()?>assets/libs/simplebar/simplebar.min.js"></script>
        <script src="<?= base_url()?>assets/libs/node-waves/waves.min.js"></script>

        <!-- App js -->
        <script src="<?= base_url()?>assets/js/app.js"></script>
</body>

<!-- Mirrored from themesbrand.com/skote/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Jan 2023 07:04:47 GMT -->


</html>
