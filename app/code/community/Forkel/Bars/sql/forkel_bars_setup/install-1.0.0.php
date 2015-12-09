<?php

/* @var $installer Mage_Core_Model_Resource_Setup */
$installer = $this;
$installer->startSetup();

/**
 * Create table 'forkel_bars_index'
 */
$table = $installer->getTable('forkel_bars/index');
if ($installer->getConnection()->isTableExists($table) != true)
{
    $table = $installer->getConnection()
        ->newTable($table)
        ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'identity'  => true,
            'unsigned'  => true,
            'nullable'  => false,
            'primary'   => true,
        ), 'Forkel Bars - ID')
        ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 128, array(
            'nullable'  => false,
        ), 'Name')
        ->addColumn('description', Varien_Db_Ddl_Table::TYPE_TEXT, 512, array(
            'nullable'  => false,
        ), 'Description)')
        ->addColumn('color', Varien_Db_Ddl_Table::TYPE_TEXT, 7, array(
            'nullable' => false,
        ), 'Color')
        ->addColumn('color_background', Varien_Db_Ddl_Table::TYPE_TEXT, 7, array(
            'nullable' => false,
        ), 'Background Color')
        ->addColumn('status', Varien_Db_Ddl_Table::TYPE_TINYINT, 1, array(
            'nullable'  => false,
            'default'  => 0,
        ), 'Status')
        ->addColumn('server_id', Varien_Db_Ddl_Table::TYPE_SMALLINT, null, array(
            'unsigned'  => true,
            'nullable'  => false,
        ), 'Server ID')
        ->setComment('Forkel Bars - Index');
    $installer->getConnection()->createTable($table);
}

/**
 * Create table 'forkel_bars_server'
 */
$table = $installer->getTable('forkel_bars/server');
if ($installer->getConnection()->isTableExists($table) != true)
{
    $table = $installer->getConnection()
        ->newTable($table)
        ->addColumn('id', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
            'identity'  => true,
            'unsigned'  => true,
            'nullable'  => false,
            'primary'   => true,
        ), 'Forkel Bars - ID')
        ->addColumn('name', Varien_Db_Ddl_Table::TYPE_TEXT, 128, array(
            'nullable'  => false,
        ), 'Name')
        ->addColumn('hostname', Varien_Db_Ddl_Table::TYPE_TEXT, 256, array(
            'nullable'  => false,
        ), 'Hostname)')
        ->setComment('Forkel Bars - Server');
    $installer->getConnection()->createTable($table);
}
