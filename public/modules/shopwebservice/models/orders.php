<?php
namespace PrestaShop\Modules\ShopWebService\Models;

use DB;

class OrdersModel {

  function getAllOrders() {
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('SELECT * FROM ' . _DB_PREFIX_ . 'orders');
  }

  function getOrdersSchema() {
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('DESCRIBE ' . _DB_PREFIX_ . 'orders');
  }

  function getOrdersById(int $id) {
    $sql = 'SELECT * FROM ' . _DB_PREFIX_;
    $sql .= 'orders WHERE id_order=' . $id;
    return Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
  }
}
