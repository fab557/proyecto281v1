<?php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class LoginController extends BaseController
{
    public function index()
    {
        // Muestra la vista de inicio de sesión con Bootstrap
        return view('InicioSesion');
    }
    public function logout()
    {
        session()->destroy(); // Destruye la sesión
        return redirect()->to(site_url('login')); // Redirige a la página de inicio de sesión
    }

    public function autenticar()
    {
        $usuarioModel = new UsuarioModel();
        $correo = $this->request->getPost('correo');
        $password = $this->request->getPost('password');
       
        // Busca al usuario por su correo
        $usuario = $usuarioModel->where('correo', $correo)->first();
       
        // Verifica la contraseña
        if ($usuario && password_verify($password, $usuario['password'])) {

            session()->set('usuario_id', $usuario['id']);
            session()->set('nombre', $usuario['nombre']);
            session()->set('rol', $usuario['rol']);
            
            // Redirige a los dashboards dependiendo del rol
            switch ($usuario['rol']) {
                case 'artesano':
                    return redirect()->to(site_url('artesano'));
                case 'cliente':
                    return redirect()->to(site_url('cliente'));
                case 'repartidor':
                    return redirect()->to(site_url('repartidor'));
                case 'administrador':
                    return redirect()->to(site_url('administrador'));
                default:
                    return redirect()->to(site_url('login'));
            }
        } else {
            return redirect()->back()->with('error', 'Credenciales incorrectas');
        }
    }
}
