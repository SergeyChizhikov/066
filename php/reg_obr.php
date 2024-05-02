<?php
header('Content-Type: text/html; charset=utf-8');

$host = "localhost";
$db = "oefnbvtr_066";
$user = "oefnbvtr_066";
$password = "123456";

$mysqli = mysqli_connect($host, $user, $password, $db);


if ($mysqli == false) {
      print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
} else {
      //print("Соединение установлено успешно");
      $name = $_POST["name"];
      $lastname = $_POST["lastname"];
      $email = $_POST["email"];
      $pass = $_POST["pass"];

      $result = $mysqli->query("SELECT * FROM `users` WHERE `email`='$email'");

      if ($result->num_rows != 0) {
            print("Такой пользователь уже существует");
      } else {
            $mysqli->query("INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES ('$name', '$lastname', '$email', '$pass')");
            print("Пользователь успешно зарегистрирован!");
      }


      // $sql = "INSERT INTO `users`(`name`, `lastname`, `email`, `pass`) VALUES (?,?,?,?)";
      // $stmt = $mysqli->prepare($sql);
      // $stmt->bind_param("ssss", $name, $lastname, $email, $pass);
      // $stmt->execute();
}
