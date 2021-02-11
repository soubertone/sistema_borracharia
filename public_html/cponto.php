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
            <a href="admin/" method="post"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Admin"/></a>
            <a href="regfunc.php"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Ver meus dados"/></a>
        	<a href="cponto.php"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Cartão Ponto"/></a>
            <a href="reg.php"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Registros"/></a>
			<a href="logout.php"><input type="button" style="margin: 5px; width: 110px; height:30px; border: 1px solid;" value="Sair"/></a>
		</article>
        
        <br>
        
        <fieldset style="width: 270px; margin: 5px;">
            <legend>Registrar ponto</legend>
        <form action="sql/cponto.php" method="post">
            <table style="margin: 3px;">
                <tr><td>Funcionário: </td>
        <td><select  name="codfuncionario" required>
            <option>Selecione</option>
    <?php while ( $row = $result->fetch_assoc() )  echo '<option>', $row['cod'], ' | ', $row['nome'], '</option>'?>        
            </select></td></tr>
                <tr><td>Data: </td>
        <td><input type="date" name="data" value="<?php date_default_timezone_set('America/Sao_Paulo'); echo date('Y-m-d');?>" required></td></tr>
                <tr><td>Hora: </td>
        <td><input type="time" min="07:00" value="<?php  date_default_timezone_set('America/Sao_Paulo'); echo date('H:i');?>" max="22:00" name="hora" required><a style="color: red;">*7:00 à 22:00</a></td></tr>
                <tr><td>Tipo</td>
        <td><select  name="tipo" required>
    <option value="">Selecione</option>
    <option value="Entrada">Entrada</option>
    <option value="Saida">Saída</option>                   
        </select></td></tr>        
            </table>
            
            <table>
                <tr><td>
            <input type="submit" id="bt-editar" value="Enviar">
                </td></tr>
            </table>
            
        </form>
        </fieldset>
        
        <br>
        
        <fieldset style="width: 420px; margin: 5px;">
            <legend>Pontos do dia</legend>
        <table border="1" id="">
    <tr>
        <td>Código</td>
        <td>Código do funcionário</td>
        <td>Data</td>
        <td>Hora</td>
        <td>Tipo</td>

    </tr>
      <?php 
    
            $registro = "SELECT * FROM cponto where data=current_date();";

            $regist = $mysqli->query( $registro );
    
    while ( $row = $regist->fetch_assoc() )  echo '<tr><td>', $row['codponto'], '</td><td>', $row['codfuncionario'], '</td><td> ', $row['data'], '</td><td> ', $row['hora'], '</td><td> ', $row['tipo'], '</td>', "</tr>"; ?>
  </table>
    </fieldset>
	</center>
</div>


    </body>
</html>