<?php
namespace PrestaShop\Modules\ShopWebService\Models;

use DB;

class ProductsModel {

    /**
     * @return array|bool|\mysqli_result|\PDOStatement|resource|string|null
     * @throws \PrestaShopDatabaseException
     */
    function getAllProducts() {
        try {
          $sql = 'SELECT * FROM ' . _DB_PREFIX_ . 'product';
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
          $sql = 'DESCRIBE ' . _DB_PREFIX_ . 'product';
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
          $sql .= 'product WHERE id_product=' . $id;
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
          return Db::getInstance(_PS_USE_SQL_SLAVE_)->insert(_DB_PREFIX_ . 'product',
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
          return Db::getInstance(_PS_USE_SQL_SLAVE_)->update(_DB_PREFIX_ . 'product',
              $data,'`id_product`='.$id);
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
          return Db::getInstance(_PS_USE_SQL_SLAVE_)->delete(_DB_PREFIX_ . 'product',
              '`id_product`='.$id);
      }catch(Exception $e) {
          return $e->getMessage();
      }
  }
}
