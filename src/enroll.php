<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kursy</title>
</head>
<body>

<div class="enrollment">

<a href="profile.php">Wróć</a></br>

<form action="" method="post">
    <label for="lectures">Wybierz kurs, który Cię interesuje:</label>
    <select id="lc" name="lecture">

    <?php

include "connect_db.php";

        $dataRead = "SELECT * FROM `studenci`";
        $result = $connect -> query($dataRead);
    
        while ($rows = $result->fetch_assoc()){ 
        ?>
        <option id="opcja" value="<?php echo $rows['imie'];?>"><?php echo $rows['imie'];?> </option>
<?php
        }
?>

</select></br>
        <button name="submit">Zapisz mnie</button>
    </form>
</div>


</body>
</html>

