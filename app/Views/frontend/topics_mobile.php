<section class="contact py-5" id="contact">
    <div class="container pt-md-5 pt-4">
        <div class="main-grid-contact">

            <div class="col-md-12  col-sm-12 content-form-right p-0 order-lg-last">
                <br>
                <div class="title-heading-w3 text-center mx-auto mb-1">
                            <?php if (isset($category)) { ?>
                                <li class="m-3">
                                    <div class="">
                                        <div style="display:flex;justify-content: space-between;align-items:center;color:#242952"> <span style="background-image:url('/assets/images/start1.png');background-size:contain;background-repeat:no-repeat;padding: 25px;line-height: 14px;color:white;position: relative;">
                                                <p class="circle2" style="margin-top:-11px;margin-left: -8px;"><?= $category['id'] ?></p>
                                            </span><span style="margin-bottom: 11px;text-align:center;font-weight:bold">
                                                <span style="margin-bottom: 11px;width: 60%;font-size:25px"> <?= $category['cat_name'] ?></span>
                                            </span>
                                            <span style="background-image:url('/assets/images/end.png');background-size:contain;background-repeat:no-repeat;padding: 25px;line-height: 14px;color:white;margin-bottom: 11px;margin-right:-28px;height: 70px;"></span>
                                        </div>
                                    </div>
                                </li>
                                <div style="border:0.5px solid #f1f1f1;margin-top: -99px;margin-left: 6px;border-radius: 5px;height: 57px;margin-right: 18px;background: white;"></div>

                            <?php } ?>
                        </div>
                        <br />
                <div class="col-lg-12 form-w3ls" style="overflow-y:auto; height:calc(100vh - 40px);">
                    <div class="popups" style="z-index: 50;background-color: #fff;">
                    </div>
                    <div class="row">
                        <?php foreach ($videos as $video) { ?>
                            <div class="col-12">
                                <div class="m-1 shadow p-2">
                                    <?php if ($categories[0]['id'] == 1) { ?>
                                        <a class="btn1" data-idvideo="<?= $video['video_code']; ?>">
                                            <img src="<?= $video['photo']; ?>" alt="" class="img-fluid radius-image" id="hove">
                                        </a>
                                    <?php } ?>
                                    <h4 style="text-align: center;"><a href="home/#membership" style="font-size: 16px;font-weight: bold;">
                                            <span style="font-size: 16px;"><?= $video['id']; ?> - <?= $video['titel']; ?> </span>
                                        </a></h4>
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
                                videoBox.innerHTML = '<iframe src="https://www.youtube.com/embed/' + idVideo + '?controls=0&showinfo=0&rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
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
</section>