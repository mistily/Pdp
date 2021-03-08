<?php

use PrestaShop\Modules\ShopWebService\Classes\CrudHelper;

class ShopWebServiceAPIModuleFrontController extends ModuleFrontController
{
  /**
   * @see FrontController::initContent()
   */
  public function initContent()
  {
      parent::initContent();
      $crh = new CrudHelper($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
      $resp = $crh->handleRoute();
      header('Content-Type: application/json');
      $this->ajaxDie(json_encode($resp));
      exit;
  }

}
