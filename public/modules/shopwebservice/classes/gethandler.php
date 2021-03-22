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


class GetHandler extends RequestHandler
{

    var $__catvals = null;

    /**
     * GetHandler constructor.
     * @param array|null $route
     */
    function __construct(array $route = null)
    {
        if ($route !== null) {
            $this->createRouteStruct($route);
        }
    }

    /**
     * @param array|null $route
     * @return array
     */
    function handleRoute(array $route = null)
    {
        $resp = null;
        if (!empty($route)) {
            $this->createRouteStruct($route);
        }
        foreach ($this->__catvals as $key => $value) {
            if (isset($this->catmap[$value[0]])) {
                $resp[] = $this->getValues($value,
                    $this->catmap[$value[0]]);
            } else {
                $resp[] = array("Request error!" =>
                    "Request was not understood!");
            }
        }
        return $resp;
    }

    /**
     * @param array $route
     */
    public function createRouteStruct(array $route)
    {
        if (is_array($route)) {
            foreach ($route as $key => $value) {
                if (!empty($value)) {
                    $this->__catvals[] = explode('=', $value);
                }
            }
        }
    }

    /**
     * @param $value
     * @param $type
     * @return array|string[]
     */
    private function getValues($value, $type)
    {

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
                $res = $p->$cval();
                break;
            case is_numeric($value[1]):
                $cval = 'get' . $type . 'ById';
                $res = $p->$cval($value[1]);
                break;
            default:
                $res = array("Request error!" => "Request was not understood!");
                break;
        }
        return $res;

    }

}
