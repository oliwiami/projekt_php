<!DOCTYPE html>
<html lang="en">
<head>
    <title>Strona główna</title>
    <link rel="stylesheet" type="text/css" href="/style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="profile">
<a href="logout.php" id="logout">Wyloguj </a></br>
<h3>
<?php
session_start();

include "connect_db.php";

$numerindex = $_SESSION['numer_indeksu'];
$pesel = $_SESSION['pesel'];

    $dataRead ="SELECT * FROM `studenci` WHERE numer_indeksu = $numerindex and pesel = $pesel ";

    $result = $connect -> query($dataRead);
    if($result){
        while ($row = $result->fetch_assoc()){
            echo "Imie i nazwisko: ";
            echo $row["imie"] ." ". $row["nazwisko"]."</br>";
            echo "Numer indeksu: ";
            echo $row["numer_indeksu"] . "</br>";
        }
        $result->free();
    }
    
?>
</h3>
<div class="buttons">
</br>
     <a href="lectures.php" id="lecBtn"> Moje wykłady </a></br>
     <a href="enroll.php" id="enrollBtn">Zapisz się na wykład </a></br>
</div>     
</br>
</br>
</br>

</div>
</body>

</html>
