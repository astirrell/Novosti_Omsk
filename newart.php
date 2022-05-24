<?php
$title = $_POST['title'];
$img = $_POST['img'];
$content = $_POST['content'];
$db = mysqli_connect('localhost', 'root', 'root', 'bd');
$query = "INSERT INTO news (title, img, content) VALUES ('$title', '$img', '$content')";
$result = mysqli_query($db, $query);
mysqli_close($db);
if ($result)
echo 'Статья успешно добавлена';
?>