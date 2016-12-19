<?php
namespace Puja\Log\Driver;
abstract class DriverAbstract implements DriverInterface
{
    protected $priorities = array(
        \Puja\Log\Logger::EMERGENCY  => 'EMERGENCY',
        \Puja\Log\Logger::ALERT  => 'ALERT',
        \Puja\Log\Logger::CRITICAL   => 'CRITICAL',
        \Puja\Log\Logger::ERROR    => 'ERROR',
        \Puja\Log\Logger::WARNING   => 'WARNING',
        \Puja\Log\Logger::NOTICE => 'NOTICE',
        \Puja\Log\Logger::INFO   => 'INFO',
        \Puja\Log\Logger::DEBUG  => 'DEBUG',
    );

    abstract public function log($priority, $message, array $extra = array());

    public function emergency($message, array $extra = array())
    {
        $this->log(\Puja\Log\Logger::EMERGENCY, $message, $extra);
    }

    public function alert($message, array $extra = array())
    {
        $this->log(\Puja\Log\Logger::ALERT, $message, $extra);
    }

    public function critical($message, array $extra = array())
    {
        $this->log(\Puja\Log\Logger::CRITICAL, $message, $extra);
    }

    public function error($message, array $extra = array())
    {
        $this->log(\Puja\Log\Logger::ERROR, $message, $extra);
    }

    public function warning($message, array $extra = array())
    {
        $this->log(\Puja\Log\Logger::WARNING, $message, $extra);
    }
    
    public function notice($message,array $extra = array())
    {
        $this->log(\Puja\Log\Logger::NOTICE, $message, $extra);
    }

    public function info($message, array $extra = array())
    {
        $this->log(\Puja\Log\Logger::INFO, $message, $extra);
    }

    public function debug($message, array $extra = array())
    {
        $this->log(\Puja\Log\Logger::DEBUG, $message, $extra);
    }

    protected function getRecord($priority, $message, array $extra = array())
    {
        $timestamp = new \DateTime();

        if (is_array($message)) {
            $message = var_export($message, true);
        } elseif ($message instanceof \Exception) {
            $message = $message->getMessage() . PHP_EOL . $message->getTraceAsString();
        }

        if (isset($extra['bin'])) {
            unset($extra['bin']);
        }

        $extra = print_r($extra, true);

        return array(
            'timestamp'    => $timestamp->format('Y-m-d h:i:s'),
            'priority'     => (int) $priority,
            'priorityName' => $this->priorities[$priority],
            'message'      => (string) $message,
            'extra'        => $extra,
        );
    }
}