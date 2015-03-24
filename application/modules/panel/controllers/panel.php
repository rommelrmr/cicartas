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
class Panel extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();



    }



    public function index()
    {
        redirect(BASE_URL . 'index.do');

    }



    public function action_panel()
    {

      

        $this->load->vars($data);


        ##cargamos el index
        $this->load->view("header_view");
        $this->load->view("sidebar_view");
        $this->load->view("index_view");
        $this->load->view("footer_view");

    }



}

/* End of file panel.php */
/* @autor: Rommel Richard Mercado Rodriguez */
/* Location: ./application/modules/personal/controllers/panel.php */