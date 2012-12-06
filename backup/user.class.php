<?
	//require_once ('config.php');
	/**
	 * Classe do utilizador do sistema
	 *
	 * @param string $user -Username do user
	 * @param string $pass -Password do User(MIN 5 caracteres);
	 * @email string $email- Mail do user
	 * @var boolean Usa um cookie para melhorar a segurança? 
	 */
	class user
	{
		private $id;
		private $user;
		private $pass;
		private $email;
		private $mysql;
		private $cookie = true; 
		private $sessaoIniciada;
		private $activo;
		private $verificado;
		/** 
		 * Armazena as mensagens de erro 
		 * @var string 
		 */ 
		var $erro = ''; 

		
		
		function __construct($a,$b,$c)
		{
			$this->user=$a;
			$this->pass=$b;
			$this->mysql=new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
			$this->email = $c;
			$this->activo = true;
		}
		
		
		function __destruct()
		{
			$this->mysql->close();
		}
		
		/**
		 * Valida se um user existe
		 *
		 * @param string $user - O user que será validado
		 * @param string $pass - A pass que será validada
		 * @return boolean - Se o user existe ou não
		 */
		public function validaUtilizador($user, $pass) {
			$senha = $this->codificaPass($pass);
	
			// Procura por usuários com o mesmo usuário e senha
			$sql = "SELECT COUNT(*) FROM `{$this->bancoDeDados}`.`{$this->tabelaUsuarios}  
					`{$this->campos['usuario']}` = '{$usuario}'
						AND
						`{$this->campos['senha']}` = '{$senha}'";
			
			$query = mysql_query($sql);
			if ($query) {
				$total = mysql_result($query, 0);
			} else {
				// A consulta foi mal sucedida, retorna false
				return false;
			}
			// Se houver apenas um user, retorna true
			return ($total == 1) ? true : false;
		}
		
		
		public function login($user, $pass)
		{
			$update_query = "select user from login where user = '$user' and pass = '$pass'";
			$query = $this->mysql->query($update_query);
			if ($this->mysql->affected_rows > 0)
			{
				while ( $row = mysql_fetch_array($query) )
					echo $row['user']. " sdksjdhs";
			}
			$pass1 = $this->codificaSenha("HELLO");
			echo $pass1;
			$query = $this->mysql->query("insert into login values('REI','$pass1',1)");
		}
		
		
		
		public function novoUtilizador()
		{
			//verifica se email ou utilizador ja existe
			if($this->verifica() == 0)
					return -1;
			else{
				$passwordCod = sha1($this->senha);
				$query = $this->mysql->query("insert into login values('$this->user','$passwordCod')");
				return 1;
			}
		}
		
		
		public function change($newPassword)
		{
			$update_query = "UPDATE login SET pass = '$newPassword' WHERE user = '$this->user'";
			$query = $this->mysql->query($update_query);
			if ($this->mysql->affected_rows > 0)
			{
				$row = mysql_fetch_array($query);
			}
		}
		
		public function mudaPassword()
		{
			if( validaUtilizador($user, $pass) )
			{
				if (strcmp($newPassword1, $newPassword2) == 0)
				{
					$digest = $this->codificaSenha($newPassword1);
					//$update_query = "UPDATE users SET password = '{$digest}' WHERE user_name = '{$_SESSION["loginUsername"]}'";
					
					$this->pass = $digest;
					if (!$result = @ mysql_query ($update_query, $connection)){
						showerror();
					
					  $_SESSION["passwordMessage"] = "Password changed for '{$_SESSION["loginUsername"]}'";
					}
					else
					{
					  $_SESSION["passwordMessage"] = "Could not change password for '{$_SESSION["loginUsername"]}'";
					}

				}
			}
		}
		
		/**
		 * encriptação para codificar uma senha
		 *
		 * @param string $senha - A senha que será codificada
		 * @return string - A senha já codificada
		 */
		public function codificaSenha($senha) {
			 return md5($senha);
			
		}
		
		public function enviaPasswordMail()
		{
				
		}
		
		public function getUser()
		{
			return $this->user;
		}
		
		public function getPass()
		{
			return $this->pass;
		}
		
		
	}
		