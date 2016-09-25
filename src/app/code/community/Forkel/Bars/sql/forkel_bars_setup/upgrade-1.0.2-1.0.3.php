<?php

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

/**
 * Create table 'forkel_bars_index'
 */
$table = $installer->getTable('forkel_bars/server');

if ($installer->getConnection()->tableColumnExists($table, 'hostname'))
{
    $installer->getConnection()
        ->changeColumn($table,
            'hostname',
            'environment_value',
            array(
                'type'      =>  Varien_Db_Ddl_Table::TYPE_TEXT,
                'length'    =>  255,
                'comment'   =>  'Server Environment Value'
            )
        );
}

$installer->getConnection()
->addColumn($table,
    'environment_variable',
    array(
        'type'      =>  Varien_Db_Ddl_Table::TYPE_TEXT,
        'length'    =>  255,
        'default'   =>  'HTTP_HOST',
        'comment'   =>  'Server Environment Variable'
    )
);

$installer->endSetup();
