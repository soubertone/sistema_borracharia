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
                    <td><a href="home.php" id="but">| Voltar |</a></td>   
                    <td><a href="#" id="but">Estoque |</a></td>
        <td><a href="cponto.php" id="but">Cartão ponto |</a></td> 
        <td><a href="funcionario.php" id="but">Funcionarios |</a></td> 
        <td><a href="saidas.php" id="but">Relatório de Saídas |</a></td>
        
            </tr></h4>
        </table>
                </div>
            <fieldset style="width: 300px; height: 380px; margin: 5px; border: 1px solid;">   
            <legend style="font-style: oblique; font-size: 20px;">Registrar funcionários</legend>
        <table>
    <tr><td>Nome: </td><td><input type="text" name="nome" size="30" required></td></tr>
      <tr><td>RG: </td><td><input type="number" maxlengh="11" name="rg" size="30" required></td></tr>
      <tr><td>CPF: </td><td><input type="number" maxlengh="11" name="cpf" size="30" required></td></tr>
      <tr><td>Telefone: </td><td><input type="number" maxlengh="11" name="nome" size="30" required></td></tr>
      <tr><td>Endereço: </td><td><input type="text" name="endereco" size="30" required></td></tr>
        <tr><td>Numero: </td><td><input type="number" name="numero" size="30" required></td></tr>
      <tr><td>E-mail: </td><td><input type="email" name="email" size="30" required></td></tr>
            <tr><td>Sexo: </td>
            <td><select name="sexo">
            <option value="M">Masculino</option>
            <option value="F">Feminino</option></td></tr>
      <tr><td>Período: </td>
      <td><select name="periodo">
      <option>Manhâ</option>
      <option>Tarde</option></td></tr>
      <tr><td>Data de Nascimento:</td><td><input type="date" name="datanasc" size="30" required></td></tr>
        <tr><td>Data de Contrato: </td><td><input type="date" name="datacont" size="30" required></td></tr>
  </table>
           <input type="submit" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Cadastrar"/></a>
           </center>
            
    <?php 
    
    $mysqli->close();
    ?>
        </fieldset>

            </div>           
        </div>
    </body>
</html>