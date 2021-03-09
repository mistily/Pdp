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
  }

  public function handleRoute() {
    switch ($this->__method) {
      case 'GET':
        $getter = new GetHandler($this->__route);
        $res = $getter->handleRoute();
        break;
      case 'POST':
        $poster = new PostHandler($this->__route);
        $res = $poster->handleRoute();
        break;
      case 'PUT':
        return array("PUT"=>"yes");
        break;
      case "DELETE":
        return array("DELETE"=>"yes");
        break;
      case 'PATCH':
        return array("PATCH"=>"yes");
        break;
      default:
        $rsp = "METHOD NOT IMPLEMENTED. ";
        $rsp .= "If you need further assistance, please contact PrestaChamps!";
        return array("REQUEST ERROR!"=>$rsp);
        break;
    }
    return $res;

  }
}
