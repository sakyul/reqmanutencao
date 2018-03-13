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
			
			$chamado = ($_GET['numero']);
	
			// Tenta se conectar ao servidor MySQL
			$mysqli = new mysqli('us-cdbr-iron-east-05.cleardb.net', 'b826fddc1ac1cd', '0f940cc1', 'heroku_b9b5552aa4f5594');
	
			//checa conexão
			if($mysqli->connect_errno)
			{
				printf("Connect failed: %s\n", $mysqli->connect_error);
				exit();
			}

			$query = "select * from chamados WHERE numero ='{$chamado}'";
			$resultAlt = $mysqli->query($query);
			$resultAlt = $query;
			if($result = $mysqli->query($query))
			{
				while($dados = $result->fetch_array(MYSQLI_BOTH))
				{
					if($dados['numero'] == $chamado)
					{
						$numero = $dados['numero'];
						$descricao = $dados['descricao'];
						$setor = $dados['setor'];
						$equipamento = $dados['equipamento'];
						$marca = $dados['marca'];
						$NI = $dados['NI'];
						$local = $dados['sala'];
						$observacao = $dados['observacao'];
					}			
				}
			}
			?>
			</head>
				<body>
					<div id="menu">
						<ul>
							<li><a href="admindex.php">Visualizar Status</a></li>
							<li><a href="novochamado.php">Abrir Chamado</a></li>
							<li><a href="alterarchamado.php">Alterar Status</a></li>
							<li><a href="aprovar.php">Aprovar Cadastros</a></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</div>
					
					<div class='login-container login-container2'>
						<div class='login-header'>
							<h2>Alterar Chamado</h2>
						</div>
						<div class='login-content'>
							<form method='POST' action='encerrarchamado.php'>
								<div>
									<label class='legend'>Número</label>
									<input type="text" id="numero" name="numero" id="descricao" value="<?php echo $numero ?>" readonly>
								</div>
								
								<div>
									<label class='legend'>Descrição</label>
									<input type="text" id="descricao" name="descricao" id="descricao" value="<?php echo $descricao ?>" readonly>
								</div>
             		
								<div>
									<label class='legend'>Setor</label>
									<input type="text" id="descricao" name="descricao" id="descricao" value="<?php echo $setor ?>" readonly>
								</div>
					
								<div>
									<label class='legend'>Equipamento</label>
									<input type="text" id="descricao" name="descricao" id="descricao" value="<?php echo $equipamento ?>" readonly>
								</div>
					
								<div>
									<label class='legend'>Marca</label>
									<input type="text" id="descricao" name="descricao" id="descricao" value="<?php echo $marca ?>" readonly>
								</div>
					
								<div>
									<label class='legend'>NI</label>
									<input type="text" id="descricao" name="descricao" id="descricao" value="<?php echo $NI ?>" readonly>
								</div>
					
								<div>
									<label class='legend'>Local</label>
									<input type="text" id="descricao" name="descricao" id="descricao" value="<?php echo $local ?>" readonly>
								</div>
								
								<div>
									<label class='legend'>Observação</label>
									<input type="text" id="observacao" name="observacao">
								</div>
								
								<div>
									<label class="legend">Status</label>
									<select name="status" class="inputs">
										<option name="Em Aberto">Em Aberto</option>
										<option name="Encerrar">Encerrar</option>
									</select>
								</div>
									
								<div>
									<button type="submit" value="entrar" id="entrar" name="entrar" class="button2">Atualizar</button>
							</form>
						</div>
					</div>    
				</body>
</html>
