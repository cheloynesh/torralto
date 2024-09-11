var ruta = window.location;
var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host + getUrl.pathname;

$(document).ready( function () {
    $('#tbProf').DataTable({
        language : {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
              "sFirst":    "Primero",
              "sLast":     "Último",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
            },
            "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
} );
$(document).ready( function () {
    $('#srcClient').DataTable({
        language : {
            "sProcessing":     "Procesando...",
            "sLengthMenu":     "Mostrar _MENU_ registros",
            "sZeroRecords":    "No se encontraron resultados",
            "sEmptyTable":     "Ningún dato disponible en esta tabla",
            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix":    "",
            "sSearch":         "Buscar:",
            "sUrl":            "",
            "sInfoThousands":  ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
              "sFirst":    "Primero",
              "sLast":     "Último",
              "sNext":     "Siguiente",
              "sPrevious": "Anterior"
            },
            "oAria": {
              "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
              "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
    });
} );

function RefreshTable(data,profile,permission)
{
    var table = $('#tbProf').DataTable();
    var btnStat = '';
    var btnEdit = '';
    var btnTrash = '';
    table.clear();

    data.forEach( function(valor, indice, array) {
        btnStat = '<button class="btn btn-info" style="background-color: #'+valor.color+'; border-color: #'+valor.color+'" onclick="opcionesEstatus('+valor.id+','+valor.statId+')">'+valor.statName+'</button>';
        btnEdit = '<button href="#|" class="btn btn-warning" onclick="editarCita('+valor.id+')" ><i class="fa fa-edit"></i></button>';
        btnTrash = '<button href="#|" class="btn btn-danger" onclick="eliminarCita('+valor.id+')"><i class="fa fa-trash"></i></button>';

        if(permission["erase"] == 1)
            table.row.add([valor.appointment_date,valor.uname,valor.cname,valor.pname,btnStat,btnEdit+" "+btnTrash]);
        else
            table.row.add([valor.appointment_date,valor.uname,valor.cname,valor.pname,btnStat,btnEdit]);
    });
    table.draw(false);
}

function cancelar(modal)
{
    $(modal).modal('hide');
}

type = '';
function abrirmodal(modal,typ)
{
    type = typ;
    $(modal).modal('show');
}

idPropertie = 0;
function obtenerid(id, name)
{
    idPropertie = id;

    $("#propertie_edit"+type).val(name);

    $("#modalSrcPropertie").modal("hide");
}

function guardarCita()
{
    var fk_client = $("#selectClient").val();
    var fk_user = $("#consultant").val();
    var appointment_date = $("#appointmentDate").val();
    var route = "agenda";
    var data = {
        "_token": $("meta[name='csrf-token']").attr("content"),
        'fk_client':fk_client,
        'fk_user':fk_user,
        'fk_propertie':idPropertie,
        'appointment_date':appointment_date,
    };
    jQuery.ajax({
        url:route,
        type:"post",
        data: data,
        dataType: 'json',
        success:function(result)
        {
            alertify.success(result.message);
            $("#myModal").modal('hide');
            RefreshTable(result.dates,result.profile,result.permission);
        },
        error:function(result,error,errorTrown)
        {
            alertify.error(errorTrown);
        }
    })
}

function editarCita(id)
{
    idupdate=id;

    var route = baseUrl + '/GetInfo/'+id;
    // alert(route);
    jQuery.ajax({
        url:route,
        type:'get',
        dataType:'json',
        success:function(result)
        {
            $("#selectClient1").val(result.data.fk_client);
            $("#consultant1").val(result.data.fk_user);
            $("#appointmentDate1").val(result.data.appointment_date);
            $("#propertie_edit1").val(result.data.name);
            id_propertie = result.data.fk_propertie;
            $("#myModalEdit").modal('show');
        },
        error:function(result,error,errorTrown)
        {
            alertify.error(errorTrown);
        }
    })
}

function actualizarCita()
{
    // alert(policy);
    var fk_client = $("#selectClient1").val();
    var fk_user = $("#consultant1").val();
    var appointment_date = $("#appointmentDate1").val();

    // var route = "client/"+idupdate;
    var route = baseUrl + "/" + idupdate;

    var data = {
        'id':idupdate,
        "_token": $("meta[name='csrf-token']").attr("content"),
        'fk_client':fk_client,
        'fk_user':fk_user,
        'fk_propertie':idPropertie,
        'appointment_date':appointment_date,
    };
    jQuery.ajax({
        url:route,
        type:'put',
        data:data,
        dataType:'json',
        success:function(result)
        {
            alertify.success(result.message);
            $("#myModalEdit").modal('hide');
            RefreshTable(result.dates,result.profile,result.permission);
        },
        error:function(result,error,errorTrown)
        {
            alertify.error(errorTrown);
        }
    })
}

id_propertie = 0;
function opcionesEstatus(propertieId,statusId)
{
    id_propertie=propertieId;
    var route = baseUrl+'/GetinfoStatus/'+propertieId;
    jQuery.ajax({
        url:route,
        type:'get',
        dataType:'json',
        success:function(result){
            $("#selectStatus").val(statusId);
            $("#commentary").val(result.data.commentary);
            $("#myEstatusModal").modal('show');
        },
        error:function(result,error,errorTrown)
        {
            alertify.error(errorTrown);
        }
    })
}

function actualizarEstatus()
{
    // alert("entre a viewpolicy");
    var status = $("#selectStatus").val();
    var commentary = $("#commentary").val();
    var route = baseUrl + "/updateStatus";
    // console.log(route);
    var data = {
        'id':id_propertie,
        "_token": $("meta[name='csrf-token']").attr("content"),
        'status':status,
        "commentary":commentary
    };
    jQuery.ajax({
        url:route,
        type:'post',
        data:data,
        dataType:'json',
        success:function(result)
        {
            alertify.success(result.message);
            $("#myEstatusModal").modal('hide');
            RefreshTable(result.dates,result.profile,result.permission);
        },
        error:function(result,error,errorTrown)
        {
            alertify.error(errorTrown);
        }
    })
}

function eliminarCita(id)
{
    var route = "agenda/"+id;
    var data = {
        'id':id,
        "_token": $("meta[name='csrf-token']").attr("content"),
    };
    alertify.confirm("Eliminar Cita","¿Desea borrar la cita?",
        function(){
            jQuery.ajax({
                url:route,
                data: data,
                type:'delete',
                dataType:'json',
                success:function(result)
                {
                    RefreshTable(result.dates,result.profile,result.permission);
                    alertify.success('Eliminado');
                },
                error:function(result,error,errorTrown)
                {
                    alertify.error(errorTrown);
                }
            })
        },
        function(){});
}

function selectPropertie(typ)
{
    id = $("#selectClient").val();

    var route = baseUrl + '/GetInfoClient/'+id;
    // alert(route);
    jQuery.ajax({
        url:route,
        type:'get',
        dataType:'json',
        success:function(result)
        {
            if(result.propertie != null)
            {
                $("#propertie_edit" + typ).val(result.propertie.name);
                id_propertie = result.propertie.id;
            }
            else
            {
                idPropertie = 0;
                $("#propertie_edit" + typ).val("");
            }
        },
        error:function(result,error,errorTrown)
        {
            alertify.error(errorTrown);
        }
    })
}
