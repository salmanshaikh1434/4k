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

    #pass:focus {
        outline: none;
    }

    #visiblity-toggle {
        color: #363636;
        cursor: pointer;
        margin: 0 2px;
    }

    #visiblity-toggle2 {
        color: #363636;
        cursor: pointer;
        margin: 0 2px;
    }
</style>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


<section class="inner-banner py-5">
    <div class="w3l-breadcrumb py-lg-5">
        <div class="container pt-4 pb-sm-4">
            <h4 class="inner-text-title font-weight-bold pt-sm-5 pt-4">Checkout</h4>
            <ul class="breadcrumbs-custom-path">
                <li><a href="index.php">Home</a></li>
                <li class="active"><i class="fas fa-angle-right mx-2"></i>Checkout</li>
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

<section class="contact py-5" id="contact">
    <div class="container">
        <div class="row m-1">
            <div class="col-md-6 login-form-2 ">
            <?= alertMessage() ?>
                <h3>Checkout Page</h3>
                <form method="post" action="/signup/info" style="padding: 5%;">
                    <div class="to">
                        <div class="form-group">
                            <label class="text-white p-2"><b>First Name : </b></label>
                            <input type="text" class="form-control" class="form-control" name="firstname" maxlength="60"  required>
                        </div>
                        <input type="hidden" name="price_id" value="<?= $membership['id'] ?>">
                        <div class="form-group">
                            <label class="text-white p-2"><b>Last Name : </b></label>
                            <input type="text" id="txtCharacter" onkeypress="return isNumericKey(event)" class="form-control" name="lastname" maxlength="60" required>
                        </div>
                        <div class="form-group">
                            <label class="text-white p-2"><b>Your email : </b></label>
                            <input type="email" class="form-control" name="email" maxlength="60" id="input" required>
                        </div>
                        <div class="form-group">
                            <label class="text-white p-2"> <b>Mobile :</b></label>
                            <input type="number" class="form-control" name="mobile" id="input"  pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.maxlength==10 && this.value.minlength==10) return false;"  required>
                        </div>
                        <div class="form-group">
                            <label class="text-white p-2"><b>Password :</b></label>
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password " maxlength="14" minlength="8" required>
                        </div>
                        <span id="visiblity-toggle" class="material-icons-outlined" style="float: right;margin-left: -20px;margin-top: -45px;position: relative;z-index: 2;">visibility</span>
                        <div class="form-group">
                            <label class="text-white p-2"><b>Confirm Password :</b></label>
                            <input type="password" class="form-control" id="pass2" name="confpass" placeholder="Password " maxlength="150" required="">
                        </div>
                        <span id="visiblity-toggle2" class="material-icons-outlined" style="float: right;margin-left: -20px;margin-top: -45px;position: relative;z-index: 2;">visibility</span>
                        <div class="form-group">
                            <label class="text-white p-2"> <b>Coupon Code (Optional):</b></label>
                            <input type="text" class="form-control" name="coupon" id="input">
                        </div>



                    </div>


                    <div class="clearfix"></div>

                    <div class="clearfix"></div>

            </div>
            <div class="col-md-6 login-form-1">
                <div class="m-5 p-5">
                    <div class="row text-center" >
                <a href="https://razorpay.com/" target="_blank"> <img referrerpolicy="origin" src = "https://badges.razorpay.com/badge-dark.png "  class="img-fluid" alt = "Razorpay | Payment Gateway | Neobank"></a>
                </div>
                    <h3 style="color: #fd746c;"><?= $membership['titel'] ?></h3>
                    <hr>
                    <h4> ₹ <?= $membership['priceing'] ?>/- <span> </span></h4>
                    <br>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> <?= $membership['year'] ?> days</li>
                        <li><i class="fas fa-check-circle"></i> <?= $membership['devices'] ?> Devices</li>
                        <li><i class="fas fa-check-circle"></i> <?= $membership['topics'] ?></li>
                        <li><i class="fas fa-check-circle"></i> <?= $membership['hours'] ?></li>
                        <li><i class="fas fa-check-circle"></i> <?= $membership['videos'] ?></li>

                    </ul>
                    <hr>
                    <input type="submit" class="btn btn-style mt-4 mx-auto" style="background-color: #fff;color: #fd746c;">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    const pass = document.querySelector('#pass')
    const pass2 = document.querySelector('#pass2')
    const btn = document.querySelector('#visiblity-toggle')
    const btn2 = document.querySelector('#visiblity-toggle2')
    btn.addEventListener('click', () => {
            if (pass.type === "text") {
                pass.type = "password";
                btn.innerHTML = "visibility";
            } else {
                pass.type = "text";
                btn.innerHTML = "visibility_off";

            }

        }),
        btn2.addEventListener('click', () => {
            if (pass2.type === "text") {
                pass2.type = "password";
                btn2.innerHTML = "visibility";
            } else {
                pass2.type = "text";
                btn2.innerHTML = "visibility_off";

            }
        })



  

    var password = document.getElementById("pass"),
        confirm_password = document.getElementById("pass2");

    function validatePassword() {
        if (password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

    function isNumericKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 &&
            (charCode < 48 || charCode > 57))
            return true;
        return false;
    }

    function myFunction() {
        var x = document.getElementById("plan").value;

        if (x == "basic") {
            y = 849;
        } else if (x == "pro") {
            y = 1299;
        } else if (x == "premium") {
            y = 1599;
        }
        document.getElementById("amount").value = y;
    }
</script>