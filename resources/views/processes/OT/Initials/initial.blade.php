@extends('home')
<head>
    <title>Iniciales | Elan</title>
</head>
@section('content')
    <div class="text-center"><h1>Iniciales</h1></div>
        {{-- modal| --}}
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="gridModalLabek">Registro de Iniciales</h4>
                    <button type="button" class="close" onclick="cerrarguardarInicial()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid bd-example-row">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Agente:</label>
                                    <select name="selectAgent" id="selectAgent" class="form-select">
                                        <option hidden selected value="">Selecciona una opción</option>
                                        @foreach ($agents as $id => $agent)
                                            <option value='{{ $id }}'>{{ $agent }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Tipo de contratante</label>
                                    &nbsp;
                                    <input id = "onoff" type="checkbox" checked data-toggle="toggle" data-on = "fisica" data-off="moral" onchange="mostrarDiv()" data-width="80" data-offstyle="secondary">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">¿El contratante es igual al asegurado?</label>
                                    &nbsp;
                                    <input id = "onoffAsegurado" type="checkbox" checked data-toggle="toggle" data-on = "si" data-off="no" onchange="mostrarDivAsegurado()" data-width="80" data-offstyle="secondary">
                                </div>
                            </div>
                        </div>

                        <div class = "row" id = "fisicaInitial">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Nombre</label>
                                    <input type="text" id="name" name="nameEdit" class="form-control" placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Apellido paterno</label>
                                    <input type="text" id="firstname" name="firstnameEdit" class="form-control" placeholder="Apellido">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">Apellido materno</label>
                                    <input type="text" id="lastname" name="lastnameEdit" class="form-control" placeholder="Apellido">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">RFC</label>
                                    <input type="text" id="rfc" name="rfc" class="form-control" placeholder="RFC">
                                </div>
                            </div>
                        </div>

                        <div class = "row" id = "moralInitial" style = "display: none;">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Razón Social</label>
                                    <input type="text" id="business_name" name="business_name" class="form-control" placeholder="Razón Social">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">RFC</label>
                                    <input type="text" id="business_rfc" name="business_rfc" class="form-control" placeholder="RFC">
                                </div>
                            </div>
                        </div>

                        <div id = "asegurado" style = "display: none;">
                            <div class = "row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Nombre del Asegurado</label>
                                        <input type="text" id="insured" name="insured" class="form-control" placeholder="Nombre">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Fecha de promotoria</label>
                                    <input type="date" id="promoter" name="promoter" class="form-control" placeholder="Fecha de Promotoria">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Fecha de Sistema</label>
                                    <input type="date" id="system" name="system" class="form-control" placeholder="Fecha de Sistema">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Número de Guía</label>
                                    <input type="text" id="guide" name="guide" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Compañía:</label>
                                    <select name="selectInsurance" id="selectInsurance" class="form-select" onchange="llenarRamos()">
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
                                    <select name="selectBranch" id="selectBranch" class="form-select" onchange="llenarPlanes()">
                                        <option selected value="">Selecciona una opción</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Plan/Contrato</label>
                                    <select name="selectPlan" id="selectPlan" class="form-select">
                                        <option selected value="">Selecciona una opción</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Tipo Solicitud:</label>
                                    <select name="selectAppli" id="selectAppli" class="form-select">
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
                                    <input type="text" id="folio" name="folio" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">PNA/Monto</label>
                                    <input type="text" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" id="pna" name="pna" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Forma de Pago:</label>
                                    <select name="selectPaymentform" id="selectPaymentform" class="form-select">
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
                                    <select name="selectCurrency" id="selectCurrency" class="form-select">
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
                                    <select name="selectCharge" id="selectCharge" class="form-select">
                                        <option hidden selected value="">Selecciona una opción</option>
                                        @foreach ($charges as $id => $charge)
                                            <option value='{{ $id }}'>{{ $charge }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secundary" onclick="cerrarguardarInicial()">Cancelar</button>
                    <button type="button" onclick="guardarInicial()" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    {{-- fin modal| --}}
    {{-- modal excel --}}
    <div id="myModalExport" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="gridModalLabek">Exportar a Excel</h4>
                    <button type="button" class="close" onclick="cerrarFiltro()" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>

                <div class="modal-body">
                    <div class="container-fluid bd-example-row">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Estatus:</label>
                                    <select name="selectStatusExc" id="selectStatusExc" class="form-select">
                                        <option hidden selected value = 0>Selecciona una opción</option>
                                        @foreach ($estatusExc as $id => $estat)
                                            <option value='{{ $id }}'>{{ $estat }}</option>
                                        @endforeach
                                        <option value = 0>Todos</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Branch:</label>
                                    <select name="selectBranchExc" id="selectBranchExc" class="form-select">
                                        <option hidden selected value = 0>Selecciona una opción</option>
                                        @foreach ($branchesExc as $id => $brnch)
                                            <option value='{{ $id }}'>{{ $brnch }}</option>
                                        @endforeach
                                        <option value = 0>Todos</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secundary" onclick="cerrarFiltro()">Cancelar</button>
                    <button type="button" onclick="excel_nuc()" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    {{-- fin modal| --}}
    @include('processes.OT.Initials.initialEdit')
    @include('processes.OT.status.status')
    @include('policies.newPolicy')
    {{-- Inicia pantalla de inicio --}}
    <div class="col-lg-12">
        <div class="row">
            @if ($perm_btn['modify']==1)
                <div class="col-md-12">
                    <div class="form-group">
                        @if ($perm_btn['addition']==1)
                            <button type="button" class="btn btn-primary" onclick="abrirguardarInicial()" title="Nuevo Servicio"><i class="fas fa-plus"></i></button>
                            <button type="button" class="btn btn-primary" onclick="abrirFiltro()" title="Exportar a Excel"><i class="fas fa-file-excel"></i></button>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
    <br><br>
        <div class="table-responsive" style="margin-bottom: 10px; max-width: 100%; margin: auto;">
        <table class="table table-striped table-hover text-center" style="width:100%" id="tbProf">
            <thead>
                {{-- <th class="text-center">Fecha</th> --}}
                <th class="text-center">Agente</th>
                <th class="text-center">Cliente</th>
                <th class="text-center">RFC</th>
                <th class="text-center">Folio/Id</th>
                <th class="text-center">Compañía</th>
                <th class="text-center">Ramo</th>
                <th class="text-center">Estatus</th>
                <th class="text-center">Opciones</th>
            </thead>

            <tbody>
                @foreach ($initials as $initial)
                    <tr id="{{$initial->id}}">
                        {{-- <td>{{$initial->date}}</td> --}}
                        <td>{{$initial->agent}}</td>
                        <td>{{$initial->client}} {{$initial->firstname}} {{$initial->lastname}}</td>
                        <td>{{$initial->rfc}}</td>
                        <td>{{$initial->folio}}</td>
                        <td>{{$initial->insurance}}</td>
                        <td>{{$initial->branch}}</td>
                        <td>
                            <button class="btn btn-info" style="background-color: #{{$initial->color}}; border-color: #{{$initial->color}}" onclick="opcionesEstatus({{$initial->id}},{{$initial->statId}})">{{$initial->name}}</button>
                        </td>
                        {{-- <td>{{$initial->client}}</td> --}}
                        <td>
                            <button href="#|" class="btn btn-warning" onclick="editarInicial({{$initial->id}})" ><i class="fa fa-edit"></i></button>
                            @if ($perm_btn['erase']==1)
                                <button href="#|" class="btn btn-danger" onclick="eliminarInicial({{$initial->id}})"><i class="fa fa-trash"></i></button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="{{URL::asset('js/currencyformat.js')}}" ></script>
@endsection
@push('head')
<script src="{{URL::asset('js/admin/client.js')}}" ></script>
<script src="{{URL::asset('js/policies/viewpolicy.js')}}"></script>
<script src="{{URL::asset('js/processes/initials.js')}}"></script>
@endpush
