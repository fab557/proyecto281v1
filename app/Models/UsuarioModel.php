<?php namespace App\Models;

use CodeIgniter\Model;

class UsuarioModel extends Model
{
    // Nombre de la tabla en la base de datos
    protected $table = 'usuarios5';

    // Clave primaria de la tabla
    protected $primaryKey = 'id';

    // Campos que pueden ser llenados en la base de datos
    protected $allowedFields = ['nombre', 'correo', 'password', 'rol'];

    // Indicar que el modelo no utiliza validación
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = true;

    // Puedes agregar otros métodos según sea necesario
}
