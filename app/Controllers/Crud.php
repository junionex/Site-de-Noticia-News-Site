<?php

namespace App\Controllers;
class Crud extends BaseController { 
	
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
	$crudModel = new \App\Models\CrudModel(); 
	$obj = $crudModel->find($id);#busca aquele usuario 
	if ($_SESSION["user"]["nivel"] != NIVEL_ADMIN) {
		return redirect()->to(site_url("jornalistas"));
	}
	if (isset($_SESSION["_ci_old_input"])){ 
	   #recupera dados que foram submetidos 
	   $arr = ['dados' => $_SESSION["_ci_old_input"]["post"]];
	 } else { 
	   $arr = ['dados' => $obj]; 
	   } 
	   $arr['listagem'] = $crudModel->filtrar($this->request->getGet(null));
	   $arr['pager'] = $crudModel->pager; 
	   $arr['niveis'] = $crudModel->niveis; 
	    #chama a view 
	   return view('crudUser_view',$arr); 
	   }

	   public function minhaConta()
	   {  #chama o model 
		   $crudModel = new \App\Models\CrudModel();
		   $id = $_SESSION['user']['id'];
		   $obj = $crudModel->find($id); #busca aquele usuario 
		   // dd($_SESSION); 
		   $arr = ['dados' => $obj];
		   // dd($obj);
		   // dd($crudModel-> niveis);
		   #chama a view 
		   return view('editarConta_view', $arr);
	   }
	   public function atualizarConta(){
		   $ignoredId = "";
		   if ($_POST["id"] != "") {
			   $ignoredId = ",usuarios.id," . $this->request->getPost("id");
		   }
		   #regras de validacao 
		   $this->validation->setRules(
			   [
				   'nome' => ['label' => 'Nome', 'rules' => "required"],
				   'email' => ['label' => 'E-mail', 'rules' => "required|valid_email|is_unique[usuarios.email$ignoredId]"],
				   'senha' => ['label' => 'Senha', 'rules' => 'required|senhaLetrasNumeros|min_length[6]'],
				   'senhaConfirm' => ['label' => 'Confirmação da senha', 'rules' => 'required_with[senha]|matches[senha]'],
				   'sexo' => ['label' => 'sexo', 'rules' => "required"],
			   ],
			   #mensagens personalizadas 
			   [
				   'email' => ['is_unique' => 'O e-mail digitado já existe, tente outro.'],
				   'senha' => ['senhaLetrasNumeros' => 'A senha deve conter letras e números']
			   ]
		   );
		   if ($this->validation->run($_POST)) {
			   $post = $this->request->getPost(null, FILTER_SANITIZE_STRING);
			   $crudModel = new \App\Models\CrudModel();
			   $crudModel->save($post);
			   if ($_POST["id"] != "") {
				   $id = $_POST["id"];
			   } else {
				   $id = $crudModel->getInsertID();
			   }
   
			   $this->session->setFlashdata('success', 'Registro salvo.');
			   return redirect()->to(site_url("crud/minhaConta"));
		   } else {
			   #a validacao deu errado 
			   #devolve para a pagina anterior com o $_POST para a funcao old (fica na sessão)  #e as mensagens de validacao vão através da sessão 
			   return redirect()->back()->withInput()->with('errors', $this->validation->getErrors());
		   }
	   }
   
 public function salvar(){ 
	 $ignoredId="";
    if($_POST["id"]!=""){
		$ignoredId=",usuarios.id,".$this->request->getPost("id");


	}
	  #regras de validacao 
	  $this->validation->setRules([ 
		'nome'=>['label'=>'Nome', 'rules' =>"required"],
		'email' => ['label'=>'E-mail', 'rules' =>"required|valid_email|is_unique[usuarios.email$ignoredId]"], 
		'senha' => ['label'=>'Senha','rules' =>'required|senhaLetrasNumeros|min_length[6]'], 
		'senhaConfirm' => ['label'=>'Confirmação da senha', 'rules' =>'required_with[senha]|matches[senha]'],
		'sexo' => ['label'=>'sexo', 'rules' =>"required"],
		'nivel' => ['label'=>'nivel', 'rules' =>"required"],
		'foto' => 'uploaded[foto]|max_size[foto,5120]|ext_in[foto,png,jpg,jpeg]' 
	 ], 
	  #mensagens personalizadas 
	  [ 
	  'email'=> ['is_unique' => 'O e-mail digitado já existe, tente outro.'], 
	  'senha'=>['senhaLetrasNumeros' => 'A senha deve conter letras e números']  ]);
    if ($this->validation->run($_POST)){ 
		$post = $this->request->getPost(null,FILTER_SANITIZE_STRING); 
		#salva o upload 
		if (v($_FILES["foto"],"name") != ""){ 
		 $file = $this->request->getFile('foto'); 
		 $path = 'foto/'; 
		 $file->move(ROOTPATH."public/".$path); 
		 $post['foto'] = $path.$file->getName(); 
		} 
		
		$crudModel = new \App\Models\CrudModel();
		$crudModel->save($post); 
		if($_POST["id"]!=""){
			$id = $_POST["id"];
		}else{
			$id = $crudModel->getInsertID(); 
		}
		
		$this->session->setFlashdata('success','Registro salvo.');
		return redirect()->to(site_url("crud/index/$id"));
	} else { 
		#a validacao deu errado 
		#devolve para a pagina anterior com o $_POST para a funcao old (fica na sessão)  #e as mensagens de validacao vão através da sessão 
		return redirect()->back()->withInput()->with('errors', $this->validation->getErrors()); 
	 } 
	   }
	   public function editarUser(){ 
		$ignoredId="";
	   if($_POST["id"]!=""){
		   $ignoredId=",usuarios.id,".$this->request->getPost("id");
   
   
	   }
		 #regras de validacao 
		 $this->validation->setRules([ 
		   'nome'=>['label'=>'Nome', 'rules' =>"required"],
		   'email' => ['label'=>'E-mail', 'rules' =>"required|valid_email|is_unique[usuarios.email$ignoredId]"], 
		   'senha' => ['label'=>'Senha','rules' =>'required|senhaLetrasNumeros|min_length[6]'], 
		   'senhaConfirm' => ['label'=>'Confirmação da senha', 'rules' =>'required_with[senha]|matches[senha]'],
		   'sexo' => ['label'=>'sexo', 'rules' =>"required"],
		   'nivel' => ['label'=>'nivel', 'rules' =>"required"],
		   'foto' => 'uploaded[foto]|max_size[foto,5120]|ext_in[foto,png,jpg,jpeg]' 
		], 
		 #mensagens personalizadas 
		 [ 
		 'email'=> ['is_unique' => 'O e-mail digitado já existe, tente outro.'], 
		 'senha'=>['senhaLetrasNumeros' => 'A senha deve conter letras e números']  ]);
	   if ($this->validation->run($_POST)){ 
		   $post = $this->request->getPost(null,FILTER_SANITIZE_STRING); 
		   #salva o upload 
		   if (v($_FILES["foto"],"name") != ""){ 
			$file = $this->request->getFile('foto'); 
			$path = 'foto/'; 
			$file->move(ROOTPATH."public/".$path); 
			$post['foto'] = $path.$file->getName(); 
		   } 
		   
		   $crudModel = new \App\Models\CrudModel();
		   $crudModel->save($post); 
		   if($_POST["id"]!=""){
			   $id = $_POST["id"];
		   }else{
			   $id = $crudModel->getInsertID(); 
		   }
		   
		   $this->session->setFlashdata('success','Registro salvo.');
		   return redirect()->to(site_url("crud/index2/$id"));
	   } else { 
		   #a validacao deu errado 
		   #devolve para a pagina anterior com o $_POST para a funcao old (fica na sessão)  #e as mensagens de validacao vão através da sessão 
		   return redirect()->back()->withInput()->with('errors', $this->validation->getErrors()); 
		} 
		  }
	   
public function deletar($id){ 
	#chama o model 
	$crudModel  = new \App\Models\CrudModel();  #deleta 
	$crudModel ->delete($id); 
	return redirect()->to(site_url("Crud/index/")); }
}