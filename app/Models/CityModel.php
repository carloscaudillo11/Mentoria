<?php

namespace App\Models;

use CodeIgniter\Model;

class CityModel extends Model
{
    protected $table = 'Municipio';
    protected $primaryKey = 'Id';
    protected $allowedFields =['Id', 'Descripcion'];

    public function getCity()
    {
        return $this->findAll();
    }
}
?>