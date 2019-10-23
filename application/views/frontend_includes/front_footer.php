        <?php $frontend_assets =  base_url().'frontend_assets/';?>
        </div><!-- end col -->

        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
            <div class="sidebar">
                <div class="widget">
                 <!--    <div class="banner-spot clearfix">
                        <div class="banner-img"> -->
                        <!--     <img src="<?php echo $frontend_assets; ?>upload/banner_07.jpg" alt="" class="img-fluid"> -->
                        <!-- ads -->
                  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- side vertical ads -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6590198198242605"
     data-ad-slot="6843335673"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                        <!-- ads -->
                        <!-- </div> --><!-- end banner-img -->
                   <!--  </div> --><!-- end banner -->
                </div><!-- end widget -->
                  <!----side menu----->
                <div id="sidePage"></div>
                <!----side menu----->
                 <div class="widget">
                  <!--   <div class="banner-spot clearfix">
                        <div class="banner-img"> -->
                          <!--   <img src="<?php echo $frontend_assets; ?>upload/banner_03.jpg" alt="" class="img-fluid"> -->
                          <!-- google ads -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- footer square -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6590198198242605"
     data-ad-slot="5522515145"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                          <!-- google ads -->
                       <!--  </div> --><!-- end banner-img -->
                  <!--   </div> --><!-- end banner -->
                </div><!-- end widget -->
            </div><!-- end sidebar -->
        </div><!-- end col -->
    </div><!-- end row -->
</div><!-- end container -->
</section>
<?php $frontend_assets =  base_url().'frontend_assets/';?>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="widget">
                        <div class="footer-text text-left">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo $frontend_assets; ?>images/version/full-logo(200x50).png" alt="" class="img-fluid"></a>
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
                               <?php if(isset($subMenus) && !empty($subMenus)){
                                foreach ($subMenus as $k => $submenu) {?>
                                <li><a href="<?php echo base_url().'main-category/'.trim($submenu->pageUrl); ?>"><?php echo ucfirst($submenu->category); ?> <!-- <span>(21)</span> --></a></li>
                                <?php } } ?>
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
                                <?php if(isset($menus) && !empty($menus)):
                                foreach ($menus as $k => $menu) { ?>
                                <li><a href="<?php echo base_url().'main-category/'.trim($menu->pageUrl); ?>"><?php echo ucfirst($menu->category); ?> <!-- <span>(21)</span> --></a></li>
                                <?php } endif; ?>
                             
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

<script src="<?php echo $frontend_assets; ?>js/tether.min.js"></script>
<script src="<?php echo $frontend_assets; ?>js/bootstrap.min.js"></script>

 <?php if(!empty($front_scripts)) { load_js($front_scripts);} //load required page scripts ?>

<script src="<?php echo $frontend_assets; ?>lojanlo/js/data.js"></script>
<script src="<?php echo $frontend_assets; ?>js/custom.js"></script>
</body>
</html>