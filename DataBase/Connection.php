<?php

namespace DataBase;
use PDO;
use PDOStatement;

class Connection{
	public static $instance;
	public PDO $db;
    
	public static function getInstance() : static{
		if(static::$instance === null){
			static::$instance = new static();
		}

		return static::$instance;
	}


	protected function __construct(){
		$this->db = new PDO('mysql:host=localhost;dbname=Cities_Users','root', '', [
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		]);
	}

    public function dbQuery(string $sql, array $params = []):PDOStatement{
    
        $query = $this->db->prepare($sql);
        $query->execute($params);
        return $query;
    }

    function dbLastId():int {
        $lastId = $this->db->lastInsertId();
        return $lastId;
   }

}
        
?>