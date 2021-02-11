<?php

    require_once('../class/Autentica.class.php');
    require_once('../class/Conexao.class.php');

    session_start();
	ob_start();
	
	$cod = isset($_SESSION['cod']) ? $_SESSION['cod']: "";	
	$usuario= isset($_SESSION['usuario']) ? $_SESSION['usuario']: "";	
	$pass = isset($_SESSION['pass']) ? $_SESSION['pass']: "";
	$logado = isset($_SESSION['logado']) ? $_SESSION['logado']: "N";

    $mysqli = new mysqli('localhost', 'shangr71', 'rosa290880', 'shangr71_shangrila');
 
    if ( $mysqli->connect_errno ) echo $mysqli->connect_errno, ' ', $mysqli->connect_error;
 
    $sql = "SELECT * FROM funcionario WHERE cod IN('$cod')";
    $result = $mysqli->query( $sql );
    while ( $row = $result->fetch_assoc() )

	if ($logado == "N" && $cod == ""){	    
		echo  "<script type='text/javascript'>
					location.href='home.php'
				</script>";	
		exit();
	}

    elseif ($row['priv'] == "admin") {
        echo  "<script type='text/javascript'>
                    location.href='home.php'
                </script>";
    }

    else {
        echo  "<script type='text/javascript'>
					alert('Sem autorização!');location.href='../logado.php'
		</script>";
    }

?>