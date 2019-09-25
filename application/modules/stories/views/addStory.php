<!--START ROW -->
<style type="text/css">
	.modal-content{
		position: fixed!important;
	}
</style>
<div class="row">
	<!-- NEW COL START -->
	<article class="col-sm-12 col-md-12 col-lg-12">	
		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget" id="wid-id-4" data-widget-editbutton="false" data-widget-custombutton="false" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-togglebutton="false" data-widget-fullscreenbutton="false">
		
			<header>
				<span class="widget-icon"> <i class="fa fa-edit"></i> </span>
				<h2>Add</h2>				
				
			</header>

			<!-- widget div-->
			<div>
				
				<!-- widget edit box -->
				<div class="jarviswidget-editbox">
	<!-- 	class="form-control" placeholder="" rows="3"	 -->		<!-- This area used as dropdown edit box -->
					
				</div>
				<!-- end widget edit box -->
				
				<!-- widget content -->
				<div class="widget-body no-padding">
					
					<form id="createStory" action="stories/createStory" method="post" class="smart-form" autocomplete="off" enctype="multipart/form-data" novalidate="">
						<fieldset>
							<section>
								<label class="input"> <i class="icon-append fa fa-book"></i>
									<input type="text" name="title" placeholder="Title" value="<?= $story['title']; ?>">
									<input type="hidden" name="storyId" placeholder="Title" value="<?php echo encoding($story['storyId']); ?>">
									</label>
							</section>
							
							<div class="row">
								<section class="col col-6">
								
									<select style="width:100%;"class="form-control" name="categoryId" data-placeholder="Please select Category" id="categoryId" onchange="getsubCategory(this,<?php echo isset($story['subcategoryId'])?$story['subcategoryId']:0; ?>,0);">
										<option value="">Please select Category</option>
										<?php foreach ($categories as $k => $category) {?>
										<option value="<?php echo $category->categoryId; ?>" <?= $story['categoryId']==$category->categoryId ?"selected='selected'":""; ?>><?php echo $category->category; ?></option>
										<?php }?>
										
									</select>
								</section>
								<section class="col col-6">
									<select  class="form-control" name="subCategoryId" data-placeholder="Please select a Sub Category" id="subCategoryId">

										<option value="">Please select a Sub Category</option>
										
										
									</select>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input type="text" name="authorBy" placeholder="Author By" value="<?= $story['authorBy']; ?>">
									</label>
								</section>
								<section class="col col-6">
									<select style="width:100%;" class="select2" name="postedById" data-placeholder="Please select a user" id="postedById">
										<optgroup label="">
										<option></option>
										<?php foreach ($users as $k => $user) {?>
										<option value="<?php echo $user->id; ?>" <?php echo $story['postedById']==$user->id ?"selected='selected'":""; ?>><?php echo $user->fullName." (".($user->createdBy==1 ?'Admin':'Cusotmer').")"; ?></option>
										<?php }?>
										</optgroup>
									</select>

								</section>
							</div>
							
								<section>
									<label class="label">Description</label>
									<textarea name="ckeditor" class="form-control" placeholder="" rows="3"><?= $story['description']; ?></textarea>			
								</section>
							
								<div class="row">
									<section class="col col-md-12">
										<div class="input input-file">
										<span class="button"><input type="file" name="featuredImage" id="file" onchange="this.parentNode.nextSibling.value = this.value" accept="image/*" class="recImage" data-ing="" placeholder="Featured image">Browse</span><input type="text" placeholder="Featured image" readonly="">
									<span class="text-red" id="imgErr"></span>
									<input value="1" type="hidden" id="checkimg">
									<input type="hidden" name="recImageData" id="recImageData">
										</div>
									<div id="preview"></div>
									</section>
									
								</div>
								<section>
									<label class="label">Is Featured</label>
									<div class="inline-group">
										<label class="radio">
											<input type="radio" name="isFeatured" value="1" <?= $story['isFeatured']==1 ?"checked='checked'":""; ?> >
											<i></i>Yes</label>
										<label class="radio">
											<input type="radio" name="isFeatured" value="0" <?= $story['isFeatured']==0 ?"checked='checked'":""; ?>>
											<i></i>No</label>
										
									</div>
								</section>
						
						</fieldset>

						<fieldset>
							
						</fieldset>
						<footer>
							<button type="submit" id="submit" class="btn btn-primary">Add</button>
						</footer>
					</form>						
				</div>
				<!-- end widget content -->
			</div>
			<!-- end widget div -->
		</div>
		<!-- end widget -->



	</article>
	<!-- END COL -->		

</div>
<!-- image model -->

<div class="modal" id="imgConfirm" tabindex="-1" role="dialog" aria-labelledby="imgConfirm" aria-hidden="true">
        <div class="modal-dialog"   role="document">
            <div class="modal-content">
        
                <div class="modal-body">
					 <div class="alert dark alert-icon alert-danger alert-dismissible" role="alert" id="errorDiv" style="display:none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            <center><span id="upload-error">Please Save Image First</span> </center>
          </div> 
             
                <input type="hidden" id="hidee" name="hidee">
                <input type="hidden" id="prev" name="prev">


						<div class="upload-demo-wrap">
						<div id="upload-demo"></div>
						</div>
                </div>
                <div class="modal-footer">
                    
                    <button id="save" class="btn btn-primary btn-ok">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
 </div> 
<!-- image model -->
<!-- END ROW-->
<script type="text/javascript">
	$(document).ready(function() {
$('.select2').select2({
    minimumResultsForSearch: -1,
    placeholder: function(){
        $(this).data('placeholder');
    }
});
 CKEDITOR.replace( 'ckeditor', { height: '380px', startupFocus : true});

 

});	
</script>
<?php if(isset($story['subcategoryId']) && !empty($story['subcategoryId'])):?>
	<script type="text/javascript">
	$(document).ready(function() {
	getsubCategory("<?php echo $story['categoryId']; ?>","<?php echo $story['subcategoryId']; ?>",1);
	});	
	</script>
<?php endif; ?>


