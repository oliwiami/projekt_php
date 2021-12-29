<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log in</title>
</head>
<body>
<div class="login">
<form action="src/profile.php" method="POST">
    <label for="username"><b>Zaloguj się</b></label></br></br>
    <label>Nazwa użytkownika: </label>
        <input type="text" placeholder="numer indeksu" id="username" name="username" required></br>
    <label for="userpasswd">Hasło:</label>
        <input type="text" placeholder="pesel" id="userpasswd" name="userpasswd" required></br>
        <button name="logIn">Zaloguj</button>
</br>
    </form>
</div>

</body>
</html>

<?php 
   // $indexNumber = document.getElementById("username");
?>
