<?php
namespace App\Controllers\artesano;
use App\Controllers\BaseController;

use CodeIgniter\Controller;
use App\Models\M_categoria; 

class C_categoria extends BaseController {
    private $mcategoria;

    public function __construct(){
        $this->mcategoria = new M_categoria();  // Corrige aquí
    }

    public function index() {    
        $resultado = $this->mcategoria->findAll(); // Usa $this->mcategoria

        $data = ['title' => 'Catalogo de categorias', 'categorias' => $resultado];

        return view('artesano/categoria', $data);
    }
    public function delete($id) {
        $this->mcategoria->delete($id); // Elimina la categoría usando el modelo
        return redirect()->to(site_url('artesano/categoria')); // Redirige a la lista de categorías  
          }
    public function anadirCategoria(){
        return view('artesano/anadir_categoria');
    }
    public function guardar_categoria() {
        // Obtener los datos del formulario
        $nombre = $this->request->getPost('nombre'); // Obtiene el nombre de la categoría
        $descripcion = $this->request->getPost('descripcion'); // Si lo tienes en tu formulario

        // Crear un nuevo arreglo de datos para insertar
        $data = [
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            // Añadir más campos según sea necesario
        ];

        // Guardar la categoría en la base de datos
        $this->mcategoria->insert($data);

        // Redirigir a la vista de categorías o a donde desees
        return redirect()->to(site_url('artesano/categoria'));
    }
    public function editar($id) {
        $categoria = $this->mcategoria->find($id); // Busca la categoría por ID
        if (!$categoria) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('No se encontró la categoría con ID: ' . $id);
        }
    
        $data = [
            'title' => 'Editar categoría',
            'categoria' => $categoria,
        ];
    
        return
         view('editar_categoria', $data); // Carga la vista de edición
    }
    public function actualizar($id) {
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
        ];
    
        $this->mcategoria->update($id, $data); // Actualiza la categoría en la base de datos
        return redirect()->to(site_url('artesano/categoria'));
    }
    
}
?>
