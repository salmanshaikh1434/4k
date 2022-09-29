<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $site_info['site_name']; ?></title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <!-- Template CSS Style link -->
    <link rel="stylesheet" href="/assets/css/style-starter.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <meta name="keywords" content="<?= $site_info['keyword']; ?>">
    <meta name="description" content="<?= $site_info['description']; ?>">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/logo.png">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/counter.js"></script>
    <script src="/assets/js/theme-change.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on("click", ".open-AddBookDialog", function() {
                var myvideoid = $(this).data('id');
                var video_type = $(this).attr('video_type');
                
                    if (video_type == 1) {
                        $("#videoframe").html('<iframe class="iframeVideo" src="https://www.youtube.com/embed/' + myvideoid + '" allowfullscreen></iframe>');
                     } else{
                        $("#videoframe").html('<iframe class="iframeVideo" src="https://www.youtube.com/embed/?listType=playlist&list=' + myvideoid + '" allowfullscreen></iframe>');
               
                }
            });
            $(document).on("click", ".close", function() {
                $(".iframeVideo").each(function() {
                    var src = $(this).attr('src');
                    $(this).attr('src', src);
                });
            });
        });
    </script>
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
    <div class="col-sm-12 element" style="background-color: white;height:71px">
        <?php if (isset($category)) { ?>

            <li class="">
                <div class="">
                    <div style="display:flex;justify-content: space-between;align-items:center;color:#242952"> <span style="background-image:url('/assets/images/start1.png');background-size:contain;background-repeat:no-repeat;padding: 25px;line-height: 14px;color:white;position: relative;">
                            <a href="/topics/videos/4">
                                <p class="circle2" style="margin-top:-11px;margin-left: -10px;"><i class="fa fa-arrow-left" aria-hidden="true"></i></p>
                            </a>
                        </span><span style="margin-bottom: 11px;text-align:center;">
                            <span style="font-size: 4.5vw; font-weight:bold"> <?= $category['id'] ?>.<?= $category['cat_name'] ?></span></span>
                        </span>
                        <span style="background-image:url('/assets/images/end.png');background-size:contain;background-repeat:no-repeat;padding: 11px;line-height: 14px;color:white;margin-bottom: 17px;margin-right:-7px;height: 66px;"></span>
                    </div>
                </div>
            </li>


        <?php } ?>
    </div>
    <div class="container-fluid" style="padding-top:92px;background-color:#242952">
        <?php foreach ($videos as $video) { ?>
            <div class="card" style="margin-bottom: 7px;border-radius: 8px;">
                <div class="card-body" style="padding: 0rem 0.5rem">

                    <div class="row">
                        <div class="col-6">
                            <?php if ($video['categories'] == 1 || !null == session()->get('expiry_date')) { ?>
                                <a data-toggle="modal" data-id="<?= $video['video_code']; ?>" class="open-AddBookDialog" href="#myLargeModalLabel" video_type="<?=$video["type"];?>">
                                    <img src="<?= $video['photo']; ?>" alt="" class="img-fluid" style="height: 115px;border-radius: 8px;" id="hove">
                                </a>
                            <?php } else { ?>
                                <a data-toggle="modal" data-target="#exampleModalCenter" data-idvideo="<?= $video['video_code']; ?>">
                                    <img src="<?= $video['photo']; ?>" alt="" class="img-fluid" style="height: 115px;filter:blur(16px);" id="hove">
                                </a>
                            <?php } ?>
                        </div>
                        <div class="col-6 ">
                            <?php if ($video['categories'] == 1 || !null == session()->get('expiry_date')) { ?>
                                <h4 class="text_hide"> <a data-toggle="modal" data-id="<?= $video['video_code']; ?>" class="open-AddBookDialog" href="#myLargeModalLabel" video_type="<?=$video["type"];?>" style="font-size: 16px;">
                                        <span style="font-size: 16px;"> <?= $video['titel']; ?> </span>
                                    </a></h4>
                            <?php } else { ?>
                                <h4 class="text_hide"> <a data-toggle="modal" data-target="#exampleModalCenter" style="font-size: 16px;filter:blur(4px);">
                                        <span style="font-size: 16px;"><?= $video['titel']; ?> </span>
                                    </a></h4>
                            <?php } ?>
                            <?php if ($video['categories'] != 1 && null == session()->get('expiry_date')) { ?>
                                <a class="btn btn-style mt-2" style="width:100%;font-size: 12px;" data-toggle="modal" data-target="#exampleModalCenter">Buy Membership</a>
                            <?php } ?>
                        </div>
                    </div>
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
    <div class="modal fade bd-example-modal-lg" style="background: #0f0f0fa1;" data-keyboard="false" data-backdrop="static" id="myLargeModalLabel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <button type="button" class="close m-5" data-dismiss="modal" aria-label="Close" style=" background-color: red;border-radius: 50%;color:white;border: 1px solid grey;padding: 10px;padding:20px">
        </button>
        <div class="modal-dialog modal-xl frame-content" style="height:40%">
            <div style=" pointer-events: none !important;"></div>
            <div class="modal-content" id="videoframe" style="background-color:black;height:100%;top:50%;border:2px solid white">
            </div>
        </div>
    </div>
    <div class="popups" style="z-index: 50;background-color: black;">
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