<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    
    
    
    #subject, select, textarea {
      width: 100%; /* Full width */
      padding: 12px; /* Some padding */ 
      border: 1px solid #ccc; /* Gray border */
      border-radius: 4px; /* Rounded borders */
      box-sizing: border-box; /* Make sure that padding and width stays in place */
      margin-top: 6px; /* Add a top margin */
      margin-bottom: 16px; /* Bottom margin */
      resize: vertical; /* Allow the user to vertically resize the textarea (not horizontally) */
    }
    
    /* Style the submit button with a specific background color etc */
    input[type=submit] {
      background-color: #04AA6D;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    
    /* When moving the mouse over the submit button, add a darker green color */
    input[type=submit]:hover {
      background-color: #45a049;
    }
    
    /* Add a background color and some padding around the form */
    .containercomm {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }</style>
</head>
<body>


<?php 
    
    require_once '..\connect\connect.php';
    $login = $_SESSION['Login'];
    $result_set = mysqli_query($connect, "SELECT * FROM `comments` WHERE id_news=3");
    
    //$result_set = mysqli_fetch_array($testquery);

    while ($row = $result_set->fetch_assoc()) {
        print_r($row["id_user"]);echo "<br>";
        print_r($row["comment"]);
        echo "<br>";echo "<br>";
    }
    
    ?>
    
    <?php if(!isset($_SESSION['Login'])) {?>

        <h3>Чтобы оставить комментарий авторизуйтесь</h3>
    <?php } else {?>    



    <div class="containercomm">
    <form name="comment" action="comment.php" method="post">

    <label for="subject">Оставьте свой комментарий</label>
    <textarea id="subject" name="text_comment" placeholder="Напишите что-нибудь.." style="height:200px"></textarea>
    <input type="hidden" name="id_news" value="3"/>
    <input type="hidden" name="login" value="<?php $login ?>"/>
    <input type="submit" value="Отправить">

    </form>
    </div>
    <?php }?>



</body>
</html>