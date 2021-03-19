<?php
namespace PrestaShop\Modules\ShopWebService\Models;

use DB;

class SuppliersModel {

    /**
     * @return array|bool|\mysqli_result|\PDOStatement|resource|null
     * @throws \PrestaShopDatabaseException
     */
    function getAllSuppliers() {
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'supplier');
    }

    /**
     * @return array|bool|\mysqli_result|\PDOStatement|resource|null
     * @throws \PrestaShopDatabaseException
     */
    function getSuppliersSchema() {
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('DESCRIBE ' . _DB_PREFIX_ . 'supplier');
    }

    /**
     * @param int $id
     * @return array|bool|\mysqli_result|\PDOStatement|resource|null
     * @throws \PrestaShopDatabaseException
     */
    function getSuppliersById(int $id) {
        $sql = 'SELECT * FROM ' . _DB_PREFIX_;
        $sql .= 'supplier WHERE id_supplier=' . $id;
        return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    }

    /**
     * @param array $data
     * @return bool|string
     * @throws \PrestaShopDatabaseException
     */
    function insertSupplier(array $data) {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->insert(_DB_PREFIX_ . 'supplier',
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
    function updateSupplier(int $id, array $data): string
    {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->update(_DB_PREFIX_ . 'supplier',
                $data,'`id_supplier`='.$id);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param int $id
     * @return string
     */
    function deleteSupplier(int $id): string
    {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->delete(_DB_PREFIX_ . 'supplier',
                '`id_supplier`='.$id);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
