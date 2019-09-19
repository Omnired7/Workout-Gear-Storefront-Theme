jQuery(function($){
    var clicked = false;
    $('#masthead>img').click(function(e){
        if(clicked){
            $('#masthead').css('max-height','0em');
            $('body').css('overflow', 'unset');
            $('#masthead').css('overflow', 'hidden');
            clicked = false;
        }else{
            $('#masthead').css('max-height','200em');
            $('body').css('overflow', 'hidden');
            $('#masthead').css('overflow', 'auto');
            clicked = true;
        }
    })
});