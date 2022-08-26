<div class="col-lg-12">
    <div class="card">
        <div class="card-body ">
            <h5 class="card-title">Add Coupon Code</h5>
            <form class="form-horizontal" action="" method="post">
                <label class="control-label">Coupon Code :</label>
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="input-group mb-12">
                            <select class="custom-select" id="subscription" name="subscription_id" required>
                                <option value="">Choose Subscription</option>
                                <?php foreach ($memberships as $membership) : ?>
                                    <option value="<?= $membership['id'] ?>"><?= $membership['titel'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="input-group mb-12">
                            <input type="text" id="name" name="name" value="" class="form-control" placeholder="Enter Coupon Code" required>

                        </div>
                    </div>
                </div>

<br>
                <div class="row">
                    <div class="col-6">

                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">
                               Add Coupon Code
                            </button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </form>
</div>
</div>
</div>