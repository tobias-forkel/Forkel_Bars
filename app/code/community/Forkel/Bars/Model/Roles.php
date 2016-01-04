<?php
/**
 * Forkel Bars
 *
 * @category    Forkel
 * @package     Forkel_Bars
 * @copyright   Copyright (c) 2015 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_Bars_Model_Roles extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('admin/roles');
    }

    /**
     * Return all collection as an option array
     *
     * @return array
     */
    public function getOptionArray()
    {
        $options = array();

        $collection = $this->getCollection();

        foreach ($collection as $value)
        {
            $options[] = array(
                'value' =>  $value->getRoleId(),
                'label' =>  $value->getRoleName()
            );
        }

        return $options;
    }
}
