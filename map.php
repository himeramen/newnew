<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="icon" href="favicon.png" type="image/png">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</head>
	<body>
		<img class="bg_body" src='img/bg/6.jpg'>
<div class="wrapper">
	<div class="content">
		<div class="content_info">
			<h1>Маршруты</h1>
			<p class="content_info_p">Популярные маршруты.</p>
		</div>
		<div class="content_map">
			<?php 
			$db_host='localhost'; // ваш хост
			$db_name='basegi'; // ваша бд
			$db_user='root'; // пользователь бд
			$db_pass=''; // пароль к бд
			mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);// включаем сообщения об ошибках
			$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name); // коннект с сервером бд
			$mysqli->set_charset("utf8mb4"); // задаем кодировку

			$result = $mysqli->query('SELECT * FROM Anatoli'); // запрос на выборку
			while($row = $result->fetch_assoc())// получаем все строки в цикле по одной
	{
		echo '<div align="left" class="meh">' .$row['marh']. '<br> Расстояние:'  .$row['rasst']. '<br> Заказы:' .$row['zakazi']  ;        // выводим данные
		}

			?>
					</div>
			<!-- //<div class="content_map_s effect1" > 
				<h3>Маршрут к северному Басегу</h3>
				<p>Расстояние: 17000 км</p>
				<p>Заказан: 3982 раз</p>
				<a class="content_map_s_a" href="#">Отправиться</a>
			</div> 
			<div class="content_map_s map_s_2 effect1">
				<h3>Маршрут к южному Басегу</h3>
				<p>Расстояние: 7000 км</p>
				<p>Заказан: 587 раз</p>
				<a class="content_map_s_a" href="#">Отправиться</a>
			</div>
			<div class="content_map_s map_s_2 effect1">
				<h3>Маршрут к вершине северного Басега</h3>
				<p>Расстояние: 21000 км</p>
				<p>Заказан: 341 раз</p>
				<a class="content_map_s_a" href="#">Отправиться</a>
			</div> -->
		</div>
	</div>
</div>
