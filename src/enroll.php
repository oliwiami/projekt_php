<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/style.css">
    <title>Kursy</title>
</head>
<style>
 table, th, td {
 border:1px solid black
}
</style>
<body>

<div class="enrollment">

<a href="profile.php">Wróć</a></br>

<form action="insert_db.php" method="post">
    <label for="lectures">Wybierz kurs, który Cię interesuje:</label>
    <select id="lc" name="lecture">

    <?php
    session_start();

        include "connect_db.php";
        $numerindex = $_SESSION['numer_indeksu'];
        $pesel = $_SESSION['pesel'];

        $dataRead = "SELECT * FROM `kurs`";
        $result = $connect -> query($dataRead);
    
        while ($rows = $result->fetch_assoc()){ 
        ?>
        <option id="opcja" value="<?php echo $rows['nazwa'];?>"><?php echo $rows['nazwa'];?> </option>
<?php
        }
?>

</select></br>
        <button id="enroll" name="enroll">Zapisz mnie</button>
</form>
</div></br>
<div>
   <?php
   include "connect_db.php";
   $dataRead ="SELECT k.nazwa, k.ilosc_miejsc-(count(sk.numer_indeksu)) AS pozostalo FROM studenci.kurs k left join studenci.student_kurs sk on k.id_kursu=sk.id_kursu group by k.id_kursu ,k.nazwa, k.ilosc_miejsc ";
   $result = $connect -> query($dataRead);
   if($result){ ?>
   <table>
   <tr>
        <th> Kurs </th>
        <th> Wolne miejsca </th>
</tr>
       <?php while ($row = $result->fetch_assoc()){ ?>
        <tr>
           <td> <?php echo $row["nazwa"]?></td> <td> <?php echo $row["pozostalo"]?> </td>
       </tr>
      <?php }
       $result->free();
   }
   ?>
</table>
</div>
<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
</body>
</html>

