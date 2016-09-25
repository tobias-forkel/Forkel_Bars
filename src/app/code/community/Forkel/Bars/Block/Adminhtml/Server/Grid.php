<?php
/**
 * Forkel Bars
 *
 * @category    Forkel
 * @package     Forkel_Bars
 * @copyright   Copyright (c) 2015 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_Bars_Block_Adminhtml_Server_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        $this->setDefaultSort('id');
        $this->setId('forkel_bars_server_grid');
        $this->setDefaultDir('desc');
        $this->setSaveParametersInSession(true);
    }

    /**
     * Get collection class
     *
     * Return collection path as a string.
     *
     * @return string
     */
    protected function _getCollectionClass()
    {
        return 'forkel_bars/server_collection';
    }

    /**
     * Prepare collection
     *
     * Extend collection with joins to other resources.
     *
     * @return Mage_Adminhtml_Block_Widget_Grid
     */
    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel($this->_getCollectionClass());
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Prepare columns
     *
     * Add columns to the grid.
     *
     * @return Forkel_Bars_Block_Adminhtml_Bars_Grid
     */
    protected function _prepareColumns()
    {
        $this->addColumn('id',
            array(
                'header'    =>  $this->__('ID'),
                'align'     =>  'right',
                'width'     =>  '50px',
                'index'     =>  'id'
            )
        );

        $this->addColumn('name',
            array(
                'header'    => $this->__('Name'),
                'index'     => 'name'
            )
        );

        $this->addColumn('environment_variable',
            array(
                'header'    => $this->__('Environment Variable'),
                'index'     => 'environment_variable'
            )
        );

        $this->addColumn('environment_value',
            array(
                'header'    => $this->__('Environment Value'),
                'index'     => 'environment_value'
            )
        );

        return parent::_prepareColumns();
    }

    /**
     * Get URL for a specific row
     *
     * Return the "edit" form url for each row.
     *
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}
