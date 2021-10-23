<?php include 'head.php'; ?> 
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?= base_url('../bootstrap/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('../bootstrapSocial/bootstrap-social.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/style-indexN.css') ?>">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="<?= base_url('../bootstrapSocial/bootstrap-social.less') ?>">
</head>

<body>
<div id="logo">
<nav class="navbar navbar-light bg-light">
  <a class="navbar-brand" href="#">
    <img id="imgLogo" class="img-fluid" alt="Imagemlogo" src= "<?=base_url('img/logo.png')?>">
  </a>
  <div id="minhaConta">
	<div class="dropdown">
		Usuário:<?=$_SESSION['user']['nome']?> 
		</br>
        <button class="dropbtn" Style="padding-left:5px;">Minha Conta</button>
	    <div class="dropdown-content">
		    <a href='<?=site_url("crud/minhaConta")?>'>Configurações</a>
		    <a href='<?=site_url("home/logout");?>''>Sair</a>
	    </div>
      </div>
</div>
</nav>
</div>
  <div id="menu">
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
        </ul>
        <div id="rSociais">
          <ul class="navbar-nav" style='padding-top: 11px;padding-left: 84px;'>
            <li class="nav-item">
              <a class="btn btn-social-icon  btn-facebook" href="https://www.facebook.com/">
                <span class="fa fa-facebook"> </span>
              </a>
            </li>

            <li class="nav-item">
              <a class="btn btn-social-icon  btn-instagram " href="https://www.instagram.com/">
                <span class="fa fa-instagram"> </span>
              </a>
            </li>
            <li class="nav-item">
              <a class="btn btn-social-icon  btn-twitter " href="https://twitter.com/login?lang=pt">
                <span class="fa fa-twitter"> </span>
              </a>
            </li>
          </ul>
        </div>

        <div id="pesquisar">
          <form method="GET" action='<?=site_url("pesquisas/pesquisarNoticia"); ?>' class="form-inline my-2 my-lg-0 pl-3-lg">
            <div class="form-group">
              <input type="text" class="form-control " name="filtro" value="<?= v($_GET, 'filtroGeral') ?>" placeholder="Pesquisar...">
              <a class="btn btn-social-icon  btn-search" style="color: white;">
                <span class="fa fa-search"> </span>
              </a>
          </form>
        </div>
      </div>
    </nav>
  </div>
  <!--<div id="noticiaSegunda">
    </div> -->
  <?php foreach ($noticia as $item) : ?>
    <a href='<?= site_url("home/abrirNoticia/{$item['idNot']}") ?>' class='linkN'>
      <div id="noticiaX">
        <h1 class='titulo'> <?php print $item["tituloP"] ?> </h1>
        <p class='subtitulo'> <?php print $item["subtitulo"] ?> </p>
        <b class='data'>Data:<?php print date('d-m-Y', strtotime($item['dataEnvio']))?></b>
      </div>
    </a>
  <?php endforeach; ?>

  <div id="paginacao"style="text-align:center;">
    <?= $pager->links() ?>
  </div>


  <footer id="rodape">
    <p>Copyright &copy; 2021 - by Cecília, Luana, Paulo. <br />

  </footer>
</body>

</html>