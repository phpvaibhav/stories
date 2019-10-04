<?php $frontend_assets =  base_url().'frontend_assets/';?>
<div class="page-wrapper">
    <div class="blog-grid-system">
  
   
    
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" type="text" name="search" id="search" placeholder="Search" aria-label="Search">
                <input type="hidden" name="category" id="category" value="<?= encoding($category['categoryId']); ?>">
              </div> 
            </div> 
          
            <div class="col-md-6">
              <div class="form-group">
                <select class="form-control" id="subCategory" name="subCategory">
                  <option value="">Select Sub Category</option>
                  <?php foreach ($subCategoies as $k => $subcategory) {?>
                  <option value="<?php echo encoding($subcategory->subCategoryId); ?>"><?php echo $subcategory->subCategory; ?></option>
                  <?php }?>
                </select>
              </div>    
            </div>    
          </div>
           <hr class="invis3">
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

          