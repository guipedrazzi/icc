	<script type="text/javascript" src="assets/bibliotecas/jquery/jquery-3.3.1.js"></script>

	<script src="assets/bibliotecas/maskbrphone/maskbrphone.js"></script>
    <!-- Framework Front-end Matelialize (JS) -->
	<script src="assets/framework/materialize/js/materialize.js"></script>
    <!-- Jquery AJAX.forms -->
    <script src="assets/js/jquery.form.min.js"></script>

    <script src="assets/js/jqueryconfirm/jquery-confirm.min.js"></script>
    

    <script src="assets/js/jsconfig.js"></script>
<?php 	
include 'configr.php';
include 'core/model.php';
include 'models/Login.php';

if((isset($_POST['name']) && !empty($_POST['name'])) &&
 (isset($_POST['login']) && !empty($_POST['login'])) && 
 (isset($_POST['password']) && !empty($_POST['password'])) && 
 (isset($_POST['repsenha']) && !empty($_POST['repsenha'])) && 
 (isset($_POST['type']) && !empty($_POST['type'])) )
{
	       //  print_r($_POST);
	      // echo 'EAE';  exit();
	$objLogin = new Login();

	$erro = "";

	if($_POST['password'] === $_POST['repsenha'])
	{
		if(!$objLogin->setPassword($_POST['password']))
		{
			$erro .= "<li>Senha fora do padrão, favor preencher o campo com 6 caracteres ou mais. </li>";
		}

		if(!$objLogin->setLogin($_POST['login']))
		{
			$erro .= "<li>Login fora do padrão, favor preencher o campo com 4 caracteres ou mais. </li>";
		}

		if(!$objLogin->setName($_POST['name']))
		{
			$erro .= "<li>Nome fora do padrão, favor preencher o campo com 4 caracteres ou mais. </li>";
		}

		if(!$objLogin->setTypeUser($_POST['type']))
		{
			$erro .= "<li>Selecione ao menos um tipo de usuário do sistema. </li>";
		}

		if($erro == "")//significa que não houve erro com os obrigatórios
		{
			if($objLogin->registerUser($_POST))
			{
				echo "<script>$.confirm 
					({
						useBootstrap: false,
						title: '<b class=".'green-text'.">Usuário cadastrado com sucesso!</b>',
						content: 'Você será redirecionado a página interna do sistema',
						buttons: {
							OK: function (){
								location.href = 'home';
							}

						}
					});</script>";
			}
			else
			{
				echo "<script>$.confirm 
					({
						useBootstrap: false,
						title: '<span class=".'red-text'."><b>ERRO</b></span>',
						content: 'Verifique com o administrador se você já não tem cadastro no sistema!',
						buttons: {
							OK: function (){
								return;
							}

						}
					});</script>";
			}
		}

	}
	else
	{
		$erro .= "<li>Repetição de senha incorreta!</li>";
	}

	//erros no backend
	if(!empty($erro))
	{
		echo "<script>$.confirm 
		({
			useBootstrap: false,
			title: '<span class=".'red-text'."><b>ERRO</b></span>',
			content: '<ul>".$erro."</ul>',
			buttons: {
				Entendi: function (){
					return;
				}

			}
		});</script>";
	} 

}


