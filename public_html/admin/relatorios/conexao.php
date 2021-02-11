<?php

    include_once('../../class/Autentica.class.php');
    include_once('../../class/Conexao.class.php');
    
    session_start();
	ob_start();
	
	$cod = isset($_SESSION['cod']) ? $_SESSION['cod']: "";	
	$usuario= isset($_SESSION['usuario']) ? $_SESSION['usuario']: "";	
	$pass = isset($_SESSION['pass']) ? $_SESSION['pass']: "";	
	$logado = isset($_SESSION['logado']) ? $_SESSION['logado']: "N";	

	if ($logado == "N" && $cod == ""){	    
		echo  "<script type='text/javascript'>
					location.href='../saidas.php'
				</script>";	
		exit();
	}

	$servidor = "localhost";
	$usuario = "shangr71";
	$senha = "rosa290880";
	$dbname = "shangr71_shangrila";
	
	//Criar a conexão
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
?>