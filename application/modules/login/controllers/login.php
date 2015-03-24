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
class login extends CI_Controller
{

    public function __construct()
    {

        parent::__construct();

        $this->load->model("usuario_model");

    }



    public function index()
    {

        //$this->load->view("index_view");

        $username = $this->input->post("username_id");
        $password = $this->input->post("password_pwd");

        //si es enviado desde el form
        if ($username)
        {
            ##1. valida existe usuario
            $iExisteUsuario = $this->usuario_model->ValidaUsuario($username);

            ##2. exito.
            if ($iExisteUsuario)
            {
                ##2.1 valida password
                $iUsuarioValido = $this->usuario_model->ValidaUsuarioXPassw($username);

                ##2.1.1 exito
                if ($iUsuarioValido)
                {
                    ##2.1.1.1 obtener credenciales
                    $oUsuario = $this->usuario_model->ValidaUsuarioXPassw($username);

                    $newdata = array(
                        'correo'   => $oUsuario->email,
                        'nomUsu'      => $oUsuario->nomUsuario,
                        'usuRol' => $oUsuario->codRol,
                        'ultAcc'  => $oUsuario->ultimoAcceso,
                        'usuEst'  => $oUsuario->estado,
                        'itemSession'     => $oUsuario->item,
                        'codUsuario'     => $oUsuario->codUsuario,
                        'sessionId'     => md5(rand())
                    );

                    $this->session->set_userdata($newdata);

                    redirect(BASE_URL . 'panel');
                }
                else
                {
                    ##2.1.2 error de password
                    // Carga las variables para la vista
                    $data['error']     = ERROR_PASSWORD;
                    $data['error_msg'] = ERROR_PASSWORD_MSG;
                    $this->load->vars($data);
                    $this->load->view("index_view");
                }
            }
            else
            {
                ##3. error no existe usuario
                // Carga las variables para la vista
                $data['error']     = ERROR_USUARIO;
                $data['error_msg'] = ERROR_USUARIO_MSG;
                $this->load->vars($data);
                $this->load->view("index_view");
            }
        }
        else
        {
            $this->load->view("index_view");
        }

    }



    public function logout()
    {
        redirect(BASE_URL . 'login');
        $this->session->sess_destroy();

    }



}

/* End of file personal_movimiento.php */
/* @autor: Rommel Richard Mercado Rodriguez */
/* Location: ./application/modules/personal/controllers/personal_movimiento.php */