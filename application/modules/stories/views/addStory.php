<!-- START ROW -->
<div class="row">
	<!-- NEW COL START -->
	<article class="col-sm-12 col-md-12 col-lg-6">	
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
					
					<form id="createStory" class="smart-form">
						<fieldset>
							<section>
								<label class="input"> <i class="icon-append fa fa-user"></i>
									<input type="text" name="title" placeholder="Title">
									<b class="tooltip tooltip-bottom-right">Needed to enter the title</b> </label>
							</section>
							<div class="row">
												<section class="col col-6">
												
												<select style="width:100%;" class="select2" name="categoryId" data-placeholder="Please select a Category">
														<optgroup label="">
														
														<?php foreach ($categories as $k => $category) {?>
														<option value="<?php echo $category->categoryId; ?>"><?php echo $category->category; ?></option>
														<?php }?>
														</optgroup>
													</select>
												</section>
												<section class="col col-6">
													<select style="width:100%;" class="select2" name="customerId" data-placeholder="Please select a customer">
														<optgroup label="">
														<option></option>
														<?php foreach ($customers as $c => $customer) {?>
														<option value="<?php echo $customer->id; ?>" <?php echo $job['customerId']==$customer->id? "selected='selected'":""; ?>><?php echo $customer->fullName; ?></option>
														<?php }?>
														</optgroup>
													</select>
												</section>
											</div>

						
						</fieldset>

						<fieldset>
							
						</fieldset>
						<footer>
							<button type="submit" id="submit" class="btn btn-primary">
								Add
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