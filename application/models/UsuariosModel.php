<?php

class UsuariosModel extends CI_Model{

    function listaUsuarios(){
        return $this->db->query('
            SELECT u.id_usuario, u.nombres,u.apellidos, u.email, u.estado,u.id_rol, r.rol FROM 
            usuarios as u
            inner join roles as r on
            u.id_rol = r.id_rol
        ')->result_array();
    }

    function listaRoles(){
        return $this->db->query('
            SELECT * FROM 
            roles
        ')->result_array();
    }

    function borrarUsuario($idUsuario){
        return $this->db->query(
            '
                DELETE 
                FROM usuarios
                WHERE id_usuario = '.$idUsuario.'
            '
        );
    }

    function nuevoUsuario($data){
        return $this->db->query('
            INSERT INTO usuarios(
                nombres, apellidos, email, contrasenia, estado, id_rol
            ) VALUES (
                "'.$data['nombres'].'","'.$data['apellidos'].'","'.$data['email'].'", "'.$data['pwd'].'","'.$data['estado'].'",'.$data['rol'].'
            )
        ');
    }
    function editarUsuario($data){
        return $this->db->query('
            UPDATE usuarios 
            SET 
                nombres="'.$data['nombres'].'",
                apellidos="'.$data['apellidos'].'",
                email="'.$data['email'].'",
                estado='.$data['estado'].',
                id_rol='.$data['rol'].'
            WHERE id_usuario = '.$data['idusuario'].'
        ');
    }
}