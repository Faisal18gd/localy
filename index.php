<?php
    session_start();
    include "config.php";
    $status=0;
    $name='en';
    $posttime = time();
    if (isset($_POST['lang'])) {
        $name =$_POST['lang'];
        setcookie('lang',$name, $posttime + 3600);
        require_once('languages/'.$name.'.php');
        $_SESSION['lang']=$name;
        echo '<script>window.location.href = "index.php";</script>';
    }
    else if(isset($_COOKIE['lang'])){
        $name = $_COOKIE['lang'];
        require_once('languages/'.$name.'.php');
        $_SESSION['lang']=$name;
    }
else{
    ?>
    <!-- <script>
        window.onload = function() {
            document.getElementById('button').onclick = function() {
                document.getElementById('modalOverlay').style.display = 'none'
            };
        };
    </script> -->
<?php
        $name='en';
        $_SESSION['lang']=$name;
        require_once('languages/'.$name.'.php');
        $status=1;

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $lang['title']?></title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <!-- <link href="assets/img/favicon.png" rel="icon"> -->
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <style>
        #modalOverlay {
            position: fixed;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 99999;
            height: 100%;
            width: 100%;
        }
        .modalPopup {
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: #fff;
            width: 50%;
            padding: 0 0 30px;
            -webkit-box-shadow: 0 2px 10px 3px rgba(0,0,0,.2);
            -moz-box-shadow: 0 2px 10px 3px rgba(0,0,0,.2);
            box-shadow: 0 2px 10px 3px rgba(0,0,0,.2);
        }
        .modalContent {padding: 0 2em;}
        .headerBar {
            width: 100%;
            background: #edcb04 repeat-x 0 0;
            margin: 0;
            text-align: center;
        }
        .headerBar img {
            margin: 1em .7em;
        }
        h1 {
            margin-bottom: .2em;
            font-size: 26px;
            text-transform: capitalize;
        }
        p {margin: .75em 0 1.5em;}
        .buttonStyle {
            border: transparent;
            border-radius: 0;
            background: #6d6d6d;
            color: #eee !important;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            text-transform: uppercase;
            padding: 6px 25px;
            text-decoration: none;
            background: -moz-linear-gradient(top, #6d6d6d 0%, #1e1e1e 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#6d6d6d), color-stop(100%,#1e1e1e));
            background: -webkit-linear-gradient(top, #6d6d6d 0%,#1e1e1e 100%);
            background: -o-linear-gradient(top, #6d6d6d 0%,#1e1e1e 100%);
            background: -ms-linear-gradient(top, #6d6d6d 0%,#1e1e1e 100%);
            background: linear-gradient(to bottom, #6d6d6d 0%,#1e1e1e 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#6d6d6d', endColorstr='#1e1e1e',GradientType=0 );
            /*	-webkit-box-shadow: 0 2px 4px 0 #999;
                box-shadow: 0 2px 4px 0 #999; */
            -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            -ms-transition: all 1s ease;
            -o-transition: all 1s ease;
            transition: all 1s ease;
        }
        .buttonStyle:hover {
            background: #1e1e1e;
            color: #fff;
            background: -moz-linear-gradient(top, #1e1e1e 0%, #6d6d6d 100%, #6d6d6d 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#1e1e1e), color-stop(100%,#6d6d6d), color-stop(100%,#6d6d6d));
            background: -webkit-linear-gradient(top, #1e1e1e 0%,#6d6d6d 100%,#6d6d6d 100%);
            background: -o-linear-gradient(top, #1e1e1e 0%,#6d6d6d 100%,#6d6d6d 100%);
            background: -ms-linear-gradient(top, #1e1e1e 0%,#6d6d6d 100%,#6d6d6d 100%);
            background: linear-gradient(to bottom, #1e1e1e 0%,#6d6d6d 100%,#6d6d6d 100%);
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#1e1e1e', endColorstr='#6d6d6d',GradientType=0 );
        }
        .lngg{
            position:fixed;
            bottom:0;
            left: 1%;
        }
        .returnToProfile {text-align: center; margin:3em;}
        .returnToProfile a, .returnToProfile a:visited {color: #ddd;}
        .returnToProfile a:hover {color: #fff;}
    </style>
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo" style="">
            <!-- <h1><a href="index.html"><span>Daily Frame</span></a></h1> -->

            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="index.html"><img src="assets/img/log.png" alt="" class="img-fluid"></a>
        </div>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero"><?php echo $lang['Home']?></a></li>
                <li><a class="nav-link scrollto" href="#about"><?php echo $lang['About']?></a></li>
                <li><a class="nav-link scrollto" href="#features"><?php echo $lang['Features']?></a></li>
                <li><a class="nav-link scrollto" href="#gallery"><?php echo $lang['Gallery']?></a></li>
                <li><a class="nav-link scrollto" href="#faq"><?php echo $lang['FAQ']?></a></li>
                <li><a class="nav-link scrollto" href="#contact"><?php echo $lang['Contact']?></a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header>
<!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero">

    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
                <div data-aos="zoom-out" name="first">
                    <h1><?php echo $lang['first_h1']?></h1>

                    <div class="text-center text-lg-start">
                        <!-- <a href="#about" src="assets/img/appstore.png" class=""></a> -->

                        <a class="btn" href="https://www.google.com" role="button">
                            <img src="assets/img/playstore.png" width="200" />
                        </a>

                        <a class="btn" href="https://www.google.com" role="button">
                            <img src="assets/img/appstore.png" width="200" />
                        </a>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
                <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
         viewBox="0 24 150 28 " preserveAspectRatio="none">
        <defs>
            <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
        </defs>
        <g class="wave1">
            <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
        </g>
        <g class="wave2">
            <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
        </g>
        <g class="wave3">
            <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
        </g>
    </svg>

</section>
<!-- End Hero -->

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container-fluid">

            <div class="row" name="second">
                <div class="col-md-4" data-aos="fade-right">
                    <img src="assets/img/chat_start.png" class="img-fluid" alt="">
                </div>

                <div
                    class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5"
                    data-aos="fade-left">
                    <h3><?php echo $lang['second_h3'];?></h3>


                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon"><i><img id="logo_img" width="60" src="assets/PNG/Artboard_1.png"></i></div>
                        <h4 class="title"><?php echo $lang['second_h4'];?></h4>
                        <p class="description"><?php echo $lang['second_description'];?></p>
                    </div>

                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="200" name="second">
                        <div class="icon"><i><img id="logo_img" width="60" src="assets/PNG/Artboard_2.png"></i></div>
                        <h4 class="title"><?php echo $lang['second_second_h4'];?></h4>
                        <p class="description"><?php echo $lang['second_second_description'];?></p>
                    </div>

                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="300" name="third">
                        <div class="icon"><i><img id="logo_img" width="60" src="assets/PNG/Artboard_3.png"></i></div>
                        <h4 class="title"><?php echo $lang['second_third_h4'];?></h4>
                        <p class="description"><?php echo $lang['second_third_description'];?></p>
                    </div>

                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2><?php echo $lang['Features'];?></h2>
                <p><?php echo $lang['Feature_p'];?></p>
            </div>

            <div class="row" data-aos="fade-left">
                <!-- <div class="col-lg-3 col-md-4">
                  <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                    <i class="ri-store-line" style="color: #ffbb2c;"></i>
                    <h3>
                      <!-- <a href="" class="first-m">Event Management</a> -->
                <!-- <a type="button" id="myBtn" class="  first-m">Event Management</a>
                    </h3>
                  </div>
                </div> -->

                <div class="col-lg-3 col-md-4 mt-4 mt-md-0 btn open-modal" id="m2">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                        <i><img id="logo_img" width="30" src="assets/PNG/Untitled-2-10.png"></i>

                        <h3 class="mt-1"><a type="button" id="myBtn1" class="  first-m"><?php echo $lang['h3_button1'];?></a></h3>
                    </div>
                </div>


                <div class="col-lg-3 col-md-4 mt-4 mt-md-0 btn open-modal" id="m2">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                        <i><img id="logo_img" width="30" src="assets/PNG/Untitled-2-02.png"></i>
                        <!-- <h3><a href="">Fixed Event</a></h3> -->
                        <h3 class="mt-1"><a type="button" id="myBtn2" class="  first-m"><?php echo $lang['h3_button2'];?></a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4 mt-md-0 btn open-modal" id="m3">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="150">
                        <i><img id="logo_img" width="30" src="assets/PNG/Untitled-2-03.png"></i>
                        <!-- <h3><a href="">Matching Event</a></h3> -->
                        <h3 class="mt-1"><a type="button" id="myBtn3" class="  first-m"><?php echo $lang['h3_button3'];?></a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4 mt-lg-0 btn open-modal" id="m4">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                        <i><img id="logo_img" width="30" src="assets/PNG/Untitled-2-05.png"></i>
                        <!-- <h3><a href="">Quick Event</a></h3> -->
                        <h3 class="mt-1"><a type="button" id="myBtn4" class="  first-m"><?php echo $lang['h3_button4'];?></a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4 btn open-modal" id="m5">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="250">
                        <i><img id="logo_img" width="30" src="assets/PNG/Untitled-2-08.png"></i>
                        <!-- <h3><a href="">Daily Task</a></h3> -->
                        <h3 class="mt-1"><a type="button" id="myBtn5" class="  first-m"><?php echo $lang['h3_button5'];?></a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4 btn open-modal" id="m6">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                        <i><img id="logo_img" width="30" src="assets/PNG/event_managament.png"></i>
                        <!-- <h3><a href="">Personal Notes</a></h3> -->
                        <h3 class="mt-1"><a type="button" id="myBtn6" class="  first-m"><?php echo $lang['h3_button6'];?></a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4 btn open-modal" id="m7">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="350">
                        <i><img id="logo_img" width="30" src="assets/PNG/Untitled-2-01.png"></i>
                        <!-- <h3><a href="">Audio Calling</a></h3> -->
                        <h3 class="mt-1"><a type="button" id="myBtn7" class="  first-m"><?php echo $lang['h3_button7'];?></a></h3>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 mt-4 btn open-modal" id="m8">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="400">
                        <i><img id="logo_img" width="30" src="assets/PNG/Untitled-2-07.png"></i>
                        <!-- <h3><a href="">Video Calling</a></h3> -->
                        <h3 class="mt-1"><a type="button" id="myBtn8" class="first-m"><?php echo $lang['h3_button8'];?></a></h3>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Features Section -->

    <div class="section-title container" data-aos="fade-up" name="screenshots" id="gallery">
        <h2><?php echo $lang['Screenshots'];?></h2>
        <p><?php echo $lang['Screenshots_p'];?></p>
    </div>

    <!-- ======= Screenshots Section ======= -->
    <section>

        <!-- Slider main container -->
        <div class="swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->

                <div class="swiper-slide">
                    <div class="picture">
                        <img src="assets/img/ss/resize-1.jpg" alt="Slide Number 1">
                    </div>

                </div>

                <div class="swiper-slide">
                    <div class="picture">
                        <img src="assets/img/ss/resize-2.jpg" alt="Slide Number 2">
                    </div>

                </div>

                <div class="swiper-slide">
                    <div class="picture">
                        <img src="assets/img/ss/resize-4.jpg" alt="Slide Number 3">
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="picture">
                        <img src="assets/img/ss/resize-5.jpg" alt="Slide Number 4">
                    </div>

                </div>

                <div class="swiper-slide">
                    <div class="picture">
                        <img src="assets/img/ss/resize-6.jpg" alt="Slide Number 6">
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="picture">
                        <img src="assets/img/ss/resize-7.jpg" alt="Slide Number 7">
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="picture">
                        <img src="assets/img/ss/resize-12.jpg" alt="Slide Number 8">
                    </div>
                </div>


                <div class="swiper-slide">
                    <div class="picture">
                        <img src="assets/img/ss/resize-14.jpg" alt="Slide Number 8">
                    </div>
                </div>


                <div class="swiper-slide">
                    <div class="picture">
                        <img src="assets/img/ss/resize-17.jpg" alt="Slide Number 8">
                    </div>
                </div>


                <div class="swiper-slide">
                    <div class="picture">
                        <img src="assets/img/ss/resize-34.jpg" alt="Slide Number 8">
                    </div>
                </div>


                <div class="swiper-slide">
                    <div class="picture">
                        <img src="assets/img/ss/resize-3.jpg" alt="Slide Number 8">
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="picture">
                        <img src="assets/img/ss/resize-37.jpg" alt="Slide Number 8">
                    </div>
                </div>

            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <!--     <div class="swiper-button-prev"></div> -->
            <!--     <div class="swiper-button-next"></div> -->

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
        </div>

    </section><!-- End Screenshots Section -->


    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container">

            <div class="section-title" data-aos="fade-up" name="F.A.Q">
                <h2>F.A.Q</h2>
                <p><?php echo $lang['fAQ_p'];?></p>
            </div>

            <div class="faq-list">
                <ul>
                    <li data-aos="fade-up">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse"
                                                                       data-bs-target="#faq-list-1"><?php echo $lang['FAQ_1st_q'];?>  <i
                                    class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                            <p>
                                <?php echo $lang['FAQ_1st_ans'];?>
                            </p>
                        </div>
                    </li>
                    <li data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapsed"
                                                                       data-bs-target="#faq-list-2"><?php echo $lang['FAQ_2nd_q'];?>  <i
                                class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                <?php echo $lang['FAQ_2nd_ans'];?>
                            </p>
                        </div>
                    </li>

                    <li data-aos="fade-up" data-aos-delay="200">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-3"
                                                                       class="collapsed"><?php echo $lang['FAQ_3rd_q'];?> <i
                                class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list">
                            <p>
                                <?php echo $lang['FAQ_3rd_ans'];?>
                            </p>
                        </div>
                    </li>

<!--                    <li data-aos="fade-up" data-aos-delay="300">-->
<!--                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-5"-->
<!--                                                                       class="collapsed">--><?php //echo $lang['FAQ_4th_q'];?>
<!--                            <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
<!--                        <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list">-->
<!--                            <p>-->
<!--                                --><?php //echo $lang['FAQ_4th_ans'];?>
<!--                            </p>-->
<!--                        </div>-->
<!--                    </li>-->
<!--                    <li data-aos="fade-up" data-aos-delay="300">-->
<!--                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-6"-->
<!--                                                                       class="collapsed">--><?php //echo $lang['FAQ_5th_q'];?>
<!--                            <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
<!--                        <div id="faq-list-6" class="collapse" data-bs-parent=".faq-list">-->
<!--                            <p>-->
<!--                                --><?php //echo $lang['FAQ_5th_ans'];?>
<!--                            </p>-->
<!--                        </div>-->
<!--                    </li>-->
<!--                    <li data-aos="fade-up" data-aos-delay="400">-->
<!--                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-7"-->
<!--                                                                       class="collapsed">--><?php //echo $lang['FAQ_6th_q'];?>
<!--                            <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
<!--                        <div id="faq-list-7" class="collapse" data-bs-parent=".faq-list">-->
<!--                            <p>-->
<!--                                --><?php //echo $lang['FAQ_6th_ans'];?>
<!--                            </p>-->
<!--                        </div>-->
<!--                    </li>-->
<!--                    <li data-aos="fade-up" data-aos-delay="500">-->
<!--                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-8"-->
<!--                                                                       class="collapsed">--><?php //echo $lang['FAQ_7th_q'];?>
<!--                            <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
<!--                        <div id="faq-list-8" class="collapse" data-bs-parent=".faq-list">-->
<!--                            <p>-->
<!--                                --><?php //echo $lang['FAQ_7th_ans'];?>
<!--                            </p>-->
<!--                        </div>-->
<!--                    </li>-->
<!--                    <li data-aos="fade-up" data-aos-delay="600">-->
<!--                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-9"-->
<!--                                                                       class="collapsed">--><?php //echo $lang['FAQ_8th_q'];?>
<!--                            <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
<!--                        <div id="faq-list-9" class="collapse" data-bs-parent=".faq-list">-->
<!--                            <p>-->
<!--                                --><?php //echo $lang['FAQ_8th_ans'];?>
<!--                            </p>-->
<!--                        </div>-->
<!--                    </li>-->
<!--                    <li data-aos="fade-up" data-aos-delay="700">-->
<!--                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" data-bs-target="#faq-list-10"-->
<!--                                                                       class="collapsed">--><?php //echo $lang['FAQ_9th_q'];?>
<!--                            <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>-->
<!--                        <div id="faq-list-10" class="collapse" data-bs-parent=".faq-list">-->
<!--                            <p>-->
<!--                                --><?php //echo $lang['FAQ_9th_ans'];?>
<!--                            </p>-->
<!--                        </div>-->
<!--                    </li>-->
                </ul>
            </div>

        </div>
    </section><!-- End F.A.Q Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2><?php echo $lang['contact_h2'];?></h2>
                <p><?php echo $lang['Contact_p'];?></p>
            </div>

            <div class="row">

                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4><?php echo $lang['address_h4'];?>:</h4>
                            <p><?php echo $lang['address_p'];?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-envelope"></i>
                            <h4><?php echo $lang['Email'];?>:</h4>
                            <p>info@dailyframe.ch</p>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">-->

            <!--  <form action="forms/contact.php" method="post" role="form" class="php-email-form">-->
            <!--    <div class="row">-->
            <!--      <div class="col-md-6 form-group">-->
            <!--        <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>-->
            <!--      </div>-->
            <!--      <div class="col-md-6 form-group mt-3 mt-md-0">-->
            <!--        <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>-->
            <!--      </div>-->
            <!--    </div>-->
            <!--    <div class="form-group mt-3">-->
            <!--      <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>-->
            <!--    </div>-->
            <!--    <div class="form-group mt-3">-->
            <!--      <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>-->
            <!--    </div>-->
            <!--    <div class="my-3">-->
            <!--      <div class="loading">Loading</div>-->
            <!--      <div class="error-message"></div>-->
            <!--      <div class="sent-message">Your message has been sent. Thank you!</div>-->
            <!--    </div>-->
            <!--    <div class="text-center"><button type="submit">Send Message</button></div>-->
            <!--  </form>-->

            <!--</div>-->





        </div>

        </div>
    </section><!-- End Contact Section -->



    <!-- <div id="modal" class="modal open">
      <div class="modal-container">
        <div class="modal-content">
          <img
            src="https://images.unsplash.com/photo-1550745165-9bc0b252726f?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80">
          <h2>Old Technology</h2>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore
            magna Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae voluptas porro consequuntur. Velit harum
            provident iste officia, ut doloremque eum ipsa eligendi quasi, sunt dolorum labore voluptate quidem est
            saepe.
            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.
          </p>
          <a href="#!">learn more</a>
        </div>
        <span id="close-modal" class="close-modal">&times;</span>
      </div>
    </div> -->
    <!-- Modal HTML -->

    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close" style="text-align: right;">&times;</span>
            <div class="modal-content">
                <img class="mx-auto d-block"
                    src="assets/PNG/Untitled-2-10.png"
                    style="height: 200px;width:200px">
                <h2 style="margin-top: 5px;"><?php echo $lang['h3_button1'];?></h2>
                <p>
                    <?php echo $lang['h3_button_desc'];?>
                </p>
<!--                <a href="#!">learn more</a>-->
            </div>
        </div>
    </div>
    <div id="myModal1" class="modal">
        <div class="modal-content">
            <span class="close close1" style="text-align: right;">&times;</span>
            <div class="modal-content">
                <img class="mx-auto d-block"
                     src="assets/PNG/Untitled-2-02.png"
                     style="height: 200px;width:200px">
                <h2 style="margin-top: 5px;"><?php echo $lang['h3_button2'];?></h2>
                <p>
                    <?php echo $lang['h3_button2_desc'];?>
                </p>
                <!--                <a href="#!">learn more</a>-->
            </div>
        </div>
    </div>
    <div id="myModal2" class="modal">
        <div class="modal-content">
            <span class="close close2" style="text-align: right;">&times;</span>
            <div class="modal-content">
                <img class="mx-auto d-block"
                     src="assets/PNG/Untitled-2-03.png"
                     style="height: 200px;width:200px">
                <h2 style="margin-top: 5px;"><?php echo $lang['h3_button3'];?></h2>
                <p>
                    <?php echo $lang['h3_button3_desc'];?>
                </p>
                <!--                <a href="#!">learn more</a>-->
            </div>
        </div>
    </div>
    <div id="myModal3" class="modal">
        <div class="modal-content">
            <span class="close close3" style="text-align: right;">&times;</span>
            <div class="modal-content">
                <img class="mx-auto d-block"
                     src="assets/PNG/Untitled-2-05.png"
                     style="height: 200px;width:200px">
                <h2 style="margin-top: 5px;"><?php echo $lang['h3_button4'];?></h2>
                <p>
                    <?php echo $lang['h3_button4_desc'];?>
                </p>
                <!--                <a href="#!">learn more</a>-->
            </div>
        </div>
    </div>
    <div id="myModal4" class="modal">
        <div class="modal-content">
            <span class="close close4" style="text-align: right;">&times;</span>
            <div class="modal-content">
                <img class="mx-auto d-block"
                     src="assets/PNG/Untitled-2-08.png"
                     style="height: 200px;width:200px">
                <h2 style="margin-top: 5px;"><?php echo $lang['h3_button5'];?></h2>
                <p>
                    <?php echo $lang['h3_button5_desc'];?>
                </p>
                <!--                <a href="#!">learn more</a>-->
            </div>
        </div>
    </div>
    <div id="myModal5" class="modal">
        <div class="modal-content">
            <span class="close close5" style="text-align: right;">&times;</span>
            <div class="modal-content">
                <img class="mx-auto d-block"
                     src="assets/PNG/event_managament.png"
                     style="height: 200px;width:200px">
                <h2 style="margin-top: 5px;"><?php echo $lang['h3_button6'];?></h2>
                <p>
                    <?php echo $lang['h3_button6_desc'];?>
                </p>
                <!--                <a href="#!">learn more</a>-->
            </div>
        </div>
    </div>
    <div id="myModal6" class="modal">
        <div class="modal-content">
            <span class="close close6" style="text-align: right;">&times;</span>
            <div class="modal-content">
                <img class="mx-auto d-block"
                     src="assets/PNG/Untitled-2-01.png"
                     style="height: 200px;width:200px">
                <h2 style="margin-top: 5px;"><?php echo $lang['h3_button7'];?></h2>
                <p>
                    <?php echo $lang['h3_button7_desc'];?>
                </p>
                <!--                <a href="#!">learn more</a>-->
            </div>
        </div>
    </div>
    <div id="myModal7" class="modal">
        <div class="modal-content">
            <span class="close close7" style="text-align: right;">&times;</span>
            <div class="modal-content">
                <img class="mx-auto d-block"
                     src="assets/PNG/Untitled-2-07.png"
                     style="height: 200px;width:200px">
                <h2 style="margin-top: 5px;"><?php echo $lang['h3_button8'];?></h2>
                <p>
                    <?php echo $lang['h3_button8_desc'];?>
                </p>
                <!--                <a href="#!">learn more</a>-->
            </div>
        </div>
    </div>
    <div id="myModal8" class="modal">
        <div class="modal-content">
            <span class="close close8" style="text-align: right;">&times;</span>
            <div class="modal-content">
                <img class="mx-auto d-block"
                     src="assets/PNG/Untitled-2-06.png"
                     style="height: 200px;width:200px">
                <h2 style="margin-top: 5px;"><?php echo $lang['h3_button9'];?></h2>
                <p>
                    <?php echo $lang['h3_button9_desc'];?>
                </p>
                <!--                <a href="#!">learn more</a>-->
            </div>
        </div>
    </div>
    <div id="myModal9" class="modal">
        <div class="modal-content">
            <span class="close close9" style="text-align: right;">&times;</span>
            <div class="modal-content">
                <img class="mx-auto d-block"
                     src="assets/PNG/Untitled-2-09.png"
                     style="height: 200px;width:200px">
                <h2 style="margin-top: 5px;"><?php echo $lang['h3_button10'];?></h2>
                <p>
                    <?php echo $lang['h3_button10_desc'];?>
                </p>
                <!--                <a href="#!">learn more</a>-->
            </div>
        </div>
    </div>
    <div id="myModal10" class="modal">
        <div class="modal-content">
            <span class="close close10" style="text-align: right;">&times;</span>
            <div class="modal-content">
                <img class="mx-auto d-block"
                     src="assets/PNG/Untitled-2-11.png"
                     style="height: 200px;width:200px">
                <h2 style="margin-top: 5px;"><?php echo $lang['h3_button11'];?></h2>
                <p>
                    <?php echo $lang['h3_button11_desc'];?>
                </p>
                <!--                <a href="#!">learn more</a>-->
            </div>
        </div>
    </div>
    <div id="myModal11" class="modal">
        <div class="modal-content">
            <span class="close close11" style="text-align: right;">&times;</span>
            <div class="modal-content">
                <img class="mx-auto d-block"
                     src="assets/PNG/Untitled-2-12.png"
                     style="height: 200px;width:200px">
                <h2 style="margin-top: 5px;"><?php echo $lang['h3_button12'];?></h2>
                <p>
                    <?php echo $lang['h3_button12_desc'];?>
                </p>
                <!--                <a href="#!">learn more</a>-->
            </div>
        </div>
    </div>
</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 col-md-6">
                    <div class="footer-info">
                        <h3><?php echo $lang['footer_h3'];?></h3>
                        <p>
                            <strong><?php echo $lang['address'];?>:</strong> <?php echo $lang['address_p'];?><br>
                            <strong><?php echo $lang['Email'];?>:</strong> info@companion.com<br>
                        </p>
                        <div class="social-links mt-3">
                            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                            <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                            <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container" name="termAndcondition">
        <div class="credits">
            <a href="https://growmoredevs.com/"> <span style= "font-weight: bold"><?php echo $lang['termAndCondition'];?></span> </a>
        </div>
        <div class="copyright">
            &copy; <?php echo $lang['copyright'];?> <strong><span> <?php echo $lang['copyright_span'];?></span></strong>. <?php echo $lang['reserved'];?>
        </div>
        <div class="credits">
            <?php echo $lang['credits'];?> <a href="https://growmoredevs.com/"> <span><?php echo $lang['credits_span'];?></span> </a>
        </div>
        <!-- <button type="button" class=" d-flex align-items-center justify-content-center" style="float: right"  data-toggle="modal" data-target="#modalPoll-1">Change Language</button> -->
    </div>

</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>
<!--<div class="lngg"> -->
<!--    <form name="myform" action="" method="post">-->
<!--        <select  name="lang" class="selectpicker" data-width="fit" onchange="this.form.submit()">-->
<!--            <option value="en"   data-content='<span class="flag-icon flag-icon-gb"></span> English'--><?php //if($name=="en") echo 'selected="selected"'; ?><!-->English</option>-->
<!--            <option value="gr"  data-content='<span class="flag-icon flag-icon-de"></span> Deutsch'--><?php //if($name=="gr") echo 'selected="selected"'; ?><!-->German</option>-->
<!--        </select>-->
<!--    </form>-->
<!--</div>-->
<!--<div class="modal fade right" id="modalPoll-1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"-->
<!--     aria-hidden="true" data-backdrop="false">-->
<!--    <div class="modal-dialog modal-full-height modal-right modal-notify modal-info" role="document">-->
<!--        <div class="modal-content">-->
            <!--Header-->
<!--            <div class="modal-header">-->
<!--                <p class="heading lead">Language-->
<!--                </p>-->
<!---->
<!--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                    <span aria-hidden="true" class="white-text">×</span>-->
<!--                </button>-->
<!--            </div>-->
<!---->
           <!--Body-->
<!--            <form id="contactForm" name="contact" role="form">-->
<!--                <div class="modal-body">-->
<!--                    <div class="text-center">-->
<!--                        <i class="far fa-file-alt fa-4x mb-3 animated rotateIn"></i>-->
<!--                        <p>Do You Want To Change Your Language?-->
<!--                        </p>-->
<!--                    </div>-->
<!---->
                   <!-- Radio -->
<!--                    <div class="form-check mb-4">-->
<!--                        <input class="form-check-input" name="lang" type="radio" id="radio-179" value="en" --><?php //echo ($name== 'en') ?  "checked" : "" ;  ?><!-- checked>-->
<!--                        <label class="form-check-label" for="radio-179">English</label>-->
<!--                    </div>-->
<!---->
<!--                    <div class="form-check mb-4">-->
<!--                        <input class="form-check-input" name="lang" type="radio" id="radio-279" value="gr" --><?php //echo ($name== 'gr') ?  "checked" : "" ;  ?><!-->
<!--                        <label class="form-check-label" for="radio-279">German</label>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
              <!--Footer-->
<!--                <div class="modal-footer justify-content-center">-->
<!--                     <a type="button" id="submit" class="btn btn-primary btn-lg waves-effect waves-light p-2" style="color:white;">Save-->
<!--                                         <i class="fa fa-paper-plane ml-1"></i>-->
<!--                                       </a>-->
<!--                    <input type="submit" class="btn btn-primary btn-lg waves-effect waves-light p-2"  id="submit">-->
<!--                </div>-->
<!--            </form>-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--</div>-->

<?php
if($status==1){ ?>
    <!-- <div id="modalOverlay">
        <div class="modalPopup">
            <div class="modalContent">
                <form action="" method="POST">
                    <div class="modal-body"> -->
                        <!-- <div class="text-center">
                            <i class="far fa-file-alt fa-4x mb-3 animated rotateIn"></i>
                            <p>Please Select Your Language?
                            </p>
                        </div> -->
                        <!-- Radio -->
                        <!-- <div class="form-check mb-4">
                            <input class="form-check-input" name="lang" type="radio" id="radio-179" value="en" <?php echo ($name== 'en') ?  "checked" : "" ;  ?> checked>
                            <label class="form-check-label" for="radio-179">English</label>
                        </div> -->

                        <!-- <div class="form-check mb-4">
                            <input class="form-check-input" name="lang" type="radio" id="radio-279" value="gr" <?php echo ($name== 'gr') ?  "checked" : "" ;  ?>>
                            <label class="form-check-label" for="radio-279">German</label>
                        </div> -->
                    <!-- </div> -->
                    <!--Footer-->
                    <!-- <div class="modal-footer justify-content-center">
                        <input type="submit" class="btn btn-primary btn-lg waves-effect waves-light p-2" name="submit"  id="submit">
                    </div> -->
                <!-- </form>
            </div>
        </div>
    </div> -->
<?php }
?>

<!-- Modal: modalPoll -->

<!-- Modal: modalPoll -->
<!-- Vendor JS Files -->
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="assets/vendor/purecounter/purecounter.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
<script>

    var swiper = new Swiper(".swiper-container", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,

        loop: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 20,
            stretch: 0,
            depth: 350,
            modifier: 1,
            slideShadows: true
        },
        pagination: {
            el: ".swiper-pagination"
        }, paginationClickable: true
    });



    // Modal Code 1
    // const btnOpenModal = document.getElementById("open-modal");
    // const btnCloseModal = document.getElementById("close-modal");
    // const modalElm = document.getElementById("modal");
    // modalElm.classList.remove("open");
    // btnOpenModal.addEventListener("click", function () {
    //   modalElm.classList.add("open");
    // });

    // btnCloseModal.addEventListener("click", function () {
    //   modalElm.classList.remove("open");
    // });




</script>
<!--<script>-->
<!---->
<!--    var modal = document.getElementById("myModal");-->
<!--    var modal1 = document.getElementById("myModal1");-->
<!--    var modal2 = document.getElementById("myModal2");-->
<!--    var modal3 = document.getElementById("myModal3");-->
<!--    var modal4 = document.getElementById("myModal4");-->
<!--    var modal5 = document.getElementById("myModal5");-->
<!--    var modal6 = document.getElementById("myModal6");-->
<!--    var modal7 = document.getElementById("myModal7");-->
<!--    var modal8 = document.getElementById("myModal8");-->
<!--    var modal9 = document.getElementById("myModal9");-->
<!--    var modal10 = document.getElementById("myModal10");-->
<!--    var modal11 = document.getElementById("myModal11");-->
<!---->
<!---->
<!---->
<!--    var btn1 = document.getElementById("myBtn1");-->
<!--    var btn2 = document.getElementById("myBtn2");-->
<!--    var btn3 = document.getElementById("myBtn3");-->
<!--    var btn4 = document.getElementById("myBtn4");-->
<!--    var btn5 = document.getElementById("myBtn5");-->
<!--    var btn6 = document.getElementById("myBtn6");-->
<!--    var btn7 = document.getElementById("myBtn7");-->
<!--    var btn8 = document.getElementById("myBtn8");-->
<!--    var btn9 = document.getElementById("myBtn9");-->
<!--    var btn10 = document.getElementById("myBtn10");-->
<!--    var btn11 = document.getElementById("myBtn11");-->
<!--    var btn12 = document.getElementById("myBtn12");-->
<!--    var span = document.getElementsByClassName("close")[0];-->
<!--    var span1 = document.getElementsByClassName("close1")[0];-->
<!--    var span2 = document.getElementsByClassName("close2")[0];-->
<!--    var span3 = document.getElementsByClassName("close3")[0];-->
<!--    var span4 = document.getElementsByClassName("close4")[0];-->
<!--    var span5 = document.getElementsByClassName("close5")[0];-->
<!--    var span6 = document.getElementsByClassName("close6")[0];-->
<!--    var span7 = document.getElementsByClassName("close7")[0];-->
<!--    var span8 = document.getElementsByClassName("close8")[0];-->
<!--    var span9 = document.getElementsByClassName("close9")[0];-->
<!--    var span10 = document.getElementsByClassName("close10")[0];-->
<!--    var span11 = document.getElementsByClassName("close11")[0];-->
<!--    var span12 = document.getElementsByClassName("close12")[0];-->
<!--    btn1.onclick = function () {-->
<!--        modal.style.display = "block";-->
<!--    }-->
<!---->
<!--    btn2.onclick = function () {-->
<!--        modal1.style.display = "block";-->
<!--    }-->
<!---->
<!--    btn3.onclick = function () {-->
<!--        modal2.style.display = "block";-->
<!--    }-->
<!---->
<!--    btn4.onclick = function () {-->
<!--        modal3.style.display = "block";-->
<!--    }-->
<!---->
<!--    btn5.onclick = function () {-->
<!--        modal4.style.display = "block";-->
<!--    }-->
<!---->
<!--    btn6.onclick = function () {-->
<!--        modal5.style.display = "block";-->
<!--    }-->
<!---->
<!--    btn7.onclick = function () {-->
<!--        modal6.style.display = "block";-->
<!--    }-->
<!---->
<!--    btn8.onclick = function () {-->
<!--        modal7.style.display = "block";-->
<!--    }-->
<!---->
<!--    btn9.onclick = function () {-->
<!--        modal8.style.display = "block";-->
<!--    }-->
<!---->
<!--    btn10.onclick = function () {-->
<!--        modal9.style.display = "block";-->
<!--    }-->
<!---->
<!--    btn11.onclick = function () {-->
<!--        modal10.style.display = "block";-->
<!--    }-->
<!---->
<!--    btn12.onclick = function () {-->
<!--        modal11.style.display = "block";-->
<!--    }-->
<!---->
<!---->
<!--    span.onclick = function () {-->
<!--        modal.style.display = "none";-->
<!--    }-->
<!--    span1.onclick = function () {-->
<!--        modal1.style.display = "none";-->
<!--    }-->
<!--    span2.onclick = function () {-->
<!--        modal2.style.display = "none";-->
<!--    }-->
<!--    span3.onclick = function () {-->
<!--        modal3.style.display = "none";-->
<!--    }-->
<!--    span4.onclick = function () {-->
<!--        modal4.style.display = "none";-->
<!--    }-->
<!--    span5.onclick = function () {-->
<!--        modal5.style.display = "none";-->
<!--    }-->
<!--    span6.onclick = function () {-->
<!--        modal6.style.display = "none";-->
<!--    }-->
<!--    span7.onclick = function () {-->
<!--        modal7.style.display = "none";-->
<!--    }-->
<!--    span8.onclick = function () {-->
<!--        modal8.style.display = "none";-->
<!--    }-->
<!--    span9.onclick = function () {-->
<!--        modal9.style.display = "none";-->
<!--    }-->
<!--    span10.onclick = function () {-->
<!--        modal10.style.display = "none";-->
<!--    }-->
<!--    span11.onclick = function () {-->
<!--        modal11.style.display = "none";-->
<!--    }-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--    window.onclick = function (event) {-->
<!--        if (event.target == modal) {-->
<!--            modal.style.display = "none";-->
<!--        }-->
<!--    }-->
<!--    window.onclick = function (event) {-->
<!--        if (event.target == modal1) {-->
<!--            modal.style.display = "none";-->
<!--        }-->
<!--    }-->
<!--    window.onclick = function (event) {-->
<!--        if (event.target == modal2) {-->
<!--            modal.style.display = "none";-->
<!--        }-->
<!--    }-->
<!--    window.onclick = function (event) {-->
<!--        if (event.target == modal3) {-->
<!--            modal.style.display = "none";-->
<!--        }-->
<!--    }-->
<!--    window.onclick = function (event) {-->
<!--        if (event.target == modal4) {-->
<!--            modal.style.display = "none";-->
<!--        }-->
<!--    }-->
<!--    window.onclick = function (event) {-->
<!--        if (event.target == modal5) {-->
<!--            modal.style.display = "none";-->
<!--        }-->
<!--    }-->
<!--    window.onclick = function (event) {-->
<!--        if (event.target == modal6) {-->
<!--            modal.style.display = "none";-->
<!--        }-->
<!--    }-->
<!--    window.onclick = function (event) {-->
<!--        if (event.target == modal7) {-->
<!--            modal.style.display = "none";-->
<!--        }-->
<!--    }-->
<!--    window.onclick = function (event) {-->
<!--        if (event.target == modal8) {-->
<!--            modal.style.display = "none";-->
<!--        }-->
<!--    }-->
<!--    window.onclick = function (event) {-->
<!--        if (event.target == modal9) {-->
<!--            modal.style.display = "none";-->
<!--        }-->
<!--    }-->
<!--    window.onclick = function (event) {-->
<!--        if (event.target == modal10) {-->
<!--            modal.style.display = "none";-->
<!--        }-->
<!--    }-->
<!--    window.onclick = function (event) {-->
<!--        if (event.target == modal11) {-->
<!--            modal.style.display = "none";-->
<!--        }-->
<!--    }-->
<!--</script>-->
<script>
    $(document).ready(function(){
        $("#contactForm").submit(function(event){
            submitForm();
            return false;
        });
    });
</script>
<script>
    function submitForm(){
        $.ajax({
            type: "POST",
            url: "index.php",
            cache:false,
            data: $('form#contactForm').serialize(),
            success: function(response){
                $("#contact").html(response)
                $("#contact-modal").modal('hide');
            },
            error: function(){
                alert("Error");
            }
        });
    }
</script>

<script>
    $(document).ready(function(){
        $("#contactForm1").submit(function(event){
            submitForm1();
            return false;
        });
    });
</script>
<script>
    function submitForm1(){
        $.ajax({
            type: "POST",
            url: "index.php",
            cache:false,
            data: $('form#contactForm1').serialize(),
            success: function(response){
                $("#contact1").html(response)
                $("#contact-modal").modal('hide');
            },
            error: function(){
                alert("Error");
            }
        });
    }
</script>
<script>
    $(function(){
        $('.selectpicker').selectpicker();
    });    
    </script>
</body>

</html>
