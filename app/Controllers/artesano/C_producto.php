<?php 
namespace App\Controllers\artesano;
use App\Controllers\BaseController;
use App\Models\M_producto;
use App\Models\M_categoria;
use App\Models\M_almacen;

class C_producto extends BaseController
{
    public function __construct(){
        $this->malmacen = new M_almacen();
        $this->db = \Config\Database::connect();
        // Modelo para interactuar con la tabla de almacén
    }
    public function anadir()
    {
        // Cargar el modelo de categorías
        $categoriaModel = new M_categoria();

        // Obtener todas las categorías
        $categorias = $categoriaModel->findAll();

        // Manejo de errores
        if ($categoriaModel->errors()) {
            return redirect()->back()->with('error', 'Error al obtener categorías: ' . implode(", ", $categoriaModel->errors()));
        }

        // Verifica si se obtuvieron categorías
        if (empty($categorias)) {
            return redirect()->back()->with('error', 'No se encontraron categorías.');
        }

        // Pasar las categorías a la vista
        return view('artesano/anadir_productos', ['categorias' => $categorias]);
    }

    
    public function guardar_producto()
    {
        // Verifica si se ha subido un archivo
        $file = $this->request->getFile('imagen');
    
        // Tipos de imagen válidos
        $validMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/webp'];
    
        if ($file && $file->isValid() && in_array($file->getMimeType(), $validMimeTypes)) {
            // Genera un nombre aleatorio para la imagen
            $newName = $file->getRandomName();
            
            // Mover el archivo a la carpeta imgproductos dentro de public
            if ($file->move('imgproductos', $newName)) {
                // La ruta de la imagen que se almacenará en la base de datos
                $imagePath = 'imgproductos/' . $newName;
            } else {
                return redirect()->back()->with('error', 'Error al mover la imagen.');
            }
        } else {
            return redirect()->back()->with('error', 'El archivo subido no es una imagen válida.');
        }
    
        // Datos del producto a guardar
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'urlimg' => $imagePath, // Guardar la ruta de la imagen
            'id_categoria' => $this->request->getPost('id_categoria'),
            'id_artesano' => $this->request->getPost('id_artesano'),  // O usar ID del artesano logueado
        ];
    
        // Verifica que el ID del artesano no sea nulo
        if (is_null($data['id_artesano'])) {
            return redirect()->back()->with('error', 'ID del artesano no puede ser nulo.');
        }
    
        // Insertar el producto
        $model = new M_producto();
        $model->insert($data);
        return redirect()->to('/artesano/ver_productos')->with('success', 'Producto añadido correctamente.');
    }
    
    public function filtrarPorAlmacen()
    {
        $model = new M_producto();
        $almacenModel = new M_almacen();
        $id_almacen = $this->request->getGet('id_almacen');


        $id_artesano=session()->get('usuario_id');
        $query = $this->db->query("select p.id,p.nombre ,p.descripcion,p.precio,p.urlimg , coalesce ((select sum(ia.cantidad) 
									from inventario_almacenes ia 
									where p.id = ia.id_producto and ia.id_almacen =  $id_almacen),0)as stock 
                                    from productos p
                                    where p.id_artesano = $id_artesano
                                    and deleted_at is null ");
        $resultado = $query ->getResultArray();
        $almacenes = $almacenModel->findAll();
        $id_almacen = $this->request->getGet('id_almacen') ?: null;
        $data = [ 'productos' => $resultado,
                    'almacenes' => $almacenes,
                    'id_almacen' => $id_almacen];
        


        
        //$productos = $model->findAll();

        return view('artesano/ver_productos', $data);
    }

    public function verProductos()
    {
        $model = new M_producto();
        $almacenModel = new M_almacen();
        


        $id_artesano=session()->get('usuario_id');
        
        $query = $this->db->query("select p.id,p.nombre ,p.descripcion,p.precio,p.urlimg , coalesce ((select sum(ia.cantidad) 
									from inventario_almacenes ia 
									where p.id = ia.id_producto),0)as stock 
                                    from productos p
                                    where p.id_artesano = $id_artesano
                                    and deleted_at is null ");
        $resultado = $query ->getResultArray();
        $almacenes = $almacenModel->findAll();
        $id_almacen = $this->request->getGet('id_almacen') ?: null;
        $data = [ 'productos' => $resultado,
                    'almacenes' => $almacenes,
                    'id_almacen' => $id_almacen ];
        


        
        //$productos = $model->findAll();

        return view('artesano/ver_productos', $data);
    }

    public function editar($id)
    {
        $model = new M_producto();
        $producto = $model->find($id);

        // Verificar si el producto existe
        if (!$producto) {
            return redirect()->to('/artesano/ver_productos')->with('error', 'Producto no encontrado.');
        }

        // Cargar el modelo de categorías
        $categoriaModel = new M_categoria();
        $categorias = $categoriaModel->findAll();

        // Pasar el producto y las categorías a la vista
        return view('artesano/editar_producto', [
            'producto' => $producto, 
            'categorias' => $categorias
        ]);
    }

    public function actualizar($id)
    {
        // Validar si el producto existe antes de actualizar
        $model = new M_producto();
        $producto = $model->find($id);
        
        // Verifica si se ha subido un archivo
        $file = $this->request->getFile('imagen');
    
        // Tipos de imagen válidos
        $validMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'image/webp'];
    
        if ($file && $file->isValid() && in_array($file->getMimeType(), $validMimeTypes)) {
            // Genera un nombre aleatorio para la imagen
            $newName = $file->getRandomName();

            //eliminar imagen
            $rutaImagen = $producto['urlimg'];
            if (file_exists($rutaImagen)) {
                // Elimina el archivo
                unlink($rutaImagen);
            } else {
                // Manejar el caso en que la imagen no exista
                echo "La imagen no existe o ya ha sido eliminada.";
            }
            
            

            // Mover el archivo a la carpeta imgproductos dentro de public
            if ($file->move('imgproductos', $newName)) {
                // La ruta de la imagen que se almacenará en la base de datos
                $imagePath = 'imgproductos/' . $newName;
            } else {
                return redirect()->back()->with('error', 'Error al mover la imagen.');
            }
        } else {
            return redirect()->back()->with('error', 'El archivo subido no es una imagen válida.');
        }

        
        // Obtener datos del formulario
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'descripcion' => $this->request->getPost('descripcion'),
            'precio' => $this->request->getPost('precio'),
            'urlimg' => $imagePath,
            'id_categoria' => $this->request->getPost('id_categoria'),
        ];

        
        if (!$model->find($id)) {
            return redirect()->to('/artesano/ver_productos')->with('error', 'Producto no encontrado.');
        }

        // Actualizar el producto
        $model->update($id, $data);
        return redirect()->to('/artesano/ver_productos')->with('success', 'Producto actualizado correctamente.');
    }

    public function eliminar($id)
    {
        $model = new M_producto();
        $producto = $model->find($id);

        $rutaImagen = $producto['urlimg'];
            if (file_exists($rutaImagen)) {
                // Elimina el archivo
                unlink($rutaImagen);
            } else {
                // Manejar el caso en que la imagen no exista
                echo "La imagen no existe o ya ha sido eliminada.";
            }
        // Verificar si el producto existe antes de eliminar
        if (!$model->find($id)) {
            return redirect()->to('/artesano/ver_productos')->with('error', 'Producto no encontrado.');
        }

        // Eliminar el producto de la base de datos
        $model->delete($id);
        return redirect()->to('/artesano/ver_productos')->with('success', 'Producto eliminado correctamente.');
    }
}
