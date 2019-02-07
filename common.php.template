<?php
ini_set('error_reporting', E_ALL);
define("DB_HOST", "localhost");
define("DB_USER", "");
define("DB_PASSWORD", "");
define("DB_NAME", "");
try
{
	$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); 
	$db = new PDO ("mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASSWORD, $options);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
	$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true); 
}
catch (PDOException $ex)
{
	die($ex->getMessage());
}
	function dosql($query, $data = "")
	{
		global $db;
		try
		{
			$stmt = $db->prepare($query);
			$result = $data? $stmt->execute($data) : $stmt->execute();
			return $stmt;
		}	
		catch (PDOException $ex)
		{
			die($ex->getMessage());
		}
	}
	function mysql_params($items)
	{
		$params = array();
		$input = array();
		foreach ($items as $key => $value)
		{
			$input[$key] = ":".$key; 
			$params[":".$key] = $value;
		}
		return array($input, $params);
	}	
	function mysql_insert($table, $items)
	{
		$params = mysql_params($items);
		return dosql("INSERT INTO `".$table."`(".implode(",",array_keys($params[0])).") VALUES(".implode(",",array_values($params[0])).");", $params[1]);
	}
	function mysql_select($table, $clause, $items)
	{
		$params = mysql_params($items);
		$sql = "SELECT * FROM `" . $table."`". ($params[0]? " WHERE " : "");
		foreach($params[0] as $key => $value)
		{
			$sql .= $key."=".$value." ". $clause. " ";
		}
		$sql = trim($sql, $clause." ") . ";";
		return dosql($sql, $params[1]);
	}
	function addMessage($message, $var = "success")
	{
		if (!isset($_SESSION[$var])) $_SESSION[$var] = array();
		$_SESSION[$var][] = $message;
	}
	function requiresAuthentication()
	{
		if (!isset($_SESSION['user']) || !$_SESSION['user']) header("Location: login.php");
	}
session_start(); 
if (file_exists(getcwd()."/backend/".basename($_SERVER['PHP_SELF']))) require_once(getcwd()."/backend/".basename($_SERVER['PHP_SELF']));
header("X-XSS-Protection: 1; mode=block");
header('Content-Type: text/html; charset=utf-8'); 
?>
