<?php
  class System{
    private $_url;
    private $_explode;

    public $_controller;
    public $_action;
    public $_params;


    public function __construct(){
      $this->setUrl();
      $this->setExplode();
      $this->setController();
      $this->setAction();
      $this->setParams();
    }

    private function setUrl(){
      $param = substr(REDIRECT_URL, 1);
      $url = (!empty($param) ? $param : 'login');

      $this->_url = $url;
    }

    private function setExplode(){
      $this->_explode = explode('/', $this->_url);
    }

    private function setController(){
      $this->_controller = isset($this->_explode[0]) && $this->_explode[0] != "" ? $this->_explode[0] : 'home';
    }

    private function setAction(){
      //print_r($this->_explode);
      if(isset($this->_explode[1]) && is_numeric($this->_explode[1]) && $this->_explode[1] > 0 ){
        $ac = 'index';
        $this->_explode[3] = 'id';
        $this->_explode[3] = $this->_explode[2];
      }
      else if(!isset($this->_explode[1]) || $this->_explode[1] == null){
        $ac = 'index';
      }else{
		$action = explode('?', $this->_explode[1]);

        $ac = $action[0];

      }

      $this->_action = $ac;
    }

    private function setParams(){
      //print_r($this->_explode);
      unset($this->_explode[0],$this->_explode[1]);

      if(end($this->_explode) == null){
        array_pop($this->_explode);
      }

      if(!empty($this->_explode)){

        $i = 0;

        foreach ($this->_explode as $val) {

          if($i % 2 == 0){
            $index[] = $val;
          }else{
            $value[] = $val;
          }
          $i++;
        }

      }else{
        $index = array();
        $value = array();
      }


      if(count($index) == count($value) && !empty($index) && !empty($value)){
        $this->_params = array_combine($index, $value);
      }else{
        $this->_params = array();
      }



    }

    public function getParams($name){
      return  @$this->_params[$name];
    }

    public function run(){

      $controller_path = $this->_controller . '_controller';

      $app = new $controller_path();

      if(!method_exists($app, $this->_action)) {
        http_response_code(404);
        die(require_once('app/view/404.php'));
      }

      $action = $this->_action;

      $app->$action();
    }
  }

?>
