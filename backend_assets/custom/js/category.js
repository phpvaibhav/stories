/*******************************************************/
$("#categoryAddUpdate").validate({// Rules for form validation
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
    category : {
      required : true
    }
  },
  // Messages for form validation
  messages : {
    category : {
      required : 'Please enter category'
    },
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
/*listing category_list */
var category_list = $('#category_list').DataTable({ 

              "processing": true, //Feature control the processing indicator.
              "serverSide": true, //Feature control DataTables' servermside processing mode.
              "order": [], //Initial no order.
               "lengthChange": false,
              "oLanguage": {
               "sEmptyTable" : '<center>No category found</center>',
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
              },
               "oLanguage": {
               "sZeroRecords" : '<center>No category found</center>',
                 "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
              },
               initComplete: function () {
    $('.dataTables_filter input[type="search"]').css({ 'height': '32px'});
    },
             
              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": base_url+"adminapi/category/categoryList",
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

/*listing vehilce_list*/
function categoryStatus(e){
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
                 url: base_url+'adminapi/category/categoryStatus',
                 data: {use:$(e).data('useid') },
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
                 $('#category_list').DataTable().ajax.reload();
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
//categoryDelete Delete
function categoryDelete(e){
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
     $(e).prop('disabled', true);
    /*ajax*/
    $.ajax({
                 type: "POST",
                 url: base_url+'adminapi/category/categoryDelete',
                 data: {use:$(e).data('useid') },
                 headers: { 'authToken':authToken},
                  cache: false,
           beforeSend: function() {
          
               preLoadshow(true);
                  },     
                 success: function (res) {
                   preLoadshow(false);
                     $(e).prop('disabled', false);
                  if(res.status=='success'){
                   
                   toastr.success(res.message, 'Success', {timeOut: 3000});
                 //  swal("Success", "Your process  has been successfully done.", "success");
                  setTimeout(function(){  window.location = base_url+'vehicles'; },3000);

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

/// Create job 
/// Edit category
function categoryEdit(e){
    $('#catTitle').html('Edit Category');
    $('#catbtnTitle').html('Update Category');
    var showmenu =  $(e).data('showmenu');
    var categoryId =  $(e).data('categoryid');
    $('#category').val($(e).data('category'));
    $('#categoryId').val(categoryId);
     $('input[name="showMenu"][value="' + showmenu + '"]').prop('checked', true);
  //  $('input:radio[name='+showMenu+']').attr('checked',true);
    $('#addCategory').modal('toggle'); 
}//end function
/// sub category
/*******************************************************/
$("#subcategoryAddUpdate").validate({// Rules for form validation
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
    subCategory : {
      required : true
    },
    categoryId : {
      required : true
    }
  },
  // Messages for form validation
  messages : {
    subCategory : {
      required : 'Please enter sub category'
    }, categoryId : {
      required : 'Please enter category'
    },
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
/*listing category_list */
var subcategoryList = $('#subcategoryList').DataTable({ 

              "processing": true, //Feature control the processing indicator.
              "serverSide": true, //Feature control DataTables' servermside processing mode.
              "order": [], //Initial no order.
               "lengthChange": false,
              "oLanguage": {
               "sEmptyTable" : '<center>No category found</center>',
                "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
              },
               "oLanguage": {
               "sZeroRecords" : '<center>No category found</center>',
                 "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>' 
              },
               initComplete: function () {
    $('.dataTables_filter input[type="search"]').css({ 'height': '32px'});
    },
             
              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": base_url+"adminapi/category/subcategoryList",
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

/*listing vehilce_list*/
function subcategoryStatus(e){
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
                 url: base_url+'adminapi/category/subcategoryStatus',
                 data: {use:$(e).data('useid') },
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
                 $('#subcategoryList').DataTable().ajax.reload();
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
//categoryDelete Delete
function subcategoryDelete(e){
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
     $(e).prop('disabled', true);
    /*ajax*/
    $.ajax({
                 type: "POST",
                 url: base_url+'adminapi/category/subcategoryDelete',
                 data: {use:$(e).data('useid') },
                 headers: { 'authToken':authToken},
                  cache: false,
           beforeSend: function() {
          
               preLoadshow(true);
                  },     
                 success: function (res) {
                   preLoadshow(false);
                     $(e).prop('disabled', false);
                  if(res.status=='success'){
                   
                   toastr.success(res.message, 'Success', {timeOut: 3000});
                 //  swal("Success", "Your process  has been successfully done.", "success");
                //  setTimeout(function(){  window.location = base_url+'vehicles'; },3000);

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

/// Create job 
/// Edit category
function subcategoryEdit(e){
    $('#catTitle').html('Edit Sub Category');
    $('#catbtnTitle').html('Update Sub Category');
   
    var subCategoryId =  $(e).data('subcategoryid');
    var categoryId =  $(e).data('categoryid');
    $('#subCategory').val($(e).data('subcategory'));
    $('#subCategoryId').val(subCategoryId);
    alert(categoryId);
   $("#categoryId option[value='"+categoryId+"']").prop('selected', true);
 
  //  $('input:radio[name='+showMenu+']').attr('checked',true);
    $('#addsubCategory').modal('toggle'); 
}//end function
/// sub category
/*******************************************************/
$("#subcategoryAddUpdate").validate({// Rules for form validation
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
    subCategory : {
      required : true
    },
    categoryId : {
      required : true
    }
  },
  // Messages for form validation
  messages : {
    subCategory : {
      required : 'Please enter sub category'
    }, categoryId : {
      required : 'Please enter category'
    },
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
/// sub category
function getsubCategory(e){
    var categoryId = $(e).val();
     var list = $("#subCategoryId");
     $(list).html("");
    /*ajax*/
    $.ajax({
                 type: "POST",
                 url: base_url+'adminapi/category/categoryWiseSubCategory',
                 data: {categoryId:categoryId},
                 headers: { 'authToken':authToken},
                  cache: false,
           beforeSend: function() {
          
               preLoadshow(true);
                  },     
                 success: function (res) {
                   preLoadshow(false);
                  if(res.status=='success'){
                    console.log(res.subcategories);
                   
                    var items = res.subcategories;
                    var options;
                    options += '<option value="">Please select a Sub Category</option>';
                    $.each(items, function(index, object) {
                        
                        options += '<option value="' + object.subCategoryId + '">' + object.subCategory + '</option>';
                    });
                  

                    $(list).html(options);
                /*    $.each(items, function(index, item) {
                      list.append(new Option(item.subCategory, item.subCategoryId));
                    });*/
                  // toastr.success(res.message, 'Success', {timeOut: 3000});
               
                  }else{
                    toastr.error(res.message, 'Alert!', {timeOut: 5000});
                  }
                  
                     
                 }
             });
    /*ajax*/
} //end function
