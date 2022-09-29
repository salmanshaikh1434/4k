<div class="col-lg-12">
    <div class="card">
        <div class="card-body ">
            <h5 class="card-title">Add Subscription</h5>
            <form class="form-horizontal" action="" method="post">
                <label class="control-label">Subscription Name</label>
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="input-group mb-12">
                            <input type="text" name="titel" value="<?= (isset($memberships)) ? $memberships['titel'] : '' ?>" class="form-control" placeholder="Enter Plan Name" required>
                        </div>
                    </div>
                </div>
                <br>
                <label class="control-label">Price</label>
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="input-group mb-12">
                            <input type="text" name="priceing" value="<?= (isset($memberships)) ? $memberships['priceing'] : '' ?>" class="form-control" placeholder="Price" required>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">
                                Edit Subscription
                            </button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </form>
</div>