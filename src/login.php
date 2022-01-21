<?php 
   include "connect_db.php";

   session_start();

   $uname = $_POST['uname'];
    $passwd = $_POST['passwd'];

    $dataRead ="SELECT * FROM `studenci` WHERE numer_indeksu=$uname and pesel=$passwd";

    $result = $connect -> query($dataRead);

    if($result){
        while ($row = $result->fetch_assoc()){
            $_SESSION['numer_indeksu'] = $row['numer_indeksu'];
            $_SESSION['pesel'] = $row['pesel'];
            $_SESSION['nazwisko'] = $row['nazwisko'];
        }
        $result->free();

                
    }
    if(isset($_SESSION['numer_indeksu']) && isset($_SESSION['pesel'])){
        header("Location: profile.php");
        exit();
    }
    else{
        header("Location: /index.php?error=Błędne dane");
        exit();
    }
?>

