<?php
/**
 * Forkel Bars
 *
 * @category    Forkel
 * @package     Forkel_Bars
 * @copyright   Copyright (c) 2015 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_Bars_Block_Adminhtml_Index_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('forkel_bars_index_form');
    }

    /**
     * Prepare layout
     *
     * @return void
     */
    protected function _prepareLayout()
    {
        parent::_prepareLayout();
    }

    /**
     * Prepare form
     *
     * Setup the form fields for inserts/updates. Add all necessary fields.
     *
     * @return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
        $model = Mage::registry(Forkel_Bars_Helper_Data::MODULE_KEY);

        $form = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method'    => 'post'
        ));

        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend'    => $this->__('Edit'),
            'class'     => 'fieldset-wide',
        ));

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', array(
                'name'  => 'id',
            ));
        };

        $fieldset->addField('server_id', 'select', array(
            'name'      => 'server_id',
            'label'     => $this->__('Server'),
            'title'     => $this->__('Server'),
            'values'    => Mage::getSingleton('forkel_bars/server')->getOptionArray()
        ));

        $fieldset->addField('name', 'text', array(
            'name'      => 'name',
            'label'     => $this->__('Name'),
            'title'     => $this->__('Name'),
            'required'  => true,
        ));

        $fieldset->addField('description', 'textarea', array(
            'name'      => 'description',
            'label'     => $this->__('Description'),
            'title'     => $this->__('Description'),
            'required'  => true,
            'style'     => 'height: 60px;'
        ));

        $fieldset->addField('color', 'text', array(
            'name'      => 'color',
            'label'     => $this->__('Color'),
            'title'     => $this->__('Color'),
            'note'      => 'Hex code ( such as #a94442 )',
            'required'  => true,
        ));

        $fieldset->addField('color_background', 'text', array(
            'name'      => 'color_background',
            'label'     => $this->__('Background Color'),
            'title'     => $this->__('Background Color'),
            'note'      => 'Hex code ( such as #f2dede )',
            'required'  => true,
        ));

        $fieldset->addField('status', 'select', array(
            'label'     => $this->__('Status'),
            'title'     => $this->__('Status'),
            'name'      => 'status',
            'options'   => array(
                '0'     => $this->__('Disabled'),
                '1'     => $this->__('Enabled')
            )
        ));

        $fieldset->addField('admin_role_id', 'multiselect', array(
            'name'      => 'admin_role_id',
            'label'     => $this->__('Admin Role'),
            'title'     => $this->__('Admin Role'),
            'values'    => Mage::getSingleton('forkel_bars/roles')->getOptionArray(),
            'note'      => $this->__('Restrict for a specific admin role.'),
            'style'     => 'height: 120px;'
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}