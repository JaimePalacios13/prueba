<?php

class LoginModel extends CI_Model{

    function verificarUsuario($datos){
        return $this->db->query('
            SELECT * FROM 
            usuarios as u
            inner join roles as r on
            u.id_rol = r.id_rol
            WHERE u.email ="'.$datos['email'].'" 
            AND u.contrasenia ="'.$datos['password'].'"
        ')->result_array();
    }

}