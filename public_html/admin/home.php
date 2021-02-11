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
					location.href='index.php'
				</script>";	
		exit();
	}
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<link rel="stylesheet" type="text/css" href="style.css" />
    <title>Shangrila Sistemas - Home</title>       
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
                    <td><a href="../logado.php" id="but">Voltar</a></td>   
                    <td><a href="#" id="but">Estoque</a></td>
        <td><a href="cponto.php" id="but">Cartão ponto</a></td> 
        <td><a href="funcionario.php" id="but">Funcionarios</a></td> 
        <td><a href="saidas.php" id="but">Relatório de Saídas</a></td>
        
            </tr></h4>
        </table>
                </div>
        </div>
         
         <img src="img/logo.png" style="max-width: 300px; margin-top: 350px;">
                        
        </div>
    </body>
</html>