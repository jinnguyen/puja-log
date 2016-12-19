<?php
namespace Puja\Log\Formatter;

abstract class FormatterAbstract
{
    abstract public function format(array $record);
}