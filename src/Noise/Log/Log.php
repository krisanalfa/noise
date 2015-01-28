<?php namespace Noise\Log;

use Slim\Log as SlimLog;
use InvalidArgumentException;

class Log extends SlimLog
{
    /**
     * Log message
     * @param  mixed                    $level
     * @param  mixed                    $message
     * @param  array                    $context
     *
     * @return mixed|bool               What the Logger returns, or false if Logger not set or not enabled
     *
     * @throws InvalidArgumentException If invalid log level
     */
    public function log($level, $message, $context = array())
    {
        if (! isset(self::$levels[$level])) {
            throw new InvalidArgumentException('Invalid log level supplied to function');
        } elseif ($this->enabled and $this->writer and $level <= $this->level) {
            return $this->writer->write($level, $message, $context);
        }

        return false;
    }
}
