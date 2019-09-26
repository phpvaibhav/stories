var errorClass = 'invalid';
var errorElement = 'em';
 var base_url = $('body').data('base-url'); // Base url
//sign up
$("#contactUs").validate({// Rules for form validation
   errorClass    : errorClass,
   errorElement  : errorElement,
  highlight: function(element) {
        $(element).parent().removeClass('state-success').addClass("state-error");
        $(element).removeClass('valid');
    },
    unhighlight: function(element) {
        $(element).parent().removeClass("state-error").addClass('state-success');
        $(element).addClass('valid');
    },
  rules : {
    fullName : {
      required : true
    },
    email : {
      required : true,
      email : true
    },
    contact : {
      required : true,
    
    },  subject : {
      required : true,
    
    },
   message : {
      required : true,
    
    }
  },
  // Messages for form validation
  messages : {
    fullName : {
      required : 'Please enter your customer name'
    },
    email : {
      required : 'Please enter your email address',
      email : 'Please enter a valid email address'
    },
    contact : {
      required : 'Please enter your contact number'
    },
    subject : {
      required : 'Please enter your subject'
    },
    message : {
      required : 'Please enter your message'
    }
  },
  // Ajax form submition
  submitHandler : function(form) {
    toastr.clear();
       $('#submit').prop('disabled', true);
      $.ajax({
        type: "POST",
        url: base_url+'adminapi/contactus/'+$(form).attr('action'),
        data: $(form).serialize(),
        cache: false,
        beforeSend: function() {
         
          $('#submit').prop('disabled', true);  
        },     
        success: function (res) {
        
          setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
          if(res.status=='success'){
            toastr.success(res.message, 'Success', {timeOut: 3000});
            setTimeout(function(){window.location.reload(); },4000);
          }else{
            toastr.error(res.message, 'Alert!', {timeOut: 4000});
          }
        }
      });
     return false; // required to block normal submit since you used ajax
  },
  // Do not change code below
  errorPlacement : function(error, element) {
    error.insertAfter(element.parent());
  }
});
/*listing contacts_list */
var contacts_list = $('#contacts_list').DataTable({ 

              "processing": true, //Feature control the processing indicator.
              "serverSide": true, //Feature control DataTables' servermside processing mode.
              "order": [], //Initial no order.
               "lengthChange": false,
              "oLanguage": {
               "sEmptyTable" : '<center>No contact us found</center>',
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
              },
               "oLanguage": {
               "sZeroRecords" : '<center>No contact us found</center>',
                 "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
              },
               initComplete: function () {
    $('.dataTables_filter input[type="search"]').css({ 'height': '32px'});
    },
             
              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": base_url+"adminapi/contactus/contactList",
                  "type": "POST",
                  "dataType": "json",
                  "headers": { 'authToken':authToken},
                  "dataSrc": function (jsonData) {
                     
                      return jsonData.data;
                  }
              },
              //Set column definition initialisation properties.
              "columnDefs": [
                  { orderable: false, targets: -1 },
                  
              ]

          });
        /*listing contactList*/

    $('.number-only').keypress(function(e) {
  if(isNaN(this.value+""+String.fromCharCode(e.charCode))) return false;
}).on("cut copy paste",function(e){
  e.preventDefault();
});