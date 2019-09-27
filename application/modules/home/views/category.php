<?php $frontend_assets =  base_url().'frontend_assets/';?>
<div class="page-wrapper">
    <div class="blog-grid-system">
    <input type="hidden" name="search" id="search" value="<?= $this->uri->segment(2); ?>">
            <div id="categoryWiseStory"></div>
    </div><!-- end blog-grid-system -->
</div><!-- end page-wrapper -->
<!-- category -->
       
        <!-- category -->
<hr class="invis3">
<script type="text/javascript">
    $( document ).ready(function() {
   
    data_fun('home/item/categoryWiseStory','categoryWiseStory','categoryWiseStory');
  
});
</script>
          