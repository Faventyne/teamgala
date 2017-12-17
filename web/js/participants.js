$(function(){


    $('.btn-large').css('background-color','grey');
    $('.btn-large').on("click",function(e){
        var nb_selected_participants = $('.red').length;
        if(nb_selected_participants<2){
            e.preventDefault();
        }
    });


    $('.action-button').on("click", function(){
        var nb_selected_participants = $('.red').length;
        if(nb_selected_participants >=1){
            $('.btn-large').css('background-color','');
        }


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