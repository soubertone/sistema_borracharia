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
					location.href='index.php'
				</script>";	
		exit();
	}

// Connecting, selecting database
$mysqli = new mysqli('localhost', 'shangr71', 'rosa290880', 'shangr71_shangrila');
 
// Check erros
if ( $mysqli->connect_errno ) echo $mysqli->connect_errno, ' ', $mysqli->connect_error;
 
// SQL query
$sql = 'SELECT id_users, nome_user, usuario, pass FROM users';

 
// Printing results
$result = $mysqli->query( $sql );
 
// while ( $row = $result->fetch_assoc() )  echo $row['cod'], ' ', $row['nome'], ' ',  $row['cidade'], ' ' , $row['estado'], ' ' , $row['endereco'], ' ' , "<br>";
 
// Close Connection
?>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8"/>
	<title>Users - Shangri La</title>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">

</head>
<body>
    
    <img src="img/logo2.png" alt="logo">    <br>
    
   <br>
    
        <div id="texto1">Usuarios</div>
    
        <table border="1" id="table">
    <tr>
      <td>Código</td>
      <td>Nome</td>
      <td>Usuario</td>
      <td>Senha</td>
    </tr>
      <?php while ( $row = $result->fetch_array() )  echo '<tr><td>', $row['id_users'], '</td><td>', $row['nome_user'], '<br></td><td>',  $row['usuario'], '</td> <td>' , $row['pass'], '</td> ' , "</tr>"; ?>
  </table>
    <?php 
    
    //Encerra conexão
    $mysqli->close();
    ?>
    
                <p><a href="home.php"><input type="button" value="Pagina inicial"/></a></p>
    
</body>
</html>