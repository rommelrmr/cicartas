<div class="row-fluid">

    <div class="span12">

        <form 
            id="frm_persona_editar" 
            name="frm_persona_editar"
            method="post"
            action="<?= BASE_URL ?>personal_datos/action_save"
            class="stepy-wizzard form-horizontal">


            <fieldset title="Datos Personales">
                <legend class="hide">Informaci&oacute;n</legend>

                <div class="row-fluid">
                    <div class="span4 formSep control-group">
                        <div class="controls">
                            <label>Nro de carta <span class="f_req">*</span></label>
                            <input type="text" id="f_nrocarta" name="f_nrocarta" class="span12" value="<?php echo set_value('paterno', $row->paterno) ?>" />                   
                        </div>
                    </div>
                    <div class="span4 formSep control-group">
                        <div class="controls">
                            <label>Tipo<span class="f_req">*</span></label>
                            <?php echo form_dropdown("f_tipocarta", get_tipocarta(), '', 'class="span12"'); ?>
                        </div>
                    </div>
                    <div class="span4 formSep control-group">
                        <div class="controls">
                            <label>Requiere respuesta<span class="f_req">*</span></label>
                            <?php echo form_dropdown("f_respuesta", get_requiererpta(), '', 'class="span12"'); ?>
                        </div>
                    </div>
                </div>

                <div class="row-fluid">

                    <div class="span4 formSep control-group">
                        <div class="controls">
                            <label>
                                Fecha de Carta de:<span class="f_req">*</span></label>
                            <input type="text"  name="f_feccartadesde" id="f_feccartadesde" class="span12" maxlength="8" value="<?php echo set_value('num_dni', trim($row->num_dni)) ?>" />
                        </div>
                    </div>

                    <div class="span4 formSep control-group">
                        <label>a:</label>
                        <input type="text" name="f_feccartahasta" id="f_feccartahasta" class="span12" maxlength="11" value="<?php echo set_value('num_ruc', trim($row->num_ruc)) ?>"/>
                    </div>

                    <div class="span4 formSep control-group">
                        <label>Estado Rpta</label>                            
                        <?php echo form_dropdown("f_estrespuesta", get_estadorpta(), '', 'class="span12"'); ?>
                    </div>


                </div>


                <div class="row-fluid">

                    <div class="span4 formSep control-group">
                        <label>Fecha respuesta de:</label>
                        <input type="text"  name="f_fecrecepciondesde" id="f_fecrecepciondesde" class="span12" maxlength="8" value="<?php echo set_value('num_dni', trim($row->num_dni)) ?>" />

                    </div>

                    <div class="span4 formSep control-group">
                        <label>a</label>
                        <input type="text" name="f_fecrecepcionhasta" id="f_fecrecepcionhasta" class="span12" value="<?php echo set_value('fecha_nacimiento', $row->fecha_nacimiento) ?>" />
                    </div>

                    <div class="span4 formSep control-group">
                        <label>comentario</label>
                        <input type="text" name="f_observaciones" id="observaciones2" class="span12" value="<?php echo set_value('licencia_conducir', $row->licencia_conducir) ?>" />
                    </div>
                </div>

            </fieldset>






            <button type="button" onclick="fn_cargar_modulo('<?= BASE_URL ?>lista-personal.do')" class="finish btn btn-info" style="margin-left: 4px;"><i class="icon-book icon-white"></i> Nuevo</button> 

            <button onclick="fn_datatables()" type="button" class="finish btn btn-primary"><i class="icon-ok icon-white"></i> Buscar</button>


        </form>
    </div>
</div>

