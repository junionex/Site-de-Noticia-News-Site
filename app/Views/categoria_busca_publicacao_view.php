<?php include 'head.php'; ?>
<div id="logo">
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="<?= base_url('home') ?>">
      <img id="imgLogo" class="img-fluid" alt="Imagemlogo" src="<?= base_url('img/logo.png') ?>">
    </a>
    <div id="entrar">
      <a class="btn btn-primary" id="bEntrar" href="<?= base_url('home/telaLogin') ?>" role="button">Entrar</a>
    </div>
</div>
</nav>
</div>
<div id="menu">
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
        <form method="GET" action='<?= site_url("crud/index"); ?>' class="form-inline my-2 my-lg-0 pl-3-lg">
          <div class="form-group">

            <input type="text" id="fBuscar" class="form-control " name="filtro" value="<?= v($_GET, 'filtro') ?>" placeholder="Pesquisar...">
            <a class="btn btn-social-icon  btn-search" style="color: white;">
              <span class="fa fa-search"> </span>
            </a>
        </form>
      </div>
    </div>
  </nav>
</div>
<!---- Tela que vai exibir e buscar por categoria --->

<div id="botoes" style="margin-right: 10;">
  <?php foreach ($listagem as $item) : ?>
    <button type="button" class="button">
      <a style="color:#565656;" href='<?= site_url("home/categoria_busca_publicacao_view/{$item['idCategoria']}") ?>'>
        <?php print $item["nome"] ?>
      </a>
    </button>
  <?php endforeach; ?>
</div>
<div id="noticiaX" style="padding-left: 5%;">
  <?php foreach ($noticia as $item) : ?>
    <a href='<?= site_url("home/abrirNoticia/{$item['idNot']}") ?>'>

      <h1 class='titulo'> <?php print $item["tituloP"] ?> </h1>
      <p class='subtitulo'> <?php print $item["subtitulo"] ?> </p>
      <b class='data'>Data: <?php print date('d-m-Y', strtotime($item['dataEnvio'])) ?></b>
    </a>
  <?php endforeach; ?>
</div>
<div id="paginacao" style="text-align:center;">
  <?= $pager->links() ?>
</div>