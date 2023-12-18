<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\pruebaModel;

class Prueba extends BaseController
{

    //modelo
    protected $pruebaModel;

    //inicio
    public function index(): string
    {
        $this->pruebaModel = new pruebaModel();

        //envia
        $data = [
            'estudiantes' => $this->pruebaModel->getEstudiantes()
        ];

        //cargar vista
        return view('inicio', $data);
    }

    //obtener materia y notas
    public function getMateriaNotas($id)
    {
        $this->pruebaModel = new pruebaModel();

        //envia
        $data = [
            'materias' => $this->pruebaModel->getMaterias(),
            'notas' => $this->pruebaModel->getMateriaNotas($id)
        ];

        //envia
        echo json_encode($data);
    }

    //inner mostar estudiantes, materias y notas
    public function getEstudianteMateriaNotas()
    {
        $this->pruebaModel = new pruebaModel();

        //envia
        $data = [
            'estudiantes' => $this->pruebaModel->getEstudiantes(),
            'materias' => $this->pruebaModel->getMaterias(),
            'notas' => $this->pruebaModel->getNotas()
        ];

        //envia
        echo json_encode($data);
    }

    //notasEstudiantes
    public function notasEstudiantes(): string
    {
        $this->pruebaModel = new pruebaModel();

        //envia
        $data = [
            'estudiantes' => $this->pruebaModel->getEstudiantes()
        ];

        //cargar vista
        return view('notasEstudiantes', $data);
    }
}
