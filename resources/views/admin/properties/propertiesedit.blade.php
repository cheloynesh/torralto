<div id="myModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="gridModalLabek">Registro de Propiedades</h4>
                <button type="button" class="close" onclick="cancelar('#myModalEdit')" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                                                <input type="text" id="name1" name="name1" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Precio Venta</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="text" id="salePrice1" name="salePrice1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Precio Venta">
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
                                                    <input type="text" id="rentPrice1" name="rentPrice1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Precio Renta">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @if ($profile != 12)
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Propietario</label>
                                                    <input type="text" id="owner1" name="owner1" class="form-control" placeholder="Propietario">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Asesor</label>
                                                    <select name="consultant1" id="consultant1" class="form-select">
                                                        <option hidden selected value="">Selecciona una opción</option>
                                                        @foreach ($agents as $id => $agent)
                                                            <option value='{{ $id }}'>{{ $agent }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @else
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Propietario</label>
                                                    <input type="text" id="owner1" name="owner1" class="form-control" placeholder="Propietario">
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Calle</label>
                                                <input type="text" id="street1" name="street1" class="form-control" placeholder="Calle">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for=""># Exterior</label>
                                                <input type="text" id="e_num1" name="e_num1" class="form-control" placeholder="Número Exterior">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for=""># Interior</label>
                                                <input type="text" id="i_num1" name="i_num1" class="form-control" placeholder="Número Interior">
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="form-group">
                                                <label for="">Código Postal</label>
                                                <input type="text" id="pc1" name="pc1" class="form-control" placeholder="Código Postal" onchange="fillSuburb('1')">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="">Colonia</label>
                                                <select name="selectSuburb1" id="selectSuburb1" class="form-select" onchange="fillUbi('1')">
                                                    <option hidden selected value="">Selecciona una opción</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="">Municipio</label>
                                                <input type="text" id="city1" name="city1" class="form-control" placeholder="Municipio" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="">Estado</label>
                                                <input type="text" id="state1" name="state1" class="form-control" placeholder="Estado" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label for="">País</label>
                                                <input type="text" id="country1" name="country1" class="form-control" placeholder="País" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Tipo de propiedad</label>
                                        <select name="selectPropertieType1" id="selectPropertieType1" class="form-select" onchange="showDivsType('1')">
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

                        <div class="card" id="house_card1" style="display: none">
                            <div class="card-header" style="color: white">
                                Casa
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Niveles</label>
                                                <input type="number" min="0" id="levelsH1" name="levelsH1" class="form-control" placeholder="Niveles">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Estacionamiento</label>
                                                <input type="number" min="0" id="parkingH1" name="parkingH1" class="form-control" placeholder="Estacionamiento">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Habitaciones</label>
                                                <input type="number" min="0" id="roomsH1" name="roomsH1" class="form-control" placeholder="Habitaciones">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Baños Completos</label>
                                                <input type="number" min="0" id="fullRestH1" name="fullRestH1" class="form-control" placeholder="Baños Completos">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Medios Baños</label>
                                                <input type="number" min="0" id="halfRestH1" name="halfRestH1" class="form-control" placeholder="Medios Baños">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Antigüedad</label>
                                                <input type="number" min="0" id="antiquityH1" name="antiquityH1" class="form-control" placeholder="Antigüedad">
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
                                                    <input type="text" id="terrainH1" name="terrainH1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Terreno">
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
                                                    <input type="text" id="constructionH1" name="constructionH1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Construcción">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="onoffCondHome1">Condominio</label>
                                                <input id = "onoffCondHome1" type="checkbox" data-toggle="toggle" data-on = "si" data-off="no" onchange="showDivCondominium('onoffCondHome1','house_cond_div1')" data-width="80" data-offstyle="secondary">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="house_cond_div1" class="border-top" style="display: none">
                                        <div class="row">
                                            <div class="col-md-4" id="pool_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="poolH1" name="poolH1">
                                                    <label class="form-check-label" for="poolH1">Alberca</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="gym_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gymH1" name="gymH1">
                                                    <label class="form-check-label" for="gymH1">GYM</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="terrace_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="terraceH1" name="terraceH1">
                                                    <label class="form-check-label" for="terraceH1">Terraza</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="tankH1" name="tankH1">
                                                    <label class="form-check-label" for="tankH1">Cisterna</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="securityH1" name="securityH1">
                                                    <label class="form-check-label" for="securityH1">Seguridad Privada</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="constructionH1">Cuota de administración</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">$</div>
                                                        </div>
                                                        <input type="text" id="feeH1" name="feeH1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Cuota">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="dept_card1" style="display: none">
                            <div class="card-header" style="color: white">
                                Departamento
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Estacionamiento</label>
                                                <input type="number" min="0" id="parkingD1" name="parkingD1" class="form-control" placeholder="Estacionamiento">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Habitaciones</label>
                                                <input type="number" min="0" id="roomsD1" name="roomsD1" class="form-control" placeholder="Habitaciones">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Baños Completos</label>
                                                <input type="number" min="0" id="fullRestD1" name="fullRestD1" class="form-control" placeholder="Baños Completos">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Medios Baños</label>
                                                <input type="number" min="0" id="halfRestD1" name="halfRestD1" class="form-control" placeholder="Medios Baños">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Antigüedad</label>
                                                <input type="number" min="0" id="antiquityD1" name="antiquityD1" class="form-control" placeholder="Antigüedad">
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
                                                    <input type="text" id="terrainD1" name="terrainD1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Terreno">
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
                                                    <input type="text" id="constructionD1" name="constructionD1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Construcción">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="onoffCondDept1">Condominio</label>
                                                <input id = "onoffCondDept1" type="checkbox" data-toggle="toggle" data-on = "si" data-off="no" onchange="showDivCondominium('onoffCondDept1','dept_cond_div1')" data-width="80" data-offstyle="secondary">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="dept_cond_div1" class="border-top" style="display: none">
                                        <div class="row">
                                            <div class="col-md-4" id="pool_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="poolD1" name="poolD1">
                                                    <label class="form-check-label" for="poolD1">Alberca</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="gym_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gymD1" name="gymD1">
                                                    <label class="form-check-label" for="gymD1">GYM</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="terrace_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="terraceD1" name="terraceD1">
                                                    <label class="form-check-label" for="terraceD1">Terraza</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="liftD1" name="liftD1">
                                                    <label class="form-check-label" for="liftD1">Elevador</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="securityD1" name="securityD1">
                                                    <label class="form-check-label" for="securityD1">Seguridad Privada</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="constructionD1">Cuota de administración</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">$</div>
                                                        </div>
                                                        <input type="text" id="feeD1" name="feeD1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Cuota">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="terrain_card1" style="display: none">
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
                                                    <input type="text" id="terrainT1" name="terrainT1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Terreno">
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
                                                    <input type="text" id="constructionT1" name="constructionT1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Construcción">
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
                                                    <input type="text" id="frontT1" name="frontT1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Frente">
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
                                                    <input type="text" id="sideT1" name="sideT1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Fondo">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="onoffCondTerr1">Condominio</label>
                                                <input id = "onoffCondTerr1" type="checkbox" data-toggle="toggle" data-on = "si" data-off="no" onchange="showDivCondominium('onoffCondTerr1','terr_cond_div1')" data-width="80" data-offstyle="secondary">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="terr_cond_div1" class="border-top" style="display: none">
                                        <div class="row">
                                            <div class="col-md-4" id="pool_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="poolT1" name="poolT1">
                                                    <label class="form-check-label" for="poolT1">Alberca</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="gym_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="gymT1" name="gymT1">
                                                    <label class="form-check-label" for="gymT1">GYM</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="terrace_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="terraceT1" name="terraceT1">
                                                    <label class="form-check-label" for="terraceT1">Terraza</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="tankT1" name="tankT1">
                                                    <label class="form-check-label" for="tankT1">Cisterna</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="securityT1" name="securityT1">
                                                    <label class="form-check-label" for="securityT1">Seguridad Privada</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="constructionT1">Cuota de administración</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">$</div>
                                                        </div>
                                                        <input type="text" id="feeT1" name="feeT1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Cuota">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="office_card1" style="display: none">
                            <div class="card-header" style="color: white">
                                Oficinas
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Antigüedad</label>
                                                <input type="number" min="0" id="antiquityO1" name="antiquityO1" class="form-control" placeholder="Antigüedad">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Estacionamiento</label>
                                                <input type="number" min="0" id="parkingO1" name="parkingO1" class="form-control" placeholder="Estacionamiento">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Privados</label>
                                                <input type="number" min="0" id="privatesO1" name="privatesO1" class="form-control" placeholder="Privados">
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
                                                    <input type="text" id="terrainO1" name="terrainO1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Terreno">
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
                                                    <input type="text" id="constructionO1" name="constructionO1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Construcción">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="onoffCondOffice1">Amenidades</label>
                                                <input id = "onoffCondOffice1" type="checkbox" data-toggle="toggle" data-on = "si" data-off="no" onchange="showDivCondominium('onoffCondOffice1','office_cond_div1')" data-width="80" data-offstyle="secondary">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="office_cond_div1" class="border-top" style="display: none">
                                        <div class="row">
                                            <div class="col-md-4" id="pool_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="valetO1" name="valetO1">
                                                    <label class="form-check-label" for="valetO1">Valet parking</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="gym_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="meetO1" name="meetO1">
                                                    <label class="form-check-label" for="meetO1">Sala de juntas</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="terrace_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="terraceO1" name="terraceO1">
                                                    <label class="form-check-label" for="terraceO1">Terraza</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="audienceO1" name="audienceO1">
                                                    <label class="form-check-label" for="audienceO1">Auditorio</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="coffeeO1" name="coffeeO1">
                                                    <label class="form-check-label" for="coffeeO1">Cafetería</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="receptionO1" name="receptionO1">
                                                    <label class="form-check-label" for="receptionO1">Recepción</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="airconO1" name="airconO1">
                                                    <label class="form-check-label" for="airconO1">Aire acondicionado</label>
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
                                                        <input type="text" id="feeO1" name="feeO1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Cuota">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="wareh_card1" style="display: none">
                            <div class="card-header" style="color: white">
                                Bodega
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Baños Completos</label>
                                                <input type="number" min="0" id="fullRestW1" name="fullRestW1" class="form-control" placeholder="Baños Completos">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Medios Baños</label>
                                                <input type="number" min="0" id="halfRestW1" name="halfRestW1" class="form-control" placeholder="Medios Baños">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Oficinas</label>
                                                <input type="number" min="0" id="antiquityW1" name="antiquityW1" class="form-control" placeholder="Oficinas">
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
                                                    <input type="text" id="terrainW1" name="terrainW1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Terreno">
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
                                                    <input type="text" id="constructionW1" name="constructionW1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Construcción">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="onoffCondWareh1">Condominio</label>
                                                <input id = "onoffCondWareh1" type="checkbox" data-toggle="toggle" data-on = "si" data-off="no" onchange="showDivCondominium('onoffCondWareh1','wareh_cond_div1')" data-width="80" data-offstyle="secondary">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="wareh_cond_div1" class="border-top" style="display: none">
                                        <div class="row">
                                            <div class="col-md-4" id="pool_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="platformW1" name="platformW1">
                                                    <label class="form-check-label" for="platformW1">Anden</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="gym_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="yardW1" name="yardW1">
                                                    <label class="form-check-label" for="yardW1">Patio Maniobras</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="terrace_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="showerW1" name="showerW1">
                                                    <label class="form-check-label" for="showerW1">Regaderas</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="guardhouseW1" name="guardhouseW1">
                                                    <label class="form-check-label" for="guardhouseW1">Caseta vigilancia</label>
                                                </div>
                                            </div>
                                            <div class="col-md-4" id="_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="circuitW1" name="circuitW1">
                                                    <label class="form-check-label" for="circuitW1">Circuito cerrado</label>
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
                                                        <input type="text" id="feeW1" name="feeW1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Cuota">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" id="local_card1" style="display: none">
                            <div class="card-header" style="color: white">
                                Local comercial
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Antigüedad</label>
                                                <input type="number" min="0" id="antiquityL1" name="antiquityL1" class="form-control" placeholder="Antigüedad">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="">Medios Baños</label>
                                                <input type="number" min="0" id="halfRestL1" name="halfRestL1" class="form-control" placeholder="Medios Baños">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="">Estacionamientos</label>
                                                <input type="number" min="0" id="parkingL1" name="parkingL1" class="form-control" placeholder="Estacionamientos">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Pisos</label>
                                                <input type="number" min="0" id="levelsL1" name="levelsL1" class="form-control" placeholder="Pisos">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="">Nivel</label>
                                                <input type="number" min="0" id="levelL1" name="levelL1" class="form-control" placeholder="Nivel">
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
                                                    <input type="text" id="terrainL1" name="terrainL1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Terreno">
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
                                                    <input type="text" id="constructionL1" name="constructionL1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Construcción">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="onoffCondLocal1">Condominio</label>
                                                <input id = "onoffCondLocal1" type="checkbox" data-toggle="toggle" data-on = "si" data-off="no" onchange="showDivCondominium('onoffCondLocal1','local_cond_div1')" data-width="80" data-offstyle="secondary">
                                            </div>
                                        </div>
                                    </div>
                                    <div id="local_cond_div1" class="border-top" style="display: none">
                                        <div class="row">
                                            <div class="col-md-4" id="pool_div">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="securityL1" name="securityL1">
                                                    <label class="form-check-label" for="securityL1">Seguridad privada</label>
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
                                                        <input type="text" id="feeL1" name="feeL1" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Cuota">
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
                <button type="button" class="btn btn-secundary" onclick="cancelar('#myModalEdit')">Cancelar</button>
                <button type="button" onclick="actualizarPropiedad()" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
