<?php
$hostname = "34.159.14.140";
$username ="root";
$password="";
$databasename="studenci";

    $connect = new mysqli(
        $hostname,
        $username,
        $password,
        $databasename
    );
    if (!$connect) {
        echo "Connection failed!";
    }
?>