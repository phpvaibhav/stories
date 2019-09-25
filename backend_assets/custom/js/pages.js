$("#pageAddUpdate").validate({// Rules for form validation
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
    title : {
      required : true
    }, pageUrl : {
      required : true
    },
  description : {
      required : true
    },
  
   

  },
  // Messages for form validation
  messages : {
    title : {
      required : 'Please enter your title'
    }, pageUrl : {
      required : 'Please enter your Page Type'
    },
    description : {
      required : 'Please enter your description',

    }
  },
  // Ajax form submition
  submitHandler : function(form) {
    toastr.clear();
       $('#submit').prop('disabled', true);
      $.ajax({
        type: "POST",
        url: base_url+'adminapi/'+$(form).attr('action'),
        headers: { 'authToken':authToken},
        data: $(form).serialize(),
        cache: false,
        beforeSend: function() {
          preLoadshow(true);
          $('#submit').prop('disabled', true);  
        },     
        success: function (res) {
          preLoadshow(false);
          setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
          if(res.status=='success'){
            toastr.success(res.message, 'Success', {timeOut: 3000});
           // setTimeout(function(){window.location.reload(); },4000);
            setTimeout(function(){window.location = base_url+'pages'; },4000);
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
/*listing job */
var page_list = $('#page_list').DataTable({ 

              "processing": true, //Feature control the processing indicator.
              "serverSide": true, //Feature control DataTables' servermside processing mode.
              "order": [], //Initial no order.
               "lengthChange": false,
              "oLanguage": {
               "sEmptyTable" : '<center>No page found</center>',
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
              },
               "oLanguage": {
               "sZeroRecords" : '<center>No page found</center>',
                 "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
              },
               initComplete: function () {
    $('.dataTables_filter input[type="search"]').css({ 'height': '32px'});
    },
             
              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": base_url+"adminapi/pages/pageList",
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
        /*listing customer_list*/

//job status      
function pageStatus(e){
  swal({
  title: "Are you sure?",
  text:  $(e).data('message'),
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes",
  cancelButtonText: "No",
  closeOnConfirm: true,
  closeOnCancel: true,
 // showLoaderOnConfirm: true
},
function(isConfirm) {
  if (isConfirm) {
    /*ajax*/
    $.ajax({
                 type: "POST",
                 url: base_url+'adminapi/pages/pageStatus',
                 data: {use:$(e).data('useid'), status:$(e).data('status') },
                 headers: { 'authToken':authToken},
                  cache: false,
           beforeSend: function() {
          
               preLoadshow(true);
                  },     
                 success: function (res) {
                   preLoadshow(false);
                  if(res.status=='success'){
                   
                   toastr.success(res.message, 'Success', {timeOut: 3000});
                 //  swal("Success", "Your process  has been successfully done.", "success");
                  setTimeout(function(){window.location.reload(); },2000);
                  }else{
                    toastr.error(res.message, 'Alert!', {timeOut: 5000});
                  }
                  
                     
                 }
             });
    /*ajax*/
   
  } else {
    //swal("Cancelled", "Your Process has been Cancelled", "error");
  }
});
}
//job status      
function pageDelete(e){
  swal({
  title: "Are you sure?",
  text:  $(e).data('message'),
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes",
  cancelButtonText: "No",
  closeOnConfirm: true,
  closeOnCancel: true,
 // showLoaderOnConfirm: true
},
function(isConfirm) {
  if (isConfirm) {
    /*ajax*/
    $.ajax({
                 type: "POST",
                 url: base_url+'adminapi/pages/pageDelete',
                 data: {use:$(e).data('useid')},
                 headers: { 'authToken':authToken},
                  cache: false,
           beforeSend: function() {
          
               preLoadshow(true);
                  },     
                 success: function (res) {
                   preLoadshow(false);
                  if(res.status=='success'){
                   
                   toastr.success(res.message, 'Success', {timeOut: 3000});
                 //  swal("Success", "Your process  has been successfully done.", "success");
                 setTimeout(function(){  window.location = base_url+'pages'; },3000);
                  }else{
                    toastr.error(res.message, 'Alert!', {timeOut: 5000});
                  }
                  
                     
                 }
             });
    /*ajax*/
   
  } else {
    //swal("Cancelled", "Your Process has been Cancelled", "error");
  }
});
} //end function
