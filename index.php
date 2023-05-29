<?php 
session_start();
            if ( $_SESSION['message1'] ) {
                echo '<p class ="msg">' . $_SESSION['message1'] . '</p>';
            }
            unset ($_SESSION['message1']);


?>

<DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title> Главная </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href = "style.css">
</head>
<body>
    <div class = "ramka">
        <h1>Вход в систему</h1>
        <div class="btn-group">
        <a href="aut.php" class="btn btn-primary">Авторизация</a>
        <a href="regis.php" class="btn btn-primary">Регистрация</a>
        </div>
    </div>

</body>
</html>