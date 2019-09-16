<!-- START ROW -->
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
					<!-- This area used as dropdown edit box -->
					
				</div>
				<!-- end widget edit box -->
				
				<!-- widget content -->
				<div class="widget-body no-padding">
					
					<form id="createStory" action="stories/createStory" method="post" class="smart-form" autocomplete="off" enctype="multipart/form-data" novalidate="">
						<fieldset>
							<section>
								<label class="input"> <i class="icon-append fa fa-book"></i>
									<input type="text" name="title" placeholder="Title">
									</label>
							</section>
							
							<div class="row">
								<section class="col col-6">
								
									<select style="width:100%;" class="select2" name="categoryId" data-placeholder="Please select a Sub Category" id="categoryId" onchange="getsubCategory(this);">
										<optgroup label="">
										<option></option>
										<?php foreach ($categories as $k => $category) {?>
										<option value="<?php echo $category->categoryId; ?>"><?php echo $category->category; ?></option>
										<?php }?>
										</optgroup>
									</select>
								</section>
								<section class="col col-6">
									<select style="width:100%;" class="select2" name="subCategoryId" data-placeholder="Please select a Sub Category" id="subCategoryId">
										<optgroup label="">
										<option></option>
										
										</optgroup>
									</select>
								</section>
							</div>
							<div class="row">
								<section class="col col-6">
									<label class="input"> <i class="icon-append fa fa-user"></i>
										<input type="text" name="authorBy" placeholder="Author By">
									</label>
								</section>
								<section class="col col-6">
									<select style="width:100%;" class="select2" name="postedById" data-placeholder="Please select a user" id="postedById">
										<optgroup label="">
										<option></option>
										<?php foreach ($users as $k => $user) {?>
										<option value="<?php echo $user->id; ?>"><?php echo $user->fullName." (".($user->createdBy==1 ?'Admin':'Cusotmer').")"; ?></option>
										<?php }?>
										</optgroup>
									</select>
								</section>
							</div>
							
								<section>
									<label class="label">Description</label>
									<textarea name="ckeditor"></textarea>			
								</section>
							
								<div class="row">
									<section class="col col-md-12">
										<div class="input input-file">
										<span class="button"><input type="file" name="featuredImage" id="file" onchange="this.parentNode.nextSibling.value = this.value" accept="image/*" placeholder="Featured image">Browse</span><input type="text" placeholder="Featured image" readonly="">
										</div>

									</section>
									
								</div>
									<section>
									<label class="label">Is Featured</label>
									<div class="inline-group">
										<label class="radio">
											<input type="radio" name="radio-inline"  name="isFeatured" value="1" >
											<i></i>Yes</label>
										<label class="radio">
											<input type="radio" name="radio-inline" name="isFeatured" value="0" checked="checked">
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

<!-- END ROW -->