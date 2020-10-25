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
                <div class="row">
                    <div class="col">
                        <section class='rating-widget'>

                            <div class='rating-stars'>
                                <ul id='stars'>
                                    <li class='star' title='Poor' data-value='1'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Fair' data-value='2'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Good' data-value='3'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Excellent' data-value='4'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='WOW!!!' data-value='5'>
                                        <i class='fa fa-star fa-fw'></i>
                                    </li>
                                </ul>
                            </div>
                        </section>
                    </div>

                </div>
                <label for="titulo" class="">Titulo</label>
                <input type="text" id="titulo" class="form-control" aria-describedby="titulo" placeholder="Titulo" >
                <label for="comentario">Comenta</label>
                <input type="hidden" id="product_id" value="">
                <input type="hidden" id="rating" value="">
                <textarea  type="text" id="comentario" class="form-control" aria-describedby="titulo" placeholder="Titulo" > </textarea>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" id="guardar-comentario"  class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
