<?php
//  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
session_start();
require_once("connect/connect.php");
?>
<?php
if (!isset($_SESSION['Login'])) {
  // echo ('"Извините, у вас нет прав. <a href="index.php">Главная</a>"');
  echo "<script>alert('Извините, у вас нет прав.')</script>";
  echo "<script>window.location = 'index.php'</script>";
?>
  <?php
} else {
  if ($_SESSION['Login'] == 5) {
  ?>
    <!DOCTYPE html>
    <html>

    <head>
      <meta charset="UTF-8">
      <meta name="viewpoint" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="stylesheet" href="style.css">
      <link rel="shortcut icon" href="image/icon.ico" type="image/x-icon">
      <title>Derevo</title>
    </head>

    <body>

      <hr>
      <?php
      if ($_SESSION['Login'] == 5) {
      ?>
        <a href="adminpanel.php">Админ панель</a>
      <?php
      }
      ?><br>
      <a href="profile.php" class="mobile-menu__link mobile-menu__item">Профиль</a>
      <a href="#x" class="overlay" id="win2"></a>
      <div class="popup" id="poka">
        <h2>Новости</h2>

      </div>



      <div class="use">
        <h2>Список пользователей</h2>
        <div class="users">
          <?php
          if ($connect->connect_error) {
            die("Ошибка: " . $conn->connect_error);
          }
          $sql = "SELECT * FROM users";
          if ($result = $connect->query($sql)) {
            echo "<table border=3px solid black><tr><th>Id</th><th>Name</th><th></th></tr>";
            foreach ($result as $row) {
              echo "<tr>";
              echo "<td>" . $row["id"] . "</td>";
              echo "<td>" . $row["login"] . "</td>";
              echo "<td><form action='delete.php' method='post'>
                        <input type='hidden' name='id' value='" . $row["id"] . "' />
                        <input class='pagstyle' type='submit' value='Удалить'>
                </form></td>";
              echo "</tr>";
            }
            echo "</table>";
          } else {
            echo "Ошибка: " . $connect->error;
          }
          $connect->close();
          ?>
          <hr>
        </div>
        <h2>Добавить новость</h2>
        <div class="addproduct">
          <form action="addtobd.php" method="post" enctype="multipart/form-data">
            <table>
              <tr>
                <td>Наименование:</td>
                <td><input class="validinput" type="text" name="title"></td>
              </tr>
              <tr>
                <td>Название изображения:</td>
                <td><input class="validinput" type="text" name="img"></td>
              </tr>
              <!-- <tr>
                <td>Категория:</td>
                <td><select class="" name="category">
                    <option value="divan">Диван</option>
                    <option value="krovat">Кровать</option>
                    <option value="shkaf">Шкаф</option>
                    <option value="stenk">Стенка</option>
                  </select></td>
              </tr>
              <tr>
                <td>Подкатегория:</td>
                <td>
                  <select class="" name="sub_category">
                    <option value="divan-krovat">Диван-кровать</option>
                    <option value="divan-uglovoy">Диван угловой</option>
                    <option value="divan-pryamoy">Диван прямой</option>
                    <option value="krovat-dvuspalniy">Кровать двуспальная</option>
                    <option value="krovat-odnospalniy">Кровать односпальная</option>
                    <option value="shkaf-kupe">Шкаф-купе</option>
                    <option value="shkaf-raspashnoy">Шкаф распашной</option>
                    <option value="shkaf-uglovoy">Шкаф угловой</option>
                    <option value="stenk">Стенка</option>
                  </select>
                </td>
              </tr> -->
              <tr>
                <td>Описание:</td>
                <td><textarea class="validinput" type="text" name="content"></textarea></td>
              </tr>
              <tr>
                <td>Категория:</td>
                <td><select class="" name="category">
                    <option value="glav">Важные</option>
                    <option value="gorod">Город</option>
                    <option value="politika">Политика</option>
                    <option value="health">Здоровье</option>
                  </select></td>
              </tr>
              <tr>
                <td><input class="pagstyle" type="submit" name="upload" value="Добавить новость"></td>
              </tr>
            </table>
          </form>
          <h4><a href="products.php">Список всех товаров</a></h4>
        </div>
      </div>
      <hr>
      <script>
        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
          showSlides(slideIndex += n);
        }

        function currentSlide(n) {
          showSlides(slideIndex = n);
        }

        function showSlides(n) {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          var dots = document.getElementsByClassName("dot");
          if (n > slides.length) {
            slideIndex = 1
          }
          if (n < 1) {
            slideIndex = slides.length
          }
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex - 1].style.display = "block";
          dots[slideIndex - 1].className += " active";
        }


        var slideIndex = 0;
        showSlides();

        function showSlides() {
          var i;
          var slides = document.getElementsByClassName("mySlides");
          for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
          }
          slideIndex++;
          if (slideIndex > slides.length) {
            slideIndex = 1
          }
          slides[slideIndex - 1].style.display = "block";
          setTimeout(showSlides, 4000); // Change image every 2 seconds
        }
      </script>
    </body>

    </html>
<?php
  } else {
    echo "<script>alert('Извините, у вас нет прав.')</script>";
    echo "<script>window.location = 'index.php'</script>";
  }
}
?>