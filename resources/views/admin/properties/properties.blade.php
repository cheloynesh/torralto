@extends('home')
{{-- @section('title','Perfiles') --}}
<head>
    <title>Propiedades | Torralto</title>
</head>
@section('content')
    <div class="text-center"><h1>Catálogo de Propiedades</h1></div>
    <div style="max-width: 100%; margin: auto;">
        {{-- modal| --}}
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="gridModalLabek">Registro de Propiedades</h4>
                        <button type="button" class="close" onclick="cancelar('#myModal')" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
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
                                                    <input type="text" id="name" name="name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Precio Venta</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">$</div>
                                                        </div>
                                                        <input type="text" id="salePrice" name="salePrice" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Precio Venta">
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
                                                        <input type="text" id="rentPrice" name="rentPrice" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Precio Renta">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Propietario</label>
                                                    <input type="text" id="owner" name="owner" class="form-control" placeholder="Propietario">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @if ($profile != 12)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Asesor</label>
                                                        <select name="consultant" id="consultant" class="form-select">
                                                            <option hidden selected value="">Selecciona una opción</option>
                                                            @foreach ($agents as $id => $agent)
                                                                <option value='{{ $id }}'>{{ $agent }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Tipo:</label>
                                                        <select name="selectNewStatus" id="selectNewStatus" class="form-select">
                                                            <option hidden selected value="">Selecciona una opción</option>
                                                            @foreach ($cmbStatus as $id => $status)
                                                                <option value='{{ $id }}'>{{ $status }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="">Tipo:</label>
                                                        <select name="selectNewStatus" id="selectNewStatus" class="form-select">
                                                            <option hidden selected value="">Selecciona una opción</option>
                                                            @foreach ($cmbStatus as $id => $status)
                                                                <option value='{{ $id }}'>{{ $status }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Calle</label>
                                                    <input type="text" id="street" name="street" class="form-control" placeholder="Calle">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for=""># Exterior</label>
                                                    <input type="text" id="e_num" name="e_num" class="form-control" placeholder="Número Exterior">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for=""># Interior</label>
                                                    <input type="text" id="i_num" name="i_num" class="form-control" placeholder="Número Interior">
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label for="">Código Postal</label>
                                                    <input type="text" id="pc" name="pc" class="form-control" placeholder="Código Postal" onchange="fillSuburb('')">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="">Colonia</label>
                                                    <select name="selectSuburb" id="selectSuburb" class="form-select" onchange="fillUbi('')">
                                                        <option hidden selected value="">Selecciona una opción</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="">Municipio</label>
                                                    <input type="text" id="city" name="city" class="form-control" placeholder="Municipio" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="">Estado</label>
                                                    <input type="text" id="state" name="state" class="form-control" placeholder="Estado" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label for="">País</label>
                                                    <input type="text" id="country" name="country" class="form-control" placeholder="País" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Tipo de propiedad</label>
                                            <select name="selectPropertieType" id="selectPropertieType" class="form-select" onchange="showDivsType('')">
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
                            <div class="card" id="house_card" style="display: none">
                                <div class="card-header" style="color: white">
                                    Casa
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Niveles</label>
                                                    <input type="number" min="0" id="levelsH" name="levelsH" class="form-control" placeholder="Niveles">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Estacionamiento</label>
                                                    <input type="number" min="0" id="parkingH" name="parkingH" class="form-control" placeholder="Estacionamiento">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Habitaciones</label>
                                                    <input type="number" min="0" id="roomsH" name="roomsH" class="form-control" placeholder="Habitaciones">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Baños Completos</label>
                                                    <input type="number" min="0" id="fullRestH" name="fullRestH" class="form-control" placeholder="Baños Completos">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Medios Baños</label>
                                                    <input type="number" min="0" id="halfRestH" name="halfRestH" class="form-control" placeholder="Medios Baños">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="">Antigüedad</label>
                                                    <input type="number" min="0" id="antiquityH" name="antiquityH" class="form-control" placeholder="Antigüedad">
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
                                                        <input type="text" id="terrainH" name="terrainH" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Terreno">
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
                                                        <input type="text" id="constructionH" name="constructionH" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Construcción">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="onoffCondHome">Condominio</label>
                                                    <input id = "onoffCondHome" type="checkbox" data-toggle="toggle" data-on = "si" data-off="no" onchange="showDivCondominium('onoffCondHome','house_cond_div')" data-width="80" data-offstyle="secondary">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="house_cond_div" class="border-top" style="display: none">
                                            <div class="row">
                                                <div class="col-md-4" id="pool_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="poolH" name="poolH">
                                                        <label class="form-check-label" for="poolH">Alberca</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="gym_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="gymH" name="gymH">
                                                        <label class="form-check-label" for="gymH">GYM</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="terrace_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="terraceH" name="terraceH">
                                                        <label class="form-check-label" for="terraceH">Terraza</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4" id="_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="tankH" name="tankH">
                                                        <label class="form-check-label" for="tankH">Cisterna</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="securityH" name="securityH">
                                                        <label class="form-check-label" for="securityH">Seguridad Privada</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="constructionH">Cuota de administración</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <div class="input-group-text">$</div>
                                                            </div>
                                                            <input type="text" id="feeH" name="feeH" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Cuota">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" id="dept_card" style="display: none">
                                <div class="card-header" style="color: white">
                                    Departamento
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Estacionamiento</label>
                                                    <input type="number" min="0" id="parkingD" name="parkingD" class="form-control" placeholder="Estacionamiento">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Habitaciones</label>
                                                    <input type="number" min="0" id="roomsD" name="roomsD" class="form-control" placeholder="Habitaciones">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Baños Completos</label>
                                                    <input type="number" min="0" id="fullRestD" name="fullRestD" class="form-control" placeholder="Baños Completos">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Medios Baños</label>
                                                    <input type="number" min="0" id="halfRestD" name="halfRestD" class="form-control" placeholder="Medios Baños">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="">Antigüedad</label>
                                                    <input type="number" min="0" id="antiquityD" name="antiquityD" class="form-control" placeholder="Antigüedad">
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
                                                        <input type="text" id="terrainD" name="terrainD" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Terreno">
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
                                                        <input type="text" id="constructionD" name="constructionD" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Construcción">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="onoffCondDept">Condominio</label>
                                                    <input id = "onoffCondDept" type="checkbox" data-toggle="toggle" data-on = "si" data-off="no" onchange="showDivCondominium('onoffCondDept','dept_cond_div')" data-width="80" data-offstyle="secondary">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="dept_cond_div" class="border-top" style="display: none">
                                            <div class="row">
                                                <div class="col-md-4" id="pool_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="poolD" name="poolD">
                                                        <label class="form-check-label" for="poolD">Alberca</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="gym_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="gymD" name="gymD">
                                                        <label class="form-check-label" for="gymD">GYM</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="terrace_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="terraceD" name="terraceD">
                                                        <label class="form-check-label" for="terraceD">Terraza</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4" id="_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="liftD" name="liftD">
                                                        <label class="form-check-label" for="liftD">Elevador</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="securityD" name="securityD">
                                                        <label class="form-check-label" for="securityD">Seguridad Privada</label>
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
                                                            <input type="text" id="feeD" name="feeD" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Cuota">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" id="terrain_card" style="display: none">
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
                                                        <input type="text" id="terrainT" name="terrainT" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Terreno">
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
                                                        <input type="text" id="constructionT" name="constructionT" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Construcción">
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
                                                        <input type="text" id="frontT" name="frontT" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Frente">
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
                                                        <input type="text" id="sideT" name="sideT" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Fondo">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="onoffCondTerr">Condominio</label>
                                                    <input id = "onoffCondTerr" type="checkbox" data-toggle="toggle" data-on = "si" data-off="no" onchange="showDivCondominium('onoffCondTerr','terr_cond_div')" data-width="80" data-offstyle="secondary">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="terr_cond_div" class="border-top" style="display: none">
                                            <div class="row">
                                                <div class="col-md-4" id="pool_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="poolT" name="poolT">
                                                        <label class="form-check-label" for="poolT">Alberca</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="gym_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="gymT" name="gymT">
                                                        <label class="form-check-label" for="gymT">GYM</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="terrace_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="terraceT" name="terraceT">
                                                        <label class="form-check-label" for="terraceT">Terraza</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4" id="_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="tankT" name="tankT">
                                                        <label class="form-check-label" for="tankT">Cisterna</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="securityT" name="securityT">
                                                        <label class="form-check-label" for="securityT">Seguridad Privada</label>
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
                                                            <input type="text" id="feeT" name="feeT" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Cuota">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" id="office_card" style="display: none">
                                <div class="card-header" style="color: white">
                                    Oficinas
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Antigüedad</label>
                                                    <input type="number" min="0" id="antiquityO" name="antiquityO" class="form-control" placeholder="Antigüedad">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Estacionamiento</label>
                                                    <input type="number" min="0" id="parkingO" name="parkingO" class="form-control" placeholder="Estacionamiento">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Privados</label>
                                                    <input type="number" min="0" id="privatesO" name="privatesO" class="form-control" placeholder="Privados">
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
                                                        <input type="text" id="terrainO" name="terrainO" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Terreno">
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
                                                        <input type="text" id="constructionO" name="constructionO" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Construcción">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="onoffCondOffice">Amenidades</label>
                                                    <input id = "onoffCondOffice" type="checkbox" data-toggle="toggle" data-on = "si" data-off="no" onchange="showDivCondominium('onoffCondOffice','office_cond_div')" data-width="80" data-offstyle="secondary">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="office_cond_div" class="border-top" style="display: none">
                                            <div class="row">
                                                <div class="col-md-4" id="pool_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="valetO" name="valetO">
                                                        <label class="form-check-label" for="valetO">Valet parking</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="gym_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="meetO" name="meetO">
                                                        <label class="form-check-label" for="meetO">Sala de juntas</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="terrace_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="terraceO" name="terraceO">
                                                        <label class="form-check-label" for="terraceO">Terraza</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4" id="_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="audienceO" name="audienceO">
                                                        <label class="form-check-label" for="audienceO">Auditorio</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="coffeeO" name="coffeeO">
                                                        <label class="form-check-label" for="coffeeO">Cafetería</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="receptionO" name="receptionO">
                                                        <label class="form-check-label" for="receptionO">Recepción</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4" id="_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="airconO" name="airconO">
                                                        <label class="form-check-label" for="airconO">Aire acondicionado</label>
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
                                                            <input type="text" id="feeO" name="feeO" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Cuota">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" id="wareh_card" style="display: none">
                                <div class="card-header" style="color: white">
                                    Bodega
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Baños Completos</label>
                                                    <input type="number" min="0" id="fullRestW" name="fullRestW" class="form-control" placeholder="Baños Completos">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Medios Baños</label>
                                                    <input type="number" min="0" id="halfRestW" name="halfRestW" class="form-control" placeholder="Medios Baños">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="">Oficinas</label>
                                                    <input type="number" min="0" id="antiquityW" name="antiquityW" class="form-control" placeholder="Oficinas">
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
                                                        <input type="text" id="terrainW" name="terrainW" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Terreno">
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
                                                        <input type="text" id="constructionW" name="constructionW" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Construcción">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="onoffCondWareh">Condominio</label>
                                                    <input id = "onoffCondWareh" type="checkbox" data-toggle="toggle" data-on = "si" data-off="no" onchange="showDivCondominium('onoffCondWareh','wareh_cond_div')" data-width="80" data-offstyle="secondary">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="wareh_cond_div" class="border-top" style="display: none">
                                            <div class="row">
                                                <div class="col-md-4" id="pool_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="platformW" name="platformW">
                                                        <label class="form-check-label" for="platformW">Anden</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="gym_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="yardW" name="yardW">
                                                        <label class="form-check-label" for="yardW">Patio Maniobras</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="terrace_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="showerW" name="showerW">
                                                        <label class="form-check-label" for="showerW">Regaderas</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4" id="_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="guardhouseW" name="guardhouseW">
                                                        <label class="form-check-label" for="guardhouseW">Caseta vigilancia</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4" id="_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="circuitW" name="circuitW">
                                                        <label class="form-check-label" for="circuitW">Circuito cerrado</label>
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
                                                            <input type="text" id="feeW" name="feeW" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Cuota">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card" id="local_card" style="display: none">
                                <div class="card-header" style="color: white">
                                    Local comercial
                                </div>
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="">Antigüedad</label>
                                                    <input type="number" min="0" id="antiquityL" name="antiquityL" class="form-control" placeholder="Antigüedad">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="">Medios Baños</label>
                                                    <input type="number" min="0" id="halfRestL" name="halfRestL" class="form-control" placeholder="Medios Baños">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="">Estacionamientos</label>
                                                    <input type="number" min="0" id="parkingL" name="parkingL" class="form-control" placeholder="Estacionamientos">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Pisos</label>
                                                    <input type="number" min="0" id="levelsL" name="levelsL" class="form-control" placeholder="Pisos">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="">Nivel</label>
                                                    <input type="number" min="0" id="levelL" name="levelL" class="form-control" placeholder="Nivel">
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
                                                        <input type="text" id="terrainL" name="terrainL" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Terreno">
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
                                                        <input type="text" id="constructionL" name="constructionL" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Construcción">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="onoffCondLocal">Condominio</label>
                                                    <input id = "onoffCondLocal" type="checkbox" data-toggle="toggle" data-on = "si" data-off="no" onchange="showDivCondominium('onoffCondLocal','local_cond_div')" data-width="80" data-offstyle="secondary">
                                                </div>
                                            </div>
                                        </div>
                                        <div id="local_cond_div" class="border-top" style="display: none">
                                            <div class="row">
                                                <div class="col-md-4" id="pool_div">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="securityL" name="securityL">
                                                        <label class="form-check-label" for="securityL">Seguridad privada</label>
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
                                                            <input type="text" id="feeL" name="feeL" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Cuota">
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
                        <button type="button" class="btn btn-secundary" onclick="cancelar('#myModal')">Cancelar</button>
                        <button type="button" onclick="guardarPropiedad()" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- fin modal| --}}
        @include('admin.properties.propertiesedit')
        @include('status')
        {{-- Inicia pantalla de inicio --}}
        <div class="bd-example bd-example-padded-bottom">
            @if ($perm_btn['addition']==1)
                <button type="button" class="btn btn-primary" onclick="abrirmodal('#myModal')">Nuevo</button>
            @endif
        </div>
        <br><br>
        <div class="table-responsive" style="margin-bottom: 10px; max-width: 100%; margin: auto;">
            <table class="table table-striped table-hover text-center" style="width:100%" id="tbProf">
                <thead>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Niveles</th>
                    <th class="text-center">Cuartos</th>
                    <th class="text-center">Medios baños</th>
                    <th class="text-center">Baños completos</th>
                    <th class="text-center">Estacionamientos</th>
                    <th class="text-center">Tipo</th>
                    <th class="text-center">Estatus</th>
                    @if ($perm_btn['modify']==1 || $perm_btn['erase']==1)
                        <th class="text-center">Opciones</th>
                    @endif
                </thead>

                <tbody>
                    @foreach ($properties as $propertie)
                        <tr id="{{$propertie->id}}">
                            <td>{{$propertie->name}}</td>
                            <td>{{$propertie->levels}}</td>
                            <td>{{$propertie->rooms}}</td>
                            <td>{{$propertie->half_rest}}</td>
                            <td>{{$propertie->full_rest}}</td>
                            <td>{{$propertie->parking}}</td>
                            @switch($propertie->type)
                                @case('house_card') <td>Casa</td> @break
                                @case('dept_card') <td>Departamento</td> @break
                                @case('terrain_card') <td>Terreno</td> @break
                                @case('office_card') <td>Oficinas</td> @break
                                @case('wareh_card') <td>Bodega</td> @break
                                @case('local_card') <td>Local Comercial</td> @break
                            @endswitch
                            <td>
                                <button class="btn btn-info" style="background-color: #{{$propertie->color}}; border-color: #{{$propertie->color}}" onclick="opcionesEstatus({{$propertie->id}},{{$propertie->statId}})">{{$propertie->statName}}</button>
                            </td>
                            @if ($perm_btn['erase']==1 || $perm_btn['modify']==1)
                                <td>
                                    @if ($perm_btn['modify']==1)
                                        <button href="#|" class="btn btn-warning" onclick="editarPropiedad({{$propertie->id}})" ><i class="fa fa-edit"></i></button>
                                    @endif
                                    @if ($perm_btn['erase']==1)
                                        <button href="#|" class="btn btn-danger" onclick="eliminarPropiedad({{$propertie->id}})"><i class="fa fa-trash"></i></button>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{URL::asset('js/currencyformat.js')}}" ></script>
@endsection
@push('head')
    <script src="{{URL::asset('js/admin/properties.js')}}"></script>
@endpush
