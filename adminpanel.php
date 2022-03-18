<?php
require 'libs/db.php';
header('Content-type: text/html; charset=utf-8');
session_start();
if (! $_SESSION['admin'])
header('Location: adminavt.php');
?>
<!doctype html>
<html lang="ru">
<head>
  <title>Админ-панель</title>
    <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

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
<body>
  <header>


        <div>
  <nav id="slow_nav">
        <ul>
            <li>
            <a href="index.php">Главная</a>
                <ul>
                    <li><a href="voiti.php">Вход</a></li>
                    <li><a href="">Регистрация</a></li>
                    <li><a href="sitemap.php">Карта сайта</a></li>
                </ul>
            </li>
          <li>
          <a href="publ.php">Публикации</a>
              <ul>
                  <li><a href="nauch.php">Научные исследования</a></li>
              </ul>
          </li>
   
        </ul>
        </nav>
  </div>
          
          <form>
              


              <a href="exit.php"><?php echo $_SESSION['user']->name; ?></a>
          </form>
          

  </header>
<content>
  <?php
    $host = 'localhost';  
    $user = 'root';    
    $pass = 'root'; 
    $db_name = 'product';   
    $link = mysqli_connect($host, $user, $pass, $db_name); 

    
    if (!$link) {
      echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
      exit;
    }

    
    if (isset($_POST["name"])) {
      //Если запрос на обновление, то обновляем
      if (isset($_GET['red_id'])) {
          $sql = mysqli_query($link, "UPDATE `products` SET `photo` = '{$_POST['photo']}',`name` = '{$_POST['name']}',`price` = '{$_POST['price']}' WHERE `id`={$_GET['red_id']}");
      } else {
          //Иначе вставляем данные
          $sql = mysqli_query($link, "INSERT INTO `products` (`photo`,`name`, `price`) VALUES ('{$_POST['photo']}', '{$_POST['name']}', '{$_POST['price']}')");
      }

      
      if ($sql)
        echo '<p>Успешно!</p>';
      } 
    

    if (isset($_GET['del_id'])) { //проверяем, есть ли переменная
      //удаляем строку из таблицы
      $sql = mysqli_query($link, "DELETE FROM `products` WHERE `id` = {$_GET['del_id']}");
      if ($sql) {
        echo "<p>Товар удален.</p>";
      } else {
        echo '<p>Произошла ошибка: ' . mysqli_error($link) . '</p>';
      }
    }

    //Если передана переменная red_id, то надо обновлять данные
    if (isset($_GET['red_id'])) {
      $sql = mysqli_query($link, "SELECT `id`, `photo`, `name`, `price` FROM `products` WHERE `id`={$_GET['red_id']}");
      $product = mysqli_fetch_array($sql);
    }


  ?>

  <form action="" method="post">
    <table>
    <tr>
        <td>Фото:</td>
        <td><input type="text" name="photo" value="<?= isset($_GET['red_id']) ? $product['photo'] : ''; ?>"></td>
      </tr>
      <tr>
        <td>Наименование:</td>
        <td><input type="text" name="name" id="text" value="<?= isset($_GET['red_id']) ? $product['name'] : '';?>" > 
          <input type="button" value="B" id="button" />
          <script type="text/javascript">
          document.getElementById("button").addEventListener('click', function () {
              var text = document.getElementById('text');
              text.value += '<b></b>';
          });
          </script> 

          <input type="button" value="I" id="button1" />
          <script type="text/javascript">
          document.getElementById("button1").addEventListener('click', function () {
              var text = document.getElementById('text');
              text.value += '<i></i>';
          });
          </script> 

          <input type="button" value="U" id="button2" />
          <script type="text/javascript">
          document.getElementById("button2").addEventListener('click', function () {
              var text = document.getElementById('text');
              text.value += '<u></u>';
          });
          </script>

             
      </tr>
      <tr>
        <td>Цена:</td>
        <td><input type="text" name="price" size="3" value="<?= isset($_GET['red_id']) ? $product['price'] : ''; ?>"> руб.</td>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" value="OK"></td>
      </tr>
    </table>
  </form>
  <table border='1'>
    <tr>
      <td>Идентификатор</td>
      <td>Название</td>
      <td>Цена</td>
      <td>Удаление</td>
      <td>Редактирование</td>
    </tr>
    <?php
      $sql = mysqli_query($link, 'SELECT `id`, `photo`,`name`, `price` FROM `products`');
      while ($result = mysqli_fetch_array($sql)) {
        echo '<tr>' .
             "<td>{$result['id']}</td>" .
             "<td>{$result['photo']}</td>" .
             "<td>{$result['name']}</td>" .
             "<td>{$result['price']} ₽</td>" .
             "<td><a href='?del_id={$result['id']}'>Удалить</a></td>" .
             "<td><a href='?red_id={$result['id']}'>Изменить</a></td>" .
             '</tr>';
      }
    ?>
  </table>
  <div id="dab">
  <p><a href="?add=new">Добавить</a></p>
</div>
</content>
   

</body>
</html>