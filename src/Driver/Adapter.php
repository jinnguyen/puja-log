<?php
namespace Puja\Log\Driver;
use Puja\Log;
class Adapter
{
    protected static $configures;
    protected static $instances;
    public function __construct($configures)
    {
        if (null !== self::$configures) {
            throw new Exception('The configures are already loaded, no need to reload again');
        }

        self::$configures = new Configure($configures);
    }

    /**
     * @param null $adapterName
     * @return DriverAbstract
     * @throws Log\Exception
     */
    public static function getInstance($adapterName = null)
    {
        if (empty(self::$configures)) {
            throw new Log\Exception('Adapter are not configured yet, pls call *new Logger($configures)*');
        }

        $adapters = self::$configures->getAdapters();
        if (empty($adapterName)) {
            $adapterName = current(array_keys($adapters));
        }
        
        if (empty($adapters[$adapterName])) {
            throw new Log\Exception('Adapter name: ' . $adapterName . ' is not found');
        }

        if (!empty(self::$instances[$adapterName])) {
            return self::$instances[$adapterName];
        }

        if (!array_key_exists($adapterName, $adapters)) {
            throw new Log\Exception($adapterName . ' doesnt exist in configured adapters');
        }
        
        $driver = new Driver(
            $adapters[$adapterName],
            $adapterName,
            self::$configures->getDriverDir()
        );
        self::$instances[$adapterName] = $driver->getCurrentDriver();
        return self::$instances[$adapterName];
    }

    public function log($level = Log\Logger::INFO, $message, $extra = array())
    {
        
    }
}