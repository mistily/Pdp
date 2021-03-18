<?php

namespace PrestaShop\Modules\ShopWebService\Classes\Parents;


abstract class RequestHandler {

  var $__catvals = null;

  function __construct(array $route = null) {
    if($route!==null) {
      $this->createRouteStruct($route);
    }
  }

  private function checkApiKey(string $key = null) {
    if(!empty($key)) {
        if($key==='SQKCNVZGA67ZY7CTPZQ7GDLJXHCLPTAX') {
          return true;
        } else {
          return false;
        }
    } else {
      return false;
    }
  }

  public abstract function handleRoute(array $route = null);

  public abstract function createRouteStruct(array $route);

}
