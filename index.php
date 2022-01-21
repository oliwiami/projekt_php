<!DOCTYPE html>
<html>
<head>
	<title>Wykład do wyboru</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
     <form action="src/login.php" method="post">
     	<h2>Zaloguj się</h2>

     	<label>Nazwa użytkownika</label>
     	<input type="text" name="uname" placeholder="Pesel" required><br>

     	<label>Hasło</label>
     	<input type="password" name="passwd" placeholder="Hasło" required><br>

     	<button type="submit">Zaloguj</button>
     </form>

     <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
</body>
</html>