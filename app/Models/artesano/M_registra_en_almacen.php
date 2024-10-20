<?php namespace App\Models\artesano;

use CodeIgniter\Model;

class M_registra_en_almacen extends Model
{
    protected $table = 'inventario_almacenes';
    protected $primaryKey = 'id_inventario';
    protected $useTimestamps = true;       // Activa el manejo de timestamps
    protected $useSoftDeletes = true;      // Activa el manejo de eliminación lógica
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at'; // Campo para eliminación lógica
    protected $allowedFields = ['id_producto', 'id_almacen','cantidad','id_artesano'];


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
