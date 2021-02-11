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

$mysqli = new mysqli('localhost', 'shangr71', 'rosa290880', 'shangr71_shangrila');
 
if ( $mysqli->connect_errno ) echo $mysqli->connect_errno, ' ', $mysqli->connect_error;
 
$sql = 'SELECT * FROM funcionario';

$result = $mysqli->query( $sql );
 
// while ( $row = $result->fetch_assoc() )  echo $row['cod'], ' ', $row['nome'], ' ',  $row['cidade'], ' ' , $row['estado'], ' ' , $row['endereco'], ' ' , "<br>";
 
?>
<html lang="pt-br">
<head>
    <meta charset="utf8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<link rel="stylesheet" type="text/css" href="style.css" />
    <title>Shangrila Sistemas - Funcionarios</title>       
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
        </center>
            <fieldset id="tabfunc">   
            <legend style="font-style: oblique; font-size: 20px;">Relação de funcionários</legend>
            <center>
        <table id="tb1" border="1">
            <thead>
    <tr>
      <td>Código</td>
      <td>Nome</td>
      <td>Telefone</td>
      <td>Endereço</td>
        <td>Numero</td>
      <td>Email</td>
        <td>Data de Contrato</td>
      <td>Usuario</td>
        <td>Senha</td>
        <td>Privilégio</td>
    </tr>
        </thead>
      <?php while ( $row = $result->fetch_assoc() )  echo '<tr><td>', $row['cod'], '</td><td>', $row['nome'], '</td><td>',  $row['telefone'], '</td> <td> ' , $row['endereco'], '</td> <td> ' , $row['numero'], '</td> <td>', $row['email'], '</td><td>', $row['datadecontrato'], '</td><td>', $row['usuario'], '</td><td>', $row['pass'], '</td><td>', $row['priv'], '</td>' ?>
  </table>
           <a href="editfunc.php"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Cadastrar"/></a>
            <a href="#"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Deletar"/></a>
            <a href="#"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Editar"/></a>    </center>
            
    <?php 
    
    $mysqli->close();
    ?>
        </fieldset>

            </div>           
        </div>
    </body>
</html>