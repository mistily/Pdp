<?php
namespace PrestaShop\Modules\ShopWebService\Models;

use DB;

class CategoryModel {

    /**
     * @return array|bool|\mysqli_result|\PDOStatement|resource|null
     * @throws \PrestaShopDatabaseException
     */
    function getAllCategories() {
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'category');
  }

    /**
     * @return array|bool|\mysqli_result|\PDOStatement|resource|null
     * @throws \PrestaShopDatabaseException
     */
    function getCategorySchema() {
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('DESCRIBE ' . _DB_PREFIX_ . 'category');
  }

    /**
     * @param int $id
     * @return array|bool|\mysqli_result|\PDOStatement|resource|null
     * @throws \PrestaShopDatabaseException
     */
    function getCategoryById(int $id) {
    $sql = 'SELECT * FROM ' . _DB_PREFIX_;
    $sql .= 'category WHERE id_category=' . $id;
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }



    /**
     * @param array $data
     * @return bool|string
     * @throws \PrestaShopDatabaseException
     */
    function insertCategory(array $data) {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->insert(_DB_PREFIX_ . 'category',
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
    function updateCategory(int $id, array $data): string
    {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->update(_DB_PREFIX_ . 'category',
                $data,'`id_category`='.$id);
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param int $id
     * @return string
     */
    function deleteCategory(int $id): string
    {
        try {
            return Db::getInstance(_PS_USE_SQL_SLAVE_)->delete(_DB_PREFIX_ . 'category',
                '`id_category`='.$id);
        }catch(Exception $e) {
            return $e->getMessage();
        }
    }
}
