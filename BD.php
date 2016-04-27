<?php

class BD 
{
	private $sgbd = "mysql";
	private $servidor = 'localhost';
	private $usuario = 'root';
	private $senha = ''; 
	private $bd_nome = 'teste';
	private $conn;

	function __construct(){
	
		try{
			// Cria conexão
			$this->conn = new PDO($this->sgbd.":host=".$this->servidor.";dbname=".$this->bd_nome, $this->usuario, $this->senha);
			// set the PDO error mode to exception
	    	$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    
	  } catch(PDOException $e)  {
	    	echo "Connection failed: " . $e->getMessage();
	  }

	}

	public function fecharConexao(){
		$this->conn = null;
	}

	public function gravarDados($id, $fnome, $lnome, $fone) {
		$query ="";
		if($id>0){
			$query = "UPDATE user SET fName = $fnome, lName = $lnome, phone = $fone WHERE id = $id";
		}else{
			$query = "INSERT INTO user (fName, lName, phone) VALUES ('".$fnome."', '".$lnome."', '".$fone."')";			
		}
		try{
	    $stmt = $this->conn->prepare($query);
	
		
		if ($stmt->execute()) {
	        return "Gravado com sucesso!";
	    }
	    
	    $stmt->close();
			
		} catch(PDOException $e){
			return "Erro".$query;
		}

	}

	public function listarDados($condicao) {
		
		$query = "SELECT * FROM user ".$condicao;
	    try{
		    $stmt = $this->conn->prepare($query);
			$stmt->execute();
			return $stmt->fetchAll();	 

	    }catch(PDOException $e){
	    	return "Erro: ".$e->getMessage();
	    }
		//return $result;
	}

	public function deletarDados($id) {
		$query = "DELETE FROM user WHERE id = ".$id;
		try{
			$stmt = $this->conn->prepare($query);
			if($stmt->execute()){
				return "Deletado com sucesso!!";
			}

		 }catch(PDOException $e){
	    	return "Erro ".$e->getMessage()."<br>".$query;
	    }
	}

	public function setServidor($servidor) {
		$this->servidor = $servidor;
	}

	public function setUsuario($usuario) {
		$this->usuario = $usuario;
	}

	public function setSenha($senha) {
		$this->senha = $senha;
	}

	public function setBD_nome($bd_nome) {
		$this->bd_nome = $bd_nome;
	}


}

?>
