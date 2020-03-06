<?php

    # Global Vars

    # HTTP / HTTPS ?
    if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === 'off') {
        $protocol = 'http://';
    } else {
        $protocol = 'https://';
    }

    # global URL des main directory
    $global_url_dir = $protocol . $_SERVER["SERVER_NAME"] ."/". explode("/", $_SERVER['REQUEST_URI'])[1];

    # global URL of controller file (".../index.php")
    $global_url_ctrl = $global_url_dir . "/" . end(explode("/", $_SERVER['PHP_SELF']));    



    # get page folders for navigation
    $folders = scandir("./pages");

    

    # Include Page

    # extract subdirs
    $url = explode("/", $_SERVER['REQUEST_URI']);

    # remove first element, if empty
    if( $url[0] == "" ){
        array_shift($url);
    }

    # remove base dir
    array_shift($url);

    $include_str = "";
    $breadcrumbs = "";
    
    # build up filename and breadcrumbs
    $i = 0;
    $current_folder = "";
    $current_file = "";

    foreach( $url as $slug ){
        if( $slug == "" ){
            continue;
        }
        if( $i == 0 ){
            $current_folder = $slug;
        }
        if( $i == 1 ){
            $current_file = $slug;
        }
        $i++;
        $include_str .= $slug . "/";
        $breadcrumbs .= ucfirst($slug) . " &rsaquo; ";
    }

    $page_title = end($url);
    $breadcrumbs = rtrim($breadcrumbs, "&rsaquo; ");

    if( $include_str != "" ){
        # finish filename
        $include_str = rtrim($include_str, "/") . ".php";
    } else {
        # redirect to home, if empty
        $include_str = "frontpage.php"; // Admin Home Page
        $page_title = "Dashboard";
    }
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard One | Notika - Notika Admin Template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $global_url_dir; ?>/assets/img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $global_url_dir; ?>/assets/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $global_url_dir; ?>/assets/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $global_url_dir; ?>/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo $global_url_dir; ?>/assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?php echo $global_url_dir; ?>/assets/css/owl.transitions.css">
    <!-- meanmenu CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $global_url_dir; ?>/assets/css/meanmenu/meanmenu.min.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $global_url_dir; ?>/assets/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $global_url_dir; ?>/assets/css/normalize.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $global_url_dir; ?>/assets/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- jvectormap CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $global_url_dir; ?>/assets/css/jvectormap/jquery-jvectormap-2.0.3.css">
    <!-- notika icon CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $global_url_dir; ?>/assets/css/notika-custom-icon.css">
    <!-- wave CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $global_url_dir; ?>/assets/css/wave/waves.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $global_url_dir; ?>/assets/css/main.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $global_url_dir; ?>/assets/css/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo $global_url_dir; ?>/assets/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Start Header Top Area -->
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="logo-area">
                        <a href="<?php echo $global_url_dir; ?>"><img src="<?php echo $global_url_dir; ?>/assets/img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="header-top-menu">
                        <ul class="nav navbar-nav notika-top-nav">
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-search"></i></span></a>
                                <div role="menu" class="dropdown-menu search-dd animated flipInX">
                                    <div class="search-input">
                                        <i class="notika-icon notika-left-arrow"></i>
                                        <input type="text" />
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-mail"></i></span></a>
                                <div role="menu" class="dropdown-menu message-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Messages</h2>
                                    </div>
                                    <div class="hd-message-info">
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="<?php echo $global_url_dir; ?>/assets/img/post/1.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="<?php echo $global_url_dir; ?>/assets/img/post/2.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Jonathan Morris</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="<?php echo $global_url_dir; ?>/assets/img/post/4.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Fredric Mitchell</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="<?php echo $global_url_dir; ?>/assets/img/post/1.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="<?php echo $global_url_dir; ?>/assets/img/post/2.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Glenn Jecobs</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item nc-al"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-alarm"></i></span><div class="spinner4 spinner-4"></div><div class="ntd-ctn"><span>3</span></div></a>
                                <div role="menu" class="dropdown-menu message-dd notification-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Notification</h2>
                                    </div>
                                    <div class="hd-message-info">
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="<?php echo $global_url_dir; ?>/assets/img/post/1.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="<?php echo $global_url_dir; ?>/assets/img/post/2.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Jonathan Morris</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="<?php echo $global_url_dir; ?>/assets/img/post/4.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Fredric Mitchell</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="<?php echo $global_url_dir; ?>/assets/img/post/1.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img">
                                                    <img src="<?php echo $global_url_dir; ?>/assets/img/post/2.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Glenn Jecobs</h3>
                                                    <p>Cum sociis natoque penatibus et magnis dis parturient montes</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-menus"></i></span><div class="spinner4 spinner-4"></div><div class="ntd-ctn"><span>2</span></div></a>
                                <div role="menu" class="dropdown-menu message-dd task-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Tasks</h2>
                                    </div>
                                    <div class="hd-message-info hd-task-info">
                                        <div class="skill">
                                            <div class="progress">
                                                <div class="lead-content">
                                                    <p>HTML5 Validation Report</p>
                                                </div>
                                                <div class="progress-bar wow fadeInLeft" data-progress="95%" style="width: 95%;" data-wow-duration="1.5s" data-wow-delay="1.2s"> <span>95%</span>
                                                </div>
                                            </div>
                                            <div class="progress">
                                                <div class="lead-content">
                                                    <p>Google Chrome Extension</p>
                                                </div>
                                                <div class="progress-bar wow fadeInLeft" data-progress="85%" style="width: 85%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>85%</span> </div>
                                            </div>
                                            <div class="progress">
                                                <div class="lead-content">
                                                    <p>Social Internet Projects</p>
                                                </div>
                                                <div class="progress-bar wow fadeInLeft" data-progress="75%" style="width: 75%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>75%</span> </div>
                                            </div>
                                            <div class="progress">
                                                <div class="lead-content">
                                                    <p>Bootstrap Admin</p>
                                                </div>
                                                <div class="progress-bar wow fadeInLeft" data-progress="93%" style="width: 65%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>65%</span> </div>
                                            </div>
                                            <div class="progress progress-bt">
                                                <div class="lead-content">
                                                    <p>Youtube App</p>
                                                </div>
                                                <div class="progress-bar wow fadeInLeft" data-progress="55%" style="width: 55%;" data-wow-duration="1.5s" data-wow-delay="1.2s"><span>55%</span> </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><span><i class="notika-icon notika-chat"></i></span></a>
                                <div role="menu" class="dropdown-menu message-dd chat-dd animated zoomIn">
                                    <div class="hd-mg-tt">
                                        <h2>Chat</h2>
                                    </div>
                                    <div class="search-people">
                                        <i class="notika-icon notika-left-arrow"></i>
                                        <input type="text" placeholder="Search People" />
                                    </div>
                                    <div class="hd-message-info">
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="<?php echo $global_url_dir; ?>/assets/img/post/1.jpg" alt="" />
                                                    <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Available</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="<?php echo $global_url_dir; ?>/assets/img/post/2.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Jonathan Morris</h3>
                                                    <p>Last seen 3 hours ago</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="<?php echo $global_url_dir; ?>/assets/img/post/4.jpg" alt="" />
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Fredric Mitchell</h3>
                                                    <p>Last seen 2 minutes ago</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="<?php echo $global_url_dir; ?>/assets/img/post/1.jpg" alt="" />
                                                    <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>David Belle</h3>
                                                    <p>Available</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="hd-message-sn">
                                                <div class="hd-message-img chat-img">
                                                    <img src="<?php echo $global_url_dir; ?>/assets/img/post/2.jpg" alt="" />
                                                    <div class="chat-avaible"><i class="notika-icon notika-dot"></i></div>
                                                </div>
                                                <div class="hd-mg-ctn">
                                                    <h3>Glenn Jecobs</h3>
                                                    <p>Available</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="hd-mg-va">
                                        <a href="#">View All</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area -->

    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">

