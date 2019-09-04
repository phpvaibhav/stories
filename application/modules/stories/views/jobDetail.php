<?php $backend_assets=base_url().'backend_assets/'; ?>
<div class="row">
	<div class="col-sm-12">
		<div class="well well-sm">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-6">
					<div class="well well-light well-sm margin padding">
						<!-- button -->
						<ul class="demo-btns text-center">
							
								<?php
								$showbtn = false;
								$labelShow ="";
								switch ($job['jobStatus']) {
									case 0:

										$msg = "Are you sure want to start this job.";	 
										$showtitle = "Start Job";	 
										$status = 1;	 
										$btn = "btn-warning";	
										$showbtn = true; 
										$labelShow ='<label class="text-center center-block padding-10 label label-success"><i class="fa fa-refresh fa-spin" aria-hidden="true"></i>&nbsp;&nbsp;Open</label>';
										break;
									case 1:
										$msg = "Are you sure want to complete this job.";
										$status = 2;
										$btn = "btn-success";
										$showtitle = "Complete Job";	
										$showbtn = true;  
										$labelShow ='<label class="text-center center-block padding-10 label label-warning"><i class="fa fa-spinner fa-spin" aria-hidden="true"></i>&nbsp;&nbsp;In Progress</label>';
										break;
									case 2:
										$msg = "";
										$showbtn = false;
										$status = 0;
										$btn = "btn-warning";
										$showtitle="";
										$labelShow ='<label class="text-center center-block padding-10 label label-success"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;Completed</label>';
										break;
									
									default:
										$msg = "";
										$showbtn = false;
										$status = 0;
										$btn = "btn-warning";
										$showtitle="";
										break;
								}

								if($showbtn):
								
								?>
								
						<!-- <li>		<a href="javascript:void(0);" onclick="jobStatus(this);" data-message="<?php echo $msg; ?>" data-useid="<?php echo encoding($job['jobId']);?>"data-status="<?php echo $status;?>"  class="btn btn-labeled  <?php echo $btn; ?>"> <span class="btn-label"><i class="glyphicon glyphicon-tags"></i></span><?php echo $showtitle; ?></a> 	</li> -->
								
						
							<?php endif; if($job['jobStatus'] !=2): ?>
							
							<li>
								<a href="javascript:void(0);" class="btn btn-labeled btn-info" data-toggle="modal" data-target="#editJob"> <span class="btn-label"><i class="glyphicon glyphicon-edit"></i></span>Edit </a>
							</li>
							
							<li>
								<a href="javascript:void(0);" class="btn btn-labeled btn-danger" onclick="jobDelete(this);" data-message="Are you sure want to delete this job." data-useid="<?php echo encoding($job['jobId']);?>"> <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Delete </a>
							</li>
							<?php endif; ?>
						</ul>
						<!-- button -->
						<div class="timeline-seperator text-center"></div>
						<header>
							<h5>Basic Information
								
							 </h5>
						</header>
						<div class="timeline-seperator text-center"></div>
						<br>
						
							<div class="row" >
								
								<div class="col-lg-12 col-md-12 col-sm-12" >
									<strong>Job Status</strong>
									<span class="pull-right"> <?php echo $labelShow; ?></span>
								</div>
							</div>
					
						<fieldset>
							<ul class="list-unstyled">
								
								<li class="list-group-item">
									<span class="pull-right txt-color-darken"><?php echo $job['jobName']; ?></span>	<strong> Job Name</strong>
								</li>
								<li class="list-group-item">
									<span class="pull-right txt-color-darken"><?php echo $job['jobType']; ?></span>	<strong> Job Type</strong>
								</li>
								<li class="list-group-item">
									<span class="pull-right txt-color-darken"><?php echo $job['customerName']; ?></span>	<strong> Customer Name</strong>
								</li>
								<li class="list-group-item">
									<span class="pull-right txt-color-darken"><?php echo $job['driverName']; ?></span>	<strong> Driver Name</strong>
								</li>
								<li class="list-group-item">
									<span class="pull-right txt-color-darken"><?php echo date("d F Y",strtotime($job['startDate']))." ".$job['startTime']; ?></span>	<strong>Creation Date</strong>
								</li>
								
							
							</ul>
						</fieldset>							
						
						<div class="timeline-seperator text-center"></div>
								
					</div>
				</div>
				<div class="col-sm-12 col-md-12 col-lg-6">
					<div class="well well-light well-sm margin padding">
						<div class="timeline-seperator text-center"></div>
					<header>
						<h5>Address</h5>
					</header>
					<div class="timeline-seperator text-center"></div>
							

						<fieldset>
							<ul class="list-unstyled">
								<li class="list-group-item">
									<p><strong>Address</strong></p>
									<span class="txt-color-darken"><?php echo $job['address']; ?></span>
								</li>
								<li class="list-group-item">
									<span class="pull-right"><?php echo $job['street']." ".$job['street2']; ?></span>	<strong>Street</strong>
								</li>
								<li class="list-group-item">
									<span class="pull-right"><?php echo $job['city']; ?></span>	<strong>City</strong>
								</li>
								<li class="list-group-item">
									<span class="pull-right"><?php echo $job['state']; ?></span>	<strong>State</strong>
								</li>
								<li class="list-group-item">
									<span class="pull-right"><?php echo $job['zip'] ; ?></span>	<strong>Zip</strong>
								</li>
								<li class="list-group-item">
									<span class="pull-right"><?php echo $job['country']; ?></span>	<strong>Country</strong>
								</li>
								
							</ul>
							
						</fieldset>
					</div>
				</div>
			</div>
			<!-- Report -->
			<?php if(!empty($job['jobReport'])): $reports = json_decode($job['jobReport'],true);
				$before = isset($reports['beforeWork']) ?$reports['beforeWork']:array();
				$after = isset($reports['afterWork']) ?$reports['afterWork']:array();
			  ?>
			<div class="row">
			<!-- before -->
			<div class="col-sm-12 col-md-12 col-lg-6">
				<div class="well well-light well-sm margin padding">
					<div class="timeline-seperator text-center"></div>
						<header>
						<h5>Before Work</h5>
						</header>
					<div class="timeline-seperator text-center"></div>	
					<?php if(!empty($before)): ?>
						<fieldset>
							<ul class="list-unstyled">
							
								<li class="list-group-item">
									<span class="pull-right"><?php echo date("Y-m-d H:i A",strtotime($before['startDateTime'])); ?></span>	<strong>Start Job</strong>
								</li>
								<li class="list-group-item">
									<div class="row">
										<?php for ($i=0; $i <sizeof($before['workImage']) ; $i++) { ?>
										<div class="col-sm-4 col-md-4 col-lg-4">
											<img src="<?php echo S3JOBS_URL.$before['workImage'][$i];  ?>" class="img img-thumbnail" >
										</div>
										<?php } ?>
										
									</div>	
								</li>
								<li class="list-group-item">
									<p><strong>Comments</strong></p>
									<span class="txt-color-darken"><?php echo $before['comments']; ?></span>
								</li>
								<li class="list-group-item">
									
									<div class="row">
											<div class="col-sm-12 col-md-12 col-lg-12">
												<p class="pull-right"><img src="<?php echo S3JOBS_URL.$before['driverSignature'];  ?>" width="100" height="100"  class="img img-thumbnail"  ></p>
											</div>
											<div class="col-sm-12 col-md-12 col-lg-12">
												<p class="pull-right"><strong>Driver Signature</strong></p>
											</div>
									</div>
									
								</li>
							
							</ul>
					
							
						</fieldset>
					<?php endif; ?>
				</div>
			</div>
			<!-- before -->
			<!-- after -->
				<div class="col-sm-12 col-md-12 col-lg-6">
					<div class="well well-light well-sm margin padding">
						<div class="timeline-seperator text-center"></div>
					<header>
						<h5>After Work</h5>
					</header>
					<div class="timeline-seperator text-center"></div>	
						<?php if(!empty($after)): ?>
							<fieldset>
							<ul class="list-unstyled">
							
								<li class="list-group-item">
									<span class="pull-right"><?php echo date("Y-m-d H:i A",strtotime($after['endDateTime'])); ?></span>	<strong>End Job</strong>
								</li>
								<li class="list-group-item">
									<div class="row">
										<?php for ($i=0; $i <sizeof($after['workImage']) ; $i++) { ?>
										<div class="col-sm-4 col-md-4 col-lg-4">
											<img src="<?php echo S3JOBS_URL.$after['workImage'][$i];  ?>" class="img img-thumbnail" >
										</div>
										<?php } ?>
										
									</div>	
								</li>
								<li class="list-group-item">
									<p><strong>Comments</strong></p>
									<span class="txt-color-darken"><?php echo $after['comments']; ?></span>
								</li>
								<li class="list-group-item">
									<div class="row">
										
										
									
										<div class="col-sm-12 col-md-12 col-lg-12">
											<p class="pull-right"><img src="<?php echo S3JOBS_URL.$after['customerSignature'];  ?>" width="100" class="img img-thumbnail"  ></p>
											</div>
											<div class="col-sm-12 col-md-12 col-lg-12">
												<p class="pull-right"><strong>Customer Signature</strong></p>
											</div>
									</div>
								
								</li>
							
							</ul>
					
							
						</fieldset>
						<?php endif; ?>
						
					</div>
				</div>
				<!-- after -->

			</div>
		<?php endif; ?>
		<!-- Report -->
		</div>
	</div>
