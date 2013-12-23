<?php
/**
 * @category    Foggyline
 * @package     Foggyline_SearchOrder
 * @author      Branko Ajzele <ajzele@gmail.com>
 * @copyright   Copyright (c) Branko Ajzele (http://foggyline.net/)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Foggyline_SearchOrder_Helper_Data extends Mage_Core_Helper_Abstract
{
    const CONFIG_ACTIVE = 'catalog/foggyline_searchorder/active';
    const CONFIG_ATTR_CODES = 'catalog/foggyline_searchorder/attr_codes';

    public function isModuleEnabled($moduleName = null)
    {
        if (Mage::getStoreConfig(self::CONFIG_ACTIVE) == '0') {
            return false;
        }

        return parent::isModuleEnabled($moduleName = null);
    }

    public function getAttrCodes($store = null)
    {
        $_codes = array();

        $codes = Mage::getStoreConfig(self::CONFIG_ATTR_CODES, $store);
        $codes = explode("\n", $codes);

        foreach ($codes as $code) {
            $_codes[] = trim($code);
        }

        return $_codes;
    }
}
