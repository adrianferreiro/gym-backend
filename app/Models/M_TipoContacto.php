<?php
namespace App\Models;

use CodeIgniter\Model;

class M_TipoContacto extends Model
{
    protected $table            = 'tipocontactos';
    protected $primaryKey       = 'id_tipoContacto';
    protected $allowedFields    = ['descripcion','activo'];

    public function AgregarTipoContacto($descripcion)
    {
        $query = "CALL appedirn_gimnasio.Proc_AgregarTipoContacto(?)";
        $result = $this->db->query($query, [$descripcion])->getRowArray();

        return $result;
    }
}

