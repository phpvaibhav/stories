<style type="text/css">
    /**
 * Error color for the validation plugin
 */

.invalid {
  color: #e74c3c;
}
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="page-wrapper">
            <div class="row">
                <div class="col-lg-5">
                    <?php echo $row['description']; ?>
                </div>
                <div class="col-lg-7">
                    <form class="form-wrapper" action="contactUs" id="contactUs" novalidate="novalidate" autocomplete="off" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input  type="text" name="fullName" class="form-control" id="fullName" placeholder="Your name">


                    </div> 
                    <div class="form-group">
                        <label for="email">Email</label>
                     
                      <input type="text" name="email" id="email" class="form-control" placeholder="Email address">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact </label>
                     
                     
                       <input type="text" name="contact" id="contact" class="form-control number-only" placeholder="Phone" data-mask="999-999-9999">
                    </div> 
                    <div class="form-group">
                        <label for="subject">Subject </label>
                       <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
                    </div>
                    <div class="form-group">
                        <label for="message">Message </label>
                      <textarea class="form-control" name="message" placeholder="Your message"></textarea>
                    </div>
                   <div class="form-group">
                         <button type="submit"  id="submit" class="btn btn-primary">Send <i class="fa fa-envelope-open-o"></i></button>
                    </div>
                 
                      

                    </form>
                </div>
            </div>
        </div><!-- end page-wrapper -->
    </div><!-- end col -->
</div><!-- end row -->
