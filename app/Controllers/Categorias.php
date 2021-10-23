<?php

namespace App\Controllers;

class Categorias extends BaseController
{
	/** 
	 * Verifica se está logado 
	 */
	
	
	
	 public function _remap($method, ...$params)
	{
		if (isset($_SESSION["user"]) == false) {
			return redirect()->to(site_url("home"));
		}
		//caso esteja, chama o metodo 
		return $this->$method(...$params);
	}


	public function index($id = null)
	{  #chama o model 
		$categoriasModel = new \App\Models\CategoriaModel();
		$obj = $categoriasModel->find($id); #busca aquele usuario 
		if ($_SESSION["user"]["nivel"] != NIVEL_ADMIN) {
			return redirect()->to(site_url("jornalistas"));
		}
		if (isset($_SESSION["_ci_old_input"])) {
			#recupera dados que foram submetidos 
			$arr = ['dados' => $_SESSION["_ci_old_input"]["post"]];
		} else {
			$arr = ['dados' => $obj];
		}
		$arr['listagem'] = $categoriasModel->filtrar($this->request->getGet(null));;
		$arr['pager'] = $categoriasModel->pager;
		#chama a view 
		return view('categorias_view', $arr);
	}
	public function indexCCategorias($id = null){  #chama o model //cadastro
		$categoriasModel = new \App\Models\CategoriaModel();
		$obj = $categoriasModel->find($id); #busca aquele usuario 
		if ($_SESSION["user"]["nivel"] != NIVEL_ADMIN) {
			return redirect()->to(site_url("jornalistas"));
		}
		if (isset($_SESSION["_ci_old_input"])) {
			#recupera dados que foram submetidos 
			$arr = ['dados' => $_SESSION["_ci_old_input"]["post"]];
		} else {
			$arr = ['dados' => $obj];
		}
		$arr['listagem'] = $categoriasModel->filtrar($this->request->getGet(null));;
		$arr['pager'] = $categoriasModel->pager;
		#chama a view 
		return view('categoriasCadastro_view', $arr);
	}

	public function salvar ($id = null){ //atualizar
		if ($_SESSION["user"]["nivel"] != NIVEL_ADMIN) {
			return redirect()->to(site_url("jornalistas"));
		}
		// dd($id);
		$post = $this->request->getPost(null, FILTER_SANITIZE_STRING);
		
		if($id != null){
			$post["idCategoria"]= $id;
		}
		
		$categoriaModel = new \App\Models\CategoriaModel();
		$categoriaModel->save($post);
		$id = $categoriaModel->getInsertID();

		$this->session->setFlashdata('success', 'Registro salvo.');
		// if ($_POST["id"] != "") {
		// 	$id = $_POST["id"];
		// 	return redirect()->to(site_url("categorias/index/$id"));
		// } else {
			return redirect()->to(site_url("categorias/index"));
		//}
	}


	public function deletar($id)
	{
		if ($_SESSION["user"]["nivel"] != NIVEL_ADMIN) {
			return redirect()->to(site_url("jornalistas"));
		}
		#chama o model 
		$categoriasModel = new \App\Models\CategoriaModel();  #deleta 
		$categoriasModel->delete($id);
		return redirect()->to(site_url("categorias/index/"));
	}
	
}
