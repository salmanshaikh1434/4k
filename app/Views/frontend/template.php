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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
        }

        p {
            font-size: 16px;
        }
    </style>
</head>

<header id="site-header" class="fixed-top">
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .videoWrapper {
            height: 610px;
            overflow: hidden;
        }

        iframe {
            margin-top: -65px;
        }
    </style>
    <script>
        const navLinks = document.querySelectorAll('.nav-item')
        const menuToggle = document.getElementById('navbarResponsive')
        const bsCollapse = new bootstrap.Collapse(menuToggle)
        navLinks.forEach((l) => {
            l.addEventListener('click', () => {
                bsCollapse.toggle()
            })
        })
    </script>
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
    <?= $page ?>
</body>

<!-- footer -->
<footer class="w3l-footer">
    <div class="shape-footer">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 280">
            <path fill-opacity="1">
                <animate attributeName="d" dur="20000ms" repeatCount="indefinite" values="M0,160L48,181.3C96,203,192,245,288,261.3C384,277,480,267,576,234.7C672,203,768,149,864,117.3C960,85,1056,75,1152,90.7C1248,107,1344,149,1392,170.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z; M0,160L48,181.3C96,203,192,245,288,234.7C384,224,480,160,576,133.3C672,107,768,117,864,138.7C960,160,1056,192,1152,197.3C1248,203,1344,181,1392,170.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z;												 M0,64L48,74.7C96,85,192,107,288,133.3C384,160,480,192,576,170.7C672,149,768,75,864,80C960,85,1056,171,1152,181.3C1248,192,1344,128,1392,96L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z;
                                             M0,160L48,181.3C96,203,192,245,288,261.3C384,277,480,267,576,234.7C672,203,768,149,864,117.3C960,85,1056,75,1152,90.7C1248,107,1344,149,1392,170.7L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z;" />

            </path>
        </svg>
    </div>
    <div class="w3l-footer-16 py-5">
        <div class="container">
            <div class="row footer-p">
                <div class="col-lg-4 pe-lg-5">
                    <h3>Address:</h3>
                    <p class="mt-3">18-12-222 lane no 4 Qaisar colony, behind junior Zakir Hussain school, Aurangabad (MS) 410013, India.</p>
                    <p class="mt-3">Mobile : +91 8767578712 Opens in your application.</p>
                    <p class="mt-3">Email : info@english4000hours.com</p>
                    <div class="columns-2 mt-4 pt-1">

                        <ul class="social">
                            <li><a href="<?= $social['facebook']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li><a href="<?= $social['twitter']; ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                            </li>
                            <li><a href="<?= $social['youtube']; ?>" target="_blank"><i class="fab fa-youtube"></i></a>
                            </li>
                            <li><a href="<?= $social['google']; ?>" target="_blank"><i class="fab fa-instagram "></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-5 mt-lg-0 mt-5">
                    <div class="row">
                        <div class="col-xl-5 col-6 column">
                            <h3>Quick Link</h3>
                            <ul class="footer-gd-16">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="#index">Our Index </a></li>
                                <li><a href="#membership">Membership</a></li>
                                <li><a href="#contact">Contact us</a></li>
                            </ul>
                        </div>
                        <div class="col-xl-5 col-6 column">
                            <h3>Quick Link</h3>
                            <ul class="footer-gd-16">
                                <li><a href="privacy_policy">Privacy Policy</a></li>
                                <li><a href="terms_condition">Terms and Conditions </a></li>
                                <li><a href="refund">Refunds and Returns</a></li>
                                <li><a href="notes">Notes for the members</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-7 col-sm-8 column mt-lg-0 mt-4 pl-xl-0">
                    <h3>Newsletter </h3>
                    <div class="end-column">

                        <form action="" class="subscribe" method="post">
                            <input type="email" name="subscribe" placeholder="Email Address" maxlength="100" required="">
                            <button name="subscribesim"><span class="fa fa-paper-plane" aria-hidden="true"></span></button>
                        </form>
                        <p class="mt-4">Subscribe to our mailing list and get updates to your email inbox.</p>
                    </div>
                </div>
            </div>
            <!-- <div class="below-section text-center pt-lg-4 mt-5">
                <p style="color: #fff;"> All rights reserved to <a href="index.php" style="color: #fd746c;"></a>

                    <br>programmed by <br><a href="https://eg-script.website/" target="_blank" style="font-weight: bold;font-size: 11px;color: #fd746c;"> EG-script.website</a>
                </p>

            </div> -->
        </div>
    </div>
