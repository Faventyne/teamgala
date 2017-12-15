$(function() {
    $('.delete-button').on('click',function(e){
        e.preventDefault();
        $.ajax({

            url : '../ajax/user/' + $(this).data("user-id"),
            type : 'DELETE',
            success: function(){
                location.reload();
            }
        })
    });
    $('.modify-button').on('click',function(e){
        e.preventDefault();
        $.ajax({

            url : '../ajax/user/' + $(this).data("user-id"),
            type : 'DELETE',
            success: function(){
                location.reload();
            }
        })
    })
});
