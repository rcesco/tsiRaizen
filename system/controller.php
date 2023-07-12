<?php

class Controller extends System
{

  public $data = array();

  public function view($view)
  {
    extract($this->data);

    $viewLocal = explode('/', $view);

    if (sizeof($viewLocal) > 1) {
      $requestView = "";
      foreach ($viewLocal as $key => $val) {
        if ($key == sizeof($viewLocal) - 1) {
          $requestView .= $val;
        } else {
          $requestView .= $val . "/";
        }

      }
      require_once 'app/view/' . $requestView . '.php';
    } else {
      require_once 'app/view/' . $viewLocal[0] . '.php';
    }

  }

  public function VerifyLogin(){
    if(isset($_SESSION['username']) && isset($_SESSION['password'])){
      $fields = ' * ';
      $table = 'user';
      $statement = 'where username = ? and password = ?';
      $params = [$_SESSION['username'], $_SESSION['password']];

      $q = model::select($fields, $table, $statement, $params);

      $count = $q->rowCount();

      if ($count >= 1) {
        return TRUE;
      } else {
        return FALSE;
      }
    }
  }

  public function checkAccess($id, $token){
    return true;
//    $payload = [
//      'id' => $id,
//      'token' => $token
//    ];
//    $curl = curl_init();
//
//    curl_setopt_array($curl, [
//      CURLOPT_PORT => "3000",
//      CURLOPT_URL => API_SERVER . "session/checktoken",
//      CURLOPT_RETURNTRANSFER => true,
//      CURLOPT_ENCODING => "",
//      CURLOPT_MAXREDIRS => 10,
//      CURLOPT_TIMEOUT => 30,
//      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
//      CURLOPT_CUSTOMREQUEST => "POST",
//      CURLOPT_POSTFIELDS => json_encode($payload),
//      CURLOPT_HTTPHEADER => [
//        "Content-Type: application/json"
//      ],
//    ]);
//
//    $response = curl_exec($curl);
//    $err = curl_error($curl);
//
//    curl_close($curl);
//
//    if ($err) {
//      echo "cURL Error #:" . $err;
//    } else {
//      $response = json_decode($response);
//      if (!$response->res) {
//        return false;
//      } else {
//        return true;
//      }
//    }
  }

  public function error404(){
    require_once 'app/view/404.php';
  }


}

?>
