<?php $frontend_assets =  base_url().'frontend_assets/';?>
<!-- <section class="section single-wrapper"> -->
<div class="page-wrapper">
    <div class="blog-title-area text-center">
        <ol class="breadcrumb hidden-xs-down">
            <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Home</a></li>
            <li class="breadcrumb-item"><?= ucfirst($story['category']);?></li>
            <li class="breadcrumb-item active"><?= $story['title']; ?></li>
        </ol>

        <span class="color-orange"><a href="<?php echo base_url().'lojanlo-category/'.$story['catUrl']; ?>" title=""><?= ucfirst($story['category']).' ('.$story['subCategory'].')';?></a></span>

        <h3><?= $story['title']; ?></h3>

        <div class="blog-meta big-meta">
            <small><a href="<?php echo base_url().'lojanlo-story/'.$story['storyUrl']; ?>" title=""><?= date('d F,Y',strtotime($story['date']));?></a></small>
            <small><a href="<?php echo base_url().'lojanlo-story/'.$story['storyUrl']; ?>" title="">Author by: <?= $story['authorBy'];  ?></a></small>
            <small><a href="<?php echo base_url().'lojanlo-story/'.$story['storyUrl']; ?>" title="">Post by: <?= $story['postBy'];  ?></a></small>
            <small><a href="javascript:void(0);" title=""><i class="fa fa-eye"></i> 0</a></small>
        </div><!-- end meta -->

        <div class="post-sharing">
            <ul class="list-inline">
                <li><a href="javascript:void(0);" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                <li><a href="javascript:void(0);" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                <li><a href="javascript:void(0);" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div><!-- end post-sharing -->
    </div><!-- end title -->

    <div class="single-post-media">
        <img src="<?= base_url().$story['featuredImage']; ?>" alt="<?= $story['title']; ?>" class="img-fluid">
    </div><!-- end media -->

    <div class="blog-content">  
        <div class="pp">
           <?php echo $story['description']; ?>

        </div><!-- end pp -->

    </div><!-- end content -->

    <div class="blog-title-area">
   <!--      <div class="tag-cloud-single">
            <span>Tags</span>
            <small><a href="#" title="">lifestyle</a></small>
            <small><a href="#" title="">colorful</a></small>
            <small><a href="#" title="">trending</a></small>
            <small><a href="#" title="">another tag</a></small>
        </div> --><!-- end meta -->

        <div class="post-sharing">
            <ul class="list-inline">
                <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
            </ul>
        </div><!-- end post-sharing -->
    </div><!-- end title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="banner-spot clearfix">
                <div class="banner-img">
                    <img src="<?= $frontend_assets?>upload/banner_01.jpg" alt="" class="img-fluid">
                </div><!-- end banner-img -->
            </div><!-- end banner -->
        </div><!-- end col -->
    </div><!-- end row -->

    <hr class="invis1">


    <div class="custombox clearfix">
        <h4 class="small-title">You may also like</h4>
       
            <input type="hidden" name="search" id="search" value="<?= encoding($story['categoryId']); ?>">
            <div id="similarStory"></div>
     
      
    </div><!-- end custom-box -->

    <hr class="invis1">


    <div class="custombox clearfix">
        <h4 class="small-title">Leave a Reply</h4>
        <div class="row">
            <div class="col-lg-12">
                <form class="form-wrapper">
                    <input type="text" class="form-control" placeholder="Your name">
                    <input type="text" class="form-control" placeholder="Email address">
                    <input type="text" class="form-control" placeholder="Website">
                    <textarea class="form-control" placeholder="Your comment"></textarea>
                    <button type="submit" class="btn btn-primary">Submit Comment</button>
                </form>
            </div>
        </div>
    </div>
</div><!-- end page-wrapper -->
<script type="text/javascript">
    $( document ).ready(function() {
   
    data_fun('home/item/similarStory','similar','similarStory');
  
});
</script>