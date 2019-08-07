<?php
	
	$dbhost = 'localhost';
	$dbuser = 'root';
	$dbpass = '';
	$dbname = 'shop';

    session_start();

    $link = mysqli_connect($dbhost, $dbuser, $dbpass);
    mysqli_select_db($link, $dbname);
    $result = mysqli_query ( $link, "set names utf8");
    
?>