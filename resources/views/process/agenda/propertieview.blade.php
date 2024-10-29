<div id="myModalViewPropertie" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="gridModalLabek">Ver Propiedad</h4>
                <button type="button" class="close" onclick="cancelar('#myModalViewPropertie')" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <div class="modal-body">
                <div class="container-fluid bd-example-row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="color: white">
                                Generales
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Nombre</label>
                                                <input disabled type="text" id="name2" name="name2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Precio Venta</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input disabled type="text" id="salePrice2" name="salePrice2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Precio Venta">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Precio Renta</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input disabled type="text" id="rentPrice2" name="rentPrice2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Precio Renta">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @if ($profile != 12)
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Propietario</label>
                                                    <input disabled type="text" id="owner2" name="owner2" class="form-control" placeholder="Propietario">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Asesor</label>
                                                    <select disabled name="consultantp2" id="consultantp2" class="form-select">
                                                        <option hidden selected value="">Selecciona una opción</option>
                                                        @foreach ($agents as $id => $agent)
                                                            <option value='{{ $id }}'>{{ $agent }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Enlace a maps</label> <br>
                                                    <a href="" id="viewMaps" target="_blank">Ver en maps</a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Propietario</label>
                                                    <input disabled type="text" id="owner2" name="owner2" class="form-control" placeholder="Propietario">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Enlace a maps</label> <br>
                                                    <a href="" id="viewMaps" target="_blank">Ver en maps</a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Calle</label>
                                                <input disabled type="text" id="street2" name="street2" class="form-control" placeholder="Calle">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for=""># Exterior</label>
                                                <input disabled type="text" id="e_num2" name="e_num2" class="form-control" placeholder="Número Exterior">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for=""># Interior</label>
                                                <input disabled type="text" id="i_num2" name="i_num2" class="form-control" placeholder="Número Interior">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="">Código Postal</label>
                                                <input disabled type="text" id="pc2" name="pc2" class="form-control" placeholder="Código Postal" onchange="fillSuburb('2')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="">Colonia</label>
                                                <select disabled name="selectSuburb2" id="selectSuburb2" class="form-select" onchange="fillUbi('2')">
                                                    <option hidden selected value="">Selecciona una opción</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="">Municipio</label>
                                                <input disabled type="text" id="city2" name="city2" class="form-control" placeholder="Municipio" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="">Estado</label>
                                                <input disabled type="text" id="state2" name="state2" class="form-control" placeholder="Estado" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="">País</label>
                                                <input disabled type="text" id="country2" name="country2" class="form-control" placeholder="País" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Tipo de propiedad</label>
                                        <select disabled name="selectPropertieType2" id="selectPropertieType2" class="form-select" onchange="showDivsType('2')">
                                            <option hidden selected value=0>Selecciona una opción</option>
                                            <option value = "house_card">Casa</option>
                                            <option value = "dept_card">Departamento</option>
                                            <option value = "terrain_card">Terreno</option>
                                            <option value = "office_card">Oficinas</option>
                                            <option value = "wareh_card">Bodega</option>
                                            <option value = "local_card">Local Comercial</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card" id="house_card2" style="display: none">
                            <div class="card-header" style="color: white">
                                Casa
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Niveles</label>
                                                <input disabled type="number" min="0" id="levelsH2" name="levelsH2" class="form-control" placeholder="Niveles">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Estacionamiento</label>
                                                <input disabled type="number" min="0" id="parkingH2" name="parkingH2" class="form-control" placeholder="Estacionamiento">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Habitaciones</label>
                                                <input disabled type="number" min="0" id="roomsH2" name="roomsH2" class="form-control" placeholder="Habitaciones">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Baños Completos</label>
                                                <input disabled type="number" min="0" id="fullRestH2" name="fullRestH2" class="form-control" placeholder="Baños Completos">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Medios Baños</label>
                                                <input disabled type="number" min="0" id="halfRestH2" name="halfRestH2" class="form-control" placeholder="Medios Baños">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Antigüedad</label>
                                                <input disabled type="number" min="0" id="antiquityH2" name="antiquityH2" class="form-control" placeholder="Antigüedad">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Terreno</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">m²</div>
                                                    </div>
                                                    <input disabled type="text" id="terrainH2" name="terrainH2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Terreno">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Construcción</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">m²</div>
                                                    </div>
                                                    <input disabled type="text" id="constructionH2" name="constructionH2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Construcción">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="onoffCondHome2">Condominio</label>
                                                <input disabled id = "onoffCondHome2" type="checkbox" data-toggle="toggle" data-on = "si" data-off="no" onchange="showDivCondominium('onoffCondHome2','house_cond_div2')" data-width="80" data-offstyle="secondary">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="house_cond_div2" class="border-top" style="display: none">
                                        <div class="row">
                                            <div class="col-md-4" id="pool_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="poolH2" name="poolH2">
                                                    <label class="form-check-label" for="poolH2">Alberca</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="gym_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="gymH2" name="gymH2">
                                                    <label class="form-check-label" for="gymH2">GYM</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="terrace_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="terraceH2" name="terraceH2">
                                                    <label class="form-check-label" for="terraceH2">Terraza</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="tankH2" name="tankH2">
                                                    <label class="form-check-label" for="tankH2">Cisterna</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="securityH2" name="securityH2">
                                                    <label class="form-check-label" for="securityH2">Seguridad Privada</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="constructionH2">Cuota de administración</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">$</div>
                                                        </div>
                                                        <input disabled type="text" id="feeH2" name="feeH2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Cuota">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="dept_card2" style="display: none">
                            <div class="card-header" style="color: white">
                                Departamento
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Estacionamiento</label>
                                                <input disabled type="number" min="0" id="parkingD2" name="parkingD2" class="form-control" placeholder="Estacionamiento">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Habitaciones</label>
                                                <input disabled type="number" min="0" id="roomsD2" name="roomsD2" class="form-control" placeholder="Habitaciones">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Baños Completos</label>
                                                <input disabled type="number" min="0" id="fullRestD2" name="fullRestD2" class="form-control" placeholder="Baños Completos">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Medios Baños</label>
                                                <input disabled type="number" min="0" id="halfRestD2" name="halfRestD2" class="form-control" placeholder="Medios Baños">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Antigüedad</label>
                                                <input disabled type="number" min="0" id="antiquityD2" name="antiquityD2" class="form-control" placeholder="Antigüedad">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Terreno</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">m²</div>
                                                    </div>
                                                    <input disabled type="text" id="terrainD2" name="terrainD2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Terreno">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Construcción</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">m²</div>
                                                    </div>
                                                    <input disabled type="text" id="constructionD2" name="constructionD2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Construcción">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="onoffCondDept2">Condominio</label>
                                                <input disabled id = "onoffCondDept2" type="checkbox" data-toggle="toggle" data-on = "si" data-off="no" onchange="showDivCondominium('onoffCondDept2','dept_cond_div2')" data-width="80" data-offstyle="secondary">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="dept_cond_div2" class="border-top" style="display: none">
                                        <div class="row">
                                            <div class="col-md-4" id="pool_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="poolD2" name="poolD2">
                                                    <label class="form-check-label" for="poolD2">Alberca</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="gym_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="gymD2" name="gymD2">
                                                    <label class="form-check-label" for="gymD2">GYM</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="terrace_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="terraceD2" name="terraceD2">
                                                    <label class="form-check-label" for="terraceD2">Terraza</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="liftD2" name="liftD2">
                                                    <label class="form-check-label" for="liftD2">Elevador</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="securityD2" name="securityD2">
                                                    <label class="form-check-label" for="securityD2">Seguridad Privada</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="constructionD2">Cuota de administración</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">$</div>
                                                        </div>
                                                        <input disabled type="text" id="feeD2" name="feeD2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Cuota">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="terrain_card2" style="display: none">
                            <div class="card-header" style="color: white">
                                Terreno
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Terreno</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">m²</div>
                                                    </div>
                                                    <input disabled type="text" id="terrainT2" name="terrainT2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Terreno">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Construcción</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">m²</div>
                                                    </div>
                                                    <input disabled type="text" id="constructionT2" name="constructionT2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Construcción">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Frente</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">m²</div>
                                                    </div>
                                                    <input disabled type="text" id="frontT2" name="frontT2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Frente">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Fondo</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">m²</div>
                                                    </div>
                                                    <input disabled type="text" id="sideT2" name="sideT2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Fondo">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="onoffCondTerr2">Condominio</label>
                                                <input disabled id = "onoffCondTerr2" type="checkbox" data-toggle="toggle" data-on = "si" data-off="no" onchange="showDivCondominium('onoffCondTerr2','terr_cond_div2')" data-width="80" data-offstyle="secondary">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="terr_cond_div2" class="border-top" style="display: none">
                                        <div class="row">
                                            <div class="col-md-4" id="pool_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="poolT2" name="poolT2">
                                                    <label class="form-check-label" for="poolT2">Alberca</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="gym_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="gymT2" name="gymT2">
                                                    <label class="form-check-label" for="gymT2">GYM</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="terrace_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="terraceT2" name="terraceT2">
                                                    <label class="form-check-label" for="terraceT2">Terraza</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="tankT2" name="tankT2">
                                                    <label class="form-check-label" for="tankT2">Cisterna</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="securityT2" name="securityT2">
                                                    <label class="form-check-label" for="securityT2">Seguridad Privada</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="constructionT2">Cuota de administración</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">$</div>
                                                        </div>
                                                        <input disabled type="text" id="feeT2" name="feeT2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Cuota">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="office_card2" style="display: none">
                            <div class="card-header" style="color: white">
                                Oficinas
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Antigüedad</label>
                                                <input disabled type="number" min="0" id="antiquityO2" name="antiquityO2" class="form-control" placeholder="Antigüedad">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Estacionamiento</label>
                                                <input disabled type="number" min="0" id="parkingO2" name="parkingO2" class="form-control" placeholder="Estacionamiento">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Privados</label>
                                                <input disabled type="number" min="0" id="privatesO2" name="privatesO2" class="form-control" placeholder="Privados">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Terreno</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">m²</div>
                                                    </div>
                                                    <input disabled type="text" id="terrainO2" name="terrainO2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Terreno">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Construcción</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">m²</div>
                                                    </div>
                                                    <input disabled type="text" id="constructionO2" name="constructionO2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Construcción">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="onoffCondOffice2">Amenidades</label>
                                                <input disabled id = "onoffCondOffice2" type="checkbox" data-toggle="toggle" data-on = "si" data-off="no" onchange="showDivCondominium('onoffCondOffice2','office_cond_div2')" data-width="80" data-offstyle="secondary">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="office_cond_div2" class="border-top" style="display: none">
                                        <div class="row">
                                            <div class="col-md-4" id="pool_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="valetO2" name="valetO2">
                                                    <label class="form-check-label" for="valetO2">Valet parking</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="gym_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="meetO2" name="meetO2">
                                                    <label class="form-check-label" for="meetO2">Sala de juntas</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="terrace_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="terraceO2" name="terraceO2">
                                                    <label class="form-check-label" for="terraceO2">Terraza</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="audienceO2" name="audienceO2">
                                                    <label class="form-check-label" for="audienceO2">Auditorio</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="coffeeO2" name="coffeeO2">
                                                    <label class="form-check-label" for="coffeeO2">Cafetería</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="receptionO2" name="receptionO2">
                                                    <label class="form-check-label" for="receptionO2">Recepción</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="airconO2" name="airconO2">
                                                    <label class="form-check-label" for="airconO2">Aire acondicionado</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="constructionT">Cuota de administración</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">$</div>
                                                        </div>
                                                        <input disabled type="text" id="feeO2" name="feeO2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Cuota">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="wareh_card2" style="display: none">
                            <div class="card-header" style="color: white">
                                Bodega
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Baños Completos</label>
                                                <input disabled type="number" min="0" id="fullRestW2" name="fullRestW2" class="form-control" placeholder="Baños Completos">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Medios Baños</label>
                                                <input disabled type="number" min="0" id="halfRestW2" name="halfRestW2" class="form-control" placeholder="Medios Baños">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Oficinas</label>
                                                <input disabled type="number" min="0" id="antiquityW2" name="antiquityW2" class="form-control" placeholder="Oficinas">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Terreno</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">m²</div>
                                                    </div>
                                                    <input disabled type="text" id="terrainW2" name="terrainW2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Terreno">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Construcción</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">m²</div>
                                                    </div>
                                                    <input disabled type="text" id="constructionW2" name="constructionW2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Construcción">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="onoffCondWareh2">Condominio</label>
                                                <input disabled id = "onoffCondWareh2" type="checkbox" data-toggle="toggle" data-on = "si" data-off="no" onchange="showDivCondominium('onoffCondWareh2','wareh_cond_div2')" data-width="80" data-offstyle="secondary">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="wareh_cond_div2" class="border-top" style="display: none">
                                        <div class="row">
                                            <div class="col-md-4" id="pool_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="platformW2" name="platformW2">
                                                    <label class="form-check-label" for="platformW2">Anden</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="gym_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="yardW2" name="yardW2">
                                                    <label class="form-check-label" for="yardW2">Patio Maniobras</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="terrace_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="showerW2" name="showerW2">
                                                    <label class="form-check-label" for="showerW2">Regaderas</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="guardhouseW2" name="guardhouseW2">
                                                    <label class="form-check-label" for="guardhouseW2">Caseta vigilancia</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="circuitW2" name="circuitW2">
                                                    <label class="form-check-label" for="circuitW2">Circuito cerrado</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="constructionD">Cuota de administración</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">$</div>
                                                        </div>
                                                        <input disabled type="text" id="feeW2" name="feeW2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Cuota">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="local_card2" style="display: none">
                            <div class="card-header" style="color: white">
                                Local comercial
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Antigüedad</label>
                                                <input disabled type="number" min="0" id="antiquityL2" name="antiquityL2" class="form-control" placeholder="Antigüedad">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Medios Baños</label>
                                                <input disabled type="number" min="0" id="halfRestL2" name="halfRestL2" class="form-control" placeholder="Medios Baños">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Estacionamientos</label>
                                                <input disabled type="number" min="0" id="parkingL2" name="parkingL2" class="form-control" placeholder="Estacionamientos">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Pisos</label>
                                                <input disabled type="number" min="0" id="levelsL2" name="levelsL2" class="form-control" placeholder="Pisos">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Nivel</label>
                                                <input disabled type="number" min="0" id="levelL2" name="levelL2" class="form-control" placeholder="Nivel">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Terreno</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">m²</div>
                                                    </div>
                                                    <input disabled type="text" id="terrainL2" name="terrainL2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Terreno">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Construcción</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">m²</div>
                                                    </div>
                                                    <input disabled type="text" id="constructionL2" name="constructionL2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Construcción">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="onoffCondLocal2">Condominio</label>
                                                <input disabled id = "onoffCondLocal2" type="checkbox" data-toggle="toggle" data-on = "si" data-off="no" onchange="showDivCondominium('onoffCondLocal2','local_cond_div2')" data-width="80" data-offstyle="secondary">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="local_cond_div2" class="border-top" style="display: none">
                                        <div class="row">
                                            <div class="col-md-4" id="pool_div">
                                                <div class="form-check">
                                                    <input disabled class="form-check-input" type="checkbox" id="securityL2" name="securityL2">
                                                    <label class="form-check-label" for="securityL2">Seguridad privada</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="constructionD">Cuota de administración</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">$</div>
                                                        </div>
                                                        <input disabled type="text" id="feeL2" name="feeL2" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Cuota">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secundary" onclick="cancelar('#myModalViewPropertie')">Cancelar</button>
            </div>
        </div>
    </div>
</div>
