<?php
    
    include_once('../class/Autentica.class.php');
    include_once('../class/Conexao.class.php');

    session_start();
	ob_start();
	
	$cod = isset($_SESSION['cod']) ? $_SESSION['cod']: "";	
	$usuario= isset($_SESSION['usuario']) ? $_SESSION['usuario']: "";	
	$pass = isset($_SESSION['pass']) ? $_SESSION['pass']: "";	
	$logado = isset($_SESSION['logado']) ? $_SESSION['logado']: "N";	

	if ($logado == "N" && $cod == ""){	    
		echo  "<script type='text/javascript'>
					location.href='../index.php'
				</script>";	
		exit();
	}

$mysqli = new mysqli('localhost', 'shangr71', 'rosa290880', 'shangr71_shangrila');
 
if ( $mysqli->connect_errno ) echo $mysqli->connect_errno, ' ', $mysqli->connect_error;
 
$sql = 'SELECT * FROM funcionario';

$result = $mysqli->query( $sql );
 
?>
<html lang="pt-br">
<head>
    <meta charset="utf8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<link rel="stylesheet" type="text/css" href="style.css" />
    <title>Shangrila Sistemas - Pontos</title>       
    </head>
    
    <body>
        <div class="content">
        
    <div class="cabecalho">
        <h2> Shangrila Sistemas</h2>
        </div>
        
    <div class="conteudo">
        <center>
        
        <div class="menu">
                <table>
                <h4><tr>
                    <td><a href="home.php" id="but">Voltar</a></td>   
                    <td><a href="#" id="but">Estoque</a></td>
        <td><a href="cponto.php" id="but">Cartão ponto</a></td> 
        <td><a href="funcionario.php" id="but">Funcionarios</a></td> 
        <td><a href="saidas.php" id="but">Relatório de Saídas</a></td>
        
            </tr></h4>
        </table>
                </div>
        <fieldset style="width: 380px; margin: 5px; margin-top: 23px;">
                <p style="font-style: oblique; font-size: 20px;">Ponto por funcionário: </p>
                <form method="post" action="cponto/pfunc.php">
            <table style="margin: 3px;">
                <tr>
        <td><select  name="codf" required>
            <option>Selecione</option>
    <?php while ( $row = $result->fetch_assoc() )  echo '<option>', $row['cod'], ' | ', $row['nome'], '</option>'?>        
            </select></td></tr>       
                <tr><td><input type="submit" style="margin: 5px; margin-top: 10px; width: 110px; height:30px; border: 1px solid;" value="Enviar"/></td></tr>
            </table>   
                </form>
        <br>
        <hr style="color: black;">
                <p style="font-style: oblique; font-size: 20px;">Ponto por data: </p>
                <form method="post" action="cponto/pdata.php">
            <table style="margin: 3px;">
                <tr><td><label>De: </label><input type="date" name="datade" value="<?php date_default_timezone_set('America/Sao_Paulo'); echo date('Y-m-d');?>" style="margin: 4px; margin-left: 10px;" required></td></tr>
                <tr><td><label>Até: </label><input type="date" name="dataate" value="<?php date_default_timezone_set('America/Sao_Paulo'); echo date('Y-m-d');?>" style="margin: 4px; margin-left: 6px;" required></td></tr> 
                
                <tr><td><input type="submit" style="margin: 5px; margin-top: 10px; width: 110px; height:30px; border: 1px solid;" value="Enviar"/></td></tr>
            </table>   
                </form>
            </fieldset>
        <br>
        
    <?php 
    
    $mysqli->close();
    ?>
            </center>
            </div>           
        </div>
    </body>
</html>