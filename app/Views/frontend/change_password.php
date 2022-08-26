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
                  <form method="post" action="">
                      <div class="form-group ">
                          <label for="example-email-input1" class="col-form-label pt-0">Old Password</label>
                          <div class="">
                              <input class="form-control" name="old_password" type="password" value="" id="" required>
                          </div>
                      </div>
                      <div class="form-group ">
                          <label for="example-email-input1" class="col-form-label pt-0">New Password</label>
                          <div class="">
                              <input class="form-control" name="new_password" type="password" value="" id="" required>
                          </div>
                      </div>
                      <div class="form-group ">
                          <label for="example-email-input1" class="col-form-label pt-0">Confirm New Password</label>
                          <div class="">
                              <input class="form-control" name="confirm_password" type="password" value="" id="" required>
                          </div>
                      </div>
                      <button type="submit" class="btn btn-primary w-lg">Submit</button>
                  </form>
              </div>
          </div>
      </div>

  </div> <!-- end row -->