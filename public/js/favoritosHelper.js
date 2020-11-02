$(document).ready(function() {


    $("i#heart").click(function (){

        var id = $(this).data('id');
        var user = $(this).data('user')


        $.ajax({
            url: "/add-favorito",
            type:"POST",
            data:{
                id:id,
                user:user,
            },
            success:function(response){

                if(response) {
                    console.log(response);
                    // $('.success').text(response.success);
                    // $("#comment").modal("toggle");
                    // location.reload();

                }
            },
        });
    });

    $("a#deleteFavorito").click(function (){

        var id = $(this).data('id');
        var user = $(this).data('user')


        $.ajax({
            url: "/delete-favorito",
            type:"POST",
            data:{
                id:id,
                user:user,
            },
            success:function(response){

                if(response) {
                    console.log(response);
                    // $('.success').text(response.success);
                    // $("#comment").modal("toggle");
                    // location.reload();

                }
            },
        });
    });

});
