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

$mysqli = new mysqli('localhost', 'root', 'admin', 'shangria');
 
if ( $mysqli->connect_errno ) echo $mysqli->connect_errno, ' ', $mysqli->connect_error;
 
$sql = 'SELECT cod, nome, rg, cpf, cidade, estado, telefone, endereco, numero FROM cliente';

$result = $mysqli->query( $sql );
 
// while ( $row = $result->fetch_assoc() )  echo $row['cod'], ' ', $row['nome'], ' ',  $row['cidade'], ' ' , $row['estado'], ' ' , $row['endereco'], ' ' , "<br>";
 
?>
<html lang="pt-br">
<head>
        <meta charset="utf-8">
    	<link rel="stylesheet" type="text/css" href="style.css" />
    <title>Shangrila Sistemas - Clientes</title>       
    </head>
    
    <body>
        
    <div class="cabecalho">
        <h2> Shangrila Sistemas</h2>
                
        <a href="logout.php" id="sair"><h5>Sair</h5></a>
        </div>
        
    <div class="corpo">
        <div class="menu">
        <a href="home.php"><h4>Home</h4></a>    
        <a href="cliente.php"><h4>Clientes</h4></a>
        <a href="estoque.php"><h4>Estoque</h4>   </a> 
        <a href="funcionario.php"><h4>Funcionarios</h4></a> 
        <a href="saidas.php"><h4>Registros de Saída</h4></a>
        </div>
        </div>
        
        <img src="img/logo.png" alt="Borracharia Shangrila" id="logo">
        
        <div class="conteudo">
            <fieldset style="width: 920px;">
                <legend id="title">Clientes</legend>        
                
        <div style="overflow: auto; height: 250px; width:887px; border:1px solid;">
            <table border="1" id="tabcliente">
    <tr>
      <td>Código</td>
      <td>Nome</td>
        <td>RG</td>
        <td>CPF</td>
      <td>Cidade</td>
      <td>Estado</td>
        <td>Telefone</td>
      <td>Endereço</td>
        <td>Número</td>
    </tr>
      <?php while ( $row = $result->fetch_assoc() )  echo '<tr><td>', $row['cod'], '</td><td>', $row['nome'], '</td><td> ', $row['rg'], '</td><td> ', $row['cpf'], '</td> <td>',  $row['cidade'], '</td> <td> ' , $row['estado'], '</td> <td> ' , $row['telefone'], '</td> <td>', $row['endereco'], '</td><td>', $row['numero'], '</td>', "</tr>"; ?>
  </table>
            </div>
            
    <br>
                
          <a href="insert/cliente.php"><input id="but1" type="button" value="Inserir Novo"></a>
        <a href="del/cliente.php"><input id="but1" type="button" value="Deletar cliente"></a>
     
        <?php 
    
    $mysqli->close();
    ?>
        </fieldset>
        </div>
        
    </body>

</html>