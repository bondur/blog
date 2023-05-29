<?php

require_once 'connect.php';

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$name_cat = $_POST['name_cat'];



// mysqli_query($connect, $query= "UPDATE `vid_tovara` SET `naimenovanie_tovara`= 'naimenovanie_tovara' WHERE id = $id");
mysqli_query($connect, $query= "UPDATE `posts` SET `title`= '$title', 
`description`= '$description', `id_category`= '$name_cat' WHERE id = $id");


header('Location: update.php');