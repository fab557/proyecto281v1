<?php
namespace App\Controllers;
use App\Models\M_prueba; 
 class Productos extends BaseController{
    public function index(){

        /*$db = \Config\Database::connect();
        $query = $db->query("SELECT cantidad,nombre from producto1");
        $resultado = $query ->getResult();*/
        //$resultado = $query ->getResultArray();

        $productoModel =new M_prueba();
        $resultado = $productoModel->findAll(); 

        $data = ['title' =>'Catalogo de productos','productos'=>$resultado];

        return view('artesano/ver_productos',$data);
    }
    public function show($id){
        $productoModel =new M_prueba();
        $resultado =$productoModel->find($id);
        $data = ['title' =>'Catalogo de productos','productos'=>$resultado];

        return view('artesano/ver_productos',$data);
    }
    public function transaccion(){
        $data=[
            'cantidad'=>"23",
            'nombre'=> "xd"
        ];
        $productoModel =new M_prueba();
        echo $productoModel->update(4,$data);
        // insertar
        //echo $productoModel->insert($data,false);
        // el ultimo id insertados
        //echo $productoModel->getInsertID();
        //actualizar
        //echo $productoModel->delete(4);
        //borrar los registros de baja
        // echo $productoModel->purgeDeleted();
    }
    
 }
?>