<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/style.css">
    <title>Moje wykłady</title>
</head>
<body>
<a href="profile.php">Wróć</a></br>
<?php
    session_start();
    $idCount;

    include "connect_db.php";

    $numerindex = $_SESSION['numer_indeksu'];

    $dataRead="SELECT kurs.nazwa, student_kurs.id_kursu from student_kurs, kurs  where student_kurs.id_kursu = kurs.id_kursu and student_kurs.numer_indeksu=$numerindex order by kurs.id_kursu asc";
    $result = $connect -> query($dataRead);
    if($result){
        while ($row = $result->fetch_assoc()){
            echo $row['nazwa']."</br>";
            $idCount = $row['id_kursu'];
        }
        $result -> free();
    } 
    if(!isset($idCount)){
        echo "Nie jesteś zapisany na żadny kurs. </br>"; ?>
        </br><a href="enroll.php">Zapisz się na wykład</a></br>

    <?php }

?>

<div class="leave">

<form action="delete_db.php" method="post">
    <label for="lectures">Wybierz kurs, z którego chcesz się wypisać:</label>
    <select id="lc_2" name="lecture_2">

    <?php
    session_start();

        include "connect_db.php";
        $numerindex = $_SESSION['numer_indeksu'];

        $dataRead = "SELECT nazwa FROM `kurs`,`student_kurs` where kurs.id_kursu=student_kurs.id_kursu and student_kurs.numer_indeksu=$numerindex";
        $result = $connect -> query($dataRead);
    
        while ($rows = $result->fetch_assoc()){ 
        ?>
        <option id="opcja" value="<?php echo $rows['nazwa'];?>"><?php echo $rows['nazwa'];?> </option>
<?php
        }
?>

</select></br>
        <button id="leave_c" name="leave_c">Wypisz mnie</button>
</form>
</div></br>
</body>
</html>