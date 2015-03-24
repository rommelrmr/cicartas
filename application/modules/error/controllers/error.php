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
class error extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

    }



    public function index()
    {

        $this->error404();

    }



    public function error404()
    {
        echo "<script>location.href='" . BASE_URL . "'</script>";

    }



    public function error_modal()
    {
        $this->load->view("error_modal_view");

    }



    public function error_form()
    {
        $this->load->view("sidebar_view");
        $this->load->view("error_form_view");

    }



}

/* End of file error.php */
/* @autor: Rommel Richard Mercado Rodriguez */
/* Location: ./application/modules/error/controllers/error.php */
