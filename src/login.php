<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in</title>
</head>
<body>
<div class="login">
<form method="POST">
    <label for="uname"><b>Zaloguj się</b></label></br></br>
    <label>Nazwa użytkownika: </label>
        <input type="text" placeholder="numer indeksu" id="uname" name="uname" required></br>
    <label for="userpasswd">Hasło:</label>
        <input type="text" placeholder="pesel" id="userpasswd" name="userpasswd" required></br>
        <button name="logIn">Zaloguj</button>
</br>
    </form>
</div>

</body>
</html>

<?php 
   $name = $_POST['uname'];
   $passwd = $_POST['userpasswd'];
   
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
        header('Location: src/profile.php');
    }
    else{
        echo 'niepoprawne dane';
    }
?>
