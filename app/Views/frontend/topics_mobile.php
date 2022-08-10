<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $site_info['site_name']; ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="/assets/css/style-starter.css">
    <link rel="stylesheet/scss" href="/assets/css/scrolling.scss">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <meta name="keywords" content="<?= $site_info['keyword']; ?>">
    <meta name="description" content="<?= $site_info['description']; ?>">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/logo.png">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .element {
            position: fixed;
            z-index: 100;
            background-color: white;
        }

        @media screen and (max-width: 768px) {
            .text_hide {

                overflow: hidden;
                text-overflow: ellipsis;
                display: -webkit-box;
                line-height: 16px;
                /* fallback */
                max-height: 78px;
                /* fallback */
                -webkit-line-clamp: 4;
                /* number of lines to show */
                -webkit-box-orient: vertical;
            }
        }
    </style>
</head>
<section>
    <div class="col-sm-12 element" style="background-color: white;">
        <?php if (isset($category)) { ?>
            <li class="">
                <a href="/topics/videos/3"><i class="fa fa-arrow-left" style=" background-color: white;border-radius: 50%;border: 1px solid grey;padding: 10px;" aria-hidden="true"></i></a>
                <span class="circle2" style="color:black;font-weight:bold"><?= $category['id'] ?>.</span>
                <span style="margin-bottom: 11px;text-align:center;font-weight:bold">
                    <span style="margin-bottom: 11px;width: 60%;font-size: 4.5vw;"> <?= $category['cat_name'] ?></span>
                </span>
            </li>
        <?php } ?>
    </div>
    <div class="container-fluid" style="padding-top:58px ;">
        <?php foreach ($videos as $video) { ?>
            <div class="row mb-3">
                <div class="col-6">
                    <?php if ($video['categories'] == 1 || !null == session()->get('expiry_date')) { ?>
                        <a class="btn1" data-idvideo="<?= $video['video_code']; ?>">
                            <img src="<?= $video['photo']; ?>" alt="" class="img-fluid" style="height: 115px;" id="hove">
                        </a>
                    <?php } else { ?>
                        <a class="btn1" data-idvideo="<?= $video['video_code']; ?>">
                            <img src="<?= $video['photo']; ?>" alt="" class="img-fluid" style="height: 115px;filter:blur(4px);" id="hove">
                        </a>
                    <?php } ?>
                </div>
                <div class="col-6 ">
                <?php if ($video['categories'] == 1 || !null == session()->get('expiry_date')) { ?>
                    <h4 class="text_hide"> <a href="home/#membership" style="font-size: 16px;font-weight: bold;">
                            <span style="font-size: 16px;"><?= $video['id']; ?> - <?= $video['titel']; ?> </span>
                        </a></h4>
                        <?php } else { ?>
                            <h4 class="text_hide"> <a href="home/#membership" style="font-size: 16px;font-weight: bold;filter:blur(4px);">
                            <span style="font-size: 16px;"><?= $video['id']; ?> - <?= $video['titel']; ?> </span>
                        </a></h4>
                        <?php } ?>
                    <?php if ($video['categories'] != 1 && null == session()->get('expiry_date')) { ?>
                        <a class="btn btn-style mt-2" style="width:100%;font-size: 12px;" data-toggle="modal" data-target="#exampleModalCenter">Buy Membership</a>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Upgrade Your Account</h5>
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

    <div class="popups" style="z-index: 50;background-color: #fff;">
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
</section>