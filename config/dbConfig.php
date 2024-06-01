<?php
$hn = 'localhost';
$un = 'fastburger_admin1';
$pw = 'f*TYHCGNoez-0cJ[';
$db = 'fast_burger';
$un = 'root';
$pw = '';


$conn = mysqli_connect($hn, $un, $pw, $db);
if (!$conn){
    die('Connection Failed: ' . mysqli_connect_error());
}

