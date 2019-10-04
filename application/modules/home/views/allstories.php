<?php $frontend_assets =  base_url().'frontend_assets/';?>
<div class="page-wrapper">
    <div class="blog-grid-system">
  
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<input class="form-control" type="text" name="search" id="search" placeholder="Search" aria-label="Search">
				</div> 
			</div> 
			<div class="col-md-4">
				<div class="form-group">
					<select class="form-control" id="category" name="category">
					<option value="">Select Category</option>
					<?php foreach ($categoies as $c => $category) {?>
					<option value="<?php echo encoding($category->categoryId); ?>"><?php echo $category->category; ?></option>
					<?php }?>
					</select>
				</div>            
			</div>            
			<div class="col-md-4">
				<div class="form-group">
					<select class="form-control" id="subCategory" name="subCategory">
					<option value="">Select Sub Category</option>
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

          
