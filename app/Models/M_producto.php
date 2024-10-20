<?php

namespace App\Models;

use CodeIgniter\Model;

class M_producto extends Model
{
    protected $table = 'productos'; // Nombre de la tabla
    protected $primaryKey = 'id'; // Clave primaria
    protected $allowedFields = ['nombre', 'descripcion', 'precio', 'id_categoria', 'id_artesano', 'urlimg', 'created_at', 'updated_at']; // Campos permitidos para la inserción
}

