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
    <meta name="keywords" content="#lojanlo,lojanloappweb,lo jan lo,lo jaan lo,<?php echo isset($keywords) ? $keywords:''; ?>">
    <meta name="description" content="<?php echo isset($description) ? $description:''; ?>">
    <meta name="author" content="<?php echo isset($author) ? $author:'5insight org.'; ?>">
    <meta http-equiv="refresh" content="1800">
    <meta name="robots" content="index, follow" />
    <link rel="canonical" href="<?php echo current_url(); ?>" />


    <!-- FB OG Tags start -->
    <!-- <meta property="fb:app_id" content="1879342772122734" /> -->
    <meta property="og:title" content="<?php echo $page_title; ?>" />
    <meta property="og:url" content="<?php echo current_url(); ?>" />
    <meta property="og:description" content="<?php echo isset($description) ? $description:''; ?>"> 
    <meta property="og:image" content="<?php echo base_url().((isset($imageUrl) && !empty($imageUrl)) ? $imageUrl:'frontend_assets/images/version/full-logo.png'); ?>">
    <meta property="og:image:width" content="640" />
    <meta property="og:image:height" content="300" />
    <meta property="og:type" content="story" />
    <meta property="og:type" content="article" />
    <meta property="og:image:url" itemprop="image" content="<?php echo base_url().((isset($imageUrl) && !empty($imageUrl)) ? $imageUrl:'frontend_assets/images/version/full-logo.png'); ?>" />
<meta property="og:image:type" content="image/png" />
    <!-- FB OG Tags end -->
<meta property="og:locale" content="en_GB" />
<meta property="og:locale:alternate" content="fr_FR" />
<meta property="og:locale:alternate" content="es_ES" />
<div id='hidden' style='display:none;'><img src="<?php echo base_url().((isset($imageUrl) && !empty($imageUrl)) ? $imageUrl:'frontend_assets/images/version/full-logo.png'); ?>"></div>

    <!-- Site Icons -->
    <link rel="icon" href="<?php echo $frontend_assets; ?>images/favicon_io/favicon.ico" type="image/x-icon" />
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

    

    <!--  -->
    <link href="<?php echo $frontend_assets; ?>lojanlo/css/custom.css" rel="stylesheet">
    <!--  -->




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
                                <a class="nav-link" href="<?php echo base_url().'lojanlo-stories'; ?>">All</a>
                            </li>  
                            <?php if(isset($menus) && !empty($menus)){
                                foreach ($menus as $k => $menu){ ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url().'lojanlo-category/'.trim($menu->pageUrl); ?>"><?php echo ucfirst($menu->category); ?></a>
                            </li>
                        <?php } } ?>
                          <?php if(isset($subMenus) && !empty($subMenus)){ ?>
                           <li class="nav-item dropdown has-submenu ">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Other</a>
                                <ul class="dropdown-menu megamenu" aria-labelledby="dropdown01">
                                     <?php 
                                foreach ($subMenus as $ks => $submenu) {?>
                                    <li>
                                         <a class="nav-link" href="<?php echo base_url().'lojanlo-category/'.trim($submenu->pageUrl); ?>"><?php echo ucfirst($submenu->category); ?></a>
                                    </li> 
                                       <?php }  ?>
                                </ul>
                            </li>
                              <?php } ?>
 
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
                                <a class="nav-link" href="<?php echo base_url().'about-us'; ?>">About Us</a>
                            </li> 
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url().'contact-us'; ?>">Contact Us</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav mr-2">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-youtube-square"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.facebook.com/lojanlo.appweb"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://www.instagram.com/lojanloappweb"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->
        <?php if(empty($segments)): if(isset($topstories) && !empty($topstories)) :  ?>
<section class="section first-section">
    <div class="container-fluid">
        <div class="masonry-blog clearfix">
            <?php foreach ($topstories as $ky => $story) { 
                    switch ($ky) {
                        case 0:
                           $divClass = 'second-slot';
                            break;
                        
                         case 1:
                           $divClass = 'second-slot';
                            break;
                        case 2:
                           $divClass = 'last-slot';
                            break;
                        
                        default:
                          $divClass = 'last-slot';
                            break;
                    }

                ?>
            <div class="<?=  $divClass; ?>">
                <div class="masonry-box post-media">
                     <img src="<?= base_url().$story->mediumImage; ?>" alt="<?= $story->title; ?>" class="img-fluid">
                     <div class="shadoweffect">
                        <div class="shadow-desc">
                            <div class="blog-meta">
                                <span class="bg-orange"><a href="<?php echo base_url().'lojanlo-category/'.$story->catUrl; ?>" title=""><?= ucfirst($story->category).' ('.$story->subCategory.')';?></a></span>
                                <h4><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title="<?= $story->title; ?>"><?= $story->title; ?></a></h4>
                                <small><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title=""><?= date('d F,Y',strtotime($story->date));?></a></small>
                                <small><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title="">Author by: <?= $story->authorBy;  ?></a></small>
                                <small><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title="">Post by: <?= $story->postBy;  ?></a></small>
                                  <small><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title=""><i class="fa fa-eye"></i> <?= $story->viewCount; ?></a></small>
                                  <small><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title=""><i class="fa fa-heart"></i> <?= $story->likeCount; ?></a></small>
                            </div><!-- end meta -->
                        </div><!-- end shadow-desc -->
                    </div><!-- end shadow -->
                </div><!-- end post-media -->
            </div><!-- end first-side -->
        <?php } ?>

        </div><!-- end masonry -->
    </div>
</section>
<?php endif; else: ?>
  <div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="<?= isset($row['icon'])? $row['icon']:'';?> bg-orange"></i> <?= isset($row['title'])? ($row['title']):''; ?> <small class="hidden-xs-down hidden-sm-down"><?= isset($row['subTitle']) ?$row['subTitle'] :''; ?></small></h2>
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
