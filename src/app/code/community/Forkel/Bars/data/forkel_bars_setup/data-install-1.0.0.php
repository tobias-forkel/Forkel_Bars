<?php
/**
 * Forkel Bars
 *
 * @category    Forkel
 * @package     Forkel_Bars
 * @copyright   Copyright (c) 2015 Tobias Forkel (http://www.tobiasforkel.de)
 * @license     http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 */

$model = Mage::getModel(Forkel_Bars_Helper_Data::MODEL_INDEX);

if ($model->getCollection()->count() == 0)
{

    $values = array(
        array(
            'name' => 'Noooope!',
            'description' => 'Your boss will fire you right away.',
            'color' => '#fff',
            'color_background' => '#d2552e',
            'server_id' => 4,
            'status' => 1,
            'admin_role_id' => 1
        ),
        array(
            'name' => 'Please!',
            'description' => 'This environment is tested and ready for deployment.',
            'color' => '#fff',
            'color_background' => '#8a6d3b',
            'server_id' => 3,
            'status' => 1,
            'admin_role_id' => 1,
        ),
        array(
            'name' => 'Well ...',
            'description' => 'Ask your team and project manager before do any changes.',
            'color' => '#fff',
            'color_background' => '#31708f',
            'server_id' => 2,
            'status' => 1,
            'admin_role_id' => 1
        ),
        array(
            'name' => 'Good!',
            'description' => ' You can do whatever you want.',
            'color' => '#fff',
            'color_background' => '#3c763d',
            'server_id' => 1,
            'status' => 1,
            'admin_role_id' => 1
        )
    );

    foreach($values as $value)
    {
        $model->setData($value)->save();
    }
}

$model = Mage::getModel(Forkel_Bars_Helper_Data::MODEL_SERVER);

if ($model->getCollection()->count() == 0)
{

    $values = array(
        array(
            'name'          => 'Local Environment',
            'description'   => 'Dictum viverra suspendisse hendrerit quam pellentesque pharetra, elementum sit urna, morbi scelerisque.',
            'environment_value'      => 'local.server.com'
        ),
        array(
            'name'          => 'Staging Environment',
            'description'   => 'Diharetra, elementum sit urna, morbi scelerisque.',
            'environment_value'      => 'staging.server.com'
        ),
        array(
            'name'          => 'Preview Environment',
            'description'   => 'Sed ut, amet nam, cras in arcu. Mollis aenean pede tortor fusce mattis rutrum, non sollicitudin.',
            'environment_value'      => 'preview.server.com'
        ),
        array(
            'name'          => 'Production Environment',
            'description'   => 'Mollis aenean pede tortor fusce mattis rutrum, non sollicitudin.',
            'environment_value'      => 'www.server.com'
        ),
    );

    foreach($values as $value)
    {
        $model->setData($value)->save();
    }
}
