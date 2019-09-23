<section id="widget-grid" class="">
	<!-- row -->
	<div class="row">
		<!-- NEW WIDGET START -->
		<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<!-- Widget ID (each widget will need unique ID)-->
			<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-editbutton="false" data-widget-deletebutton="false">
				<!-- widget options:
				usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">
				data-widget-colorbutton="false"
				data-widget-editbutton="false"
				data-widget-togglebutton="false"
				data-widget-deletebutton="false"
				data-widget-fullscreenbutton="false"
				data-widget-custombutton="false"
				data-widget-collapsed="true"
				data-widget-sortable="false"
				-->
				<header>
					<span class="widget-icon"> <i class="fa fa-cube"></i> </span>
					<h2>Sub Categories</h2>
				</header>
				<!-- widget div-->
				<div>
					<!-- widget edit box -->
					<div class="jarviswidget-editbox">
						<!-- This area used as dropdown edit box -->
					</div>
					<!-- end widget edit box -->
					<!-- widget content -->
					<div class="widget-body padding">
						<div class="table-responsive">
							<table id="subcategoryList" class="table table-striped table-bordered table-hover" width="100%">
								<thead>			                
									<tr>
										<th data-hide="phone">ID</th>
										<th data-hide="phone">Sub Category</th>
										<th data-hide="phone">Category</th>
										<th data-hide="phone,tablet">Status</th>
										<th data-hide="phone,tablet">Action</th>
									</tr>
								</thead>
								<tbody>
											
								</tbody>
							</table>
						</div>
					</div>
					<!-- end widget content -->
				</div>
				<!-- end widget div -->
			</div>
			<!-- end widget -->
		</article>
		<!-- WIDGET END -->
	</div>
	<!-- end row -->
</section>
<!-- end widget grid -->
<!-- Modal -->
<div class="modal fade" id="addsubCategory" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					<span id="catTitle">New Sub Category</span>
				</h4>
			</div>
			<div class="modal-body">
	           <!-- Add Category -->
		<!-- widget content -->
								<div class="widget-body no-padding">
									
									<form action="category/addSubCategory" id="subcategoryAddUpdate" class="smart-form" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
									

										<fieldset>
											<div class="row">
												
													<section class="col col-md-12">
														<label class="input"> <i class="icon-append fa fa-list-alt"></i>
														<input type="text"  name="subCategory" placeholder="Sub category name" id="subCategory" >
													</label>
													<input type="hidden" name="subCategoryId" value="0" id="subCategoryId" >
													</section>
												
													<section class="col col-md-12">
														<label class="label">Select</label>
														<label class="select">
														<select class="" name="categoryId" id="categoryId">
															<option value="">Please select a category</option>
															<?php foreach ($categories as $k => $category) {?>
															<option value="<?php echo $category->categoryId; ?>"><?php echo $category->category; ?></option>
															<?php }?>
														</select>
														<i></i>
														</label>
														<div class="note note-error">Please select a category</div>
													</section>	
												
										
											</div>

										
										</fieldset>
										
										<footer>
											<button type="submit" id="submit" class="btn btn-primary">
												
												<span id="catbtnTitle">Add Sub Category</span>
											</button>
										</footer>
									</form>

								</div>
								<!-- end widget content -->
	           <!-- Add Category -->
	        </div>
		</div>
	</div>
</div>
<!-- End modal -->