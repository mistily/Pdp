<?php
namespace PrestaShop\Modules\ShopWebService\Models;

use DB;

class OrdersModel {

    /**
     * @return array|bool|\mysqli_result|\PDOStatement|resource|null
     * @throws \PrestaShopDatabaseException
     */
    function getAllOrders() {
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'orders');
      }

    /**
     * @return array|bool|\mysqli_result|\PDOStatement|resource|null
     * @throws \PrestaShopDatabaseException
     */
    function getOrdersSchema() {
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('DESCRIBE ' . _DB_PREFIX_ . 'orders');
      }

    /**
     * @param int $id
     * @return array|bool|\mysqli_result|\PDOStatement|resource|null
     * @throws \PrestaShopDatabaseException
     */
    function getOrdersById(int $id) {
        $sql = 'SELECT * FROM ' . _DB_PREFIX_;
        $sql .= 'orders WHERE id_order=' . $id;
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    }

    /**
     * @param array $data
     * @return bool|string
     * @throws \PrestaShopDatabaseException
     */
    function insertOrder(array $data) {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->insert(_DB_PREFIX_ . 'order',
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
    function updateOrder(int $id, array $data): string
    {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->update(_DB_PREFIX_ . 'order',
                $data,'`id_order`='.$id);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param int $id
     * @return string
     */
    function deleteOrder(int $id): string
    {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->delete(_DB_PREFIX_ . 'order',
                '`id_order`='.$id);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
