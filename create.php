<?php
include ("connect.php");

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
    <title>AAAAAAa</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
<?php    

echo "<div class='editString'>Выберите категорию: ";
$result = mysqli_query($connect, "SELECT DISTINCT id, `name` FROM categories" );
echo "<select name = 'param1'>";

while ($row=mysqli_fetch_array($result)) {
$value = $row['name'];
$id = $row['id'];
echo "<option value = $id> $value </option>";
}
echo "</select> </div>";

echo "<div class='editString'>Заголовок: ";
echo "<input type='text' name='param2'></div>";

echo "<div class='editString'> Описание: ";
echo "<input type='text' name='param3'></div>";

echo "<div class='radioButton'>Отображение поста: ";
echo "<input type='checkbox' value='0' select name = 'param4'>";

// Попопытка вноса изображения в БД
// $data = addslashes(fread(fopen($_FILES['file']['tmp_name'], "r"), 
// filesize($_FILES['file']['tmp_name'])));

// $ErrorDescription = '';
// function get_image($num){
//   global $ErrorDescription;
//   static $image_size=0;
//   // Проверяем не пустали глобальная переменная $_FILES
//   if(!empty($_FILES)){
// 	$image_size=$_FILES['userfile']['size'][$num];
// 	// Ограничение на размер файла, в моём случае 1Мб
// 	if($image_size>1024*1024||$image_size==0)
// 	{
// 		$ErrorDescription="Каждое изображение не должно привышать 1Мб! 
// 			Изображение в базу не может быть добавлено.";
// 			return '';
// 	}
// 	// Если файл пришел, то проверяем графический
// 	// ли он (из соображений безопасности)
// 	if(substr($_FILES['userfile']['type'][$num], 0, 5)=='image')
// 	{
// 		//Читаем содержимое файла
// 		$image=file_get_contents($_FILES['userfile']['tmp_name'][$num]);
// 		//Экранируем специальные символы в содержимом файла
// 		$image=mysql_escape_string($image);
// 		return $image;      
// 	}else{
// 		$ErrorDescription="Вы загрузили не изображение,
// 			поэтому оно не может быть добавлено.";
// 			return '';
// 	}    
//   }else{
// 	$ErrorDescription="Вы не загрузили изображение, поле пустое,
// 		поэтому файл в базу не может быть добавлен.";
// 		return ;
//   }
// 	return $image;
// }

// // Используя ранее определенную функцию get_image присваиваем
// // переменным содержимое файлов
// $image_before=get_image(0);
// if ($image_before == ''){
// 	unset($image_before);
// }else{
// 	$image_after=get_image(1);
// 	if ($image_after == ''){
// 		unset($image_after);
// 	}
// }
// // ...
// // Проверяем, установлены ли переменные
// if (isset($title) && isset($image_after)&&isset($image_before)){
// 	/* Здесь пишем что можно заносить информацию в базу.
// 	В нашем случае в базе существует два поля типа
// 	MEDIUMBLOB:img_before и img_after */
// 	$result = mysql_query (
// 		"INSERT INTO imagess(title,img_before,img_after) 
// 		VALUES ('$title','$image_before','$image_after')");
// 	if ($result == 'true'){
// 		echo "Ваши изображения успешно добавлены!";
// 	}else{echo "Ваши изображения не добавлены!";}
// }else{
// 	if ($ErrorDescription == ''){
// 		echo "Вы ввели не всю информацию, поэтому 
// 			изображения в базу не могут быть добавлены.";
// 	}else{echo $ErrorDescription;}
// }


$param1 = !empty($_POST['param1']) ? $_POST['param1'] : 'NULL';
$param2 = !empty($_POST['param2']) ? $_POST['param2'] : 'NULL';
$param3 = !empty($_POST['param3']) ? $_POST['param3'] : 'NULL';
$param4 = !empty($_POST['param4']) ? $_POST['param4'] : 'NULL';

        $query = "INSERT INTO `posts`(`title`,`description`,`id_category`,`view`)
        VALUES ('$param2', '$param3', $param1, $param4) ; ";

$result = mysqli_query($connect, $query);
echo " <div></div>";
echo "<input class='btn btn-primary' type='submit' value='Добавить'>";
?>

</form>
<a href="panel.php" class="btn btn-primary">На главную</a>
</body>
</html>