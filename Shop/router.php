<?php


$url = explode("/", $_SERVER["REQUEST_URI"]);

if ($url[1] == "login") {
  $content = file_get_contents("pages/login.php");
} else if ($url[1] == "register") {
  $content = file_get_contents("pages/register.html");
} else if ($url[1] == "contact") {
  $content = file_get_contents("pages/contact.html");
} else if ($url[1] == "tracking") {
  $content = file_get_contents("pages/tracking-order.html");
} else {
  $content = file_get_contents("pages/index.php");
}

require_once("template.php");
