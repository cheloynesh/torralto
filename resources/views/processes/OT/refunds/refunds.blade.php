@extends('home')
<head>
    <title>Siniestros | Elan</title>
</head>
<style>
    thead input {
    width: 100%;
    padding: 3px;
    box-sizing: border-box;
}
</style>
@section('content')
    <div class="text-center"><h1>Siniestros</h1></div>
        {{-- modal| --}}
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="gridModalLabek">Registro de Siniestro</h4>
                    <button type="button" class="close" onclick="cerrar('#myModal')" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Folio</label>
                                    <input type="text" id="folio" name="folio" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Contratante</label>
                                    <input type="text" id="contractor" name="contractor" class="form-control">
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
                                    <select name="selectBranch" id="selectBranch" class="form-select">
                                        <option selected value="">Selecciona una opción</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Fecha de Ingreso</label>
                                    <input type="date" id="entry_date" name="entry_date" class="form-control" placeholder="Fecha de Sistema">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Póliza</label>
                                    <input type="text" id="policy" name="policy" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Asegurado Afectado</label>
                                    <input type="text" id="insured" name="insured" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="">Número de Siniestro</label>
                                        <input type="text" id="sinister" name="sinister" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for="">Tipo de Trámite</label>
                                        <select name="selectType" id="selectType" class="form-select" onchange="changeType('')">
                                            <option hidden selected value="0">Selecciona una opción</option>
                                            <option value="1">Reembolsos</option>
                                            <option value="2">Prog. Cirugia</option>
                                            <option value="3">Reconsideración</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="refundDiv">
                                <div class="form-group">
                                    <label for="">Monto a Reembolsar</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">$</div>
                                        </div>
                                        <input type="text" id="amount" name="amount" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" id="payDiv">
                                <div class="form-group">
                                    <label for="">Forma de Pago</label>
                                    <select name="selectPayment" id="selectPayment" class="form-select">
                                        <option hidden selected value="0">Selecciona una opción</option>
                                        <option value="Transferencia">Transferencia</option>
                                        <option value="Cheque">Cheque</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secundary" onclick="cerrar('#myModal')">Cancelar</button>
                    <button type="button" onclick="guardarSiniestro()" class="btn btn-primary">Guardar</button>
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
                    <button type="button" class="close" onclick="cerrar('#myModalExport')" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                    <button type="button" class="btn btn-secundary" onclick="cerrar('#myModalExport')">Cancelar</button>
                    <button type="button" onclick="excel_nuc()" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    {{-- fin modal| --}}
    @include('processes.OT.refunds.refundsEdit')
    {{-- Inicia pantalla de inicio --}}
    <div class="col-lg-12">
        <div class="row">
            @if ($perm_btn['modify']==1)
                <div class="col-md-12">
                    <div class="form-group">
                        @if ($perm_btn['addition']==1)
                            <button type="button" class="btn btn-primary" onclick="abrirNuevo()"  title="Nuevo"><i class="fas fa-plus"></i></button>
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
                <th class="text-center">Agente</th>
                <th class="text-center">Contratante</th>
                <th class="text-center">Folio</th>
                <th class="text-center">Compañía</th>
                <th class="text-center">Estatus</th>
                <th class="text-center">Opciones</th>
            </thead>

            <tbody>
                @foreach ($refunds as $refund)
                    <tr id="{{$refund->id}}">
                        <td>{{$refund->agent}}</td>
                        <td>{{$refund->contractor}}</td>
                        <td>{{$refund->folio}}</td>
                        <td>{{$refund->insurance}}</td>
                        <td>
                            <button class="btn btn-info" style="background-color: #{{$refund->color}}; border-color: #{{$refund->color}}" onclick="opcionesEstatus({{$refund->id}},{{$refund->statId}})">{{$refund->statName}}</button>
                        </td>
                        {{-- <td>{{$initial->client}}</td> --}}
                        <td>
                            <button href="#|" class="btn btn-warning" onclick="editarSiniestro({{$refund->id}})" ><i class="fa fa-edit"></i></button>
                            @if ($perm_btn['erase']==1)
                                <button href="#|" class="btn btn-danger" onclick="eliminarSiniestro({{$refund->id}})"><i class="fa fa-trash"></i></button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('head')
    <script src="{{URL::asset('js/processes/refunds.js')}}"></script>
@endpush
