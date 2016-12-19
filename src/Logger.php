<?php
namespace Puja\Log;
use Puja\Log\Driver;
class Logger
{
    const EMERGENCY  = 0;
    const ALERT  = 1;
    const CRITICAL   = 2;
    const ERROR    = 3;
    const WARNING   = 4;
    const NOTICE = 5;
    const INFO   = 6;
    const DEBUG  = 7;

    protected static $initAdapter;
    public function __construct($configures)
    {
        if (!empty($configures)) {
            if (null !== self::$initAdapter) {
                throw new Exception('The configures are already loaded, no need to reload again');
            }

            self::$initAdapter = true;
            new Driver\Adapter($configures);
        }
    }

    public static function getAdapter($adapterName = null)
    {
        return Driver\Adapter::getInstance($adapterName);
    }
}