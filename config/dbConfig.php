<?php
$hn = 'localhost';
$un = 'fastburger_admin';
$pw = '-KJ50TCk-LnkPUZo';
$db = 'freddies_fast_burgers1';

$conn = mysqli_connect($hn, $un, $pw, $db);
if (!$conn){
    die('Connection Failed: ' . mysqli_connect_error());
}
