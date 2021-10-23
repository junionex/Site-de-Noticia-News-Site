<?php

namespace App\Controllers;
class Pesquisas extends BaseController { 
   
public function pesquisarNoticia($id = null){  #chama o model 
$noticiasModel = new \App\Models\NoticiaModel();
$categoriasModel= new \App\Models\CategoriaModel();


$obj2 = $categoriasModel->findAll();#busca aquela noticia no bd
$obj = $noticiasModel->find($id);#busca aquela noticia no bd

    if (isset($_SESSION["_ci_old_input"])){
        #recupera dados que foram submetidos
        $arr = ['dados' => $_SESSION["_ci_old_input"]["post"]];
        $arr += ['categorias' => $obj2];
    } else {
        $arr = ['dados' => $obj];
        $arr += ['categorias' => $obj2];

    }
 
      #busca a lista de todas as noticias
    $arr['noticia'] = $noticiasModel->noticiasPublicadasP($this->request->getGet(null));
    //dd($this->request->getGet(null));
    $arr['pager'] = $noticiasModel->pager;
    #chama a view
   return view('pesquisar_view',$arr); 

   }
}