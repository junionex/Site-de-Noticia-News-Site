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
            <a href='<?= site_url("noticias/index") ?>'>Jornalista</a>
            <a href='<?= site_url("noticias/noticiasPublicadas") ?>'>Publicações</a>
          </div>
          </li>
          </ul>

          <div id="rSociais">
            <ul class="navbar-nav" style="padding-top: 11px;">
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
            <form method="GET" action='<?= site_url("noticias/index"); ?>' class="form-inline my-2 my-lg-0 pl-3-lg">
              <div class="form-group">

                <input type="text" id="fBuscar" class="form-control " name="filtro" value="<?= v($_GET, 'filtro') ?>" placeholder="Pesquisar...">
                <a class="btn btn-social-icon  btn-search" style="color:white ;">
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
        NOTÍCIAS</a>
    </button>
    <button type="button" class="button">
      <a style="color:#565656;" href='<?= site_url("noticias") ?>'>
        CADASTRO
      </a></button>
  </div>

  <div id="tabela">
    <table id="t" class="table table-bordered table-dark">
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

          <tr <?php if ($item["publicar"] == 0) {
                print("style='background-color: yellow;'");
              } ?>>

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
          <?php if ($item["publicar"] == 1) {
            print("</div>");
          } ?>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div style='text-align:center;'><?= $pager->links() ?></div>
  </div>

</body>

</html>