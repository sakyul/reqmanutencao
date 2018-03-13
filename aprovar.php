<html>
	<head>
		<title>Requisição de Manutenção</title>
		<link rel="stylesheet" type="text/css" href="style/style.css">
	</head>
    <body>
		<nav id="menu2">
			<ul>
				<li><a href="admindex.php">Gerenciar Chamados</a></li>
				<li><a href="novochamado.php">Abrir Chamado</a></li>
				<li><a href="alterarchamado.php">Atualizar Status</a></li>
				<li><a href="aprovar.php">Aprovar Cadastros</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</nav>
		<h2>Usuários Para Aprovar</h2>
        <table>
            <thead>
				<tr>
                	<th>Usuário</th>
		  			<th>E-mail</th>
               		<th>Nível de Acesso</th>
                	<th>Avaliar</th>
                </tr>
            </thead>
           	<tbody>
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
				
				$mysqli = new mysqli('us-cdbr-iron-east-05.cleardb.net', 'b826fddc1ac1cd', '0f940cc1', 'heroku_b9b5552aa4f5594');
				
				//checa conexão
				if($mysqli->connect_errno)
				{
					printf("Connect failed: %s\n", $mysqli->connect_error);
					exit();
				}
			
				$aprovar = "aprovar";
				$recusar = "recusar";
				
				$query = "SELECT * FROM usuarios";	
				if($result = $mysqli->query($query))
				{
					
					while($dados = $result->fetch_array(MYSQLI_BOTH))
					{
						if($dados['ativo'] == 0)
						{
													
							if($dados['nivel'] == 2)
							{
								$acesso = "Administrador";
							} 
							else 
							{
								$acesso = "Usuário";	
							}
							echo 
								"<tr>
									<td>" . $dados['usuario'] . "</td>
									<td>" . $dados['email'] . "</td>
									<td >" . $acesso . "</td>
									<td>
										<a id='button3' href='validaraprovar.php?usuario=". $dados['usuario'] ." &aprovar=". $aprovar ."'>Aprovar</a>								
										<a id='button3' href='validaraprovar.php?usuario=". $dados['usuario'] ." &recusar=".$recusar."'>Recusar</a>
									</td>
								</tr>";
						}
					}        
				} 
			?> 			
            </tbody>
        </table>
	    </form>
	</body>
</html>
