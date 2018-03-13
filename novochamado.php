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
			
			if(($_SESSION['UsuarioNivel'] != 2))
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
				<li><a href="admindex.php">Gerenciar Chamados</a></li>
				<li><a href="novochamado.php">Abrir Chamado</a></li>
				<li><a href="alterarchamado.php">Atualizar Status</a></li>
				<li><a href="aprovar.php">Aprovar Cadastros</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
		</div>
	    <div class="login-container login-container3">
		    <div class="login-header">
            <h2>Novo Chamado</h2>
        </div>
       	<div class="login-content">
            <form method="POST" action="validarchamado.php">
				<div>
                    <label class="legend">Descrição</label>
                    <input type="text"  name="descricao" id="descricao">
		    </div>
             		<div>
                    <label class="legend">Setor</label>
                    <input type="text" name="setor" id="setor">
			</div>
			<div>
                    <label class="legend">Equipamento</label>
                    <input type="text" name="equipamento" id="equipamento"></div>
		<div class="form-group">
				<label class="legend">Marca</label>
                    <input type="text" name="marca" id="marca"></div>
			<div class="form-group">	
				<label class="legend">NI</label>
                    <input type="text" name="ni" id="ni"></div>
			<div>	
				<label class="legend">Local</label>
                    <input type="text" name="local" id="local">
				</div>
                <div>
					<button type="submit" value="entrar" id="entrar" name="entrar" class="button2">Gravar</button>
			</form>
        </div>
    </div>    
	</body>
</html>
