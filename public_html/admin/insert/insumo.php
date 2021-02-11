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
 
?>
<html lang="pt-br">
<head>
        <meta charset="utf-8">
    	<link rel="stylesheet" type="text/css" href="../style.css" />
    <title>Shangrila Sistemas - Registrar Produtos</title>       
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
           
            <form action="insertinsumo.php" method="POST" style="border: 1px solid; width: 480px; margin: 10px;">
                <fieldset>
                    <legend id="title">Registrar insumo</legend>
        <table>
            <tr><td>Data de chegada</td>
            <td><input type="date" name="datachegada" size="30"></td></tr>
    <tr><td>Descrição</td>
        <td><input type="text" name="descricao" size="30" 
maxlength="1000" required></td></tr>    
        <tr><td>Quantidade</td>
        <td><input type="number" name="quantidade" size="30" 
                   maxlength="100" required></td></tr>
        <tr><td>Valor de saída (UNIT.)</td>
        <td><input type="number" name="valorunit" size="30" 
                   maxlength="100" required></td></tr>
        </table> 
        <br>
                    
        <a href="../estoqueinsumo.php"><input type="button" id="but1" value="Voltar"></a>    
        <input type="submit" name="enviar" id="but1" value="Enviar" required>
    
</fieldset>
    </form>
        </div>
        
    </body>

</html>