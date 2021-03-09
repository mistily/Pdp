<?php

namespace PrestaShop\Modules\ShopWebService\Classes;

class PostHandler {

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
      $this->createPostParamStruct($_POST);
    }
    // foreach ($this->__catvals as $key => $value) {
    //   switch ($value[0]) {
    //     case 'product':
    //       $resp[] = $this->postValues($value,'Product');
    //       break;
    //     case 'carrier':
    //       $resp[] = $this->postValues($value,'Carrier');
    //       break;
    //     case 'order':
    //       $resp[] = $this->postValues($value, 'Order');
    //       break;
    //     case 'supplier':
    //       $resp[] = $this->postValues($value, 'Supplier');
    //       break;
    //     case 'category':
    //       $resp[] = $this->postValues($value, 'Categorie');
    //       break;
    //     default:
    //       $resp[] = array("Request error!"=>"Request was not understood!");
    //       break;
    //   }
    // }
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
    //create parameters for all models
  }
}
 ?>
