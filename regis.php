<?php
session_start();
?>

<DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title> Регистрация </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" href = "style.css">
</head>
<body>
<div class = "ram">
    <form  action = "reg_1.php" method = "post" class="form-container">
    <p>Уже есть аккаунт? - <a href = "aut.php"> Авторизируйтесь </a> </p>
    <p class="formTitle">Регистрация</p>
    
        <label>ФИО</label>
        <input type = "text" name = "name" placeholder = "Введите ФИО">
        <label>Логин</label>
        <input type = "text" name = "login" placeholder = "Введите логин">
        <label>Почта</label>
        <input type = "email"name = "email" placeholder = "name@example.com">
        <label>Пароль</label>
        <input pattern=".{8,20}" required title="От 8 до 20 символов" type = "password" name = "password" placeholder = "Введите пароль">
        <label>Повторите пароль</label>
        <input pattern=".{8,20}" required title="От 8 до 20 символов" type = "password" name = "password_c" placeholder = "Введите пароль">
        
        <p>
            <?php
           
             
        /*   if ( $_SESSION['message'] ) {
               echo '<p class ="msg">' . $_SESSION['message'] . '</p>';
           }
           unset ($_SESSION['message']); */
            ?> 
        </p>

        <div >
                <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                   <th> <b>Согласие на обработку персональных данных </b> </th>
                </label>
                <div class="invalid-feedback">
                    Чтобы зарегестрироваться, вы должны согласиться
                </div>
                </div>
        </div>

        <button type="submit">Зарегистрироваться</button>
        
        <a href="index.php" class="btn btn-primary">На главную</a>
        
    </form>
        </div>

</body>
</html>