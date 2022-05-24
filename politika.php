<?php
session_start();
require_once 'connect\connect.php';
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
                    <li class="logo kp1"><a href="index.php" class="link">Novosti</a></li>
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
    <style>
        .cl {
            margin-top: 0;
            margin: auto;
        }

        #subject,
        select,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 6px;
            margin-bottom: 16px;
        }

        input[type=submit] {
            background-color: #e38c4d;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #a16133;
        }

        @import url('https://fonts.googleapis.com/css2?family=Koulen&display=swap');

        .col {
            color: #FA8072;

            font-family: 'Koulen', cursive;
        }
    </style>
    <main class="main">
        <div class="allblock">
            <?php $sql = "SELECT * FROM news WHERE category = 'politika'"; ?>
            <?php if ($result = $connect->query($sql)) : ?>
                <?php foreach ($result as $row) : ?>
                    <div class='image1'>
                        <img style="object-fit: cover; height: 300px; width: 200px; display:flex; border-radius:20px;" src="img/<?= $row['img'] ?>">
                        <a class="cl" href="?id=<?= $row['id'] ?>&#win3" style="position:absolute; text-align:center; padding: 50px; font-size: 20px;">Подробнее</a></br>
                        <a href="#x" class="overlay" id="win3"></a>
                        <div class="popup" id="poka">
                            <?php $id = $_GET['id'] ?>
                            <?php $sql = "SELECT * FROM news WHERE `id` = $id"; ?>
                            <?php if ($result = $connect->query($sql)) : ?>
                                <?php foreach ($result as $row) : ?>
                                    <h3><?php echo $row['title'] ?></h3>
                                    <hr>
                                    <div class='image'>
                                        <img style="object-fit: cover; height: 200px; width: 270px;" src="img/<?= $row['img'] ?>"></br></br></br>
                                        <hr>
                                        <h3>Описание</h3>
                                        <h5><?= $row['content'] ?></h5>
                                        <hr>
                                        <div class="col">
                                            <?php

                                            require_once 'connect\connect.php';
                                            $login = $_SESSION['Login'];
                                            $result_set = mysqli_query($connect, "SELECT `comments`.*, `users`.`Name` AS `NAME`
                                        FROM `comments` 
                                            LEFT JOIN `users` ON `comments`.`id_user` = `users`.`id`
                                             where `comments`.`id_news`='$id'");

                                            //$result_set = mysqli_fetch_array($testquery);

                                            while ($row = $result_set->fetch_assoc()) {

                                                print_r($row["NAME"]);
                                                echo "<br>";
                                                print_r($row["comment"]);
                                                echo "<br>";
                                                echo "<br>";
                                            }

                                            ?>
                                        </div>
                                        <?php if (!isset($_SESSION['Login'])) { ?>

                                            <h3>Чтобы оставить комментарий авторизуйтесь</h3>
                                        <?php } else { ?>

                                            <?php
                                            $newid = $_GET['id'];
                                            $pe = mysqli_query($connect, "SELECT * FROM news");
                                            $new = mysqli_fetch_assoc($pe);
                                            ?>

                                            <div class="comments">
                                                <form name="comment" action="comments/comment.php" method="post">

                                                    <label for="subject">Оставьте свой комментарий</label>
                                                    <textarea id="subject" name="text_comment" required placeholder="Напишите что-нибудь.." style="height:200px"></textarea>
                                                    <input type="hidden" name="id_news" value="<?= $id ?>" />
                                                    <input type="hidden" name="login" value="" />
                                                    <input type="submit" name="send" value="Отправить">

                                                </form>
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>
    <style>
        a {
            text-decoration: none;
            color: white;
        }
    </style>
    <footer class="footer">
        <div class="menu">
            <div class="razmer_footer">
                <div>
                    <ul class="social">

                        <a href="https://youtube.com/">
                            <li class="social_item youtube"><i class="fa-brands fa-youtube"></i></i></li>
                        </a>
                        <a href="https://vk.com/">
                            <li class="social_item vk"><i class="fa-brands fa-vk"></i></li>
                        </a>
                        <a href="https://web.telegram.org/k/">
                            <li class="social_item telegram"><i class="fa-brands fa-telegram"></i></li>
                        </a>
                    </ul>
                </div>
                <div>
                    <ul class="knopki_footer">
                        <b>Контакты</b>
                        <li><a>8-(800)-555-35-35</a></li>
                        <li><a>ул. Карла Либкнехта, 24</a></li>
                        <li><a>г.Омск</a></li>
                        <hr>
                        <div class="logo">©Copyright.Все права защищены. Novosti 2022-2022</div>
                        <li><?php
                            $file = file("prosmotr.txt");
                            $count = implode("", $file);
                            $count++;
                            $myfile = fopen("prosmotr.txt", "w");
                            fputs($myfile, $count);
                            fclose($myfile);
                            ?>
                            <span>Просмотров: <?= $count ?></span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://kit.fontawesome.com/b86f6176ca.js" crossorigin="anonymous"></script>
</body>

</html>