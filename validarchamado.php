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
    $usuario = ($_SESSION['UsuarioNome']);
    $nivel = ($_SESSION['UsuarioNivel']);
    $descricao = ($_POST['descricao']);
    $setor = ($_POST['setor']);
    $solicitante = $usuario;
    $equipamento = ($_POST['equipamento']);
    $marca = ($_POST['marca']);
    $ni = ($_POST['ni']);
    $local = ($_POST['local']);
    	
	// Tenta se conectar ao servidor MySQL
	$mysqli = new mysqli('us-cdbr-iron-east-05.cleardb.net', 'b826fddc1ac1cd', '0f940cc1', 'heroku_b9b5552aa4f5594');
	
	//checa conexão
	if($mysqli->connect_errno)
	{
		printf("Connect failed: %s\n", $mysqli->connect_error);
		exit();
	}
	
	if($nivel == 2)
	{
        if($descricao == "" || $descricao == null)
        {
    	    echo"<script language='javascript' type='text/javascript'>alert('Informe a descrição do chamado');window.location.href='novochamado.php';</script>";
			break;
        }
        
        if($setor == "" || $setor == null)
        {
     	    echo"<script language='javascript' type='text/javascript'>alert('Informe o setor desejado');window.location.href='novochamado.php';</script>";
			break;           
        }
        
        if($equipamento == "" || $equipamento == null)
        {
     	    echo"<script language='javascript' type='text/javascript'>alert('Informe o equipamento a ser reparado');window.location.href='novochamado.php';</script>";
			break;           
        }
        
        if($marca == "" || $marca == null)
        {
     	    echo"<script language='javascript' type='text/javascript'>alert('Informe a marca do equipamento');window.location.href='novochamado.php';</script>";
			break;           
        }
        
        if($ni == "" || $ni == null)
        {
     	    echo"<script language='javascript' type='text/javascript'>alert('Informe o NI do equipamento');window.location.href='novochamado.php';</script>";
			break;           
        }
        
        if($local == "" || $local == null)
        {
     	    echo"<script language='javascript' type='text/javascript'>alert('Informe o local do equipamento');window.location.href='novochamado.php';</script>";
			break;           
        }
		date_default_timezone_set('America/Sao_Paulo');
        $date = date("Y-m-d H:i:s");
        $insert = "INSERT INTO chamados	VALUES 
		(DEFAULT, 'Em Aberto', '$date', '$descricao', '$setor', '$solicitante', '$equipamento', '$marca', '$ni', '$local', NULL)";
        $resultInsert = $mysqli->query($insert);
		$resultInsert = $insert;
		if($insert)
		{
			echo"<script language='javascript' type='text/javascript'>alert('Chamado cadastrado com sucesso');window.location.href='novochamado.php';</script>";	
		}
		else 
		{	
			echo"<script language='javascript' type='text/javascript'>alert('Não foi possível gerar o chamado');window.location.href='novochamado.php';</script>";
		}
	}	
	if($nivel == 1)
	{
        if($descricao == "" || $descricao == null)
        {
    	    echo"<script language='javascript' type='text/javascript'>alert('Informe a descrição do chamado');window.location.href='userindex.php';</script>";
			break;
        }
        
        if($setor == "" || $setor == null)
        {
     	    echo"<script language='javascript' type='text/javascript'>alert('Informe o setor desejado');window.location.href='userindex.php';</script>";
			break;           
        }
        
        if($equipamento == "" || $equipamento == null)
        {
     	    echo"<script language='javascript' type='text/javascript'>alert('Informe o equipamento a ser reparado');window.location.href='userindex.php';</script>";
			break;           
        }
        
        if($marca == "" || $marca == null)
        {
     	    echo"<script language='javascript' type='text/javascript'>alert('Informe a marca do equipamento');window.location.href='userindex.php';</script>";
			break;           
        }
        
        if($ni == "" || $ni == null)
        {
     	    echo"<script language='javascript' type='text/javascript'>alert('Informe o NI do equipamento');window.location.href='userindex.php';</script>";
			break;           
        }
        
        if($local == "" || $local == null)
        {
     	    echo"<script language='javascript' type='text/javascript'>alert('Informe o local do equipamento');window.location.href='userindex.php';</script>";
			break;           
        }
		date_default_timezone_set('America/Sao_Paulo');
        $date = date("Y-m-d H:i:s");
        $insert = "INSERT INTO chamados	VALUES 
		(DEFAULT, 'Em Aberto', '$date', '$descricao', '$setor', '$solicitante', '$equipamento', '$marca', '$ni', '$local', NULL)";
        $resultInsert = $mysqli->query($insert);
		$resultInsert = $insert;
		if($insert)
		{
			echo"<script language='javascript' type='text/javascript'>alert('Chamado cadastrado com sucesso');window.location.href='userindex.php';</script>";	
		}
		else 
		{	
			echo"<script language='javascript' type='text/javascript'>alert('Não foi possível gerar o chamado');window.location.href='userindex.php';</script>";
		}
	}
?>
