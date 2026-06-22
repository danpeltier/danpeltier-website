<?php

header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");
    header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
    exit;
}

$route = "home";
if(isset($_GET["route"])) {
  if($_GET["route"] != "") {
    $route = $_GET["route"];
  }
}

$input = file_get_contents("php://input");
if($input != '') {
  include("./api.inc.php");
  exit();
}

$path = './' . $route . '.inc.php';
if (file_exists($path)) {
    include($path);
}
else {
  include("./404.inc.php");
}

?>
