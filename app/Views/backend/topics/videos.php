<div class="row">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-body">
                <?= alertMessage() ?>
                <div class="row col-md-12">
                    <div class="col-md-6">
                        <h3 class="card-title"> Videos List</h3>
                    </div>
                    <div class="col-md-6">
                    <a href="/admin/topics/add_playlist" class="btn btn-primary ml-3" style="float:right">Add Playlist</a>
                        <a href="/admin/topics/add_video" class="btn btn-primary" style="float:right">Add Videos</a>
                    </div>
                </div>
                <br>
                <div class="table-responsive">
                    <table id="datatable2" class="table mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Video</th>
                                <th>Title</th>
                                <th colspan="2">Sort</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i=1;
                            foreach ($videos as $video) { ?>
                                <tr>
                                    <th scope="row"><?= $i++ ?></th>
                                    <td><img src="<?= $video['photo'] ?>" style="height: 100px;"></td>
                                    <td style="width: 30%;"><?= $video['titel'] ?></td>

                                    <td scope="row">
                                        <form action="/admin/topics/sort/<?= $video['id'] ?>" method="post">
                                            <input type="text" id="sort" name="sort" value="<?= (isset($video)) ? $video['sort'] : '' ?>" class="form-control">
                                    </td>
                                    <td> <button class="btn btn-primary" type="submit">
                                            Sort
                                        </button></form>
                                    </td>
                                    <td>
                                        <div class="">
                                            <?php if ($video['show-v']) { ?>
                                                <a href="/admin/topics/reject/<?= $video['id'] ?>" class="btn btn-success"><i class="fa fa-eye" data-toggle="tooltip" data-placement="top" title="Show"></i></a>
                                            <?php } else { ?>
                                                <a href="/admin/topics/approve/<?= $video['id'] ?>" class="btn btn-danger"><i class="fa fa-eye-slash" data-toggle="tooltip" data-placement="top" title="hide"></i></a>
                                            <?php } ?>
                                            <a href="/admin/topics/delete_video/<?= $video['id'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this Video ?');"><i class="fa fa-trash"></i></a>
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