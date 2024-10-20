<?php namespace App\Controllers;

use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function artesano()
    {
        return view('artesano/artesano');
    }

    public function cliente()
    {
        return view('cliente/cliente');
    }

    public function repartidor()
    {
        return view('delivery/delivery');
    }

    public function administrador()
    {
        return view('administrador/administrador');
    }
}
