<?php
namespace PrestaShop\Modules\ShopWebService\Models;

use DB;

class CarriersModel {

  function getAllCarriers() {
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'carrier');
  }

  function getCarriersSchema() {
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('DESCRIBE ' . _DB_PREFIX_ . 'carrier');
  }

  function getCarriersById(int $id) {
    $sql = 'SELECT * FROM ' . _DB_PREFIX_;
    $sql .= 'carrier WHERE id_carrier=' . $id;
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }
}
