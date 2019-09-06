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
					
						<form action="pages/addPage" id="pageAddUpdate" class="smart-form" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
									

							<fieldset>
								<div class="row">
									
									<section class="col col-md-12">
										<label class="label">Title</label>
										<label class="input"> <i class="icon-append fa fa-list-alt"></i>
											<input type="text"  name="title" placeholder="Title" id="title" >
										</label>
									</section>
									<input type="hidden" name="pageId" value="0" id="pageId" >
									
								</div>
							
								<div class="row">
									<section class="col col-6">
										<label class="label">Sub Title</label>
								
										<label class="input"> <i class="icon-append fa fa-list-alt"></i>
											<input type="text"  name="subTitle" placeholder="Sub Title" id="subTitle" >
										</label>
									
									</section>
									<section class="col col-6">
											<label class="label">Icon</label>
								
										<label class="input"> <i class="icon-append fa fa-list-alt"></i>
											<input type="text"  name="icon" placeholder="fa fa-icon" id="icon" >
										</label>
									</section>
								</div>
								<section>
									<label class="label">Show menu</label>
									<div class="inline-group">
										<label class="radio">
											<input type="radio" name="radio-inline"  name="showMenu" value="1" >
											<i></i>Yes</label>
										<label class="radio">
											<input type="radio" name="radio-inline" name="showMenu" value="0" checked="checked">
											<i></i>No</label>
										
									</div>
								</section>
								<section>
								<label class="label">Description</label>
									<textarea name="ckeditor">

									</textarea>			
								</section>
								
							
							</fieldset>
							
							<footer>
								<button type="submit" id="submit" class="btn btn-primary">
									<span id="catbtnTitle">Add Page</span>
								</button>
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