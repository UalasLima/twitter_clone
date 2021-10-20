<?php
	//Atribuindo a variável erro o valor passado por get ou 0 caso nenhum valor tenha sido passado
	//Abaixo se vez o uso do isset para verificar a existencia da variavel e do operado ternário
	//Operador ternario: CONDIÇÃO ? ALTERNATIVA SE VERDADE : ALTERNATIVA SE FALSO
	$erro = isset($_GET['erro']) ? $_GET['erro'] : 0;
	echo $erro;

?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>

		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	
		<script>
			$(document).ready(function() {
				//Verificar se os campos usuário e senha foram devidamente preenchidos
				$('#btn_login').click(function() {

					var campo_vazio = false;

					if($('#campo_usuario').val() == '') {
						//vamos mudar a borda do campo de usuário, passaremos como parametro um jason
						$('#campo_usuario').css({'border-color': '#A94442'});
						campo_vazio = true;
					}
					else	
						$('#campo_usuario').css({'border-color': 'CCC'});
					if($('#campo_senha').val() == ''){
						$('#campo_senha').css({'border-color': '#A94442'});
						campo_vazio = true;
					}
					else	
						$('#campo_senha').css({'border-color': 'CCC'});

					//Retorno de falso num envento de click de um submit impede o envio do formulário
					//Abaixo se garante que caso algum dos campos esteja vazio o formulário não será enviado
					if(campo_vazio)
						return false;
				});
			});						
		</script>
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <img src="imagens/icone_twitter.png" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="inscrevase.php">Inscrever-se</a></li>
				<!-Usando a tag curta do php e operador ternário para se caso houve erro de login manter a janelinha de login aberta->
	            <li class="<?= $erro == 1 ? 'open' : '' ?>">
	            	<a id="entrar" data-target="#" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Entrar</a>
					<ul class="dropdown-menu" aria-labelledby="entrar">
						<div class="col-md-12">
				    		<p>Você possui uma conta?</h3>
				    		<br />
							<form method="post" action="validar_acesso.php" id="formLogin">
								<div class="form-group">
									<input type="text" class="form-control" id="campo_usuario" name="usuario" placeholder="Usuário" />
								</div>
								
								<div class="form-group">
									<input type="password" class="form-control red" id="campo_senha" name="senha" placeholder="Senha" />
								</div>
								
								<button type="buttom" class="btn btn-primary" id="btn_login">Entrar</button>

								<br /><br />
								
							</form>
						<?php
							if($erro == 1) 
								echo '<font color="#FF0000">Usuário e ou senha inválidos(s)</font>';
						?>

						</form>
				  	</ul>
	            </li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">

	      <!-- Main component for a primary marketing message or call to action -->
	      <div class="jumbotron">
	        <h1>Bem vindo ao twitter clone</h1>
	        <p>Veja o que está acontecendo agora...</p>
	      </div>

	      <div class="clearfix"></div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>