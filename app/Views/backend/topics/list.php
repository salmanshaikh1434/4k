<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-body">
                <?= alertMessage() ?>
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <h3 class="card-title">Topics List</h3>
                    </div>
                 
                    <div class="col-md-6">
                        <a href="/admin/topics/add" class="btn btn-primary" style="float:right">Add Topics</a>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Categories Name</th>
                                <th>Videos</th>
                                <th>Hours</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($categories as $category) { ?>
                                <tr>
                                    <th scope="row"><?= $category['id'] ?></th>
                                    <td><?= $category['cat_name'] ?></td>
                                    <td><?= $category['videos'] ?></td>
                                    <td><?= $category['hours'] ?></td>
                                    <td>
                                        <div class="">
                                            <a href="/admin/topics/add/<?= $category['id'] ?>" class="btn btn-primary"><i class="fa fa-edit" tooltip="edit"></i></a>
                                            <a href="/admin/topics/videos/<?= $category['id'] ?>" class="btn btn-danger"><i class="fa fa-video"></i></a>
                                            <a href="/admin/topics/delete/<?= $category['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this Category ?');"><i class="fa fa-trash"></i></a>

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