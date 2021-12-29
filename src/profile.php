<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona główna</title>
</head>
<body>
<?php

$hostname = "127.0.0.1";
$username ="root";
$password="";
$databasename="studentsdata";

    $connect = new mysqli(
        $hostname,
        $username,
        $password,
        $databasename
    );

    $dataRead ="SELECT *  FROM student";

    $result = $connect -> query($dataRead);
    if($result){
        while ($row = $result->fetch_assoc()){
            echo "Imie i nazwisko: </br>";
            echo $row["name"] ." ". $row["lastname"]."</br>";
            echo "Numer indeksu: </br>";
            echo $row["index_number"] . "</br>";
           // echo $row["email"] . "</br>";
        }
        $result->free();
    }

    echo "--------------------------------------------------------------"."</br>";

    include 'lectures.php';
    include 'enroll.php';

    
    
?>
</body>
</html>
