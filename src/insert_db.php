<?php
session_start();

include "connect_db.php";

    $lecture = $_POST['lecture'];

    $dataRead ="SELECT * FROM `kurs` WHERE nazwa = '$lecture'";

    $result = $connect -> query($dataRead);
    if($result){
        while ($row = $result->fetch_assoc()){
            $_SESSION['id_kursu'] = $row['id_kursu'];
        }
        $result->free();
    }

    $courseID=$_SESSION['id_kursu'];

    $numerindex = $_SESSION['numer_indeksu'];


    $checkQuery ="SELECT * from `student_kurs` where numer_indeksu=$numerindex and id_kursu=$courseID";
    $result = $connect -> query($checkQuery);
    if($result){
        while ($row = $result->fetch_assoc()){
            $n1 = $row['id_kursu'];
            $n2 =$row['numer_indeksu'];
        }
        $result -> free();
    } 
    
    if(isset($n1)|| isset($n2)){
        //echo "Już jesteś zapisany na ten kurs";
        header("Location: enroll.php?error=Jestes już zapisany na ten kurs");
        exit();
    }
    else{
        //echo "Możesz się zapisać";
        
         $insertQuery ="INSERT INTO `student_kurs` values(". $numerindex . "," . $courseID .")";
         $result = $connect -> query($insertQuery);
         header("Location: enroll.php");
         exit();
    }

    ?>