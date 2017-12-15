$(function(){
    $('.remove-button').hide();

    $('.add-button').on("click", function(){
        $(this).hide();
        $(this).siblings().show();
        $(this).closest('ul').css('background-color','green');
        $(this).closest('li').css('background-color','green');
        $(this).closest('li').css('color','white');

    })

    $('.remove-button').on("click", function(){
        $(this).hide();
        $(this).siblings().show();
        $(this).closest('ul').css('background-color','transparent');
        $(this).closest('li').css('background-color','transparent');
        $(this).closest('li').css('color','black');

    })
});