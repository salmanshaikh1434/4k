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
</style>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
  <!-- start page title -->
  <div class="row">
      <div class="col-lg-6 offset-2">
          <div class="card ">
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
                  <form method="post" action="">
                      <div class="form-group ">
                          <label for="example-email-input1" class="col-form-label pt-0">Old Password</label>
                          <div class="">
                              <input class="form-control" name="old_password" type="password" value="" id="old_pass" required>
                          </div>
                          <span id="visiblity-toggle" class="material-icons-outlined" style="float: right;margin-left: -20px;margin-top: -29px;position: relative;z-index: 2;">visibility</span>
                      </div>
                      <div class="form-group ">
                          <label for="example-email-input1" class="col-form-label pt-0">New Password</label>
                          <div class="">
                              <input class="form-control" name="new_password" type="password" value="" id="new_pass" required>
                          </div>
                          <span id="visiblity-toggle2" class="material-icons-outlined" style="float: right;margin-left: -20px;margin-top: -29px;position: relative;z-index: 2;">visibility</span>
                      </div>
                      <div class="form-group ">
                          <label for="example-email-input1" class="col-form-label pt-0">Confirm New Password</label>
                          <div class="">
                              <input class="form-control" name="confirm_password" type="password" value="" id="conf_pass" required>
                          </div>
                          <span id="visiblity-toggle3" class="material-icons-outlined" style="float: right;margin-left: -20px;margin-top: -29px;position: relative;z-index: 2;">visibility</span>
                      </div>
                      <button type="submit" class="btn btn-primary w-lg">Submit</button>
                  </form>
              </div>
          </div>
      </div>

  </div> <!-- end row -->

  <script>
    const pass = document.querySelector('#old_pass')
    const pass2 = document.querySelector('#new_pass')
    const pass3 = document.querySelector('#conf_pass')
    const btn = document.querySelector('#visiblity-toggle')
    const btn2 = document.querySelector('#visiblity-toggle2')
    const btn3 = document.querySelector('#visiblity-toggle3')
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
        }),
        btn3.addEventListener('click', () => {
            if (pass3.type === "text") {
                pass3.type = "password";
                btn3.innerHTML = "visibility";
            } else {
                pass3.type = "text";
                btn3.innerHTML = "visibility_off";

            }
        })
</script>