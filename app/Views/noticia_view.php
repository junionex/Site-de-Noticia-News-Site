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
      <a class="navbar-brand" href="<?= base_url('home') ?>">
        <img id="imgLogo" class="img-fluid" alt="Imagemlogo" src="<?= base_url('img/logo.png') ?>">
      </a>
      <div id="entrar">
        <a class="btn btn-primary" id="bEntrar" href="<?= base_url('home/telaLogin') ?>" role="button">Entrar</a>

      </div>
    </nav>
  </div>
  <div id="menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href='<?= base_url('home') ?>'>Home <span class="sr-only">(Página atual)</span></a>
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
          <form method="GET" action='<?= site_url("/noticiasPublicadasPublico"); ?>' class="form-inline my-2 my-lg-0 pl-3-lg">
            <div class="form-group">

              <input type="text" class="form-control " name="filtro" value="<?= v($_GET, 'filtro') ?>" placeholder="Pesquisar...">
              <a class="btn btn-social-icon  btn-search" style="color: white;">
                <span class="fa fa-search"> </span>
              </a>
          </form>
        </div>
      </div>
    </nav>
  </div>
  <div id='publicacao' style="padding-top: 4%;">
    <div style="border-top: solid;">
      <p class='nomeAutor'style="float: left;">
        Publicado por:
        <?php print($noticia['nomeAutor']) ?>
      </p>
      <p class='dataEnvio' style="float: right;">data: <?php print($noticia['dataEnvio']) ?> </p><br>
    </div>
    <h1 class='titulo'> <?php print($noticia['tituloP']) ?> </h1><br>
    <h3 class='subtitulo'> <?php print($noticia['subtitulo']) ?> </h3><br><br>
    <div id='texto'>
      <?php print($noticia['texto']) ?>
    </div>
    <br><br><br><br>
    <div style="border-bottom: solid;">
      <p class='tagsDesc' style="float: left;"> Tag: <?php print($noticia['tagsDesc']) ?> </p><br>
      <!--<p class='idCategoria'> <?php print($noticia['idCategoria']) ?> </p><br> -->
    </div>

  </div>


  <footer id="rodape">
    <p>Copyright &copy; 2021 - by Cecília, Luana, Paulo. <br />

  </footer>
</body>

</html>