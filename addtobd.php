<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
require_once("connect/connect.php");

if (!$connect) {
  echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
  exit;
}
if (isset($_POST["title"])) {
  $sql = mysqli_query($connect, "INSERT INTO `news` (`title`, `img`, `content`, `category`) VALUES ('{$_POST['title']}', '{$_POST['img']}', '{$_POST['content']}', '{$_POST['category']}')");
  if ($sql) {
    echo "<script>alert('Новость успешно добавлена!')</script>";
    echo "<script>window.location = 'adminpanel.php'</script>";
  } else {
    echo '<p>Произошла ошибка: ' . mysqli_error($connect) . '</p>';
  }
}
?>
<?php
$sql = mysqli_query($connect, 'SELECT `id`, `title`, `img`, `content`, `category` FROM `news`');
while ($result = mysqli_fetch_array($sql)) {
  echo "<script>alert('Новость успешно добавлена!')</script>";
  echo "<script>window.location = 'adminpanel.php'</script>";
}
?>