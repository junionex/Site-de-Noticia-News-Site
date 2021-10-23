<?php include 'head.php'; ?> 
<body>
<div id="logo">
<nav class="navbar navbar-light bg-light">
	<a class="navbar-brand" href="<?=base_url('home')?>">
    <img id="imgLogo" class="img-fluid" alt="Imagemlogo" src= "<?=base_url('img/logo.png')?>">
  </a>
  <div id="minhaConta">
	<div class="dropdown">
		Usuário:<?=$_SESSION['user']['nome']?> 
		</br>
        <button class="dropbtn" style="padding: 10px;">Minha Conta</button>
	    <div class="dropdown-content">
		    <a href='<?=site_url("crud/minhaConta")?>'>Configurações</a>
		    <a href='<?=site_url("home/logout");?>''>Sair</a>
	    </div>
      </div>
</div>
</nav>
</div>
<div id="menu" >
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="<?=base_url('home')?>">Home <span class="sr-only">(Página atual)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('home/sobrenos')?>">Sobre nós</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('home/categoria_busca_publicacao_view')?>">Categoria</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url('home/contato')?>">Contato</a>
      </li>
	  <li class="nav-item">
		<div class="dropdown">
		  <button class="dropbtn">MENU</button>
			<div class="dropdown-content">
				<a href="#">Notícias</a>
				<a href='<?=site_url("crud/index")?>'>Usuários</a>
				<a href='<?=site_url("categorias/index")?>'>Categorias</a>
				<a href='<?=site_url("publicacao/index")?>'>Publicações</a>
			</div>
			</div>
      </li>
    </ul>

<div  id="rSociais" >
    <ul class="navbar-nav" style='padding-top: 11px;'>
      <li class="nav-item">
	 		   <a class="btn btn-social-icon  btn-facebook" href="https://www.facebook.com/">
                <span class="fa fa-facebook"> </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="btn btn-social-icon  btn-instagram"  href="https://www.instagram.com/">
                <span class="fa fa-instagram"> </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="btn btn-social-icon  btn-twitter" href="https://twitter.com/login?lang=pt">
                <span class="fa fa-twitter"> </span>
              </a>
      </li>
</ul>
</div>

<div  id="pesquisar">		
	<form method ="GET" action='<?=site_url("crud/index");?>'class="form-inline my-2 my-lg-0 pl-3-lg" >
	<div class="form-group">
	
			<input type="text" id="fBuscar" class="form-control " name="filtro" value="<?=v($_GET,'filtro')?>" placeholder="Pesquisar...">
        <a class="btn btn-social-icon  btn-search" style="color: white;">
            <span class = "fa fa-search"> </span>
          </a>
			</form>
 </div>
</div>
</nav>
</div>
<div id = "botoes">
<button type="button" class="button"> 	
		<a style="color:#565656;" href='<?=site_url("categorias/index")?>'>
		CATEGORIA
	</a></button>
	<button type="button" class="button"> 	
		<a style="color:#565656;" href='<?=site_url("categorias/indexCCategorias")?>'>
		CADASTRO
	</a></button>
</div>

	
<div id="cadastroNoticia">
<?php  
// dd(v($dados,"idCategoria"));

	if (isset($dados["idCategoria"])){
		$id =$dados["idCategoria"];
		$url = "categorias/salvar/".$id;
	}else {
		$url = "categorias/salvar/";
	}
?>
<form method="post" action="<?=site_url('categorias/salvar')?>"  enctype="multipart/form-data"> 

<fieldset class="form-group">
	<legend id="legenda">Cadastrar Categoria</legend>
    <div class="form-group">
			<label for="">Nome da Categoria: </label>
			<input type="text" class="form-control"  name="nome" value="<?=v($dados,"nome")?>" required>
            <div style='color:blue;'><?= session('errors.categoria') ?></div>
	</div>
		</br>
		<button id="botao" type="submit" class="button">Salvar</button>
  </fieldset>
</form>
</div>

				
			


</body>
</html>