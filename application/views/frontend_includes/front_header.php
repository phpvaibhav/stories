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
    <meta name="keywords" content="<?php echo isset($keywords) ? $keywords:''; ?>">
    <meta name="description" content="<?php echo isset($description) ? $description:''; ?>">
    <meta name="author" content="<?php echo isset($author) ? $author:''; ?>">
    <meta http-equiv="refresh" content="1800">
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="<?php echo current_url(); ?>" />
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
   <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
    
   
</head>
<body data-base-url="<?php echo base_url(); ?>">
    <?php $segments        = $this->uri->segment_array(); ?>
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
        <?php if(empty($segments)):  ?>
<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">
            <div class="first-slot">
                <div class="masonry-box post-media">
                     <img src="<?php echo $frontend_assets; ?>upload/tech_01.jpg" alt="" class="img-fluid">
                     <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="tech-category-01.html" title="">Technology</a></span>
                                <h4><a href="<?php echo base_url().'single-category'; ?>" title="">Say hello to real handmade office furniture! Clean & beautiful design</a></h4>
                                <small><a href="<?php echo base_url().'single-category'; ?>" title="">24 July, 2017</a></small>
                                <small><a href="tech-author.html" title="">by Amanda</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end first-side -->

            <div class="second-slot">
                <div class="masonry-box post-media">
                     <img src="<?php echo $frontend_assets; ?>upload/tech_02.jpg" alt="" class="img-fluid">
                     <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="tech-category-01.html" title="">Gadgets</a></span>
                                <h4><a href="<?php echo base_url().'single-category'; ?>" title="">Do not make mistakes when choosing web hosting</a></h4>
                                <small><a href="<?php echo base_url().'single-category'; ?>" title="">03 July, 2017</a></small>
                                <small><a href="tech-author.html" title="">by Jessica</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                     </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end second-side -->

            <div class="last-slot">
                <div class="masonry-box post-media">
                     <img src="<?php echo $frontend_assets; ?>upload/tech_03.jpg" alt="" class="img-fluid">
                     <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="tech-category-01.html" title="">Technology</a></span>
                                <h4><a href="<?php echo base_url().'single-category'; ?>" title="">The most reliable Galaxy Note 8 images leaked</a></h4>
                                <small><a href="<?php echo base_url().'single-category'; ?>" title="">01 July, 2017</a></small>
                                <small><a href="tech-author.html" title="">by Jessica</a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                     </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end second-side -->
        </div><!-- end masonry -->
    </div>
</section>
<?php else: ?>
  <div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="<?= isset($row['icon'])? $row['icon']:'';?> bg-orange"></i> <?= isset($row['title'])?ucfirst($row['title']):''; ?> <small class="hidden-xs-down hidden-sm-down"><?= isset($row['subTitle']) ?$row['subTitle'] :''; ?></small></h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
                <!--     <li class="breadcrumb-item"><a href="#">Category</a></li> -->
                   <!--  <li class="breadcrumb-item active"><?= $row['title']; ?></li> -->
                </ol>
            </div><!-- end col -->                    
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->
<?php endif; ?>
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
