<?php

namespace App\Controllers\administrador; // Cambia esto para reflejar la nueva ubicación

use App\Models\M_almacen;
use CodeIgniter\Controller;

class C_almacen extends Controller
{
    protected $almacenModel;

    public function __construct()
    {
        $this->almacenModel = new M_almacen();
    }

    public function index()
    {
        $data['almacenes'] = $this->almacenModel->findAll();
        return view('administrador/ver_almacen', $data);
    }

    public function anadirAlmacen()
    {
        return view('administrador/anadir_almacen');
    }

    public function guardar_almacen()
    {
        $data = $this->request->getPost();

        if ($this->almacenModel->insert($data)) {
            return redirect()->to(site_url('/administrador/ver_almacen'))->with('success', 'Almacén añadido correctamente.');
        } else {
            return redirect()->back()->with('errors', $this->almacenModel->errors());
        }
    }

    public function delete($id)
    {
        $this->almacenModel->delete($id);
        return redirect()->to(site_url('/administrador/ver_almacen'))->with('success', 'Almacén eliminado correctamente.');
    }

    public function editar($id)
    {
        $data['almacen'] = $this->almacenModel->find($id);
        return view('administrador/editar_almacen', $data);
    }

    public function actualizar($id)
    {
        $data = $this->request->getPost();

        if ($this->almacenModel->update($id, $data)) {
            return redirect()->to(site_url('/administrador/ver_almacen'))->with('success', 'Almacén actualizado correctamente.');
        } else {
            return redirect()->back()->with('errors', $this->almacenModel->errors());
        }
    }
}
