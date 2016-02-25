<?php
/**
 * Forkel Bars
 *
 * @category    Forkel
 * @package     Forkel_Bars
 * @copyright   Copyright (c) 2015 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_Bars_Block_Adminhtml_Server_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_blockGroup = Forkel_Bars_Helper_Data::MODULE_KEY;
        $this->_controller = 'adminhtml_server';

        parent::__construct();

        $this->_updateButton('save', 'label', $this->__('Save Record'));
    }

    /**
     * Get header text
     *
     * Check if global id exists. Return text for "edit" or "new".
     *
     * @return string
     */
    public function getHeaderText()
    {
        if (Mage::registry(Forkel_Bars_Helper_Data::MODULE_KEY)->getId())
        {
            return $this->__('Forkel Bars > Server > %s', $this->__('Edit'));
        }

        return $this->__('Forkel Bars > Server > %s', $this->__('New'));
    }
}
