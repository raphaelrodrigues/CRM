<?
	require_once('connect.php');
	class Reuniao
	{
		private $data = array();
		private $mysql;
		
		function __construct( $row )
		{
			$this->data = $row;
			
			$this->mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
				
		}
		
		public function getNome()
		{
			return $this->data['nome'];
		}
		
		public function getFeedback()
		{
			return $this->data['feedback'];
		}
		
		public function insere()
		{
			$result = $this->mysql->query("INSERT INTO `reuniao`( `assunto`, `data`, `participantes`, `objectivo`, `feedback`, `idUtilizador`, `dataCriacao`) VALUES ('".$this->data['assunto']."','".$this->data['data']."','".$this->data['participantes']."','".$this->data['objectivo']."','".$this->data['feedback']."',1,'20-03-2012')");
			
			if (!$result) {
   				 die('Invalid query: ' . mysql_error());
				 return -1;
			}
			return 0;
		}
		
		public function actualiza()
		{
			
		}
	}