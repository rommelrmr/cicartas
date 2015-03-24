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
class datatables_postgres
{

    private $_oCI;

    function __construct()
    {
        $this->_oCI = & get_instance();

    }



    public function datatable($sTable = '', $aColumns = '', $sIndexColumn = '', $aFilter = '')
    {


        $iDisplayStart  = $this->_oCI->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->_oCI->input->get_post('iDisplayLength', true);
        $iSortCol_0     = $this->_oCI->input->get_post('iSortCol_0', true);
        $sSortDir_0     = $this->_oCI->input->get_post('sSortDir_0', true);
        $iSortingCols   = $this->_oCI->input->get_post('iSortingCols', true);
        $sSearch        = $this->_oCI->input->get_post('sSearch', true);
        $sEcho          = $this->_oCI->input->get_post('sEcho', true);

        /*
         * Paging
         */
        $sLimit = "";
        if (isset($iDisplayStart) && $iDisplayLength != '-1')
        {
            $sLimit = "LIMIT " . intval($iDisplayLength) . " OFFSET " .
                    intval($iDisplayStart);
        }


        /*
         * Ordering
         */
        if (isset($iSortCol_0))
        {
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($iSortingCols); $i++)
            {

                $iSortCol  = $this->_oCI->input->get_post('iSortCol_' . $i, true);
                $bSortable = $this->_oCI->input->get_post('bSortable_' . intval($iSortCol), true);
                $sSortDir  = $this->_oCI->input->get_post('sSortDir_' . $i, true);

                if ($bSortable == 'true')
                {
                    $sOrder .= $aColumns[$iSortCol_0] . "
                    " . ($sSortDir_0 === 'asc' ? 'asc' : 'desc') . ", ";
                }
            }

            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY")
            {
                $sOrder = "";
            }
        }


        /*
         * Filtering
         * NOTE This assumes that the field that is being searched on is a string typed field (ie. one
         * on which ILIKE can be used). Boolean fields etc will need a modification here.
         */
        $sWhere = " WHERE 1=1 ";

        $sWhereFilter = "";
        if ($aFilter)
        {
            foreach ($aFilter as $campo => $valor)
            {
                $sWhereFilter.= " AND " . $campo . " =" . pg_escape_string($valor);
            }
        }

        if ($sSearch != "")
        {
            $sWhere.= " AND (";
            for ($i = 0; $i < count($aColumns); $i++)
            {
                $bSearchable = $this->_oCI->input->get_post('bSearchable_' . $i, true);
                if ($bSearchable == "true")
                {
                    $sWhere .= "CAST(" . $aColumns[$i] . " AS text) ILIKE '%" . pg_escape_string($sSearch) . "%' OR ";
                }
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ")";
        }

//        /* Individual column filtering */
//        for ($i = 0; $i < count($aColumns); $i++) {
//            if ($_GET['bSearchable_' . $i] == "true" && $_GET['sSearch_' . $i] != '') {
//                if ($sWhere == "") {
//                    $sWhere = "WHERE ";
//                } else {
//                    $sWhere .= " AND ";
//                }
//                $sWhere .= $aColumns[$i] . " ILIKE '%" . pg_escape_string($_GET['sSearch_' . $i]) . "%' ";
//            }
//        }


        $sQuery  = "
        SELECT " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
        FROM   $sTable
        $sWhere $sWhereFilter
        $sOrder
        $sLimit";
        $rResult = $this->_oCI->db->query($sQuery);
        log_message("error", 'QUERY_DATABLE:::' . $this->_oCI->db->last_query());

        $sQuery       = "
        SELECT count($sIndexColumn) as cantidad
        FROM $sTable WHERE 1=1 $sWhereFilter";
        $rResultTotal = $this->_oCI->db->query($sQuery);
        $iTotal       = $rResultTotal->row('cantidad');


        if ($sWhere != "")
        {
            $sQuery             = "
            SELECT count($sIndexColumn) as cantidad
            FROM   $sTable
            $sWhere $sWhereFilter";
            $rResultFilterTotal = $this->_oCI->db->query($sQuery);
            $iFilteredTotal     = $rResultFilterTotal->row('cantidad');
        }
        else
        {
            $iFilteredTotal = $iTotal;
        }


        /*
         * Output
         */
        $output = array(
            "sEcho"                => intval($sEcho),
            "iTotalRecords"        => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData"               => array()
        );

        foreach ($rResult->result_array() as $aRow)
        {
            $row = array();

            foreach ($aColumns as $col)
            {
                //$row[] = utf8_encode($aRow[$col]);
                $row[] = utf8_encode($aRow[$col]);
            }

            $output['aaData'][] = $row;
        }

        echo json_encode($output);

    }



}

/* End of file datatables_postgres.php */
/* @autor: Rommel Richard Mercado Rodriguez */
/* Location: ./application/libraries/datatables_postgres.php */