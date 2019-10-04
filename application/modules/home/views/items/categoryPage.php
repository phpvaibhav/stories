      <?php $frontend_assets =  base_url().'frontend_assets/';?>
     
             <?php if(!empty($stories)){ ?>
                <!-- add -->
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                <img src="<?php echo $frontend_assets; ?>upload/banner_02.jpg" alt="" class="img-fluid">
                            </div><!-- end banner-img -->
                        </div><!-- end banner -->
                    </div><!-- end col -->
                </div><!-- end row -->
                <hr class="invis">
            </div><!-- end col-md-12 -->
            
                <!-- add -->


            <?php foreach ($stories as $st => $story) { ?>
            <div class="col-md-6">
                <div class="blog-box">
                    <div class="post-media">
                        <a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title="<?= $story->title; ?>">
                            <img src="<?= base_url().$story->mediumImage; ?>" alt="<?= $story->title; ?>" class="img-fluid">
                            <div class="hovereffect">
                                <span></span>
                            </div><!-- end hover -->
                        </a>
                    </div><!-- end media -->
                    <div class="blog-meta big-meta">
                        <span class="color-orange"><a href="<?php echo base_url().'lojanlo-category/'.$story->catUrl; ?>" title=""><?= ucfirst($story->category).' ('.$story->subCategory.')';?></a></span>
                        <h4><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title="<?= $story->title; ?>"><?= $story->title; ?></a></h4>
                        <p><?php echo substr(strip_tags($story->description),0,225) . "..."; ?></p>
                        <small><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title=""><?= date('d F,Y',strtotime($story->date));?></a></small>
                        <small><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title="">Author by: <?= $story->authorBy;  ?></a></small>
                        <small><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title="">Post by: <?= $story->postBy;  ?></a></small>
                        <small><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title=""><i class="fa fa-eye"></i> <?= $story->viewCount; ?></a></small>
                        <small><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title=""><i class="fa fa-heart"></i> <?= $story->likeCount; ?></a></small>
                    </div><!-- end meta -->
                </div><!-- end blog-box -->
            </div><!-- end col -->
    <?php } }else{ if($start==0){ ?>
              <div class="col-md-12">
                  <center><h4>No More Result Found</h4></center>
              </div>

    <?php }} ?>
       