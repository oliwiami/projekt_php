<?php
    session_start();
    include "connect_db.php";

    $lecture = $_POST['lecture_2'];

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

    $deleteQuery="DELETE FROM `student_kurs` where numer_indeksu=$numerindex and id_kursu=$courseID";
    $result = $connect -> query($deleteQuery);
    header("Location: lectures.php");
    exit();
    ?>
