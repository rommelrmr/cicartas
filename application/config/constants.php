<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  |--------------------------------------------------------------------------
  | File and Directory Modes
  |--------------------------------------------------------------------------
  |
  | These prefs are used when checking and setting modes when working
  | with the file system.  The defaults are fine on servers with proper
  | security, but you may wish (or even need) to change the values in
  | certain environments (Apache running a separate process for each
  | user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
  | always be used to set the mode correctly.
  |
 */
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
  |--------------------------------------------------------------------------
  | File Stream Modes
  |--------------------------------------------------------------------------
  |
  | These modes are used when working with fopen()/popen()
  |
 */

define('FOPEN_READ', 'rb');
define('FOPEN_READ_WRITE', 'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 'ab');
define('FOPEN_READ_WRITE_CREATE', 'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/* Url */
$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://" . $_SERVER['HTTP_HOST'];
$base_url .= str_replace(basename($_SERVER['SCRIPT_NAME']), "", $_SERVER['SCRIPT_NAME']);
define('BASE_URL', $base_url);



$base_url = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
$base_url .= "://";
$proyecto = explode("/", $_SERVER['REQUEST_URI']);
$base_url .= $_SERVER['HTTP_HOST'] . '/' . $proyecto[1] . '/';
define('BASE_URL_GLOBAL', $base_url);


//ASSETS
define('URL_BOOTSTRAP', BASE_URL_GLOBAL . 'assets/bootstrap/');
define('URL_IMG', BASE_URL_GLOBAL . 'assets/img/');
define('URL_CSS', BASE_URL_GLOBAL . 'assets/css/');
define('URL_JS', BASE_URL_GLOBAL . 'assets/js/');
define('URL_GALLERY', BASE_URL_GLOBAL . 'assets/gallery/');
define('URL_LIB', BASE_URL_GLOBAL . 'assets/lib/');

//ACCIONES
define('ACTIVO', 1);
define('INACTIVO', 0);
define('SUCCESS', 1);

define('ERROR', 0);
define('ERROR_DATABASE', -1);
define('ERROR_PASSWORD', 2);
define('ERROR_PASSWORD_MSG', "El Password ingresado es erroneo");
define('ERROR_USUARIO', 3);
define('ERROR_USUARIO_MSG', "El Usuario ingresado no existe");

define('FLG_ACTIVO', "flg_activo");
define('FLG_ELIMINAR', "flg_eliminar");
define('CERO', 0);
define('EXISTE_PLANILLA_INSERT', 1);
define('EXISTE_PLANILLA_UPDATE', 2);

//SCHEMAS
define('SCHEMA_RRHH', 'rrhh.');
define('SCHEMA_SEGURIDAD', 'seguridad.');


//DESCRIPCION
define('TABLAS_MAESTRAS', 1);
define('ESTADO_PLANILLA', '1001');
define('ESTADO_CIVIL', '1002');
define('SITUACION_LABORAL', '1003');
define('MOTIVO_LABORAL', '1004');
define('TIPO_VIA', '1005');
define('TIPO_DIRECCION', '1006');
define('TIPO_TELEFONO', '1007');
define('TIPO_EMAIL', '1008');
define('TIPO_TRABAJOR', '1009');
define('ESPECIALIDAD', '1011');
define('PROFESION', '1012');
define('TIPO_DOCUMENTO', '1013');
define('TIPO_ASISTENCIA', '1014');
define('TIPO_PLANILLA', '1015');
define('TIPO_DESCUENTO', '1018');
define('TIPO_TRABAJADOR_AFP', '1017');
define('TIPO_PROCESO_DSCTO', '1019');
define('TIPO_PAGO', '1021');
define('PARAMETROS_SISTEMA', '1022');



//TIPO DE PENSION
define('SIN_DEFINIR', '0');
define('ONP', '1');
define('AFP', '2');


//ESTADO DE PLANILLA
define('PLANILLA_PENDIENTE', '0');
define('PLANILLA_PROCESADO', '2');



define('PERFIL_LOGISTICA', '2');
define('PERFIL_RRHH', '3');


/* End of file constants.php */
/* Location: ./application/config/constants.php */