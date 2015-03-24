<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php

/**
 *  Sitio Class
 *  @package Caral
 *  @subpackage Modules
 *  @category Controllers 
 *  @author Rommel Mercado 
 *  @version 1.0
 *  @copyright (c) 2013, Rommel Mercado
 */
class bandeja extends CI_Controller {

    public function __construct() {

        parent::__construct();

        $this->load->model("carta_model");
    }

    public function index() {
        redirect(BASE_URL . 'index.do');
    }

    public function item($item = 'general', $tipo = "e") {

        $data['item'] = $item;
        $data['tipo'] = $tipo;

        $this->load->vars($data);

        ##cargamos el index
        $this->load->view("header_view");
        $this->load->view("sidebar_view");
        $this->load->view("index_view");
        $this->load->view("footer_view");
    }

    public function grid() {
        $this->load->view("grid_view");
    }

    public function datatables() {

        $params = array();

        if ($this->input->get_post("f_estrespuesta")) {
            $params['estadorespuesta'] = $this->input->get_post("f_estrespuesta");
        }
        if ($this->input->get_post("f_respuesta")) {
            $params['reqrespuesta'] = $this->input->get_post("f_respuesta");
        }

        $this->output->set_output($this->carta_model->get_datatable($params));
    }

}

/* End of file panel.php */
/* @autor: Rommel Richard Mercado Rodriguez */
/* Location: ./application/modules/personal/controllers/panel.php */