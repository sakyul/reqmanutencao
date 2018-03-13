<?php
	$usuario = ($_POST['usuario']);
	$senha = ($_POST['senha']);
	$email = ($_POST['email']);
	$nivel = ($_POST['nivel']);
	
	// Tenta se conectar ao servidor MySQL
	$mysqli = new mysqli('us-cdbr-iron-east-05.cleardb.net', 'b826fddc1ac1cd', '0f940cc1', 'heroku_b9b5552aa4f5594');
	
	//checa conexão
	if($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
		
	//verifica se usuário já esta cadastrado
	$query = "SELECT usuario, email FROM usuarios";
	if($result = $mysqli->query($query))
	{
		//veriica campos vazios
		if($usuario == "" || $usuario == null)
		{
			echo"<script language='javascript' type='text/javascript'>alert('O campo usuario deve ser preenchido');window.location.href='registrar.php';</script>";
			break;
		}
	
		if($senha == "" || $senha == null)
		{
			echo"<script language='javascript' type='text/javascript'>alert('O campo senha deve ser preenchido');window.location.href='registrar.php';</script>";
			break;
		}
	
		if($email == "" || $email == null)
		{
			echo"<script language='javascript' type='text/javascript'>alert('O campo email deve ser preenchido');window.location.href='registrar.php';</script>";
			break;
		}
		
		//verifica se usuario ou email ja estao cadastrados
		while($dados = $result->fetch_array(MYSQLI_BOTH))
		{
			if($dados['usuario'] == $usuario)
			{
				echo"<script language='javascript' type='text/javascript'>alert('Usuario ja cadastrado');window.location.href='registrar.php';</script>"; 
				
			}
				
			elseif($dados['email'] == $email)
			{
				echo"<script language='javascript' type='text/javascript'>alert('Email ja cadastrado');window.location.href='registrar.php';</script>"; 
			}
		}
		
		//realiza a inserção no banco de dados
		$inserirNivel;
		if($nivel == 'Usuario')
		{
			$inserirNivel = 1;
		} 
		if($nivel == 'Administrador')
		{	
			$inserirNivel = 2;
		}
		$ativo = 0;
		$insert = "INSERT INTO usuarios VALUES ('$usuario','$senha', '$email', '$inserirNivel', '$ativo')";
		$resultInsert = $mysqli->query($insert);
		$resultInsert = $insert;
		if($insert)
		{
			echo"<script language='javascript' type='text/javascript'>alert('Usuario cadastrado com sucesso, aguarde algum administrador aprovar o cadastro');window.location.href='index.php';</script>";	
		}
		else 
		{	
			echo"<script language='javascript' type='text/javascript'>alert('Não foi possível cadastrar esse usuário');window.location.href='registrar.php';</script>";
		}
	}	
?>