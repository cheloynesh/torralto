var ruta = window.location;
var getUrl = window.location;
var baseUrl = getUrl .protocol + "//" + getUrl.host + getUrl.pathname;

$(document).ready( function () {
    $('#tbProf thead th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="form-control" placeholder="'+title+'" />' );
    } );
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
        },
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
                var that = this;

                $( 'input', this.header() ).on( 'keyup change clear', function () {
                    if ( that.search() !== this.value ) {
                        that
                            .search( this.value )
                            .draw();
                    }
                } );
            } );
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

    console.log(data);

    data.forEach( function(valor, indice, array) {
        btnStat = '<button class="btn btn-info" style="background-color: #'+valor.color+'; border-color: #'+valor.color+'" onclick="opcionesEstatus('+valor.id+','+valor.statId+')">'+valor.statName+'</button>';
        btnEdit = '<button href="#|" class="btn btn-warning" onclick="editarPropiedad('+valor.id+')" ><i class="fa fa-edit"></i></button>';
        btnTrash = '<button href="#|" class="btn btn-danger" onclick="eliminarPropiedad('+valor.id+')"><i class="fa fa-trash"></i></button>';

        switch(valor.type)
        {
            case 'house_card': auxtype = 'Casa'; break;
            case 'dept_card': auxtype = 'Departamento'; break;
            case 'terrain_card': auxtype = 'Terreno'; break;
            case 'office_card': auxtype = 'Oficina'; break;
            case 'wareh_card': auxtype = 'Bodega'; break;
            case 'local_card': auxtype = 'Local Comercial'; break;
        }

        if(permission["erase"] == 1)
            table.row.add([valor.name,valor.levels,valor.rooms,valor.half_rest,valor.full_rest,valor.parking,auxtype,btnStat,btnEdit+" "+btnTrash]);
        else
            table.row.add([valor.name,valor.levels,valor.rooms,valor.half_rest,valor.full_rest,valor.parking,auxtype,btnStat,btnEdit]);
    });
    table.draw(false);
}

function guardarPropiedad()
{
    var name = $("#name").val();
    var sale_price = $("#salePrice").val().replace(/[^0-9.]/g, '');
    var rent_price = $("#rentPrice").val().replace(/[^0-9.]/g, '');

    var fk_user = $("#consultant").val();
    var owner = $("#owner").val();
    var fk_status = $("#selectNewStatus").val();

    var street = $("#street").val();
    var e_num = $("#e_num").val();
    var i_num = $("#i_num").val();

    var fk_pc = $("#selectSuburb").val();

    var type = $("#selectPropertieType").val();
    var auxtype = '';

    switch(type)
    {
        case 'house_card': auxtype = 'H'; break;
        case 'dept_card': auxtype = 'D'; break;
        case 'terrain_card': auxtype = 'T'; break;
        case 'office_card': auxtype = 'O'; break;
        case 'wareh_card': auxtype = 'W'; break;
        case 'local_card': auxtype = 'L'; break;
    }

    var levels = $("#levels" + auxtype).val();
    var parking = $("#parking" + auxtype).val();
    var rooms = $("#rooms" + auxtype).val();
    var full_rest = $("#fullRest" + auxtype).val();
    var half_rest = $("#halfRest" + auxtype).val();
    var antiquity = $("#antiquity" + auxtype).val();
    var terrain = $("#terrain" + auxtype).val() != null ? $("#terrain" + auxtype).val().replace(/[^0-9.]/g, ''): null;
    var construction = $("#construction" + auxtype).val() != null ? $("#construction" + auxtype).val().replace(/[^0-9.]/g, ''): null;
    var front = $("#front" + auxtype).val() != null ? $("#front" + auxtype).val().replace(/[^0-9.]/g, ''): null;
    var side = $("#side" + auxtype).val() != null ? $("#side" + auxtype).val().replace(/[^0-9.]/g, ''): null;
    var privates = $("#privates" + auxtype).val();
    var office = $("#office" + auxtype).val();
    var level = $("#level" + auxtype).val();

    var condominium = getCondominium(auxtype,'');

    var route = "properties";
    // console.log(route);
    var dataE = {
        "_token": $("meta[name='csrf-token']").attr("content"),
        'name':name,
        'sale_price':sale_price,
        'rent_price':rent_price,
        'fk_user':fk_user,
        'owner':owner,
        'fk_status':fk_status,
        'street':street,
        'e_num':e_num,
        'i_num':i_num,
        'fk_pc':fk_pc,
        'type':type,
        'levels':levels,
        'parking':parking,
        'rooms':rooms,
        'full_rest':full_rest,
        'half_rest':half_rest,
        'antiquity':antiquity,
        'terrain':terrain,
        'construction':construction,
        'front':front,
        'side':side,
        'privates':privates,
        'office':office,
        'level':level,
        'extras':condominium.extras,
        'fee':condominium.fee,
    };

    jQuery.ajax({
        url:route,
        type:'post',
        data:dataE,
        dataType:'json',
        success:function(result)
        {
            alertify.success(result.message);
            $("#myModal").modal('hide');
            RefreshTable(result.propertie,result.profile,result.permission);
        },
        error:function(result,error,errorTrown)
        {
            alertify.error(errorTrown);
        }
    })
}

