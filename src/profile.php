<!DOCTYPE html>
<html lang="en">
<head>
    <title>Strona główna</title>
</head>
<body>
</body>
<?php

//$indexNumber = $_POST['indexnum'];

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

    $dataRead ="SELECT *  FROM student where index_number=$username";

    $result = $connect -> query($dataRead);
    if($result){
        while ($row = $result->fetch_assoc()){
            echo "Imie i nazwisko: </br>";
            echo $row["name"] ." ". $row["lastname"]."</br>";
            echo "Numer indeksu: </br>";
            echo $row["index_number"] . "</br>";
            echo $row["email"] . "</br>";
        }
        $result->free();
    }

    echo "--------------------------------------------------------------"."</br>";

    include 'lectures.php';
    include 'enroll.php';

    
    
?>
</html>
