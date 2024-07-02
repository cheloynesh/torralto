<div id="myModaledit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="gridModalLabek">Actualizar Inicial</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" onclick="cancelarEditar()">&times;</span></button>
            </div>

            <div class="modal-body">
                <div class="container-fluid bd-example-row">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Agente:</label>
                                <select name="selectAgent" id="selectAgent1" class="form-select">
                                    <option hidden selected value="">Selecciona una opción</option>
                                    @foreach ($agents as $id => $agent)
                                        <option value='{{ $id }}'>{{ $agent }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class = "row" id = "fisicaedit" style="display: none">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nombre</label>
                                <input type="text" id="nameEdit" name="nameEdit" class="form-control" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Apellido paterno</label>
                                <input type="text" id="firstnameEdit" name="firstnameEdit" class="form-control" placeholder="Apellido">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Apellido materno</label>
                                <input type="text" id="lastnameEdit" name="lastnameEdit" class="form-control" placeholder="Apellido">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">RFC</label>
                                <input type="text" id="rfcEdit" name="rfcEdit" class="form-control" placeholder="RFC">
                            </div>
                        </div>
                    </div>

                    <div class = "row" id = "moraledit" style = "display: none;">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Razón Social</label>
                                <input type="text" id="business_nameEdit" name="business_nameEdit" class="form-control" placeholder="Razón Social">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">RFC</label>
                                <input type="text" id="business_rfcEdit" name="business_rfcEdit" class="form-control" placeholder="RFC">
                            </div>
                        </div>
                    </div>

                    <div id = "aseguradoedit" style = "display: none;">
                        <div class = "row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Nombre del Asegurado</label>
                                    <input type="text" id="insured1" name="insured1" class="form-control" placeholder="Nombre">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Fecha de promotoria</label>
                                <input type="date" id="promoter1" name="promoter" class="form-control" placeholder="Fecha de promotoria">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Fecha de Sistema</label>
                                <input type="date" id="system1" name="system1" class="form-control" placeholder="Fecha de Sistema">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Número de Guía</label>
                                <input type="text" id="guide1" name="guide1" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Compañía:</label>
                                <select name="selectInsurance" id="selectInsurance1" class="form-select" onchange="llenarRamos1()">
                                    <option hidden selected value="">Selecciona una opción</option>
                                    @foreach ($insurances as $id => $insurance)
                                        <option value='{{ $id }}'>{{ $insurance }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Ramo:</label>
                                <select name="selectBranch" id="selectBranch1" class="form-select" onchange="llenarPlanes1()">
                                    <option selected value="">Selecciona una opción</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Plan/Contrato</label>
                                <select name="selectPlan" id="selectPlan1" class="form-select">
                                    <option selected value="">Selecciona una opción</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Tipo Solicitud:</label>
                                <select name="selectAppli" id="selectAppli1" class="form-select">
                                    <option hidden selected value="">Selecciona una opción</option>
                                    @foreach ($applications as $id => $appli)
                                        <option value='{{ $id }}'>{{ $appli }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Folio/Id</label>
                                <input type="text" id="folio1" name="folio" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">PNA/Monto</label>
                                <input type="text" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" id="pna1" name="pna" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Forma de Pago:</label>
                                <select name="selectPaymentform" id="selectPaymentform1" class="form-select">
                                    <option hidden selected value="">Selecciona una opción</option>
                                    @foreach ($paymentForms as $id => $payment_form)
                                        <option value='{{ $id }}'>{{ $payment_form }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Moneda:</label>
                                <select name="selectCurrency" id="selectCurrency1" class="form-select">
                                    <option hidden selected value="">Selecciona una opción</option>
                                    @foreach ($currencies as $id => $currency)
                                        <option value='{{ $id }}'>{{ $currency }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Conducto de cobro:</label>
                                <select name="selectCharge" id="selectCharge1" class="form-select">
                                    <option hidden selected value="">Selecciona una opción</option>
                                    @foreach ($charges as $id => $charge)
                                        <option value='{{ $id }}'>{{ $charge }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" >
                            <div class="form-group">
                                <label for="">Comentario: </label>
                                <textarea name="initial_comm" class="form-control" id="initial_comm" rows="2"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="cancelarEditar()" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
                @if ($perm_btn['modify']==1)
                    <button type="button" onclick="actualizarInicial()" class="btn btn-primary">Guardar</button>
                @endif
            </div>
        </div>
    </div>
</div>
