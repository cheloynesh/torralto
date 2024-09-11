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
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cancelar('#preferencesModal')"><span aria-hidden="true">&times;</span></button>
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
                                            <select name="selectCompRest" id="selectFullRest" class="form-select">
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
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Precio mínimo</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">$</div>
                                                </div>
                                                <input type="text" id="minPrice" name="minPrice" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Precio mínimo">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Precio máximo</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">$</div>
                                                </div>
                                                <input type="text" id="maxPrice" name="maxPrice" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" value="" data-type="currency" class="form-control" placeholder="Precio máximo">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Propiedad</label>
                                            <input type="text" id="propertie_edit" class="form-control" disabled placeholder="Propiedad">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        @if ($perm_btn['modify']==1)
                                            <button type="button" class="btn btn-primary" style="height: 60;" onclick="abrirmodal('#modalSrcPropertie','1')">Cambiar</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="cancelar('#preferencesModal')" class="btn btn-secundary" data-dismiss="modal">Cancelar</button>
                        <button type="button" onclick="savePreferences()" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- fin modal --}}

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
    <script src="{{URL::asset('js/currencyformat.js')}}" ></script>
@endsection
@push('head')
    <script src="{{URL::asset('js/admin/client.js')}}"></script>
@endpush
