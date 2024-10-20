<?php

namespace App\Controllers\administrador;

use App\Models\M_producto;
use CodeIgniter\Controller;

class C_producto extends Controller
{
    protected $productoModel;

    public function __construct()
    {
        $this->productoModel = new M_producto();
    }

    public function index()
    {
        $data['productos'] = $this->productoModel->findAll();
        return view('administrador/ver_productos', $data);
    }

    public function editar($id)
    {
        $data['producto'] = $this->productoModel->find($id);
        return view('administrador/editar_producto', $data);
    }

    public function actualizar($id)
    {
        $data = $this->request->getPost();

        if ($this->productoModel->update($id, $data)) {
            return redirect()->to(site_url('/administrador/ver_productos'))->with('success', 'Producto actualizado correctamente.');
        } else {
            return redirect()->back()->with('errors', $this->productoModel->errors());
        }
    }

    public function delete($id)
    {
        $this->productoModel->delete($id);
        return redirect()->to(site_url('/administrador/ver_productos'))->with('success', 'Producto eliminado correctamente.');
    }
}
