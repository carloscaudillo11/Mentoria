<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'Usuario';
    protected $primaryKey = 'Id';
    protected $allowedFields = ['Pass', 'Nombre', 'ApellidoPaterno', 'Curp', 'MunicipioOrigen', 'Genero', 'Telefono', 'FechaCaptura', 
    'FechaModificacion', 'Rol', 'Estatus', 'FechaNacimeinto', 'ApellidoMaterno', 'Email'];

    public function getUserByEmail($email)
    {
        return $this->where('Email', $email)->first();
    }

    public function CreateUser($data)
    {
        return $this->insert($data);
    }
}
?>