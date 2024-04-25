<?php
namespace App\Models;

use CodeIgniter\Model;

class M_Usuario extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey       = 'id_usuario';
    protected $allowedFields    = ['usuario','id_persona','clave','fecha_alta','activo'];
 
    public function AgregarUsuario($nombre, $apellido, $sexo, $estadoCivil, $direccion, $usuario, $clave)
    {
        $query = "CALL appedirn_gimnasio.Proc_AgregarUsuario(?,?,?,?,?,?,?)";
        $result = $this->db->query($query, [$nombre, $apellido, $sexo, $estadoCivil, $direccion, $usuario, $clave])->getRowArray();

        return $result;
    }

}