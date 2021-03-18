<?php

namespace PrestaShop\Modules\ShopWebService\Classes;

use PrestaShop\Modules\ShopWebService\Classes\Parents\RequestHandler;
use PrestaShop\Modules\ShopWebService\Models\ProductsModel;

class PutHandler extends RequestHandler{

    var $__catvals;
    var $_PUT;

  function __construct(array $url = null, array $_PUT = null) {
    if($url!==null) {
      $this->createRouteStruct($url);
    }
    if(!empty($_PUT)) {
        $this->_PUT = $_PUT;
    }
  }

  function handleRoute(array $route = null) {
    $resp = null;
    if(!empty($route)) {
      $this->createRouteStruct($route);
    }
    if(!empty($this->_PUT)) {
      $putvals = $this->createPutParamStruct($_POST, $this->__catvals[0]);
      $resp = $this->updateData(ucfirst(strtolower($_POST['type'])), $putvals);
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

  private function createPutParamStruct(array $postvars, array $type) {
    $insertable = null;
    if(isset($type[0])) {
      $tmpname = 'PrestaShop\\Modules\\ShopWebService\\Models\\';
      $tmpname .= ucfirst(strtolower($postvars['type'])) . 'sModel';
      $m = new $tmpname();
      $tmpname = 'get' . ucfirst(strtolower($postvars['type'])) . 'sSchema';
      $schema = $m->$tmpname();
      $postkeys = array_keys($this->_PUT);
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


}
