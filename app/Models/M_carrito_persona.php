<?php namespace App\Models;

use CodeIgniter\Model;

class M_carrito_persona extends Model
{
    protected $table = 'carrito_persona';
    protected $primaryKey = 'id_carrito';
    protected $useTimestamps = true;       // Activa el manejo de timestamps
    protected $useSoftDeletes = true;      // Activa el manejo de eliminación lógica
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at'; // Campo para eliminación lógica
    protected $allowedFields = ['id_cliente', 'id_producto','cantidad','costo'];


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

    
}