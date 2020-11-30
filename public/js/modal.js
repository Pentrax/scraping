
$('#comment').on('show.bs.modal', function (event) {

    var titulo = $(event.relatedTarget).data('titulo');
    var id = $(event.relatedTarget).data('id');
    $(this).find("#product_id").val(id);
    $(this).find("#elemento").text(titulo);
    $(this).find("#titulo").val(titulo);
});

$("#guardar-comentario").on("click",function (event){
    event.preventDefault();

    let titulo = $("#titulo").val();
    let comentario = $("#comentario").val();
    let id_producto = $("#product_id").val();
    let rating      = $("#rating").val()
console.log("hoal")
   console.log(id_producto);

    $.ajax({
        url: "/ajax-request",
        type:"POST",
        data:{
            titulo:titulo,
            comentario:comentario,
            producto_id: id_producto,
            rating: rating
        },
        success:function(response){

            if(response) {
                $('.success').text(response.success);
                $("#comment").modal("toggle");
                location.reload();

            }
        },
    });

});


