<?php

namespace App\Controllers\administrador;

use App\Models\M_categoria;
use CodeIgniter\Controller;

class C_categoria extends Controller
{
    protected $categoriaModel;

    public function __construct()
    {
        $this->categoriaModel = new M_categoria();
    }

    public function index()
    {
        $data['categorias'] = $this->categoriaModel->findAll();
        return view('administrador/ver_categorias', $data);
    }

    public function editar($id)
    {
        $data['categoria'] = $this->categoriaModel->find($id);
        return view('administrador/editar_categoria', $data);
    }

    public function actualizar($id)
    {
        $data = $this->request->getPost();

        if ($this->categoriaModel->update($id, $data)) {
            return redirect()->to(site_url('/administrador/ver_categorias'))->with('success', 'Categoría actualizada correctamente.');
        } else {
            return redirect()->back()->with('errors', $this->categoriaModel->errors());
        }
    }

    public function delete($id)
    {
        $this->categoriaModel->delete($id);
        return redirect()->to(site_url('/administrador/ver_categorias'))->with('success', 'Categoría eliminada correctamente.');
    }
}
