<?php
	/**
	 * parceria.php
	 *
	 *
	 * @author Raphael Rodrigues
	 * @version 1.0
	 */
	
	include('connect.php');
	
	class Parceria{
	
		private $data = array();
		private $mysql;
	
		function __construct( $row )
		{
			$this->data = $row;
			
			$this->mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
				
		}
		
		
		public function getIdParceria()
		{
			return $this->data['idParceria'];
		}
		public function getIdOrg()
		{
			return $this->data['idOrg'];
		}
		
		public function getNomeOrg()
		{
			return $this->data['NomeOrg'];
		}
		
		public function getTipo()
		{
			return $this->data['tipo'];
		}
		
		public function getDescricao()
		{
			return $this->data['descricao'];
		}
		
		public function getDataIni()
		{
			return $this->data['dataIni'];
		}

		public function getDataFim()
		{
			return $this->data['dataFim'];
		}


		public function getUtilizador()
		{
			return $this->data['utilizador'];
		}
		
		public function getDataCriacao()
		{
			return $this->data['dataCriacao'];
		}
		
		public function getEstado()
		{
			return $this->data['estado'];
		}
	
		/*
		* Funcao que insere na BD a parceria
		*/
	
		public function insere()
		{
		
			
			$sql = "INSERT INTO `Parceria`(`idOrg`, `tipo`, `descricao`, `dataIni`, `dataFim`, `estado`, `utilizador`, `dataCriacao`) VALUES ('".$this->getIdOrg()."','".$this->getTipo()."','".$this->getDescricao()."','".$this->getDataIni()."','".$this->getDataFim()."','".$this->getEstado()."','".$this->getUtilizador()."','".$this->getDataCriacao()."')";
			
			
			echo $sql;
			$result = $this->mysql->query($sql);
			
			if (!$result) {
   				 die('Invalid query: ' . mysql_error());
				 return -1;
			}
			return 0;
		}
		
		
		public function actualiza()
		{
			
			echo "UPDATE `Parceria` SET `tipo`='".$this->getTipo()."',`descricao`='".$this->getDescricao()."',`dataIni`='".$this->getDataIni()."',`dataFim`='".$this->getDataFim()."',`estado`='".$this->getEstado()."' WHERE idParceria = '".$this->data['idParceria']."'";
			
			$result = $this->mysql->query("UPDATE `Parceria` SET `tipo`='".$this->getTipo()."',`descricao`='".$this->getDescricao()."',`dataIni`='".$this->getDataIni()."',`dataFim`='".$this->getDataFim()."',`estado`='".$this->getEstado()."' WHERE idParceria = '".$this->data['idParceria']."'");		
			
			
			if (!$result) {
   				 die('Invalid query: ' . mysql_error());
				 return -1;
			}
			return 0;
		}
		
		
		/**
		**	altera o estado de uma reuniao para deleted
		**  apagar logico possui 3 estados D=Decorrer, T=terminada, C=cancelada
		**/
		public function remover( $id )
		{
			$result = $this->mysql->query("UPDATE `Parceria` SET `estado`= 'T' where idParceria = $id ");
			
			if (!$result) {
   				 die('Invalid query: ' . mysql_error());
				 return -1;
			}
			return 0;
			
		}
		
		public function cancelar( $id )
		{
			$result = $this->mysql->query("UPDATE `Parceria` SET `estado`= 'C' where idParceria = $id ");
			
			if (!$result) {
   				 die('Invalid query: ' . mysql_error());
				 return -1;
			}
			return 0;
			
		}
		
		public function activar( $id )
		{
			$result = $this->mysql->query("UPDATE `Parceria` SET `estado`= 'D' where idParceria = $id ");
			
			if (!$result) {
   				 die('Invalid query: ' . mysql_error());
				 return -1;
			}
			return 0;
			
		}
		
		
		
		public function addDescricao( $descricao )
		{
			$this->data['descricao'] .= " " . $descricao;
			echo " fff ",$this->data['descricao'];
			$result = $this->mysql->query("UPDATE `Parceria` SET `descricao`= '".$this->getDescricao()."' where idParceria = ".$this->getIdParceria() ."");
			
			if (!$result) {
   				 die('Invalid query: ' . mysql_error());
				 return -1;
			}
			return 0;
			
		}
		
		
		/**toString**/
		
		public function toString()
		{
			
			$desc = "<p>Tipo</p>". $this->getTipo()."<br> ";
			
			if( $this->getDataIni() != '')
				$desc .= "<p>Data de Inicio</p> ". $this->getDataIni()."<br> ";
			if( $this->getDataFim() != '')
				$desc .= "<p>Data de Fim </p> ". $this->getDataFim()."<br> ";
			$desc .= "<p>Descriçao</p> ". $this->getDescricao()."<br> ";
			
			$desc .= "<div id=extra_infoR>";
			$desc .= "<p>Adicionado por</p> ". $this->getUtilizador()."<br> ";
			$desc .= "<p>Em </p> ". $this->getDataCriacao()."<br> ";
			$desc .= "</div>";
			
	        return $desc;
		}
		
		
		

		
	}
?>