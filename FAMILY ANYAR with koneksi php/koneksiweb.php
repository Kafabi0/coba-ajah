<?php

$hostname = 'localhost'; // hostnames

$database_username = 'root'; // database usernames

$database_password = ''; // database passwords

$database_name = 'daftar'; //database name

$db_connect = mysqli_connect($hostname, $database_username, $database_password, $database_name);

if(!$db_connect){

    die('Could not connect to database:' .mysqli_error());

}