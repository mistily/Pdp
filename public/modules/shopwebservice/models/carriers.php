<?php
namespace PrestaShop\Modules\ShopWebService\Models;

use DB;

class CarriersModel {

    /**
     * @return array|bool|\mysqli_result|\PDOStatement|resource|null
     * @throws \PrestaShopDatabaseException
     */
    function getAllCarriers() {
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'carrier');
    }

    /**
     * @param int $id
     * @return array|bool|\mysqli_result|\PDOStatement|resource|null
     * @throws \PrestaShopDatabaseException
     */
    function getCarriersById(int $id) {
       $sql = 'SELECT * FROM ' . _DB_PREFIX_;
       $sql .= 'carrier WHERE id_carrier=' . $id;
       return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    }

    /**
     * @param array $data
     * @return bool|string
     * @throws \PrestaShopDatabaseException
     */
    function insertCarrier(array $data) {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->insert(  _DB_PREFIX_ . 'carrier',
                $data);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * @param int $id
     * @param array $data
     * @return string
     */
    function updateCarrier(int $id, array $data): string
    {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->update(_DB_PREFIX_ . 'carrier',
                $data,'`id_carrier`='.$id);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param int $id
     * @return string
     */
    function deleteCarrier(int $id): string
    {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->delete(_DB_PREFIX_ . 'carrier',
                '`id_carrier`='.$id);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
