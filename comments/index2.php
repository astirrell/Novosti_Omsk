<?php
session_start();
require "db.php";

if (!isset($_SESSION['Login'])) {
?>
    Вы не авторизированы.!!!<a href="../register.php">Регистрация</a>
<?php

} else {
?>

    <?php
    if (isset($_POST['send'])) {


        // if (isset($_POST['name'])) {
        //     $login = $_POST['name'];
        //     if ($login == '') {
        //         unset($login);
        //     }
        // }
        // if (isset($_POST['email'])) {
        //     $password = $_POST['email'];
        //     if ($password == '') {
        //         unset($password);
        //     }
        // }
        // if (empty($login) or empty($password)) {
        //     exit("Заполните все поля!");
        // }






        $koments = R::dispense('koments');
        $koments->id = $_SESSION['id'];
        // $koments->name = $_POST['name'];
        // $koments->email = $_POST['email'];
        $koments->message = $_POST['message'];
        $koments->date = date("Y.m.d");


        R::store($koments);
        header('location: index.php');
    }


    ?>









    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="koment.css">
        <title>Document</title>
    </head>

    <body>
        <div class="in">
            <div class="">
                <form action="" method="post">
                    <!-- <input type="text" name="name" class="input" placeholder="Имя"><br><br> -->
                    <!-- <input type="email" name="email" class="input" placeholder="Email"><br><br> -->
                    <input type="text" name="message" class="input" placeholder="Сообщение"><br><br>
                    <input type="submit" name="send" class="submit">
                    <a href="../index.php" class="abc">Главная</a>
                    <style>
                        .abc {
                            text-decoration: none;
                            color: black;
                        }

                        .abc:hover {
                            color: red;
                        }

                        .submit {
                            
                            padding: 10px;
                            border: none;
                            background-color: #3F51B5;
                            color: #fff;
                            border-radius: 5px;
                            
                        }
                        .submit:hover{
                            background-color: rgb(212, 12, 56);
                        }
                    </style>












                </form>


<?php $komen =  mysqli_query($con, "SELECT table1.Name, koments.message, koments.date FROM table1 JOIN koments ON koments.id = table1.id") ?>
                <?php while ($kom = mysqli_fetch_assoc($komen)) { ?>

                    <div class="koment">
                        <div class="name"><?= $kom['Name']?></div>
                            <div class=""><?= $kom['date'] ?></div>
                            <br>
                            <div class="message"><?= $kom['message'] ?></div>
                        </div>
                        <br>
                        
                    </div>
                <?php } ?>

                
            <?php } ?>
            </div>
    </body>

    </html>