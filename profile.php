<?php

session_start();

if (!isset($_SESSION['Login'])) {
    header('Location: /index/register.php');
} else {
?>

    <?php
    require_once 'connect\connect.php';
    $login = $_SESSION['Login'];
    $testquery = mysqli_query($connect, "SELECT * FROM `users` WHERE Email='$login'");
    $row = mysqli_fetch_array($testquery);
    //echo $row[4];


    ?>



<?php
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/burger.css" type="text/css">
    <link rel="stylesheet" href="css/modal.css" type="text/css">
    <title>Сайт новостей</title>
</head>

<body>

<header>
        <div class="block8">
            <nav class="mobile-menu">
                <input type="checkbox" id="checkbox" class="mobile-menu__checkbox">
                <label for="checkbox" class="mobile-menu__btn">
                    <div class="mobile-menu__icon"></div>
                </label>
                <div class="mobile-menu__container">
                    <ul class="mobile-menu__list">
                        <li class="mobile-menu__item"><a href="index.php" class="mobile-menu__link">Novosti</a></li>

                        <li class="mobile-menu__item"><?php

                                                        if (!isset($_SESSION['Login'])) { ?>
                                <a href="login.php" class="mobile-menu__link">Личный кабинет</a>
                            <?php } else { ?>
                        <li class="mobile-menu__item"><a href="gorod.php" class="mobile-menu__link">Город</a></li>
                        <li class="mobile-menu__item"><a href="politika.php" class="mobile-menu__link">Политика</a></li>
                        <li class="mobile-menu__item"><a href="health.php" class="mobile-menu__link">Здоровье</a></li>
                        <a class="mobile-menu__link mobile-menu__item" href="profile.php">Личный кабинет</a>
                        <br>
                        <a class="mobile-menu__link mobile-menu__item" href="exit.php">Выход</a>
                    <?php }
                                                        session_write_close();
                    ?></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div class="block10">
        <img class="fotoshapka" src="img/scale_1200.webp">
        <h4>
            <div class="menu1">
                <ul class="knopki">

                    <li>
                    <li class="logo kp1"><a href="index.php" class="_2">Novosti</a></li>
                    <?php
                    // session_start();
                    if (!isset($_SESSION['Login'])) { ?>
                        <a href="login.php" class="link">Личный кабинет</a>
                    <?php } else { ?>
                        <li class="kp1"><a href="gorod.php" class="link">Город</a></li>
                        <li class="kp1"><a href="politika.php" class="link">Политика</a></li>
                        <li class="kp1"><a href="health.php" class="link">Здоровье</a></li>
                        <a href="profile.php" class="link kp1">Личный кабинет</a>
                        <a href="adminpanel.php" class="link kp1">Админ</a>
                        <a href="exit.php" class="link kp1">Выход</a> <?php echo $_SESSION['Login'] ?>
                    <?php }
                    session_write_close();
                    ?>
                    </li>
                </ul>
            </div>

        </h4>
    </div>

    <main class="main">
        <style>
            input {
                margin-top: -12px;
            }
        </style>
        <div class="form">
            <br>
            <H1 style="text-align: center;">Личный кабинет</H1>
            <form class="form-reg" action="/index/login/signin.php" method="POST">
                <p>Ваше имя</p>
                <input value="<?php echo $row[1]; ?>" />

                <p>Ваша фамилия</p>
                <input value="<?php echo $row[2]; ?>" />

                <p>Ваша почта</p>
                <input value="<?php echo $row[3]; ?>" />
                <br><br>
                <a href="comments/index.php" class="knopka">Оставить комментарий</a>

                <!-- <br><br>
		<button type="submit" class="button-action">Сохранить</button> -->
            </form>
        </div>


    </main>
    <footer class="footer">
        <div class="menu">
            <div class="logo"><a>©Copyright.Все права защищены. Novosti 2022-2022</a></div>
            <ul class="knopki">
                <li><a href="https://vk.com/" class="link_2">Вконтакте</a></li>
                <li><a href="https://www.youtube.com/" class="link_2">Ютуб</a></li>
                <li><a href="https://www.reddit.com/" class="link_2">Реддит</a></li>
            </ul>
        </div>
    </footer>
</body>

</html>