<?php

if (session_status()==PHP_SESSION_NONE) {
  session_start();
}
if(empty($_SESSION['user_name'])){

    header("Location: login.php");
}

?>
<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
  <!-- Mirrored from getbootstrapadmin.com/remark/base/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 19 Apr 2019 02:51:32 GMT -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="bootstrap admin template">
    <meta name="author" content="">
    <title>Stationary
    </title>
<!--    <link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">-->
<!--    <link rel="shortcut icon" href="assets/images/favicon.ico">-->
    <!-- Stylesheets -->
    <link rel="stylesheet" href="global/css/bootstrap.min599c.css?v4.0.2">
    <link rel="stylesheet" href="global/css/bootstrap-extend.min599c.css?v4.0.2">
    <link rel="stylesheet" href="assets/css/site.min599c.css?v4.0.2">
    <!-- Skin tools (demo site only) -->
    <link rel="stylesheet" href="global/css/skintools.min599c.css?v4.0.2">
    <script src="assets/js/Plugin/skintools.min599c.js?v4.0.2">
    </script>
    <!-- Plugins -->
    <link rel="stylesheet" href="global/vendor/animsition/animsition.min599c.css?v4.0.2">
    <link rel="stylesheet" href="global/vendor/asscrollable/asScrollable.min599c.css?v4.0.2">
    <link rel="stylesheet" href="global/vendor/switchery/switchery.min599c.css?v4.0.2">
    <link rel="stylesheet" href="global/vendor/intro-js/introjs.min599c.css?v4.0.2">
    <link rel="stylesheet" href="global/vendor/slidepanel/slidePanel.min599c.css?v4.0.2">
    <link rel="stylesheet" href="global/vendor/flag-icon-css/flag-icon.min599c.css?v4.0.2">
    <!-- Plugins For This Page -->
    <link rel="stylesheet" href="global/vendor/chartist/chartist.min599c.css?v4.0.2">
    <link rel="stylesheet" href="global/vendor/jvectormap/jquery-jvectormap.min599c.css?v4.0.2">
      <link rel="stylesheet" href="global/vendor/magnific-popup/magnific-popup.min599c.css?v4.0.2">
    <link rel="stylesheet" href="global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.min599c.css?v4.0.2">
    <!-- Page -->
    <link rel="stylesheet" href="assets/examples/css/dashboard/v1.min599c.css?v4.0.2">
      <link rel="stylesheet" href="../assets/examples/css/pages/gallery.min599c.css?v4.0.2">
    <!-- Fonts -->
    <link rel="stylesheet" href="global/fonts/web-icons/web-icons.min599c.css?v4.0.2">
    <link rel="stylesheet" href="global/fonts/brand-icons/brand-icons.min599c.css?v4.0.2">
    <link rel='stylesheet' href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic">
    <link rel="stylesheet" href="global/fonts/weather-icons/weather-icons.min599c.css?v4.0.2">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

    <script src="../global/vendor/html5shiv/html5shiv.min.js?v4.0.2"></script>
      <link rel="stylesheet" href="global/vendor/table-dragger/table-dragger.min599c.css?v4.0.2">


    <!--[if lt IE 10]>
    <script src="../global/vendor/media-match/media.match.min.js?v4.0.2"></script>
    <script src="../global/vendor/respond/respond.min.js?v4.0.2"></script>

<![endif]-->
    <!-- Scripts -->
    <script src="global/vendor/breakpoints/breakpoints.min599c.js?v4.0.2">
    </script>
    <script>
      Breakpoints();
    </script>
      <script src="ckeditor/ckeditor.js"></script>
  </head>
  <body class="animsition dashboard">
    <!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
    <nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega navbar-expand-md"
         role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
                data-toggle="menubar">
          <span class="sr-only">Toggle navigation
          </span>
          <span class="hamburger-bar">
          </span>
        </button>
        <button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
                data-toggle="collapse">
          <i class="icon wb-more-horizontal" aria-hidden="true">
          </i>
        </button>
        <div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
<!--          <img class="navbar-brand-logo" src="assets/images/si.png" title="ASI creation">-->
          <span class="navbar-brand-text hidden-xs-down">Stationary
          </span>
        </div>
      </div>
      <div class="navbar-container container-fluid">
        <!-- Navbar Collapse -->
        <div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
          <!-- Navbar Toolbar -->
          <ul class="nav navbar-toolbar">
            <li class="nav-item hidden-float" id="toggleMenubar">
              <a class="nav-link" data-toggle="menubar" href="#" role="button">
                <i class="icon hamburger hamburger-arrow-left">
                  <span class="sr-only">Toggle menubar
                  </span>
                  <span class="hamburger-bar">
                  </span>
                </i>
              </a>
            </li>
          </ul>
          <!-- End Navbar Toolbar -->
          <!-- Navbar Toolbar Right -->
          <ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
            <li class="nav-item dropdown">
              <a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
                 data-animation="scale-up" role="button">
                <span class="avatar avatar-online">
                  <img src="global/portraits/5.jpg" alt="...">
                  <i>
                  </i>
                </span>
              </a>
              <div class="dropdown-menu" role="menu">
                <a class="dropdown-item" href="change_password.php" role="menuitem">
                  <i class="icon wb-user" aria-hidden="true">
                  </i> Change password
                </a>
              
               
                <div class="dropdown-divider" role="presentation">
                </div>
                <a class="dropdown-item" href="php/logout.php" role="menuitem">
                  <i class="icon wb-power" aria-hidden="true">
                  </i> Logout
                </a>
              </div>
            </li>
           </ul>
          <!-- End Navbar Toolbar Right -->
        </div>
      </div>
    </nav>
    <?php include("sidebar.php"); ?>
​


