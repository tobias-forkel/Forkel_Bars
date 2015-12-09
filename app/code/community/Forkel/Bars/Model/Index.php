<?php
/**
 * Forkel Bars
 *
 * @category    Forkel
 * @package     Forkel_Bars
 * @copyright   Copyright (c) 2015 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_Bars_Model_Index extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init(Forkel_Bars_Helper_Data::MODEL_INDEX);
    }

    /**
     * Load collection filtered by hostname and status
     *
     * @return Forkel_Bars_Model_Index
     */
    public function loadByHostname($hostname = '', $status = 1)
    {
        $collection = $this->getCollection();
        $collection->getSelect()->join(array(
            'server'=> 'forkel_bars_server'),
            'main_table.server_id = server.id', array(
                'server_name' => 'server.name'
            )
        );

        $collection->addFieldToFilter('status', $status);
        $collection->addFieldToFilter('hostname', $hostname);

        return $collection->getFirstItem();
    }
}
