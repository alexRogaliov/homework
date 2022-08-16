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
<p><b>Первая задача: </b>Составить программу вычисления значения функции y = 17x^2 – 6x + 13 при любом значении x</p>
  <?php
    function main($x)
    {
      $y = 17 * ($x * $x) - 6 * $x + 13;
      return $y;
    };

    echo main(3);
  ?>

<p><b>Вторая задача: </b>Даны два целых числа. Найти: а) их среднее арифметическое; б) их среднее геометрическое.</p>
  <?php
    function average($firstNum, $secondNum) {
      return ($firstNum + $secondNum) / 2;
    }

  function geometric($firstNum, $secondNum) {
    return sqrt($firstNum * $secondNum);
  }

    echo average(7, 11) . " - среднее арифметическое" . "<br>";
    echo geometric(2, 8) . " - среднее геометрическое";
  ?>

<p><b>Третья задача: </b>Даны два различных вещественных числа. Определить: а) какое из них больше; б) какое из них меньше.</p>

  <?php
    function maxNum($firstNum, $secondNum) {
      if ($firstNum > $secondNum) {
        echo "Максимальное число - " . $firstNum . "<br>";
      } else if ($firstNum < $secondNum) {
        echo "Максимальное число - " . $secondNum . "<br>";
      } else {
        echo "Числа равны" . "<br>";
      }
    }

  function minNum($firstNum, $secondNum) {
    if ($firstNum > $secondNum) {
      echo "Минимальное число - " . $secondNum . "<br>";
    } else if ($firstNum < $secondNum) {
      echo "Минимальное число - " . $firstNum . "<br>";
    } else {
      echo "Числа равны" . "<br>";
    }
  }

    maxNum(10, 49);
    minNum(45,98);
  ?>

<p><b>Четвертая задача: </b>Напечатать минимальное число, большее 190, которое нацело делится на 17.</p>
  <?php
    for ($i = 191; $i <= 207; $i++) {
      if ($i % 17 == 0) {
        echo $i;
      }
    }
  ?>

<p><b>Пятая задача: </b>Вывести все нечетные числа из диапазона от 100 до 50 и в конце посчитать их количество в
  виде: "Всего ... нечетных чисел". Проверка на нечётность должна быть оформлена функцией</p>

  <?php
    function oddNumber($num) {
      if ($num % 2 != 0) {
        return $num;
      }
    }

    $tmp = 0;

    for ($i = 100; $i >= 50; $i--) {
      echo oddNumber($i) . "  ";

      if (oddNumber($i)) {
        $tmp = $tmp + 1;
      }
    }

    echo "<br>" . $tmp;
  ?>
</body>
</html>