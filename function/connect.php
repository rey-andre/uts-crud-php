<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'scmic';
    
    $conn = mysqli_connect($hostname, $username, $password,$dbname) or die('connection Failed!');
?>