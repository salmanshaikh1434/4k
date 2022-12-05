<section class="pricing-w3l py-lg-5 py-2" id="membership">
    <div style="height:20vh;"></div>
    <div class="container">
        <div class="title-heading-w3 text-center mx-auto mb-md-5 mb-4 pb-md-1" style="max-width:500px;">
            <h3 class="title-style">User Profile</h3>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Name:</th>
                        <th scope="col"><?= $users['firstname'] ?>&nbsp;<?= $users['lastname'] ?></th>
                    </tr>
                    <tr>
                        <th scope="col">Mobile:</th>
                        <th scope="col"><?= $users['mobile'] ?></th>
                    </tr>
                    <tr>
                        <th scope="col">Subscription Plan:</th>
                        <th scope="col"><?= $users['titel'] ?></th>
                    </tr>
                    <tr>
                        <th scope="col">Purchase Date:</th>
                        <th scope="col"><?= $users['subscription_date'] ?></th>
                    </tr>
                    <tr>
                        <th scope="col">Expiry Date: </th>
                        <th scope="col"> <?= $users['expiry_date'] ?></th>
                    </tr>
                </thead>

            </table>
        </div>

    </div>
</section>