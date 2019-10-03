var base_url = $('body').data('base-url'); // Base url
  var storyId = $('.page-wrapper').data('story-id');
    var comntBox = $('#comntBox').html();
   
  
    var parentId = 0;
    

    function replyAdd(id){
        parentId = id;
        $('.replayDivCls').html('');
        $('#replayDiv'+id).html(comntBox);
        $('#cancelBtn').show();
        /*cancelBtn replayDiv
replayDivCls
*/
        
    }

    function cancelBtnAction(){
        parentId = 0;
        $('.replayDivCls').html('');
        $('#comntBox').html(comntBox);
        $('#cancelBtn').hide();
    }

    function addComment(){
        var name = $.trim($('#name').val());
        var email = $.trim($('#email').val());
        var comment = $.trim($('#comment').val());
        
        $('.err').html('');
        var checkValidation = true;

        if(comment == ''){
            $('#commentErr').html('Comment field is requerd.');
            checkValidation = false;
        }else{
            if(email != ''){
                if(!isEmail(email)){
                    $('#emailErr').html('Please enter a valid email address.');
                    checkValidation = false;
                }
            }
        }

        if(checkValidation == true){
            $.ajax({
                url: base_url+'home/item/addComment',
                type : 'POST',
                cache: false,
                data : {
                    name : (name != '') ? name : "Anonymous",
                    email : (email != '') ? email : "anonymous@lojanlo.com",
                    comments : comment,
                    storyId : storyId,
                    parentId : parentId,
                },
                beforeSend: function() {
         
          $('#submit').prop('disabled', true);  
        },    
                success: function(result){
                    $('#submit').prop('disabled', true);
                    getComment();
                    cancelBtnAction()
                }
            });
        }
    }

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

    function getComment(){
        $.ajax({
            url: base_url+'home/item/getComment',
            type : 'POST',
            data : {
                storyId : storyId,
            },
            success: function(result){
               $('#commentsList').html(result);
               $('#cc').html($('#commentCount').val());
            }
        });
    }
    getComment();
