<?php
/**
 * Forkel Bars
 *
 * @category    Forkel
 * @package     Forkel_Bars
 * @copyright   Copyright (c) 2015 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_Bars_Block_Adminhtml_Index_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();

        $this->setDefaultSort('id');
        $this->setId('forkel_bars_index_grid');
        $this->setDefaultDir('asc');
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
        return 'forkel_bars/index_collection';
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
     * @return Forkel_Bars_Block_Adminhtml_Index_Grid
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

        $this->addColumn('server_id',
            array(
                'header'    => $this->__('Server'),
                'index'     => 'server_id',
                'type'  => 'options',
                'options' => Mage::getSingleton('forkel_bars/server')->getOptionArray(),
                'width' => '200px',
            )
        );

        $this->addColumn('name',
            array(
                'header'    => $this->__('Name'),
                'index'     => 'name',
                'width' => '200px',
            )
        );

        $this->addColumn('description',
            array(
                'header'    => $this->__('Description'),
                'index'     => 'description'
            )
        );

        $this->addColumn('status',
            array(
                'header'    => $this->__('Status'),
                'index'  => 'status',
                'type'  => 'options',
                'options'   => array(
                    '0'     => $this->__('Disabled'),
                    '1'     => $this->__('Enabled')
                ),
                'width' => '50px',
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
