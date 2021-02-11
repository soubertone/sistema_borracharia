<?php
    
    session_start();
	ob_start();

	$id_users = isset($_SESSION['id_users']) ? $_SESSION['id_users']: "";	
	$nome_user = isset($_SESSION['nome']) ? $_SESSION['nome']: "";	
	$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario']: "";	
	$pass = isset($_SESSION['pass']) ? $_SESSION['pass']: "";	
	$logado = isset($_SESSION['logado']) ? $_SESSION['logado']: "N";	

	if ($logado == "N" && $id_users == ""){	    
		echo  "<script type='text/javascript'>
					location.href='.../index.php'
				</script>";	
		exit();
	}
    
    $id = $_POST['id'];

    $mysqli = new mysqli('localhost', 'root', 'admin', 'borracharia_sh');
    if ( $mysqli->connect_errno ) echo $mysqli->connect_errno, ' ', $mysqli->connect_error;

    $resultado = "DELETE FROM venda_pneu WHERE `cod` = '".$id."'";

    $result = mysqli_query($mysqli, $resultado);

    echo  "<script type='text/javascript'>
					alert('Deletado com sucesso');location.href='../saidaspneu.php'
		</script>";
?>