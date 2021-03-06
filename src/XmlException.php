<?php

namespace darkfriend\helpers;

/**
 * Class XmlException
 * @package darkfriend\php5-xml
 * @author darkfriend <hi@darkfriend.ru>
 * @version 1.0.0
 */
class XmlException extends \Exception
{
    /**
     * Creates new exception object.
     * @param string $message
     * @param int $code
     * @param string $file
     * @param int $line
     * @param \Exception $previous
     */
    public function __construct($message = "", $code = 0, $file = "", $line = 0, $previous = null)
    {
        parent::__construct($message, $code, $previous);

        if (!empty($file) && !empty($line)) {
            $this->file = $file;
            $this->line = $line;
        }
    }
}