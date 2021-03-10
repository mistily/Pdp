<?php
namespace PrestaShop\Modules\ShopWebService\Models;

use DB;

class ProductsModel {

  function getAllProducts() {
    try {
      $sql = 'SELECT * FROM ' . _DB_PREFIX_ . 'product';
      return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    } catch(Exception $e) {
      return $e->getMessage();
    }
  }

  function getProductsSchema() {
    try {
      $sql = 'DESCRIBE ' . _DB_PREFIX_ . 'product';
      return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    } catch(Exception $e) {
      return $e->getMessage();
    }
  }

  function getProductById(int $id) {
    try {
      $sql = 'SELECT * FROM ' . _DB_PREFIX_;
      $sql .= 'product WHERE id_product=' . $id;
      return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    } catch (Exception $e) {
      return $e->getMessage();
    }
  }

  function insertProduct(array $data) {
    try {
      $sql = 'INSERT INTO ' . _DB_PREFIX_  . '`product`( ';
      $keys = implode(array_keys($data),',');
      $sql .= $keys . ") VALUES (";
      $values = implode(array_values($data));
      $sql .= $values . ")";
      return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
    } catch(Exception $e) {
      return $e->getMessage();
    }
  }
}
