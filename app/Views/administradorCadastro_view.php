<?php include 'head.php'; ?>

<body>
	<div id="logo">
		<nav class="navbar navbar-light bg-light">
			<a class="navbar-brand" href="<?= base_url('home') ?>">
				<img id="imgLogo" class="img-fluid" alt="Imagemlogo" src="<?= base_url('img/logo.png') ?>">
			</a>
			<div id="minhaConta">
				<div class="dropdown">
					Usuário:<?= $_SESSION['user']['nome'] ?>
					</br>
					<button class="dropbtn" style="padding: 10px;">Minha Conta</button>
					<div class="dropdown-content">
						<a href='<?= site_url("crud/minhaConta") ?>'>Configurações</a>
						<a href='<?= site_url("home/logout"); ?>''>Sair</a>
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
        <a class="nav-link" href="<?= base_url('home') ?>">Home <span class="sr-only">(Página atual)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('home/sobrenos') ?>">Sobre nós</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('home/categoria_busca_publicacao_view') ?>">Categoria</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('home/contato') ?>">Contato</a>
      </li>
	  <li class="nav-item">
		<div class="dropdown">
		  <button class="dropbtn">MENU</button>
			<div class="dropdown-content">
				<a href="#">Notícias</a>
				<a href=' <?= site_url("crud/index") ?>'>Usuários</a>
						<a href='<?= site_url("categorias/index") ?>'>Categorias</a>
						<a href='<?= site_url("noticias/noticiasPublicadas") ?>'>Publicações</a>
					</div>
				</div>
				</li>
				</ul>

				<div id="rSociais">
					<ul class="navbar-nav" style='padding-top: 11px;'>
						<li class="nav-item">
							<a class="btn btn-social-icon  btn-facebook" href="https://www.facebook.com/">
								<span class="fa fa-facebook"> </span>
							</a>
						</li>

						<li class="nav-item">
							<a class="btn btn-social-icon  btn-instagram" href="https://www.instagram.com/">
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

				<div id="pesquisar">
					<form method="GET" action='<?= site_url("pesquisas/pesquisarNoticia"); ?>' class="form-inline my-2 my-lg-0 pl-3-lg">
						<div class="form-group">

							<input type="text" id="fBuscar" class="form-control " name="filtroGeral" value="<?= v($_GET, 'filtroGeral') ?>" placeholder="Pesquisar...">
							<a class="btn btn-social-icon  btn-search" style="color: white;">
								<span class="fa fa-search"> </span>
							</a>
					</form>
				</div>
			</div>
		</nav>
	</div>
	<div id="botoes">
		<button type="button" class="button">
			<a style="color:#565656;" href='<?= site_url("noticias/indexNoticias") ?>'>
				NOTÍCIAS
			</a></button>
		<button type="button" class="button">
			<a style="color:#565656;" href='<?= site_url("noticias/index") ?>'>
				CADASTRO
			</a></button>
	</div>


	<div id="cadastroNoticia">
		<form method="post" action="<?= site_url("noticias/salvar") ?>" enctype="multipart/form-data">

			<fieldset class="form-group">
				<legend id="legenda">Cadastrar Notícias</legend>

				<div class="form-group">
					<label for="id"></label>
					<input type="hidden" class="form-control" name="idNot" value="<?= v($dados, "idNot") ?>">
				</div>

				<div class="form-group">
					<label for="nomeAutor">Nome do Autor</label>
					<input type="text" class="form-control" name="nomeAutor" value="<?= v($dados, "nomeAutor") ?>">
					<div style='color:blue;'><?= session('errors.nomeAutor') ?></div>
				</div>
				<div class="form-group">
					<label for="tituloP">Título Padrão</label>
					<input type="text" class="form-control" name="tituloP" value="<?= v($dados, "tituloP") ?>">
					<div style='color: blue;'><?= session('errors.tituloP') ?></div>
				</div>
				<div class="form-group">
					<label for="subtitulo">Subtítulo</label>
					<input type="text" class="form-control" name="subtitulo" value="<?= v($dados, "subtitulo") ?>">
					<div style='color:blue;'><?= session('errors.subtitulo') ?></div>
				</div>
				<div class="form-group">
					<label for="categoria">Categoria </label>
					<select name="idCategoria" class="form-control">
						<?php
						foreach ($categorias as $categoria) {
							$selected = "";
							if (v($dados, 'idCate') == $categoria["idCategoria"]) {
								$selected = "selected";
							}
							echo "<option value='" . $categoria["idCategoria"] . "' " . $selected . ">" . $categoria["nome"] . "</option>";
						}
						?>
					</select><br />
					<div style='color:red;'><?= session('errors.idCategoria') ?></div>
				</div>
				<div class="form-group">
					<label for="dataEnvio">Data</label>
					<input type="date" class="form-control" name="dataEnvio" value="<?= v($dados, "dataEnvio") ?>">
					<div style='color:red;'><?= session('errors.dataEnvio') ?></div>

				</div>
				<div class="form-group">
					<label for="tagsDesc">Tags de Descrição</label>
					<input type="text" class="form-control" name="tagsDesc" value="<?= v($dados, "tagsDesc") ?>">
					<div style='color:red;'><?= session('errors.tagsDesc') ?></div>

				</div>
				<div class="form-group shadow-textarea">
					<label for="texto">Texto</label>
					<textarea class="form-control z-depth-1" name="texto" id="texto" rows="3" placeholder="Escreva algo aqui...">
								<?= v($dados, "texto") ?>
			</textarea>
					<!--CRIAR O LOCAL DE TEXTO -->
					<script src="<?= base_url("js/ckeditor/ckeditor.js") ?>"></script>
					<script src="<?= base_url("js/ckfinder/ckfinder.js") ?>"></script>
					<script src="<?= base_url("js/javascript.js") ?>"></script>

					<!-- Só chamar quando abrir essa view-->
					<div style='color:blue;'><?= session('errors.texto') ?></div>

					</br>
					</br>
					<div class="form-group">
						<label for="publicar">Publicar</label>
						<label><input type="radio" name="publicar" value=1 <?php v($dados, "publicar") == 1 ? print 'checked' : '' ?>>Sim</label>
						<label><input type="radio" name="publicar" value=0 <?php v($dados, "publicar") == 0 ? print 'checked' : '' ?>>Não</label><br />
						<div style='color:red;'><?= session('errors.publicar') ?></div>
					</div>

					</br>
					</br>
					<div class="form-group">
						<label for="publico">Público</label>
						<label><input type="radio" name="publico" value=30 <?php v($dados, "publico") == 30 ? print 'checked' : '' ?>>Assinantes</label>
						<label><input type="radio" name="publico" value=20 <?php v($dados, "publico") == 20 ? print 'checked' : '' ?>>Público Geral </label><br />
						<div style='color:red;'><?= session('errors.publico') ?></div>
					</div>


					<button type="submit" class="button"><a style="color:#565656;" href='<?= site_url("noticias/index") ?>'>Novo</a></button>

					<button id="botao" type="submit" class="button">Salvar</button>
			</fieldset>
		</form>
	</div>

	<div id="pesquisar">
		<form method="GET" action='<?= site_url("noticias/index"); ?>' class="form-inline my-2 my-lg-0 pl-3-lg">
			<div class="form-group">

				<label for="nomeAutor">Autor ou Categoria</label>
				<input type="text" class="form-control " name="filtrar" value="<?= v($_GET, 'filtrar') ?>" placeholder="Pesquisar...">
				<button class="btn btn-dark ml-1" type="submit"><span class='glyphicon glyphicon-search'></span></buttom>
					<button style=" margin-left:20px;" type="button" class="button"><a style="color:#565656;" href='<?= site_url("noticias") ?>'>Limpar</a></button>
					</br>

			</div>

		</form>
	</div>


	<div id="tabela">
		<table class="table table-bordered table-dark">
			<div>
				<caption>
					<h4>
						<center>Notícias cadastradas</center>
					</h4>
				</caption>
			</div>
			<thead>
				<tr>
					<th scope="col">Editar</th>
					<th scope="col">Autor</th>
					<th scope="col">Título</th>
					<th scope="col">Subtítulo</th>
					<th scope="col">Categoria</th>
					<th scope="col" class='data'>Data</th>
					<th scope="col">Deletar</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($listagem as $item) : ?>
					<tr>
						<td>
							<a href='<?= site_url("noticias/index/{$item['idNot']}") ?>'>
								<span class='glyphicon glyphicon-edit'></span></a>
						</td>
						<td><?php print $item["nomeAutor"] ?></td>
						<td><?php print $item["tituloP"] ?></td>
						<td><?php print $item["subtitulo"] ?></td>
						<td><?php print $item["nomeCategoria"] ?></td>
						<td><?php print date('d-m-Y', strtotime($item['dataEnvio'])); ?></td>
						<td>
							<a href='<?= site_url("noticias/deletar/{$item['idNot']}") ?>'>
								<span class='glyphicon glyphicon-trash'></span></a>
						</td>
					</tr>

				<?php endforeach; ?>
			</tbody>
		</table>
		<div style='text-align:center;'>
			<?= $pager->links() ?>
		</div>
	</div>

</body>

</html>