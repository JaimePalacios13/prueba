<?php

class TipoClaseModel extends CI_Model{

    function listaClases(){
        return $this->db->query('
            SELECT c.*, tc.tipo_clase, u.nombres, u.apellidos,u.estado
            FROM clases as c
            INNER JOIN tipo_clase as tc 
            ON c.id_tipo_clase = tc.id_tipo_clase
            INNER JOIN usuarios as u 
            ON c.id_usuario = u.id_usuario
        ')->result_array();
    }


    function tiposClases(){
        return $this->db->query('
            Select * from tipo_clase
        ')->result_array();
    }

    function nuevaClase($data){
        return $this->db->query('
            INSERT INTO clases( 
                cantidad, 
                monto_pagar, 
                fecha_pagar, 
                comentarios, 
                estadoPago, 
                id_tipo_clase, 
                id_usuario) 
                VALUES (
                    '.$data['cantidad'].',
                    '.$data['montoapagar'].',
                    "'.$data['fechapagar'].'",
                    "'.$data['comentario'].'",
                    "'.$data['estadoPago'].'",
                    '.$data['tipoclase'].',
                    '.$data['aignadoA'].'
                )
        ');
    }

    function editarClase($data){
        return $this->db->query('
            UPDATE clases SET 
            cantidad='.$data['cantidad'].',
            monto_pagar='.$data['montoapagar'].',
            fecha_pagar="'.$data['fechapagar'].'",
            comentarios="'.$data['comentario'].'",
            estadoPago="'.$data['estadoPago'].'",
            id_tipo_clase='.$data['tipoclase'].',
            id_usuario= '.$data['aignadoA'].'
            WHERE id_clase - '.$data['idClase'].'
        ');
    }

    function borrarClase($id){
        return $this->db->query('
            DELETE FROM clases
            WHERE id_clase - '.$id.'
        ');
    }
}