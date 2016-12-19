<?php
include '../vendor/autoload.php';
$configures = array(
    'write_adapter_name' => 'master',
    'adapters' => array(
        'default' => array(
            'host' => 'localhost',
            'username' => 'root',
            'password' => '123',
            'dbname' => 'fwcms',
            'charset' => 'utf8',
        ),
        'master' => array(
            'host' => 'localhost',
            'username' => 'root',
            'password' => '123',
            'dbname' => 'fwcms',
            'charset' => 'utf8',
        )
    )
);

use Puja\Db\Adapter;
new Adapter($configures);


use Puja\Log\Logger;
$configures = array(
    'adapters' => array(
        'default' => array(
            'driver' => 'File',
            'save_path' => __DIR__ . '/',
        )
    )

);
new Logger($configures);
try {
    throw new \Puja\Log\Exception('Lal ala lala');
} catch (\Puja\Log\Exception $e) {
    Logger::getAdapter()->info($e);
    Logger::getAdapter()->debug($e, array('bin' => 'test'));
}
