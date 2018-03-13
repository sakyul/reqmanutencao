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

	$status = ($_POST['status']);
	$chamado = ($_POST['numero']);
	$observacao = ($_POST['observacao']);

	if($observacao == "" || $observacao == null)		
	{
		echo"<script language='javascript' type='text/javascript'>alert('Informe a observação do chamado');window.location.href='alterarchamado.php';</script>";
		break;
	}
	else
	{
		$mysqli = new mysqli('us-cdbr-iron-east-05.cleardb.net', 'b826fddc1ac1cd', '0f940cc1', 'heroku_b9b5552aa4f5594');
	
		//checa conexão
		if($mysqli->connect_errno)
		{
			printf("Connect failed: %s\n", $mysqli->connect_error);
			exit();
		}
		
		if($status == "Em Aberto")
		{
			$query = "UPDATE chamados SET observacao = '{$observacao}' WHERE numero ='{$chamado}'";
			$resultAtualizar = $mysqli->query($query);
			$resultAtualizar = $query;
			if($query)
			{
				echo"<script language='javascript' type='text/javascript'>alert('Chamado atualizado com sucesso');window.location.href='alterarchamado.php';</script>";
			}
		
			else
			{
				echo"<script language='javascript' type='text/javascript'>alert('Não foi possível atualizar este chamado');window.location.href='alterarchamado.php';</script>";
			}
		} 

		if ($status == "Encerrar")
		{
			// Tenta se conectar ao servidor MySQL
			$query = "UPDATE chamados SET situacao = 'Encerrado', observacao = '{$observacao}' WHERE numero ='{$chamado}'";
			$resultDelete = $mysqli->query($query);
			$resultDelete = $query;
			if($query)
			{
				echo"<script language='javascript' type='text/javascript'>alert('Chamado encerrado com sucesso');window.location.href='alterarchamado.php';</script>";
			}
		
			else
			{
				echo"<script language='javascript' type='text/javascript'>alert('Não foi possível encerrar este chamado');window.location.href='alterarchamado.php';</script>";
			}
		}
	}	
?>
