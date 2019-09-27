var base_url = $('body').data('base-url'); // Base url
function data_fun(url,type,page){

  var key = $('#search').val();
      $.ajax({
           url: base_url+url,
           type: "POST",
           data:{page: base_url+url ,'search':key,'type':type},            
           cache: false,
           beforeSend: function() {
              $("#"+page).html('<center><i class="fa fa-spinner fa-spin" style="font-size:14;color:#C0262C"></i> </center>');
                  },                      
           success: function(data){
               $("#"+page).html(data);
           }
       });
}
$( document ).ready(function() {
    data_fun('home/item/sideItem','','sidePage');
    //data_fun('home/item/homeItem','Recent','homePageRecent');
    //data_fun('home/item/homeItem','Featured','homePageisFeatured');
});

