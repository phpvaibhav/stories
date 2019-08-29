    <!-- widget grid -->
        <section id="widget-grid" class="">
        
           <!-- Widgets -->
            <div class="row clearfix">
              
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <a href="<?php echo base_url('category'); ?>">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-cube"></i>
                        </div>
                        <div class="content">
                            <div class="text">Categories</div>
                            <div class="number count-to"><?php echo $category; ?></div>
                        </div>
                    </div>
                  </a>
                </div> 
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <a href="<?php echo base_url('subCategory'); ?>">
                    <div class="info-box bg-red hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-cubes"></i>
                        </div>
                        <div class="content">
                            <div class="text">Sub Categories</div>
                            <div class="number count-to"><?php echo $subCategory; ?></div>
                        </div>
                    </div>
                  </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <a href="<?php echo base_url('story'); ?>">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-book"></i>
                        </div>
                        <div class="content">
                            <div class="text">Stories</div>
                            <div class="number count-to"><?php echo $stories; ?></div>
                        </div>
                    </div>
                  </a>
                </div>
               
                  <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <a href="<?php echo base_url('customers'); ?>">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="content">
                            <div class="text">Customers</div>
                            <div class="number count-to"><?php echo $customers; ?></div>
                        </div>
                    </div>
                  </a>
                </div>
            </div>
            <!-- #END# Widgets -->
        
        </section>
        <!-- end widget grid -->