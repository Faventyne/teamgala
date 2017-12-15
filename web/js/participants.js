$(function(){
    $('.remove-button').hide();

    $('.action-button').on("click", function(){
        if($(this).text()=="ADD"){
            $(this).text("REMOVE");
            $(this).addClass('red')
            $(this).closest('ul').css('background-color','green');
            $(this).closest('li').css('background-color','green');
            $(this).closest('li').css('color','white');
        } else if ($(this).text()=="REMOVE"){
            $(this).text("ADD");
            $(this).removeClass('red');
            $(this).closest('ul').css('background-color','');
            $(this).closest('li').css('background-color','');
            $(this).closest('li').css('color','');
        }

    })

});