<?php
/**
 * Forkel Bars
 *
 * @category    Forkel
 * @package     Forkel_Bars
 * @copyright   Copyright (c) 2015 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_Bars_Block_Adminhtml_Server_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function __construct()
    {
        parent::__construct();

        $this->setId('forkel_bars_server_form');
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

        $fieldset->addField('name', 'text', array(
            'name'      => 'name',
            'label'     => $this->__('Name'),
            'title'     => $this->__('Name'),
            'note'     => $this->__('The name of the environment.'),
            'required'  => true
        ));

        $fieldset->addField('environment_variable', 'select', array(
            'name'      => 'environment_variable',
            'label'     => $this->__('Environment Variable'),
            'title'     => $this->__('Environment Variable'),
            'values'    => Mage::getSingleton('forkel_bars/server_environment')->getOptionArray(),
            'note'     => $this->__('The execution environment variable for server identification. Add more variables in <a href="%s"> System > Configuration > Forkel Bars > Server</a>.', $this->getUrl('adminhtml/system_config/edit/section/forkel_bars')),
        ));

        $fieldset->addField('environment_value', 'text', array(
            'name'      => 'environment_value',
            'label'     => $this->__('Environment Value'),
            'title'     => $this->__('Environment Value'),
            'note'     => $this->__('The value that should match the selected variable.'),
        ));

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}

