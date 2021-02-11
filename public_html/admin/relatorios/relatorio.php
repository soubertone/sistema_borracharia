<?php	

	include_once("conexao.php");
	    $html = "
	    <title>Relatório</title>
    	<link rel='stylesheet' type='text/css' href='style.css' />
        <div class='cabecalho'>
        <img id='logo' src='logo.png' alt='logo'>
    <p id='texttop'>Bertone2010@hotmail.com</p>
    <p id='texttop'>CNPJ: 11.464.539/0001-18</p>
    <p id='texttop'>Endereço: Rua Ibrahim Ibrahim, 0049</p>
    <p id='texttop'>Nova Esperança - PR</p>
    </div>
    <br>
    <hr>";
    $datade = $_POST['datade'];
    $dataate = $_POST['dataate'];
    $codfuncionario = $_POST['codfuncionario'];
	$html .= '<label style="margin: 5px; font-size: 18px; font-family: Arial, cursive;">De: <label style="color: red; font-style: oblique;">' . $datade ."</label></label>";
	$html .= '<label style="margin: 5px; font-size: 18px; font-family: Arial, cursive;">Até: <label style="color: red; font-style: oblique;">' . $dataate . "</label></label><br>";
	$result = "SELECT * FROM funcionario WHERE cod IN('$codfuncionario')";
	$resulta = mysqli_query($conn, $result);
	while($linha = mysqli_fetch_assoc($resulta)){
	$html .= '<label style="margin: 5px; margin-top: 10px; font-size: 18px; font-family: Arial, cursive;">Funcionario: <label style="color: red; font-style: oblique;">' . $linha['nome'] ."</label></label><br>";}
	$html .= '<fieldset id="field1">';
	$html .= '<legend id="ltitle">Relatório de Seviços</legend>';
	$html .= '<table id="tab1" border=1>';	
	$html .= '<tr>';
	$html .= '<td>Código</td>';
	$html .= '<td>Cód. funcionário</td>';
	$html .= '<td>Descrição</td>';
	$html .= '<td>Tipo</td>';
	$html .= '<td>Data</td>';
	$html .= '<td>Valor unit.</td>';
	$html .= '<td>Quant.</td>';
	$html .= '<td>Desconto</td>';
	$html .= '<td>Valor total</td>';
	$html .= '</tr>';
	
	$result2 = "SELECT * FROM regservico WHERE data >= ('$datade') AND data <= ('$dataate') AND codfuncionario IN('$codfuncionario');";
	$resultado = mysqli_query($conn, $result2);
	while($row = mysqli_fetch_assoc($resultado)){
		$html .= '<tr><td>'.$row['cod'] . "</td>";
		$html .= '<td>'.$row['codfuncionario'] . "</td>";
		$html .= '<td>'.$row['descricao'] . "</td>";
		$html .= '<td>'.$row['tipo'] . "</td>";
		$html .= '<td>'.$row['data'] . "</td>";
		$html .= '<td>'.$row['valorunit'] . "</td>";
		$html .= '<td>'.$row['quantidade'] . "</td>";
		$html .= '<td>'.$row['desconto'] . "</td>";
        $html .= '<td>'.$row['valortotal'] . "</td></tr>";
	}
	
	$html .= '</table>';
	$html .= '</fieldset>';
	$soma = "SELECT SUM(valortotal) FROM regservico WHERE data >= ('$datade') AND data <= ('$dataate') AND codfuncionario IN('$codfuncionario');";
    $ins = mysqli_query($conn, $soma);
    while ($row = $ins->fetch_row() )  
    $valortotal = $row[0];
    $html .= '<label style="position: absolute; left: 600px; margin-top: 3px;">Total: <label style="color: blue;">'.$valortotal."</label></label>";

	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html($html);

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatorio.pdf", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>