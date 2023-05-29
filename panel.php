<?php
include ("connect.php")
?>

<?php
session_start();

if (!isset($_SESSION['login']) && isset($_COOKIE['login'])) {
    $_SESSION['login'] = $_COOKIE['login'];
    }
    $username = $_SESSION['login'];
    
    if (!isset($_SESSION['grants']) && isset($_COOKIE['grants'])) {
    $_SESSION['grants'] = $_COOKIE['grants'];
    }
    $grants = $_SESSION['grants'];
?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Меню</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>

    
    <div class="ramka">
    <h1>Меню управления</h1>
    <br>
    <?php
    if ($grants == 'admin') {
    echo "<form class='backform' action='create.php'>
    <input type='submit' value='Создать  пост'>
        </form>";
    echo "<form class='backform' action='view_post.php'>
    <input type='submit' value='Просмотр постов'>
        </form>";


    }
    elseif ($grants == 'moderator') {
    
    echo "<form class='backform' action='update.php'>
    <input type='submit' value='Редактировать пост'>
        </form>";
    echo "<form class='backform' action='view_post.php'>
    <input type='submit' value='Просмотр постов'>
        </form>";
    }

?>
<a href="index.php" class="btn btn-primary">Выход</a>



    </div>   
</body>
</html>