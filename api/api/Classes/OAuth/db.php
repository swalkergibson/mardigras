<?php
namespace Classes\OAuth;

class DB {

	private $conn;
	private $statement;

	function __construct()
	{
		$this->conn = new \PDO('mysql:host='.OAUTH2DBHOST.';dbname='.OAUTH2DBNAME, OAUTH2DBUSER, OAUTH2DBPASSWORD);
	}

	function query($sql = '', $params = array())
	{
		$statement = $this->conn->prepare($sql);
		$statement->setFetchMode(\PDO::FETCH_OBJ);
		$statement->execute($params);
		return $statement;
	}

	public function getInsertId()
	{
		return (int) $this->conn->lastInsertId();
	}

}