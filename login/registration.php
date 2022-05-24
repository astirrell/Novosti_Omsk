<?php
    require_once '..\connect\connect.php';
    
    $Surname = $_POST['Surname'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    
    //генератор пароля
    // function gen_password($length = 6)
    // {				
    //     $chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP'; 
    //     $size = strlen($chars) - 1; 
    //     $password = '';
    //     while($length--) {
    //         $password .= $chars[random_int(0, $size)]; 
    //     }
    //     return $password;
    // }
    // $newPassword = gen_password(8);
    mysqli_query($connect, "INSERT INTO `users` (`Surname`, `Name`, `Email`, `Password`) VALUES ('$Surname', '$Name', '$Email', '$Password')");

    header('Location: /index/index.php');
    // $to = $Email;
    // $subject = 'Kod';
    // $message = $newPassword;

?>


<?php

if (isset($_POST['Password'])) {
    $Password = $_POST['Password'];
    if ($Password == '') {
        unset($Password);
    }
}
if (isset($_POST['Name'])) {
    $Name = $_POST['Name'];
    if ($Name == '') {
        unset($Name);
    }
}
if (isset($_POST['Surname'])) {
    $Surname = $_POST['Surname'];
    if ($Surname == '') {
        unset($Surname);
    }
}
if (isset($_POST['Email'])) {
    $Email = $_POST['Email'];
    if ($Email == '') {
        unset($Email);
    }
}
?>