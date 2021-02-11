<?php

    if ( !isset( $_POST ) || empty( $_POST ) ) {
	echo  "<script type='text/javascript'>
					alert('Alguns campos não foram preenchidos');location.href='../regfunc.php'
		</script>";
    }

    require_once('../class/Autentica.class.php');
    require_once('../class/Conexao.class.php');

    session_start();
	ob_start();
	
	$cod = isset($_SESSION['cod']) ? $_SESSION['cod']: "";	
	$usuario= isset($_SESSION['usuario']) ? $_SESSION['usuario']: "";	
	$pass = isset($_SESSION['pass']) ? $_SESSION['pass']: "";	
	$logado = isset($_SESSION['logado']) ? $_SESSION['logado']: "N";	

	if ($logado == "N" && $id_users == ""){	    
		echo  "<script type='text/javascript'>
					location.href='index.php'
				</script>";	
		exit();
	}

    $nome = $_POST['nome'];
    $rg = $_POST['rg'];
    $cpf =  $_POST['cpf'];
    $telefone =  $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $email = $_POST['email'];
    $sexo = $_POST['sexo'];
    $datadenasc = $_POST['datadenasc'];

    $mysqli = new mysqli('localhost', 'shangr71', 'rosa290880', 'shangr71_shangrila');
    if ( $mysqli->connect_errno ) echo $mysqli->connect_errno, ' ', $mysqli->connect_error;

    $resultado = "UPDATE funcionario SET nome='$nome', rg='$rg', cpf='$cpf', telefone='$telefone', endereco='$endereco', numero='$numero', email='$email', sexo='$sexo', datadenasc='$datadenasc' WHERE cod='$cod'";
    $result = mysqli_query($mysqli, $resultado);

    echo  "<script type='text/javascript'>
					alert('Cadastro atualiado');location.href='../regfunc.php'
		</script>";

?>