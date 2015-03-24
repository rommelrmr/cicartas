<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Gestion de Cartas</title>

        <?php $this->load->view("css_view"); ?>
        <?php $this->load->view("js_view"); ?>


        <script>
            //* hide all elements & show preloader
            document.documentElement.className += 'js';
        </script>


    </head>
    <body>
        
        <div id="loading_layer" style="display:none">
            <img src="<?= URL_IMG ?>ajax_loader.gif" alt="" />
        </div>


        <div id="maincontainer" class="clearfix">
            <!-- header -->
            <header>


                <?php $this->load->view("navbar_view"); ?>


            </header>

            <!-- main content -->
            <div id="contentwrapper">

                <div class="main_content" id="main_content">                   