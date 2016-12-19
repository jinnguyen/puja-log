<?php
namespace Puja\Log\Driver\File;
use Puja\Entity\Entity;

/**
 * This comment (docblock) is copied from Puja\Log\Driver\File\Configure->getDocblock(); you should do it each time you change the Puja\Log\Driver\File\Configure->attributes
 * @method string getDriver()
 * @method setDriver(string $attr)
 * @method hasDriver()
 * @method unsetDriver()
 * @method int getPriority()
 * @method setPriority(int $attr)
 * @method hasPriority()
 * @method unsetPriority()
 * @method string getSavePath()
 * @method setSavePath(string $attr)
 * @method hasSavePath()
 * @method unsetSavePath()
 * @method string getFileLog()
 * @method setFileLog(string $attr)
 * @method hasFileLog()
 * @method unsetFileLog()
 */
class Configure extends Entity
{
    protected $attributes = array (
        'driver' => Entity::DATATYPE_STRING,
        'priority' => Entity::DATATYPE_INT,
        'save_path' => Entity::DATATYPE_STRING,
        'file_log' => Entity::DATATYPE_STRING,
    );

    protected $defaults = array(
        'file_log' => 'application.log',
        'driver' => 'File',
    );
}