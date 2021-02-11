<?php

    if ( !isset( $_POST ) || empty( $_POST ) ) {
	echo  "<script type='text/javascript'>
					alert('Alguns campos não foram preenchidos');location.href='pneu.php'
		</script>";
    }

    $datachegada = $_POST['datachegada'];
    $veiculo = $_POST['veiculo'];
    $aro = $_POST['aro'];
    $tamanho = $_POST['tamanho'];
    $marca = $_POST['marca'];
    $quantidade = $_POST['quantidade'];
    $valorunit = $_POST['valorunit'];
    $tipo = $_POST['tipo'];


    $mysqli = new mysqli('localhost', 'root', 'admin', 'borracharia_sh');
    if ( $mysqli->connect_errno ) echo $mysqli->connect_errno, ' ', $mysqli->connect_error;

    $resultado = "INSERT INTO produto_pneu (datachegada, veiculo, aro, tamanho, marca, quantidade, valorunit, tipo) VALUES ('$datachegada', '$veiculo', '$aro', '$tamanho', '$marca', '$quantidade', '$valorunit', '$tipo')";
    $result = mysqli_query($mysqli, $resultado);

    echo  "<script type='text/javascript'>
					alert('Cadastrado com sucesso');location.href='pneu.php'
		</script>";

?>