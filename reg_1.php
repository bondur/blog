<?php
session_start();
REQUIRE_ONCE "connect.php";

$name = $_POST['name'];
$login = $_POST['login'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_c = $_POST['password_c'];


$result = mysqli_query($connect, "SELECT email, login FROM users ;" );
        while ($row=mysqli_fetch_array($result)) {
            if ($row['email'] == $email) {        
               echo "<script>
                alert(' Пользователь с такой почтой уже существует ');
                document.location.href = 'regis.php';
                </script>";
                exit;
            }
            if ($row['login'] == $login) {        
                echo "<script>
                alert(' Пользователь с таким логином уже существует ');
                document.location.href = 'regis.php';
                </script>";
                exit;
            }
        }


if( $password === $password_c){

    $password = md5($password);

    mysqli_query($connect, "INSERT INTO `users` (`id`,`name`, `login`, `email`, `password`, `grants`) 
    VALUES (NULL, '$name', '$login', '$email', '$password', NULL)");
    $_SESSION ['message1'] = 'Регистрация прошла успешно';
   header ( 'Location: index.php');
}
else{
   $_SESSION ['message'] = 'Пароли не свопадают';
   header ( 'Location: regis.php');
}3



//mysqli_query($connect, $query = " INSERT INTO users (id, full_name, login, email, password)
//VALUES (NULL, '$full_name', '$login', '$email', '$password')");


?>