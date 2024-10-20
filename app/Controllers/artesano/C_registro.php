<?php 
namespace App\Controllers\artesano;
use App\Controllers\BaseController;

use CodeIgniter\Controller;
use App\Models\M_registro;

class C_registro extends Controller
{
    public function index()
    {
        // Aquí podrías cargar una vista para mostrar el formulario de registro
        return view('front/InicioSesion2');
    }

    public function envio()
    {
        // Obtén los datos enviados por AJAX
        $request = service('request');
        $data = $request->getJSON();

        // Verifica los datos recibidos
        $username = $data->username ?? '';
        $email = $data->email ?? '';
        $password = $data->password ?? '';
        $confirmPassword = $data->confirm_password ?? '';

        // Verifica que las contraseñas coincidan
        if ($password !== $confirmPassword) {
            return $this->response->setJSON(['success' => false, 'message' => 'Las contraseñas no coinciden']);
        }

        // Carga el modelo
        $m_registro = new M_registro();

        // Crea un array con los datos para insertar
        $newUser = [
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT) // Encripta la contraseña
        ];

        // Registra los datos para depuración
        log_message('debug', 'Datos a insertar: ' . print_r($newUser, true));

        // Inserta los datos en la base de datos
        if ($m_registro->insert($newUser)) {
            return $this->response->setJSON(['success' => true, 'message' => 'Usuario registrado exitosamente']);
        } else {
            log_message('error', 'Error al registrar el usuario.');
            return $this->response->setJSON(['success' => false, 'message' => 'Error al registrar el usuario']);
        }
    }
}
