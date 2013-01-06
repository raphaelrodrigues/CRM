<?
	require_once('connect.php');
	class Organizacao
	{
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
		
		public function getSite()
		{
			return $this->data['site'];
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
		public function getDataCriacao()
		{
			return $this->data['dataCriacao'];
		}
		
		
		
		/**
		** Funcao devolve o nome do utilizador a partir do seu id
		**/
		public function getNomeUtilizador()
		{
			$result = $this->mysql->query("select user from login where idUser = 23");
				
			
			if ($this->mysql->affected_rows > 0)
			{
				$row=$result->fetch_array(MYSQLI_ASSOC);
				return $row['user'];
			}
			else
				return '';
		}
		
		
		/**SETS*/
		
		public function setNif( $nif )
		{
			$this->data['nif'] = $nif;
		}
		
		public function setNome( $nome )
		{
			$this->data['nome'] = $nome;
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
		** verifica se nif ja existe
		*/
		
		public function verificaNif()
		{
			$result = $this->mysql->query("select nif from organizacao");
			
			while( $row=$result->fetch_array(MYSQLI_ASSOC) )
			{
					if( $row['nif'] === $this->data['nif'] )
						return 1;
			}
			
			return 0;
			
			
		}
		
		public function verificaNome()
		{
			$result = $this->mysql->query("select nome from organizacao");
			
			while( $row=$result->fetch_array(MYSQLI_ASSOC) )
			{
					if( $row['nome'] === $this->data['nome'] )
						return 1;
			}
			
			return 0;
			
			
		}
		
		public function verificaCampos()
		{
			if( $this->data['nome'] != "" && $this->data['nif'] != "" && $this->data['cidade'] != "" && $this->data['sectorActividade'] != "")
				return 0;
			else
				return -1;
		}
		
		/*
		** Insere nova organizacao na BD
		*/
		public function insere()
		{
			
			if( $this->verificaCampos() == -1)
				return -1;
			
			$result = $this->mysql->query("INSERT INTO `organizacao`( `tipo`, `nome`, `nif`, `cidade`, `telefone`, `email`, `morada`,`site`, `sectorActividade`, `descricao`, `nomeResp`, `contactoResp`, `mailResp`, `idUtilizador`, `dataCriacao`) VALUES (".$this->data['tipo'].",'".$this->data['nome']."','".$this->data['nif']."','".$this->data['cidade']."','".$this->data['telefone']."','".$this->data['email']."','".$this->data['morada']."','".$this->data['site']."','".$this->data['sectorActividade']."','".$this->data['descricao']."','".$this->data['nomeResp']."','".$this->data['contactoResp']."','".$this->data['emailResp']."','a','".$this->data['dataCriacao']."')");			
			
			if ( !$result ) {
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
			
			echo "UPDATE `organizacao` SET `tipo`=".$this->data['tipo'].",`nome`='".$this->data['nome']."',".
											"`nif`='".$this->data['nif']."',`cidade`='".$this->data['cidade']."'".
											 ",`telefone`='".$this->data['telefone']."',`email`='".$this->data['email']."',".
											  "`morada`='".$this->data['morada']."'".
											  "`sectorActividade`='".$this->data['sectorActividade']."'".
											   ",`descricao`='".$this->data['descricao']."',`nomeResp`='".$this->data['nomeResp']."'".
											     ",`contactoResp`='".$this->data['contactoResp']."',".
											     "`mailResponsavel`='".$this->data['emailResp']."'".
												   " WHERE idOrg = ".$this->data['idOrg']."";
			$result = $this->mysql->query("UPDATE `organizacao` SET `tipo`=".$this->data['tipo'].",`nome`='".$this->data['nome']."',".
											"`nif`='".$this->data['nif']."',`cidade`='".$this->data['cidade']."'".
											 ",`telefone`='".$this->data['telefone']."',`email`='".$this->data['email']."',".
											  "`morada`='".$this->data['morada']."',".
											  "`sectorActividade`='".$this->data['sectorActividade']."'".
											   ",`descricao`='".$this->data['descricao']."',`nomeResp`='".$this->data['nomeResp']."'".
											     ",`contactoResp`='".$this->data['contactoResp']."',".
											     "`mailResp`='".$this->data['emailResp']."'".
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
		
		
		/**toString**/
		
		public function toString()
		{
			
			$desc = "<p> Nome </p>". $this->getNome()."<br> ";
			$desc .= "<p>Nif</p> ". $this->getNif()."<br> ";
			
			if( $this->getTipo() == 1 )
				$desc .= "<p>Tipo</p> Corporate <br> ";
			else
				$desc .= "<p>Tipo</p> Non-Corporate <br> ";
			
			$desc .= "<p>Cidade</p> ". $this->getCidade()."<br> ";
			$desc .= "<p>Sector de Actividade </p> ". $this->getSectorActividade()."<br> ";
			
			if( $this->getTelefone() !== "" )
				$desc .= "<p>Telefone</p> ". $this->getTelefone()."<br> ";
			if( $this->getEmail() !== "" )
				$desc .= "<p>Email</p> ". $this->getEmail()."<br>";
			
			if( $this->getMorada() !== "" )
				$desc .= "<p>Morada</p> ". $this->getMorada()."<br> ";
			if( $this->getSite() !== "" )
				$desc .= "<p>Site</p><a href='http://". $this->getSite()."'> ". $this->getSite()."</a><br> ";
			if( $this->getDescricao() !== "" )
				$desc .= "<p>Descrição</p> ". $this->getDescricao()."<br> ";
			if( $this->getNomeResp() !== "" )
				$desc .= "<p>Nome Responsavel</p> ". $this->getNomeResp()."<br> ";
			if( $this->getContactoResp() !== "" )
				$desc .= "<p>Contacto Responsavel</p> ". $this->getContactoResp()."<br> ";
			if( $this->getMailResp() !== "" )
				$desc .= "<p>Mail Responsavel</p> ". $this->getMailResp()."<br> ";
			
			
			
			$desc .= "<div id=extra_infoO>";
			$result = $this->mysql->query("select DATEDIFF(data,now()),r.* from reuniao r where r.idOrg = ".$this->getIdOrg()." and DATEDIFF(r.data,now()) BETWEEN 0 AND 30 order by data limit 3");
			
			if ( $result->num_rows != 0)
			{
				$desc .= "<h1>Proximas Reunioes</h1>";
				while( $row = $result->fetch_array(MYSQLI_ASSOC) )
				{
					$desc .= "<p>Assunto</p> ". $row['assunto'] ."<br> ";
					$desc .= "<p>data</p> ". $row['data'] ."  ". $row['hora'] ."<br> ";
					$desc .= '<div class="stripe-separator1"><!--  --></div>';
					
				}
			}
			else
				$desc .= "Sem reuniões marcadas";
				
			$desc .= "</div>";

			
	        return $desc;
		}
	
	}
	
?>