?>
<!DOCTYPE html>
<html>
	<head>
	  	<title>Cadastro de Usuário</title>
	  	<meta charset="UTF-8">
	    
	    <!-- Material Icons -->
	    <link rel="stylesheet" href="<?php echo RAIZ; ?>../assets/fonts/material-icon/material-icons.css">

	    <!-- Font Roboto -->
	    <link rel="stylesheet" href="<?php echo RAIZ; ?>../assets/fonts/roboto/roboto.css">

	    <!-- Framework Front-end Matelialize (CSS) -->
	    <link rel="stylesheet" href="<?php echo RAIZ; ?>../assets/framework/materialize/css/materialize.css">

	    <link rel="stylesheet" href="<?php echo RAIZ; ?>../assets/js/jqueryconfirm/jquery-confirm.min.css">

	 	<!-- CSS Cadastro -->
	    <link rel="stylesheet" href="<?php echo RAIZ; ?>../assets/css/cadastro.css">

	 	<!-- CSS Datepicker -->
	    <link rel="stylesheet" type="text/css" href="<?php echo RAIZ; ?>/assets/bibliotecas/airdatepicker/datepicker.css">

	    <!-- Otimização para equipamentos Mobile -->
	    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>

	<body>							

		<div class="row height-row no-margin bg-mobile">
			   
			<div class="col s12 m12 l5 background-login hide-on-med-and-down">
		        <div class="content-background">
		            <h2>Bem-vindo!</h2>
		            <h3 class="sub-titulo-1">Área de <strong>cadastro</strong> de usuário</h3>
		            <p class="sub-titulo-2"><strong> Área de cadastro,</strong> preencha todos<br>  os campos obrigatórios (*) para se cadastrar.</p>	

		            <div class="hide-on-med-and-down margin-btn-voltar">
		            	<p class="text-voltar">Clique no botão abaixo para voltar a tela de login</p>
		            	<a href="login.php" class="btn btn-voltar btn-margin"><i class="material-icons left">undo</i>Voltar</a>
					</div>
		        </div><!-- content-background -->
		    </div><!-- col -->


		     <div class="col s12 m12 l7 center-left">		        
		        <div class="row">
		            <div class="col s12 content-logo">
		            	<div class="hide-on-med-and-down">
		                	<img class="icon-padrao" src="<?php echo RAIZ; ?>../assets/images/icons/employee.svg" title="Logo Imóveis Caparaó Capixaba" height="80">
						</div>
						<div class="hide-on-large-only">
		               		<img class="icon-padrao" src="<?php echo RAIZ; ?>../assets/images/icons/employee.svg" height="80">
		                </div>
		                <br/>
		            </div><!-- col -->
		        </div><!-- row -->

		      	<div class="row">
		        	<div class="col s12">

		        		<div class="content-cadastro">

							<form method="POST" id="cadastro-form" action="" class="container content-form"><br>
									<div class="input-field col s12 l6">
										<input type="text" name="name" id="name" required="" minlength="4">
										<label class="label" for="name">Nome completo (mínimo 4 caracteres) *</label>
									</div><!-- col -->

									<div class="input-field col s12 l6">
										<input type="text" name="email" id="email" placeholder="xxxxxx@xxxxxx.xxx.xx" >
										<label class="label" for="email">Email</label>
									</div><!-- col -->

									<div class="input-field col s12 l6">
										<input type="text" name="phone" id="phone" placeholder="(99)99999-9999 ou (33)3333-3333" class="telefone" >
										<label class="label" for="phone">Telefone</label>
									</div><!-- col -->

									<div class="input-field col s12 l6">
										<input type='text' name="birthdate" class='datepicker-here cor_green_light' id="birthdate"/>
            							<label for="birthdate" class="active" >Data de nascimento</label>
									</div><!-- col -->

									<div class="input-field col s12">
										<input class='input-field' type="text" id="login" name="login" required="" minlength="4">
										<label class="label" for="login">Login (mínimo 4 caracteres) *</label>
									</div><!-- col -->

									<div class="input-field col s12 l6">
										<input type="password" name="password" id="password" required="" minlength="6">
										<label for="password">Senha (mínimo 6 caracteres) *</label>
									</div><!-- col -->

									<div class="input-field col s12 l6">
										<input type="password" name="repsenha" id="repsenha" required="" minlength="6">
										<label for="repsenha">Repita a senha* </label>
									</div><!-- col -->
									
									<div class="col s12 input-field">
										<span class="grey-text">Tipo *</span>
										<p>
									      <label>
									        <input name="type" type="radio" checked value="1" />
									        <span>Usuário</span>
									      </label>
									    </p>
									    <p>
									      <label>
									        <input name="type" type="radio" value="2" />
									        <span>Administrador</span>
									      </label>
									    </p><br><hr>
									    <span class="grey-text">Obrigatório *</span>
									</div>

									<div class="col s12 input-field">							
										<!-- === Botão Cadastrar === -->
									    <button class="waves-effect waves-light btn btn-cadastrar btn-margin right"><i class="material-icons right">done</i>Cadastrar</button>
									    
									    <div class="hide-on-large-only">
									   		<a href="<?php echo RAIZ; ?>/login" class="waves-effect waves-light btn btn-cancelar btn-margin right"><i class="material-icons right">clear</i>Cancelar</a>
										</div>
									</div><!-- col -->
								</form>

							</div><!-- content-cadastro -->

						</div><!-- col -->
					</div><!-- row -->

			    </div><!-- col -->
			</div><!-- row -->


		    <!-- === Datepicker === -->
		    <script src="<?php echo RAIZ; ?>../assets/bibliotecas/airdatepicker/datepicker.min.js"></script>
		    <script src="<?php echo RAIZ; ?>../assets/bibliotecas/airdatepicker/datepicker.pt-BR.js"></script>
	  	</main>

	</body>
</html>




	<!-- <footer class="page-footer blue">
	  	<div class="footer-copyright">
		    <div class="container">
			    © Guilherme Pedrazzi - 2018
			    <a class="grey-text text-lighten-4 right" target="_blank" href="http://rghitech.com">Blog RGHitech</a>
		    </div>
	  	</div>
	</footer> -->

