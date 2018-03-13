<html>
    <head>
		<title>Requisição de Manutenção</title>
	    <link rel="stylesheet" type="text/css" href="style/style.css">
		<?php
			// A sessão precisa ser iniciada em cada página diferente
			if (!isset($_SESSION)) session_start();
	
		    // Verifica se não há a variável da sessão que identifica o usuário
			if (!isset($_SESSION['UsuarioNome']))
			{
				// Destrói a sessão por segurança
				session_destroy();
				// Redireciona o visitante de volta pro login
				header("Location: index.php"); exit;
			}
            
			if(($_SESSION['UsuarioNivel'] != 1))
			{
				session_destroy();
				header("Location: index.php"); exit;
			}
		?>
	</head>
    <body>
	    <div>
		<nav id="menu2">
			<ul>
				<li><a href="userindex.php">Abrir Chamado</a></li>
				<li><a href="visualizarstatus.php">Visualizar Status</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
	    </div>
	    	    <div class="login-container login-container3">
		    <div class="login-header">
            <h2>Gerar Chamado</h2>
        </div>
       	<div class="login-content">
            <form method="POST" action="validarchamado.php">
				<div class="form-group">
                    <label class="legend">Descrição</label>
                    <input type="text" id="descricao" name="descricao" class="inputs" placeholder="" id="descricao">
		    </div>
             		<div class="form-group">
                    <label class="legend">Setor</label>
                    <input type="text" name="setor" id="setor" class="inputs" placeholder="">
			</div>
			<div class="form-group">
                    <label class="legend">Equipamento</label>
                    <input type="text" name="equipamento" id="equipamento" class="inputs" placeholder=""></div>
		<div class="form-group">
				<label class="legend">Marca</label>
                    <input type="text" name="marca" id="marca" class="inputs" placeholder=""></div>
			<div class="form-group">	
				<label class="legend">NI</label>
                    <input type="text" name="ni" id="ni" class="inputs" placeholder=""></div>
			<div class="form-group">	
				<label class="legend">Local</label>
                    <input type="text" name="local" id="local" class="inputs" placeholder="">
				</div>
                <div>
					<button type="submit" value="entrar" id="entrar" name="entrar" class="button2">Gravar</button>
                <div class="clearfix"></div>
			</form>
        </div>
    </div>    
    </body>
</html>
