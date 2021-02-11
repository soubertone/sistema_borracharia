<?php

    require_once('class/Autentica.class.php');
    require_once('class/Conexao.class.php');

    session_start();
	ob_start();
	
	$cod = isset($_SESSION['cod']) ? $_SESSION['cod']: "";	
	$usuario= isset($_SESSION['usuario']) ? $_SESSION['usuario']: "";	
	$pass = isset($_SESSION['pass']) ? $_SESSION['pass']: "";	
	$logado = isset($_SESSION['logado']) ? $_SESSION['logado']: "N";	

	if ($logado == "N"){	    
		echo  "<script type='text/javascript'>
					location.href='index.php'
				</script>";	
		exit();
	}
?>
<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	
    <title>Shangrila Sistemas</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    
    <div class="content">
	<center>
		<article>
			<h1>Olá <a style="color: red;"><?php echo $usuario;?></a></h1>
            
            <a href="logado.php"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Início"/></a>
            <a href="admin/"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Admin"/></a>
            <a href="regfunc.php"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Ver meus dados"/></a>
        	<a href="cponto.php"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Cartão Ponto"/></a>
            <a href="reg.php"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Registros"/></a>
			<a href="logout.php"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Sair"/></a>
		</article>
	</center>
</div>


    </body>
</html>