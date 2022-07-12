<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="/assets/backend/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="/assets/backend/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="/assets/backend/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">

    <div class="container-fluid">
        <!-- Log In page -->
        <div class="row">
            <div class="col-lg-3 pr-0"  style="background-color:#022551;">
                <div class="card mb-0 shadow-none"  style="background-color:#022551;">
                    <div class="card-body">
                        <h3 class="text-center mb-3">
                            <a href="/" style="color:white"><i class="mr-1" style="color:orange;font-weight:bold">4k</i>English</a>
                        </h3>
                        <div class="px-2 mt-2">
                            <h4 class="text-white font-size-18 mb-2 text-center">Welcome Back !</h4>
                            <p class="text-white text-center">Sign in to continue</p>

                            <?php if (NULL !== session()->getFlashdata('message')) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong><?= session()->getFlashdata('message') ?></strong>
                                </div>
                            <?php } ?>

                            <form class="form-horizontal my-4" action="/admin/login/login_check" method="post">

                                <div class="form-group">
                                    <label for="username" class="text-white">Username</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="email" id="username" placeholder="Enter username">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="userpassword" class="text-white">Password</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="fa fa-key"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="password" placeholder="Enter password">
                                    </div>
                                </div>

                                <div class="form-group row mt-4">
                                    <div class="col-sm-6">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customControlInline">
                                            <label class="custom-control-label text-white" for="customControlInline">Remember me</label>
                                        </div>
                                    </div>
                                    <!-- <div class="col-sm-6 text-right">
                                        <a href="pages-recoverpw-2.html" class="text-muted font-13"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                    </div> -->
                                </div>

                                <div class="form-group mb-0 row">
                                    <div class="col-12 mt-2">
                                        <button class="btn btn-primary btn-block waves-effect waves-light" type="submit" style="background-color:#5f24d2;color:white">Log In <i class="fas fa-sign-in-alt ml-1"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 p-0 vh-100  d-flex justify-content-center">
                <div class="accountbg d-flex align-items-center">
                    <div class="account-title text-center text-white">
                        <h2 class="mt-3 text-white">Welcome To <span class="text-warning">4k</span>English</h2>
                        <h1 class="text-white">Let's Get Started</h1>
                        <div class="border w-25 mx-auto border-warning"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Log In page -->
    </div>



    <!-- JAVASCRIPT -->
    <script src="/assets/backend/libs/jquery/jquery.min.js"></script>
    <script src="/assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/backend/libs/metismenu/metisMenu.min.js"></script>
    <script src="/assets/backend/libs/simplebar/simplebar.min.js"></script>
    <script src="/assets/backend/libs/node-waves/waves.min.js"></script>

    <script src="/assets/backend/js/app.js"></script>

</body>

</html>