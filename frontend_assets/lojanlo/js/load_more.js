var base_url = $('body').data('base-url');

$(document).ready(function(){

    var limit = 4;
    var start = 0;
    var action = 'inactive';

    function lazzy_loader(limit)
    {
      var output = '<center><i class="fa fa-spinner fa-spin" style="font-size:14;color:#C0262C"></i> </center>';
     /* for(var count=0; count<limit; count++)
      {
        output += '<div class="post_data">';
        output += '<p><span class="content-placeholder" style="width:100%; height: 30px;">&nbsp;</span></p>';
        output += '<p><span class="content-placeholder" style="width:100%; height: 100px;">&nbsp;</span></p>';
        output += '</div>';
      }*/
      $('#load_data_message').html(output);
    }

    lazzy_loader(limit);

    function load_data(limit, start)
    {
      var category = $('#category').val();
      var subCategory =  $('#subCategory').val();
      var search =  $('#search').val();

      $.ajax({
        url:base_url+'home/item/categoryStory',
        method:"POST",
        data:{limit:limit,start:start,category:category,subCategoryId:subCategory,search:search},
        cache: false,
        success:function(data)
        {
          if(data == '')
          {
            $('#load_data_message').html('<h3>No More Result Found</h3>');
            action = 'active';
          }
          else
          { 
            if(start==0){
               $('#load_data').html(data);
            }else{
               $('#load_data').append(data);
            }
           
            $('#load_data_message').html("");
            action = 'inactive';
          }
        }
      })
    }

    if(action == 'inactive')
    {
      action = 'active';
      load_data(limit, start);
    }

    $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
      {
        lazzy_loader(limit);
        action = 'active';
        start = start + limit;
        setTimeout(function(){
          load_data(limit, start);
        }, 1000);
      }
    });  
    $('#subCategory').on('change', function() {
      load_data(4, 0);
    });  
    $('#category').on('change', function() {
      load_data(4, 0);
      getsubcategory();
    });
    $("#search").on("keyup", function() {
        load_data(4, 0);
    });
});
function getsubcategory(){
   var categoryId = $('#category').val();
 
     var list = $("#subCategory");
     $(list).html("");
    /*ajax*/
    $.ajax({
                 type: "POST",
                 url: base_url+'adminapi/getsubcategory',
                 data: {categoryId:categoryId},
                cache: false,
                beforeSend: function() {
                },     
                 success: function (res) {
                  if(res.status=='success'){
                   
                    var items = res.subcategories;
                    var options;
                    options += '<option value="">Please select a Sub Category</option>';
                    $.each(items, function(index, object) {
                        
                        options += '<option value="' + object.subCategoryId + '"   >' + object.subCategory + '</option>';
                    });
                  

                    $(list).html(options);
              
                  }
                 }
             });
    /*ajax*/
}