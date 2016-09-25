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
     * Load collection filtered by environment variable and status
     *
     * @return Forkel_Bars_Model_Index
     */
    public function loadByEnvironmentVariable($status = 1)
    {
        $env = Mage::helper(Forkel_Bars_Helper_Data::MODULE_KEY)->getServerEnvFiltered();

        $session = Mage::getSingleton('admin/session');
        $role_id = implode('', $session->getUser()->getRoles());

        $collection = $this->getCollection();
        $collection->addFieldToFilter('admin_role_id', array('finset' => $role_id));
        $collection->addFieldToFilter('status', $status);

        $collection->getSelect()->join(array(
            'server'=> 'forkel_bars_server'),
            'main_table.server_id = server.id', array(
                'server_name' => 'server.name'
            )
        );

        $keys = array_keys($env);
        $values = array_values($env);

        $collection->addFieldToFilter('environment_variable', array('finset', $keys));
        $collection->addFieldToFilter('environment_value', array('finset', $values));

        return $collection->getFirstItem();
    }
}

