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
		
		public function getNomeOrg()
		{
			return $this->data['nomeOrg'];
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
		public function getUtilizador()
		{
			return $this->data['utilizador'];
		}
		
		public function getHora()
		{
			return $this->data['hora'];
		}
		
		public function getDataCriacao()
		{
			return $this->data['dataCriacao'];
		}
		
		
		public function insere()
		{
			$result = $this->mysql->query("INSERT INTO `reuniao`( `idOrg`,`nomeOrg`,`assunto`, `data`,`hora`, `participantes`, `objectivo`, `feedback`,`estado`, `utilizador`, `dataCriacao`) VALUES ('".$this->data['idOrg']."','".$this->data['nomeOrg']."','".$this->data['assunto']."','".$this->data['data']."','".$this->data['hora']."','".$this->data['participantes']."','".$this->data['objectivo']."','".$this->data['feedback']."','".$this->data['estado']."','".$this->data['user']."','".$this->data['dataCriacao']."')");
			
			if (!$result) {
   				 die('Invalid query: ' . mysql_error());
				 return -1;
			}
			return 0;
		}
		
		
		
		public function actualiza()
		{
			//echo "UPDATE `reuniao` SET `assunto`='".$this->data['assunto']."',`hora`='".$this->data['hora']."',`data`='".$this->data['data']."',`participantes`='".$this->data['participantes']."',`objectivo`='".$this->data['objectivo']."',`feedback`='".$this->data['feedback']."' WHERE idReuniao = '".$this->data['idReuniao']."'";
			
			
			$result = $this->mysql->query("UPDATE `reuniao` SET `assunto`='".$this->data['assunto']."',`hora`='".$this->data['hora']."',`data`='".$this->data['data']."',`participantes`='".$this->data['participantes']."',`objectivo`='".$this->data['objectivo']."',`feedback`='".$this->data['feedback']."' WHERE idReuniao = '".$this->data['idReuniao']."'");
			
			
			if (!$result) {
   				 die('Invalid query: ' . mysql_error());
				 return -1;
			}
			return 0;
		}
		
		
		/**
		**	altera o estado de uma reuniao para deleted
		**  apagar logico
		**/
		public function remover( $id )
		{
			$result = $this->mysql->query("UPDATE `reuniao` SET `estado`= 'D' where idReuniao = $id ");
			
			if (!$result) {
   				 die('Invalid query: ' . mysql_error());
				 return -1;
			}
			return 0;
			
		}
		
		public function activar( $id )
		{
			$result = $this->mysql->query("UPDATE `reuniao` SET `estado`= 'A' where idReuniao = $id ");
			
			if (!$result) {
   				 die('Invalid query: ' . mysql_error());
				 return -1;
			}
			return 0;
			
		}
		
		
		public function addFeedback( $feedback )
		{
			$this->data['feedback'] .= " " . $feedback;
			echo " fff ",$this->data['feedback'];
			$result = $this->mysql->query("UPDATE `reuniao` SET `feedback`= '".$this->getFeedback()."' where idReuniao = ".$this->getIdReuniao() ."");
			
			if (!$result) {
   				 die('Invalid query: ' . mysql_error());
				 return -1;
			}
			return 0;
			
		}
		
		/**toString**/
		
		public function toString()
		{
			
			$desc = "<p>Assunto </p>". $this->getAssunto()."<br> ";
			$desc .= "<p>Data</p> ". $this->getData()."<br> ";
			if( $this->getHora() != '')
				$desc .= "<p>Hora</p> ". $this->getHora()."<br> ";
				$desc .= "<p>Participantes</p> ". $this->getParticipantes()."<br> ";
			$desc .= "<p>Objectivo</p> ". $this->getObjectivo()."";
			$desc .= "<p>Feedback</p> ". $this->getFeedback()."<br> ";
			
			$desc .= "<div id=extra_infoR>";
			$desc .= "<p>Adicionado por</p> ". $this->getUtilizador()."<br> ";
			$desc .= "<p>Em </p> ". $this->getDataCriacao()."<br> ";
			$desc .= "</div>";
			
	        return $desc;
		}
		
	}