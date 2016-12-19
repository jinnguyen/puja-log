<?php
namespace Puja\Log\Driver;

interface DriverInterface
{
    /**
     * @param string $message
     * @param array $extra
     * @return LoggerInterface
     */
    public function emergency($message,array $extra = array());

    /**
     * @param string $message
     * @param array $extra
     * @return LoggerInterface
     */
    public function alert($message,array $extra = array());

    /**
     * @param string $message
     * @param array $extra
     * @return LoggerInterface
     */
    public function critical($message,array $extra = array());

    /**
     * @param string $message
     * @param array $extra
     * @return LoggerInterface
     */
    public function error($message,array $extra = array());

    /**
     * @param string $message
     * @param array $extra
     * @return LoggerInterface
     */
    public function warning($message,array $extra = array());

    /**
     * @param string $message
     * @param array $extra
     * @return LoggerInterface
     */
    public function notice($message,array $extra = array());

    /**
     * @param string $message
     * @param array $extra
     * @return LoggerInterface
     */
    public function info($message,array $extra = array());

    /**
     * @param string $message
     * @param array $extra
     * @return LoggerInterface
     */
    public function debug($message,array $extra = array());
}