<?php
    # Generate navigation

    # loop folders
    foreach($folders as $folder){

        # filter php files
        if( strpos($folder, ".") !== false ){
            continue;
        }

        $class = "";
        if($current_folder == $folder){
            $class = " class='active'";
        }

        print '<li><a data-toggle="collapse" data-target="#'.$folder.'" href="#">'.ucfirst($folder).'</a>' . "\n";


        ## Submenu
        print '<ul class="collapse dropdown-header-top">' . "\n";
        $class = "";
        if($current_folder == $folder){
            $class = "in active ";
        }

        $files = scandir("./pages/" . $folder . "/");

        # loop files
        foreach($files as $file){

            # filter php files
            if( strpos($file, ".php") === false ){
                continue;
            }

            $class = "";
            if($current_file . ".php" == $file){
                $class = ' class="active"';
            }

            print '<li><a href="'.$global_url_dir.'/'.$folder.'/'.substr($file, 0, -4).'">'.ucfirst(substr($file, 0, -4)).'</a></li>';
        }

        print '</ul>' . "\n";
        print '</li>' . "\n";
    }
?>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->

    <!-- Aside area start -->
    <aside>
        <!-- Main Menu area start-->
        <div class="main-menu-area mg-tb-40">
            <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
<?php
    # Generate navigation

    # loop folders
    foreach($folders as $folder){

        # filter php files
        if( strpos($folder, ".") !== false ){
            continue;
        }

        $class = "";
        if($current_folder == $folder){
            $class = " class='active'";
        }

        print '<li'.$class.'><a data-toggle="tab" href="#'.$folder.'"><!--<i class="notika-icon notika-house"></i> --><strong>'.ucfirst($folder).'</strong></a>'. "\n";


        ## Submenu
        print "<div class='tab-content custom-menu-content'>";
        $class = "";
        if($current_folder == $folder){
            $class = "in active ";
        }

        print '<div id="'.$folder.'" class="tab-pane '. $class .'notika-tab-menu-bg">' . "\n";
        print '<ul class="notika-main-menu-dropdown">' . "\n";

        $files = scandir("./pages/" . $folder . "/");

        # loop files
        foreach($files as $file){

            # filter php files
            if( strpos($file, ".php") === false ){
                continue;
            }

            $class = "";
            if($current_file . ".php" == $file){
                $class = ' class="active"';
            }

            print '<li'.$class.'><a href="'.$global_url_dir.'/'.$folder.'/'.substr($file, 0, -4).'">'.ucfirst(substr($file, 0, -4)).'</a></li>' . "\n";
        }

        print '</ul>' . "\n";
        print '</div>' . "\n";
        print "</div>";



        print '</li>' . "\n";
    }
