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
 
$sql = 'SELECT cod, nome, rg, cpf, cidade, estado, telefone, endereco, numero FROM cliente';

$result = $mysqli->query( $sql );
 
// while ( $row = $result->fetch_assoc() )  echo $row['cod'], ' ', $row['nome'], ' ',  $row['cidade'], ' ' , $row['estado'], ' ' , $row['endereco'], ' ' , "<br>";
 
?>
<html lang="pt-br">
<head>
        <meta charset="utf-8">
    	<link rel="stylesheet" type="text/css" href="../style.css" />
    <title>Shangrila Sistemas - Registrar Clientes</title>       
    </head>
    
    <body>
        
    <div class="cabecalho">
        <h2> Shangrila Sistemas</h2>
                
        <a href="logout.php" id="sair"><h5>Sair</h5></a>
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
                    
            <form action="insertcliente.php" method="POST" style="border: 1px solid; width: 480px; margin: 10px;">
            <fieldset>
                <legend id="title">Inserir Cliente</legend>
        <table>
    <tr><td>Nome Completo: </td>
        <td><input type="text" name="nome" size="30" 
maxlength="1000" required></td></tr>    
    <tr><td>RG: </td>
        <td><input type="number" name="rg" size="30" 
                   maxlength="1000" required>*Somente números</td></tr>        
    <tr><td>CPF: </td>
        <td><input type="number" name="cpf" size="30" 
maxlength="1000" pattern="\d{3}\.\d{3}\.\d{3}\-\d{2}" title="Digite o cpf no formato 000.000.000-00" required>*Somente números</td></tr>
    <tr><td>Cidade: </td>
        <td><input type="text" name="cidade" size="30" 
maxlength="1000" required></td></tr>
    <tr><td>Estado</td>
        <td><select  name="estado" required>
    <option value="">Selecione</option>
    <option value="AC">Acre</option>
    <option value="AL">Alagoas</option>
    <option value="AP">Amapá</option>
    <option value="AM">Amazonas</option>
    <option value="BA">Bahia</option>
    <option value="CE">Ceará</option>
    <option value="DF">Distrito Federal</option>
    <option value="ES">Espirito Santo</option>
    <option value="GO">Goiás</option>
    <option value="MA">Maranhão</option>
    <option value="MS">Mato Grosso do Sul</option>
    <option value="MT">Mato Grosso</option>
    <option value="MG">Minas Gerais</option>
    <option value="PA">Pará</option>
    <option value="PB">Paraíba</option>
    <option value="PR">Paraná</option>
    <option value="PE">Pernambuco</option>
    <option value="PI">Piauí</option>
    <option value="RJ">Rio de Janeiro</option>
    <option value="RN">Rio Grande do Norte</option>
    <option value="RS">Rio Grande do Sul</option>
    <option value="RO">Rondônia</option>
    <option value="RR">Roraima</option>
    <option value="SC">Santa Catarina</option>
    <option value="SP">São Paulo</option>
    <option value="SE">Sergipe</option>
    <option value="TO">Tocantins</option>
        </select></td></tr>
        <tr><td>Telefone: </td>
        <td><input type="tel" name="telefone" size="30" 
                   maxlength="1000" required>*Somente números</td></tr>        
    <tr><td>Endereço: </td>
        <td><input type="text" name="endereco" size="30" 
maxlength="1000" required></td></tr>
    <tr><td>Número: </td>
        <td><input type="number" name="numero" size="30" 
maxlength="1000" required>*Somente números</td></tr>
        </table> 
        <br>
    <a href="../cliente.php"><input type="button" id="but1" name="Voltar" value="Voltar"></a>
    <input type="submit" name="enviar" id="but1" value="Enviar" required>
    
    </fieldset>
    </form>
            
        </div>
        
    </body>

</html>