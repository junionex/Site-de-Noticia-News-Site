<?php

namespace App\Controllers;

class Home extends BaseController
{

   public function index()
   {  #chama a view 
      $noticia = new \App\Models\NoticiaModel();
      $v = $noticia->noticiasPublicadas();
      $arr['noticia'] =  $v;
      $arr['pager'] = $noticia->pager;
      return view('index_view', $arr);
   }

   public function telaLogin()
   {
      return view('login_view');
   }

   public function logar(){
      $usuariosModel = new \App\Models\UsuarioModel();
      $categoriaModel = new \App\Models\CategoriaModel();
      $dados = $usuariosModel->logar($this->request->getPost(null, FILTER_SANITIZE_STRING)); #busca aquele usuario 
      if ($dados != null) {
         $_SESSION["user"] = [];
         $_SESSION["user"]["id"] = $dados["id"];
         $_SESSION["user"]["nome"] = $dados["nome"];
         $_SESSION["user"]["email"] = $dados["email"];
         $_SESSION["user"]["nivel"] = $dados["nivel"];
         if ($_SESSION["user"]["nivel"] >= NIVEL_ADMIN) {
            return redirect()->to(site_url("noticias"));
         }
         if ($_SESSION["user"]["nivel"] == NIVEL_JORNALISTA) {
            return redirect()->to(site_url("jornalistas"));
         }
         #index assinate 
         if ($_SESSION["user"]["nivel"] == NIVEL_ASSINANTE) {
            return redirect()->to(site_url("noticias/assinante"));
         }
         } else {
            $this->session->setFlashdata('erro', 'Login ou senha inválida.');
            return redirect()->to(site_url("home/telaLogin"));
         }
      
   }

   public function logout()
   {
      session_destroy();
      return redirect()->to(site_url("home"));
   }
   public function abrirNoticia($id = null)
   {
      $noticia = new \App\Models\NoticiaModel();
      $v = $noticia->find($id);
      $arr = ['noticia' => $v];
      return view('noticia_view', $arr);
   }
   public function categoria_busca_publicacao_view($id = null)
   {
      $categoriasModel = new \App\Models\CategoriaModel();
      $noticia = new \App\Models\NoticiaModel();
      $v = $noticia->buscarTodasANoticiaPorCategoria($id);
      $arr['noticia'] =  $v;
      $arr['pager'] = $noticia->pager;
      $arr['listagem'] = $categoriasModel->receberTodos($this->request->getGet(null));;
      $arr['pager'] = $noticia->pager;
      return view("categoria_busca_publicacao_view", $arr);
   }
   public function sobrenos(){
      return view("sobrenos_view");
   }
   public function contato(){
      return view("contato_view");
   }
}