?>
            </ul>
         

        </div>
        <!-- Main Menu area End-->
    </aside>
    <!-- Aside area end -->
    

    <!-- Start Content area -->
    <main>
    <?php
        // print "pages/" . $include_str;
        if( file_exists( "pages/" . $include_str ) ){
            require_once( "pages/" . $include_str );
        } else {
            require_once( "404.php" );
        }
    ?>

        <!-- Start Footer area-->
        <div class="footer-copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-copy-right">
                            <p>Copyright © 2018 . All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Footer area-->


    </main>
    <!-- End Content area -->
    
    <!-- jquery
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/jquery-price-slider.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/owl.carousel.min.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/jquery.scrollUp.min.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/meanmenu/jquery.meanmenu.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo $global_url_dir; ?>/assets/js/counterup/waypoints.min.js"></script>
    <script src="<?php echo $global_url_dir; ?>/assets/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- jvectormap JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="<?php echo $global_url_dir; ?>/assets/js/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="<?php echo $global_url_dir; ?>/assets/js/jvectormap/jvectormap-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo $global_url_dir; ?>/assets/js/sparkline/sparkline-active.js"></script>
    <!-- sparkline JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/flot/jquery.flot.js"></script>
    <script src="<?php echo $global_url_dir; ?>/assets/js/flot/jquery.flot.resize.js"></script>
    <script src="<?php echo $global_url_dir; ?>/assets/js/flot/curvedLines.js"></script>
    <script src="<?php echo $global_url_dir; ?>/assets/js/flot/flot-active.js"></script>
    <!-- knob JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/knob/jquery.knob.js"></script>
    <script src="<?php echo $global_url_dir; ?>/assets/js/knob/jquery.appear.js"></script>
    <script src="<?php echo $global_url_dir; ?>/assets/js/knob/knob-active.js"></script>
    <!--  wave JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/wave/waves.min.js"></script>
    <script src="<?php echo $global_url_dir; ?>/assets/js/wave/wave-active.js"></script>
    <!--  todo JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/todo/jquery.todo.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/plugins.js"></script>
	<!--  Chat JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/chat/moment.min.js"></script>
    <script src="<?php echo $global_url_dir; ?>/assets/js/chat/jquery.chat.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/main.js"></script>
	<!-- tawk chat JS
		============================================ -->
    <script src="<?php echo $global_url_dir; ?>/assets/js/tawk-chat.js"></script>
</body>

</html>