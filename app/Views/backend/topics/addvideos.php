<div class="col-lg-12">
    <div class="card">
        <div class="card-body ">
        <?= alertMessage()?>
            <h5 class="card-title">Add Videos</h5>
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <br />
                <label class="control-label">Select Categories</label>
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="input-group mb-12">
                        <select class="custom-select" id="categories" name="categories" required>
                                <option value="">Choose Category</option>
                                <?php foreach ($categories as $cat) : ?>
                                    <option value="<?= $cat['id'] ?>"><?= $cat['cat_name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <br>
                <label class="control-label">Videos code :</label>
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="input-group mb-12">
                            <input type="text" id="video_code" name="video_code" value="" class="form-control" placeholder="Enter Video Code">

                        </div>
                    </div>
                </div>
                <br>
                
                <div class="row">
                    <div class="col-6">

                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                Add Video
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