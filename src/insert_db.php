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
        $spotsQuery="SELECT k.nazwa, k.ilosc_miejsc-(count(sk.numer_indeksu)) AS pozostalo FROM studenci.kurs k left join studenci.student_kurs sk on k.id_kursu=sk.id_kursu where k.id_kursu=$courseID group by k.id_kursu ,k.nazwa, k.ilosc_miejsc ";
        $result = $connect -> query($spotsQuery);
    if($result){
        while ($row = $result->fetch_assoc()){
            $n3 = $row['pozostalo'];
        }
        $result -> free();
    }
    if($n3==0){
        header("Location: enroll.php?error=Brak miejsc");
        exit();
    } else{
         $insertQuery ="INSERT INTO `student_kurs` values(". $numerindex . "," . $courseID .")";
         $result = $connect -> query($insertQuery);
         header("Location: enroll.php");
         exit();
    }
    }

    ?>