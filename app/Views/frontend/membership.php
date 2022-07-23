<!-- pricing block -->
<section class="pricing-w3l py-lg-5 py-2" id="membership">
    <div style="height:20vh;"></div>
    <div class="container">
        <div class="title-heading-w3 text-center mx-auto mb-md-5 mb-4 pb-md-1" style="max-width:500px;">
            <h3 class="title-style">Membership</h3>
        </div>

        <div class="row no-gutters pt-4">
        <?php foreach($memberships as $membership) { ?>
            <div class="col-lg-4 col-md-10 col-md-offset-1 box-pricing featured shadow-lg bg-white rounded ">
                    <h3 class="text-price"><?= $membership['titel']?></h3>
                    <h5 class="text-white"><del>3500/- </del>Now (% 76 off)</h5>
                    <h4> ₹ <?= $membership['priceing']?>/- <span> </span></h4>
                    <h5 class="text-white">Only ₹ 44/- per month</h5>
                    <br>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> <?= $membership['year']?></li>
                        <li><i class="fas fa-check-circle"></i> <?= $membership['devices']?></li>
                        <li><i class="fas fa-check-circle"></i> <?= $membership['topics']?></li>
                        <li><i class="fas fa-check-circle"></i> <?= $membership['hours']?></li>
                        <li><i class="fas fa-check-circle"></i> <?= $membership['videos']?></li>

                    </ul>
                    <a href="/memberships/checkout/<?= $membership['id']?>" class="btn btn-style mt-4" style="color: #000;background-color: #fff;">Get Started</a>
            </div>
            <?php } ?>


        </div>
    </div>
</section>
<!-- //pricing block -->