</div>

<!-- end row-->
<!-- Modal -->
<div class="modal fade" id="editJob" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Edit Job
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
														<input type="text" name="jobName" placeholder="Job Name" maxlength="100" size="100" value="<?php echo $job['jobName']; ?>">
														<input type="hidden" name="jobId" placeholder="Job Name" maxlength="100" size="100" value="<?php echo encoding($job['jobId']);?>">

													</label>
												</section>
												<section class="col col-6">
												    <label class="select">
												        <select name="jobTypeId">
												            <option value="" selected="" disabled="">Job Type</option>
												            <?php foreach ($jobTypes as $jt => $type) {?>
												            <option value="<?php echo $type->jobTypeId; ?>" <?php echo $job['jobTypeId']==$type->jobTypeId? "selected='selected'":""; ?>><?php echo $type->jobType; ?></option>
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
														<option value="<?php echo $driver->id; ?>" <?php echo $job['driverId']==$driver->id? "selected='selected'":""; ?>><?php echo $driver->fullName; ?></option>
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
											<div class="row">
												<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-calendar"></i>
														<input type="text" name="startDate" placeholder="Start Date" class="datepicker" data-dateformat='dd-mm-yy' readonly="" value="<?php echo date("d-m-Y",strtotime($job['startDate'])); ?>">
													</label>
												</section>
												<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-clock-o"></i>
														<input type="text" name="startTime" placeholder="Start Time" id="timepicker" class="" readonly="" value="<?php echo $job['startTime']; ?>">
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
														<input type="text" name="address" placeholder="Address" id="autocomplete0" class="autocomplete" data-id="0" value="<?php echo $job['address']; ?>" maxlength="300" size="300">
														<input type="hidden" class="latitudeautocomplete0" name="latitude" placeholder="latitude" value="<?php echo $job['latitude']; ?>">
														<input type="hidden" class="longitudeautocomplete0" name="longitude" placeholder="longitude" value="<?php echo $job['longitude']; ?>">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-3">
													<label class="input"> <i class="icon-append fa fa-map-marker"></i>
														<input type="text" name="street" placeholder="Street" class="street_numberautocomplete0" value="<?php echo $job['street']; ?>" maxlength="20" size="20">
													</label>
												</section>
												<section class="col col-9">
													<label class="input"> <i class="icon-append fa fa-map-marker"></i>
													<input type="text" name="street2" placeholder="Street Second" class="routeautocomplete0" value="<?php echo $job['street2']; ?>" maxlength="60" size="60">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-map-marker"></i>
														<input type="text" name="city" placeholder="City" class="localityautocomplete0" value="<?php echo $job['city']; ?>" maxlength="30" size="30">
													</label>
												</section>
												<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-map-marker"></i>
													<input type="text" name="state" placeholder="State" class="administrative_area_level_1autocomplete0" value="<?php echo $job['state']; ?>" maxlength="30" size="30">
													</label>
												</section>
											</div>
											<div class="row">
												<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-map-marker"></i>
														<input type="text" name="zip" placeholder="Zip Code" class="postal_codeautocomplete0" value="<?php echo $job['zip']; ?>" maxlength="30" size="30">
													</label>
												</section>
												<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-map-marker"></i>
													<input type="text" name="country" placeholder="Country" class="countryautocomplete0" value="<?php echo $job['country']; ?>" maxlength="30" size="30">
													</label>
												</section>
											</div>

										</fieldset>
										
										<footer>
											<button type="submit" id="submit" class="btn btn-primary">
												Update Job
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