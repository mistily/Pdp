<?php

namespace PrestaShop\Modules\ShopWebService\Classes;



class CrudHelper {

  var $__method = null;
  var $__route = null;

  function __construct(string $method, string $slug) {
    $this->__method = $method;
    $this->__route = explode('/',$slug);
    $this->__route = explode('&', $this->__route[3]);
    $oi = strpos($this->__route[0],'?')+1;
    $this->__route[0] = substr($this->__route[0],$oi,strlen($this->__route[0]));
    #return $this->handleRoute();
  }

  public function handleRoute() {
    if($this->__method==='GET') {
      $getter = new GetHandler($this->__route);
      $res = $getter->handleRoute();
      return $res;
    }

    return array();
  }
}
