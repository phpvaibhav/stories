<?php $frontend_assets =  base_url().'frontend_assets/';?>


<meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Your Website Title" />
<meta property="og:description"   content="Your description" />
<meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />

<!-- <section class="section single-wrapper"> -->
<div class="page-wrapper" data-story-id="<?php echo encoding($story['storyId']); ?>" >
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
            <small><a href="javascript:void(0);" title=""><i class="fa fa-eye"></i> <?= $story['viewCount']; ?></a></small>
            <small><a href="javascript:void(0);" title=""><i style="color:<?php echo $story['islikeyou'] ? 'red':'#999999';   ?>" class="fa fa-heart likecolr_<?php echo encoding($story['storyId']); ?>"></i><b class="like_<?php echo encoding($story['storyId']); ?>"> <?= $story['likeCount']; ?></b> </a></small>
        </div>
        <!-- end meta -->
        <div class="post-sharing">
            <ul class="list-inline">
                
                <li>
                    <a class="facebook customer share fb-button btn btn-primary" href="https://www.facebook.com/sharer.php?u=<?php echo current_url(); ?>" title="Facebook share" target="_blank">
                        <i class="fa fa-facebook"></i> 
                        <span class="down-mobile">
                            Share on Facebook
                        </span>
                    </a>
                </li>

                <li>
                    <a class="facebook customer share tw-button btn btn-primary" href="https://twitter.com/share?url=<?php echo current_url(); ?>" title="Facebook share" target="_blank">
                        <i class="fa fa-twitter"></i> 
                        <span class="down-mobile">
                            Share on Twitter
                        </span>
                    </a>
                </li>

                <li>
                    <a class="google_plus customer share gp-button btn btn-primary" href="https://plus.google.com/share?url=<?php echo current_url(); ?>" title="Google Plus Share" target="_blank">
                        <i class="fa fa-google-plus"></i>
                    </a>
                </li>

                <li>
                    <a class="google_plus customer share gp-button btn btn-success" href="whatsapp://send?text=<?php echo current_url(); ?>" data-action="share/whatsapp/share">
                        <i class="fa fa-whatsapp" aria-hidden="true"></i>
                    </a>
                </li>

            </ul>
        </div>
        <!-- end post-sharing -->
    </div>
    <!-- end title -->
    <div class="single-post-media">
        <img src="<?= base_url().$story['featuredImage']; ?>" alt="<?= $story['title']; ?>" class="img-fluid">
    </div>
    <!-- end media -->
    <div class="blog-content">
        <div class="pp">
            <?php echo $story['description']; ?>
        </div>
        <!-- end pp -->
    </div>
    <!-- end content -->
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
                <li><a href="javascript:void(0);" class="btn btn-info likeSet" data-type="1" ><i style="color:<?php echo $story['islikeyou'] ? 'red':'#999999';   ?>" class="fa fa-heart likecolr_<?php echo encoding($story['storyId']); ?>"></i> <span class="down-mobile">Like</span> (<span class="like_<?php echo encoding($story['storyId']); ?>"><?= $story['likeCount']; ?></span>)</a></li>
               
              <!--   <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li> -->
            </ul>
             <hr class="invis1">
            <ul class="list-inline">


                <li>
                    <a class="facebook customer share fb-button btn btn-primary" href="https://www.facebook.com/sharer.php?u=<?php echo current_url(); ?>" title="Facebook share" target="_blank">
                        <i class="fa fa-facebook"></i> 
                        <span class="down-mobile">
                            Share on Facebook
                        </span>
                    </a>
                </li>

                <li>
                    <a class="facebook customer share tw-button btn btn-primary" href="https://twitter.com/share?url=<?php echo current_url(); ?>" title="Facebook share" target="_blank">
                        <i class="fa fa-twitter"></i> 
                        <span class="down-mobile">
                            Share on Twitter
                        </span>
                    </a>
                </li>

                <li>
                    <a class="linkedin customer share fb-button btn btn-primary" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo current_url(); ?>" title="Facebook share" target="_blank">
                        <i class="fa fa-linkedin"></i> 
                        <span class="down-mobile">
                            LinkedIn
                        </span>
                    </a>
                </li>


                

               
            </ul>
        </div>
        <!-- end post-sharing -->
    </div>
    <!-- end title -->
    <div class="row">
        <div class="col-lg-12">
            <div class="banner-spot clearfix">
                <div class="banner-img">
                    <img src="<?= $frontend_assets?>upload/banner_01.jpg" alt="" class="img-fluid">
                </div>
                <!-- end banner-img -->
            </div>
            <!-- end banner -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
    <hr class="invis1">
    <!-- similarStory -->
     <input type="hidden" name="search" id="search" value="<?= encoding($story['categoryId']); ?>">
     <div id="similarStory"></div>
    <!-- similarStory -->
    <!-- end custom-box -->
    <hr class="invis1">
    <hr class="invis1">
    <div class="custombox clearfix">
        <h4 class="small-title"><span id="cc" >0</span> Comments</h4>
        <div class="row">
            <div class="col-lg-12">
                <div id="commentsList" class="comments-list">
                

                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end custom-box -->
    <hr class="invis1">
    
    <?php $storyId = $story['storyId']; ?>
    
    <div id="comntBox" class="replayDivCls">
        <hr class="invis1">
        <div class="custombox clearfix">
            <h4 class="small-title">Leave a Reply     <samp id="cancelBtn" onclick="cancelBtnAction();" style="display: none; color: red; cursor: pointer;">Cancel</samp></h4>
            <div class="row">
                <div class="col-lg-12">
                    <form class="form-wrapper">
                        <input id="name" type="text" class="form-control" placeholder="Your name">
                        <input id="email" type="text" class="form-control" placeholder="Email address">
                        <p id="emailErr" class="err"></p>
                        <!-- <input type="text" class="form-control" placeholder="Website"> -->
                        <textarea id="comment" class="form-control" placeholder="Your comment"></textarea>
                        <p id="commentErr" class="err"></p>
                        <button onclick="addComment()" type="button" id="submit" class="btn btn-primary">Submit Comment</button>
                    </form>
                </div>
            </div>
        </div>
        <hr class="invis1">
    </div>


</div>
<!-- end page-wrapper -->
<script type="text/javascript">
    $( document ).ready(function() {
    data_fun('home/item/similarStory','similar','similarStory');
    });
</script>



  <!-- Your share button code -->
<!-- <div class="fb-share-button" data-href="<?php echo current_url(); ?>" 
data-layout="button_count">
</div> -->
