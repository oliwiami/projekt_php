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
<form action="" method="post">
    <label for="lectures">Wybierz kurs, który Cię interesuje:</label>
    <select id="lc" name="lecture">

    <?php

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
        $dataRead = "SELECT * FROM `student`";
        $result = $connect -> query($dataRead);
    
        while ($rows = $result->fetch_assoc()){ 
        ?>
        <option id="opcja" value="<?php echo $rows['name'];?>"><?php echo $rows['name'];?> </option>
<?php
        }
        $selected = $_POST['lecture'];
echo $selected;
?>

</select></br>
        <button name="submit">Zapisz mnie</button>
    </form>
</div>


</body>
</html>

