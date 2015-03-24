<?php

if (!function_exists('encode'))
{

    function encode($dato)
    {
        return utf8_encode($dato);
    }

}

if (!function_exists('decode'))
{

    function decode($dato)
    {
        return utf8_decode($dato);
    }

}

if (!function_exists('latitud'))
{


    function latitud($cadena = '')
    {
        if (strlen($cadena) > 0)
        {
            $buscar = array("°", "'", "S", "O", ".", '"');
            $reemplazar = array("", "", "", "", "", "");
            return str_replace($buscar, $reemplazar, $cadena);
        }
        else
        {
            return $cadena;
        }
    }

}

if (!function_exists('validaDNI'))
{

    function validaDNI($dni = 0)
    {
        $exite = FALSE;

        $buscar = "-";
        $pos    = strpos($dni, $buscar);
        if ($pos !== false)
        {
            ##no encontro
            $exite = TRUE;
        }
        return $exite;
    }

}

if (!function_exists('limpiarDNI'))
{


    function limpiarDNI($cadena = '')
    {
        if (strlen($cadena) > 0)
        {
            $buscar = array("°", "'", "N", " ", ".", '"', ':');
            $reemplazar = array("", "", "", "", "", "", "");
            return str_replace($buscar, $reemplazar, $cadena);
        }
        else
        {
            return $cadena;
        }
    }

}

if (!function_exists('moneda'))
{

    function moneda($dato, $decimal = 0)
    {
        $retornar = number_format($dato, $decimal);
        if ($dato == 0)
        {
            $retornar = "-";
        }
        return $retornar;
    }

}

if (!function_exists('fechaUsuario'))
{

    function fechaUsuario($fecha = '')
    {
        if (strlen($fecha) >= 10)
        {
            $year  = substr($fecha, 0, 4);
            $month = substr($fecha, 5, 2);
            $day   = substr($fecha, 8, 2);
            return $day . '/' . $month . '/' . $year;
        }
        else
        {
            return '01/01/1900';
        }
    }

}

if (!function_exists('validarFecha'))
{

    function validarFecha($fecha = '')
    {
        if (strlen($fecha) >= 10)
        {
            $year = substr($fecha, 0, 4);

            if (intval($year) > 2000)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

}

if (!function_exists('fechaValidaExcel'))
{

    function fechaValidaExcel($fecha = '')
    {
        if (strlen($fecha) >= 10)
        {
            $mystring = $fecha;
            $findme   = '/';
            $pos      = strpos($mystring, $findme);

            if ($pos === false)
            {
                return $fecha;
            }
            else
            {
                $day   = substr($fecha, 0, 2);
                $month = substr($fecha, 3, 2);
                $year  = substr($fecha, 6, 4);
                return $year . '-' . $month . '-' . $day;
            }
        }
        else
        {
            return "1900-01-01";
        }
    }

}

if (!function_exists('fechaValida'))
{

    function fechaValida($fecha = '')
    {
        if (strlen($fecha) >= 10)
        {
            $year = substr($fecha, 0, 4);

            if (intval($year) > 1950)
            {
                return $fecha;
            }
            else
            {
                return "";
            }
        }
        else
        {
            return "";
        }
    }

}


if (!function_exists('fechaUsuarioGrilla'))
{

    function fechaUsuarioGrilla($fecha = '')
    {
        if (strlen($fecha) >= 10)
        {
            $year  = substr($fecha, 0, 4);
            $month = substr($fecha, 5, 2);
            $day   = substr($fecha, 8, 2);
            if (intval($year) == 1900)
            {

                return '-';
            }
            else
            {

                return $day . '/' . $month . '/' . $year;
            }
        }
        else
        {
            return '-';
        }
    }

}

if (!function_exists('fechaActual'))
{

    function fechaActual()
    {
        $mes = array(
            '01'     => 'ENE',
            '02'     => 'FEB',
            '03'     => 'MAR',
            '04'     => 'ABR',
            '05'     => 'MAY',
            '06'     => 'JUN',
            '07'     => 'JUL',
            '08'     => 'AGO',
            '09'     => 'SEP',
            '10'     => 'OCT',
            '11'     => 'NOV',
            '12'     => 'DIC'
        );
        $nom_mes = $mes[date("m")];
        return "Fecha: " . $nom_mes . '-' . date("Y");
    }

}

if (!function_exists('formato'))
{

    function formato($cadena)
    {

        $new = "-";
        if (strlen($cadena) > 0 && $cadena != 'null')
        {
            $new = strtolower($cadena);
        }
        return strtoupper($new);
    }

}

if (!function_exists('formato_encode'))
{

    function formato_encode($cadena, $substring = '')
    {
        $new = "-";
        if (strlen($cadena) > 0)
        {
            $new = strtolower(encode($cadena));
            $new = strtoupper($new);
        }

        if (strlen($substring) > 0)
        {
            $new = substr($new, 0, $substring);
        }
        return $new;
    }

}

if (!function_exists('validarCodigo'))
{

    function validarCodigo($codigo = '')
    {
        //$mensaje = "<span style='color:red'>No Referenciado<span>";
        $mensaje = "No Referenciado";

        if (strlen($codigo) >= 0 && $codigo != "#N/A" && strlen($codigo))
        {
            $mensaje = $codigo;
        }


        return $mensaje;
    }

}

if (!function_exists('calcular_dias'))
{

    function calcular_dias($fecha)
    {
        $anio1 = substr($fecha, 0, 4);
        $mes1  = substr($fecha, 5, 2);
        $dia1  = substr($fecha, 8, 2);

        $anio2 = date("Y");
        $mes2  = date("m");
        $dia2  = date("d");

        $time1 = mktime(0, 0, 0, $mes1, $dia1, $anio1);
        $time2 = mktime(4, 12, 0, $mes2, $dia2, $anio2);

        $diferencia = $time1 - $time2;

        $dias_c = $diferencia / (60 * 60 * 24);

        $dias_a = ($dias_c);

        return floor($dias_a);
    }

}

if (!function_exists('calcular_mes'))
{

    function calcular_mes($fecha)
    {
        $anio1 = substr($fecha, 0, 4);
        $mes1  = substr($fecha, 5, 2);
        $dia1  = substr($fecha, 8, 2);

        $anio2 = date("Y");
        $mes2  = date("m");
        $dia2  = date("d");

        $time1 = mktime(0, 0, 0, $mes1, $dia1, $anio1);
        $time2 = mktime(0, 0, 0, $mes2, $dia2, $anio2);

        $diferencia = $time1 - $time2;

        $dias_c = $diferencia / (60 * 60 * 24);

        $dias_a = abs($dias_c);

        return floor($dias_a / 30);
    }

}



if (!function_exists('get_propio'))
{

    function get_propio($dato)
    {
        $datos = array(
            '0' => 'NO',
            '1' => 'SI'
        );

        return $datos[$dato];
    }

}
if (!function_exists('sanear_string'))
{

    function sanear_string($string)
    {

        $string = trim($string);


        //Esta parte se encarga de eliminar cualquier caracter extraño
        $string = str_replace(
                array("\\", "¨", "º", "~",
            "#", "|", "\"",
            "$", "%",
            "?", "'", "¡",
            "¿", "[", "^", "`", "]",
            "+", "}", "{", "¨",
            ">", "< ", ":"), ' ', $string
        );


        $string = str_replace("<br>", "", $string);
        $string = str_replace("&amp;", "&", $string);

        $string = trim($string);

        return $string;
    }

}
