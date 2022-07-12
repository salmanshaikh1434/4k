<section class="contact py-5" id="contact">
    <div class="container pt-md-5 pt-4">
        <div class="main-grid-contact">
            <!-- map -->

            <div class="row">
                <div class="col-lg-5 order-first"  style="overflow:scroll; height:calc(100vh - 40px);
">


                    <table class="table table-striped table-advance table-hover " style=" border-collapse:separate;border-spacing: 0 1em;">
                        <tbody>
                            <tr>
                                <th id="table_sup_head" style="background-color: #fd746c ;color: white;text-align:center"> Sr</th>
                                <th id="table_sup_head" style="background-color: #242952;color: #fff;">Topics </th>
                                <th id="table_sup_head" style="background-color: #242952;color: #fff;"> Videos</th>
                                <th id="table_sup_head" style="background-color: #242952;color: #fff;">Hours</th>
                                <th id="table_sup_head" style="background-color: #242952;color: #fff;">L&U</th>
                            </tr>
                            <?php

                            use App\Models\Category;

                            foreach ($categories as $category) {
                                if ($category['id'] == 1) {
                                    $free = 'FREE TRIAL';
                                    $img = '<img src="/assets/images/green2.gif" style="width: 30px;">';
                                } else {
                                    $free = '';
                                    $img = '';
                                }

                            ?>
                                <style>

                                </style>
                                <tr class="spacer" style="background-color: #242952;color: #fff;border-bottom: 1px solid #fd746c; ">
                                    <td style="background-color:#fd746c ;border:none;font-size: 20px;;text-align:center;vertical-align:middle"><span class=""><?= $category['id'] ?></span></td>
                                    <td><a href="topics_details.php?topic=<?= $category['id'] ?>" style="color: #fff;text-decoration: none;">

                                            <?= $category['cat_name'] ?>
                                            <br><span style="color: red;font-weight: bold;">
                                                <?php echo $img; ?>
                                                <?php echo $free; ?>
                                            </span></a></td>
                                    <td style="text-align: center;white-space: nowrap;"><i class="fas fa-video-camera"></i><br><?= $category['videos'] ?> videos</td>
                                    <td style="text-align: center;white-space: nowrap;"><i class="fa fa-clock-o"></i><br><?= $category['hours'] ?> Hours</td>

                                    <td>
                                        <?php if ($category['id'] == 1) { ?><button onClick='changeLockButtonStyle()' id="LockButton" class="fa fa-unlock fa-lg" style="background-color: #22274e;color: white;border: 0px;">
                                            </button> <?php } else { ?>
                                            <button onClick='changeLockButtonStyle()' id="LockButton" class="fa fa-lock fa-lg" style="background-color: #22274e;color: white;border: 0px;">
                                            </button>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>



                <!-- contact form -->
                <div class="col-lg-7 content-form-right p-0 order-lg-last ">

                    <br><br>
                    <div class="title-heading-w3 text-center mx-auto mb-md-5 mb-4">
                        <h3 class="title-style" style="font-size: 25px;text-align: center;border: 1px solid #000;margin-left: 30px;">35 - professional tutors (mixed subjects)</h3>
                    </div>
                    <div class="col-lg-12 form-w3ls">


                        <style>
                            #hove {
                                height: 200px;
                                width: 335px;
                            }

                            .shadow {
                                box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
                            }

                            .popups {
                                max-width: 90vw;
                                max-height: 90vh;
                                padding: 20px;
                                border-radius: 8px;
                                position: fixed;
                                box-shadow: 0 0 20px #000;
                                top: 50%;
                                left: 50%;
                                transform: translate(-50%, -50%);
                                display: none;
                            }

                            .popups.active {
                                display: block;
                            }

                            .video {
                                width: 720px;
                                height: 360px;
                                background: #000;
                                max-width: 100%;
                                max-height: 100%;
                            }

                            .close {
                                position: absolute;
                                background: red;
                                width: 32px;
                                height: 32px;
                                top: -20px;
                                right: -20px;
                                border-radius: 6px;
                                opacity: 0.5;
                                cursor: pointer;
                                transition: 0.3s;
                            }

                            .close:hover {
                                opacity: 1;
                            }

                            .close::after {
                                content: "";
                                position: absolute;
                                display: block;
                                width: 100%;
                                height: 2px;
                                background: #fff;
                                top: 50%;
                                left: 0;
                                transform: rotate(45deg);
                            }

                            .close::before {
                                content: "";
                                position: absolute;
                                display: block;
                                width: 100%;
                                height: 2px;
                                background: #fff;
                                top: 50%;
                                left: 0;
                                transform: rotate(-45deg);
                            }

                            iframe {
                                max-width: 100%;
                                width: 100%;
                                height: 100%;
                                max-height: 100%;
                            }
                        </style>

                        <div class="popups" style="z-index: 50;background-color: #fff;">
                        </div>


                        <div class="row">
                            <?php foreach ($video_categories as $category) { ?>
                                <div class="col-md-12 col-lg-6 mb-4">
                                    <div class="m-1 shadow p-2">
                                        <a class="btn" data-idvideo="">
                                            <img src="/assets/uploads/<?= $category['photo']; ?>" alt="" class="img-fluid radius-image" id="hove">
                                        </a>
                                        <h4 style="text-align: center;"><a href="topics_details.php?topic=<?= $category['id']; ?>" style="font-size: 16px;font-weight: bold;">
                                                <span style="font-size: 16px;"><?= $category['id']; ?> - <?= $category['cat_name']; ?> </span>
                                            </a></h4>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>

                        <style>
                            .pagination {
                                display: inline-block;
                            }

                            .pagination li {
                                color: black;
                                float: left;
                                padding: 8px 16px;
                                text-decoration: none;
                                transition: background-color .3s;
                                border: 1px solid #ddd;
                            }

                            .pagination li.active {
                                background-color: #4CAF50;
                                color: white;
                                border: 1px solid #4CAF50;
                            }

                            .pagination li:hover:not(.active) {
                                background-color: #ddd;
                            }
                        </style>
                        <?= $pager->links(); ?>
                        <script>
                            var buttons = document.querySelectorAll(".btn");
                            var popups = document.querySelector(".popups");

                            var getPopup = function(idVideo) {
                                if (popups.children.length == 0) {
                                    var videoBox = document.createElement("div");
                                    var closeBtn = document.createElement("div");
                                    videoBox.classList.add("video");
                                    closeBtn.classList.add("close");
                                    videoBox.innerHTML = '<iframe src="https://www.youtube.com/embed/' + idVideo + '" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
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