<?php

/**
 *  Sitio Class
 *  @package Sistema de ERP-RMR
 *  @subpackage Models
 *  @category Models 
 *  @author Rommel Mercado Rodriguez
 *  @version 1.0
 *  @copyright (c) 2015, Rommel Mercado Rodriguez
 */
class carta_model extends MY_Model {

    public function __construct() {

        parent::__construct();

        $this->sTable = "carta";

        $this->sVista = "v_carta";

        $this->sPrimaryKey = "idcarta";
    }

    public function get_datatable($a_filter) {

        $a_columns = array(
            'idcarta',
            'nomcontrato',
            'cartarelacionada',
            'observaciones',
            'nomestado',
            'descripcion',
            'ufeccarta',
            'ufecrecepcion',
            'nomrequiere',
            'nomrespuesta',
            'idcarta'
        );

        

        return $this->get_datatables_view($a_columns, $a_filter);
    }


}
