<?php

namespace PrestaShop\Modules\ShopWebService\Classes;

use PrestaShop\Modules\ShopWebService\Classes\Parents\RequestHandler;
use PrestaShop\Modules\ShopWebService\Models\ProductsModel;

class PostHandler extends RequestHandler{

  var $__catvals;

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
      $postvals = $this->createPostParamStruct($_POST);
      $resp = $this->insertData(ucfirst(strtolower($_POST['type'])), $postvals);
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
      $tmpname = 'PrestaShop\\Modules\\ShopWebService\\Models\\';
      $tmpname .= ucfirst(strtolower($postvars['type'])) . 'sModel';
      $m = new $tmpname();
      $tmpname = 'get' . ucfirst(strtolower($postvars['type'])) . 'sSchema';
      $schema = $m->$tmpname();
      $postkeys = array_keys($_POST);
      foreach ($schema as $key => $value) {
        if(isset($value['Field'])) {
          if(in_array($value['Field'],$postkeys)) {
            $insertable[$value['Field']] = $_POST[$value['Field']];
          }
        }
      }
      return $insertable;
    } else {
      return array('Error!' => 'Please specify a type of resource!');
    }
  }

  private function insertData($type, $postvals) {
    $tmpname = 'PrestaShop\\Modules\\ShopWebService\\Models\\';
    $tmpname .= $type . 'sModel';
    $m = new $tmpname();
    $tmpname = 'insert' . $type;
    try {
      $m->$tmpname($postvals);
      return true;
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }
}
 ?>
