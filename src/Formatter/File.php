<?php
namespace Puja\Log\Formatter;
class File extends FormatterAbstract
{
    public function format(array $record)
    {
        return vsprintf('%s | Priority Code %s | Priority %s | %s | %s', $record);
    }
}