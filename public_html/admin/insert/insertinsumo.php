<?php

    if ( !isset( $_POST ) || empty( $_POST ) ) {
	echo  "<script type='text/javascript'>
					alert('Alguns campos não foram preenchidos');location.href='insumo.php'
		</script>";
    }

    $datachegada = $_POST['datachegada'];    
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];
    $valorunit = $_POST['valorunit'];


    $mysqli = new mysqli('localhost', 'root', 'admin', 'borracharia_sh');
    if ( $mysqli->connect_errno ) echo $mysqli->connect_errno, ' ', $mysqli->connect_error;

    $resultado = "INSERT INTO produto_insumo (datachegada, descricao, quantidade, valorunit) VALUES ('$datachegada', '$descricao', '$quantidade', '$valorunit')";
    $result = mysqli_query($mysqli, $resultado);

    echo  "<script type='text/javascript'>
					alert('Cadastrado com sucesso');location.href='insumo.php'
		</script>";

?>