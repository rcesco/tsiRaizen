<?php
class login_controller extends Controller
{

  public function index()
  {
    $this->view('user/login');
  }

  public function close(){
    session_destroy();
    unset($_COOKIE['name']);
    unset($_COOKIE['id']);
    unset($_COOKIE['token']);
    $this->view('login/login');
  }

  public function setAccess()
  {
    $access = [
      'email' => $_POST['email'],
      'password' => $_POST['password']
    ];
    session_start();
    try {
      $curl = curl_init();

      curl_setopt_array($curl, [
        CURLOPT_PORT => "3000",
        CURLOPT_URL => API_SERVER . "session",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($access),
        CURLOPT_HTTPHEADER => [
          "Content-Type: application/json"
        ],
      ]);

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        $response = json_decode($response);
        if (isset($response->status)) {
          $this->data['fail'] = true;
          $this->view('user/login');
        } else {
          $expira = strtotime("+1 Days");
          setcookie("id", $response->login->idlogin, $expira, '/');
          setcookie("name", $response->login->name, $expira, '/');
          setcookie("token", $response->token, $expira, '/');

          $_SESSION['id'] = $response->login->idlogin;
          $_SESSION['name'] = $response->login->name;
          $_SESSION['token'] = $response->token;

          $this->view('home');
        }
      }
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }


}


?>
