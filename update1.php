<?php
require_once 'connect.php';

$id = $_GET['id'];
    $postss = mysqli_query($connect, $query= "SELECT * FROM `posts` WHERE id = $id");
    $posts= mysqli_fetch_assoc($postss);

?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>AAAAAAa</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<div class = "ram">
        <div id="form">
            <form action="update1_1.php" method="post">
                <input type="hidden" name="id" value="<?= $posts['id'] ?>">
                <p>Наименование модели</p>
                <input type="text" name="title" value="<?= $posts['title'] ?>">
                <p>Цена</p>
                <input type="text" name="description" value="<?= $posts['description'] ?>">
                <p>Категория</p>
                <?php
                    $cat= mysqli_query($connect, $query= "SELECT `id`, `name` FROM `categories`");
                    echo "<select name = 'name_cat'>";
                   
                    while ($row = mysqli_fetch_array ($cat)){
                        if ($posts['id_category'] != $row['id'] ){
                            echo "<option value='$row[0]'>$row[1]</option>";}
                            else {
                        echo "<option value = $row[0] selected > $row[1]</option> ";
                            }
                        }
                    echo "</select>"
                 ?>
                 <div class='radioButton'>Отображение поста: 
                <input type='checkbox' value='0' select name = 'param4'>
                </div>

                <br>
                <button class="third" type="submit">Обновить</button>
            </form>
            </form> 
             <a href="update.php" class="btn btn-primary">Назад</a>
 </div>

</body>
</html>