<?php
	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'shop';
    
    $db = new PDO("mysql:host=localhost;dbname=$dbname;port=3306", "root", "");
    $db->exec("set names utf8");
    // $db = null;
    
    session_start();
    
?>