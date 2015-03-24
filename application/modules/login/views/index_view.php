<!DOCTYPE html>
<html lang="en" class="login_page">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Caral:::RRHH</title>

        <!-- Bootstrap framework -->
        <link rel="stylesheet" href="<?= URL_BOOTSTRAP ?>css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?= URL_BOOTSTRAP ?>css/bootstrap-responsive.min.css" />
        <!-- theme color-->
        <link rel="stylesheet" href="<?= URL_CSS ?>blue.css" />
        <!-- tooltip -->    
        <link rel="stylesheet" href="<?= URL_LIB ?>qtip2/jquery.qtip.min.css" />
        <!-- main styles -->
        <link rel="stylesheet" href="<?= URL_CSS ?>style.css" />

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico" />

        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>

        <!--[if lte IE 8]>
            <script src="js/ie/html5.js"></script>
            <script src="js/ie/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>

        <div class="login_box">

            <form action="<?= BASE_URL ?>login" method="post" id="login_form" name="login_form">
                <div class="top_b">Sistema de Recursos Humanos - Planilla</div>    
                <div class="alert alert-info alert-login">
                    Ingrese su usuario y password.
                </div>
                <div class="cnt_b">
                    <div class="formRow">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-user"></i></span><input type="text" id="username_id" name="username_id" placeholder="Username" value="" />
                        </div>
                    </div>
                    <div class="formRow">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" id="password_pwd" name="password_pwd" placeholder="Password" value="" />
                        </div>
                    </div>


                </div>

                <?php if ($error): ?>
                    <div class="alert alert-danger alert-login">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <?= $error_msg ?>
                    </div>
                    <br/>
                <?php endif; ?>


                <div class="btm_b clearfix">
                    <button class="btn btn-inverse pull-right" type="submit">Loguearse</button>

                </div>  

            </form>



            <!--            <div class="links_b links_btm clearfix">
                            <span class="linkform"><a href="#pass_form">Forgot password?</a></span>
                            <span class="linkform" style="display:none">Never mind, <a href="#login_form">send me back to the sign-in screen</a></span>
                        </div>-->
        </div>

        <script src="<?= URL_JS ?>jquery.min.js"></script>
        <script src="<?= URL_JS ?>jquery-migrate.min.js"></script>
        <script src="<?= URL_JS ?>jquery.actual.min.js"></script>
        <script src="<?= URL_LIB ?>validation/jquery.validate.min.js"></script>
        <script src="<?= URL_BOOTSTRAP ?>js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function() {

                //* boxes animation
                form_wrapper = $('.login_box');
                function boxHeight() {
                    form_wrapper.animate({marginTop: (-(form_wrapper.height() / 2) - 24)}, 400);
                }
                ;
                form_wrapper.css({marginTop: (-(form_wrapper.height() / 2) - 24)});
                $('.linkform a,.link_reg a').on('click', function(e) {
                    var target = $(this).attr('href'),
                            target_height = $(target).actual('height');
                    $(form_wrapper).css({
                        'height': form_wrapper.height()
                    });
                    $(form_wrapper.find('form:visible')).fadeOut(400, function() {
                        form_wrapper.stop().animate({
                            height: target_height,
                            marginTop: (-(target_height / 2) - 24)
                        }, 500, function() {
                            $(target).fadeIn(400);
                            $('.links_btm .linkform').toggle();
                            $(form_wrapper).css({
                                'height': ''
                            });
                        });
                    });
                    e.preventDefault();
                });

                //* validation
                $('#login_form').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    rules: {
                        username: {required: true, minlength: 3},
                        password: {required: true, minlength: 3}
                    },
                    highlight: function(element) {
                        $(element).closest('div').addClass("f_error");
                        setTimeout(function() {
                            boxHeight()
                        }, 200)
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f_error");
                        setTimeout(function() {
                            boxHeight()
                        }, 200)
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    }
                });
            });
        </script>
    </body>
</html>
