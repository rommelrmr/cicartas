<?php

if (!function_exists('validar_id'))
{

    function validar_id($id = '')
    {

        if (strlen($id) > 0 && is_numeric($id))
        {
            return TRUE;
        }
        return FALSE;

    }



}


if (!function_exists('moneda'))
{

    function moneda($valor, $decimales = 2)
    {
        return number_format($valor, $decimales);

    }



}


if (!function_exists('moneda_cero'))
{

    function moneda_cero($valor, $decimales = 2)
    {
        if ($valor == 0)
        {
            return "-";
        }
        return number_format($valor, $decimales);

    }



}

if (!function_exists('validar_radio'))
{

    function validar_radio($field, $row = '', $value = '')
    {

        if ($_POST[$field])
        {
            if ($_POST[$field] == $value)
            {
                return ' checked="checked" ';
            }
        }
        elseif ($row)
        {
            if ($row == $value)
            {
                return ' checked="checked" ';
            }
        }
        else
        {
            return '';
        }

    }



}



if (!function_exists('validar_campo'))
{

    function validar_campo($field, $row = '')
    {

        if ($_POST[$field])
        {

            return $_POST[$field];
        }
        elseif ($row)
        {

            return $row;
        }
        else
        {
            return '';
        }

    }



}


if (!function_exists('validar_fecha'))
{

    function validar_fecha($field, $row = '')
    {

        if ($_POST[$field])
        {

            return $_POST[$field];
        }
        elseif ($row)
        {

            return formato_fecha($row);
        }
        else
        {
            return date("d/m/Y");
        }

    }



}


if (!function_exists('validar_hora'))
{

    function validar_hora($field, $row = '')
    {

        if ($_POST[$field])
        {

            return $_POST[$field];
        }
        elseif ($row)
        {

            return $row;
        }
        else
        {
            return date("h:m");
        }

    }



}


if (!function_exists('formato_fecha'))
{

    function formato_fecha($fecha, $formato = 1)
    {

        if ($formato == 1)
        {
            $year  = substr($fecha, 0, 4);
            $month = substr($fecha, 5, 2);
            $day   = substr($fecha, 8, 2);
            return $day . '/' . $month . '/' . $year;
        }
        
        if ($formato == 2)
        {
            //12/12/2014
            $day   = substr($fecha, 0, 2);
            $month = substr($fecha, 3, 2);
            $year  = substr($fecha, 6, 4);
            return $year . '/' . $month . '/' . $day;
        }

    }



}

if (!function_exists('get_periodo'))
{

    function get_periodo($fecha)
    {


        $day   = substr($fecha, 0, 2);
        $month = substr($fecha, 3, 2);
        $year  = substr($fecha, 6, 4);
        return $year . $month;

    }



}


if (!function_exists('validar_estado_planilla'))
{

    function validar_estado_planilla($estado_id = 0, $estado_nom = '')
    {



        switch ($estado_id)
        {
            case 0:
                return ' <span class="pull-left label label-success font12">' . $estado_nom . '</span>';
            case 1:
                return ' <span class="pull-left label label-warning font12">' . $estado_nom . '</span>';
            case 2:
                return ' <span class="pull-left label label-info font12">' . $estado_nom . '</span>';
            case 3:
                return ' <span class="pull-left label label-important font12">' . $estado_nom . '</span>';
        }

    }



}




if (!function_exists('valida_sunat'))
{

    function valida_sunat($valor)
    {
        if ($valor == 0)
        {
            return "NO";
        }
        return "SI";

    }



}

if (!function_exists('valida_sustentacion'))
{

    function valida_sustentacion($sunat, $sustentacion)
    {
        if ($sunat == 0)
        {
            return "-";
        }
        else
        {
            if ($sustentacion == 1)
            {
                return "Presento";
            }
            else
            {
                return "No Presento";
            }
        }

    }



}




if (!function_exists('aOpcionSunat'))
{

    function aOpcionSunat()
    {
        return array(
            1 => 'Presento',
            2 => 'No Presento'
        );

    }



}



if (!function_exists('valida_montodevolucion'))
{

    function valida_montodevolucion($valor)
    {
        if ($valor > 0)
        {
            return $valor;
        }
        return '';

    }



}





if (!function_exists('get_ultimo_dia_mes'))
{

    function get_ultimo_dia_mes()
    {

        $month = date("m");

        $year = date("Y");

        $dia = date("d", (mktime(0, 0, 0, $month + 1, 1, $year) - 1));

        if (strlen($month) == 1)
        {
            $month = "0" . $month;
        }

        if (strlen($dia) == 1)
        {
            $dia = "0" . $dia;
        }

        return $year . '-' . $month . '-' . $dia;

    }



}



if (!function_exists('get_primer_dia_mes'))
{

    function get_primer_dia_mes()
    {

        $month = date("m");

        $year = date("Y");

        $dia = '01';

        if (strlen($month) == 1)
        {
            $month = "0" . $month;
        }

        if (strlen($dia) == 1)
        {
            $dia = "0" . $dia;
        }

        return $year . '-' . $month . '-' . $dia;

    }



}




if (!function_exists('get_periodo_planilla'))
{

    function get_periodo_planilla($periodo)
    {
        $year  = substr($periodo, 0, 4);
        $month = intval(substr($periodo, 4, 2));

        switch ($month)
        {
            case 1:$mes = "Enero";
                break;
            case 2:$mes = "Febrero";
                break;
            case 3:$mes = "Marzo";
                break;
            case 4:$mes = "Abril";
                break;
            case 5:$mes = "Mayo";
                break;
            case 6:$mes = "Junio";
                break;
            case 7:$mes = "Julio";
                break;
            case 8:$mes = "Agosto";
                break;
            case 9:$mes = "Septiembre";
                break;
            case 10:$mes = "Octubre";
                break;
            case 11:$mes = "Noviembre";
                break;
            case 12:$mes = "Diciembre";
                break;
        }

        return $mes . ' - ' . $year;

    }



}



if (!function_exists('encode'))
{

    function encode($dato)
    {
        return utf8_encode(trim($dato));

    }



}

if (!function_exists('decode'))
{

    function decode($dato)
    {
        return utf8_decode(trim($dato));

    }



}
