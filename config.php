<?php
	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'shop';

    session_start();

    // $link = mysqli_connect($dbhost, $dbuser, $dbpass);
    // mysqli_select_db($link, $dbname);
    // $result = mysqli_query ( $link, "set names utf8");

    $db = new PDO("mysql:host=localhost;dbname=$dbname;port=3306", "root", "");

    $db->exec("set names utf8");
    
    // $db = null;
?>