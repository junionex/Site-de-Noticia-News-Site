<link rel="stylesheet" type="text/css" href="<?=base_url('../bootstrap/css/bootstrap.min.css')?>">
<link rel="stylesheet" type="text/css" href="<?=base_url('css/style1.css')?>">

<div id="formCadastro">
<span style='color:blue;'><?=session("success");?></span>
<form action="<?=site_url("usuarios/salvar")?>" method="post" enctype="multipart/form-data"> 
        <h2><center>Conta News</center></h2>
	<fieldset class="form-group">
	<legend id ="legend1">Crie sua conta</legend>
		<div class="form-group">
			<label  id="l" for="nome">Nome</label>
			<input type="text" class="form-control" name="nome"> 
			<div style='color:white;'><?= session('errors.nome') ?></div> 
		</div>
		<div class="form-group">
			<label id="l" for="email">Email</label>
			<input type="email" class="form-control" name="email">
			<div style='color:blue;'><?= session('errors.email') ?></div> 
		</div>
		<div class="form-group">
			<label   id="l" for="senha">Senha</label>
			<input type="password" class="form-control" name="senha">
			<div style='color:blue;'><?= session('errors.senha') ?></div> 
		</div>
		<div class="form-group">
			<label   id="l" for="senhaConfirm">Confirmar senha</label>
			<input type="password" class="form-control" name="senhaConfirm">
			<div style='color:blue;'><?= session('errors.senhaConfirm') ?></div>
		</div>
		<div class="form-group">
		    <label  id="l" for="sexo">sexo</label>		
			<label  id="l"><input type="radio" name="sexo" value="m" 
			<?php v($dados,"sexo") == 'm' ? print 'checked':'' ?>>Masc</label>
			<label  id="l"><input type="radio" name="sexo" value="f" 
			<?php v($dados,"sexo") == 'f' ? print 'checked':'' ?>>Fem</label><br/>
			<div style='color:blue;'><?= session('errors.sexo') ?></div>
		</div>
			<div class="form-group">
				<label id="l">Foto</label>
			<input type="file" name="foto" class="form-control"><br> 
			<div style='color:blue;'><?= session('errors.foto') ?></div> 
		</div>
		<button type="submit" id="botaoBlock" class="btn btn-primary btn-lg btn-block">Enviar</button>
        </br>
		<div class="form-group">
			<center>
				<label  id="l"> Já tem uma conta? 
				<a style="color:red;" href='<?=site_url("home/telaLogin");?>'>
				ENTRE.</a></label>
	  		 </center>
		</div>
			</fieldset>

</br>
</br>
</form>
</div>

