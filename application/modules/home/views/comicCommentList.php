<?php $frontend_assets =  base_url().'frontend_assets/';?>
<style type="text/css">.media-left{display: none;}</style>
<input type="hidden" id="commentCount" value="<?php echo sizeof($comment); ?>" name="">
<?php if(isset($comment) && !empty($comment)){ ?>
<?php foreach($comment as $comment1){ ?>
<!-- <p>1<?php echo $comment1['comments']; ?></p> -->
<?php $id = $comment1['commentId']; ?>
<div style="border: 1px solid #cccccc;" class="media">
    <a class="media-left" href="#">
    <img src="<?php echo $frontend_assets;?>upload/author.jpg" alt="" class="rounded-circle">
    </a>
    <div class="media-body">
        <h4 class="media-heading user_name"><?php echo $comment1['name']; ?><small><?php echo time_elapsed_string($comment1['crd']); ?></small></h4>
        <p><?php echo $comment1['comments']; ?></p>
        <a href="javascript:void();" onclick="replyAdd('<?php echo $id ?>')" class="btn btn-primary btn-sm float-right">Reply</a>
    </div>
</div>
<div id="replayDiv<?php echo $id ?>"  class="replayDivCls" ></div>
<?php if(isset($comment1['subComment']) && !empty($comment1['subComment'])){ ?>
<?php foreach($comment1['subComment'] as $comment2){ ?>
<!-- <p>2<?php echo $comment2['comments']; ?></p> -->
<?php $id = $comment2['commentId']; ?>
<div style="border: 1px solid #cccccc;" class="media mr-100">
    <a class="media-left" href="#">
    <img src="<?php echo $frontend_assets;?>upload/author.jpg" alt="" class="rounded-circle">
    </a>
    <div class="media-body">
        <h4 class="media-heading user_name"><?php echo $comment2['name']; ?><small><?php echo time_elapsed_string($comment2['crd']); ?></small></h4>
        <p><?php echo $comment2['comments']; ?></p>
        <a href="javascript:void();" onclick="replyAdd('<?php echo $id ?>')" class="btn btn-primary btn-sm float-right">Reply</a>
    </div>
</div>
<div id="replayDiv<?php echo $id ?>"  class="replayDivCls" ></div>
<?php if(isset($comment2['subComment']) && !empty($comment2['subComment'])){ ?>
<?php foreach($comment2['subComment'] as $comment3){ ?>
<!-- <p>3<?php echo $comment3['comments']; ?></p> -->
<?php $id = $comment3['commentId']; ?>
<div style="border: 1px solid #cccccc;" class="media mr-200">
    <a class="media-left" href="#">
    <img src="<?php echo $frontend_assets;?>upload/author.jpg" alt="" class="rounded-circle">
    </a>
    <div class="media-body">
        <h4 class="media-heading user_name"><?php echo $comment3['name']; ?><small><?php echo time_elapsed_string($comment3['crd']); ?></small></h4>
        <p><?php echo $comment3['comments']; ?></p>
        <a href="javascript:void();" onclick="replyAdd('<?php echo $id ?>')" class="btn btn-primary btn-sm float-right">Reply</a>
    </div>
</div>
<div id="replayDiv<?php echo $id ?>"  class="replayDivCls" ></div>
<?php if(isset($comment3['subComment']) && !empty($comment3['subComment'])){ ?>
<?php foreach($comment3['subComment'] as $comment4){ ?>
<!-- <p>4<?php echo $comment4['comments']; ?></p> -->
<?php $id = $comment4['commentId']; ?>
<div style="border: 1px solid #cccccc;" class="media mr-300">
    <a class="media-left" href="#">
    <img src="<?php echo $frontend_assets;?>upload/author.jpg" alt="" class="rounded-circle">
    </a>
    <div class="media-body">
        <h4 class="media-heading user_name"><?php echo $comment4['name']; ?><small><?php echo time_elapsed_string($comment4['crd']); ?></small></h4>
        <p><?php echo $comment4['comments']; ?></p>
        <a href="javascript:void();" onclick="replyAdd('<?php echo $id ?>')" class="btn btn-primary btn-sm float-right">Reply</a>
    </div>
</div>
<div id="replayDiv<?php echo $id ?>"  class="replayDivCls" ></div>
<?php if(isset($comment4['subComment']) && !empty($comment4['subComment'])){ ?>
<?php foreach($comment4['subComment'] as $comment5){ ?>
<!-- <p>5<?php echo $comment5['comments']; ?></p> -->
<?php $id = $comment5['commentId']; ?>
<div style="border: 1px solid #cccccc;" class="media mr-400">
    <a class="media-left" href="#">
    <img src="<?php echo $frontend_assets;?>upload/author.jpg" alt="" class="rounded-circle">
    </a>
    <div class="media-body">
        <h4 class="media-heading user_name"><?php echo $comment5['name']; ?><small><?php echo time_elapsed_string($comment5['crd']); ?></small></h4>
        <p><?php echo $comment5['comments']; ?></p>
        <a href="javascript:void();" onclick="replyAdd('<?php echo $id ?>')" class="btn btn-primary btn-sm float-right">Reply</a>
    </div>
</div>
<div id="replayDiv<?php echo $id ?>"  class="replayDivCls" ></div>
<?php if(isset($comment5['subComment']) && !empty($comment5['subComment'])){ ?>
<?php foreach($comment5['subComment'] as $comment6){ ?>
<!-- <p>5<?php echo $comment5['comments']; ?></p> -->
<?php $id = $comment6['commentId']; ?>
<div style="border: 1px solid #cccccc;" class="media mr-500">
    <a class="media-left" href="#">
    <img src="<?php echo $frontend_assets;?>upload/author.jpg" alt="" class="rounded-circle">
    </a>
    <div class="media-body">
        <h4 class="media-heading user_name"><?php echo $comment6['name']; ?><small><?php echo time_elapsed_string($comment6['crd']); ?></small></h4>
        <p><?php echo $comment6['comments']; ?></p>
        <!-- <a href="javascript:void();" onclick="replyAdd()" class="btn btn-primary btn-sm float-right">Reply</a> -->
    </div>
</div>
<div id="replayDiv<?php echo $id ?>"  class="replayDivCls" ></div>
<?php } ?>
<?php } ?>
<?php } ?>
<?php } ?>
<?php } ?>
<?php } ?>
<?php } ?>
<?php } ?>
<?php } ?>
<?php } ?>
<?php } ?>
<?php } ?>
