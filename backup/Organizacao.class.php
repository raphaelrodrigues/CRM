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
			/*
			$this->idOrg=$a;
			$this->tipo=$b;
			$this->nome=$c;
			$this->nif=$d;
			$this->cidade=$e;
			$this->telefone=$f;
			$this->email=$g;
			$this->morada=$h;
			$this->sectorActividade=$i;
			$this->descricao=$j;
			$this->nomeResp=$k;
			$this->contactoResp=$l;
			$this->mailResp=$m;
			$this->idUtilizador=$n;
			$this->dataCriacao=$o;
			$this->activo=$p;*/
			$this->data = $row;
			$this->mysql = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
			
		}
		 
		
		public function getNome()
		{
			return $this->data['nome'];
		}
		
		public function getTipo()
		{
			return $this->data['tipo'];
		}
		
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
						
			$result = $this->mysql->query("INSERT INTO `organizacao`( `tipo`, `nome`, `nif`, `cidade`, `telefone`, `email`, `morada`, `sectorActividade`, `descricao`, `responsavel`, `contactoResponsavel`, `mailResponsavel`, `username`, `dataCriacao`) VALUES (4,'".$this->data['nome']."','".$this->data['nif']."','".$this->data['cidade']."','".$this->data['telefone']."','".$this->data['email']."','".$this->data['morada']."','".$this->data['sectorActividade']."','".$this->data['descricao']."','".$this->data['nomeResp']."','".$this->data['contactoResp']."','".$this->data['mailResp']."','a','a')");			
			
			
				
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
			
			 $result = $this->mysql->query("UPDATE `organizacao` SET `tipo`=$this->tipo,`nome`=$this->nome,`nif`=$this->nif,".
											 "`cidade`=$this->cidade,`telefone`=$this->telefone,`email`=$this->email,".
											 "`morada`=$this->morada,`sectorActividade`=$this->sectorActividade,`descricao`=$this->descricao,".
											 "`responsavel`=$this->nomeResp,`contactoResponsavel`=$this->contactoResp,".
											 "`mailResponsavel`=$this->mailResp,`username`=$this->idUtilizador WHERE idOrg =$this->idOrg ");
						
			if (!$result) {
   				 die('Invalid query: ' . mysql_error());
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