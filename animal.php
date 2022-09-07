<?php

class Animal
{

  private $name;
  private $color;
  private $breed;
  private $age;

  public function __construct($name, $color, $breed, $age)
  {
    $this->name = $name;
    $this->color = $color;
    $this->breed = $breed;
    $this->age = $age;
  }

  public function say()
  {
    echo "Меня зовут " . $this->name . ", у меня " . $this->color . " цвет, я породы " . $this->breed . " и мне " . $this->age . " лет. ";
  }

}

class Dog extends Animal
{

  public function woof()
  {
    echo "Я умею лаять!";
  }

}

class Cat extends Animal
{

  public function meow()
  {
    echo "Я умею мяукать!";
  }

}

$dog = new dog("Jora", "sinii", "ovcearka", 10);
$dog->say();
$dog->woof();

echo "<br><br>";

$cat = new cat("Barsik", "rijii", "dvorik", "ооооочень много");
$cat->say();
$cat->meow();