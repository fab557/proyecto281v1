<?php
namespace App\Controllers\artesano;
use App\Controllers\BaseController;

use App\Models\Artesano\M_registra_en_almacen; // Asegúrate de tener este modelo creado

class C_registrar_en_almacen extends BaseController {
    private $modelregistra;

    public function __construct(){
        $this->modelregistra = new M_registra_en_almacen();  // Modelo para interactuar con la tabla de almacén
    }

    public function ingresa($id_producto,$id_almacen) { 
        
        $cantidad = $this->request->getGet('cantidad');
        $accion = $this->request->getGet('accion');
        $id_usuario = session()->get('usuario_id');
       

        if ($accion == 'anadir') {
            $data = [
                'id_producto' => $id_producto,
                'id_almacen' => $id_almacen,
                'cantidad' => $cantidad,   // Almacena la latitud
                'id_artesano' => $id_usuario
            ];
        } elseif ($accion == 'reducir') {
            $data = [
                'id_producto' => $id_producto,
                'id_almacen' => $id_almacen,
                'cantidad' => -$cantidad,   // Almacena la latitud
                'id_artesano' => $id_usuario
            ];
        }
    
        // Guardar el almacén en la base de datos
        $this->modelregistra->insert($data);
    
        // Redirigir a la vista de almacenes o a donde desees
        return redirect()->to(site_url('artesano/ver_productos'));
    }

    
}
?>
