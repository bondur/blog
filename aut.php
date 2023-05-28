<?php
session_start();
?>


<DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title> Авторизация </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href = "style.css">
</head>
<body>
 <div class = "ramka">
    <form class ="aut" action="aut_1.php" method = "post">
    <p>Ещё нет аккаунта? - <a href = "regis.php"> Зарегистрируйтесь </a> </p>
    <p class="formTitle">Авторизация</p>
    <br>

        <label>Логин</label>
        <input type = "text" name = "login" placeholder = "Введите логин">
        <label>Пароль</label>
        <input type = "password"  name = "password" placeholder = "Введите пароль">

        <p>
            <?php 
            if ( $_SESSION['message'] ) {
                echo '<p class ="msg">' . $_SESSION['message'] . '</p>';
            }
            unset ($_SESSION['message']);
            ?>
        </p>

        <div >
            <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" checked name="remember" value='true'>
            <label class="form-check-label">
                Запомнить меня
            </label>
            </div>
        </div>


        <button type="submit" >Войти</button>
        <a href="index.php" class="btn btn-primary">На главную</a>
    </form>

        </div>
</body>
</html>