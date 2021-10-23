<?php

namespace App\Controllers;
class Jornalistas extends BaseController { 
	/** 
 * Verifica se está logado 
 */ 
public function _remap($method, ...$params) { 
	if (isset($_SESSION["user"]) == false){ 
	return redirect()->to(site_url("home")); 
	} 
	//caso esteja, chama o metodo 
	return $this->$method(...$params); 
   }
   

   public function index($id = null){  #chama o model 
	$jornalistasModel = new \App\Models\JornalistaModel();
	$categoriasModel= new \App\Models\CategoriaModel();
	if ($_SESSION["user"]["nivel"] < NIVEL_JORNALISTA) {
		return redirect()->to(site_url("home"));
	}
	
	
	
	$obj2 = $categoriasModel->findAll();#busca aquela noticia no bd
	$obj = $jornalistasModel->find($id);#busca aquela noticia no bd

		if (isset($_SESSION["_ci_old_input"])){
			#recupera dados que foram submetidos
			$arr = ['dados' => $_SESSION["_ci_old_input"]["post"]];
			$arr += ['categorias' => $obj2];
		} else {
			$arr = ['dados' => $obj];
			$arr += ['categorias' => $obj2];
		}
	 
	  	#busca a lista de todas as noticias
		$arr['listagem'] = $jornalistasModel->cadNotJornalista($this->request->getGet(null));
		//dd($this->request->getGet(null));
		$arr['pager'] = $jornalistasModel->pager;
		#chama a view
	   return view('JornalistaCadastro_view',$arr); 

	   }
	  
   public function salvar(){ 
	   	  #regras de validacao 
	  $this->validation->setRules([ 
		'nomeAutor' => ['label'=>'Nome autor', 'rules' =>"required"], 
		'tituloP' => ['label'=>'Título padrão', 'rules' =>"required"],
		'subtitulo' => ['label'=>'Subtitulo', 'rules' =>"required"],
		'idCategoria' => ['label'=>'Categoria', 'rules' =>"required"],
		'dataEnvio' => ['label'=>'Data', 'rules' =>"required"],
		'tagsDesc' => ['label'=>'Tags de Descrição', 'rules' =>"required"],
		'texto' => ['label'=>'Texto', 'rules' =>"required"],

	
	  ], 
	  #mensagens personalizadas 
	  [ 
	 ]);
    if ($this->validation->run($_POST)){ 
		$post = $this->request->getPost(null,FILTER_SANITIZE_STRING); 
		$post['texto'] = $_POST['texto'];
	#chama o model 
	$jornalistasModel = new \App\Models\JornalistaModel();  #salva 
	$jornalistasModel->save($post);   
	$id = $jornalistasModel->getInsertID(); 
	$this->session->setFlashdata('success','Registro salvo.');
		return redirect()->to(site_url("jornalistas/index/$id"));
	} else { 
		#a validacao deu errado 
		#devolve para a pagina anterior com o $_POST para a funcao old (fica na sessão)  #e as mensagens de validacao vão através da sessão 
		return redirect()->back()->withInput()->with('errors', $this->validation->getErrors()); 
	 } 
	   }


    public function deletar($id){ 
	#chama o model 
	$jornalistasModel = new \App\Models\JornalistaModel();  #deleta 
	$jornalistasModel->delete($id); 
	return redirect()->to(site_url("jornalistas/index"));
 }
    }