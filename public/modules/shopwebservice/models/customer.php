<?php
namespace PrestaShop\Modules\ShopWebService\Models;

use DB;

class CustomerModel {

    /**
     * @return array|bool|\mysqli_result|\PDOStatement|resource|string|null
     * @throws \PrestaShopDatabaseException
     */
    function getAllCustomers() {
        try {
            $sql = 'SELECT * FROM ' . _DB_PREFIX_ . 'customer';
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @return array|bool|\mysqli_result|\PDOStatement|resource|string|null
     * @throws \PrestaShopDatabaseException
     */
    function getCustomerSchema() {
        try {
            $sql = 'DESCRIBE ' . _DB_PREFIX_ . 'customer';
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
    function getCustomerById(int $id) {
        try {
            $sql = 'SELECT * FROM ' . _DB_PREFIX_;
            $sql .= 'customer WHERE id_customer=' . $id;
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
    function insertCustomer(array $data) {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->insert(_DB_PREFIX_ . 'customer',
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
    function updateCustomer(int $id, array $data): string
    {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->update(_DB_PREFIX_ . 'customer',
                $data,'`id_customer`='.$id);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param int $id
     * @return string
     */
    function deleteCustomer(int $id): string
    {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->delete(_DB_PREFIX_ . 'customer',
                '`id_customer`='.$id);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
