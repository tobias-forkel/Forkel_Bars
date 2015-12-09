<?php
/**
 * Forkel Bars
 *
 * @category    Forkel
 * @package     Forkel_Bars
 * @copyright   Copyright (c) 2015 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_Bars_Model_Server extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init(Forkel_Bars_Helper_Data::MODEL_SERVER);
    }

    /**
     * Return all collection as an option array
     *
     * @return array
     */
    public function getOptionArray()
    {
        $collection = $this->getCollection();

        $options = array();

        foreach ($collection as $index => $value)
        {
            $options[$index] = $value->getName();
        }

        return $options;
    }
}
