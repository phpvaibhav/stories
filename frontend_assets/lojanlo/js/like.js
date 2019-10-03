$(document).ready(function(){
    var base_url = $('body').data('base-url'); // Base url
    var storyId = $('.page-wrapper').data('story-id');
    $(".likeSet").click(function(){
        // Finding click type
        var type = $(this).data('type');
        // AJAX Request
        $.ajax({
            url: base_url+'adminapi/likeUnlike',
            type: 'POST',
            data: {'storyId':storyId,'type':type},
            cache: false,
            beforeSend: function() {
                $(this).prop('disabled', true);  
            }, 
            success: function(obj){
                $(this).prop('disabled', false);  
                if(obj.isLike==1){
                     $(this).find('i.fa-heart').css('color', '#8B0000');
                    $(".likecolr_"+storyId).css("color","#8B0000");  
                }else{
                    $(".likecolr_"+storyId).css("color","#999999");  
                     $(this).find('i.fa-heart').css('color', '#999999');
                }
                $(".like_"+storyId).text(obj.count);   
            }    
        });
    });
});