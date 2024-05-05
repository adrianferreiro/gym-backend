<?php

namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\M_TipoContacto;

class C_TipoContacto extends ResourceController
{
    use ResponseTrait;
    // Lectura de todos los tipos de contacto
    public function index()
    {
        $model      = new M_TipoContacto();
        $data       = $model->findAll();
        return $this->respond($data, 200);
    }

    // Lectura de un tipo de contacto por id
    public function show($id = null)
    {
        $model      = new M_TipoContacto();
        $data       = $model->getWhere(['id_tipoContacto' => $id])->getResult();
        if($data){
            return $this->respond($data, 200);
        }else{
            return $this->failNotFound('No existe ese tipo de contacto'.$id);
        }
    }
 
    // Creacion de un tipo de contacto
    public function create()
    {
        $model          = new M_TipoContacto();
        
        $descripcion    = $this->request->getVar('descripcion');
        $result         = $model->AgregarTipoContacto($descripcion);

        if ($result['codigo'] == '1') {
            return $this->respondCreated(['message' => $result['mensaje']], 201);
        } else {
            return $this->fail($result['mensaje']);
        }

       
    
    }

   
}