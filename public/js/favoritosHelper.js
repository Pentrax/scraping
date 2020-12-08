$(document).ready(function() {


    $("i#heart").click(function (){

        var id = $(this).data('id');
        var user = $(this).data('user')


        $.ajax({
            url: "/add-favorito",
            type:"POST",
            async:false,
            data:{
                id:id,
                user:user,
            },
            success:function(response){
                if(response) {
                    $("i[data-id="+id+"]").css("color","blue");
                    $("div[data-id="+id+"]").html("<div class='alert alert-success' role='alert'>Ya lo tenes en favoritos !</div>");
                    setTimeout( function(){$("div[data-id="+id+"]").fadeOut();} , 4000);
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

                if(response.success == 200) {
                    console.log(response);
                    location.reload();

                }else{
                    $("div#msgError").html("<div class='alert alert-danger' role='alert'>No pudimos eliminar este producto</div>");
                }
            },
        });
    });

});