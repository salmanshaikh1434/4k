<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <h3 class="card-title">Topics List</h3>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr class="text-center">
                                <th>Id</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>User Name</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Date</th>
                                <th>Membership</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) { ?>
                                <tr class="text-center">
                                    <th scope="row"><?= $user['id'] ?></th>
                                    <td><?= $user['firstname'] ?></td>
                                    <td><?= $user['firstname'] ?></td>
                                    <td><?= $user['firstname'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['country'] ?></td>
                                    <td><?= $user['date'] ?></td>
                                    <td> <?php if (1 == $user['payed']) { ?>
                                            <i class="fa fa-check" style="color:green"></i><?php } else { ?>
                                            <i class="fa fa-times" style="color:red"></i>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <div class="">
                                            <a href="/admin/users/add/" class=""><i class="fa fa-edit mr-2"></i></a>
                                            <a href="/admin/users/delete/" onclick="return confirm('Are you sure want to delete this user ?');"><i class="fa fa-trash text-danger"></i></a>
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