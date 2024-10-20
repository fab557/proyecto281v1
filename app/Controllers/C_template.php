<?php

namespace App\Controllers;

use App\Models\UsuarioModel;

class C_template extends BaseController
{
    public function index()
    {
        // Supongamos que tienes una sesión iniciada y el ID del usuario está almacenado en la sesión
        $session = session();
        $userId = $session->get('user_id'); // Obtiene el ID del usuario desde la sesión

        // Cargar el modelo de usuario
        $usuarioModel = new UsuarioModel();

        // Obtener los datos del usuario por su ID
        $usuario = $usuarioModel->find($userId);

        // Pasar los datos del usuario a la vista
        $data = [
            'titulo' => 'Página Principal',
            'nombre_usuario' => $usuario['nombre'],
            'tipo_usuario' => $usuario['rol'], // Suponiendo que el campo 'rol' tiene el tipo de usuario
        ];

        return view('pagina_principal', $data);
    }
}
