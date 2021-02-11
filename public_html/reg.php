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
        
        <br>
        
        <fieldset style="width: 320px; margin: 5px;">
            <legend>Registrar serviços</legend>
                <form action="sql/reg.php" method="post">
            <table style="margin 3px;">
                <tr><td>Funcionário: </td>
        <td><select  name="codfuncionario" required>
            <option>Selecione</option>
    <?php while ( $row = $result->fetch_assoc() )  echo '<option>', $row['cod'], ' | ', $row['nome'], '</option>'?>        
            </select></td></tr>
                <tr><td>Descrição: </td>
        <td><input type="text" name="descricao" required></td></tr>
                <tr><td>Tipo: </td>
        <td><select  name="tipo" required>
            <option>Selecione</option>
                <option value="vendap">Venda de Pneu</option>
                <option value="vendas">Venda de serviços</option>
            </select></td></tr>
                <tr><td>Data: </td>
        <td><input type="date" name="data" value="<?php echo date('Y-m-d');?>" required></td></tr>
                <tr><td>Valor unitário: </td>
        <td><input type="number" name="valorunit" placeholder="1.00" step="0.01" required></td></tr>
                <tr><td>Quantidade: </td>
        <td><input type="number" name="quantidade" placeholder="1" min="0"></td></tr>        
                <tr><td>Desconto: </td>
        <td><input type="number" name="desconto" value="0" step="0.01" min="0"></td></tr>        
            </table>
            
            <table>
                <tr><td>
            <input type="submit" id="bt-editar" value="Enviar">
                </td></tr>
            </table>
            
        </form>
        </fieldset>
        
        <br>
        
        <fieldset style="width: 760px; margin: 3px; border: 2px;">
        <table border="1" id="">
    <tr>
        <td>Código</td>
        <td>Código do funcionário</td>
        <td>Descrição</td>
        <td>Data</td>
        <td>Valor unitário</td>
        <td>Quantidade</td>
        <td>Desconto</td>
        <td>Valor total</td>

    </tr>
      <?php 
    
            $registro = "SELECT * FROM regservico where codfuncionario='$cod' AND data=current_date();";

            $regist = $mysqli->query( $registro );
    
    while ( $row = $regist->fetch_assoc() )  echo '<tr><td>', $row['cod'], '</td><td>', $row['codfuncionario'], '</td><td>', $row['descricao'], '</td><td>', $row['data'], '</td><td>', $row['valorunit'], '</td><td> ', $row['quantidade'], '</td><td> ', $row['desconto'], '</td><td> ', $row['valortotal'], '</td>', "</tr>"; ?>
  </table>
  
        <form action="sql/fechacaixa.php" method="post" id="fechac">
            <input type="submit" id="fechacaixa" name="fechacaixa" value="Fechar Caixa"  style="margin: 8px; width: 110px; height:30px; border: 1px solid;">
            </form>
            
    </fieldset>
        </center>
</div>


    </body>
</html>