<?php

namespace App\Models;

use CodeIgniter\Model;

class pruebaModel extends Model
{


    function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    //tbl_estudiantes
    public function getEstudiantes()
    {
        $query = $this->db->query("SELECT * FROM tbl_estudiante");
        return $query->getResult();
    }

    //tbl_materias
    public function getMaterias()
    {
        $query = $this->db->query("SELECT * FROM tbl_materia");
        return $query->getResult();
    }

    //tbl_notas
    public function getNotas()
    {
        $query = $this->db->query("SELECT * FROM tbl_nota");
        return $query->getResult();
    }

    //mostrar materia con notas de todos estudiantes
    public function getMateriaNotas()
    {
        $query = $this->db->query("SELECT tbl_materia.mat_nombre, tbl_nota.not_not FROM tbl_materia INNER JOIN tbl_nota ON tbl_materia.mat_id = tbl_nota.mat_id INNER JOIN tbl_estudiante ON tbl_nota.est_id = tbl_estudiante.est_id");
        return $query->getResult();
    }
}