</footer>




<!-- Js scripts -->
<!-- move top -->
<button onclick="topFunction()" id="movetop" title="Go to top">
    <span class="fas fa-level-up-alt" aria-hidden="true"></span>
</button>
<script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("movetop").style.display = "block";
        } else {
            document.getElementById("movetop").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<!-- //move top -->

<!-- common jquery plugin -->
<script src="/assets/js/jquery-3.3.1.min.js"></script>
<!-- //common jquery plugin -->

<!-- /counter-->
<script src="/assets/js/counter.js"></script>
<!-- //counter-->

<!-- testimonial script -->
<script>
    $(document).ready(function() {

        $('.client-single').on('click', function(event) {
            event.preventDefault();

            var active = $(this).hasClass('active');

            var parent = $(this).parents('.testi-wrap');

            if (!active) {
                var activeBlock = parent.find('.client-single.active');

                var currentPos = $(this).attr('data-position');

                var newPos = activeBlock.attr('data-position');

                activeBlock.removeClass('active').removeClass(newPos).addClass('inactive').addClass(
                    currentPos);
                activeBlock.attr('data-position', currentPos);

                $(this).addClass('active').removeClass('inactive').removeClass(currentPos).addClass(
                    newPos);
                $(this).attr('data-position', newPos);

            }
        });

    }(jQuery));
</script>
<!-- //testimonial script -->

<!-- magnific popup -->
<script src="/assets/js/jquery.magnific-popup.min.js"></script>
<script>
    $(document).ready(function() {
        $('.popup-with-zoom-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
        });

        $('.popup-with-move-anim').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,

            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-slide-bottom'
        });
    });
</script>
<!-- //magnific popup -->

<!-- theme switch js (light and dark)-->
<script src="/assets/js/theme-change.js"></script>
<!-- //theme switch js (light and dark)-->

<!-- MENU-JS -->
<script>
    $(window).on("scroll", function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 80) {
            $("#site-header").addClass("nav-fixed");
        } else {
            $("#site-header").removeClass("nav-fixed");
        }
    });

    //Main navigation Active Class Add Remove
    $(".navbar-toggler").on("click", function() {
        $("header").toggleClass("active");
    });
    $(document).on("ready", function() {
        if ($(window).width() > 991) {
            $("header").removeClass("active");
        }
        $(window).on("resize", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
        });
    });
</script>
<!-- //MENU-JS -->

<!-- disable body scroll which navbar is in active -->
<script>
    $(function() {
        $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            }),

            $('.nav-item').click(function() {
                $('#navbarResponsive').removeClass('show');
            })

    });
</script>
<!-- //disable body scroll which navbar is in active -->

<!-- bootstrap -->
<script src="/assets/js/bootstrap.min.js"></script>
<!-- //bootstrap -->
<!-- //Js scripts -->


<script>
    var TxtRotate = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 8) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtRotate.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 5);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 3);
        }

        this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

        var that = this;
        var delta = 300 - Math.random() * 100;

        if (this.isDeleting) {
            delta /= 2;
        }

        if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
        }

        setTimeout(function() {
            that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('txt-rotate');
        for (var i = 0; i < elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-rotate');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
                new TxtRotate(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".txt-rotate > .wrap { border-right: 0.08em solid #666; }";
        document.body.appendChild(css);
    };
</script>


<script>
    $(document).ready(function() {

        var scrollLink = $('.scroll');

        // Smooth scrolling
        scrollLink.click(function(e) {
            e.preventDefault();
            $('body,html').animate({
                scrollTop: $(this.hash).offset().top
            }, 1000);
        });

        // Active link switching
        $(window).scroll(function() {
            var scrollbarLocation = $(this).scrollTop();

            scrollLink.each(function() {

                var sectionOffset = $(this.hash).offset().top - 20;

                if (sectionOffset <= scrollbarLocation) {
                    $(this).parent().addClass('active');
                    $(this).parent().siblings().removeClass('active');
                }
            })

        })

    })
</script>

</html>