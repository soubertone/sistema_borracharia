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
 
$sql = 'SELECT * FROM produto_pneu';
$sql2 = 'SELECT * FROM produto_insumo';
 
$result = $mysqli->query( $sql );
 
// while ( $row = $result->fetch_assoc() )  echo $row['cod'], ' ', $row['nome'], ' ',  $row['cidade'], ' ' , $row['estado'], ' ' , $row['endereco'], ' ' , "<br>";
 
?>
<html lang="pt-br">
<head>
        <meta charset="utf-8">
    	<link rel="stylesheet" type="text/css" href="style.css" />
    <title>Shangrila Sistemas - Estoque Pneus</title>       
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
            <fieldset style="width: 880px; margin: 5px;">
                <legend id="title">Estoque de pneus</legend>
            
        <div style="overflow: auto; height: 250px; width:825px; border:1px solid;">
        <table border="1" id="tabestoq">
    <tr>
      <td>Código</td>
        <td>Data de chegada</td>
      <td>Veiculo</td>
        <td>Aro</td>
        <td>Tamanho</td>
      <td>Marca</td>
      <td>Tipo</td>        
      <td>Quantidade</td>
        <td>Valor de saída (UNIT.)</td>
            </tr>
      <?php while ( $row = $result->fetch_assoc() )  echo '<tr><td>', $row['cod'], '</td><td>', $row['datachegada'], '</td><td> ', $row['veiculo'], '</td><td> ', $row['aro'], '</td><td> ', $row['tamanho'], '</td> <td>',  $row['marca'], '</td> <td>',  $row['tipo'], '</td> <td>', $row['quantidade'], "</td><td>", 'R$ ', $row['valorunit'], '</td></tr>'; ?> 
  </table>
            </div>
    <br>
            
                    <a href="estoque.php"><input id="but1" type="button" value="Voltar"></a>
                <a href="insert/pneu.php"><input id="but1" type="button" value="Novo produto"></a>
                <a href="del/pneu.php"><input id="but7" type="button" value="Deletar produto"></a>                
            </fieldset>
                <br>
        <br>
        </div>
        
    </body>

</html>