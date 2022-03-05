<?php

$host = 'localhost';
$dbUserName = 'root';
$dbPassword = '';
$dbName = 'blog';

$dbConnect = mysqli_connect($host, $dbUserName, $dbPassword, $dbName);

session_start();
