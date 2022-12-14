$(function(){
    'use strict';
    $('[placeholder]').focus(function(){
        $(this).attr('data-text', $(this).attr('placeholder'));
        $(this).attr('placeholder','');
    }).blur(function (){
        $(this).attr('placeholder', $(this).attr('data-text'));
    });
    $('input').each(function (){
        if($(this).attr('required') === 'required'){
            $(this).after('<i class="fa fa-asterisk"></i>')
        }
    });
    //convert password field to text field on hover
    $('.icofont-eye-alt').hover(function (){
        $('.password').attr('type','text');
    },function (){
        $('.password').attr('type','password');
    });

    //redirectHome
    function redirectHome(href){
        setTimeout(function () {
            window.location.href= href;
            console.log('hi');
        },3000); // 10 seconds
    };
    $(".readonly").readOnly;
    $('.close').on('click',function(){
        $(this).parents('.alert_msg').toggle();
    });

});