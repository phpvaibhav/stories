runAllForms();
//loader manage
function preLoadshow(e){
  if(e){
      $('.pace').addClass('pace-active').removeClass('pace-inactive');
  }else{
     $('.pace').addClass('pace-inactive').removeClass('pace-active');
  }
}//end function
//loader manage

//number check 
$('.number-only').keypress(function(e) {
  if(isNaN(this.value+""+String.fromCharCode(e.charCode))) return false;
}).on("cut copy paste",function(e){
  e.preventDefault();
});
$(".floatNumeric").on("keypress keyup blur",function (event) {
  //this.value = this.value.replace(/[^0-9\.]/g,'');
  $(this).val($(this).val().replace(/[^0-9\.]/g,''));
  if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
    event.preventDefault();
  }
});
$(".alfaNumeric").on("keypress keyup blur",function (event) {
  if (this.value.match(/[^a-zA-Z0-9 ]/g)) {
    this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '');
  }
});

//date  picker manange
$( "#purchaseDate" ).datepicker({  
  dateFormat: 'mm/dd/yyyy'
});
/*
  * TIMEPICKER
*/ 
$('#timepicker').timepicker();
$('.select2').select2({
    minimumResultsForSearch: -1,
    placeholder: function(){
        $(this).data('placeholder');
    }
});

  $("#dob").datepicker({
           dateFormat: 'dd-mm-yy',
            maxDate: new Date(),
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
            prevText: '<i class="fa fa-chevron-left"></i>',
            nextText: '<i class="fa fa-chevron-right"></i>',
         
      
        });


  