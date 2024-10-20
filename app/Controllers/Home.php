<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        
        return view("InicioSesion");
    }
    public function show($id): string
    {
        $data = ['titulo' => ' Catalogo de productos',
                'id'=>$id];
        //return view("productos/index",$data);
        return view("plantilla/header",$data)
        . view("productos/show",$data) 
        . view("plantilla/footer",['copy'=>'2024']);
        
  
    }
    public function pvista()
    {
        $data = ['titulo' => ' Catalogo de productos'];
        //return view("productos/index",$data);
        return view("plantilla/header",$data)
        . view("productos/index",$data) 
        . view("plantilla/footer",['copy'=>'2024']);
        
    }


}
