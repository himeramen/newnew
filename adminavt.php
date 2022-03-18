<?
$login = $_POST['login'];
$pas = $_POST['password'];
if ($login == 'admin' && $pas == 1)
  {
  session_start();
  $_SESSION['admin'] = true;
  $script = 'adminpanel.php';
  }
else
$script = 'avtadministrator.html';
header("Location: $script");
?>