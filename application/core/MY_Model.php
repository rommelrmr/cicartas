<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php

/**
 *  MY_Model
 *  @package Caral
 *  @subpackage Core
 *  @category Core 
 *  @author Rommel Mercado 
 *  @version 1.0
 *  @copyright (c) 2013, Rommel Mercado
 */
class MY_Model extends CI_Model
{

    public $sTable      = "";
    public $sVista      = "";
    public $sPrimaryKey = "";

    public function __construct()
    {
        parent::__construct();

    }



    public function get_datatables_view($aColumns = array(), $aFilter = '')
    {

        return $this->datatables_mysqli->datatable($this->sVista, $aColumns, $this->sPrimaryKey, $aFilter);

    }



    public function get_datatables_table($aColumns = array(), $aFilter = '')
    {

        return $this->datatables_mysqli->datatable($this->sTable, $aColumns, $this->sPrimaryKey, $aFilter);

    }



    public function get_datatables($aColumns = array(), $sTable = '', $aFilter = '')
    {

        return $this->datatables_mysqli->datatable($sTable, $aColumns, $this->sPrimaryKey, $aFilter = '');

    }



    public function get_all($aWhere = array())
    {

        if (count($aWhere) > 0)
        {
            $this->db->where($aWhere);
        }

        $query = $this->db->get($this->sTable);

        log_message("error", $this->db->last_query());

        return $query->result();

    }



    public function get_all_view($aWhere = array())
    {

        if (count($aWhere) > 0)
        {
            $this->db->where($aWhere);
        }

        $query = $this->db->get($this->sVista);

        log_message("error", $this->db->last_query());

        return $query->result();

    }



    public function get_all_array($aWhere = array())
    {

        if (count($aWhere) > 0)
        {
            $this->db->where($aWhere);
        }

        $query = $this->db->get($this->sTable);

        log_message("error", $this->db->last_query());

        return $query->result_array();

    }



    public function get_row($sPrimaryKey = '', $aWhere = array())
    {

        if (strlen($sPrimaryKey) > 0)
        {
            $this->db->where($this->sPrimaryKey, $sPrimaryKey);
        }

        if (count($aWhere) > 0)
        {
            $this->db->where($aWhere);
        }

        $query = $this->db->get($this->sTable);

        log_message("error", $this->db->last_query());

        return $query->row();

    }



    public function get_row_view($sPrimaryKey = '', $aWhere = array())
    {

        if (strlen($sPrimaryKey) > 0)
        {
            $this->db->where($this->sPrimaryKey, $sPrimaryKey);
        }

        if (count($aWhere) > 0)
        {
            $this->db->where($aWhere);
        }

        $query = $this->db->get($this->sVista);

        log_message("error", $this->db->last_query());

        return $query->row();

    }



    public function get_row_array($sPrimaryKey = '', $aWhere = array())
    {

        if (strlen($sPrimaryKey) > 0)
        {
            $this->db->where($this->sPrimaryKey, $sPrimaryKey);
        }

        if (count($aWhere) > 0)
        {
            $this->db->where($aWhere);
        }

        $query = $this->db->get($this->sTable);

        log_message("error", $this->db->last_query());

        return $query->row_array();

    }



    public function save($sPrimaryKey = '', $post = '', $get_id_max = FALSE)
    {

        if (validar_id($sPrimaryKey))
        {

            $this->db->where($this->sPrimaryKey, $sPrimaryKey);

            $return = $this->db->update($this->sTable, $post);

            log_message("error", $this->db->last_query());
        }
        else
        {

            if ($get_id_max == TRUE)
            {
                $this->db->set($this->sPrimaryKey, $this->get_id_max());
            }

            $return = $this->db->insert($this->sTable, $post);

            log_message("error", $this->db->last_query());
        }



        return $return;

    }



    public function save_autocrement($sPrimaryKey = '', $post = '', $get_id_max = FALSE)
    {

        if (validar_id($sPrimaryKey))
        {
            // Update

            $this->db->where($this->sPrimaryKey, $sPrimaryKey);

            log_message("error", $this->db->last_query());

            $return = $this->db->update($this->sTable, $post);

            $id_autocrement = $sPrimaryKey;
        }
        else
        {
            // Insert

            $return = $this->db->insert($this->sTable, $post);

            log_message("error", $this->db->last_query());

            $id_autocrement = $this->db->insert_id();
        }



        if ($return)
        {
            return $id_autocrement;
        }
        else
        {
            return ERROR_INSERT;
        }

    }



    public function insert($post, $get_id_max = FALSE)
    {

        if ($get_id_max == TRUE)
        {
            $this->db->set($this->sPrimaryKey, $this->get_id_max());
        }

        $return = $this->db->insert($this->sTable, $post);

        log_message("error", $this->db->last_query());

        return $return;

    }



    public function update($post = array())
    {

        $this->db->where($this->sPrimaryKey, $post[$this->sPrimaryKey]);

        $return = $this->db->update($this->sTable, $post);

        log_message("error", $this->db->last_query());

        return $return;

    }



    public function get_id_max()
    {

        $this->db->select_max($this->sPrimaryKey);

        $query = $this->db->get($this->sTable);

        log_message("error", $this->db->last_query());

        return $query->row($this->sPrimaryKey) + 1;

    }



    public function delete($sPrimaryKey = 0)
    {

        $this->db->where($this->sPrimaryKey, $sPrimaryKey);

        $return = $this->db->delete($this->sTable);

        log_message("error", $this->db->last_query());

        return $return;

    }



    //FUNCIONES ESPECIALES PARA LA TABLA DESCRIPCION
    public function save_descripcion($sPrimaryKey = '', $post = '', $descripcion_id = 0)
    {

        if (validar_id($sPrimaryKey))
        {

            $this->db->where($this->sPrimaryKey, $sPrimaryKey);

            $this->db->where("descripcion_id", $descripcion_id);

            $return = $this->db->update($this->sTable, $post);

            log_message("error", $this->db->last_query());
        }
        else
        {

            $this->db->set($this->sPrimaryKey, $this->get_id_max_descripcion($descripcion_id));

            $return = $this->db->insert($this->sTable, $post);

            log_message("error", $this->db->last_query());
        }



        return $return;

    }



    public function get_id_max_descripcion($descripcion_id = 0)
    {

        $this->db->select_max($this->sPrimaryKey);

        $this->db->where("descripcion_id", $descripcion_id);

        $query = $this->db->get($this->sTable);

        log_message("error", $this->db->last_query());

        return $query->row($this->sPrimaryKey) + 1;

    }



    public function save_mantenimiento($action = 'update', $post = '')
    {

        if ($action == 'update')
        {

            $this->db->where("descripcion_id", $post['descripcion_id']);
            $this->db->where("codigo", $post['codigo']);

            $return = $this->db->update($this->sTable, $post);

            log_message("error", $this->db->last_query());
        }
        else
        {
            $return = $this->db->insert($this->sTable, $post);

            log_message("error", $this->db->last_query());
        }



        return $return;

    }



}

/* End of file My_Model.php */
/* @autor: Rommel Richard Mercado Rodriguez */
/* Location: ./application/core/My_Model.php */