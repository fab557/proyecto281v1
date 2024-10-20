<?php namespace App\Models;

use CodeIgniter\Model;

class M_almacen extends Model
{
    protected $table = 'almacen2';  // Cambia el nombre de la tabla
    protected $primaryKey = 'id';
    protected $useTimestamps = true; // Activa el manejo de timestamps
    protected $allowedFields = ['nombre', 'direccion', 'latitud', 'longitud', 'telefono', 'descripcion'];

    // Indicar que el modelo no utiliza validación
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = true;

    // Otras configuraciones adicionales
    protected $useAutoIncrement = true; 
    protected $returnType = 'array'; // Puedes usar 'object' si lo prefieres
}
