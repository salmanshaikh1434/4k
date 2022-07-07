<style>
    .login-container {
        margin-top: 5%;
        margin-bottom: 5%;
    }

    .login-form-1 {

        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);

    }

    .login-form-1 h3 {
        text-align: center;
        color: #333;
    }

    .login-form-2 {
        padding: 5%;
        background: #fd746c;
        ;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    }

    .login-form-2 h3 {
        text-align: center;
        color: #fff;
    }

    .login-container form {
        padding: 10%;
    }

    .btnSubmit {
        width: 50%;
        border-radius: 1rem;
        padding: 1.5%;
        border: none;
        cursor: pointer;
    }

    .login-form-1 .btnSubmit {
        font-weight: 600;
        color: #fff;
        background-color: #0062cc;
    }

    .login-form-2 .btnSubmit {
        font-weight: 600;
        color: #0062cc;
        background-color: #fff;
    }

    .login-form-2 .ForgetPwd {
        color: #fff;
        font-weight: 600;
        text-decoration: none;
    }

    .login-form-1 .ForgetPwd {
        color: #0062cc;
        font-weight: 600;
        text-decoration: none;
    }
</style>

<section class="inner-banner py-5">
    <div class="w3l-breadcrumb py-lg-5">
        <div class="container pt-4 pb-sm-4">
            <h4 class="inner-text-title font-weight-bold pt-sm-5 pt-4">Sign In</h4>
            <ul class="breadcrumbs-custom-path">
                <li><a href="index.php">Home</a></li>
                <li class="active"><i class="fas fa-angle-right mx-2"></i>Sign In</li>
            </ul>
        </div>
    </div>
    <div class="shape">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 280">
            <path fill-opacity="1">
                <animate attributeName="d" dur="20000ms" repeatCount="indefinite" values="M0,160L48,181.3C96,203,192,245,288,261.3C384,277,480,267,576,234.7C672,203,768,149,864,117.3C960,85,1056,75,1152,90.7C1248,107,1344,149,1392,170.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z; M0,160L48,181.3C96,203,192,245,288,234.7C384,224,480,160,576,133.3C672,107,768,117,864,138.7C960,160,1056,192,1152,197.3C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z;												 M0,64L48,74.7C96,85,192,107,288,133.3C384,160,480,192,576,170.7C672,149,768,75,864,80C960,85,1056,171,1152,181.3C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z;
                                                 M0,160L48,181.3C96,203,192,245,288,261.3C384,277,480,267,576,234.7C672,203,768,149,864,117.3C960,85,1056,75,1152,90.7C1248,107,1344,149,1392,170.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z;" />

            </path>
        </svg>
    </div>
</section>
<!-- //inner banner -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<span id="errorMessage"></span>
<?php

if (isset($_SESSION["doneregister"])) {
    //----------------------

?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: ' Success Done ',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
<?php
    unset($_SESSION['doneregister']);

    //------------------
} else {
}
?>
<!--content-->

<!-- contact -->
<div class="container login-container">
    <div class="row m-1">

        <div class="col-md-6 login-form-1 d-none d-lg-block">
            <img class="image-responsive" src="/assets/images/signin.png" height="400" width="600" />
        </div>
        <div class="col-md-6 login-form-2">
            <h3>Sign In</h3>


            <form method="post" action="">

                <div class="form-group mb-3">
                    <input type="text" class="form-control" name="email" placeholder="Your Email *" value="" maxlength="60" required="" />
                </div>
                <div class="form-group mb-3">
                    <input type="password" id="pass" name="password" class="form-control" placeholder="Your Password *" value="" minlength="8" maxlength="150" required="" />
                </div>
                <script>
                    const pass = document.querySelector('#pass')
                    const btn = document.querySelector('#visiblity-toggle')

                    btn.addEventListener('click', () => {
                        if (pass.type === "text") {
                            pass.type = "password";
                            btn.innerHTML = "visibility";
                        } else {
                            pass.type = "text";
                            btn.innerHTML = "visibility_off";

                        }
                    })
                </script>
                <div class="form-group">
                    <input type="submit" class="btnSubmit" name="submitup" />
                </div>
                <div class="form-group">
                    <div class="form-check">
                        <label class="form-check-label text-white">
                            <input type="checkbox" class="form-check-input" name="" id="" value="checkedValue" checked>
                            Remember me
                        </label>
                    </div>
                    <a href="forget_password.php" class="ForgetPwd float-right" value="Login">Forget Password?</a>

                </div>
            </form>
        </div>
    </div>
</div>