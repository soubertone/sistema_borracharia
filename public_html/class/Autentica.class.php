<?php	
require_once('Conexao.class.php');
	
class Autentica extends Conexao{
	private $data = array();

	public function __construct(){
		$this->erro = '';
	}
	
	public function __set($name, $value){
		$this->data[$name] = $value;
	}

	public function __get($name){
		if (array_key_exists($name, $this->data)) {
			return $this->data[$name];
		}

		$trace = debug_backtrace();
		trigger_error(
			'Undefined property via __get(): ' . $name .
			' in ' . $trace[0]['file'] .
			' on line ' . $trace[0]['line'],
			E_USER_NOTICE);
		return null;
	}
		
		public function Validar_Usuario(){
			$pdo = new Conexao(); 
			$resultado = $pdo->select("SELECT cod, usuario, pass FROM funcionario WHERE usuario = '".$this->usuario."' AND pass = '".$this->pass."'");
			$pdo->desconectar();
			if(count($resultado)){
				foreach ($resultado as $res) {
					session_start();
					ob_start();

					$_SESSION['cod'] = $res['cod'];
                    $_SESSION['usuario'] = $res['usuario'];
					$_SESSION['pass'] = $res['pass'];
					$_SESSION['logado'] = 'S';
			}
	
				return true;
			}else{

				return false;
			}
		}
}
?>