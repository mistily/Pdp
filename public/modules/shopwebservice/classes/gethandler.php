<?php

namespace PrestaShop\Modules\ShopWebService\Classes;

use PrestaShop\Modules\ShopWebService\Classes\Parents\RequestHandler;
use PrestaShop\Modules\ShopWebService\Models\ProductsModel;

class GetHandler extends RequestHandler{

  var $__catvals = null;

  function __construct(array $route = null) {
    if($route!==null) {
      $this->createRouteStruct($route);
    }
  }

  function handleRoute(array $route = null) {
    $resp = null;
    if(!empty($route)) {
      $this->createRouteStruct($route);
    }
    foreach ($this->__catvals as $key => $value) {
      switch ($value[0]) {
        case 'product':
          $resp[] = $this->getValues($value,'Product');
          break;
        case 'carrier':
          $resp[] = $this->getValues($value,'Carrier');
          break;
        case 'order':
          $resp[] = $this->getValues($value, 'Order');
          break;
        case 'supplier':
          $resp[] = $this->getValues($value, 'Supplier');
          break;
        case 'category':
          $resp[] = $this->getValues($value, 'Categorie');
          break;
        default:
          $resp[] = array("Request error!"=>"Request was not understood!");
          break;
      }
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


  private function getValues($value, $type) {
    $cval = "PrestaShop\\Modules\\ShopWebService\\Models\\" . $type . "sModel";
    $p = new $cval();

    switch ($value[1]) {
      case 'schema':
        $cval = 'get' . $type . 'sSchema';
        $tmp = $p->$cval();
        foreach ($tmp as $key => $value) {
          $schema[$value['Field']] = '';
        }
        $res = $schema;
        break;
      case 'all':
        $cval = 'getAll' . $type . 's';
        $res =  $p->$cval();
        break;
      case is_numeric($value[1]):
        $cval = 'get' . $type . 'ById';
        $res = $p->$cval($value[1]);
        break;
      default:
        $res = array("Request error!"=>"Request was not understood!");
        break;
    }
    return $res;

  }

}
