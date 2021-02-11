<?php 

    include_once('../../class/Autentica.class.php');
    include_once('../../class/Conexao.class.php');

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

    $codf = $_POST['codf'];

    $mysqli = new mysqli('localhost', 'shangr71', 'rosa290880', 'shangr71_shangrila');
    if ( $mysqli->connect_errno ) echo $mysqli->connect_errno, ' ', $mysqli->connect_error;

?>
<html lang="pt-br">
<head>
    <meta charset="utf8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    	<link rel="stylesheet" type="text/css" href="../style.css" />
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
                    <td><a href="../cponto.php" id="but">Voltar</a></td>   
                    <td><a href="#" id="but">Estoque</a></td>
        <td><a href="../cponto.php" id="but">Cartão ponto</a></td> 
        <td><a href="../funcionario.php" id="but">Funcionarios</a></td> 
        <td><a href="../saidas.php" id="but">Relatório de Saídas</a></td>
        
            </tr></h4>
        </table>
                </div>
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
    
            $registro = "SELECT * FROM cponto where codfuncionario IN ('$codf');";

            $regist = $mysqli->query( $registro );
    
    while ( $row = $regist->fetch_assoc() ) echo '<tr><td>', $row['codponto'], '</td><td>', $row['codfuncionario'], '</td><td> ', $row['data'], '</td><td> ', $row['hora'], '</td><td> ', $row['tipo'], '</td>', "</tr>"; ?>
  </table>
    </fieldset>
            
	           </center>
            </div>           
        </div>
    </body>
</html>