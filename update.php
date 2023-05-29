<?php
require_once 'connect.php';

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

<?php
mysqli_report(MYSQLI_REPORT_ERROR|MYSQLI_REPORT_STRICT);

// Количество новостей на странице
$on_page = 4;


// Получаем количество записей таблицы news
$query = "SELECT COUNT(*) FROM `posts`";
$res = mysqli_query($connect, $query);
$count_records = mysqli_fetch_row($res);
$count_records = $count_records[0];


// Получаем количество страниц
// Делим количество записей на количество новостей на странице
// и округляем в большую сторону
$num_pages = ceil($count_records / $on_page);


// Текущая страница из GET-параметра page
// Если параметр не определен, то текущая страница равна 1
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Если текущая страница меньше единицы, то страница равна 1
if ($current_page < 1)
{
	$current_page = 1;
}
// Если текущая страница больше общего количества страница, то
// текущая страница равна количеству страниц
elseif ($current_page > $num_pages)
{
	$current_page = $num_pages;
}

// Начать получение данных от числа (текущая страница - 1) * количество записей на странице
$start_from = ($current_page - 1) * $on_page;


// Формат оператора LIMIT <ЗАПИСЬ ОТ>, <КОЛИЧЕСТВО ЗАПИСЕЙ>
$query = "SELECT posts.id as 'idd', categories.id, `title`, `description`, `id_category`, `image`, `name` FROM `posts`, `categories` 
WHERE posts.id_category = categories.id
ORDER BY `id_category` DESC LIMIT $start_from, $on_page";
$res = mysqli_query($connect, $query);

?>
<div class = "ram">

<?php
// Вывод результатов
//echo '<table border="1"><tr><th>заголовок</th><th>описание</th><th>категория</th></tr>';
while ($row = mysqli_fetch_assoc($res))
 {
?>

	<div class="card" style="width: 18rem;">
	<?php
		echo '<img src="data://image/jpeg;base64,'.base64_encode($row['image']).'">';
		?>
		<!-- //<img src="" class="card-img-top" alt="..."> -->

    <div class="card-body">
    <h5 class="card-title"> <?=$row['title']?>   </h5>
	<p class="card-text">  <?=$row['name']?>  </p>
    <p class="card-text">  <?=$row['description']?>  </p>
    <a href="#" class="btn btn-primary">Перейти куда-нибудь</a>
    <a id="update" href="update1.php?id=<?= $row['idd'] ?>">Редактировать</a>
  </div>
</div>

<?php
	//echo '<tr>';
	//echo '<td>'.$row['id'].'</td>';
	//echo '<td>'.$row['title'].'</td>';
	//echo '<td>'.$row['description'].'</td>';
    // echo '<td>'.$row['name'].'</td>';
 
	//echo '</tr>';
}
//echo '</table>';


// Вывод списка страниц
echo '<p>';
for ($page = 1; $page <= $num_pages; $page++)
{
	if ($page == $current_page)
	{
		echo '<strong>'.$page.'</strong> &nbsp;';
	}
	else
	{
		echo '<a href="view_post.php?page='.$page.'">'.$page.'</a> &nbsp;';
	}
}
echo '</p>';

?>






</div>
<a href="panel.php" class="btn btn-primary">На главную</a>
</body>
</html>