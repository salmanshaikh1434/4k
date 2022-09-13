<style>
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

    #visiblity-toggle3 {
        color: #363636;
        cursor: pointer;
        margin: 0 2px;
    }
</style>


<!-- start page title -->
<div class="row" style="margin-top:200px;">
    <div class="col-lg-6 offset-lg-3  col-12 p-5">
        <div class="card ">
            <?= alertMessage() ?>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <?php if (!empty($errors)) { ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>
                            <ul>
                                <?php foreach ($errors as $error) { ?>
                                    <li><?= $error ?></li>
                                <?php } ?>
                            </ul>
                        </strong>
                    </div>
                <?php } ?>

                <script>
                    $(".alert").alert();
                </script>
                <form method="post" action="" >

                    <div class="form-group"  id="show_hide_password">
                        <label for="example-email-input1" class="col-form-label pt-0">Old Password</label>
                        <div class="">
                            <input class="form-control" name="old_password" type="password"  maxlength="14" minlength="8"  value="" id="pass" required>
                        </div>
                        <span id="visiblity-toggle1" class="material-icons-outlined" style="float: right;margin-left: -20px;margin-top: -36px;position: relative;z-index: 2;"> <a href=""><i class="fa fa-eye-slash" id="show" aria-hidden="true"></i></a></span>
                    </div>
                    <div class="form-group" id="show_hide_password2">
                        <label for="example-email-input1" class="col-form-label pt-0">New Password</label>
                        <div class="">
                            <input class="form-control" name="new_password" type="password" maxlength="14" minlength="8"   value="" id="new_pass" required>
                        </div>
                        <span id="visiblity-toggle2" class="material-icons-outlined" style="float: right;margin-left: -20px;margin-top: -36px;position: relative;z-index: 2;"> <a href=""><i class="fa fa-eye-slash" id="show" aria-hidden="true"></i></a></span>
                    </div>
                   
                    <div class="form-group" id="show_hide_password3">
                        <label for="example-email-input1" class="col-form-label pt-0">Confirm New Password</label>
                        <div class="">
                            <input class="form-control" name="confirm_password" type="password" maxlength="14" minlength="8"  value="" id="confpass" required>
                        </div>
                        <span id="visiblity-toggle3" class="material-icons-outlined" style="float: right;margin-left: -20px;margin-top: -36px;position: relative;z-index: 2;"><a href=""><i class="fa fa-eye-slash" id="show" aria-hidden="true"></i></a></span>
                    </div>
                        <button type="submit" class="btn btn-primary w-lg">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div> <!-- end row -->

<script>


$(document).ready(function() {
    $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
            $('#show_hide_password input').attr('type', 'password');
            $('#show_hide_password i').addClass( "fa-eye-slash" );
            $('#show_hide_password i').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
            $('#show_hide_password input').attr('type', 'text');
            $('#show_hide_password i').removeClass( "fa-eye-slash" );
            $('#show_hide_password i').addClass( "fa-eye" );
        }
    });
    $("#show_hide_password2 a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password2 input').attr("type") == "text"){
            $('#show_hide_password2 input').attr('type', 'password');
            $('#show_hide_password2 i').addClass( "fa-eye-slash" );
            $('#show_hide_password2 i').removeClass( "fa-eye" );
        }else if($('#show_hide_password2 input').attr("type") == "password"){
            $('#show_hide_password2 input').attr('type', 'text');
            $('#show_hide_password2 i').removeClass( "fa-eye-slash" );
            $('#show_hide_password2 i').addClass( "fa-eye" );
        }
    });
    $("#show_hide_password3 a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password3 input').attr("type") == "text"){
            $('#show_hide_password3 input').attr('type', 'password');
            $('#show_hide_password3 i').addClass( "fa-eye-slash" );
            $('#show_hide_password3 i').removeClass( "fa-eye" );
        }else if($('#show_hide_password3 input').attr("type") == "password"){
            $('#show_hide_password3 input').attr('type', 'text');
            $('#show_hide_password3 i').removeClass( "fa-eye-slash" );
            $('#show_hide_password3 i').addClass( "fa-eye" );
        }
    });
});
</script>