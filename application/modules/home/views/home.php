<?php $frontend_assets =  base_url().'frontend_assets/';$check=false; ?>
<div class="page-wrapper">   
            <div class="row">
            <div class="col-lg-10 offset-lg-1">
              <!--   <div class="banner-spot clearfix">
                    <div class="banner-img"> -->
                            <!-- goglgle ads -->
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- horizonatal ads -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6590198198242605"
     data-ad-slot="1318163369"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                            <!-- goglgle ads -->
                        <!-- <img src="<?php echo $frontend_assets; ?>upload/banner_02.jpg" alt="" class="img-fluid"> -->
                   <!--  </div> --><!-- end banner-img -->
               <!--  </div> --><!-- end banner -->
            </div><!-- end col -->
        </div><!-- end row -->
        <hr class="invis">
        <!-- Recent Stories -->
        <div id="homePageRecent" ></div>
        <!-- Recent Stories -->
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
              <!--   <div class="banner-spot clearfix">
                    <div class="banner-img"> -->
       <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- middle banner -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-6590198198242605"
     data-ad-slot="6987640057"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                     <!--    <img src="<?php echo $frontend_assets; ?>upload/banner_02.jpg" alt="" class="img-fluid"> -->
                  <!--   </div> --><!-- end banner-img -->
               <!--  </div> --><!-- end banner -->
            </div><!-- end col -->
        </div><!-- end row -->
        <hr class="invis">
        <!-- Recent Stories -->
        <div id="homePageisFeatured" ></div>
        <!-- Recent Stories -->
</div><!-- end page-wrapper -->

<hr class="invis">
<?php if($check): ?>
<div class="row">
    <div class="col-md-12">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-start">
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div><!-- end col -->
</div><!-- end row -->
<?php endif; ?>
<script type="text/javascript">
    $( document ).ready(function() {
   
    data_fun('home/item/homeItem','Recent','homePageRecent');
    data_fun('home/item/homeItem','Featured','homePageisFeatured');
});
</script>