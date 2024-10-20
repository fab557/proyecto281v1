<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class RegistroController extends BaseController
{
    public function index()
    {
        // Muestra la vista de registro con Bootstrap
        return view('Registro');
    }
    public function registrar()
    {
        $usuarioModel = new UsuarioModel();
        
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'correo' => $this->request->getPost('correo'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'rol' => $this->request->getPost('rol')  // 'artesano', 'cliente', 'repartidor'
        ];
        
        $usuarioModel->save($data);

        // Redirige al login después del registro
        return redirect()->to(site_url('login'));
    }
}
