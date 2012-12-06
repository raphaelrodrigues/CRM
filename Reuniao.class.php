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
		
		/**GETS**/
		
		public function getIdReuniao()
		{
			return $this->data['idReuniao'];
		}
		
		public function getIdOrg()
		{
			return $this->data['idOrg'];
		}
		
		public function getAssunto()
		{
			return $this->data['assunto'];
		}
		
		public function getData()
		{
			return $this->data['data'];
		}
		
		public function getParticipantes()
		{
			return $this->data['participantes'];
		}
		public function getObjectivo()
		{
			return $this->data['objectivo'];
		}
		
		public function getFeedback()
		{
			return $this->data['feedback'];
		}
		
		public function getEstado()
		{
			return $this->data['estado'];
		}
		public function getIdUtilizador()
		{
			return $this->data['idUtilizador'];
		}
		
		
		public function insere()
		{
			$result = $this->mysql->query("INSERT INTO `reuniao`( `idOrg`,`nomeOrg`,`assunto`, `data`, `participantes`, `objectivo`, `feedback`,`estado`, `idUtilizador`, `dataCriacao`) VALUES ('".$this->data['idOrg']."','".$this->data['nomeOrg']."','".$this->data['assunto']."','".$this->data['data']."','".$this->data['participantes']."','".$this->data['objectivo']."','".$this->data['feedback']."','".$this->data['estado']."',1,'".$this->data['dataCriacao']."')");
			
			if (!$result) {
   				 die('Invalid query: ' . mysql_error());
				 return -1;
			}
			return 0;
		}
		
		public function actualiza()
		{
			echo "UPDATE `reuniao` SET `assunto`='".$this->data['assunto']."',`data`='".$this->data['data']."',`participantes`='".$this->data['participantes']."',`objectivo`='".$this->data['objectivo']."',`feedback`='".$this->data['feedback']."' WHERE idReuniao = '".$this->data['idReuniao']."'";
			
			$result = $this->mysql->query("UPDATE `reuniao` SET `assunto`='".$this->data['assunto']."',`data`='".$this->data['data']."',`participantes`='".$this->data['participantes']."',`objectivo`='".$this->data['objectivo']."',`feedback`='".$this->data['feedback']."' WHERE idReuniao = '".$this->data['idReuniao']."'");
			
			
			if (!$result) {
   				 die('Invalid query: ' . mysql_error());
				 return -1;
			}
			return 0;
		}
	}