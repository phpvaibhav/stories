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
					<span class="widget-icon"> <i class="fa fa-tasks"></i> </span>
					<h2>Jobs</h2>
				
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
						<table id="job_list" class="table table-striped table-bordered table-hover" width="100%">
							<thead>			                
								<tr>
									<th data-hide="phone">ID</th>
									<th data-hide="phone">Job Name</th>
									<th data-hide="phone,tablet">Job Type</th>
									<th data-hide="phone,tablet">Customer</th>
									<th data-hide="phone,tablet">Driver</th>
									<th data-hide="phone,tablet">Creation Date</th>
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
<div class="modal fade" id="addJob" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					New Job
				</h4>
			</div>
			<div class="modal-body">
	           <!-- Add CUstomer -->
		<!-- widget content -->
								<div class="widget-body no-padding">
									
									<form action="jobs/createJob" id="createJob" class="smart-form" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
										<header>
											Basic Information
										</header>

										<fieldset>
											<div class="row">
												<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-bookmark"></i>
														<input type="text" name="jobName" placeholder="Job Name" maxlength="100" size="100">
													</label>
												</section>
												<section class="col col-6">
												    <label class="select">
												        <select name="jobTypeId">
												            <option value="" selected="" disabled="">Job Type</option>
												            <?php foreach ($jobTypes as $jt => $type) {?>
												            <option value="<?php echo $type->jobTypeId; ?>"><?php echo $type->jobType; ?></option>
												        	<?php } ?>
												           
												        </select> <i></i> </label>
												</section>
											</div>
											<div class="row">
												<section class="col col-6">
												
												<select style="width:100%;" class="select2" name="driverId" data-placeholder="Please select a driver">
														<optgroup label="">
														<option></option>
														<?php foreach ($drivers as $k => $driver) {?>
														<option value="<?php echo $driver->id; ?>"><?php echo $driver->fullName; ?></option>
														<?php }?>
														</optgroup>
													</select>
												</section>
												<section class="col col-6">
													<select style="width:100%;" class="select2" name="customerId" data-placeholder="Please select a customer">
														<optgroup label="">
														<option></option>
														<?php foreach ($customers as $c => $customer) {?>
														<option value="<?php echo $customer->id; ?>"><?php echo $customer->fullName; ?></option>
														<?php }?>
														</optgroup>
													</select>
												</section>
											</div>
											<div class="row">
												<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-calendar"></i>
														<input type="text" name="startDate" placeholder="Start Date" class="datepicker" data-dateformat='dd-mm-yy' readonly="">
													</label>
												</section>
												<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-clock-o"></i>
														<input type="text" name="startTime" placeholder="Start Time" id="timepicker" class="" readonly="">
													</label>
												</section>
											</div>
										</fieldset>
										<header>
											Address
										</header>

										<fieldset>
											<div class="row">
												<section class="col col-md-12">
													<label class="input"> <i class="icon-append fa fa-map-marker"></i>
														<input type="text" name="address" placeholder="Address" id="autocomplete0" class="autocomplete" data-id="0" maxlength="300" size="300">
														<input type="hidden" class="latitudeautocomplete0" name="latitude" placeholder="latitude">
														<input type="hidden" class="longitudeautocomplete0" name="longitude" placeholder="longitude">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-3">
													<label class="input"> <i class="icon-append fa fa-map-marker"></i>
														<input type="text" name="street" placeholder="Street" class="street_numberautocomplete0" maxlength="20" size="20">
													</label>
												</section>
												<section class="col col-9">
													<label class="input"> <i class="icon-append fa fa-map-marker"></i>
													<input type="text" name="street2" placeholder="Street Second" class="routeautocomplete0" maxlength="60" size="60">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-map-marker"></i>
														<input type="text" name="city" placeholder="City" class="localityautocomplete0" maxlength="30" size="30">
													</label>
												</section>
												<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-map-marker"></i>
													<input type="text" name="state" placeholder="State" class="administrative_area_level_1autocomplete0" maxlength="30" size="30">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-map-marker"></i>
														<input type="text" name="zip" placeholder="Zip Code" class="postal_codeautocomplete0" maxlength="30" size="30">
													</label>
												</section>
												<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-map-marker"></i>
													<input type="text" name="country" placeholder="Country" class="countryautocomplete0" maxlength="30" size="30">
													</label>
												</section>
											</div>

										</fieldset>
										
										<footer>
											<button type="submit" id="submit" class="btn btn-primary">
												Add Job
											</button>
										</footer>
									</form>

								</div>
								<!-- end widget content -->
	           <!-- Add CUstomer -->
	        </div>
		</div>
	</div>
</div>
<!-- End modal -->