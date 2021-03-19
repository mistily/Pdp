<?php
namespace PrestaShop\Modules\ShopWebService\Models;

use DB;

class DeliveryModel {

    /**
     * @return array|bool|\mysqli_result|\PDOStatement|resource|string|null
     * @throws \PrestaShopDatabaseException
     */
    function getAllDeliveries() {
        try {
            $sql = 'SELECT * FROM ' . _DB_PREFIX_ . 'delivery';
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return array|bool|\mysqli_result|\PDOStatement|resource|string|null
     * @throws \PrestaShopDatabaseException
     */
    function getProductsSchema() {
        try {
            $sql = 'DESCRIBE ' . _DB_PREFIX_ . 'delivery';
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param int $id
     * @return array|bool|\mysqli_result|\PDOStatement|resource|string|null
     * @throws \PrestaShopDatabaseException
     */
    function getProductById(int $id) {
        try {
            $sql = 'SELECT * FROM ' . _DB_PREFIX_;
            $sql .= 'delivery WHERE id_delivery=' . $id;
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param array $data
     * @return bool|string
     * @throws \PrestaShopDatabaseException
     */
    function insertProduct(array $data) {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->insert(_DB_PREFIX_ . 'delivery',
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
    function updateProduct(int $id, array $data): string
    {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->update(_DB_PREFIX_ . 'delivery',
                $data,'`id_delivery`='.$id);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param int $id
     * @return string
     */
    function deleteProduct(int $id): string
    {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->delete(_DB_PREFIX_ . 'delivery',
                '`id_delivery`='.$id);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
