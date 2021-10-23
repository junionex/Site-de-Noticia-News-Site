
<div style="color:red;text-align:center;"> <?=session("erro");?> </div>
<head>
<link rel="stylesheet" type="text/css" href="<?=base_url('../bootstrap/css/bootstrap.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('css/style1.css')?>">
</head>
<div id="login">
	<h2><center>Conta News</center></h2>
<form method="post" action="<?=site_url("home/logar")?>">  
	<fieldset class="form-group">
	<legend id ="legend1">Login</legend>
		<div class="form-group">
			<label id="l" for="email">Email</label>
			<input type="email" class="form-control" name="email">
		</div>
		<div class="form-group">
			<label id="l" for="senha">Senha</label>
			<input type="password" class="form-control" name="senha">
		</div>
			<button type="submit" id="botaoBlock" class="btn btn-primary btn-lg btn-block">Enviar</button>
</br>
		<div class="form-group">
		<center>
			<label  id="l"> Não tem conta? 
			<a  style="color:red;"href='<?=site_url("usuarios/index");?>'>
			CADASTRE-SE.</a></label>
	   </center>
		</div>

  </fieldset>
</br>
</br>
</form>
</div>

