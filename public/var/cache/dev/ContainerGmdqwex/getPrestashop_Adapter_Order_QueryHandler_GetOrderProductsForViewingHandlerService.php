<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the public 'prestashop.adapter.order.query_handler.get_order_products_for_viewing_handler' shared service.

return $this->services['prestashop.adapter.order.query_handler.get_order_products_for_viewing_handler'] = new \PrestaShop\PrestaShop\Adapter\Order\QueryHandler\GetOrderProductsForViewingHandler(${($_ = isset($this->services['prestashop.core.image.parser.image_tag_source_parser']) ? $this->services['prestashop.core.image.parser.image_tag_source_parser'] : $this->load('getPrestashop_Core_Image_Parser_ImageTagSourceParserService.php')) && false ?: '_'}, ${($_ = isset($this->services['prestashop.adapter.legacy.context']) ? $this->services['prestashop.adapter.legacy.context'] : $this->getPrestashop_Adapter_Legacy_ContextService()) && false ?: '_'}->getContext()->language->id, ${($_ = isset($this->services['prestashop.core.localization.locale.context_locale']) ? $this->services['prestashop.core.localization.locale.context_locale'] : $this->load('getPrestashop_Core_Localization_Locale_ContextLocaleService.php')) && false ?: '_'});
