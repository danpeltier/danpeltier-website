<?php

require_once __DIR__ . '/vendor/autoload.php';

\Sentry\init([
  'dsn' => 'https://aaa9ffcdc602dd24631494585158fc4b@o4511609800425472.ingest.us.sentry.io/4511609899384832',
  // Specify a fixed sample rate
  'traces_sample_rate' => 1.0,
  // Set a sampling rate for profiling - this is relative to traces_sample_rate
  'profiles_sample_rate' => 1.0,
  // Enable logs to be sent to Sentry
  'enable_logs' => true,
]);

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
