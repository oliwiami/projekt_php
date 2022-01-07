<!DOCTYPE html>
<html lang="en">
<head>
    <title>Strona główna</title>
</head>
<body>
</body>
<script>
       function changePage(whereToGo, messageText)
       {
           alert(messageText);
           window.location=whereToGo;
       }
</script>
<?php

$name = $_POST['uname'];
$passwd = $_POST['userpasswd'];
$GLOBALS['wrongData'] = false;

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

    $dataRead ="SELECT * FROM `student` WHERE index_number=$name and pesel=$passwd";

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
    /*else{

       echo '<script>changePage("/index.php", "Niepoprawne dane");</script>';

    }*/

    echo "--------------------------------------------------------------"."</br>";

    include 'lectures.php';
    include 'enroll.php';

    
    
?>
</html>
