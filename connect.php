<?php
$server = 'localhost';
$username = 'root';
$password = '';
$dbname = 'blog';
$connect = mysqli_connect($server, $username, $password, $dbname);
mysqli_select_db($connect, $dbname);
mysqli_query($connect, "SET lc_time_names = 'ru_RU';" );
if(!$connect){
    die('Error connect to database');
    }
?>