<?php
namespace Puja\Log\Driver\File;

use Puja\Log\Driver\DriverAbstract;
use Puja\Log\Formatter;
use Puja\Stdlib\File\File;

class Driver extends DriverAbstract
{
    protected $fileLog;
    protected $folderLog;
    public function __construct(Configure $configure)
    {
        $this->folderLog = rtrim($configure->getSavePath(), '/') . '/';
        $this->fileLog = $configure->getFileLog();
    }

    protected function getFileLog(array $extra = array())
    {
        if (!empty($extra['bin'])) {
            return $extra['bin'] . '.log';
        }

        return $this->fileLog;
    }

    public function log($priority, $message, array $extra = array())
    {
        $record = $this->getRecord($priority, $message, $extra);
        $formatter = new Formatter\File();
        $log = $formatter->format($record);
        $file = new File($this->folderLog . $this->getFileLog($extra), 'a+');
        $file->fwrite($log);
    }
}