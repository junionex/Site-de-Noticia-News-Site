-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Abr-2021 às 14:52
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `atividade`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `idCategoria` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`idCategoria`, `nome`) VALUES
(1, 'Lazer'),
(4, 'Turísmo'),
(5, 'Saúde'),
(6, 'Economia '),
(7, 'Esporte'),
(9, 'Entretenimento'),
(10, 'Religião'),
(11, 'Política');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `idNot` int(11) NOT NULL,
  `nomeAutor` varchar(50) NOT NULL,
  `tituloP` varchar(1024) NOT NULL,
  `subtitulo` varchar(1024) NOT NULL,
  `dataEnvio` date NOT NULL,
  `tagsDesc` varchar(50) NOT NULL,
  `texto` varchar(4096) NOT NULL,
  `idCategoria` int(11) NOT NULL,
  `publicar` int(1) NOT NULL,
  `publico` int(1) NOT NULL,
  `usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`idNot`, `nomeAutor`, `tituloP`, `subtitulo`, `dataEnvio`, `tagsDesc`, `texto`, `idCategoria`, `publicar`, `publico`, `usu`) VALUES
(48, ' Gshow', 'Brothers se surpreendem com dummies dançando na festa BBBotequim do BBB21', 'BBB', '2021-04-22', 'bbb, juliette, globo', '<p style=\"text-align:center\"><a href=\"https://gshow.globo.com/realities/bbb/bbb21/casa-bbb/noticia/comeca-a-festa-bbbotequim-no-bbb21.ghtml\">A festa BBBotequim, com show de Preta Gil e Pabllo Vittar, come&ccedil;ou&nbsp;</a>e os brothers notaram algo diferente na celebra&ccedil;&atilde;o desta quarta-feira, 21/04:&nbsp;dummies dan&ccedil;ando na pista da casa mais vigiada do Brasil. Os &#39;assistentes&#39; misteriosos fizeram coreografias e chamaram a aten&ccedil;&atilde;o antes de se despedirem e deixarem o confinamento.</p>\r\n\r\n<p style=\"text-align:center\"><a href=\"https://gshow.globo.com/artistas/viih-tube-bbb-21/\">Viih Tube&nbsp;</a>&eacute; uma das Brothers se surpreendem com dummies dan&ccedil;ando na festa BBBotequim do BBB21<img alt=\"Brothers se surpreendem com dummies dançando na festa BBBotequim do BBB21 — Foto: Globo\" sizes=\"(max-width: 1366px) 648px, 100vw\" src=\"https://s2.glbimg.com/HlqOoVvmX-ePT6xSvxVIqmhvzrw=/0x0:1280x720/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_e84042ef78cb4708aeebdf1c68c6cbd6/internal_photos/bs/2021/E/R/oI5S8kRpiF9dwmvMgWWA/juliette-e-dummy.jpeg\" srcset=\"https://s2.glbimg.com/v6G5rpuK7jODrgL2r-iG6qAa1VE=/0x0:1280x720/1000x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_e84042ef78cb4708aeebdf1c68c6cbd6/internal_photos/bs/2021/E/R/oI5S8kRpiF9dwmvMgWWA/juliette-e-dummy.jpeg 1000w, https://s2.glbimg.com/HlqOoVvmX-ePT6xSvxVIqmhvzrw=/0x0:1280x720/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_e84042ef78cb4708aeebdf1c68c6cbd6/internal_photos/bs/2021/E/R/oI5S8kRpiF9dwmvMgWWA/juliette-e-dummy.jpeg 984w, https://s2.glbimg.com/9E8YTXVQAFlrhkkDTGEPLvWAX-o=/0x0:1280x720/640x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_e84042ef78cb4708aeebdf1c68c6cbd6/internal_photos/bs/2021/E/R/oI5S8kRpiF9dwmvMgWWA/juliette-e-dummy.jpeg 640w, https://s2.glbimg.com/e2SjPXkss1KmkUZvY80bgPaSrxQ=/0x0:1280x720/600x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_e84042ef78cb4708aeebdf1c68c6cbd6/internal_photos/bs/2021/E/R/oI5S8kRpiF9dwmvMgWWA/juliette-e-dummy.jpeg 600w\" /></p>\r\n', 9, 1, 20, 0),
(49, ' Marcelo Parreira, TV Globo', 'Defesa propôs há 1 ano dar poder a Bolsonaro para impor medidas contra Covid a governadores', 'Medida provisória e decreto dariam poderes ao governo para intervir também em empresas públicas e privadas. &#39;Concluiu-se pela não continuidade da iniciativa&#39;, informou Casa Civil.', '2021-04-22', 'saúde, covid', '<p>O&nbsp;<a href=\"https://g1.globo.com/tudo-sobre/ministerio-da-defesa/\">Minist&eacute;rio da Defesa</a>&nbsp;fez uma proposta em abril do ano passado &mdash; mas o governo decidiu n&atilde;o levar adiante &mdash; para que o presidente&nbsp;<a href=\"https://g1.globo.com/politica/politico/jair-bolsonaro/\">Jair Bolsonaro</a>&nbsp;mudasse a legisla&ccedil;&atilde;o e decretasse estado de &quot;mobiliza&ccedil;&atilde;o nacional&quot; a fim de concentrar a coordena&ccedil;&atilde;o dos esfor&ccedil;os contra a pandemia de Covid-19, segundo documentos do Minist&eacute;rio da Defesa aos quais o&nbsp;<strong>G1&nbsp;</strong>teve acesso.</p>\r\n\r\n<p>A proposta permitiria a um comit&ecirc; do governo federal, comandado pela Defesa, determinar a&ccedil;&otilde;es e atividades a serem executadas por prefeitos e governadores, intervir na produ&ccedil;&atilde;o da ind&uacute;stria (inclusive com &quot;fiscais de produ&ccedil;&atilde;o&quot;, por exemplo) e convocar civis e militares da reserva.</p>\r\n\r\n<p>Para isso, o minist&eacute;rio defendeu mudan&ccedil;as na lei que trata da chamada mobiliza&ccedil;&atilde;o nacional. Prevista na Constitui&ccedil;&atilde;o, a medida s&oacute; poderia ser adotada atualmente em situa&ccedil;&otilde;es de agress&atilde;o estrangeira e ap&oacute;s autoriza&ccedil;&atilde;o do Poder Legislativo.</p>\r\n\r\n<p>A mudan&ccedil;a, a ser feita por medida provis&oacute;ria, incluiria a possibilidade de uso da medida tamb&eacute;m em &quot;casos de calamidade p&uacute;blica de repercuss&atilde;o nacional, reconhecida pelo Congresso Nacional&quot;.</p>\r\n\r\n<p>Junto com a medida provis&oacute;ria, o minist&eacute;rio defendia a publica&ccedil;&atilde;o de um decreto estabelecendo a mobiliza&ccedil;&atilde;o nacional em decorr&ecirc;ncia da Covid-19. Nesse caso, as medidas passariam a ser decididas pelo Comit&ecirc; do Sistema Nacional de Mobiliza&ccedil;&atilde;o (Sinamob), que re&uacute;ne minist&eacute;rios do governo federal e &eacute; comandado pela Defesa.</p>\r\n\r\n<p>Por meio da assessoria de imprensa, a Casa Civil informou que &quot;a referida proposta de mudan&ccedil;a na Lei que disp&otilde;e sobre a mobiliza&ccedil;&atilde;o nacional foi analisada dos pontos de vista jur&iacute;dico, pol&iacute;tico e t&eacute;cnico e concluiu-se pela n&atilde;o continuidade da iniciativa&quot;.</p>\r\n\r\n<p>O&nbsp;<strong>G1</strong>&nbsp;perguntou ao Minist&eacute;rio da Defesa se a proposta foi iniciativa da pasta ou atendeu a pedido do Pal&aacute;cio do Planalto, mas n&atilde;o obteve resposta. O minist&eacute;rio tamb&eacute;m n&atilde;o informou se mant&eacute;m atualmente a mesma avalia&ccedil;&atilde;o sobre o tema.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>&#39;Medidas de restri&ccedil;&atilde;o&#39;</h2>\r\n\r\n<p>O texto do decreto proposto pelo minist&eacute;rio permitiria, por exemplo, a &quot;convoca&ccedil;&atilde;o dos entes federados&quot;.</p>\r\n\r\n<p>Nesse caso, o Sinamob determinaria a governadores e prefeitos a&ccedil;&otilde;es a serem tomadas diretamente, al&eacute;m da disponibiliza&ccedil;&atilde;o de equipamentos p&uacute;blicos e servi&ccedil;os.</p>\r\n\r\n<p>A convoca&ccedil;&atilde;o tamb&eacute;m poderia incluir &quot;medidas de restri&ccedil;&atilde;o que seriam tomadas para prote&ccedil;&atilde;o da popula&ccedil;&atilde;o&quot;. Um artigo ainda deixava espa&ccedil;o para &quot;outras a&ccedil;&otilde;es necess&aacute;rias e indispens&aacute;veis para o enfrentamento da calamidade p&uacute;blica.&quot;</p>\r\n\r\n<p>O decreto tamb&eacute;m permitiria ao comit&ecirc; requisitar bens e servi&ccedil;os, uma medida j&aacute; permitida em lei e que vem sendo regularmente utilizada pelo governo.</p>\r\n\r\n<p>O novo texto, no entanto, permitiria ao comit&ecirc; ir al&eacute;m, com determina&ccedil;&atilde;o a empresas p&uacute;blicas e privadas de &quot;direcionamento da produ&ccedil;&atilde;o, comercializa&ccedil;&atilde;o e distribui&ccedil;&atilde;o&quot;, &quot;reorganiza&ccedil;&atilde;o da oferta de determinados bens e servi&ccedil;os&quot; e at&eacute; determina&ccedil;&atilde;o da &quot;oferta de determinados bens e servi&a', 5, 1, 20, 0),
(50, 'BBC', 'Auxílio Emergencial: Com benefício reduzido em 2021, Brasil terá 61 milhões na pobreza', 'Pesquisa inédita mostra ainda que 19,3 milhões de brasileiros viverão na extrema pobreza, com auxílio reduzido. Aumento da miséria é sinal de insuficiência da nova ajuda emergencial, dizem pesquisadoras.', '2021-04-22', 'economia, auxílio emergencial', '<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Mulheres e a população negra são mais afetadas pela piora das condições de vida no país — Foto: ARNALDO CARVALHO/GETTY IMAGES\" sizes=\"(max-width: 1366px) 648px, 100vw\" src=\"https://s2.glbimg.com/u4KdYhDiOO6-fjud5xp5eVmiNbw=/0x0:640x360/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2021/X/z/Ndv81sTeCEXzLDvu5jhg/thumbnail-image006.jpg\" srcset=\"https://s2.glbimg.com/PpL6E8qpikmnj6VxryqUohKX8Gg=/0x0:640x360/1000x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2021/X/z/Ndv81sTeCEXzLDvu5jhg/thumbnail-image006.jpg 1000w, https://s2.glbimg.com/u4KdYhDiOO6-fjud5xp5eVmiNbw=/0x0:640x360/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2021/X/z/Ndv81sTeCEXzLDvu5jhg/thumbnail-image006.jpg 984w, https://s2.glbimg.com/D0Z84wJVVdA08OrWYsH4-VD5IWo=/0x0:640x360/640x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2021/X/z/Ndv81sTeCEXzLDvu5jhg/thumbnail-image006.jpg 640w, https://s2.glbimg.com/pJGOyL40E0bFeQ99mOjf4x_BAh4=/0x0:640x360/600x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_59edd422c0c84a879bd37670ae4f538a/internal_photos/bs/2021/X/z/Ndv81sTeCEXzLDvu5jhg/thumbnail-image006.jpg 600w\" /></p>\r\n\r\n<p>Com o valor menor do&nbsp;<a href=\"https://g1.globo.com/economia/auxilio-emergencial/\">aux&iacute;lio emergencial</a>&nbsp;este ano, o Brasil deve somar 61,1 milh&otilde;es de pessoas vivendo na pobreza e 19,3 milh&otilde;es na extrema pobreza, segundo estudo publicado nesta quinta-feira (22) pelo Centro de Pesquisa em Macroeconomia das Desigualdades da Universidade de S&atilde;o Paulo (Made-USP).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li><a href=\"https://g1.globo.com/economia/noticia/2021/04/17/classe-media-encolhe-na-pandemia-e-ja-tem-mesmo-tamanho-da-classe-baixa.ghtml\">Classe m&eacute;dia &#39;encolhe&#39; na pandemia e j&aacute; tem mesmo &#39;tamanho&#39; da classe baixa</a></li>\r\n	<li><a href=\"https://g1.globo.com/jornal-nacional/noticia/2021/04/05/numero-de-brasileiros-que-vivem-na-pobreza-quase-triplicou-em-seis-meses-diz-fgv.ghtml\">N&uacute;mero de brasileiros que vivem na pobreza quase triplicou em seis meses, diz FGV</a></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Em 2021, s&atilde;o consideradas pobres as pessoas que vivem com uma renda mensal per capita (por pessoa) inferior a R$ 469 por m&ecirc;s, ou US$ 1,90 por dia, conforme crit&eacute;rio adotado pelo Banco Mundial. J&aacute; os extremamente pobres s&atilde;o aqueles que vivem com menos de R$ 162 mensais.</p>\r\n\r\n<p>Em 2019, os brasileiros vivendo abaixo da linha da pobreza somavam 51,9 milh&otilde;es. Isto significa que, em 2021, o Brasil ter&aacute; 9,1 milh&otilde;es de pobres a mais do que antes da chegada do coronav&iacute;rus ao pa&iacute;s.</p>\r\n\r\n<p>No ano anterior &agrave; pandemia, os extremamente pobres eram 13,9 milh&otilde;es. Assim, em apenas dois anos, 5,4 milh&otilde;es de brasileiros se somar&atilde;o a esse grupo que convive com a car&ecirc;ncia extrema.</p>\r\n\r\n<p>Para as pesquisadoras Luiza Nassif-Pires, Lu&iacute;sa Cardoso e Ana Lu&iacute;za Matos de Oliveira, autoras do estudo, o aumento da mis&eacute;ria esperado para esse ano revela que o aux&iacute;lio emergencial com valor m&eacute;dio de R$ 250 &eacute; insuficiente para recompor a perda de renda da popula&ccedil;&atilde;o mais pobre em meio &agrave; pior fase da crise de sa&uacute;de p&uacute;blica provocada pela covid-19.</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"250\" id=\"google_ads_iframe_/95377733/tvg_G1/Economia_3\" name=\"\" scrolling=\"no\" src=\"https://tpc.googlesyndication.com/safeframe/1-0-38/html/container.html\" title=\"3rd party ad content\" width=\"970\"></iframe></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<blockquote>&quot;J&aacute; havia um crescimento da pobreza antes da pandemia, isso s&oacute; n&atilde;o se agravou no ano passado devido ao aux&iacute;lio emergencial de R$ 600 a R$ 1.200&quot;, observa Oliveira.</blockquote>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&quot;O nov', 6, 1, 20, 0),
(51, ' Fantástico', 'Ex-criminoso usa o esporte para construir uma vida nova após dez anos na cadeia', 'Aos 18 anos, John McAvoy foi preso duas vezes por assalto a mão armada, um crime considerado muito grave na Inglaterra. Hoje, o inglês é um triatleta profissional, com patrocinadores e metas ambiciosas na carreira.', '2021-04-18', 'esporte', '<p>John McAvoy &eacute; um ex-criminoso que usou o esporte para recome&ccedil;ar do zero ap&oacute;s dez anos na cadeia. Aos 18 anos, ele foi preso pela primeira vez, por assalto a m&atilde;o armada, um crime considerado muito grave na Inglaterra. Depois de ser solto com liberdade condicional, ele voltou a cometer o mesmo crime.</p>\r\n\r\n<p>Com 22 anos de idade, ele j&aacute; estava no pres&iacute;dio mais famoso do Reino Unido: Belmarsh. Um lugar que ganhou o apelido de &ldquo;Guant&aacute;namo Brit&acirc;nica&rdquo; por ser o destino de terroristas, muitos ligados a grupos radicais isl&acirc;micos.</p>\r\n\r\n<p>O bom comportamento levou John a pres&iacute;dios menos controlados. Ele passou a ter acesso &agrave; academia e televis&atilde;o. At&eacute; que em uma noite, vendo as not&iacute;cias, ele finalmente entendeu qual o destino mais prov&aacute;vel de um criminoso: Aaron Cloud, o melhor amigo do John, tinha morrido em uma batida de carro durante uma fuga da pol&iacute;cia, na Holanda.</p>\r\n\r\n<p>Em meio &agrave; dor da perda, come&ccedil;ou a descarregar o remorso em um aparelho chamado remo erg&ocirc;metro. Sem querer, descobriu um talento inusitado e um amigo improv&aacute;vel. O funcion&aacute;rio era Darren Davies, agente penitenci&aacute;rio e professor de educa&ccedil;&atilde;o f&iacute;sica.</p>\r\n\r\n<p>Em 16 meses, John quebrou oito recordes brit&acirc;nicos e tr&ecirc;s mundiais, incluindo um de resist&ecirc;ncia, numa prova de 24 horas. No fim de 2012, ele entrou em liberdade condicional determinado a virar atleta profissional.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>John apostou num esporte em que a resist&ecirc;ncia fala mais alto, o &quot;iron man&quot;: prova com 180 quil&ocirc;metros de bicicleta, 42 de corrida, e quase quatro a nado. Aos 38 anos, o ingl&ecirc;s &eacute; um triatleta profissional, com patrocinadores e metas ambiciosas na carreira.</p>\r\n\r\n<p><strong>Ou&ccedil;a o podcast do Fant&aacute;stico</strong></p>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<p>Fique por dentro</p>\r\n\r\n<p>As not&iacute;cias que voc&ecirc; n&atilde;o pode perder diretamente no seu e-mail.</p>\r\n\r\n<p>Para se inscrever, entre ou crie uma Conta Globo gratuita.</p>\r\n\r\n<p><a href=\"https://login.globo.com/provisionamento/6843\" id=\"subscribeButton\">Inscreva-se e receba a newsletter</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 7, 1, 20, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `nivel` int(11) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `cep` varchar(11) NOT NULL,
  `rua` varchar(240) NOT NULL,
  `bairro` varchar(40) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `sexo`, `foto`, `nivel`, `senha`, `cep`, `rua`, `bairro`, `cidade`, `uf`, `numero`) VALUES
(3, 'Adm', 'adm@gmail.com', 'f', 'foto/33f84639ffe0157cfb456906cbf113bb_6.png', 50, 'ff8af657403625fe30e6380ac1b7752616b273db', '59.198-000', 'rabo da gata', 'centro', 'Montanhas', 'RN', 23),
(10, 'Jornalista', 'jornalista@gmail.com', 'm', 'foto/33f84639ffe0157cfb456906cbf113bb_7.png', 40, 'ff8af657403625fe30e6380ac1b7752616b273db', '59.217-000', 'bhbhbh', '', 'Monte das Gameleiras', 'RN', 0),
(11, 'Assinante', 'assinante@gmail.com', 'f', 'foto/33f84639ffe0157cfb456906cbf113bb_9.png', 30, 'ff8af657403625fe30e6380ac1b7752616b273db', '59.217-000', 'hh', 'centro', 'Monte das Gameleiras', 'RN', 23);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Índices para tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idNot`),
  ADD KEY `categorias_n` (`idCategoria`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idNot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
