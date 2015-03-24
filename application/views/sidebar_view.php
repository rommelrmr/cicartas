<a class="sidebar_switch ttip_r off_switch" href="javascript:void(0)" oldtitle="Show Sidebar" title="" aria-describedby="ui-tooltip-2">Sidebar switch</a>
<div class="sidebar">

    <div class="antiScroll">
        <div class="antiscroll-inner" style="width: 257px; height: 208px;">
            <div class="antiscroll-content" style="height: 208px;">

                <div class="sidebar_inner" style="margin-bottom: -92px; min-height: 100%;">
                    <p>&nbsp;</p>
                    <div class="accordion" id="side_accordion">

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side_accordion" href="#collapseOne">
                                    <i class="icon-th"></i> Item 1
                                </a>
                            </div>
                            <div id="collapseOne" class="accordion-body collapse" style="height: 0px;">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="<?php echo BASE_URL ?>item1-enviado">Enviados</a></li>
                                        <li><a href="<?php echo BASE_URL ?>item1-recibido">Recibidos</a></li>                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#side_accordion" href="#collapseTwo">
                                    <i class="icon-th"></i> Item 2
                                </a>
                            </div>
                            <div id="collapseTwo" class="accordion-body collapse" style="height: 0px;">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="<?php echo BASE_URL ?>item2-enviado">Enviados</a></li>
                                        <li><a href="<?php echo BASE_URL ?>item2-recibido">Recibidos</a></li>   
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#side_accordion" href="#collapseThree">
                                    <i class="icon-th"></i> Item 3
                                </a>
                            </div>
                            <div id="collapseThree" class="accordion-body collapse" style="height: 0px;">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="<?php echo BASE_URL ?>item3-enviado">Enviados</a></li>
                                        <li><a href="<?php echo BASE_URL ?>item3-recibido">Recibidos</a></li>  
                                    </ul>

                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#side_accordion" href="#collapseFour">
                                    <i class="icon-cog"></i> General
                                </a>
                            </div>
                            <div id="collapseFour" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul class="nav nav-list">
                                        <li><a href="<?php echo BASE_URL ?>general-enviado">Enviados</a></li>
                                        <li><a href="<?php echo BASE_URL ?>general-recibido">Recibidos</a></li>  
                                    </ul>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="push" style="height: 92px;"></div>
                </div>



            </div>
        </div>
        <div class="antiscroll-scrollbar antiscroll-scrollbar-vertical" style="height: 109.927px; top: 0px;"></div></div>

</div>

<!-- common functions -->
<script src="<?= URL_JS ?>gebo_sidebar.js"></script>