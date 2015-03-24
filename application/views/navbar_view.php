<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">
            <a id="logo" class="brand" href="<?= BASE_URL ?>index.do">Gestion de Cartas</a>
            <ul class="nav user_menu pull-right">

                <li class="divider-vertical hidden-phone hidden-tablet"></li>

                <li class="divider-vertical hidden-phone hidden-tablet"></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= URL_IMG ?>user_avatar.png" alt="" class="user_avatar" /> 
                        <?php echo $this->session->userdata("nomUsu"); ?>
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
<!--                        <li><a href="<?= BASE_URL ?>index.do">Mi Perfil</a></li>                        
                        <li class="divider"></li>-->
                        <li><a href="<?= BASE_URL ?>login/logout">Salir</a></li>
                    </ul>
                </li>
            </ul>


        </div>
    </div>
</div>