<html>
<head>
    <title>Requisição de Manutenção</title>
    <link rel='stylesheet' type='text/css' href='style/style.css'>
</head>
<body>
    <div class='login-container login-container4'>
        <div class='login-header'>
            <h2>Cadastro</h2>
        </div>
            <form method='POST' action='validarcadastro.php'>
				<div>
                    <label class='legend'>Username</label class='legend'>
                    <input type='text' name='usuario' id='usuario' >
                </div>
				<div>
                    <label class='legend'>E-mail</label class='legend'>
                    <input type='email' name='email' id='email' >
                </div>
                <div>
                    <label class='legend'>Password</label class='legend'>
                    <input type='password' name='senha' id='senha' >
				</div>
				<div>
                    <label class='legend'>Nível</label class='legend'>
					<select name='nivel' class='inputs'>
						<option name='Usuario'>Usuario</option>
						<option name='Administrador'>Administrador</option>
					</select>
				</div>
				<div>
                	<button type='submit' value='registrar' id='registrar' class="button2" name='registrar'>Registrar</button>
				</div>
            </form>
    </div>
</body>
</html>
