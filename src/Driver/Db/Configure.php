<?php
namespace Puja\Log\Driver\Db;
use Puja\Entity\Entity;

/**
 * This comment (docblock) is copied from Puja\Log\Driver\Db\Configure->getDocblock(); you should do it each time you change the Puja\Log\Driver\Db\Configure->attributes
 * @method string getDriver()
 * @method setDriver(string $attr)
 * @method hasDriver()
 * @method unsetDriver()
 * @method string getPriority()
 * @method setPriority(string $attr)
 * @method hasPriority()
 * @method unsetPriority()
 * @method string getLogTable()
 * @method setLogTable(string $attr)
 * @method hasLogTable()
 * @method unsetLogTable()
 * @method string getDbAdapterName()
 * @method setDbAdapterName(string $attr)
 * @method hasDbAdapterName()
 * @method unsetDbAdapterName()
 * @method boolean getCreateTable()
 * @method setCreateTable(boolean $attr)
 * @method hasCreateTable()
 * @method unsetCreateTable()
 */
class Configure extends Entity
{
    protected $attributes = array (
        'driver' => Entity::DATATYPE_STRING,
        'priority' => Entity::DATATYPE_STRING,
        'log_table' => Entity::DATATYPE_STRING,
        'db_adapter_name' => Entity::DATATYPE_STRING,
        'create_table' => Entity::DATATYPE_BOOLEAN,
    );

    protected $defaults = array (
        'log_table' => 'puja_log_table',
        'create_table' => true,
        'driver' => 'Db',
    );
}