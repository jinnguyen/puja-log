<?php
namespace Puja\Log\Driver;
use Puja\Entity\Entity;
/**
 * This comment (docblock) is copied from Puja\Log\Driver\Configure->getDocblock(); you should do it each time you change the Puja\Log\Driver\Configure->attributes
 * @method string getDriverDir()
 * @method setDriverDir(string $attr)
 * @method hasDriverDir()
 * @method unsetDriverDir()
 * @method array getAdapters()
 * @method setAdapters(array $attr)
 * @method hasAdapters()
 * @method unsetAdapters()
 */
class Configure extends Entity
{
    protected $attributes = array(
        'driver_dir' => Entity::DATATYPE_STRING,
        'adapters' => Entity::DATATYPE_ARRAY,
    );
    
    protected $defaults = array(
        'driver_dir' => '\\Puja\\Log\\Driver\\',
    );
}