<div id="modalNewClient" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="gridModalLabek">Registro de Persona Física</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tipo de cliente</label>
                                &nbsp;
                                <input id = "onoff" type="checkbox" checked data-toggle="toggle" data-on = "fisica" data-off="moral" onchange="mostrarDiv()" data-width="80" data-offstyle="secondary">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12" id = "fisica">

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Apellido paterno</label>
                                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Apellido">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label for="">Apellido materno</label>
                                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Apellido">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Celular</label>
                                    <input type="text" id="cellphone" name="cellphone" class="form-control" placeholder="Celular">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Correo</label>
                                    <input type="text" id="email" name="email" class="form-control" placeholder="Correo">
                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="col-lg-12" id = "moral" style = "display: none;">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="">Razón Social</label>
                                    <input type="text" id="business_name" name="business_name" class="form-control" placeholder="Razón Social">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Celular</label>
                                    <input type="text" id="ecellphone" name="ecellphone" class="form-control" placeholder="Celular">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Correo</label>
                                    <input type="text" id="eemail" name="eemail" class="form-control" placeholder="Correo">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Nombre del contacto</label>
                                    <input type="text" id="name_contact" name="name_contact" class="form-control" placeholder="Nombre Completo">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="">Celular de contacto</label>
                                    <input type="text" id="phone_contact" name="phone_contact" class="form-control" placeholder="Celular de contacto">
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
                <button type="button" onclick="guardar()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
