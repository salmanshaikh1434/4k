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
</head>
<header id="site-header" class="fixed-top">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">


            <a class="navbar-brand" href="/">
                <span><img src="/assets/images/logo2.png" style="width: 250px;background-color: #fff;
    border-radius: 10px;"></span>
            </a>
            <button class="navbar-toggler float-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                <span class="navbar-toggler-icon fa icon-close fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto my-2 my-lg-0">

                    <li class="nav-item">
                        <a class="btn btn-style" style="background: #242952;" href="topics_details.php?topic=1">Demo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php#home" style="margin-top: 9px;">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/index.php#services" style="margin-top: 9px;">Services</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/index.php#index" style="margin-top: 9px;">Index</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php#benefit" style="margin-top: 9px;">Benefits</a>
                    </li>
                    <?php if (NULL == session()->get('id')) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="/index.php#membership" style="margin-top: 9px;">Membership</a>
                        </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php#faq" style="margin-top: 9px;">FAQ</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#contact" style="margin-top: 9px;">Contact</a>
                    </li>
                    <?php if (!NULL == session()->get('id')) { ?>
                        <li class="nav-item">
                            <a href="/memberships" class="btn btn-style" style="margin-left: 5px;">Membership</a>
                        </li>
                        <li class="nav-item">
                            <a href="/signup/signout" class="btn btn-style" style="margin-left: 5px;">Sign Out</a>
                        </li>
                    <?php } else { ?>
                        <li class="menu-item">
                            <a href="/login" class="btn btn-style" style="background-color: #fff;color: #fd746c;">Sign In</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </nav>
    </div>
</header>
<body>
    <section class="contact py-5" id="not_select">
        <div class="container-fluid pt-md-5 pt-4 mt-2" style="padding: 31px;">
            <div class="main-grid-contact">
                <!-- For Mobile Only -->
                <div class="row d-lg-none">
                    <div class=" col-12 order-first">
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
                        <div class="col" style="overflow-y:auto; height:calc(100vh - 40px);">
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

                                            </td>
                                            <td style="text-align: center;white-space: nowrap;"><i class="fa fa-clock-o"></i><br><?= $category['hours'] ?> Hours</td>

                                            <td>
                                                <?php if ($category['id'] == 1 && null == session()->get('expiry_date')) { ?>
                                                    <img class="blink-image" src="/assets/images/unlockg.png" height="40px" width="40px">
                                                <?php }
                                                if (null == session()->get('expiry_date')) { ?>
                                                    <img src="/assets/images/lock.png" height="40px" width="40px">
                                                <?php }

                                                if (date('Y-m-d') < date('Y-m-d', strtotime(session()->get('expiry_date')))) { ?>
                                                    <img src="/assets/images/unlockg.png" height="40px" width="40px">
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
                    <div class="col-lg-5 col-md-12  col-sm-12 order-first d-none d-lg-block" style="background-color: #f5f3f3;">
                        <div class="col">
                            <li class="m-3">
                                <div class="">
                                    <div style="display:flex;justify-content: space-between;align-items:center;color:#242952"> <span style="background-image:url('/assets/images/start1.png');background-size:contain;background-repeat:no-repeat;padding: 25px;line-height: 14px;color:white;position: relative;">
                                            <p class="circle2" style="margin-top:-11px;margin-left: -8px;"><i class="fa fa-search" aria-hidden="true"></i></p>
                                        </span><span style="margin-bottom: 11px;text-align:center;font-weight:bold">
                                            <span style="font-size: 20px;"> Our Index (Our Road-map)</span><br />(35 Topics,16,667 Videos & 4,724 Hours)
                                        </span>
                                        <span style="background-image:url('/assets/images/end.png');background-size:contain;background-repeat:no-repeat;padding: 25px;line-height: 14px;color:white;margin-bottom: 17px;margin-right:-15px;height: 66px;"></span>
                                    </div>
                                </div>
                            </li>
                            <div style="border:0.5px solid #f1f1f1;margin-top: -99px;margin-left: 6px;border-radius: 5px;height: 57px;margin-right: 34px;    background: white;"></div>
                        </div>
                        <div class="col col-md-12  col-sm-12" style="overflow-y:auto; height:calc(60vh);">
                            <?php
                            foreach ($categories as $category) { ?>
                                <li class=" m-3">
                                    <div class="">
                                        <div style="display:flex;justify-content: space-between;align-items:center; color:#242952"> <span style="background-image:url('/assets/images/start1.png');background-size:contain;background-repeat:no-repeat;padding: 25px;line-height: 14px;color:white;position: relative;">
                                                <p class="circle2" style="margin-top:-11px;margin-left: -8px;"><?= $category['id'] ?> </p>
                                            </span><span style="margin-bottom: 11px;width: 34%;">
                                                <p><a class="btn23" category_id="<?= $category['id'] ?>" style="text-decoration: none;color:#242952"><?= $category['cat_name'] ?></a></p>
                                            </span><span style="text-align: center;margin-bottom: 15px;"><i class="fas fa-video-camera"></i><br /><?= $category['videos'] ?>Videos</span><span style=" top:25%;height: 38px;margin-bottom: 10px;border-right: 1px solid grey;"></span><span style="text-align: center;margin-bottom: 15px;"><i class="fa fa-clock-o"></i><br><?= $category['hours'] ?> Hours</span><span style=" top:25%;height: 38px;margin-bottom: 10px;border-right: 1px solid grey;"></span>
                                            <span style="margin-bottom: 11px;"> <?php if ($category['id'] == 1 && null == session()->get('expiry_date')) { ?>
                                                    <img class="blink-image" src="/assets/images/unlockg.png" height="40px" width="40px">
                                                <?php } elseif (null == session()->get('expiry_date')) { ?>
                                                    <img src="/assets/images/lock.png" height="40px" width="40px">
                                                <?php }
                                                                                if (date('Y-m-d') < date('Y-m-d', strtotime(session()->get('expiry_date')))) { ?>
                                                    <img src="/assets/images/unlockg.png" height="40px" width="40px">
                                                <?php } ?></span><span style="background-image:url('/assets/images/end.png');background-size:contain;background-repeat:no-repeat;padding: 25px;line-height: 14px;color:white;margin-bottom: 17px;margin-right:-35px;height: 66px;"></span>
                                        </div>
                                    </div>
                                </li>
                                <div class="" style="border:0.5px solid #cbc4c4;margin-top: -99px;margin-left: 6px;border-radius: 5px;height: 57px;margin-right: 16px;background: white;"></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="popups" style="z-index: 50;">
                    </div>
                    <div class="col-lg-7 col-md-12  col-sm-12 content-form-right p-0 order-lg-last d-none d-lg-block mycontent" style="background-color: #f5f3f3;">
                    </div>
                </div>
            </div>
    </section>
    <!--popup -->
    <div class="modal fade bd-example-modal-lg" id="myLargeModalLabel" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <button type="button" class="close m-5" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <div class="modal-dialog modal-xl frame-content" style="height:90%">
            <div style=" pointer-events: none !important;"></div>
            <div class="modal-content" style="background-color:black;height:100%;">
                <iframe width="960" height="315" src="https://www.youtube.com/embed/CCrqvfIzOJk" title="YouTube video player" id="video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
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
</body>



<script>
    const navLinks = document.querySelectorAll('.nav-item')
    const menuToggle = document.getElementById('navbarResponsive')
    const bsCollapse = new bootstrap.Collapse(menuToggle)
    navLinks.forEach((l) => {
        l.addEventListener('click', () => {
            bsCollapse.toggle()
        })
    });


    $(document).ready(function() {
        $('.btn23').click(function() {
            var id = $(this).attr('category_id');
            $.get('/topics/myvideos/' + id, function(data) {
                $('.mycontent').html(data);
            });

        });
    });

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