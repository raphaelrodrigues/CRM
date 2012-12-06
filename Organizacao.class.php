<?
	require_once('connect.php');
	class Organizacao
	{
		/*
		private $idOrg;
		private $tipo;
		private $nome;
		private $nif;
		private $cidade;
		private $telefone;
		private $email;
		private $morada;
		private $sectorActividade;
		private $descricao;
		private $nomeResp;
		private $contactoResp;
		private $mailResp;
		private $idUtilizador;
		private $dataCriacao;
		private $activo;
		private $mysql;
		*/
		private $data = array();
		private $mysql;
		
		function __construct( $row )
		{
			$this->data = $row;
			$this->mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
			
		}
		 
		/**GETs**/
		
		public function getIdOrg()
		{
			return $this->data['idOrg'];
		}
		public function getNome()
		{
			return $this->data['nome'];
		}
		
		public function getTipo()
		{
			return $this->data['tipo'];
		}
		
		public function getCidade()
		{
			return $this->data['cidade'];
		}
		
		public function getNif()
		{
			return $this->data['nif'];
		}
	
		
		public function getTelefone()
		{
			return $this->data['telefone'];
		}
		
		public function getEmail()
		{
			return $this->data['email'];
		}
		
		public function getMorada()
		{
			return $this->data['morada'];
		}
		
		public function getSectorActividade()
		{
			return $this->data['sectorActividade'];
		}
		public function getDescricao()
		{
			return $this->data['descricao'];
		}
		
		public function getNomeResp()
		{
			return $this->data['nomeResp'];
		}
		public function getContactoResp()
		{
			return $this->data['contactoResp'];
		}
		
		public function getMailResp()
		{
			return $this->data['mailResp'];
		}
		public function getIdUtilizador()
		{
			return $this->data['idUtilizador'];
		}
		
		
		/**
		** Devolve um objecto a partir de um array com 
		** toda a info da class
		**/
		public function getOrganizacao($row)
		{
			$this->idOrg=$row['idOrg'];
			$this->tipo=$row['tipo'];
			$this->nome=$row['nome'];
			$this->nif=$row['nif'];
			$this->cidade=$row['cidade'];
			$this->telefone=$row['telefone'];
			$this->email=$row['email'];
			$this->morada=$row['morada'];
			$this->sectorActividade=$row['sectorActividade'];
			$this->descricao=$row['descricao'];
			$this->nomeResp=$row['nomeResp'];
			$this->contactoResp=$row['contactoResp'];
			$this->mailResp=$row['mailResp'];
			$this->idUtilizador=$row['idUtilizador'];
			$this->dataCriacao=$row['dataCriacao'];
			$this->activo=$row['activo'];
		}
		
		
		
		public function print1()
		{
			echo $this->data['tipo'] .'<br>';
			echo  $this->data['nome'] .'<br>';
			echo  $this->data['nif'] .'<br>';
			echo $this->data['cidade'].'<br>'; 
			echo $this->data['telefone'].'<br>';
			echo $this->data['email'].'<br>';
			echo $this->data['morada'].'<br>';
			echo $this->data['sectorActividade'].'<br>';
			echo $this->data['descricao'].'<br>';
			echo $this->data['nomeResp'].'<br>';
			echo $this->data['contactoResp'].'<br>';
			echo $this->data['mailResp'].'<br>';
			echo $this->data['idUtilizador'].'<br>';
			echo $this->data['dataCriacao'].'<br>';
		}
		/*
		** Insere nova organizacao na BD
		*/
		public function insere()
		{
						
			$result = $this->mysql->query("INSERT INTO `organizacao`( `tipo`, `nome`, `nif`, `cidade`, `telefone`, `email`, `morada`, `sectorActividade`, `descricao`, `responsavel`, `contactoResponsavel`, `mailResponsavel`, `username`, `dataCriacao`) VALUES (4,'".$this->data['nome']."','".$this->data['nif']."','".$this->data['cidade']."','".$this->data['telefone']."','".$this->data['email']."','".$this->data['morada']."','".$this->data['sectorActividade']."','".$this->data['descricao']."','".$this->data['nomeResp']."','".$this->data['contactoResp']."','".$this->data['emailResp']."','a','a')");			
			
			
				
			if (!$result) {
   				 die('Invalid query: ' . mysql_error());
				 return -1;
			}
			return 0;
		}
		
		/**
		*  funcao que actualiza dados da organizacao
		*  Vem de um form de edicao por exemplo
		**/
		public function actualiza()
		{
			echo "UPDATE `organizacao` SET `tipo`=1,`nome`='".$this->data['nome']."',".
											"`nif`='".$this->data['nif']."',`cidade`='".$this->data['cidade']."'".
											 ",`telefone`='".$this->data['telefone']."',`email`='".$this->data['email']."',".
											  "`sectorActividade`='".$this->data['sectorActividade']."'".
											   ",`descricao`='".$this->data['descricao']."',`responsavel`='".$this->data['nomeResp']."'".
											     ",`contactoResponsavel`='".$this->data['contactoResp']."',`mailResponsavel`='".$this->data['emailResp']."'".
												   " WHERE idOrg = ".$this->data['idOrg']."<br>";
			
			$result = $this->mysql->query("UPDATE `organizacao` SET `tipo`='',`nome`='".$this->data['nome']."',".
											"`nif`='".$this->data['nif']."',`cidade`='".$this->data['cidade']."'".
											 ",`telefone`='".$this->data['telefone']."',`email`='".$this->data['email']."',".
											  "`sectorActividade`='".$this->data['sectorActividade']."'".
											   ",`descricao`='".$this->data['descricao']."',`responsavel`='".$this->data['nomeResp']."'".
											     ",`contactoResponsavel`='".$this->data['contactoResp']."',`mailResponsavel`='".$this->data['emailResp']."'".
												   " WHERE idOrg = ".$this->data['idOrg']."");
						
			if (!$result) {
   				 die('Invalid query: ' . mysql_error() ) ;
				 return -1;
			}
			return 0;
			
			
		}
		
		
		
		
		
		
		public function getNome1($id)
		{
			$query = $this->mysql->query("");
			if ($this->mysql->affected_rows > 0)
			{
				$row = mysql_fetch_array($query);
				return $row['nome'];
			}
			else
				return ' ';
		}
	
	}
	
?>