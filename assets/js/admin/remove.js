$('.btn-remove').click(function(){
    var url = $(this).data('url');
    var id = $(this).data('id');

    if(confirm('Chắc chắn xóa?')){
        $.ajax({
            method: "get",
            url: url,
            data: {
                id : id
            },
            success: function(response){
                if(response.status == 200){
                    $('.remove_' + id).fadeOut();
                }

            },
            error: function(jqXHR, exception){
                console.log(errorHandle(jqXHR, exception));
            }
        });
    }
});