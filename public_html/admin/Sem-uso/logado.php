<?php

    session_start();
	ob_start();

	$id_users = isset($_SESSION['id_users']) ? $_SESSION['id_users']: "";	
	$nome_user = isset($_SESSION['nome_user']) ? $_SESSION['nome_user']: "";	
	$usuario= isset($_SESSION['usuario']) ? $_SESSION['usuario']: "";	
	$pass = isset($_SESSION['pass']) ? $_SESSION['pass']: "";	
	$logado = isset($_SESSION['logado']) ? $_SESSION['logado']: "N";	

	if ($logado == "N" && $id_users == ""){	    
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
	<title>Borracharia Shangri-la</title>
</head>
<body>
	<center>
		<article>
			<h1><?php echo $nome_user;?> voc&ecirc; est&aacute; logado...</h1>
			<a href="logout.php"><input type="button" value="Sair"/></a>
		</article>
	</center>
</body>
</html>