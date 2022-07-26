<section class="contact py-5" id="not_select">
    <div class="container pt-md-5 pt-4 mt-2">
        <div class="main-grid-contact">
            <div class="row d-lg-none">
                <div class="col-lg-5 col-md-12  col-sm-12 order-first">
                    <div class="col">

                        <table class="table table-striped table-advance table-hover " style=" border-collapse:separate;border-spacing: 0 0em;">
                            <thead>
                                <tr style="text-align: center;">
                                    <th id="table_sup_head" style="background-color: #fd746c ;color: white;text-align:center"> </th>
                                    <th colspan="5" id="table_sup_head" style="background-color: #242952;color: #fff;"><span style="font-size:22px"> Our Index (Our Road-map)</span><br />(35 Topics,16,667 Videos & 4,724 Hours)</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="col col-md-12  col-sm-12" style="overflow-y:auto; height:calc(100vh - 40px);">
                        <table class=" " style=" border-collapse:separate;border-spacing: 0 1em;">
                            <?php
                            foreach ($categories as $category) { ?>
                                <thead>
                                    <tr class="spacer" style="background-color: #242952;color: #fff;border-bottom: 1px solid #fd746c; ">
                                        <td style="background-color:#fd746c ;border:none;font-size: 20px;;text-align:center;vertical-align:middle"><span class=""><?= $category['id'] ?></span></td>
                                        <td><a href="/topics/mobile_videos/<?= $category['id'] ?>" style="color: #fff;text-decoration: none;">

                                                <?= $category['cat_name'] ?>
                                                <br><span style="color: red;font-weight: bold;">
                                                </span></a></td>
                                        <td style="text-align: center;white-space: nowrap;"><i class="fas fa-video-camera"></i><br><?= $category['videos'] ?> videos
                    </div>
                    </td>
                    <td style="text-align: center;white-space: nowrap;"><i class="fa fa-clock-o"></i><br><?= $category['hours'] ?> Hours</td>

                    <td>
                        <?php if ($category['id'] == 1 && null == session()->get('expiry_date')) { ?>
                            <img class="blink-image" src="/assets/images/unlockg.png" height="40px" width="40px">
                        <?php } ?>
                        <?php if (date('Y-m-d') < date('Y-m-d', strtotime(session()->get('expiry_date')))) { ?>
                            <img src="/assets/images/unlockg.png" height="40px" width="40px">
                        <?php } else { ?>
                            <img src="/assets/images/lock.png" height="40px" width="40px">
                        <?php } ?>
                    </td>
                    </tr>
                <?php
                            } ?>
                </thead>
                </table>
                </div>
            </div>
        </div>
        <!-- map -->

        <div class="row">
            <div class="col-lg-5 col-md-12  col-sm-12 order-first d-none d-lg-block">
                <div class="col">
                    <table class="table table-striped table-advance table-hover " style=" border-collapse:separate;border-spacing: 0 0em;">
                        <thead>
                            <tr style="text-align: center;">
                                <th id="table_sup_head" style="background-color: #fd746c ;color: white;text-align:center"> </th>
                                <th colspan="5" id="table_sup_head" style="background-color: #242952;color: #fff;"><span style="font-size:22px"> Our Index (Our Road-map)</span><br />(35 Topics,16,667 Videos & 4,724 Hours)</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="col col-md-12  col-sm-12" style="overflow-y:auto; height:calc(100vh - 40px);">
                    <table class=" " style=" border-collapse:separate;border-spacing: 0 1em;">
                        <?php
                        foreach ($categories as $category) { ?>
                            <thead>
                                <tr class="spacer" style="background-color: #242952;color: #fff;border-bottom: 1px solid #fd746c; ">
                                    <td style="background-color:#fd746c ;border:none;font-size: 20px;;text-align:center;vertical-align:middle"><span class=""><?= $category['id'] ?></span></td>
                                    <td><a href="/topics/videos/<?= $category['id'] ?>" style="color: #fff;text-decoration: none;">
                                            <?= $category['cat_name'] ?>
                                            <br><span style="color: red;font-weight: bold;">
                                            </span></a></td>
                                    <td style="text-align: center;white-space: nowrap;"><i class="fas fa-video-camera"></i><br><?= $category['videos'] ?> videos</td>
                                    <td style="text-align: center;white-space: nowrap;"><i class="fa fa-clock-o"></i><br><?= $category['hours'] ?> Hours</td>

                                    <td>
                                         <?php if ($category['id'] == 1 && null== session()->get('expiry_date'))  { ?>
                                            <img class="blink-image" src="/assets/images/unlockg.png" height="40px" width="40px">
                                        <?php } ?>
                                        <?php if (date('Y-m-d') < date('Y-m-d', strtotime(session()->get('expiry_date')))) { ?>
                                            <img  src="/assets/images/unlockg.png" height="40px" width="40px">
                                        <?php } else { ?>
                                            <img src="/assets/images/lock.png" height="40px" width="40px">
                                        <?php } ?>

                                    </td>
                                </tr>
                            <?php
                        } ?>
                            </thead>
                    </table>
                </div>
            </div>


            <!-- contact form -->
            <div class="popups" style="z-index: 50;background-color: #fff;">
            </div>

            <div class="col-lg-7 col-md-12  col-sm-12 content-form-right p-0 order-lg-last d-none d-lg-block">
                <div class="title-heading-w3 text-center mx-auto mb-1">
                    <?php if (isset($cat_name)) { ?>
                        <h3 class="title-style" style="font-size: 25px;text-align: center;border: 1px solid #000;margin-left: 30px;"><?= $cat_name['id'] ?> - <?= $cat_name['cat_name'] ?></h3>
                    <?php } ?>
                </div>
                <br />
                <div class="col-lg-12 form-w3ls" style="overflow-y:auto; height:calc(100vh - 40px);">
                    <div class="row">
                        <?php foreach ($videos as $video) { ?>
                            <div class="col-md-12 col-lg-6 mb-4">
                                <div class="m-1 shadow p-2">
                                    <?php if ($video['categories'] == 1 && null == session()->get('expiry_date')) { ?>
                                        <a class="btn1" data-idvideo="<?= $video['video_code']; ?>">
                                            <img src="<?= $video['photo']; ?>" alt="" class="img-fluid radius-image" id="hove">
                                        </a>
                                    <?php }
                                    if (date('Y-m-d') < date('Y-m-d', strtotime(session()->get('expiry_date')))) { ?>
                                        <a class="btn1" data-idvideo="<?= $video['video_code']; ?>">
                                            <img src="<?= $video['photo']; ?>" alt="" class="img-fluid radius-image" id="hove">
                                        </a>
                                    <?php } else { ?>
                                        <a data-toggle="modal" data-target="#exampleModal" data-idvideo="<?= $video['video_code']; ?>">
                                            <img src="/assets/images/vp.jpg" alt="" class="img-fluid radius-image" id="hove">
                                        </a>
                                    <?php } ?>

                                    <h4 style="text-align: center;"><a href="#" style="font-size: 16px;font-weight: bold;">
                                            <span style="font-size: 16px;"><?= $video['id']; ?> - <?= $video['titel']; ?> </span>
                                        </a></h4>
                                    <?php if ($video['categories'] != 1 && null == session()->get('expiry_date')) { ?>
                                        <a class="btn btn-style" data-toggle="modal" data-target="#exampleModal">Upgrade Your Account to Watch</a>
                                    <?php } ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <script>
                        var buttons = document.querySelectorAll(".btn1");
                        var popups = document.querySelector(".popups");

                        var getPopup = function(idVideo) {
                            if (popups.children.length == 0) {
                                var videoBox = document.createElement("div");
                                var closeBtn = document.createElement("div");
                                videoBox.classList.add("video");
                                closeBtn.classList.add("close");
                                videoBox.innerHTML = '<iframe src="https://www.youtube.com/embed/' + idVideo + '?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                                popups.appendChild(videoBox);
                                popups.appendChild(closeBtn);
                                closeBtn.addEventListener("click", closePopups);
                                popups.classList.add("active");
                            }
                        };
                        var closePopups = function() {
                            popups.querySelector(".video").remove();
                            popups.querySelector(".close").remove();
                            popups.classList.remove("active");
                        };
                        for (var i = 0; i < buttons.length; i++) {
                            buttons[i].addEventListener("click", function() {
                                var idVideo = this.dataset.idvideo;
                                getPopup(idVideo);
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>


<!--popup -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upgrade Your Account</h5>
                <button type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                To browse <b> 35 Topics</b><br />
                To Explore <b>16,667 Videos</b><br />
                To watch <b>4,274 Study Hours</b><br />
                To Master <b>American & British Accent</b><br />
            </div>
            <div class="row m-3">
                <a href="/home/#membership" class="btn btn-style">Go to the Membership</a>
            </div>
        </div>
    </div>
</div>