<?php
    
    require_once('class/Autentica.class.php');
    require_once('class/Conexao.class.php');

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

    $data = $_POST['data'];
    $codcliente = $_POST['codcliente'];
    $valorunit = $_POST['valorunit'];
    $codprodutopneu = $_POST['codprodutopneu'];
    $quantidade = $_POST['quantidade'];

    $mysqli = new mysqli('localhost', 'root', 'admin', 'borracharia_sh');
    if ( $mysqli->connect_errno ) echo $mysqli->connect_errno, ' ', $mysqli->connect_error;

    $resultado = "INSERT INTO venda_pneu (data, codproduto_pneu, quantidade, valorunit, codcliente) VALUES ('$data', '$codprodutopneu', '$quantidade', '$valorunit', '$codcliente')";
    $result = mysqli_query($mysqli, $resultado);

     echo  "<script type='text/javascript'>
    				alert('Compra registrada!');location.href='../vendapneu.php'
    	</script>";

?>