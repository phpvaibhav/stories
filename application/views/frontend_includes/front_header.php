<!DOCTYPE html>
<html lang="en">
<head>
 <?php $frontend_assets =  base_url().'frontend_assets/'; ?>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Site Metas -->
    <title><?php echo SITE_NAME.'-'.$page_title; ?></title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Site Icons -->
    <link rel="shortcut icon" href="<?php echo $frontend_assets; ?>images/favicon_io/favicon.ico" type="image/x-icon" />

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $frontend_assets; ?>images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $frontend_assets; ?>images/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $frontend_assets; ?>images/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $frontend_assets; ?>images/favicon_io/site.webmanifest">
    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet"> 
    <!-- Bootstrap core CSS -->
    <link href="<?php echo $frontend_assets; ?>css/bootstrap.css" rel="stylesheet">
    <!-- FontAwesome Icons core CSS -->
    <link href="<?php echo $frontend_assets; ?>css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="<?php echo $frontend_assets; ?>style.css" rel="stylesheet">
    <!-- Responsive styles for this template -->
    <link href="<?php echo $frontend_assets; ?>css/responsive.css" rel="stylesheet">
    <!-- Colors for this template -->
    <link href="<?php echo $frontend_assets; ?>css/colors.css" rel="stylesheet">
    <!-- Version Tech CSS for this template -->
    <link href="<?php echo $frontend_assets; ?>css/version/lojanlo.css" rel="stylesheet">
    <!-- Dynamic css add -->
    <?php if(!empty($front_styles)) { load_css($front_styles); } //load required page styles ?>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php if(!empty($front_scripts)) { load_js($front_scripts);} //load required page scripts ?>
</head>
<body>
    <div id="wrapper">
        <header class="tech-header header">
            <div class="container-fluid">
                <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo $frontend_assets; ?>images/version/full-logo.png" alt=""></a>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                            </li>  
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url().'main-category'; ?>">Category</a>
                            </li>
                         <!--    <li class="nav-item dropdown has-submenu ">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">News</a>
                                <ul class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                                    <li>
                                         <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                                    </li> <li>
                                         <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                                    </li> <li>
                                         <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                                    </li> <li>
                                         <a class="nav-link" href="<?php echo base_url(); ?>">Home</a>
                                    </li>
                                </ul>
                            </li>
 -->
                          <!--   <li class="nav-item">
                                <a class="nav-link" href="tech-category-01.html">Gadgets</a>
                            </li>                   
                            <li class="nav-item">
                                <a class="nav-link" href="tech-category-02.html">Videos</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="tech-category-03.html">Reviews</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url().'contact-us'; ?>">Contact Us</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav mr-2">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-youtube-square"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->