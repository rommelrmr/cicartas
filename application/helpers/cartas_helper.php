<?php

if (!function_exists('get_tipocarta')) {

    function get_tipocarta() {

        return array(
            '' => 'Seleccionar',
            '1' => 'Informativa',
            '2' => 'Aprobaciones',
            '3' => 'Requerimiento',
            '4' => 'Entregable',
        );
    }

}

if (!function_exists('get_requiererpta')) {

    function get_requiererpta() {

        return array(
            '' => 'Seleccionar',
            '1' => 'Si',
            '2' => 'No'
        );
    }

}

if (!function_exists('get_estadorpta')) {

    function get_estadorpta() {

        return array(
            '' => 'Seleccionar',
            '0' => 'No respondio',
            '1' => 'Respondio'
        );
    }

}

