<?php

namespace App\Controllers;
class Usuarios extends BaseController { 
   
 public function index($id = null){  #chama o model 
 $usuariosModel = new \App\Models\UsuarioModel(); 
 $obj = $usuariosModel->find($id);#busca aquele usuario 
 if (isset($_SESSION["_ci_old_input"])){ 
	#recupera dados que foram submetidos 
	$arr = ['dados' => $_SESSION["_ci_old_input"]["post"]];
  } else { 
	$arr = ['dados' => $obj]; 
	} 
	$arr['niveis'] = $usuariosModel->niveis; 
	#chama a view 
	return view('cadastro_view',$arr); 
	}

 

 public function salvar(){ 
	  #regras de validacao 
	  $this->validation->setRules([ 
		'nome'=>['label'=>'Nome', 'rules' =>"required"],
		'email' => ['label'=>'E-mail', 'rules' =>"required|valid_email|is_unique[usuarios.email]"], 
		'senha' => ['label'=>'Senha','rules' =>'required|senhaLetrasNumeros|min_length[6]'], 
		'senhaConfirm' => ['label'=>'Confirmação da senha', 'rules' =>'required_with[senha]|matches[senha]'],
		'sexo' => ['label'=>'sexo', 'rules' =>"required"],
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
		 $path = 'fotos/'; 
		 $file->move(ROOTPATH."public/".$path); 
		 $post['foto'] = $path.$file->getName(); 
		} 
		#chama o model 
		$usuariosModel = new \App\Models\UsuarioModel(); #salva 
		$usuariosModel->save($post); 
		$id = $usuariosModel->getInsertID(); 
			$this->session->setFlashdata('success','Registro salvo. Aguarde Aprovação de Assinatura');
			return redirect()->to(site_url("usuarios/index/$id"));
		} else { 
			#a validacao deu errado 
			#devolve para a pagina anterior com o $_POST para a funcao old (fica na sessão)  #e as mensagens de validacao vão através da sessão 
			return redirect()->back()->withInput()->with('errors', $this->validation->getErrors()); 
		 } 
		   }
		   
	
		}
