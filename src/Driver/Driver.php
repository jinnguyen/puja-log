<?php
namespace Puja\Log\Driver;
use Puja\Log\Exception;

/**
 * Class Driver
 * @package Puja\Log\Driver
 */
class Driver
{
    const DRIVER_DEFAULT = 'File';
    protected $currentDriver;
    protected static $checkDriver;

    public function __construct($config, $writeAdapterName, $DriverDir)
    {
        if (empty($config['driver'])) {
            $config['driver'] = self::DRIVER_DEFAULT;
        }

        if (empty($config['priority'])) {
            $config['priority'] = \Puja\Log\Logger::INFO;
        }

        $configureCls = $DriverDir . $config['driver'] . '\\Configure';
        $driverCls = $DriverDir . $config['driver'] . '\\Driver';

        if (null === self::$checkDriver) {
            self::$checkDriver = true;
            if (false == (class_exists($configureCls) && class_exists($driverCls))) {
                throw new Exception(sprintf('A driver must have 2 class: %s, %s', $configureCls, $driverCls));
            }
        }

        $this->currentDriver = new $driverCls(new $configureCls($config));
    }

    public function getCurrentDriver()
    {
        return $this->getDriverInstance($this->currentDriver);
    }

    protected function getDriverInstance(DriverAbstract $driver)
    {
        return $driver;
    }
}