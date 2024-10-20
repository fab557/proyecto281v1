<?php
namespace App\Controllers\artesano;
use App\Controllers\BaseController;

use App\Models\M_almacen; // Asegúrate de tener este modelo creado

class C_almacen extends BaseController {
    private $malmacen;

    public function __construct(){
        $this->malmacen = new M_almacen();  // Modelo para interactuar con la tabla de almacén
    }

    public function index() {    
        $resultado = $this->malmacen->findAll(); // Obtener todos los registros de almacén

        $data = ['title' => 'Catálogo de Almacenes', 'almacenes' => $resultado];

        return view('artesano/almacen', $data); // Carga la vista de almacenes
    }

    public function delete($id) {
        $this->malmacen->delete($id); // Elimina el almacén usando el modelo
        return redirect()->to(site_url('artesano/almacen')); // Redirige a la lista de almacenes  
    }

    public function anadirAlmacen() {
        return view('artesano/anadir_almacen'); // Carga la vista para añadir almacén
    }

    public function guardar_almacen() {
        // Obtener los datos del formulario
        $nombre = $this->request->getPost('nombre');
        $direccion = $this->request->getPost('direccion');
        $latitud = $this->request->getPost('latitud');
        $longitud = $this->request->getPost('longitud');
        $telefono = $this->request->getPost('telefono');
        $descripcion = $this->request->getPost('descripcion');
    
        // Crear un nuevo arreglo de datos para insertar
        $data = [
            'nombre' => $nombre,
            'direccion' => $direccion,
            'latitud' => $latitud,   // Almacena la latitud
            'longitud' => $longitud, // Almacena la longitud
            'telefono' => $telefono,
            'descripcion' => $descripcion,
        ];
    
        // Guardar el almacén en la base de datos
        $this->malmacen->insert($data);
    
        // Redirigir a la vista de almacenes o a donde desees
        return redirect()->to(site_url('artesano/almacen'));
    }

    public function editar($id) {
        $almacen = $this->malmacen->find($id); // Busca el almacén por ID
        if (!$almacen) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se encontró el almacén con ID: ' . $id);
        }
    
        $data = [
            'title' => 'Editar Almacén',
            'almacen' => $almacen,
        ];
    
        return view('artesano/editar_almacen', $data); // Carga la vista de edición
    }

    public function actualizar($id) {
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'direccion' => $this->request->getPost('direccion'),
            'latitud' => $this->request->getPost('latitud'), // Almacena la latitud
            'longitud' => $this->request->getPost('longitud'), // Almacena la longitud
            'telefono' => $this->request->getPost('telefono'),
            'descripcion' => $this->request->getPost('descripcion'),
        ];
    
        $this->malmacen->update($id, $data); // Actualiza el almacén en la base de datos
        return redirect()->to(site_url('artesano/almacen')); // Redirige a la lista de almacenes
    }
}
?>
