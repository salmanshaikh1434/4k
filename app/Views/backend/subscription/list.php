<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <h3 class="card-title">CouponCode List</h3>
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
                            <?php foreach ($memberships as $membership) { ?>
                                <tr>
                                    <th scope="row"><?= $membership['id'] ?></th>
                                    <td><?= $membership['titel'] ?></td>
                                    <td><?= $membership['priceing'] ?></td>
                                    <td>
                                        <div class="">
                                            <a href="/admin/subscriptions/add/<?= $membership['id'] ?>" class="btn btn-primary"><i class="fa fa-edit" tooltip="edit"></i></a>
                                            <a href="/admin/subscriptions/delete/<?= $membership['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this Plan ?');"><i class="fa fa-trash"></i></a>
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