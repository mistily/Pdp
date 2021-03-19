<?php

namespace PrestaShop\Modules\ShopWebService\Classes\Parents;


abstract class RequestHandler {

  var $__catvals = null;
  var $catmap = null;

    /**
     * RequestHandler constructor.
     * @param array|null $route
     */
    function __construct(array $route = null) {
        if($route!==null) {
          $this->createRouteStruct($route);
        }
        $this->catmap = [
            'product' => 'Product',
            'category' => 'Category',
            'supplier' => 'Supplier',
            'stock' => 'Stock',
            'order' => 'Order',
            'customer' => 'Customer',
            'carrier' => 'Carrier'
        ];
  }

    /**
     * @param string|null $key
     * @return bool
     */
    private function checkApiKey(string $key = null): bool
  {
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

    /**
     * @param array|null $route
     * @return mixed
     */
    public abstract function handleRoute(array $route = null);

    /**
     * @param array $route
     * @return mixed
     */
    protected abstract function createRouteStruct(array $route);

}
