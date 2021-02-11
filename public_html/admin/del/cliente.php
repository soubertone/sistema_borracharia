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

$mysqli = new mysqli('localhost', 'root', 'admin', 'borracharia_sh');
 
if ( $mysqli->connect_errno ) echo $mysqli->connect_errno, ' ', $mysqli->connect_error;
 
$sql = 'SELECT cod, nome FROM cliente';

$result = $mysqli->query( $sql );
 
// while ( $row = $result->fetch_assoc() )  echo $row['cod'], ' ', $row['nome'], ' ',  $row['cidade'], ' ' , $row['estado'], ' ' , $row['endereco'], ' ' , "<br>";
 
?>
<html lang="pt-br">
<head>
        <meta charset="utf-8">
    	<link rel="stylesheet" type="text/css" href="../style.css" />
    <title>Shangrila Sistemas - Deletar Clientes</title>       
    </head>
    
    <body>
        
    <div class="cabecalho">
        <h2> Shangrila Sistemas</h2>
                
        <a href="../logout.php" id="sair"><h5>Sair</h5></a>
        </div>
        
    <div class="corpo">
        <div class="menu">
        <a href="../home.php"><h4>Home</h4></a>    
        <a href="../cliente.php"><h4>Clientes</h4></a>
        <a href="../estoque.php"><h4>Estoque</h4>   </a> 
        <a href="../funcionario.php"><h4>Funcionarios</h4></a> 
        <a href="../saidas.php"><h4>Registros de Saída</h4></a>
        </div>
        
        </div>
        
        <img src="../img/logo.png" alt="Borracharia Shangrila" id="logo">
        
        <div class="conteudo">
            
    <br>
            <div class="del">
            <form action="deletarcliente.php" method="POST" style="border:1px solid; " dir="ltr">
                  <fieldset>
    <legend>Deletar Cliente</legend>
                <table>
    <tr><td>Selecione o código: </td>
        <td><select  name="id" required>
            <option value="n">Selecione</option>
    <?php 
            while ( $row = $result->fetch_assoc() )  echo '<option>', $row['cod'], ' | ', $row['nome'], '</option>'
            
    ?>        
            </select></td></tr>
        </table>
            <a href="../cliente.php"><input type="button" id="but1" value="Voltar"></a>
          <input type="submit" id="but1" value="Deletar">
                </fieldset>    
            </form>
            </div>    
     
        <?php 
    
    $mysqli->close();
    ?>
        </div>
        
    </body>

</html>