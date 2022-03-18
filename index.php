<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Басеги - природный заповедник</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="icon" href="favicon.png" type="image/png">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
			function showContent(link) {
				var cont = document.getElementById('content');
				var loading = '<div style="display: flex; font-size: 18px"><div><i class="fa fa-pulse fa-spinner" aria-hidden="true"></i></div>Идет загрузка</div>';
				cont.innerHTML = loading;
				var http = createRequestObject();					
				if( http ) {
					http.open('get', link);							
					http.onreadystatechange = function () {			
						if(http.readyState == 4) {
							cont.innerHTML = http.responseText;		
						}
					}
					http.send(null);    
				} else {
					document.location = link;
				}
			}
			function createRequestObject() {
				try { return new XMLHttpRequest() }
				catch(e) {
					try { return new ActiveXObject('Msxml2.XMLHTTP') }
					catch(e) {
						try { return new ActiveXObject('Microsoft.XMLHTTP') }
						catch(e) { return null; }
					}
				}
			}
			
		</script>
	</head>
	<body>
		<img class="bg_body" src='img/bg/6.jpg'>
		<header>
			<div class="wrapper">
				<div class="header">
					<nav class="menu_pk">
						<a class="nav_a" onclick="showContent('glav.php')"><i class="fa fa-home" aria-hidden="true"></i>Главная</a>
						<a class="nav_a" onclick="showContent('map.php')"><i class="fa fa-map-signs" aria-hidden="true"></i>Маршруты</a>
						<a class="nav_a" onclick="showContent('publ.php')"><i class="fa fa-folder-open" aria-hidden="true"></i>Публикации</a>
						<a class="nav_a" onclick="showContent('sitemap.php')"><i class="fa fa-map" aria-hidden="true"></i>Карта сайта</a>
						<a class="nav_a" onclick="showContent('me.php')"><i class="fa fa-eye" aria-hidden="true"></i>О нас</a>
						
					</nav>
					<a class="nav_a" onclick="showContent('adminpanel.php')"></i>Панель</a>
					<a class="nav_a" onclick="showContent('voiti.php')"><i style="margin-left: 3px;"></i>Войти</a>
				</div>
				</div>
			</div>
		</header>
		<content id="content">
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
						<h1><span style="color: #ffa600">Новости</span></h1>
						<h1>Марш парков-2022</h1>
						<p class="content_info_p">Центром охраны дикой природы дан старт международной акции «Марш парков-2022», которая направлена на оказание поддержки особо охраняемым природным территориям (ООПТ) России и сопредельных стран. Координаторами акции Марш парков на территории Пермского края традиционно являются заповедники «Басеги» и «Вишерский». Марш парков в этом году пройдет под девизом «Природным экосистемам – сохранение и восстановление!».</p>
					</div>
				</div>
			</div>
		</content>
	</body>
</html>
