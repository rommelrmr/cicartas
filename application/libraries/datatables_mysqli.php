<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class datatables_mysqli {

    private $_oCI;

    function __construct() {
        $this->_oCI = & get_instance();
    }

    public function sp_datatables($params = array()) {

        $start = $this->_oCI->input->get_post('iDisplayStart', true);
        $length = $this->_oCI->input->get_post('iDisplayLength', true);
        $sortcol = $this->_oCI->input->get_post('iSortCol_0', true) + 1;
        $sortdir = $this->_oCI->input->get_post('sSortDir_0', true);
        $search = $this->_oCI->input->get_post('sSearch', true);
        $sEcho = $this->_oCI->input->get_post('sEcho', true);


        $output = array();
        $output['sEcho'] = intval($sEcho);

        
        $a_filtro_tr = array($search);
        $a_params_tr = array_merge($a_filtro_tr, $params['a_where']);

        $rTotalRecords = $this->_oCI->db->query($params['sp_tr'], $a_params_tr);
        $output['iTotalRecords'] = $rTotalRecords->row("total_records");
        $rTotalRecords->next_result();
        $rTotalRecords->free_result();

        $rTotalDisplay = $this->_oCI->db->query($params['sp_td'], $a_params_tr);
        $output['iTotalDisplayRecords'] = $rTotalDisplay->row("total_display");
        $rTotalDisplay->next_result();
        $rTotalDisplay->free_result();



        $a_filtro_rs = array($start, $length, $sortcol, $sortdir, $search);
        $a_params_rs = array_merge($a_filtro_rs, $params['a_where']);
        $rResult = $this->_oCI->db->query($params['sp_rs'], $a_params_rs);


        foreach ($rResult->result_array() as $aRow) {
            $row = array();

            foreach ($params['a_columns'] as $col) {
                $row[] = ($aRow[$col]);
            }

            $output['aaData'][] = $row;
        }

        $rResult->next_result();
        $rResult->free_result();

        echo json_encode($output);
    }

    public function datatable($sTable = '', $aColumns = '', $sIndexColumn = '', $aFilter = array(), $aFilterDifferent = array(), $aFilterOr = array()) {

        //paginacion
        $iDisplayStart = $this->_oCI->input->get_post('iDisplayStart', true);
        $iDisplayLength = $this->_oCI->input->get_post('iDisplayLength', true);

        //orden
        $iSortCol_0 = $this->_oCI->input->get_post('iSortCol_0', true);
        $sSortDir_0 = $this->_oCI->input->get_post('sSortDir_0', true);
        $iSortingCols = $this->_oCI->input->get_post('iSortingCols', true);

        //buscar
        $sSearch = $this->_oCI->input->get_post('sSearch', true);
        $sEcho = $this->_oCI->input->get_post('sEcho', true);

        /*
         * Paging
         */
        $sLimit = "";
        if (isset($iDisplayStart) && $iDisplayLength != '-1') {
            $sLimit = "LIMIT " . intval($iDisplayLength) . " OFFSET " .
                    intval($iDisplayStart);
        }
        log_message("debug", " sLimit:::: $sLimit");

        /*
         * Ordering
         */
        if (isset($iSortCol_0)) {
            $sOrder = "ORDER BY  ";
            for ($i = 0; $i < intval($iSortingCols); $i++) {

                $iSortCol = $this->_oCI->input->get_post('iSortCol_' . $i, true);
                $bSortable = $this->_oCI->input->get_post('bSortable_' . intval($iSortCol), true);
                $sSortDir = $this->_oCI->input->get_post('sSortDir_' . $i, true);

                if ($bSortable == 'true') {
                    $sOrder .= $aColumns[$iSortCol_0] . " " . ($sSortDir_0 === 'asc' ? 'asc' : 'desc') . ", ";

                    log_message("debug", " sOrder:::: $iSortCol_0");
                }
            }

            $sOrder = substr_replace($sOrder, "", -2);
            if ($sOrder == "ORDER BY") {
                $sOrder = "";
            }
        }


        /*
         * Filtering         
         */
        $sWhere = " WHERE 1=1 ";
        $sWhereFilter = "";
        if (count($aFilter) > 0) {

            foreach ($aFilter as $campo => $valor) {
                $sWhereFilter.= " AND " . $campo . " =" . $this->_oCI->db->escape_str($valor);
            }

            log_message("debug", " sWhereFilter:::: $sWhereFilter");
        }

        $sWhereFilterDifferent = "";
        if (count($aFilterDifferent) > 0) {

            foreach ($aFilterDifferent as $campo => $valor) {
                $sWhereFilterDifferent.= " AND " . $campo . " <>" . $this->_oCI->db->escape_str($valor);
            }

            log_message("debug", " sWhereFilterDifferent:::: $sWhereFilterDifferent");
        }


        if ($sSearch != "") {
            $sWhere.= "AND (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $bSearchable = $this->_oCI->input->get_post('bSearchable_' . $i, true);
                if ($bSearchable == "true") {
                    $sWhere .= " " . $aColumns[$i] . " LIKE '%" . $this->_oCI->db->escape_str($sSearch) . "%' OR ";
                }
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere.= ")";

            log_message("debug", " where:::: $sWhere");
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

        log_message("debug", "================================================");
        log_message("debug", " Tabla:::: $sTable");


        $sQuery = "
        SELECT " . str_replace(" , ", " ", implode(", ", $aColumns)) . "
        FROM   $sTable
        $sWhere $sWhereFilter $sWhereFilterDifferent
        $sOrder
        $sLimit";
        log_message("debug", "1-sQuery :::" . $sQuery);
        $rResult = $this->_oCI->db->query($sQuery);
        log_message("debug", "1-sQuery :::" . $this->_oCI->db->last_query());

        $sQuery = "
        SELECT count($sIndexColumn) as cantidad
        FROM $sTable WHERE 1=1 $sWhereFilter $sWhereFilterDifferent";
        log_message("debug", "2-rResultTotal :::" . $sQuery);
        $rResultTotal = $this->_oCI->db->query($sQuery);
        log_message("debug", "2-rResultTotal :::" . $this->_oCI->db->last_query());

        $iTotal = $rResultTotal->row('cantidad');
        log_message("debug", "3-iTotal :::" . $iTotal);


        if ($sWhere != "") {
            $sQuery = "
            SELECT count($sIndexColumn) as cantidad
            FROM   $sTable
            $sWhere $sWhereFilter $sWhereFilterDifferent";
            $rResultFilterTotal = $this->_oCI->db->query($sQuery);
            log_message("debug", "4-rResultFilterTotal :::" . $sQuery);
            log_message("debug", "4-rResultFilterTotal :::" . $this->_oCI->db->last_query());
            $iFilteredTotal = $rResultFilterTotal->row('cantidad');
        } else {
            $iFilteredTotal = $iTotal;
        }
        log_message("debug", "iFilteredTotal :::" . $iFilteredTotal);

        /*
         * Output
         */
        $output = array(
            "sEcho" => intval($sEcho),
            "iTotalRecords" => $iTotal,
            "iTotalDisplayRecords" => $iFilteredTotal,
            "aaData" => array()
        );

        foreach ($rResult->result_array() as $aRow) {
            $row = array();

            foreach ($aColumns as $col) {
                $row[] = ($aRow[$col]);
            }

            $output['aaData'][] = $row;
        }

        echo json_encode($output);
    }

}

?>