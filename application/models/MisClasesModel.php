<?php

class MisClasesModel extends CI_Model{

    function misClasesList($idUsuario){
        return $this->db->query('
            SELECT c.*, tp.tipo_clase
            FROM clases as c 
            INNER JOIN tipo_clase as tp 
            ON c.id_tipo_clase = tp.id_tipo_clase
            WHERE c.id_usuario = '.$idUsuario.'
        ')->result_array();
    }

    function totalSinPagar($idUsuario){
        return $this->db->query('
            SELECT count(*) as totalSinpagar
            FROM clases as c 
            INNER JOIN tipo_clase as tp 
            ON c.id_tipo_clase = tp.id_tipo_clase
            WHERE c.id_usuario = '.$idUsuario.' AND estadoPago = "Sin Pagar";
        ')->result_array();
    }
    function montoSinPagar($idUsuario){
        return $this->db->query('
            SELECT SUM(monto_pagar) as montoSinpagar
            FROM clases as c 
            INNER JOIN tipo_clase as tp 
            ON c.id_tipo_clase = tp.id_tipo_clase
            WHERE c.id_usuario = '.$idUsuario.' AND estadoPago = "Sin Pagar";
        ')->result_array();
    }
    function totalPagado($idUsuario){
        return $this->db->query('
            SELECT count(*) as totalPagado
            FROM clases as c 
            INNER JOIN tipo_clase as tp 
            ON c.id_tipo_clase = tp.id_tipo_clase
            WHERE c.id_usuario = '.$idUsuario.' AND estadoPago = "Pagado";
        ')->result_array();
    }
    function montoPagado($idUsuario){
        return $this->db->query('
            SELECT SUM(monto_pagar) as montoPagado
            FROM clases as c 
            INNER JOIN tipo_clase as tp 
            ON c.id_tipo_clase = tp.id_tipo_clase
            WHERE c.id_usuario = '.$idUsuario.' AND estadoPago = "Pagado";
        ')->result_array();
    }

    function totalClasesOnline($idUsuario){
        return $this->db->query('
            SELECT count(*) as totalOnline
            FROM clases as c 
            INNER JOIN tipo_clase as tp 
            ON c.id_tipo_clase = tp.id_tipo_clase
            WHERE c.id_usuario = '.$idUsuario.' AND c.id_tipo_clase = 2;
        ')->result_array();
    }
    function totalClasesPresencial($idUsuario){
        return $this->db->query('
            SELECT count(*) as totalPresencial
            FROM clases as c 
            INNER JOIN tipo_clase as tp 
            ON c.id_tipo_clase = tp.id_tipo_clase
            WHERE c.id_usuario = '.$idUsuario.' AND c.id_tipo_clase = 1;
        ')->result_array();
    }

}