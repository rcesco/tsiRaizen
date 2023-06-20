<?php
//Configurações
define('DIR_ROOT', dirname(dirname(__file__)));
define('DIR_CONTROLLER', DIR_ROOT . '/app/controller/');
define('DIR_MODEL', DIR_ROOT . '/app/model/');
define('DIR_VIEW', DIR_ROOT . '/app/view/');
define('DIR_HELPER', DIR_ROOT . '/system/helpers/');
define('DIR_PDF', DIR_HELPER . 'pdf/');
define('DIR_SYSTEM', DIR_ROOT . '/system/');
define('HTTP_SERVER', 'http://localhost:8080/');
define('API_SERVER', 'http://localhost:8080/');
define('DIR_API', HTTP_SERVER . 'app/api/');
define('NOME_EMPRESA_CLIENTE', 'TSI Tecnologia, Segurança e Inovação');
define('HTTP_EMPRESA', 'http://localhost:8080/');
define('NOME_EMPRESA', 'TSI Tecnologia, Segurança e Inovação');
define('LOCAL_VIEW', HTTP_SERVER . 'app/view/');
define('VIEW', 'app/view/');
define('DIR_COMPONENTS', LOCAL_VIEW . 'libraries/bower_components/');
define('DIR_SRC', HTTP_SERVER . 'app/view/src/');
define('DIR_ICONS', LOCAL_VIEW . 'libraries/assets/icon/');
define('DIR_DOCUMENTATION', HTTP_SERVER . 'app/view/documentation/');
define('DIR_CSS', LOCAL_VIEW . 'libraries/assets/css/');
define('DIR_JS', LOCAL_VIEW . 'libraries/assets/js/');
define('DIR_JS_404', LOCAL_VIEW . 'libraries/extra-pages/404/1/js/');
define('DIR_CSS_404', LOCAL_VIEW . 'libraries/extra-pages/404/1/css/');
define('DIR_JS_MASK', LOCAL_VIEW . 'libraries/assets/pages/form-masking/');
define('DIR_IMG', LOCAL_VIEW . 'libraries/assets/images/');
define('DIR_PAGES', LOCAL_VIEW . 'libraries/assets/pages/');
define('DIR_GALERIA', HTTP_SERVER . 'imagens-galeria/');
define('DIR_FOTOS', HTTP_SERVER . 'arquivos/imagens/');
define('DIR_TERMS', HTTP_SERVER . 'arquivos/');
define('DIR_FONTS', LOCAL_VIEW . 'css/');
define('DIR_ASSETS', LOCAL_VIEW.'assets/');
define('REDIRECT_URL', $_SERVER['REQUEST_URI']);

spl_autoload_register(function ($class) {

  $notModifyClass = $class;

  $tmpClass = explode("_", $class);

  if (sizeof($tmpClass) > 1) {
    $class = lcfirst($tmpClass[0]) . "_" . strtolower($tmpClass[1]);
  } else {
    $class = strtolower($class);
  }

  //echo $class."\n";

  if (file_exists(DIR_MODEL . $class . '.php')) {
    require_once(DIR_MODEL . $class . '.php');
  } else if (file_exists(DIR_HELPER . $class . '.php')) {
    require_once(DIR_HELPER . $class . '.php');
  } else if (file_exists(DIR_HELPER . "mail/src/" . $notModifyClass . '.php')) {
    require_once(DIR_HELPER . "mail/src/" . $notModifyClass . '.php');
  } else if (file_exists(DIR_SYSTEM . $class . '.php')) {
    require_once(DIR_SYSTEM . $class . '.php');
  } else if (file_exists(DIR_PDF . $class . '.php')) {
    require_once(DIR_PDF . $class . '.php');
  } else if (file_exists(DIR_CONTROLLER . $class . '.php')) {
    require_once(DIR_CONTROLLER . $class . '.php');
  } else if (file_exists(DIR_CONTROLLER . $notModifyClass . '.php')) {
    require_once(DIR_CONTROLLER . $notModifyClass . '.php');
  }  else {
    echo $class;
    print_r($tmpClass);
    die(require_once('app/view/404.php'));
  }
});


?>
