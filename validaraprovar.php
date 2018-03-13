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
	
	$user = ($_GET['usuario']);
	$aprovar = ($_GET['aprovar']);
	$recusar = ($_GET['recusar']);
	
	// Tenta se conectar ao servidor MySQL
	$mysqli = new mysqli('us-cdbr-iron-east-05.cleardb.net', 'b826fddc1ac1cd', '0f940cc1', 'heroku_b9b5552aa4f5594');
	
	//checa conexão
	if($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
	if($aprovar == 'aprovar')
	{
		$query = "UPDATE usuarios SET ativo = 1 WHERE usuario ='{$user}'";
		$resultAlt = $mysqli->query($query);
		$resultAlt = $query;
		if($query)
		{
			echo"<script language='javascript' type='text/javascript'>alert('Usuário ativado com sucesso');window.location.href='aprovar.php';</script>";
		}
		
		else
		{
			echo"<script language='javascript' type='text/javascript'>alert('Não foi possível ativar este usuário');window.location.href='aprovar.php';</script>";
		}
	}

	if($recusar != "" && $recusar != null)
	{
		$query = "DELETE FROM usuarios WHERE usuario ='{$user}'";
		$resultDel = $mysqli->query($query);
		$resultDel = $query;
		if($query)
		{
			echo"<script language='javascript' type='text/javascript'>alert('Usuário removido com sucesso');window.location.href='aprovar.php';</script>";
		}
		
		else
		{
			echo"<script language='javascript' type='text/javascript'>alert('Não foi possível remover este usuário');window.location.href='aprovar.php';</script>";
		}
	}
?>
