<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <h3 class="card-title">CouponCode List</h3>
                    </div>
                 
                    <div class="col-md-6">
                        <a href="/admin/coupon_codes/add" class="btn btn-primary" style="float:right">Add Coupon Code</a>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Coupon Code</th>
                                <th>plan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($coupons as $coupon) { ?>
                                <tr>
                                    <th scope="row"><?= $coupon['id'] ?></th>
                                    <td><?= $coupon['name'] ?></td>
                                    <td><?= $coupon['plan'] ?></td>
                                    <td>
                                        <div class="">
                                            <a href="/admin/coupon_codes/delete/<?= $coupon['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this Category ?');"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>