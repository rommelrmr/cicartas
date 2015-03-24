<?php

/**
 *  Sitio Class
 *  @package Caral
 *  @subpackage Models
 *  @category Models 
 *  @author Rommel Mercado 
 *  @version 1.0
 *  @copyright (c) 2013, Rommel Mercado
 */
class usuario_model extends MY_Model {

    public function __construct() {

        parent::__construct();

        $this->sTable = SCHEMA_SEGURIDAD . "usuario";

        $this->sVista = SCHEMA_SEGURIDAD . "v_usuario";

        $this->sPrimaryKey = "usuario_id";
    }

    public function ValidaUsuarioXPassw($user) {

        $sql = "SELECT U.codUsuario,U.nomUsuario,U.codRol,U.ultimoAcceso,U.estado,
                concat(RU.item1,RU.item2,RU.item3) as item, U.uid,U.flag,U.email
                FROM usuario U,rol_usuario RU where (U.codUsuario=RU.codUsuario) 
                and U.codUsuario='$user' and U.estado=1 ";
        $query = $this->db->query($sql);
        log_message("error",$this->db->last_query());
        return $query->row();
    }

    public function ValidaUsuario($user) {

        $sql = "SELECT U.codUsuario,U.nomUsuario,U.codRol,U.ultimoAcceso,U.estado,concat(RU.item1,RU.item2,RU.item3) as item, U.uid,U.flag,U.email
                FROM usuario U,rol_usuario RU where (U.codUsuario=RU.codUsuario) and U.codUsuario='$user'";
        $query = $this->db->query($sql);
        log_message("error",$this->db->last_query());
        return $query->row();
    }

    public function ValidaUsuarioActivo($user) {

        $sql = "SELECT U.codUsuario,U.nomUsuario,U.codRol,U.ultimoAcceso,U.estado,
                concat(RU.item1,RU.item2,RU.item3) as item, U.uid,U.flag,U.email
                FROM usuario U,rol_usuario RU where (U.codUsuario=RU.codUsuario)
                and U.codUsuario='$user' and U.estado=1";
        $query = $this->db->query($sql);
        log_message("error",$this->db->last_query());
        return $query->row();
    }

    public function insertUsuario($codUsuario, $nomUsuario, $uid, $sinCorreo) {

        $insert = array(
            'codUsuario' => trim($codUsuario),
            'nomUsuario' => trim($nomUsuario),
            'codRol' => "3",
            'uid' => trim($uid),
            'email' => $sinCorreo,
        );

        $this->db->insert("usuario", $insert);
        log_message("error",$this->db->last_query());
    }

    public function buscarUserxUser($valor) {

        $sql = "SELECT count(*) as total FROM usuario where usuario='" . $valor . "'";
        $query = $this->db->query($sql);
        log_message("error",$this->db->last_query());
        return $query->row("total");
    }

    public function getUsuario() {

        $sql = "SELECT cod,usuario,trabajador FROM usuario order by fecha desc";
        $query = $this->db->query($sql);
        log_message("error",$this->db->last_query());
        return $query->result();
    }

    public function getUsuarioxRol() {

        $sql = "SELECT u.codUsuario,u.nomUsuario,r.CodRol,u.ultimoAcceso,u.estado,ru.item1,ru.item2,ru.item3,u.uid,u.flag,u.email FROM usuario u,rol r,rol_usuario ru where (u.codRol=r.CodRol) and (u.codUsuario=ru.codUsuario)  order by u.estado";
        $query = $this->db->query($sql);
        log_message("error",$this->db->last_query());
        return $query->result();
    }

    public function updateAccesoUserFecha($user) {

        $sql = "update usuario set ultimoAcceso=current_timestamp() where codUsuario='" . $user . "'";
        $query = $this->db->query($sql);
        log_message("error",$this->db->last_query());
        return $query;
    }

}
