<!DOCTYPE html>
<html lang="en">
<head>
    <title>Strona główna</title>
    <link rel="stylesheet" type="text/css" href="/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php
session_start();

include "connect_db.php";

$numerindex = $_SESSION['numer_indeksu'];
$pesel = $_SESSION['pesel'];

    $dataRead ="SELECT * FROM `studenci` WHERE numer_indeksu = $numerindex and pesel = $pesel ";

    $result = $connect -> query($dataRead);
    if($result){
        while ($row = $result->fetch_assoc()){
            echo "Imie i nazwisko: </br>";
            echo $row["imie"] ." ". $row["nazwisko"]."</br>";
            echo "Numer indeksu: </br>";
            echo $row["numer_indeksu"] . "</br>";
        }
        $result->free();
    }
   

    echo "--------------------------------------------------------------"."</br>";

    
?>

<body>
     <a href="enroll.php">Zapisz się na wykład</a></br>
</br>
     <a href="logout.php">Wyloguj </a></br>
</body>

</html>
