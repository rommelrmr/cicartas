<div class="row-fluid">
    <div class="span12">
        <h3 class="heading">Lista de Personal</h3>
        <table class="table table-striped table-bordered dTableR" id="tabla_personal">
            <thead>
                <tr>                    
                    <th>Nro Carta</th>                    
                    <th>Contrato</th>
                    <th>Cartas relacionadas</th>
                    <th style="width: 30%">Comentario</th>
                    <th>Estado</th>
                    <th>Tipo de Carta</th>
                    <th>F. carta</th>
                    <th>F. recepcion</th>
                    <th>Requiere Rpta</th>
                    <th>Respondio</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>        
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript">

    $(function () {

        $('#tabla_personal').dataTable({
            "sDom": "<'row'<'span4'l><'span4'><'span4'f>r>t<'row'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap_alt",
            "bScrollCollapse": true,
            "bProcessing": true,
            "bServerSide": true,
            "sServerMethod": "GET",
            "iDisplayLength": 15,
            "fnServerParams": function (aoData) {
                aoData.push(
                        {"name": "f_nrocarta", "value": $("#f_nrocarta").val()},
                {"name": "f_tipocarta", "value": $("#f_tipocarta").val()},
                {"name": "f_respuesta", "value": $("#f_respuesta").val()},
                {"name": "f_feccartadesde", "value": $("#f_feccartadesde").val()},
                {"name": "f_feccartahasta", "value": $("#f_feccartahasta").val()},
                {"name": "f_estrespuesta", "value": $("#f_estrespuesta").val()},
                {"name": "f_fecrecepciondesde", "value": $("#f_fecrecepciondesde").val()},
                {"name": "f_fecrecepcionhasta", "value": $("#f_fecrecepcionhasta").val()},
                {"name": "f_observaciones", "value": $("#f_observaciones").val()}
                );
            },
            "aLengthMenu": [[15, 30, 50, 100], [15, 30, 50, 100]],
            "sAjaxSource": "<?php echo BASE_URL ?>bandeja/datatables"
            , aoColumns: [
                null,
                null,
                null,
                {"sWidth": "30%"},
                null,
                null,
                null,
                null,
                null,
                null,
                {"sName": "editarbtn",
                    "bSearchable": false,
                    "bSortable": false,
                    "sWidth": "20px",
                    "fnRender": function (oObj) {
                        return '<a href="javascript:void(0)" onclick="fn_editar_ficha(\'' + oObj.aData[5] + '\')"' +
                                'class="tablectrl_small bDefault tipS" title="Editar Ficha">' +
                                '<i class="splashy-folder_classic_opened_stuffed"></i></a>';


                    }
                }
            ]
        });
    });
</script>

