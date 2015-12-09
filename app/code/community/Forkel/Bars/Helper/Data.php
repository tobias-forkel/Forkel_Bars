<?php
/**
 * Forkel Bars
 *
 * @category    Forkel
 * @package     Forkel_Bars
 * @copyright   Copyright (c) 2015 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_Bars_Helper_Data extends Mage_Core_Helper_Abstract
{
    const MODULE_NAME       = 'Forkel_Bars';
    const MODULE_KEY        = 'forkel_bars';

    const MODEL_INDEX       = 'forkel_bars/index';
    const MODEL_SERVER      = 'forkel_bars/server';

    /**
     * Return hostname by current url
     *
     * @return array
     */
    public function getHostname()
    {
        $url = Mage::helper('core/url')->getCurrentUrl();
        $url = Mage::getSingleton('core/url')->parseUrl($url);

        return $url->getHost();
    }

    /**
     * Change the brightness of the passed color
     *
     * @param string $hex color to be modified
     * @param string $diff amount to change the color
     *
     * @return string
     */
    public function hexColorLighter($hex, $diff)
    {
        $rgb = str_split(trim($hex, '# '), 2);

        foreach ($rgb as &$hex)
        {
            $dec = hexdec($hex);
            $dec = ($diff >= 0) ? $dec += $diff : $dec -= abs($diff);
            $dec = max(0, min(255, $dec));
            $hex = str_pad(dechex($dec), 2, '0', STR_PAD_LEFT);
        }

        return '#'.implode($rgb);
    }
}
