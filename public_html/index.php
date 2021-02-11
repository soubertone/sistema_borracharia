<!DOCTYPE HTML>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	
    <title>Shangrila Sistemas - Login</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div class="content">        
        <form name="form_pesquisa" id="login" method="POST" action="">
                <p id="tlogin">Acesse o sistema</p>
            <br>
			<center>
                    <label id="label1">Usuário:</label><input name="usuario" title="Username" value="" size="30" id="textb1" required><br>
                        <br>
                    <label id="label2">Senha: </label><input name="pass" type="password" title="Password" value="" size="30" id="textb2" required><br>
			</center>
					<br>
            <input type="submit" value="Acessar" id="entrar"/>
                <input type="hidden" name="acao" value="logar"/>
    </form>
</div>        
</body>
</html>
<?php
$action = isset($_POST['acao']) ? trim($_POST['acao']) : '';
	if(isset($action) && $action != ""){ 
		
		switch($action){
			case 'logar':
				require_once('class/Autentica.class.php');
				$Autentica = new Autentica();
				$Autentica->usuario	= $_POST['usuario'];
				$Autentica->pass	= $_POST['pass'];					
				if($Autentica->Validar_Usuario()){
				   echo  "<script type='text/javascript'>
							location.href='logado.php'
						</script>";
				  }else{
				   echo  "<script type='text/javascript'>
                        alert('Login ou senha invalidos, Tente novamente!')
                   </script>";
				  }
			break;
		}	
	}
?>