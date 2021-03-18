<?php
namespace PrestaShop\Modules\ShopWebService\Models;

use DB;

class SuppliersModel {

  function getAllSuppliers() {
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'supplier');
  }

  function getSuppliersSchema() {
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('DESCRIBE ' . _DB_PREFIX_ . 'supplier');
  }

  function getSuppliersById(int $id) {
    $sql = 'SELECT * FROM ' . _DB_PREFIX_;
    $sql .= 'supplier WHERE id_supplier=' . $id;
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }
}
