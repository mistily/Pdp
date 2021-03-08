<?php

namespace PrestaShop\Modules\ShopWebService\Classes;

use PrestaShop\Modules\ShopWebService\Models\ProductsModel;

class GetHandler {

  var $__catvals = null;

  function __construct(array $route = null) {
    if($route!==null) {
      $this->createRouteStruct($route);
    }
  }

  function handleRoute(array $route = null) {
    $res = null;
    if(!empty($route)) {
      $this->createRouteStruct($route);
    }
    foreach ($this->__catvals as $key => $value) {
      switch ($value[0]) {
        case 'products':
          $p = new ProductsModel();
          if($value[1]=='schema') {
            $tmp = $p->getProductsSchema();
            foreach ($tmp as $key => $value) {
              $schema[$value['Field']] = '';
            }
            $res[] = $schema;
          } else if($value[1]=='all') {
            $res[] =  $p->getAllProducts();
          }
          break;

        default:
          
          break;
      }
    }
    return $res;
  }

  private function createRouteStruct(array $route) {
    if(is_array($route)) {
      foreach ($route as $key => $value) {
        if(!empty($value)) {
          $this->__catvals[] = explode('=', $value);
        }
      }
    }
  }
}
