<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php

/**
 *  datatables_postgres
 *  @package Caral
 *  @subpackage libraries
 *  @category libraries 
 *  @author Rommel Mercado 
 *  @version 1.0
 *  @copyright (c) 2013, Rommel Mercado
 */
class datatables_mysql
{

    private $_oCI;

    function __construct()
    {
        $this->_oCI = & get_instance();

    }



    public function datatable($sTable = '', $aColumns = '', $sIndexColumn = '')
    {


        $iDisplayStart  = $this->_oCI->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->_oCI->input->get_post('iDisplayLength', true);
        $iSortCol_0     = $this->_oCI->input->get_post('iSortCol_0', true);
        $iSortingCols   = $this->_oCI->input->get_post('iSortingCols', true);
        $sSearch        = $this->_oCI->input->get_post('sSearch', true);
        $sEcho          = $this->_oCI->input->get_post('sEcho', true);

        // Paging
        if (isset($iDisplayStart) && $iDisplayLength != '-1')
        {
            $this->_oCI->db->limit($this->_oCI->db->escape_str($iDisplayLength), $this->_oCI->db->escape_str($iDisplayStart));
        }

        // Ordering
        if (isset($iSortCol_0))
        {
            for ($i = 0; $i < intval($iSortingCols); $i++)
            {
                $iSortCol  = $this->_oCI->input->get_post('iSortCol_' . $i, true);
                $bSortable = $this->_oCI->input->get_post('bSortable_' . intval($iSortCol), true);
                $sSortDir  = $this->_oCI->input->get_post('sSortDir_' . $i, true);

                if ($bSortable == 'true')
                {
                    $this->_oCI->db->order_by($aColumns[intval($this->_oCI->db->escape_str($iSortCol))], $this->_oCI->db->escape_str($sSortDir));
                }
            }
        }

        /*
         * Filtering
         * NOTE this does not match the built-in DataTables filtering which does it
         * word by word on any field. It's possible to do here, but concerned about efficiency
         * on very large tables, and MySQL's regex functionality is very limited
         */
        if (isset($sSearch) && !empty($sSearch))
        {
            for ($i = 0; $i < count($aColumns); $i++)
            {
                $bSearchable = $this->_oCI->input->get_post('bSearchable_' . $i, true);

                // Individual column filtering
                if (isset($bSearchable) && $bSearchable == 'true')
                {
                    $this->_oCI->db->or_like($aColumns[$i], $this->_oCI->db->escape_like_str($sSearch));
                }
            }
        }

        // Select Data
        $this->_oCI->db->select(implode(', ', $aColumns));
        $rResult = $this->_oCI->db->get($sTable);

        // Data set length after filtering
        //$this->_oCI->db->select('FOUND_ROWS() AS found_rows');
        //$iFilteredTotal = $this->_oCI->db->get()->row()->found_rows;
        $iFilteredTotal = $rResult->num_rows();

        // Total data set length
        //$iTotal = $this->_oCI->db->count_all($sTable);
        $iTotal = $this->_oCI->db->query("select count($sIndexColumn) as cantidad from $sTable")->row("cantidad");

        // Output
        $output = array(
            'sEcho'                => intval($sEcho),
            'iTotalRecords'        => $iTotal,
            'iTotalDisplayRecords' => $iFilteredTotal,
            'aaData'               => array()
        );

        foreach ($rResult->result_array() as $aRow)
        {
            $row = array();

            foreach ($aColumns as $col)
            {
                $row[] = $aRow[$col];
            }

            $output['aaData'][] = $row;
        }

        echo json_encode($output);

    }



}

/* End of file datatables_mysql.php */
/* @autor: Rommel Richard Mercado Rodriguez */
/* Location: ./application/libraries/datatables_mysql.php */