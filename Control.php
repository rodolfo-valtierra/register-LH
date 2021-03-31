<?php 
  require('./Connection.php');

  $action = $_POST['action']

  function register () {
      $passHash = password_hash($data['pass'], PASSWORD_DEFAUL);
      $query = "insert users (name,age,pass) values('$data['name']', $data['age'],  '$passHash')";

      $connect->query($query); 
      header("HTTP/1.1 200 OK");

      echo json_encode(['msg' => 'Successfull register']);
    }


  function signIn () {
    $passHash = password_hash($data['pass'], PASSWORD_DEFAUL);
    $query = "select * from users where email='$data['email']' and password='$passHash'"
    
    if(count($query) == 0){
      header( "HTTP/1.1 200 ok");
      echo json_encode([
        'msg'=> 'email/password inconrrect'
        'status' => 'error';
      ]);
    } else {
      echo json_encode(['status' => 'ok'])
    }

  }

  if ($action=='register') register();
  else if ($action ==='signin') signIn();
?>



