<?php

namespace App\Controllers\administrador;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class C_usuario extends Controller
{
    protected $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    public function index()
    {
        // Obtener todos los usuarios excepto administradores
        $data['usuarios'] = $this->usuarioModel->where('rol !=', 'administrador')->findAll();
        return view('administrador/ver_usuarios', $data);
    }

    public function editar($id)
    {
        $data['usuario'] = $this->usuarioModel->find($id);
        return view('administrador/editar_usuario', $data);
    }

    public function actualizar($id)
    {
        $data = $this->request->getPost();

        // Si se proporciona una nueva contraseña, encriptarla antes de guardar
        if (!empty($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        } else {
            unset($data['password']); // Si la contraseña no se cambió, no actualizarla
        }
        
        if ($this->usuarioModel->update($id, $data)) {
            return redirect()->to(site_url('/administrador/ver_usuarios'))->with('success', 'Usuario actualizado correctamente.');
        } else {
            return redirect()->back()->with('errors', $this->usuarioModel->errors());
        }
    }

    public function delete($id)
    {
        $this->usuarioModel->delete($id);
        return redirect()->to(site_url('/administrador/ver_usuarios'))->with('success', 'Usuario eliminado correctamente.');
    }
}