function getCondominium(type,edit)
{
    var extras = '';
    var fee = 0;

    switch(type)
    {
        case 'H':
            var onoff = document.getElementById("onoffCondHome" + edit);
            var checked = onoff.checked;
            if(!checked) break;
            else
            {
                extras = (document.getElementById("poolH" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("gymH" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("terraceH" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("tankH" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("securityH" + edit).checked  === true ? '1': '0');
                fee = $("#feeH" + edit).val() != null ? $("#feeH" + edit).val().replace(/[^0-9.]/g, ''): null;
                break;
            }
        case 'D':
            var onoff = document.getElementById("onoffCondDept" + edit);
            var checked = onoff.checked;
            if(!checked) break;
            else
            {
                extras = (document.getElementById("poolD" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("gymD" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("terraceD" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("liftD" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("securityD" + edit).checked  === true ? '1': '0');
                fee = $("#feeD" + edit).val() != null ? $("#feeD" + edit).val().replace(/[^0-9.]/g, ''): null;
                break;
            }
        case 'T':
            var onoff = document.getElementById("onoffCondTerr" + edit);
            var checked = onoff.checked;
            if(!checked) break;
            else
            {
                extras = (document.getElementById("poolT" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("gymT" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("terraceT" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("tankT" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("securityT" + edit).checked  === true ? '1': '0');
                fee = $("#feeT" + edit).val() != null ? $("#feeT" + edit).val().replace(/[^0-9.]/g, ''): null;
                break;
            }
        case 'O':
            var onoff = document.getElementById("onoffCondOffice" + edit);
            var checked = onoff.checked;
            if(!checked) break;
            else
            {
                extras = (document.getElementById("valetO" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("meetO" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("terraceO" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("audienceO" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("coffeeO" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("receptionO" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("airconO" + edit).checked  === true ? '1': '0');
                fee = $("#feeO" + edit).val() != null ? $("#feeO" + edit).val().replace(/[^0-9.]/g, ''): null;
                break;
            }
        case 'W':
            var onoff = document.getElementById("onoffCondWareh" + edit);
            var checked = onoff.checked;
            if(!checked) break;
            else
            {
                extras = (document.getElementById("platformW" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("yardW" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("showerW" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("guardhouseW" + edit).checked  === true ? '1': '0') + '-' + (document.getElementById("circuitW" + edit).checked  === true ? '1': '0');
                fee = $("#feeW" + edit).val() != null ? $("#feeW" + edit).val().replace(/[^0-9.]/g, ''): null;
                break;
            }
        case 'L':
            var onoff = document.getElementById("onoffCondLocal" + edit);
            var checked = onoff.checked;
            if(!checked) break;
            else
            {
                extras = (document.getElementById("securityL" + edit).checked  === true ? '1': '0')
                fee = $("#feeL" + edit).val() != null ? $("#feeL" + edit).val().replace(/[^0-9.]/g, ''): null;
                break;
            }
    }

    return ({'extras':extras,'fee':fee});
}

function abrirmodal(modal)
{
    $(modal).modal('show');
}

function cancelar(modal)
{
    $(modal).modal('hide');
}

function editarPropiedad(id)
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
            var auxtype = '';
            actualizarSelect(result.suburbs,"#selectSuburb1");
            // alert(result.data.name);
            $("#name1").val(result.data.name);
            $("#owner1").val(result.data.owner);
            $("#consultant1").val(result.data.fk_user);
            $("#salePrice1").val(parseFloat(result.data.sale_price).toLocaleString('en-US'));
            $("#rentPrice1").val(parseFloat(result.data.rent_price).toLocaleString('en-US'));

            $("#street1").val(result.data.street);
            $("#e_num1").val(result.data.e_num);
            $("#i_num1").val(result.data.i_num);
            $("#pc1").val(result.data.pc);

            $("#selectSuburb1").val(result.data.fk_pc);
            $("#country1").val(result.data.country);
            $("#state1").val(result.data.state);
            $("#city1").val(result.data.city);

            $("#selectPropertieType1").val(result.data.type);

            switch(result.data.type)
            {
                case 'house_card': auxtype = 'H'; break;
                case 'dept_card': auxtype = 'D'; break;
                case 'terrain_card': auxtype = 'T'; break;
                case 'office_card': auxtype = 'O'; break;
                case 'wareh_card': auxtype = 'W'; break;
                case 'local_card': auxtype = 'L'; break;
            }

            $("#levels" + auxtype + '1').val(result.data.levels);
            $("#parking" + auxtype + '1').val(result.data.parking);
            $("#rooms" + auxtype + '1').val(result.data.rooms);
            $("#fullRest" + auxtype + '1').val(result.data.full_rest);
            $("#halfRest" + auxtype + '1').val(result.data.half_rest);
            $("#antiquity" + auxtype + '1').val(result.data.antiquity);
            result.data.terrain != null ? $("#terrain" + auxtype + '1').val(parseFloat(result.data.terrain).toLocaleString('en-US')) : $("#terrain1" + auxtype + '1').val('');
            result.data.construction != null ? $("#construction" + auxtype + '1').val(parseFloat(result.data.construction).toLocaleString('en-US')) : $("#construction1" + auxtype + '1').val('');
            result.data.front != null ? $("#front" + auxtype + '1').val(parseFloat(result.data.front).toLocaleString('en-US')) : $("#front1" + auxtype + '1').val('');
            result.data.side != null ? $("#side" + auxtype + '1').val(parseFloat(result.data.side).toLocaleString('en-US')) : $("#side1" + auxtype + '1').val('');
            $("#privates" + auxtype + '1').val(result.data.privates);
            $("#office" + auxtype + '1').val(result.data.office);
            $("#level" + auxtype + '1').val(result.data.level);

            setCondominium(auxtype,result.data.extras,result.data.fee,'1');

            document.getElementById("house_card1").style.display = "none";
            document.getElementById("dept_card1").style.display = "none";
            document.getElementById("terrain_card1").style.display = "none";
            document.getElementById("office_card1").style.display = "none";
            document.getElementById("wareh_card1").style.display = "none";
            document.getElementById("local_card1").style.display = "none";

            document.getElementById(result.data.type + '1').style.display = "block";

            $("#myModalEdit").modal('show');
        },
        error:function(result,error,errorTrown)
        {
            alertify.error(errorTrown);
        }
    })
}

function setCondominium(type,extras,fee,edit)
{
    if(extras != null || fee != 0)
    {
        fee != null ? $("#fee" + type + '1').val(parseFloat(fee).toLocaleString('en-US')) : $("#fee" + type + '1').val('');

        extras = extras.split('-');
        console.log(extras,type);

        switch(type)
        {
            case 'H':
                $("#onoffCondHome1").bootstrapToggle('on');
                document.getElementById("poolH" + edit).checked = parseInt(extras[0]);
                document.getElementById("gymH" + edit).checked = parseInt(extras[1]);
                document.getElementById("terraceH" + edit).checked = parseInt(extras[2]);
                document.getElementById("tankH" + edit).checked = parseInt(extras[3]);
                document.getElementById("securityH" + edit).checked = parseInt(extras[4]);
                break;
            case 'D':
                $("#onoffCondDept1").bootstrapToggle('on');
                document.getElementById("poolD" + edit).checked = parseInt(extras[0]);
                document.getElementById("gymD" + edit).checked = parseInt(extras[1]);
                document.getElementById("terraceD" + edit).checked = parseInt(extras[2]);
                document.getElementById("liftD" + edit).checked = parseInt(extras[3]);
                document.getElementById("securityD" + edit).checked = parseInt(extras[4]);
                break;
            case 'T':
                $("#onoffCondTerr1").bootstrapToggle('on');
                document.getElementById("poolT" + edit).checked = parseInt(extras[0]);
                document.getElementById("gymT" + edit).checked = parseInt(extras[1]);
                document.getElementById("terraceT" + edit).checked = parseInt(extras[2]);
                document.getElementById("tankT" + edit).checked = parseInt(extras[3]);
                document.getElementById("securityT" + edit).checked = parseInt(extras[4]);
                break;
            case 'O':
                $("#onoffCondOffice1").bootstrapToggle('on');
                document.getElementById("valetO" + edit).checked = parseInt(extras[0]);
                document.getElementById("meetO" + edit).checked = parseInt(extras[1]);
                document.getElementById("terraceO" + edit).checked = parseInt(extras[2]);
                document.getElementById("audienceO" + edit).checked = parseInt(extras[3]);
                document.getElementById("coffeeO" + edit).checked = parseInt(extras[4]);
                document.getElementById("receptionO" + edit).checked = parseInt(extras[5]);
                document.getElementById("airconO" + edit).checked = parseInt(extras[6]);
                break;
            case 'W':
                $("#onoffCondWareh1").bootstrapToggle('on');
                document.getElementById("platformW" + edit).checked = parseInt(extras[0]);
                document.getElementById("yardW" + edit).checked = parseInt(extras[1]);
                document.getElementById("showerW" + edit).checked = parseInt(extras[2]);
                document.getElementById("guardhouseW" + edit).checked = parseInt(extras[3]);
                document.getElementById("circuitW" + edit).checked = parseInt(extras[4]);
                break;
            case 'L':
                $("#onoffCondLocal1").bootstrapToggle('on');
                document.getElementById("securityL" + edit).checked = parseInt(extras[0]);
                break;
        }
    }
    else
    {
        $("#onoffCondHome1").bootstrapToggle('off');
        $("#onoffCondDept1").bootstrapToggle('off');
        $("#onoffCondTerr1").bootstrapToggle('off');
        $("#onoffCondOffice1").bootstrapToggle('off');
        $("#onoffCondWareh1").bootstrapToggle('off');
        $("#onoffCondLocal1").bootstrapToggle('off');
    }
}

function actualizarPropiedad()
{
    // alert(policy);
    var name = $("#name1").val();
    var sale_price = $("#salePrice1").val().replace(/[^0-9.]/g, '');
    var rent_price = $("#rentPrice1").val().replace(/[^0-9.]/g, '');

    var fk_user = $("#consultant1").val();
    var owner = $("#owner1").val();

    var street = $("#street1").val();
    var e_num = $("#e_num1").val();
    var i_num = $("#i_num1").val();

    var fk_pc = $("#selectSuburb1").val();

    var type = $("#selectPropertieType1").val();
    var auxtype = '';

    switch(type)
    {
        case 'house_card': auxtype = 'H'; break;
        case 'dept_card': auxtype = 'D'; break;
        case 'terrain_card': auxtype = 'T'; break;
        case 'office_card': auxtype = 'O'; break;
        case 'wareh_card': auxtype = 'W'; break;
        case 'local_card': auxtype = 'L'; break;
    }

    var levels = $("#levels" + auxtype + '1').val();
    var parking = $("#parking" + auxtype + '1').val();
    var rooms = $("#rooms" + auxtype + '1').val();
    var full_rest = $("#fullRest" + auxtype + '1').val();
    var half_rest = $("#halfRest" + auxtype + '1').val();
    var antiquity = $("#antiquity" + auxtype + '1').val();
    var terrain = $("#terrain" + auxtype + '1').val() != null ? $("#terrain" + auxtype + '1').val().replace(/[^0-9.]/g, ''): null;
    var construction = $("#construction" + auxtype + '1').val() != null ? $("#construction" + auxtype + '1').val().replace(/[^0-9.]/g, ''): null;
    var front = $("#front" + auxtype + '1').val() != null ? $("#front" + auxtype + '1').val().replace(/[^0-9.]/g, ''): null;
    var side = $("#side" + auxtype + '1').val() != null ? $("#side" + auxtype + '1').val().replace(/[^0-9.]/g, ''): null;
    var privates = $("#privates" + auxtype + '1').val();
    var office = $("#office" + auxtype + '1').val();
    var level = $("#level" + auxtype + '1').val();

    var condominium = getCondominium(auxtype,'1');

    // var route = "client/"+idupdate;
    var route = baseUrl + "/" + idupdate;

    var data = {
        'id':idupdate,
        "_token": $("meta[name='csrf-token']").attr("content"),
        'name':name,
        'sale_price':sale_price,
        'rent_price':rent_price,
        'fk_user':fk_user,
        'owner':owner,
        'street':street,
        'e_num':e_num,
        'i_num':i_num,
        'fk_pc':fk_pc,
        'type':type,
        'levels':levels,
        'parking':parking,
        'rooms':rooms,
        'full_rest':full_rest,
        'half_rest':half_rest,
        'antiquity':antiquity,
        'terrain':terrain,
        'construction':construction,
        'front':front,
        'side':side,
        'privates':privates,
        'office':office,
        'level':level,
        'extras':condominium.extras,
        'fee':condominium.fee,
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
            RefreshTable(result.propertie,result.profile,result.permission);
        },
        error:function(result,error,errorTrown)
        {
            alertify.error(errorTrown);
        }
    })
}

function eliminarPropiedad(id)
{
    var route = "properties/"+id;
    var data = {
        'id':id,
        "_token": $("meta[name='csrf-token']").attr("content"),
    };
    alertify.confirm("Eliminar Propiedad","¿Desea borrar la propiedad?",
        function(){
            jQuery.ajax({
                url:route,
                data: data,
                type:'delete',
                dataType:'json',
                success:function(result)
                {
                    window.location.reload(true);
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
        // "commentary":commentary
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
            RefreshTable(result.propertie,result.profile,result.permission);
        },
        error:function(result,error,errorTrown)
        {
            alertify.error(errorTrown);
        }
    })
}

function fillSuburb(targ)
{
    var pc = $("#pc" + targ).val();
    var route = baseUrl+'/GetSuburb/'+pc;

    jQuery.ajax({
        url:route,
        type:'get',
        dataType:'json',
        success:function(result){
            actualizarSelect(result.data,"#selectSuburb" + targ);
        },
        error:function(result,error,errorTrown){
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

function fillUbi(targ)
{
    var pc = $("#selectSuburb" + targ).val();
    var route = baseUrl+'/GetUbi/'+pc;

    jQuery.ajax({
        url:route,
        type:'get',
        dataType:'json',
        success:function(result){
            console.log(result.data.country);
            $("#country" + targ).val(result.data.country);
            $("#state" + targ).val(result.data.state);
            $("#city" + targ).val(result.data.city);
        },
        error:function(result,error,errorTrown){
            alertify.error(errorTrown);
        }
    })
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

function showDivsType(edit)
{
    var type = $("#selectPropertieType" + edit).val();
    var div = document.getElementById(type + edit);

    document.getElementById("house_card" + edit).style.display = "none";
    document.getElementById("dept_card" + edit).style.display = "none";
    document.getElementById("terrain_card" + edit).style.display = "none";
    document.getElementById("office_card" + edit).style.display = "none";
    document.getElementById("wareh_card" + edit).style.display = "none";
    document.getElementById("local_card" + edit).style.display = "none";

    div.style.display = "block"
}
