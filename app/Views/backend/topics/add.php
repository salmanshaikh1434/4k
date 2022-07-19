<div class="col-lg-12">
    <div class="card">
        <div class="card-body ">
            <h5 class="card-title">Add Topics</h5>
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <br />
                <label class="control-label">Categories Name:</label>
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="input-group mb-12">
                            <input type="text" id="cat_name" name="cat_name" value="<?= (isset($category)) ? $category['cat_name'] : '' ?>" class="form-control" placeholder="Enter Category Name" required>

                        </div>
                    </div>
                </div>
                <br>
                <!-- <label class="control-label">Video Number :</label>
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="input-group mb-12">
                            <input type="text" id="videos_no" name="videos_no" value="" class="form-control" placeholder="How many Videos" required>

                        </div>
                    </div>
                </div> -->
                <br>
                <label class="control-label">Tutors :</label>
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="input-group mb-12">
                            <input type="text" id="tutors" name="tutors" value="<?= (isset($category)) ? $category['tutors'] : '' ?>" class="form-control" placeholder="How many Tutors" required>

                        </div>
                    </div>
                </div>
                <br>
                <label class="control-label">Videos :</label>
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="input-group mb-12">
                            <input type="text" id="videos" name="videos" value="<?= (isset($category)) ? $category['videos'] : '' ?>" class="form-control" placeholder="How many Videos" required>

                        </div>
                    </div>
                </div>
                <br>
                <label class="control-label">Hours :</label>
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="input-group mb-12">
                            <input type="text" id="hours" name="hours" value="<?= (isset($category)) ? $category['hours'] : '' ?>" class="form-control" placeholder="How many Hours" required>

                        </div>
                    </div>
                </div>
                <br>
                <label class="control-label">Photo :</label>
                <div class="col-lg-10">
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" name="photo" values="<?= (isset($category)) ? $category['photo'] : '' ?>" size="20" id="photo" />
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-6">

                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                Add Topic
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