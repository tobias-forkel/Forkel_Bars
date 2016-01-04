<?php
/**
 * Forkel Bars
 *
 * @category    Forkel
 * @package     Forkel_Bars
 * @copyright   Copyright (c) 2015 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

class Forkel_Bars_Adminhtml_Forkel_Bars_IndexController extends Mage_Adminhtml_Controller_Action
{
    /**
     * Initialize action
     *
     * @return Mage_Adminhtml_Controller_Action
     */
    protected function _initAction()
    {
        $this->loadLayout()->_setActiveMenu('system/forkel_bars/index');
        return $this;
    }

    /**
     * Index action
     *
     * @return void
     */
    public function indexAction()
    {
        $this->_title($this->__('Forkel Bars'))->_title($this->__('Index'));
        $this->_initAction()->renderLayout();
    }

    /**
     * Edit action
     *
     * Load data to the edit form
     *
     * @return void
     */
    public function editAction()
    {
        $id  = $this->getRequest()->getParam('id');
        $model = Mage::getSingleton(Forkel_Bars_Helper_Data::MODEL_INDEX);

        if ($id)
        {
            $model->load($id);

            if (!$model->getId())
            {
                Mage::getSingleton('adminhtml/session')->addError($this->__('The requested record was not found.'));
                $this->_redirect('*/*/');

                return;
            }
        }

        $this->_title($model->getId() ? $model->getName() : $this->__('New Record'));

        Mage::register(Forkel_Bars_Helper_Data::MODULE_KEY, $model);

        $this->_initAction()
            ->_addContent($this->getLayout()->createBlock('forkel_bars/adminhtml_index_edit')->setData('action', $this->getUrl('*/*/save')))
            ->renderLayout();
    }

    /**
     * Save action
     *
     * Save or update model.
     *
     * @return void
     */
    public function saveAction()
    {
        if ($postData = $this->getRequest()->getPost())
        {
            try
            {
                $model = Mage::getSingleton(Forkel_Bars_Helper_Data::MODEL_INDEX);

                foreach ($postData as $key => $value)
                {
                    if (is_array($value))
                    {
                        $postData[$key] = implode(',', $this->getRequest()->getParam($key));
                    }
                }

                Mage::log($postData);

                $model->setData($postData);
                $model->save();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The record ( %s ) has been saved.', $model->getName()));
                $this->_redirect('*/*/');

                return;
            }

            catch (Mage_Core_Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }

            catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while saving this record.'));
            }
        }
    }

    /**
     * Delete action
     *
     * Delete one item.
     *
     * @return void
     */
    public function deleteAction()
    {
        $id = $this->getRequest()->getParam('id');

        if (!filter_var($id, FILTER_VALIDATE_INT))
        {
            Mage::getSingleton('adminhtml/session')->addError($this->__('Please select one record.'));
        }
        else
        {
            try
            {
                $model = Mage::getSingleton(Forkel_Bars_Helper_Data::MODEL_INDEX);
                $model->load($id)->delete();

                Mage::getSingleton('adminhtml/session')->addSuccess($this->__('The selected record was successfully deleted.'));
            }

            catch (Mage_Core_Exception $e)
            {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }

            catch (Exception $e)
            {
                Mage::getSingleton('adminhtml/session')->addError($this->__('An error occurred while deletion.'));
            }
        }

        $this->_redirect('*/*/index');
    }

    /**
     * Check the permissions for current backend user
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('system/forkel_bars');
    }

    /**
     * New action
     *
     * Redirect to action "edit"
     *
     * @return void
     */
    public function newAction()
    {
        $this->_forward('edit');
    }
}
