/* [ ---- Gebo Admin Panel - wizard ---- ] */


gebo_wizard = {

    validation: function(){
        $('#frm_persona_editar').stepy({
            nextLabel:      'Forward <i class="icon-chevron-right icon-white"></i>',
            backLabel:      '<i class="icon-chevron-left"></i> Backward',
            block		: true,
            errorImage	: true,
            titleClick	: true,
            validate	: true
        });
        stepy_validation = $('#frm_persona_editar').validate({
            onfocusout: false,
            errorPlacement: function(error, element) {
                error.appendTo( element.closest("div.controls") );
            },
            highlight: function(element) {
                $(element).closest("div.control-group").addClass("error f_error");
                var thisStep = $(element).closest('form').prev('ul').find('.current-step');
                thisStep.addClass('error-image');
            },
            unhighlight: function(element) {
                $(element).closest("div.control-group").removeClass("error f_error");
                if(!$(element).closest('form').find('div.error').length) {
                    var thisStep = $(element).closest('form').prev('ul').find('.current-step');
                    thisStep.removeClass('error-image');
                }
            },
            rules: {
                num_dni: {
                    required: true,                    
                    minlength: 8,
                    maxlength:8                    
                },
                paterno: {
                    required: true,
                    maxlength: 80 
                },
                materno: {
                    required: true, 
                    maxlength: 80 
                },
                nombres: { 
                    required: true,
                    maxlength: 80 
                },
                genero: {
                    required: true 
                }
            },
            messages: {
                'num_dni'	: {
                    required:  'DNI requerido!',                   
                    minlength:'minimo 8 caracteres',
                    maxlength:'maximo 8 caracteres'
                },
                'paterno'	: {
                    required:  'Apellido es requerido!',                  
                    maxlength:'maximo 80 caracteres'
                },
                'materno'	: {
                    required:  'Apellido es requerido!',                  
                    maxlength:'maximo 80 caracteres'
                },
                'nombres'	: {
                    required:  'Nombre es requerido!',                  
                    maxlength:'maximo 80 caracteres'
                }
            },
            ignore: ':hidden'
        });
    },
    //* add numbers to step titles
    steps_nb: function(){
        $('.stepy-titles').each(function(){
            $(this).children('li').each(function(index){
                var myIndex = index + 1
                $(this).append('<span class="stepNb">'+myIndex+'</span>');
            })
        })
    }
};