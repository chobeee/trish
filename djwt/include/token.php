<?php
  require_once('db_connect.php');
  function generateToken($id, $new, $conn){
    $header = [
      'typ' => 'JWT',
      'alg' => 'HS256',
      
    ];
    $header = json_encode($header);
    $header = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
    // retrieve user data and token date if token is existing
    $sql = "SELECT * FROM tbl_db WHERE id = '" . $id . "'";
		$result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    // check if create new or retrieve token date from db
    if($new == 0){
      // new token
      $t = time();
      $date = date("Y-m-d h:m:s",$t);
      // set the token date
      $sql = "UPDATE tbl_db SET udate = '".$date."' WHERE id = '".$id."'";
      $result = mysqli_query($conn, $sql);
    }else{
      //get date from db for token
      $date = $row['udate'];
    }
    $payload = [
      'id' => $row['id'],
      'uname' => $row['uname'],
      'udesc' => $row['udesc'],
      'udate' => $date
    ];
    $payload = json_encode($payload);
    $payload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
    $signature = hash_hmac('sha256', $header.".".$payload, base64_encode('jeks13'));
    $signature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
    $jwt = "$header.$payload.$signature";
    return $jwt;
  }
?>