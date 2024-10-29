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
    var btnPropertie = '';
    table.clear();

    data.forEach( function(valor, indice, array) {
        btnPropertie = '<button type="button" class="btn btn-primary" onclick="verPropiedad('+valor.pid+')">'+valor.pname+'</button>';
        btnStat = '<button class="btn btn-info" style="background-color: #'+valor.color+'; border-color: #'+valor.color+'" onclick="opcionesEstatus('+valor.id+','+valor.statId+')">'+valor.statName+'</button>';
        btnEdit = '<button href="#|" class="btn btn-warning" onclick="editarCita('+valor.id+')" ><i class="fa fa-edit"></i></button>';
        btnTrash = '<button href="#|" class="btn btn-danger" onclick="eliminarCita('+valor.id+')"><i class="fa fa-trash"></i></button>';

        if(permission["erase"] == 1)
            table.row.add([valor.appointment_date,valor.uname,valor.cname,btnPropertie,btnStat,btnEdit+" "+btnTrash]);
        else
            table.row.add([valor.appointment_date,valor.uname,valor.cname,btnPropertie,btnStat,btnEdit]);
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

function verPropiedad(id)
{
    idupdate=id;

    var route = baseUrl + '/GetInfoPropertie/'+id;
    // alert(route);
    jQuery.ajax({
        url:route,
        type:'get',
        dataType:'json',
        success:function(result)
        {
            var auxtype = '';
            actualizarSelect(result.suburbs,"#selectSuburb2");
            // alert(result.data.name);
            $("#name2").val(result.data.name);
            $("#owner2").val(result.data.owner);
            $("#consultantp2").val(result.data.fk_user);
            result.data.sale_price != null ? $("#salePrice2").val(parseFloat(result.data.sale_price).toLocaleString('en-US')) : $("#salePrice2").val("");
            result.data.rent_price != null ? $("#rentPrice2").val(parseFloat(result.data.rent_price).toLocaleString('en-US')) : $("#rentPrice2").val("");

            $("#street2").val(result.data.street);
            $("#e_num2").val(result.data.e_num);
            $("#i_num2").val(result.data.i_num);
            $("#pc2").val(result.data.pc);

            $("#selectSuburb2").val(result.data.fk_pc);
            $("#country2").val(result.data.country);
            $("#state2").val(result.data.state);
            $("#city2").val(result.data.city);

            document.getElementById("viewMaps").href = result.data.maps;

            $("#selectPropertieType2").val(result.data.type);

            switch(result.data.type)
            {
                case 'house_card': auxtype = 'H'; break;
                case 'dept_card': auxtype = 'D'; break;
                case 'terrain_card': auxtype = 'T'; break;
                case 'office_card': auxtype = 'O'; break;
                case 'wareh_card': auxtype = 'W'; break;
                case 'local_card': auxtype = 'L'; break;
            }

            $("#levels" + auxtype + '2').val(result.data.levels);
            $("#parking" + auxtype + '2').val(result.data.parking);
            $("#rooms" + auxtype + '2').val(result.data.rooms);
            $("#fullRest" + auxtype + '2').val(result.data.full_rest);
            $("#halfRest" + auxtype + '2').val(result.data.half_rest);
            $("#antiquity" + auxtype + '2').val(result.data.antiquity);
            result.data.terrain != null ? $("#terrain" + auxtype + '2').val(parseFloat(result.data.terrain).toLocaleString('en-US')) : $("#terrain" + auxtype + '2').val('');
            result.data.construction != null ? $("#construction" + auxtype + '2').val(parseFloat(result.data.construction).toLocaleString('en-US')) : $("#construction" + auxtype + '2').val('');
            result.data.front != null ? $("#front" + auxtype + '2').val(parseFloat(result.data.front).toLocaleString('en-US')) : $("#front" + auxtype + '2').val('');
            result.data.side != null ? $("#side" + auxtype + '2').val(parseFloat(result.data.side).toLocaleString('en-US')) : $("#side" + auxtype + '2').val('');
            $("#privates" + auxtype + '2').val(result.data.privates);
            $("#office" + auxtype + '2').val(result.data.office);
            $("#level" + auxtype + '2').val(result.data.level);

            setCondominium(auxtype,result.data.extras,result.data.fee,'2');

            document.getElementById("house_card2").style.display = "none";
            document.getElementById("dept_card2").style.display = "none";
            document.getElementById("terrain_card2").style.display = "none";
            document.getElementById("office_card2").style.display = "none";
            document.getElementById("wareh_card2").style.display = "none";
            document.getElementById("local_card2").style.display = "none";

            document.getElementById(result.data.type + '2').style.display = "block";

            $("#myModalViewPropertie").modal('show');
        },
        error:function(result,error,errorTrown)
        {
            alertify.error(errorTrown);
        }
    })
}

function actualizarSelect(result, select)
{
    var assignPlan = $(select);

    $(select).empty();
    if(result.length == 0 || result == null) assignPlan.append('<option selected  value="0">Seleccione una opción</option>');
    else assignPlan.append('<option selected hidden value="0">Seleccione una opción</option>');
    result.forEach( function(valor, indice, array) {
        assignPlan.append("<option value='" + valor.id + "'>" + valor.suburb + "</option>");
    });
}

function setCondominium(type,extras,fee,edit)
{
    if(extras != null || fee != 0)
    {
        fee != null ? $("#fee" + type + '2').val(parseFloat(fee).toLocaleString('en-US')) : $("#fee" + type + '2').val('');

        extras = extras.split('-');
        console.log(extras,type);

        switch(type)
        {
            case 'H':
                document.getElementById('onoffCondHome2').disabled = false;
                $("#onoffCondHome2").bootstrapToggle('on');
                document.getElementById('onoffCondHome2').disabled = true;
                document.getElementById("poolH" + edit).checked = parseInt(extras[0]);
                document.getElementById("gymH" + edit).checked = parseInt(extras[1]);
                document.getElementById("terraceH" + edit).checked = parseInt(extras[2]);
                document.getElementById("tankH" + edit).checked = parseInt(extras[3]);
                document.getElementById("securityH" + edit).checked = parseInt(extras[4]);
                break;
            case 'D':
                document.getElementById('onoffCondDept2').disabled = false;
                $("#onoffCondDept2").bootstrapToggle('on');
                document.getElementById('onoffCondDept2').disabled = true;
                document.getElementById("poolD" + edit).checked = parseInt(extras[0]);
                document.getElementById("gymD" + edit).checked = parseInt(extras[1]);
                document.getElementById("terraceD" + edit).checked = parseInt(extras[2]);
                document.getElementById("liftD" + edit).checked = parseInt(extras[3]);
                document.getElementById("securityD" + edit).checked = parseInt(extras[4]);
                break;
            case 'T':
                document.getElementById('onoffCondTerr2').disabled = false;
                $("#onoffCondTerr2").bootstrapToggle('on');
                document.getElementById('onoffCondTerr2').disabled = true;
                document.getElementById("poolT" + edit).checked = parseInt(extras[0]);
                document.getElementById("gymT" + edit).checked = parseInt(extras[1]);
                document.getElementById("terraceT" + edit).checked = parseInt(extras[2]);
                document.getElementById("tankT" + edit).checked = parseInt(extras[3]);
                document.getElementById("securityT" + edit).checked = parseInt(extras[4]);
                break;
            case 'O':
                document.getElementById('onoffCondOffice2').disabled = false;
                $("#onoffCondOffice2").bootstrapToggle('on');
                document.getElementById('onoffCondOffice2').disabled = true;
                document.getElementById("valetO" + edit).checked = parseInt(extras[0]);
                document.getElementById("meetO" + edit).checked = parseInt(extras[1]);
                document.getElementById("terraceO" + edit).checked = parseInt(extras[2]);
                document.getElementById("audienceO" + edit).checked = parseInt(extras[3]);
                document.getElementById("coffeeO" + edit).checked = parseInt(extras[4]);
                document.getElementById("receptionO" + edit).checked = parseInt(extras[5]);
                document.getElementById("airconO" + edit).checked = parseInt(extras[6]);
                break;
            case 'W':
                document.getElementById('onoffCondWareh2').disabled = false;
                $("#onoffCondWareh2").bootstrapToggle('on');
                document.getElementById('onoffCondWareh2').disabled = true;
                document.getElementById("platformW" + edit).checked = parseInt(extras[0]);
                document.getElementById("yardW" + edit).checked = parseInt(extras[1]);
                document.getElementById("showerW" + edit).checked = parseInt(extras[2]);
                document.getElementById("guardhouseW" + edit).checked = parseInt(extras[3]);
                document.getElementById("circuitW" + edit).checked = parseInt(extras[4]);
                break;
            case 'L':
                document.getElementById('onoffCondLocal2').disabled = false;
                $("#onoffCondLocal2").bootstrapToggle('on');
                document.getElementById('onoffCondLocal2').disabled = true;
                document.getElementById("securityL" + edit).checked = parseInt(extras[0]);
                break;
        }
    }
    else
    {
        $("#onoffCondHome2").bootstrapToggle('off');
        $("#onoffCondDept2").bootstrapToggle('off');
        $("#onoffCondTerr2").bootstrapToggle('off');
        $("#onoffCondOffice2").bootstrapToggle('off');
        $("#onoffCondWareh2").bootstrapToggle('off');
        $("#onoffCondLocal2").bootstrapToggle('off');
    }
}

function showDivCondominium(onoffH,divH)
{
    // alert("hola");
    var onoff = document.getElementById(onoffH);
    var checked = onoff.checked;
    var div = document.getElementById(divH);
    // alert(checked);
    if(checked)
    {
        div.style.display = "block";
    }
    else
    {
        div.style.display = "none";
    }
}
