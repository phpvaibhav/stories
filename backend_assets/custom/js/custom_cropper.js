
//croper
var $uploadCrop;
$(document).ready(function() {  
  $uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 600,
        height: 450,
        type: 'square'
    },
    boundary: {
        width: 800,
        height:600
    },
   // enforceBoundary: false,
   
});

});
  

$('.recImage').on('change', function () { 
	
		var i = $(this).data('ing');
	
	   $('#prev').val(i);
    var this_file = this.files[0];
    var reader = new FileReader();
    var img_error = $('#imgErr'+i);
    img_error.hide();
    reader.readAsDataURL(this_file);
    reader.onload = function (e) {
        var image = new Image(),
          img_src = e.target.result;
          image.src = e.target.result;
        
        //validation for image dimension
        image.onload = function() {
            // access image size here 
           // alert(this.width +"X"+this.height);
       /*     if(this.width<800 && this.height<600){
				
                img_error.html('Image dimension should be greater than 800x600px').show();
               // $("#preview"+i).html(''); //remove previous preview if present
                $('#recImageData'+i).val(''); //clear previous saved image data
                 $("#checkimg"+i).val(0);
                return false;
            }*/
             
            $uploadCrop.croppie('bind', {
                url: img_src,
               

              }).then(function(){
                console.log('jQuery bind complete');
                
              });
               $("#checkimg"+i).val(1);
               $('#prev').val(i);
              $('#imgConfirm').modal('show'); 
        };
          
    };
    //reader.readAsDataURL(this_file);      
});


$('#save').on('click', function (ev) {
  
  $uploadCrop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
    //size: 'blob'
  }).then(function (resp) {
            console.log(resp);
             var pt = $('#prev').val();
       $('#recImageData'+pt).val(resp);
      

       html = '<img src="' + resp + '" class="img-responsive img-thmbnail"/>';
    $("#preview"+pt).html(html);
    /* $('#imgConfirm').prop("data-backdrop" , '');
      $('#imgConfirm').prop("data-keyboard" , '');*/
      $('#imgConfirm').modal('hide');
  });

 
});

$('#imgConfirm').on('hidden.bs.modal',function(){
     var pt = $('#prev').val();
   var set = $('#recImageData'+pt).val();
   if(set == ''){

       $('#recRemove'+pt).val('');
      /*$('#errorDiv').css('display', 'block');
      setTimeout(function(){
                          
       $('.alert-danger').fadeOut('fast');
      }, 4000);
      $('#imgConfirm').modal({backdrop: 'static', keyboard: false})  */
      
   }
});