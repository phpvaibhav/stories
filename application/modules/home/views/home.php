<?php $frontend_assets =  base_url().'frontend_assets/';$check=false; ?>
<div class="page-wrapper">   
        <!-- Recent Stories -->
        <div id="homePageRecent" ></div>
        <!-- Recent Stories -->
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="banner-spot clearfix">
                    <div class="banner-img">
                        <img src="<?php echo $frontend_assets; ?>upload/banner_02.jpg" alt="" class="img-fluid">
                    </div><!-- end banner-img -->
                </div><!-- end banner -->
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