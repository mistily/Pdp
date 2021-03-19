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

class PatchHandler extends RequestHandler{

    var $__catvals;
    var $_PATCH;

    /**
     * PatchHandler constructor.
     * @param array|null $url
     * @param array|null $_PATCH
     */
    function __construct(array $url = null, array $_PATCH = null) {
        if($url!==null) {
            $this->createRouteStruct($url);
        }
        if(!empty($_PATCH)) {
            $this->_PATCH = $_PATCH;
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
        if(!empty($this->_PATCH)) {
            $patchvals = $this->createPatchParamStruct($this->__catvals[0]);
            $resp = $this->updateData($patchvals);
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
    private function createPatchParamStruct(array $type) {
        $insertable = null;
        if(isset($type[0])) {
            $tmpname = 'PrestaShop\\Modules\\ShopWebService\\Models\\';
            $tmpname .= ucfirst(strtolower($type[0])) . 'sModel';
            $m = new $tmpname();
            $tmpname = 'get' . ucfirst(strtolower($type[0])) . 'sSchema';
            $schema = $m->$tmpname();
            $patchkeys = array_keys($this->_PATCH);
            foreach ($schema as $key => $value) {
                if(isset($value['Field'])) {
                    if(in_array($value['Field'],$patchkeys)) {
                        $insertable[$value['Field']] = $this->_PATCH[$value['Field']];
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
