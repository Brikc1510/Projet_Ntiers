<?php
define("USER", "root");
define("PASSWORD", "1234");
define("DNS", 'mysql:host=localhost;dbname=ebrigade1;charset=utf8');

class DataBase{
	public $pdo;
	function __construct()
	{
		
    }
    function connect()
    {
        $this->pdo =null;
        try{
			$this->pdo =  new PDO(DNS, USER, PASSWORD);
		}
		catch(PDOException $e) {

		die($e->getMessage());
        }
        
        return $this->pdo;
    }
}
    
?>