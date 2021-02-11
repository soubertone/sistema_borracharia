<?php

    if ( !isset( $_POST ) || empty( $_POST ) ) {
	echo  "<script type='text/javascript'>
					alert('Alguns campos não foram preenchidos');location.href='../reg.php'
		</script>";
    }
    
    $mysqli = new mysqli('localhost', 'shangr71', 'rosa290880', 'shangr71_shangrila');
    if ( $mysqli->connect_errno ) echo $mysqli->connect_errno, ' ', $mysqli->connect_error;

    
    $consulta1 = "SELECT * FROM fechacaixa WHERE data=current_date();";
    $consult = mysqli_query($mysqli, $consulta1);
    //$row1 = $consult->num_rows;
    $row = $consult->num_rows;

    date_default_timezone_set('America/Sao_Paulo'); 
    $hora =  date('H:i');

    if ($row >= 1 || $hora >= '22:00'){
         echo  "<script type='text/javascript'>
					alert('Caixa já foi fechado ou excedeu o horario!');location.href='../reg.php'
		</script>";
    }

    else {
    $soma = "SELECT SUM(valortotal) FROM regservico where data=current_date();";
    $ins = mysqli_query($mysqli, $soma);
    while ($row = $ins->fetch_row() )  
    $valortotal = $row[0];
    
    date_default_timezone_set('America/Sao_Paulo'); 
    $data = date('Y-m-d');

    date_default_timezone_set('America/Sao_Paulo'); 
    $hlocal =  date('H:i');

    $insert = "INSERT INTO fechacaixa (data, hora, valortotal) VALUES ('$data', '$hlocal', '$valortotal');";
    $result = mysqli_query($mysqli, $insert);

    echo  "<script type='text/javascript'>
					alert('Caixa fechado com sucesso!');location.href='../reg.php'
           </script>";
        
    }
    
#end;

?>