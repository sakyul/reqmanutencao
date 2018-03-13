<html>
	<head>
		<title>Requisição de Manutenção</title>   
		<link rel="stylesheet" type="text/css" href="style/style.css">
		﻿<?php
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
		<div id="menu">
			<ul>
				<li><a href="admindex.php">Gerenciar Chamados</a></li>
				<li><a href="novochamado.php">Abrir Chamado</a></li>
				<li><a href="alterarchamado.php">Atualizar Status</a></li>
				<li><a href="aprovar.php">Aprovar Cadastros</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>
		<h2>Gerenciar Chamados</h2>
        <table>
            <thead>
				<tr>
                	<th>N°</th>
		  			<th>Status</th>
               		<th>Data de Solicitação</th>
                	<th>Descrição</th>
		  			<th>Setor</th>	
                	<th>Solicitante</th>
		  			<th>Equipamento</th>
		  			<th>Marca</th>	
		  			<th>NI</th>
		  			<th>Local</th>
					<th>Observação</th>
                </tr>
            </thead>
           	<tbody>
				<?php 
					$mysqli = new mysqli('us-cdbr-iron-east-05.cleardb.net', 'b826fddc1ac1cd', '0f940cc1', 'heroku_b9b5552aa4f5594');
					//checa conexão
					if($mysqli->connect_errno)
					{
						printf("Connect failed: %s\n", $mysqli->connect_error);
						exit();
					}
					$query = "SELECT * FROM chamados";
					if($result = $mysqli->query($query))
					{
						while($dados = $result->fetch_array(MYSQLI_BOTH))
						{
							echo "<tr>
							<td>" . $dados['numero'] . "</td>
							<td>" . $dados['situacao'] . "</td>
							<td>" . $dados['datasolicitacao'] . "</td>
							<td>" . $dados['descricao'] . "</td>
							<td>" . $dados['setor'] . "</td>
							<td>" . $dados['solicitante'] . "</td>
							<td>" . $dados['equipamento'] . "</td>
							<td>" . $dados['marca'] . "</td>
							<td>" . $dados['NI'] . "</td>
							<td>" . $dados['sala'] . "</td>
							<td>" . $dados['observacao'] . "</td>
							</tr>";
						}
					}
				?> 
            </tbody>
        </table>
	</body>
</html>
