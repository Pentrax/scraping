<div class="modal fade" id="comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tu opinion cuenta !!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class="badge badge-primary" id="elemento"></span>
                <br>
                <label for="titulo" class="">Titulo</label>
                <input type="text" id="titulo" class="form-control" aria-describedby="titulo" placeholder="Titulo" >
                <label for="comentario">Comenta</label>
                <input type="hidden" id="product_id" value="">
                <textarea  type="text" id="comentario" class="form-control" aria-describedby="titulo" placeholder="Titulo" > </textarea>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="guardar-comentario"  class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
