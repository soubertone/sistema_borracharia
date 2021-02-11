<?php

    if ( !isset( $_POST ) || empty( $_POST ) ) {
	echo  "<script type='text/javascript'>
					alert('Alguns campos nè´™o foram preenchidos');location.href='../reg.php'
		</script>";
    }

    $codfuncionario = $_POST['codfuncionario'];
    $descricao = $_POST['descricao'];
    $tipo = $_POST['tipo'];
    $data = $_POST['data'];
    $valorunit = $_POST['valorunit'];
    $quantidade = $_POST['quantidade'];
    $desconto = $_POST['desconto'];

    $valortotal = $valorunit * $quantidade; 
    $desc = $valortotal - $desconto;
    
    $mysqli = new mysqli('localhost', 'shangr71', 'rosa290880', 'shangr71_shangrila');
    
    $consulta1 = "SELECT * FROM fechacaixa WHERE data=current_date();";
    $consult = mysqli_query($mysqli, $consulta1);
    //$row1 = $consult->num_rows;
    $row = $consult->num_rows;

    if ($row >= 1){
         echo  "<script type='text/javascript'>
					alert('Caixa ja foi fechado hoje!');location.href='../reg.php'
		</script>";
    }
        else {
        $resultado = "INSERT INTO regservico (codfuncionario, descricao, tipo, data, valorunit, quantidade, desconto, valortotal) VALUES ('$codfuncionario', '$descricao', '$tipo', '$data', '$valorunit', '$quantidade', '$desconto', '$desc');";
        $result = mysqli_query($mysqli, $resultado);

        echo  "<script type='text/javascript'>
					alert('Registrado com sucesso');location.href='../reg.php'
            </script>";
        }
?>