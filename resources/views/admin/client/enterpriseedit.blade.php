<div id="modalEditEnterprise" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="gridModalLabek">Actualizar Persona Moral</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <div class="col-lg-12">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Razón Social</label>
                                    <input type="text" id="business_name1" name="business_name1" class="form-control" placeholder="Razón Social">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Celular</label>
                                    <input type="text" id="ecellphone1" name="ecellphone1" class="form-control" placeholder="Celular">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Correo</label>
                                    <input type="text" id="eemail1" name="eemail1" class="form-control" placeholder="Correo">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Nombre del contacto</label>
                                    <input type="text" id="name_contact1" name="name_contact1" class="form-control" placeholder="Nombre Completo">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Celular de contacto</label>
                                    <input type="text" id="phone_contact1" name="phone_contact1" class="form-control" placeholder="Celular de contacto">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="cancelarEmpresa()" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="actualizarEmpresa('client')" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
