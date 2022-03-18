<?php
	require 'libs/db.php';
session_start();
	if(isset($_POST['voiti'])) {
		$login = R::findOne('users', 'login = ?', [$_POST['login']]);
		if($login) {
			if ($login->login == 'admin' && $login->pas == 1){
				  $_SESSION['admin'] = true;
				  header('Location: adminpanel.php');
				}
				elseif($login->pas == $_POST['psw']) {
				$_SESSION['user'] = $login;
				header('Location: index.php');
			}
		}
	}
?>
<html>
<head>
<meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
		<title></title>
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
  <script type="text/javascript">

	jQuery(document).ready(function($){  
$('#slow_nav  ul li').hover(
            function () {
                $('ul', this).stop().slideDown(400);
            }, 
            function () {
                $('ul', this).stop().slideUp(400);            
            }
        );
});
</script>
</head>
	<img class="bg_body" src='img/bg/6.jpg'>
<content>
	
	<form action="action_page.php">
  <div class="container">
    <h1>Вход</h1>
  
    <hr>

    <label for="login" ><b class="bebra">Логин</b></label>
    <input type="text" placeholder="Введите логин" name="login" required>

    <label for="psw"><b class="bebra">Пароль</b></label>
    <input type="password" placeholder="Введите пароль" name="psw" required>
    <p class="bebra">Создавая учетную запись, вы соглашаетесь с нашими <a href="#">Условиями и политикой конфиденциальности</a>.</p>
    <button type="submit" class="registerbtn">Войти</button>
  </div>

 <div class="container signin">
    <p>У вас нет учетной записи?<a href="registr.php">Регистрация</a>.</p>
  </div>
</form>

	
</content>
	
</body>
</html>