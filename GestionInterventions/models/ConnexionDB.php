<?php
define("USER1", "root");
define("PASSWORD1", "1234");
define("DNS1", 'mysql:host=localhost;dbname=uha-2020-gr5;charset=utf8');

class ConnexionDB{
	public $pdo;
	function __construct()
	{
		
    }
    function connect()
    {
        $this->pdo =null;
        try{
			$this->pdo =  new PDO(DNS1, USER1, PASSWORD1);
		}
		catch(PDOException $e) {

		die($e->getMessage());
        }
        
        return $this->pdo;
    }
}
    
?>