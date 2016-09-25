<?php

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

/**
 * Create table 'forkel_bars_index'
 */
$table = $installer->getTable('forkel_bars/index');

if (!$installer->getConnection()->tableColumnExists($table, 'admin_role_id'))
{
    $installer->getConnection()
        ->addColumn($table,
            'admin_role_id',
            array(
                'type'      => Varien_Db_Ddl_Table::TYPE_TEXT,
                'nullable'  => true,
                'comment'   => 'Admin Role'
            )
        );
}

$installer->endSetup();
