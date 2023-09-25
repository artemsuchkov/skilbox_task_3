<?php


namespace classes\db;

class Connect {
	private static $link;
	
	public function __construct()
	{
		if (!self::$link) {
			self::$link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			mysqli_query(self::$link, "SET NAMES 'utf8'");
		}
	}
	
	public function findOne($query)
	{
		$result = mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
		return mysqli_fetch_assoc($result);
	}
	
	public function findMany($query)
	{
		$result = mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
		for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		
		return $data;
	}
	
	public function add($query)
	{
		mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
		return mysqli_insert_id(self::$link);
	}
	
	public function del($query)
	{
		if(mysqli_query(self::$link, $query))
			return true;
		else 
			return false;
	}
	
	public function update($query)
	{
		mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
		return ("Обновлено");
	}
	
	public function cnt($query)
	{
		$sql = mysqli_query(self::$link, $query) or die(mysqli_error(self::$link));
		$res = mysqli_fetch_assoc($sql);
		if(!empty($res["count"]))
			return $res["count"];

	}

	public function safe($var)
	{
		$var = strip_tags(trim($var));
		return $var = mysqli_real_escape_string(self::$link,$var);

	}

}