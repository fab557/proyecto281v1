<?php

namespace App\Controllers\artesano;
use App\Controllers\BaseController;

class Artesano extends BaseController
{
    public function verProductos()
    {
        $data['title'] = 'Ver Productos';
        return view('artesano/ver_productos', $data);
    }

    public function anadirProductos()
    {
        $data['title'] = 'Añadir Productos';
        return view('artesano/anadir_productos', $data);
    }
    public function anadirAlmacen()
    {
        $data['title'] = 'Añadir almacenes';
        return view('artesano/anadir_almacen', $data);
    }
    public function categoria()
    {
        $data['title'] = 'Categoría';
        return view('artesano/categoria', $data);
    }

    public function almacen()
    {
        $data['title'] = 'Almacén';
        return view('artesano/almacen', $data);
    }

    public function verVentas()
    {
        $data['title'] = 'Ver Ventas';
        return view('artesano/ver_ventas', $data);
    }
}
