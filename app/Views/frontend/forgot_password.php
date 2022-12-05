  <!-- start page title -->
  <div style="height:20vh;"></div>
  <div class="container">
      <div class="row">
          <div class="col-lg-6 offset-lg-2 col-sm-8">
              <div class="card m-2">

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
                      <h4 class="text-center">Forgot Password</h4>
                      <form method="post" action="">
                          <div class="form-group ">
                              <label for="example-email-input1" class="col-form-label pt-0">Email</label>
                              <div class="">
                                  <input class="form-control" name="email" type="email" required>
                              </div>
                          </div>
                          <div class="row">
                              <div class="form-group mb-3 col-lg-6">
                                  <img src="/home/get_captcha" alt="captcha code" srcset="">
                              </div>
                              <div class="form-group mb-3 col-lg-4">
                                  <input class="form-control" type="text" name="captcha" placeholder="Captcha code " maxlength="150" required="">
                              </div>
                          </div>
                          <button type="submit" class="btn btn-primary w-lg">Submit</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>

  </div> <!-- end row -->