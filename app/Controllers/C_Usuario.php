<?php

namespace App\Controllers;
 
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\M_Usuario;

class C_Usuario extends ResourceController
{
    use ResponseTrait;
    // Lectura de todos los usuarios
    public function index()
    {
        $model      = new M_Usuario();
        $data       = $model->findAll();
        return $this->respond($data, 200);
    }
   
    // Lectura de un usuario por id
    public function show($id = null)
    {
        $model      = new M_Usuario();
        $data       = $model->getWhere(['id_usuario' => $id])->getResult();
        if($data){
            return $this->respond($data, 200);
        }else{
            return $this->failNotFound('No existe el usuario con id '.$id);
        }
    }
 
      // Alta de un usuario
    public function create()
    {
        $model          = new M_Usuario();
        $nombre         = $this->request->getPost('nombre');
        $apellido       = $this->request->getPost('apellido');
        $sexo           = $this->request->getPost('sexo');
        $estadoCivil    = $this->request->getPost('estadoCivil');
        $direccion      = $this->request->getPost('direccion');
        $usuario        = $this->request->getPost('usuario');
        $clave          = $this->request->getPost('clave');

        $result     = $model->AgregarUsuario( $nombre, $apellido, $sexo, $estadoCivil, $direccion, $usuario, $clave);

        if ($result['codigo'] == '1') {
            return $this->respondCreated(['message' => $result['mensaje']], 201);
        } else {
            return $this->fail($result['mensaje']);
        }
    
    }
}