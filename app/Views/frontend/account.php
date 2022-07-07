<section class="contact py-5" id="contact">
    <div class="container pt-md-5 pt-4">


    </div>
</section>
<section class="contact py-5" id="contact">
    <div class="container pt-md-5 pt-4">
        <div class="title-heading-w3 text-center mx-auto mb-md-5 mb-4">
            <h3 class="title-style">Edit Account</h3>
        </div>
        <div class="main-grid-contact">
            <div class="col-lg-10 content-form-right p-0">
                <form method="post" action="" style="padding: 5%;">
                    <label> <span>First Name :</span></label> <br>
                        <input type="text" name="firstname" value="<?= $users['firstname']; ?>" maxlength="60" id="input" required>
                    
                    <br><br>
                    <label>
                        <span>Last Name :</span><br> </label>
                        <input type="text" name="lastname" value="<?= $users['lastname']; ?>" maxlength="60" id="input" required>
                   <br><br>

                    <label>
                        <span>Your email :</span> </label>
                        <input type="email" name="email" value="<?= $users['email']; ?>" maxlength="60" id="input" required>
                   
                    <br><br>


                    <label>
                        <span>User Nmae :</span>  </label>
                        <input type="text" name="username" value="<?= $users['username']; ?>" maxlength="60" id="input" required>
                  
                    <br><br>
                    <label>
                        <span>Your Country :</span><br></label>
                        <input type="text" name="country" value="<?= $users['country']; ?>" id="input" maxlength="60" required>
                    <br><br>

                    <label>
                        <span>Password :</span> </label>
                        <input type="password" name="password" maxlength="60" id="input">
                   
                    <br><br>
                    <label>
                        <span>Confirm Password :</span> </label>
                        <input type="password" name="repassword" maxlength="60" id="input">
                   <br>
                    <div class="clearfix"></div>
                    <br><br>
                    <div class="form-submit1">
                        <button class="btn btn-style" type="submit" name="submitup" style="float: left;margin-left: 10%;">Edit </button>
                    </div>
                    <div class="clearfix"></div>
                </form>
                <br><br><br><br>
            </div>
        </div>

    </div>
</section>