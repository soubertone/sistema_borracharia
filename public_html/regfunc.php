<?php

    include_once('class/Autentica.class.php');
    include_once('class/Conexao.class.php');

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


$mysqli = new mysqli('localhost', 'shangr71', 'rosa290880', 'shangr71_shangrila');
 
if ( $mysqli->connect_errno ) echo $mysqli->connect_errno, ' ', $mysqli->connect_error;
 
$sql = "SELECT * FROM funcionario WHERE cod IN('$cod')";

$result = $mysqli->query( $sql );

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
			<h1>Olá <a style="color: red;" ><?php echo $usuario;?></a></h1>
            
            <a href="logado.php"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Início"/></a>
            <a href="admin/"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Admin"/></a>
            <a href="regfunc.php"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Ver meus dados"/></a>
        	<a href="cponto.php"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Cartão Ponto"/></a>
            <a href="reg.php"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Registros"/></a>
			<a href="logout.php"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Sair"/></a>
        
        <fieldset style="width: 990px; margin: 5px;">
            <legend>Informações Pessoais</legend>
        <table border="1" id="">
    <tr>
        <td>Código</td>
        <td>Nome</td>
        <td>RG</td>
        <td>CPF</td>
        <td>Telefone</td>
        <td>Endereço</td>
        <td>Numero</td>
        <td>Email</td>
        <td>Sexo</td>
        <td>Data de Nascimento</td>

    </tr>
      <?php while ( $row = $result->fetch_assoc() )  echo '<tr><td>', $row['cod'], '</td><td>', $row['nome'], '</td><td> ', $row['rg'], '</td><td> ', $row['cpf'], '</td> <td>',  $row['telefone'], '</td> <td> ' , $row['endereco'], '</td> <td> ' , $row['numero'], '</td> <td>', $row['email'], '</td><td>', $row['sexo'], '</td><td>', $row['datadenasc'], '</td>', "</tr>"; ?>
  </table>
            <table>
                <tr><td>
            <a href="editfunc.php"><input type="button" id="bt-editar" value="Atualizar cadastro"></a>
                </td></tr>
            </table>
            
    </fieldset>
        </article>
        </center>        
</div>        
</body>
</html>