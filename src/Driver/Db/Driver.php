<?php
namespace Puja\Log\Driver\Db;

use Puja\Log\Driver\DriverAbstract;
use Puja\Log\Formatter;
use Puja\Standard\File;
use Puja\Db\Table;

class Driver extends DriverAbstract
{
    protected $table;
    public function __construct(Configure $configure)
    {
        $this->table = new Table($configure->getLogTable());
        if ($configure->getCreateTable()) {
            Table::getWriteAdapter()->execute('
                CREATE TABLE IF NOT EXISTS ' . $configure->getLogTable() . '(
                    `id` int(5) NOT NULL AUTO_INCREMENT,
                    `log_file` varchar(255),
                    `priority` int,
                    `priorityName` varchar(50),
                    `message` text,
                    `extra` text,
                    `timestamp` DATETIME,
                PRIMARY KEY (`id`))
            ');
        }
    }

    protected function getFileLog(array $extra = array())
    {
        if (!empty($extra['bin'])) {
            return $extra['bin'] . '.log';
        }

        return 'application.log';
    }

    public function log($priority, $message, array $extra = array())
    {
        $record = $this->getRecord($priority, $message, $extra);
        $record['log_file'] =  $this->getFileLog($extra);
        $this->table->insert($record);

    }
}