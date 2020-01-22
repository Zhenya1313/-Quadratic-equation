<?php
  $error =false;
  $error_d =false;
  $a =(isset($_POST['a']) && is_numeric($_POST['a']))? $_POST['a'] : false;//проверка заданых значений
  $b =(isset($_POST['b']) && is_numeric($_POST['b']))? $_POST['b'] : false;
  $c =(isset($_POST['c']) && is_numeric($_POST['c']))? $_POST['c'] : false;
  if (isset($_POST['button'])) {
    if ($a !== false && $b !== false && $c !== false) {
        $d = $b ** 2 - 4 * $a * $c; //ищем дискриминант
        if ($d >=0) {
          $x_1= (-$b + $d ** 0.5) / (2 * $a);
          $x_2= (-$b - $d ** 0.5) / (2 * $a);
        }
        else $error_d =true;//ошибка дискриминанта
    }

    else $error =true;
  }
 ?>
<!DOCTYPE html>
<html lang="ru" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task List</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <style>
      body {
        text-align: center;
      }
      input[type="text"]{
        width: 50px;
      }


    </style>
  </head>
  <body>
    <h1>Решение квадратного уравнения</h1>
    <?php if ($error) { ?><p>Некоректные входные данные</p><?php } ?>
    <form name="form"  method="post">
      <input type="text" name="a" /> * x<sup>2</sup> + <input type="text" name="b" /> *x + <input type="text" name="c" /> = 0
      <br />
      <br />
      <input type="submit" name="button" value="Решить уравнение"/>

    </form>
    <?php if ($error_d) { ?><p>Дискриминант меньше 0 !!!</p><?php } ?>
    <?php if (isset($x_1)) { ?>
      <h2>Решение: </h2>
      <p>D = b <sup>2</sup> -4 * a * c = <?=$d?> </p>
      <p>x<sub>1</sub> = (-b + &radic;D) / (2*a) = <?=$x_1 ?></p>
      <p>x<sub>2</sub> = (-b - &radic;D) / (2*a) = <?=$x_2 ?></p>
    <?php } ?>

  </body>
  </html>
