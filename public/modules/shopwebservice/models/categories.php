<?php
namespace PrestaShop\Modules\ShopWebService\Models;

use DB;

class CategoriesModel {

  function getAllCategories() {
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'category');
  }

  function getCategoriesSchema() {
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('DESCRIBE ' . _DB_PREFIX_ . 'category');
  }

  function getCategoriesById(int $id) {
    $sql = 'SELECT * FROM ' . _DB_PREFIX_;
    $sql .= 'category WHERE id_category=' . $id;
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }
}
