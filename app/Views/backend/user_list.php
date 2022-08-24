<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <?= alertMessage() ?>
            <div class="card-body">
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <h3 class="card-title">Topics List</h3>
                    </div>
                </div>
                <br>

                <?php
                // echo '<pre>';
                // print_r($users); 
                ?>
                <div class="table-responsive">
                    <table id="datatable2" class="table mb-0">
                        <thead>
                            <tr class="text-center">
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Plan</th>
                                <th>Recieved</th>
                                <th>Subscription Date</th>
                                <th>Expiry Date</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i= 1;
                            foreach ($users as $user) { ?>
                                <tr class="text-center">
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><?= $user['firstname'] ?></td>
                                    <td><?= $user['lastname'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['titel'] ?></td>
                                    <td><?= $user['price'] ?></td>
                                    <td><?= $user['subscription_date'] ?></td>
                                    <td><?= $user['expiry_date'] ?></td>

                                    <td>
                                        <div class="">
                                            <a href="/admin/users/delete/<?= $user['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this user ?');"><i class="fa fa-trash"></i></a>
                                        </div>
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