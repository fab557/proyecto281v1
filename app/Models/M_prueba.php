<?php namespace App\Models;

use CodeIgniter\Model;

class M_prueba extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'producto1';

    // Clave primaria de la tabla
    protected $primaryKey = 'id_producto';

    // Campos que pueden ser llenados en la base de datos
    protected $allowedFields = ['cantidad','nombre'];

    // Indicar que el modelo no utiliza validación
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = true;

    // Puedes agregar otros métodos según sea necesario

    //mas datos
    //autoincremetar
    protected $useAutoIncrement = true;
    //tipo de retorno
    protected $returnType= 'array';
    //protected $returnType= 'object';
    //si guarda el auto borrado
    protected $useSoftDeletes = false;

    
}
