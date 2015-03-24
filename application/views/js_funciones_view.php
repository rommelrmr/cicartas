<script type="text/javascript">


    $(function() {
        /*MODAL FORM EDITAR COLEGIO*/
        /*======================================================================*/
        $('#modal_ficha_personal').dialog({
            autoOpen: false,
            width: window.screen.width - 250,
            height: window.screen.height - 200,
            modal: true,
            buttons: {
                "Cerrar": function() {
                    $(this).dialog("close");
                }
            },
            close: function() {
                $(this).html("");
            }
        });
        /*======================================================================*/



        /*MODAL FORM EDITAR COLEGIO*/
        /*======================================================================*/
        $('#modal_ubigeo').dialog({
            autoOpen: false,
            width: 800,
            height: window.screen.height - 250,
            modal: true,
            buttons: {
                "Cerrar": function() {
                    $(this).dialog("close");
                }
            },
            close: function() {
                $(this).html("");
            }
        });
        /*======================================================================*/



        /*MODAL FORM EDITAR COLEGIO*/
        /*======================================================================*/
        $('#modal_planilla_exportar').dialog({
            autoOpen: false,
            width: window.screen.width - 200,
            height: window.screen.height - 250,
            modal: true,
            buttons: {
                "Cerrar": function() {
                    $(this).dialog("close");
                }
            },
            close: function() {
                $(this).html("");
            }
        });
        /*======================================================================*/


        /*MODAL FORM EDITAR COLEGIO*/
        /*======================================================================*/
        $('#modal_cargar_foto').dialog({
            autoOpen: false,
            width: 450,
            height: 300,
            modal: true,
            buttons: {
                "Cerrar": function() {
                    $(this).dialog("close");
                }
            },
            close: function() {
                $(this).html("");
            }
        });
        /*======================================================================*/


    })


    function fn_calcular_primer_dia_mes(mes, anio) {

        now = new Date();

        //firstDayMonth = new Date(now.getFullYear(), now.getMonth(), 1);
        firstDayMonth = new Date(anio, mes, 1);

        var dia = firstDayMonth.getDate();
        var mes = firstDayMonth.getMonth() + 1;

        var s_dia = dia;
        var s_mes = mes;

        if (parseInt(dia) <= 9) {
            s_dia = '0' + dia;
        }
        if (parseInt(mes) <= 9) {
            s_mes = '0' + mes;
        }

        return  s_dia + '/' + s_mes + '/' + anio;

    }


    function fn_calcular_ultimo_dia_mes(mes, anio) {

        now = new Date();

        //firstDayMonth = new Date(now.getFullYear(), now.getMonth() + 1, 0);
        firstDayMonth = new Date(anio, parseInt(mes) + 1, 0);

        var dia = firstDayMonth.getDate();
        var mes = firstDayMonth.getMonth() + 1;

        var s_dia = dia;
        var s_mes = mes;

        if (parseInt(dia) <= 9) {
            s_dia = '0' + dia;
        }
        if (parseInt(mes) <= 9) {
            s_mes = '0' + mes;
        }

        return  s_dia + '/' + s_mes + '/' + anio;

    }



    function fn_sidebar_auto() {
        var t = $("body").attr("class")

        if (t == 'sidebar_hidden') {
            $("body").attr("class", "")
        } else {
            $("body").attr("class", "sidebar_hidden")
        }
    }


    function fn_mostrar_sidebar() {
        $("body").removeClass("sidebar_hidden");
    }

    function fn_ocultar_sidebar() {
        $("body").addClass("sidebar_hidden");
    }

    function fn_cargar_modulo(href) {
        $("#main_content").load(href);
    }

    function fn_editar_ficha(id) {
        $("#main_content").load("<?= BASE_URL ?>ficha-personal.do", {
            persona_id: id
        });
    }

    function fn_cargar_ficha(href) {
        $("#contenido_ficha_personal").load(href);
    }



    //MODALES
    function fn_modal_contacto(id) {
        $('#modal_ficha_personal').dialog('open');
        $('#modal_ficha_personal').load("<?= BASE_URL ?>personal_modal/action_contacto", {
            id: id
        });
    }

    function fn_modal_laboral(id) {
        $('#modal_ficha_personal').dialog('open');
        $('#modal_ficha_personal').load("<?= BASE_URL ?>personal_modal/action_laboral", {
            id: id
        });
    }

    function fn_modal_asistencia(id) {
        $('#modal_ficha_personal').dialog('open');
        $('#modal_ficha_personal').load("<?= BASE_URL ?>personal_modal/action_asistencia", {
            id: id
        });
    }

    function fn_modal_planilla(id) {
        $('#modal_ficha_personal').dialog('open');
        $('#modal_ficha_personal').load("<?= BASE_URL ?>personal_modal/action_planilla", {
            id: id
        });
    }


    //cargo
    function fn_nuevo_cargo() {
        $("#contenido_ficha_personal").load("<?= BASE_URL ?>nuevo-cargo.do");
    }




    //contacto
    function fn_nueva_correo() {
        $("#contenido_contacto_email").load("<?= BASE_URL ?>form-email.do");
    }

    function fn_nueva_telefono() {
        $("#contenido_contacto_telefono").load("<?= BASE_URL ?>form-telefono.do");
    }

    function fn_nueva_direccion() {
        $("#contenido_contacto_direccion").load("<?= BASE_URL ?>form-direccion.do");
    }

    function fn_grid_correo() {
        $("#contenido_contacto_email").load("<?= BASE_URL ?>lista-email.do");
    }

    function fn_grid_telefono() {
        $("#contenido_contacto_telefono").load("<?= BASE_URL ?>lista-telefono.do");
    }

    function fn_grid_direccion() {
        $("#contenido_contacto_direccion").load("<?= BASE_URL ?>lista-direccion.do");
    }



    //ubigeo
    function fn_ubigeo() {
        $('#modal_ubigeo').dialog('open');
        $("#modal_ubigeo").load("<?= BASE_URL ?>lista-ubigeo.do");
    }


    function fn_seleccionar_ubigeo(id) {

        $("#ubigeo", "#frm_direccion").val($(id).parents("tr").children("td").eq(0).html());
        $("#dpto", "#frm_direccion").val($(id).parents("tr").children("td").eq(1).html());
        $("#prov", "#frm_direccion").val($(id).parents("tr").children("td").eq(2).html());
        $("#dist", "#frm_direccion").val($(id).parents("tr").children("td").eq(3).html());

        $('#modal_ubigeo').dialog('close');

    }



    //direccion
    function fn_editar_direccion(id) {
        $("#contenido_contacto_direccion").load("<?= BASE_URL ?>form-direccion.do", {
            direccion_id: id
        });
    }

    function fn_eliminar_direccion(id) {
        $("#contenido_contacto_direccion").load("<?= BASE_URL ?>delete-direccion.do", {
            direccion_id: id
        });
    }


    //email
    function fn_editar_email(id) {
        $("#contenido_contacto_email").load("<?= BASE_URL ?>form-email.do", {
            email_id: id
        });
    }

    function fn_eliminar_email(id) {
        $("#contenido_contacto_email").load("<?= BASE_URL ?>delete-email.do", {
            email_id: id
        });
    }


    //telefono
    function fn_editar_telefono(id) {
        $("#contenido_contacto_telefono").load("<?= BASE_URL ?>form-telefono.do", {
            telefono_id: id
        });
    }

    function fn_eliminar_telefono(id) {
        $("#contenido_contacto_telefono").load("<?= BASE_URL ?>delete-telefono.do", {
            telefono_id: id
        });
    }





    function fn_planilla_detalle(id) {
        $("#main_content").load("<?= BASE_URL ?>detalle-planilla.do", {
            planilla_id: id
        });
    }

    function fn_planilla_editar(id) {
        $("#main_content").load("<?= BASE_URL ?>editar-planilla.do", {
            planilla_id: id
        });
    }


    function fn_planilla_siaf(id) {
        $('#modal_planilla_exportar').dialog('open');
        $("#modal_planilla_exportar").load("<?= BASE_URL ?>planilla_exportar/action_form_siaf", {
            planilla_id: id
        });
    }

    function fn_planilla_afpnet(id) {
        $('#modal_planilla_exportar').dialog('open');
        $("#modal_planilla_exportar").load("<?= BASE_URL ?>planilla_exportar/action_form_afpnet", {
            planilla_id: id
        });
    }





    ///FUNCIONES UPDATE PLANILLA
    function fn_update_sustentacion(persona_id, valor, id, planilla_id) {



        var peticion = $.ajax({
            url: '<?= BASE_URL ?>planilla/action_update_sustentacion',
            type: 'POST',
            data: {persona_id: persona_id, valor: valor, id: id},
            success: function(respuesta) {
                $("#contenido_form_planilla").load("<?= BASE_URL ?>planilla_editar/action_grid_detalle_planilla", {
                    planilla_id: planilla_id
                });
            },
            error: function() {
                alert('Se ha producido un error');
            }
        });
    }




    function fn_update_devolucion(persona_id, valor) {

        if (valor.length > 0) {
            var peticion = $.ajax({
                url: '<?= BASE_URL ?>planilla/action_update_devolucion',
                type: 'POST',
                data: {persona_id: persona_id, valor: valor},
                success: function(respuesta) {

                },
                error: function() {
                    alert('Se ha producido un error');
                }
            });
        }


    }


    //EDITAR PLANILLA
    //funcion de de liminar registro
    function fn_planilla_eliminar_lista(persona_id) {
        $('<input>').attr({
            type: 'hidden',
            id: 'persona_id_' + persona_id,
            value: persona_id,
            name: 'eliminar_persona_id[]'
        }).appendTo('#form_planilla');
        $("#trdetalle_" + persona_id).remove();
    }


    function fn_imprimir_reporte_planilla() {

        var meta = $("#meta_id", "#form_planilla").val();
        $("#planilla_id_reporte", "#form_planilla_reporte").val($("#planilla_id", "#form_planilla").val())
        $("#sede_id_reporte", "#form_planilla_reporte").val($("#sede_id", "#form_planilla").val())
        $("#meta_id_reporte", "#form_planilla_reporte").val(meta)
        $("#form_planilla_reporte").submit();
    }






    //FOTO
    function fn_cargar_foto(persona_id) {
        $('#modal_cargar_foto').dialog('open');
        $('#modal_cargar_foto').load("<?= BASE_URL ?>personal_modal/action_form_upload_foto", {
            persona_id: persona_id
        });
    }



    //configuracion
    function fn_guardar_conf_dscto(id, valor) {
        if (valor.length > 0) {
            var peticion = $.ajax({
                url: '<?= BASE_URL ?>personal_descuento/action_update_conf_dscto',
                type: 'POST',
                data: {id: id, valor: valor},
                success: function(respuesta) {

                },
                error: function() {
                    alert('Se ha producido un error');
                }
            });
        }
    }
</script>