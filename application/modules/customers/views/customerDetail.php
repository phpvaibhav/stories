
<?php $backend_assets=base_url().'backend_assets/'; ?>
<div class="row">
	<div class="col-sm-12">
		<div class="well well-sm">
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-4">
					<div class="well well-light well-sm margin padding">
						<ul class="demo-btns text-center">
											
									
											
											<li>
												<a href="javascript:void(0);" class="btn btn-labeled btn-info" data-toggle="modal" data-target="#editCustomers"> <span class="btn-label"><i class="glyphicon glyphicon-edit"></i></span>Edit </a>
											</li>
											<li>
												<a href="javascript:void(0);" class="btn btn-labeled btn-danger" onclick="customerDelete(this);" data-message="Are you sure want to delete this customer." data-useid="<?php echo encoding($customer['id']);?>"> <span class="btn-label"><i class="glyphicon glyphicon-trash"></i></span>Delete </a>
											</li>
										
										</ul>
						<header>
							<h5>Customer Information </h5>
						</header>
						<div class="timeline-seperator text-center"></div>
						<br>

						<fieldset>
							<ul class="list-unstyled">
						
							<li class="list-group-item">
								<span class="pull-right"><?php echo ucfirst($customer['fullName']); ?></span>	<strong>Customer Name</strong>
							</li>
							<li class="list-group-item">
								<span class="pull-right"><?php echo $customer['email']; ?></span>	<strong>Email</strong>
							</li>
							<li class="list-group-item">
								<span class="pull-right"><?php echo $customer['contactNumber']; ?></span>	<strong>Contact Number</strong>
							</li>
						</ul>
					</fieldset>
	
					
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<!-- end row-->
<!-- Modal -->
<div class="modal fade" id="editCustomers" tabindex="-1" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					&times;
				</button>
				<h4 class="modal-title">
					Edit Customer
				</h4>
			</div>
			<div class="modal-body">
	           <!-- Add CUstomer -->
		<!-- widget content -->
								<div class="widget-body no-padding">
									
									<form action="customers/addCustomer" id="customerAddUpdate" class="smart-form" novalidate="novalidate" autocomplete="off">
										<header>
											Basic Information
										</header>

										<fieldset>
											<div class="row">
												<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-user"></i>
														<input type="text" name="fullName" placeholder="Customer Name" value="<?php echo ucfirst($customer['fullName']); ?>" maxlength="60" size="60">
														<input type="hidden" name="cus" value="<?php echo encoding($customer['id']);?>">
													</label>
												</section>
												<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-envelope-o"></i>
														<input type="email" name="email" placeholder="E-mail" value="<?php echo $customer['email']; ?>" maxlength="60" size="60">
													</label>
												</section>
											</div>

											<div class="row">
											<!-- 	<section class="col col-6">
													<label class="input"> <i class="icon-append fa fa-lock"></i>
														<input type="password" name="password" placeholder="Password">
													</label>
												</section> -->
												<section class="col col-md-12">
													<label class="input"> <i class="icon-append fa fa-phone"></i>
														<input type="text" name="contactNumber" placeholder="Contact Number" data-mask="(999) 999-9999" value="<?php echo $customer['contactNumber']; ?>">
													</label>
												</section>
											</div>
										</fieldset>
									
										
										<footer>
											<button type="submit" id="submit" class="btn btn-primary">
												Update Customer
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