<section class="contact py-5" id="contact">
    <div class="container pt-md-5 pt-4">
        <div class="main-grid-contact">

            <div class="col-md-12  col-sm-12 content-form-right p-0 order-lg-last">
                <br>
                <div class="title-heading-w3 text-center mx-auto mb-1">
                    <h3 class="title-style" style="font-size: 25px;text-align: center;border: 1px solid #000;margin-left: 30px;">35 - professional tutors (mixed subjects)</h3>
                </div>
                <div class="col-lg-12 form-w3ls" style="overflow-y:auto; height:calc(100vh - 40px);">
                    <div class="popups" style="z-index: 50;background-color: #fff;">
                    </div>
                    <div class="row">
                        <?php foreach ($videos as $video) { ?>
                            <div class="col-md-12 col-lg-6 mb-4">
                                <div class="m-1 shadow p-2">
                                    <?php if ($categories[0]['id'] == 1) { ?>
                                        <a class="btn" data-idvideo="<?= $video['video_code']; ?>">
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
                        var buttons = document.querySelectorAll(".btn");
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