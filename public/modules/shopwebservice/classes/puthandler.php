<?php

namespace PrestaShop\Modules\ShopWebService\Classes;

use PrestaShop\Modules\ShopWebService\Classes\Parents\RequestHandler;
use PrestaShop\Modules\ShopWebService\Models\ProductsModel;
use PrestaShop\Modules\ShopWebService\Models\CategoryModel;
use PrestaShop\Modules\ShopWebService\Models\CarrierModel;
use PrestaShop\Modules\ShopWebService\Models\CustomerModel;
use PrestaShop\Modules\ShopWebService\Models\DeliveryModel;
use PrestaShop\Modules\ShopWebService\Models\OrderModel;
use PrestaShop\Modules\ShopWebService\Models\StockModel;
use PrestaShop\Modules\ShopWebService\Models\SupplierModel;

class PutHandler extends RequestHandler{

    var $__catvals;
    var $_PUT;

    /**
     * PutHandler constructor.
     * @param array|null $url
     * @param array|null $_PUT
     */
    function __construct(array $url = null, array $_PUT = null) {
    if($url!==null) {
      $this->createRouteStruct($url);
    }
    if(!empty($_PUT)) {
        $this->_PUT = $_PUT;
    }
  }

    /**
     * @param array|null $route
     * @return mixed|null
     */
    function handleRoute(array $route = null) {
    $resp = null;
    if(!empty($route)) {
      $this->createRouteStruct($route);
    }
    if(!empty($this->_PUT)) {
      $putvals = $this->createPutParamStruct($this->__catvals[0]);
      $resp = $this->updateData($putvals);
    }
    return $resp;
  }

    /**
     * @param array $route
     */
    public function createRouteStruct(array $route) {
    if(is_array($route)) {
      foreach ($route as $key => $value) {
        if(!empty($value)) {
          $this->__catvals[] = explode('=', $value);
        }
      }
    }
  }

    /**
     * @param array $type
     * @return array|string[]
     */
    private function createPutParamStruct(array $type) {
        $insertable = null;
        if(isset($type[0])) {
          $tmpname = 'PrestaShop\\Modules\\ShopWebService\\Models\\';
          $tmpname .= ucfirst(strtolower($type[0])) . 'sModel';
          $m = new $tmpname();
          $tmpname = 'get' . ucfirst(strtolower($type[0])) . 'sSchema';
          $schema = $m->$tmpname();
          $putkeys = array_keys($this->_PUT);
          foreach ($schema as $key => $value) {
            if(isset($value['Field'])) {
              if(in_array($value['Field'],$putkeys)) {
                $insertable[$value['Field']] = $this->_PUT[$value['Field']];
              }
            }
          }
          return $insertable;
        } else {
          return array('Error!' => 'Please specify a type of resource!');
        }
  }

    /**
     * @param array $putvals
     */
    private function updateData(array $putvals)
    {
        $tstr = 'PrestaShop\\Modules\\ShopWebService\\Models\\';
        $tstr .= ucfirst(strtolower($this->__catvals[0][0])) . 'sModel';
        $cls = new $tstr();
        $tstr = 'update';
        $tstr .= ucfirst(strtolower($this->__catvals[0][0]));
        return $cls->$tstr($this->__catvals[0][1],$putvals);
    }


}
