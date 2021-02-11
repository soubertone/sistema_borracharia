<?php

    if ( !isset( $_POST ) || empty( $_POST ) ) {
	echo  "<script type='text/javascript'>
					alert('Alguns campos não foram preenchidos');location.href='../cponto.php'
		</script>";
    }

    $codfuncionario = $_POST['codfuncionario'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $tipo = $_POST['tipo'];
    
    date_default_timezone_set('America/Sao_Paulo'); 
    $hlocal =  date('H:i');

    $mysqli = new mysqli('localhost', 'shangr71', 'rosa290880', 'shangr71_shangrila');
    if ( $mysqli->connect_errno ) echo $mysqli->connect_errno, ' ', $mysqli->connect_error;

    $consulta1 = "SELECT * FROM cponto WHERE data=current_date();";
    $consult = mysqli_query($mysqli, $consulta1);
    //$row1 = $consult->num_rows;
    $row = $consult->num_rows;

    if ($hora < $hlocal || $hora > $hlocal ){
                 echo  "<script type='text/javascript'>
					alert('Não foi possível registrar!');location.href='../cponto.php'
		</script>";
    }
        
    elseif ($row >= 4){
         echo  "<script type='text/javascript'>
					alert('Não foi possível registrar!');location.href='../cponto.php'
		</script>";
    }
    
    else{
    $resultado = "INSERT INTO cponto (codfuncionario, data, hora, tipo) VALUES ('$codfuncionario', '$data', '$hora', '$tipo');";
    $result = mysqli_query($mysqli, $resultado);

    echo  "<script type='text/javascript'>
					alert('Registrado com sucesso');location.href='../cponto.php'
            </script>";
        }
        
end
?>