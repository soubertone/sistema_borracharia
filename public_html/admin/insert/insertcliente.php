<?php

    if ( !isset( $_POST ) || empty( $_POST ) ) {
	echo  "<script type='text/javascript'>
					alert('Alguns campos não foram preenchidos');location.href='cliente.php'
		</script>";
    }

    $nome = $_POST['nome'];
    $rg = $_POST['rg'];
    $cpf = $_POST['cpf'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];

    $mysqli = new mysqli('localhost', 'root', 'admin', 'borracharia_sh');
    if ( $mysqli->connect_errno ) echo $mysqli->connect_errno, ' ', $mysqli->connect_error;

    $resultado = "INSERT INTO cliente (nome, rg, cpf, cidade, estado, telefone, endereco, numero) VALUES ('$nome', '$rg', '$cpf', '$cidade', '$estado', '$telefone', '$endereco', '$numero')";
    $result = mysqli_query($mysqli, $resultado);

    echo  "<script type='text/javascript'>
					alert('Cadastrado com sucesso');location.href='cliente.php'
		</script>";

?>