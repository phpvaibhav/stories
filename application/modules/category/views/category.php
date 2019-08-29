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
					<h2>Categories</h2>
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
						<table id="category_list" class="table table-striped table-bordered table-hover" width="100%">
							<thead>			                
								<tr>
									<th data-hide="phone">ID</th>
									<th data-hide="phone">Category</th>
									<th data-hide="phone">Menu</th>
									<th data-hide="phone,tablet">Status</th>
									<th data-hide="phone,tablet">Action</th>
								</tr>
							</thead>
							<tbody>
										
							</tbody>
						</table>
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
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					New Category
				</h4>
			</div>
			<div class="modal-body">
	           <!-- Add Category -->
		<!-- widget content -->
								<div class="widget-body no-padding">
									
									<form action="category/addCategory" id="categoryAddUpdate" class="smart-form" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
									

										<fieldset>
											<div class="row">
												<label class="label">Category</label>
												<section class="col col-md-12">
													<label class="input"> <i class="icon-append fa fa-list-alt"></i>
														<input type="text"  name="category" placeholder="Category name">
													</label>
												</section>
												
												
											</div>

											
											<div class="row">
												<label class="label">Show menu</label>
												<div class="col col-6">
															<label class="radio state-success"><input type="radio" name="showMenu" value="1"><i></i>Yes</label>
															<label class="radio state-success"><input type="radio" name="showMenu" value="0"><i></i>No</label>
												</div>
											
											</div>
										</fieldset>
										
										<footer>
											<button type="submit" id="submit" class="btn btn-primary">
												Add Category
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