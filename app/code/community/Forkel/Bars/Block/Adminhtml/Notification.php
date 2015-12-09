<?php
/**
 * Forkel Bars
 *
 * @category    Forkel
 * @package     Forkel_Bars
 * @copyright   Copyright (c) 2015 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_Bars_Block_Adminhtml_Notification extends Mage_Core_Block_Template
{
    public function getNotification()
    {
        return Mage::getSingleton(Forkel_Bars_Helper_Data::MODEL_INDEX)->loadByHostname(
            Forkel_Bars_Helper_Data::getHostname()
        );
    }

    /**
     * Get lighter hex color
     *
     * @param $diff The difference to the original color.
     *
     * @return string
     */
    public function getBackgroundLighter($hex = '', $diff = '50')
    {
        return Forkel_Bars_Helper_Data::hexColorLighter($hex, $diff);
    }

}
