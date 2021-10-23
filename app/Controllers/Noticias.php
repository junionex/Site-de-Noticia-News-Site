<?php

namespace App\Controllers;
class Noticias extends BaseController { 
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
	$noticiasModel = new \App\Models\NoticiaModel();
	$categoriasModel= new \App\Models\CategoriaModel();

	
	//Caso ele não for admin vai envia para a tela de jornalista
	if ($_SESSION["user"]["nivel"] != NIVEL_ADMIN) {
		return redirect()->to(site_url("jornalistas"));
	}
	
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
		$arr['listagem'] = $noticiasModel->filtrar($this->request->getGet(null));
		//dd($this->request->getGet(null));
		$arr['pager'] = $noticiasModel->pager;
		#chama a view
	   return view('administradorCadastro_view',$arr); 

	   }
	   public function indexNoticias($id = null){  #chama o model 
			$noticiasModel = new \App\Models\NoticiaModel(); 
			$obj = $noticiasModel->find($id);#busca aquele usuario 
				if (isset($_SESSION["_ci_old_input"])){ 
					#recupera dados que foram submetidos 
					$arr = ['dados' => $_SESSION["_ci_old_input"]["post"]];
				} else { 
					$arr = ['dados' => $obj]; 
				
				} 
				$arr['listagem'] =$noticiasModel->filtrar($this->request->getGet(null));; 
				$arr['pager'] = $noticiasModel->pager; 
				#chama a view 
			return view('administradorNoticias_view',$arr); 
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
		'publico' => ['label'=>'publico', 'rules' =>"required"], 
		'publicar' => ['label'=>'publicar', 'rules' =>"required"], 
		

	
	  ], 
	  #mensagens personalizadas 
	  [ 
	 ]);
    if ($this->validation->run($_POST)){ 
		$post = $this->request->getPost(null,FILTER_SANITIZE_STRING); 
		$post['texto'] = $_POST['texto'];
	#chama o model 
	$noticiasModel = new \App\Models\NoticiaModel();  #salva 
	$noticiasModel->save($post);   
	$id = $noticiasModel->getInsertID(); 
	$this->session->setFlashdata('success','Registro salvo.');
		return redirect()->to(site_url("noticias/index/$id"));
	} else { 
		#a validacao deu errado 
		#devolve para a pagina anterior com o $_POST para a funcao old (fica na sessão)  #e as mensagens de validacao vão através da sessão 
		return redirect()->back()->withInput()->with('errors', $this->validation->getErrors()); 
	 } 
	   }


    public function deletar($id){ 
	#chama o model 
	$noticiasModel = new \App\Models\NoticiaModel();  #deleta 
	$noticiasModel->delete($id); 
	return redirect()->to(site_url("noticias/indexNoticias")); }


   public function noticiasPublicadas($id = null){  #chama o model 
	$noticiasModel = new \App\Models\NoticiaModel();
	$categoriasModel= new \App\Models\CategoriaModel();
	
	
	$obj2 = $categoriasModel->findAll();#busca aquela noticia no bd
	$obj = $noticiasModel->find($id);#busca aquela noticia no bd

		if (isset($_SESSION["_ci_old_input"])){
			#recupera dados que foram submetidos
			$arr = ['dados' => $_SESSION["_ci_old_input"]["post"]];
		} else {
			$arr = ['dados' => $obj];
			$arr += ['categorias' => $obj2];
		}
	 
	  	#busca a lista de todas as noticias
		$arr['listagem'] = $noticiasModel->noticiasPublicadas($this->request->getGet(null));
		//dd($this->request->getGet(null));
		$arr['pager'] = $noticiasModel->pager;
		#chama a view
	   return view('administradorPublicacao_view',$arr); 

	   }
	   
   public function noticiasPublicadasPublico($id = null){  #chama o model 
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
	   public function deletarPublicacao($id){ 
		#chama o model 
		$noticiasModel = new \App\Models\NoticiaModel();  #deleta 
		$noticiasModel->delete($id); 
		return redirect()->to(site_url("noticias/noticiasPublicadas")); }

		public function abrirNoticia($id = null){


			return view('noticia_view');
		}
		
	
			public function assinante($id = null){  #chama o model 
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
					$arr['noticia'] = $noticiasModel->noticiasPublicadasA($this->request->getGet(null));
					//dd($this->request->getGet(null));
					$arr['pager'] = $noticiasModel->pager;
					#chama a view
				   return view('index_viewTeste',$arr); 
			
		}
	
	}