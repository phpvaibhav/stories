<?php $frontend_assets =  base_url().'frontend_assets/';?>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="widget">
                        <div class="footer-text text-left">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo $frontend_assets; ?>images/version/full-logo.png" alt="" class="img-fluid"></a>
                            <p>Lojanlo is a sharing blog, we sharing stories, news and articles.</p>
                            <div class="social">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>              
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube-square"></i></a>
                                
                            </div>

                            <hr class="invis">
  <div class="link-widget">
                            <ul>
                                <li><a href="#">Recent <span>(21)</span></a></li>
                                <li><a href="#">Featured  <span>(15)</span></a></li>
                             
                            </ul>
                        </div>
                          <!--   <div class="newsletter-widget text-left">
                                <form class="form-inline">
                                    <input type="text" class="form-control" placeholder="Enter your email address">
                                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                                </form>
                            </div> --><!-- end newsletter -->
                        </div><!-- end footer-text -->
                    </div><!-- end widget -->
                </div><!-- end col -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Popular Categories</h2>
                        <div class="link-widget">
                            <ul>
                                <li><a href="#">Marketing <span>(21)</span></a></li>
                                <li><a href="#">SEO Service <span>(15)</span></a></li>
                                <li><a href="#">Digital Agency <span>(31)</span></a></li>
                                <li><a href="#">Make Money <span>(22)</span></a></li>
                                <li><a href="#">Blogging <span>(66)</span></a></li>
                            </ul>
                        </div><!-- end link-widget -->
                    </div><!-- end widget -->
                </div><!-- end col -->

                <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget">
                        <h2 class="widget-title">Copyrights</h2>
                        <div class="link-widget">
                            <ul>
                                <li><a href="<?php echo base_url('about-us'); ?>">About us</a></li>
                                 <li><a href="<?php echo base_url().'term-conditions'; ?>">Term & Conditions</a></li>
                                <li><a href="<?php echo base_url().'privacy-policy'; ?>">Privacy Policy</a></li>
                                <li><a href="<?php echo base_url().'contact-us'; ?>">Contact us</a></li>
                               
                               
                            </ul>
                        </div><!-- end link-widget -->
                    </div><!-- end widget -->
                </div><!-- end col -->
            </div>

            <div class="row">
                <div class="col-md-12 text-center">
                    <br>
                    <div class="copyright"><?php echo COPYRIGHT; ?> <a href="javascript:void(0);"></a>.</div>
                </div>
            </div>
        </div><!-- end container -->
    </footer><!-- end footer -->

    <div class="dmtop">Scroll to Top</div>
    
</div><!-- end wrapper -->

<!-- Core JavaScript
================================================== -->
<script src="<?php echo $frontend_assets; ?>js/jquery.min.js"></script>
<script src="<?php echo $frontend_assets; ?>js/tether.min.js"></script>
<script src="<?php echo $frontend_assets; ?>js/bootstrap.min.js"></script>
<script src="<?php echo $frontend_assets; ?>js/custom.js"></script>

</body>
</html>