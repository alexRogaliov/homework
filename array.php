<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <style>
    p {
      margin-top: 100px;
    }

    p:first-child {
      margin-top: 0;
    }
  </style>
</head>
<body>

<p><b>Первая задача: </b>Заполнить массив из 15 элементов случайным образом лежащими в диапазоне от 0 до 100</p>

<?php
  $arr = [];

  for ($i = 0; $i < 15; $i++) {
    $arr[$i] = rand(1, 100);
  }

  for ($i = 0; $i < count($arr); $i++) {
    echo $i . " = " . $arr[$i] . '<br>';
  }
?>

<p><b>Вторая задача: </b>Заполнить массив из 15 элементов случайным образом вещественными значениями х (22 ≤ х < 23)</p>

<?php
  $arr = [];

  function random_float($min, $max)
  {
    return ($min + lcg_value() * (abs($max - $min)));
  }

  for ($i = 0; $i < 15; $i++) {
    $arr[$i] = random_float(22, 22.99);
  }

  for ($i = 0; $i < count($arr); $i++) {
    echo $i . " = " . $arr[$i] . '<br>';
  }
?>

<p><b>Третья задача: </b>Заполнить массив двадцатью символами «#».</p>

<?php
  $arr = [];

  for ($i = 0; $i < 20; $i++) {
    $arr[$i] = '#';
  }

  for ($i = 0; $i < count($arr); $i++) {
    echo $i . " = " . $arr[$i] . '<br>';
  }
?>

<p><b>Четвертая задача: </b>Вывести элементы массива на экран в обратном порядке.</p>

<?php
  $arr = [];

  for ($i = 0; $i <= 10; $i++) {
    $arr[$i] = rand(1, 10);
  }


  for ($i = count($arr) - 1; $i >= 0; $i--) {
    echo $i . " = " . $arr[$i] . '<br>';
  }
  ?>

<p><b>Пятая задача: </b>В массиве записана информация о стоимости 20 видов товара. Определить, сколько видов товара
  имеют стоимость, меньшую, чем средняя стоимость всех видов товара.</p>

<?php
  $arr = [];
  $sum = 0;
  $tmp = 0;
  $averageCost = 0;

  for ($i = 0; $i < 20; $i++) {
    $arr[$i] = rand(20, 100);
  }

  for ($i = 0; $i < count($arr); $i++) {
    $sum = $sum + $arr[$i];
  }

  $averageCost = $sum / 20;

  for ($i = 0; $i < count($arr); $i++) {
    if ($averageCost > $arr[$i]) {
      echo $i . " = " . $arr[$i] . '<br>';
      $tmp++;
    }
  }

  echo "<br> Средняя стоимость товара " . $averageCost . '<br>';
  echo "Количество товаров которые имеют стоимость меньше чем средняя стоимость " . $tmp . '<br>';
  ?>

</body>
</html>