<?php $frontend_assets =  base_url().'frontend_assets/';?>
<div class="page-wrapper">
    <div class="blog-grid-system">
  
    <input type="hidden" name="search" id="search" value="<?= encoding($category['categoryId']); ?>">
    <input type="hidden" name="category" id="category" value="<?= encoding($category['categoryId']); ?>">
      <div class="row">
                        <div class="col-md-6">
                           <select class="form-control" id="subCategory" name="subCategory">
                                <option value="">Select Sub Category</option>
                                <?php foreach ($subCategoies as $k => $subcategory) {?>
                                <option value="<?php echo encoding($subcategory->subCategoryId); ?>"><?php echo $subcategory->subCategory; ?></option>
                                <?php }?>
                           </select>
                        </div>
                    
               </div>
		     <div class="row" id="load_data">
		         <!--    <div id="categoryWiseStory"></div> -->
                   
                   
		     </div><!-- end row -->
              <hr class="invis3">
               <div class="row">
                        <div class="col-md-12">
                            <div id="load_data_message"></div>
                        </div>
                    
               </div>
           


             
    </div><!-- end blog-grid-system -->
</div><!-- end page-wrapper -->
<!-- category -->
       
        <!-- category -->
<hr class="invis3">

          