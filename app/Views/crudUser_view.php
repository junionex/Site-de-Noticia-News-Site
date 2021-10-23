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
				<a href='<?=site_url("noticias")?>'>Notícias</a>
				<a href='<?=site_url("crud/index")?>'>Usuários</a>
				<a href='<?=site_url("categorias/index")?>'>Categorias</a>
				<a href='<?=site_url("noticias/noticiasPublicadas")?>'>Publicações</a>
			</div>
			</div>
      </li>
    </ul>

<div  id="rSociais" >
    <ul class="navbar-nav" style='padding-top: 11px;'>
      <li class="nav-item">
        <a class="btn btn-social-icon  btn-facebook">
          <span class = "fa fa-facebook"> </span>
       </a>
      </li>

      <li class="nav-item">
        <a class="btn btn-social-icon  btn-instagram ">
          <span class = "fa fa-instagram"> </span>
        </a>
      </li>
      <li class="nav-item">
        <a class="btn btn-social-icon  btn-twitter ">
          <span class = "fa fa-twitter"> </span>
        </a>
      </li>
</ul>
</div>

<div  id="pesquisar">		
	<form method ="GET" action='<?=site_url("pesquisas/pesquisarNoticia");?>'class="form-inline my-2 my-lg-0 pl-3-lg" >
	<div class="form-group">
	
			<input type="text" id="fBuscar" class="form-control " name="filtroGeral" value="<?=v($_GET,'filtroGeral')?>" placeholder="Pesquisar...">
        <a class="btn btn-social-icon  btn-search" style="color: white;">
            <span class = "fa fa-search"> </span>
          </a>
			</form>
 </div>
</div>
</nav>
</div>

<div id="cadastroNoticia">
<form action="<?=site_url("Crud/salvar")?>" method="POST" enctype="multipart/form-data"> 
	<fieldset class="form-group">
	<legend id ="legenda"><center>Cadastro de Usuários</center></legend>
		<div class="form-group">
			<label for="id"></label>
			<input type="hidden"  id="id"class="form-control" name="id" value="<?=v($dados,"id")?>">
		<div class="form-group">
			<label for="nome">Nome</label>
			<input type="text" class="form-control" name="nome" value="<?=v($dados,"nome")?>">
			<div style='color:blue;'><?= session('errors.nome') ?></div>
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" id="verificarEmail"  class="form-control" name="email" value="<?=v($dados,"email")?>">
			<div style='color:blue;'  id='emailMsg'><?= session('errors.email') ?></div>
		</div>
		<div class="form-group">
			<label for="senha">Senha</label>
			<input type="password" class="form-control" name="senha"  value="">
			<div style='color:blue;'><?= session('errors.senha'); ?></div> 
		</div>
		<div class="form-group">
			<label for="senhaConfirm">Confirmar senha</label>
			<input type="password" class="form-control" name="senhaConfirm">
			<div style='color:blue;'><?= session('errors.senhaConfirm') ;?></div>
		</div>
 </br>
 <div class="form-group">
		    <label for="sexo">sexo</label>
			<label><input type="radio" name="sexo" value="m" 
			<?php v($dados,"sexo") == 'm' ? print 'checked':'' ?>>Masc</label>
			<label> <input type="radio" name="sexo" value="f" 
			<?php v($dados,"sexo") == 'f' ? print 'checked':'' ?>>Fem</label><br/>
			<div style='color:blue;'><?= session('errors.sexo') ?></div>
		</div>
		<div class="form-group">
		<label for="nivel">Nível</label>
			<select name="nivel"> 
			<?php foreach($niveis as $key=>$nivel): 
			$selected = ""; 
			if (v($dados,'nivel') == $key){ 
			$selected = "selected"; 
			} 
			?> 
			<option <?=$selected?> value="<?=$key?>"><?=$nivel?></option>
			 <?php endforeach; ?> 
			</select><br/> 
			<div style='color:blue;'><?= session('errors.nivel') ?></div>
			</div>
			<div class="form-group">
				<label>Foto</label>
			<input type="file" name="foto" class="form-control"><br> 
			<div style='color:blue;'><?= session('errors.foto') ?></div> 
		</div>
		<div class="form-group">
			<label for="cep">CEP</label>
			<input type="text" class="form-control" id="cep" name="cep" value="" >
		</div>
		<div class="form-group">
			<label for="rua">Rua</label>
			<input type="text" class="form-control"  id="rua" name="rua">
		</div>
		<div class="form-group">
			<label for="bairro">Bairro</label>
			<input type="text" class="form-control" id="bairro" name="bairro">
		</div>
		<div class="form-group">
			<label for="cidade">Cidade</label>
			<input type="text" class="form-control" id="cidade"  name="cidade">
		</div>
		<div class="form-group">
			<label for="uf">UF</label>
			<input type="text" class="form-control" id="uf" name="uf">
		</div>
		<div class="form-group">
			<label for="numero">Número</label>
			<input type="text" class="form-control" id="numero"name="numero">
		</div>

		<!-- <div id="telefones"  class="form-group"> 
			<?php 
			// for($i = 0; $i < 2; $i++): 
			// $fone = []; 
			// 	if (isset($dados["telefones"][$i])){ 
			// 	$fone = $dados["telefones"][$i]; 
			// 	} 
			// 	print "Contato".($i+1).":"; 
			// 	print "<input type='text' class='telefone' " 
			// 	." name='telefone[]' value='".v($fone,"telefone")."' /></br><br/>"; 
		 	// endfor; 
			?> 
			</div> -->

			<button id="botao" type="submit" class="button">Salvar</button>
			<button type="submit" class="button">
				<a style="color:#565656;"= href='<?=site_url("crud")?>'>Novo</a></button>
			</fieldset>
