@extends('home')
{{-- @section('title','Perfiles') --}}
<head>
    <title>Agenda | Torralto</title>
</head>
@section('content')
    <div class="text-center"><h1>Agenda</h1></div>
    <div style="max-width: 100%; margin: auto;">
        {{-- modal| --}}
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="gridModalLabek">Registro de cita</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Cliente</label>
                                            <select name="selectClient" id="selectClient" class="form-select">
                                                <option hidden selected value="">Selecciona una opción</option>
                                                @foreach ($clients as $client)
                                                    <option value='{{ $client->id }}'>{{ $client->cname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
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
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Fecha de cita</label>
                                            <input type="datetime-local" id="appointmentDate" name="appointmentDate" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Propiedad</label>
                                            <input type="text" id="propertie_edit" class="form-control" disabled placeholder="Propiedad">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        @if ($perm_btn['modify']==1)
                                            <button type="button" class="btn btn-primary" style="width: 100%; height: 60;" onclick="abrirmodal('#modalSrcPropertie','')">Cambiar</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
                        <button type="button" onclick="guardarCita()" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- fin modal| --}}
        {{-- modal| --}}
        <div id="myModalEdit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="gridModalLabek">Registro de cita</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Cliente</label>
                                            <select name="selectClient1" id="selectClient1" class="form-select">
                                                <option hidden selected value="">Selecciona una opción</option>
                                                @foreach ($clients as $client)
                                                    <option value='{{ $client->id }}'>{{ $client->cname }}</option>
                                                @endforeach
                                            </select>
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
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Fecha de cita</label>
                                            <input type="datetime-local" id="appointmentDate1" name="appointmentDate1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Propiedad</label>
                                            <input type="text" id="propertie_edit1" class="form-control" disabled placeholder="Propiedad">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        @if ($perm_btn['modify']==1)
                                            <button type="button" class="btn btn-primary" style="width: 100%; height: 60;" onclick="abrirmodal('#modalSrcPropertie','1')">Cambiar</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
                        @if ($perm_btn['modify']==1)
                            <button type="button" onclick="actualizarCita()" class="btn btn-primary">Guardar</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{-- fin modal| --}}
        {{-- inicia modal --}}
        <div id="modalSrcPropertie" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="gridModalLabek">Buscar Propiedad</h4>
                        <button type="button" class="close" onclick="cancelar('#modalSrcPropertie')"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
                            <div class="table-responsive" style="margin-bottom: 10px; max-width: 100%; margin: auto;">
                                <table class="table table-striped table-hover text-center" style="width:100%" id="srcClient">
                                    <thead>
                                        <th class="text-center">Nombre</th>
                                        <th class="text-center">Tipo</th>
                                        <th class="text-center">Accion</th>

                                    </thead>
                                    <tbody>
                                        @foreach ($properties as $propertie)
                                            <tr id="{{$propertie->id}}">
                                                <td>{{$propertie->name}}</td>
                                                @switch($propertie->type)
                                                    @case('house_card') <td>Casa</td> @break
                                                    @case('dept_card') <td>Departamento</td> @break
                                                    @case('terrain_card') <td>Terreno</td> @break
                                                    @case('office_card') <td>Oficinas</td> @break
                                                    @case('wareh_card') <td>Bodega</td> @break
                                                    @case('local_card') <td>Local Comercial</td> @break
                                                @endswitch
                                                <td>
                                                    <button type="button" class="btn btn-primary" onclick="obtenerid({{$propertie->id}},'{{$propertie->name}}')">Seleccionar</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- fin modal --}}
        @include('status')
        {{-- Inicia pantalla de inicio --}}
        <div class="bd-example bd-example-padded-bottom">
            @if ($perm_btn['addition']==1)
                <button type="button" class="btn btn-primary" onclick="abrirmodal('#myModal','')">Nuevo</button>
            @endif
        </div>
        <br><br>
        <div class="table-responsive" style="margin-bottom: 10px; max-width: 100%; margin: auto;">
            <table class="table table-striped table-hover text-center" style="width:100%" id="tbProf">
                <thead>
                    <th class="text-center">Cita</th>
                    <th class="text-center">Agente</th>
                    <th class="text-center">Cliente</th>
                    <th class="text-center">Propiedad</th>
                    <th class="text-center">Estatus</th>
                    @if ($perm_btn['modify']==1 || $perm_btn['erase']==1)
                        <th class="text-center">Opciones</th>
                    @endif
                </thead>

                <tbody>
                    @foreach ($dates as $date)
                        <tr id="{{$date->id}}">
                            <td>{{$date->appointment_date}}</td>
                            <td>{{$date->uname}}</td>
                            <td>{{$date->cname}}</td>
                            <td>{{$date->pname}}</td>
                            <td>
                                <button class="btn btn-info" style="background-color: #{{$date->color}}; border-color: #{{$date->color}}" onclick="opcionesEstatus({{$date->id}},{{$date->statId}})">{{$date->statName}}</button>
                            </td>
                            @if ($perm_btn['erase']==1 || $perm_btn['modify']==1)
                                <td>
                                    @if ($perm_btn['modify']==1)
                                        <button href="#|" class="btn btn-warning" onclick="editarCita({{$date->id}})" ><i class="fa fa-edit"></i></button>
                                    @endif
                                    @if ($perm_btn['erase']==1)
                                        <button href="#|" class="btn btn-danger" onclick="eliminarCita({{$date->id}})"><i class="fa fa-trash"></i></button>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('head')
    <script src="{{URL::asset('js/process/agenda.js')}}"></script>
@endpush
