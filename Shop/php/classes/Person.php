<?php

class Person
{
  private $name;
  private $lastname;
  private $age;
  private $hp;
  private $mother;
  private $father;

  function __construct($name, $lastname, $age, $mother = null, $father = null)
  {
    $this->name = $name;
    $this->lastname = $lastname;
    $this->age = $age;
    $this->mother = $mother;
    $this->father = $father;
    $this->hp = 100;
  }

  function sayHi($name)
  {
    return "Hi, $name, I`m " . $this->name;
  }

  function setHp($hp)
  {
    if ($this->hp + $hp > 100) $this->hp = 100;
    else $this->hp = $this->hp + $hp;
  }

  function getHp()
  {
    return $this->hp;
  }
  function getName()
  {
    return $this->name;
  }
  function getMother()
  {
    return $this->mother;
  }
  function getFather()
  {
    return $this->father;
  }
  function getInfo() {
    return "Меня зовут - " . $this->getName() . "<br> Мой папа " . $this->getFather()->getName();
  }
}

$igor = new Person("Igor", "Petrov", 78);

$alex = new Person("Alex", "Ivanov", 42);
$olga = new Person("Olga", "Ivanova", 41, null, $igor);
$valera = new Person("Valera", "Ivanov", 12, $olga, $alex);

echo $valera->getInfo();
//echo $valera->getMother()->getFather()->getName();//Имя дедушки Валеры


//echo $alex->sayHi($igor->name);
// Здоровье не может быть более 100 единиц

// $medKit = 50;
// $alex->setHp(-30); //Упал
// echo $alex->getHp() . "<br>";
// $alex->setHp($medKit); //Нашел аптечку
// echo $alex->getHp();
// $alex->name = "Alex";
// echo $alex->name;
// echo $igor->name;
