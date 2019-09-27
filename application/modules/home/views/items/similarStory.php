 <div class="row">
<?php if(!empty($stories)){ foreach ($stories as $st => $story) { ?> 
  <div class="col-lg-6">
    <div class="blog-box">
        <div class="post-media">
            <a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>>" title="<?= $story->title; ?>">
                <img src="<?= base_url().$story->mediumImage; ?>" alt="" class="img-fluid">
                <div class="hovereffect">
                    <span class=""></span>
                </div><!-- end hover -->
            </a>
        </div><!-- end media -->
        <div class="blog-meta">
            <h4><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title="<?= $story->title; ?>"><?= $story->title; ?></a></h4>
            <small><a href="<?php echo base_url().'lojanlo-category/'.$story->catUrl; ?>" title=""><?= ucfirst($story->category).' ('.$story->subCategory.')';?></a></small>
            <small><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title=""><?= date('d F,Y',strtotime($story->date));?></a></small>
        </div><!-- end meta -->
    </div><!-- end blog-box -->
</div><!-- end col -->
 <?php } } ?>
   </div><!-- end row -->