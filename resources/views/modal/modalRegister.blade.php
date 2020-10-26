<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding-top: 34px">
                <div class="form-item">
                    <p class="formLabel">Email</p>
                    <input type="email" name="email" id="email" class="form-style" autocomplete="off"/>
                </div>
                <div class="form-item">
                    <p class="formLabel">Password</p>
                    <input type="password" name="password" id="password" class="form-style" />
                    <!-- <div class="pw-view"><i class="fa fa-eye"></i></div> -->
                    <p><a href="#" ><small>Olvidaste el password?</small></a></p>
                </div>
                <div class="form-item">

{{--                    <input type="submit" class="login pull-right" id="registerBtn" value="Registrase">--}}
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" id="registerBtn"  class="btn btn-primary">Guardar</button>
                    <div class="clear-fix"></div>
                </div>

            </div>
        </div>
    </div>
</div>
