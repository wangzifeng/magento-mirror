<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Mage
 * @package     Mage_GoogleBase
 * @copyright   Copyright (c) 2010 Magento Inc. (http://www.magentocommerce.com)
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

/**
 * Google Base Type resource model
 *
 * @category   Mage
 * @package    Mage_GoogleBase
 * @author     Magento Core Team <core@magentocommerce.com>
 */
class Mage_GoogleBase_Model_Mysql4_Type extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init('googlebase/types', 'type_id');
    }

    /**
     * Return Type ID by Attribute Set Id and target country
     *
     * @param int $attributeSetId Attribute Set
     * @param string $targetCountry Two-letters country ISO code
     * @return int
     */
    public function getTypeIdByAttributeSetId($attributeSetId, $targetCountry)
    {
        $select = $this->_getReadAdapter()->select()
            ->from($this->getMainTable(), 'type_id')
            ->where('attribute_set_id=?', $attributeSetId)
            ->where('target_country=?', $targetCountry);

        return $this->_getReadAdapter()->fetchOne($select);
    }
}
