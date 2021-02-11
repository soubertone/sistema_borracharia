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

$mysqli = new mysqli('localhost', 'shangr71', 'rosa290880', 'shangr71_shangrila');
 
if ( $mysqli->connect_errno ) echo $mysqli->connect_errno, ' ', $mysqli->connect_error;
 
$sql = "SELECT * FROM funcionario WHERE cod IN('$cod')";

$result = $mysqli->query( $sql );

/* 
    while ( $row = $result->fetch_assoc() )  
    $codigo = $row['cod'];
    $nome = $row['nome'];
    $rg = $row['rg'];
    $cpf =  $row['cpf'];
    $tel =  $row['telefone'];
    $end = $row['endereco'];
    $num = $row['numero'];
    $email = $row['email'];
    $sexo = $row['sexo'];
    $datan = $row['datadenasc'];
*/    

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
        
        <fieldset style="width: 400px; margin: 5px;">
            <legend>Informações Pessoais</legend>
            <form action="sql/func.php" method="post">
        <table id="">
        <?php while ( $row = $result->fetch_assoc() )  echo '    
    <tr><td>Código: </td>
        <td><input type="text" name="cod" value="', $row['cod'],'" size="5" disabled required></td></tr>  
<tr><td>Nome: </td>
        <td><input type="text" name="nome" value="', $row['nome'],'" size="25" required></td></tr>
<tr><td>RG: </td>
        <td><input type="number" name="rg" pattern="\d{2}\.\d{3}\.\d{3}\-\d{1}" value="', $row['rg'],'" size="25" required></td></tr>
<tr><td>CPF: </td>
        <td><input type="number" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}\-\d{2}" value="', $row['cpf'],'" size="25" required></td></tr>
<tr><td>Telefone: </td>
        <td><input type="number" name="telefone" value="', $row['telefone'],'" size="25" required></td></tr>
<tr><td>Endereço: </td>
        <td><input type="text" name="endereco" value="', $row['endereco'],'" size="25" required></td></tr>
<tr><td>Número: </td>
        <td><input type="number" name="numero" value="', $row['numero'],'" size="25" required></td></tr>
<tr><td>Email: </td>
        <td><input type="email" name="email" value="', $row['email'],'" size="25" required></td></tr>
<tr><td>Sexo: </td>
        <td><input type="text" name="sexo" value="', $row['sexo'],'" size="25" maxlength="1" required></td></tr>
<tr><td>Data de Nascimento: </td>
        <td><input type="date" name="datadenasc" value="', $row['datadenasc'],'" size="25" required></td></tr>
        ' ?>
  </table>
            <table>
                <tr><td>
            <input type="submit" id="bt-editar" value="Atualizar cadastro">
                </td></tr>
            </table>
            </form>
    </fieldset>
        
	</center>
</div>
    </body>
</html>