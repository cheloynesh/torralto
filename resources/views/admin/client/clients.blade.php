@extends('home')
<head>
    <title>Clientes | Torralto</title>
</head>
@section('content')
    <div class="text-center"><h1>Catálogo de Clientes</h1></div>
    <div style="max-width: 1200px; margin: auto;">
        {{-- modal preferencias --}}
        <div id="preferencesModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="gridModalLabek">Preferencias</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cancelar('#salesModal')"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <div class="modal-body">
                        <div class="container-fluid bd-example-row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Niveles</label>
                                            <select name="selectLevel" id="selectLevel" class="form-select">
                                                <option hidden selected value=0>Selecciona una opción</option>
                                                <option value = 1>1</option>
                                                <option value = 2>2</option>
                                                <option value = 3>3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Estacionamiento</label>
                                            <select name="selectPark" id="selectPark" class="form-select">
                                                <option hidden selected value=0>Selecciona una opción</option>
                                                <option value = 1>1</option>
                                                <option value = 2>2</option>
                                                <option value = 3>3</option>
                                                <option value = 4>4</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Habitaciones</label>
                                            <select name="selectRooms" id="selectRooms" class="form-select">
                                                <option hidden selected value=0>Selecciona una opción</option>
                                                <option value = 1>1</option>
                                                <option value = 2>2</option>
                                                <option value = 3>3</option>
                                                <option value = 4>4</option>
                                                <option value = 5>5</option>
                                                <option value = 6>6</option>
                                                <option value = 7>7</option>
                                                <option value = 8>8</option>
                                                <option value = 9>9</option>
                                                <option value = 10>10</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Baños Completos</label>
                                            <select name="selectCompRest" id="selectCompRest" class="form-select">
                                                <option hidden selected value=0>Selecciona una opción</option>
                                                <option value = 1>1</option>
                                                <option value = 2>2</option>
                                                <option value = 3>3</option>
                                                <option value = 4>4</option>
                                                <option value = 5>5</option>
                                                <option value = 6>6</option>
                                                <option value = 7>7</option>
                                                <option value = 8>8</option>
                                                <option value = 9>9</option>
                                                <option value = 10>10</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Medios Baños</label>
                                            <select name="selectHalfRest" id="selectHalfRest" class="form-select">
                                                <option hidden selected value=0>Selecciona una opción</option>
                                                <option value = 1>1</option>
                                                <option value = 2>2</option>
                                                <option value = 3>3</option>
                                                <option value = 4>4</option>
                                                <option value = 5>5</option>
                                                <option value = 6>6</option>
                                                <option value = 7>7</option>
                                                <option value = 8>8</option>
                                                <option value = 9>9</option>
                                                <option value = 10>10</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="cancelar('#salesModal')" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
                        <button type="button" onclick="guardarVentas()" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- fin modal --}}
        @include('admin.client.clientnew')
        @include('admin.client.clientedit')
        @include('admin.client.enterpriseedit')
        {{-- Inicia pantalla de inicio --}}
        <div class="bd-example bd-example-padded-bottom">
            @if ($perm_btn['addition']==1)
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNewClient">Nuevo</button>
            @endif
        </div>
        <br><br>
        <div class="table-responsive" style="margin-bottom: 10px; max-width: 100%; margin: auto;">
            <table class="table table-striped table-hover text-center" style="width:100%" id="tbClient">
                <thead>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Celular</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Tipo</th>
                    @if ($perm_btn['modify']==1 || $perm_btn['erase']==1)
                        <th class="text-center">Opciones</th>
                    @endif
                </thead>

                <tbody>
                    @foreach ($clients as $client)
                        <tr id="{{$client->id}}">
                            <td>{{$client->name}} {{$client->firstname}} {{$client->lastname}}</td>
                            <td>{{$client->cellphone}}</td>
                            <td>{{$client->email}}</td>
                            @if ($client->status == 0)
                                <td>Física</td>
                            @else
                                <td>Moral</td>
                            @endif
                            {{-- <td>{{$client->status}}</td> --}}
                            @if ($perm_btn['modify']==1 || $perm_btn['erase']==1)
                                <td>
                                    @if ($perm_btn['modify']==1)
                                        <button href="#|" class="btn btn-primary" onclick="openPreferences({{$client->id}})" >Preferencias</button>

                                        @if ($client->status == 0)
                                            <button href="#|" class="btn btn-warning" onclick="editarCliente({{$client->id}})" ><i class="fa fa-edit"></i></button>
                                        @else
                                            <button href="#|" class="btn btn-warning" onclick="editarEmpresa({{$client->id}})" ><i class="fa fa-edit"></i></button>
                                        @endif
                                    @endif
                                    @if ($perm_btn['erase']==1)
                                        <button href="#|" class="btn btn-danger" onclick="eliminarCliente({{$client->id}})"><i class="fa fa-trash"></i></button>
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
    <script src="{{URL::asset('js/admin/client.js')}}"></script>
@endpush
