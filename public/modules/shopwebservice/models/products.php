<?php
namespace PrestaShop\Modules\ShopWebService\Models;

use DB;

class ProductsModel {

  function getAllProducts() {
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'product');
  }

  function getProductsSchema() {
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('DESCRIBE ' . _DB_PREFIX_ . 'product');
  }

  function getProductById(int $id) {
    $sql = 'SELECT * FROM ' . _DB_PREFIX_;
    $sql .= 'product WHERE id_product=' . $id;
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }
}
