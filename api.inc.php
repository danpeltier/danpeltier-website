<?php
  // api endpoint

  header("Access-Control-Allow-Origin: *");
  header('Content-Type: application/json');

  $data = '{"results": "invalid"}';

  $kw = '';
  if($input != '') {
    $json = json_decode($input);

    if(isset($json->{'keyword'})) {
      $kw = $json->{'keyword'};
    }
  }
  if(isset($_POST["keyword"])) {
    $kw = $_POST["keyword"];
  }

  if($kw) {
    $db = mysqli_connect("localhost","danpeltier_duv","KdAYwb361_","danpeltier_duv");
    $query = "select * from lexicon where tags like '%myself%' and tags like '%" . addslashes($kw) . "%'";
    $result = mysqli_query($db, $query);
    $data = '{"images": [';
    $first = 1;
    while($r = mysqli_fetch_assoc($result)) {
      if($first == 0) {
        $data .= ",";
      }
      $first = 0;
      $data .= '"https://danpeltier.ca/bitmoji/' . $r["image"] . '"';
    }
    $data .= ']}';
    echo $data;
    exit();
  }

  header("HTTP/1.0 400 Bad Request");
  echo $data;

?>
