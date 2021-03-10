<?php

namespace PrestaShop\Modules\ShopWebService\Classes;

use PrestaShop\Modules\ShopWebService\Models\ProductsModel;

class PostHandler {

  var $__catvals;
  var $__postvals;

  function __construct(array $url = null) {
    if($url!==null) {
      $this->createRouteStruct($url);
    }
  }

  function handleRoute(array $route = null) {
    $resp = null;
    if(!empty($route)) {
      $this->createRouteStruct($route);
    }
    if(!empty($_POST)) {
      $this->createPostParamStruct($_POST);
      $this->insertData(ucfirst(strtolower($_POST['type'])));
    }
    return $resp;
  }

  public function createRouteStruct(array $route) {
    if(is_array($route)) {
      foreach ($route as $key => $value) {
        if(!empty($value)) {
          $this->__catvals[] = explode('=', $value);
        }
      }
    }
  }

  private function createPostParamStruct($postvars) {
    $insertable = null;
    if(isset($postvars['type'])) {
      switch (strtolower($postvars['type'])) {
        $tmpname = ucfirst(strtolower($postvars['type'])) . 'sModel';
        $m = new $tmpname();
        $tmpname = 'get' . ucfirst(strtolower($postvars['type'])) . 'sSchema';
        $schema = $m->$tmpname();
      }
      foreach ($schema as $key => $value) {
        if(isset($value['Field'])) {
          if(in_array($_POST, $value['Field'])) {
            $insertable[$value['Field']] = $_POST[$value['Field']];
          }
        }
      }
      $this->__postvals = $insertable;
    } else {
      $this->__postvals = array('Error!' => 'Please specify a type of resource!');
    }
  }

  private function insertData($type) {
    $tmpname = $type . 'sModel';
    $m = new $tmpname();
    $tmpname = 'insert' . $type;
    try {
      $m->$tmpname($this->__postvals);
      return true;
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }
}
 ?>
