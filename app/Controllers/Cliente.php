<?php

namespace App\Controllers;
use App\Models\M_productos;
use App\Models\M_carrito_persona;

class Cliente extends BaseController
{   
    public function __construct(){
        $this->mproductos = new M_productos();  // Modelo para interactuar con la tabla de almacén
        $this->mcarrito_persona = new M_carrito_persona();
        $this->db = \Config\Database::connect();
    }
    public function index()
    {
        $data['title'] = 'Página del Cliente';
        return view('cliente/index', $data);
    }
    
    public function verCatalogo()
    {
        
        $query =  $this->db->query("SELECT p.id,p.nombre,p.descripcion, p.precio,p.urlimg,c.nombre as categoria, SUM(ia.cantidad)as cantidad from categoria c, inventario_almacenes ia, productos p where p.id = ia.id_producto 
        and c.id = p.id_categoria 
        GROUP BY p.nombre;");
        $resultado = $query ->getResultArray();
        
        //$resultado = $query ->getResultArray();

        //$resultado = $this->mproductos->findAll(); // Obtener todos los registros de almacén

        
        $data = ['title' => 'Ver Catálogo de Productos', 'productos' => $resultado];

        return view('cliente/ver_catalogo', $data);
    }


    public function verCarrito()
    {   
        $id_usuario=session()->get('usuario_id');
       
        $query = $this->db->query("select p.id, us.nombre,p.precio as precio_unitario,p.nombre,sum(cantidad) as cantidad,sum(costo) as costo 
        from carrito_persona cp, usuarios5 us,productos p 
        where cp.id_cliente = $id_usuario
        and us.id = cp.id_cliente 
        and p.id = cp.id_producto
        and cp.deleted_at is null
        group by p.nombre ");
        $resultado = $query ->getResultArray();

        $data = [ 'productos' => $resultado];
        // Aquí deberías cargar los datos del carrito desde la sesión o base de datos
        
        
        return view('cliente/ver_carrito', $data);
    }
    public function agregarCarrito($id_producto)
    {   
       
        $id_usuario=session()->get('usuario_id');
        $db = \Config\Database::connect();
        $query = $db->query("SELECT precio from productos where id = $id_producto");

        $resultado = $query ->getResultArray();
        $producto = $resultado[0]; // Acceder al primer (y único) resultado
        $costo = $producto['precio'];
        // Datos a insertar (puedes obtenerlos de una solicitud POST)
        $data = [
            'id_cliente' => $id_usuario, // id del cliente
            'id_producto' => $id_producto, // id del producto
            'cantidad' => '1', // cantidad del producto
            'costo' => $costo // costo del producto
        ];

        // Realizar el INSERT
        $this->mcarrito_persona->insert($data);
        //$query = $db->table('carrito_persona')->insert($data);
        
        return redirect()->to('/cliente/ver_carrito');
    }
    public function delete($id) {
        $this->mcarrito_persona->delete($id); // Elimina la categoría usando el modelo
        return redirect()->to(site_url('/cliente/ver_carrito')); // Redirige a la lista de categorías  
          }
    public function historialCompras()
    {
        // Aquí deberías cargar el historial de compras del cliente desde la base de datos
        $data['historial'] = $this->getHistorialCompras(); // Método ficticio para obtener el historial
        $data['title'] = 'Historial de Compras';
        return view('cliente/historial_compras', $data);
    }

    // Métodos ficticios para ilustrar la lógica
    private function getCarrito()
    {
        // Lógica para obtener los productos en el carrito (por ejemplo, de la sesión)
        return [];
    }

    private function calcularTotal($carrito)
    {
        // Lógica para calcular el total del carrito
        return 0;
    }

    private function getHistorialCompras()
    {
        // Lógica para obtener el historial de compras del cliente
        return [];
    }
}
