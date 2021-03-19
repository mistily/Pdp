<?php

namespace PrestaShop\Modules\ShopWebService\Classes;


use PrestaShop\Modules\ShopWebService\Classes\Parents\RequestHandler;
use PrestaShop\Modules\ShopWebService\Models\ProductsModel;
use PrestaShop\Modules\ShopWebService\Models\CarriersModel;
use PrestaShop\Modules\ShopWebService\Models\CustomersModel;
use PrestaShop\Modules\ShopWebService\Models\DeliveryModel;
use PrestaShop\Modules\ShopWebService\Models\OrderModel;
use PrestaShop\Modules\ShopWebService\Models\CategoryModel;
use PrestaShop\Modules\ShopWebService\Models\StockModel;


class DeleteHandler extends RequestHandler {

    var $__catvals;

    /**
     * DeleteHandler constructor.
     * @param array|null $url
     */
    function __construct(array $url = null) {
        if($url!==null) {
            $this->createRouteStruct($url);
        }
    }

    /**
     * @param array|null $route
     * @return mixed
     */
    function handleRoute(array $route = null) {
        $resp = null;
        if(!empty($route)) {
            $this->createRouteStruct($route);
        }
        $resp = $this->deleteData();
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
     * @return mixed
     */
    private function deleteData()
    {
        $tstr = 'PrestaShop\\Modules\\ShopWebService\\Models\\';
        $tstr .= ucfirst(strtolower($this->__catvals[0][0])) . 'sModel';
        $cls = new $tstr();
        $tstr = 'delete';
        $tstr .= ucfirst(strtolower($this->__catvals[0][0]));
        return $cls->$tstr($this->__catvals[0][1]);
    }
}
