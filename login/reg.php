<?php
session_start();
require_once '..\connect\connect.php';
?>
<?php
$Password = $_POST['Password'];
$Name = $_POST['Name'];
$Surname = $_POST['Surname'];
$Email = $_POST['Email'];

if (empty($Email) or empty($Password)) {
    exit("Заполните все поля!");
}

$result2 = mysqli_query($connect, "INSERT INTO `table1` (`Surname`, `Name`, `Email`, `Password`) VALUES ('$Surname', '$Name', '$Email', '$Password')");
if ($result2 == 'TRUE') {
    header('location: index.php');
} else {
    echo "<script>alert('Ошибка! Вы не зарегистрированы.')</script>";
    echo "<script>window.location = 'index.php'</script>";
}
?>