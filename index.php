<html>
<head>
    <title>Requisição de Manutenção</title>
    <link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body>
<div class="body">
	    <div class="login-container">
		    <div class="login-header">
				<h2>Requisição de Manutenção</h2>
			</div>
            <form method="POST" action="validacao.php">
				<div>
                    <label class="legend">Username</label class="legend">
                    <input type="text" name="usuario" class="form-control" placeholder="" id="usuario">
                </div>
                <div>
                    <label class="legend">Password</label class="legend">
                    <input type="password" name="senha" id="senha" class="form-control" placeholder="">
				</div>
                <div>
					<button type="submit" value="entrar" id="entrar" name="entrar" action="validacao.php">Entrar</button>
			</form>
			<form method="POST" action="registrar.php">
				<button type="submit" value="registrar" id="registrar" name="registrar" action="registrar.php">Registrar</button>
            </form>
        </div>
    </div>
	</div>
</body>
</html>