</form>
</div>
<div  id="pesquisar">		
	
	<form method ="GET" action='<?=site_url("crud/index");?>'class="form-inline my-2 my-lg-0 pl-3-lg" >
	<div class="form-group">
	
			<label for="nomeAutor" style="color:black;">Nome ou Email</label>
			<input type="text" class="form-control " name="filtro" value="<?=v($_GET,'filtro')?>" placeholder="Pesquisar...">
			<button class="btn btn-dark ml-1" type="submit"><span class ='glyphicon glyphicon-search'></span></buttom>
			<button style=" margin-left:20px;"  ttype="button" class="button"><a style="color:#565656;"  href='<?=site_url("crud")?>'>Limpar</a></button>
		</div>	
			</br>
			</br>
	<div class="form-group">
		<label style="color:black;" >Pesquisar por nível</label>
				<select name="nivel"> 
				<option value="">Sem filtro</option> 
				<?php foreach($niveis as $key=>$nivel): 
				$selected = ""; 
				if (v($_GET,'nivel') == $key){ 
				$selected = "selected"; 
				} 
				?> 
				<option <?=$selected?> value="<?=$key?>"><?=$nivel?></option> <?php endforeach; ?> 
				</select><br/>

	</br>
	</br>	
   </div>
</div>

<div id="tabela">
<table  class="table table-bordered table-dark">
<div>
<caption><h4><center>Usuários</center></h4></caption>
</div>
<thead>
 <tr> 	  
 	  <th scope="col">Editar</th>
      <th scope="col">Nome</th>
	  <th scope="col">Email</th>
	  <th scope="col">Cidade</th>
	  <th scope="col">Nível</th>
	  <th scope="col">Deletar</th>
 </tr>  
</thead>
<tbody>
<?php foreach($listagem as $item):?> 
<tr>
	  <td>
		  	<a href='<?=site_url("crud/index/{$item['id']}")?>'>
	  		<span class='glyphicon glyphicon-edit'></span></a>
	  </td>
      <td><?php print $item["nome"] ?></td>
      <td><?php print $item["email"] ?></td>
	  <td><?php print $item["cidade"] ?></td>
	  <td><?php print $item["nivel"] ?></td>
	  <td>
		<?php $url=site_url("crud/deletar/{$item['id']}")?> 

			<a href='#' 
				onclick='confirmDelete("<?=$url?>")'>
				<span class='glyphicon glyphicon-trash'></span>
			</a>

			


		<?php endforeach; ?> 
		</td>  
	  </tr>
</tbody>
</table>
<div style='text-align:center;'><?= $pager->links() ?></div>
</div>
</body>

<?php include 'bottom.php'; ?> 