<?php	

	include_once("conexao.php");
	    $html = "
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
	
	$results = "SELECT * FROM regservico";
	$resultado = mysqli_query($conn, $results);
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