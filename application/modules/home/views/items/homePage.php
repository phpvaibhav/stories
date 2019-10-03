<div class="blog-top clearfix">
        <h4 class="pull-left"><?= $title; ?> <a href="javascript:void(0);"><i class="<?= $icon; ?>"></i></a></h4>
    </div><!-- end blog-top -->

    <div class="blog-list clearfix">
        <?php if(!empty($stories)){ foreach ($stories as $st => $story) { ?>
        <div class="blog-box row">
            <div class="col-md-4">
                <div class="post-media">
                    <a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title="<?= $story->title; ?>">
                        <img src="<?= base_url().$story->mediumImage; ?>" alt="" class="img-fluid">
                        <div class="hovereffect"></div>
                    </a>
                </div><!-- end media -->
            </div><!-- end col -->

            <div class="blog-meta big-meta col-md-8">
                <h4><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title="<?= $story->title; ?>"><?= $story->title; ?></a></h4>
                <p><?php echo substr(strip_tags($story->description),0,170) . "..."; ?></p>
                <small class="firstsmall"><a class="bg-orange" href="<?php echo base_url().'lojanlo-category/'.$story->catUrl; ?>" title=""><?= ucfirst($story->category).' ('.$story->subCategory.')';?></a></small>
                <small><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title=""><?= date('d F,Y',strtotime($story->date));?></a></small>
                <small><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title="">Author by: <?= $story->authorBy;  ?></a></small>
                <small><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title="">Post by: <?= $story->postBy;  ?></a></small>
                <small><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title=""><i class="fa fa-eye"></i> <?= $story->viewCount; ?></a></small>
                <small><a href="<?php echo base_url().'lojanlo-story/'.$story->storyUrl; ?>" title=""><i class="fa fa-heart"></i> <?= $story->likeCount; ?></a></small>
            </div><!-- end meta -->
        </div><!-- end blog-box -->

        <hr class="invis">
    <?php } }else{ ?>
     

        <hr class="invis">

         <?php } ?>
    </div><!-- end blog-list -->