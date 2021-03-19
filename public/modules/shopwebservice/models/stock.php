<?php
namespace PrestaShop\Modules\ShopWebService\Models;

use DB;

class StockModel {

    /**
     * @return array|bool|\mysqli_result|\PDOStatement|resource|null
     * @throws \PrestaShopDatabaseException
     */
    function getAllStocks() {
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'stock');
    }

    /**
     * @return array|bool|\mysqli_result|\PDOStatement|resource|null
     * @throws \PrestaShopDatabaseException
     */
    function getStockSchema() {
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('DESCRIBE ' . _DB_PREFIX_ . 'stock');
    }

    /**
     * @param int $id
     * @return array|bool|\mysqli_result|\PDOStatement|resource|null
     * @throws \PrestaShopDatabaseException
     */
    function getStocksById(int $id) {
        $sql = 'SELECT * FROM ' . _DB_PREFIX_;
        $sql .= 'orders WHERE id_order=' . $id;
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    }

    /**
     * @param array $data
     * @return bool|string
     * @throws \PrestaShopDatabaseException
     */
    function insertStock(array $data) {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->insert(_DB_PREFIX_ . 'stock',
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
    function updateStock(int $id, array $data): string
    {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->update(_DB_PREFIX_ . 'stock',
                $data,'`id_stock`='.$id);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param int $id
     * @return string
     */
    function deleteStock(int $id): string
    {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->delete(_DB_PREFIX_ . 'stock',
                '`id_stock`='.$id);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
