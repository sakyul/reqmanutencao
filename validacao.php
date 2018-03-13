<?php
	// Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
	if ((empty($_POST['usuario']) OR empty($_POST['senha']))) 
	{
		header("Location: index.php"); exit;
	}

	$usuario = ($_POST['usuario']);
	$senha = ($_POST['senha']);

	// Tenta se conectar ao servidor MySQL
	$mysqli = new mysqli('us-cdbr-iron-east-05.cleardb.net', 'b826fddc1ac1cd', '0f940cc1', 'heroku_b9b5552aa4f5594');

	//checa conexão
	if($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
	$query = "SELECT * FROM usuarios";
	//select queries return a resultset
	if($result = $mysqli->query($query))
	{
		//printf("Select returned %d rows. \n", $result->num_rows);
		while($dados = $result->fetch_array(MYSQLI_BOTH))
		{
			if(($dados['usuario'] == $usuario) && ($dados['senha'] == $senha))
			{
				if($dados['ativo'] != 0)
				{				
					if($dados['nivel'] == 2)
					{
						session_start();
						$_SESSION['UsuarioID'] = $dados['id'];
						$_SESSION['UsuarioNome'] = $dados['usuario'];
						$_SESSION['UsuarioNivel'] = $dados['nivel'];
						$result->close();
						$mysqli->close();
						header("Location: admindex.php"); exit;
						break;
					}
					else 
					{
						session_start();
						$_SESSION['UsuarioID'] = $dados['id'];
						$_SESSION['UsuarioNome'] = $dados['usuario'];
						$_SESSION['UsuarioNivel'] = $dados['nivel'];
						$result->close();
						$mysqli->close();
						header("Location: userindex.php"); exit;
						break;		
					}
				} else
				{
					echo '<script>alert("Usuário não ativado, contate um administrador");location.href="index.php";</script>;';	
				}
			}
		}
		echo '<script>alert("Usuário ou senha inexistentes");location.href="index.php";</script>;';
		$result->close();
		$mysqli->close();
	}	
?>