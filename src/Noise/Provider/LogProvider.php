<?php namespace Noise\Provider;

use Bono\App;
use Bono\Provider\Provider;
use Noise\Log\LogWriter;
use Monolog\Handler\StreamHandler;
use Monolog\Formatter\LineFormatter;
use Monolog\Processor\WebProcessor;
use Noise\Log\Log;

/**
 * VersionProvider
 *
 * @property  mixed  options
 * @property  mixed  app
 * @category  Provider
 * @package   Bono
 * @author    Krisan Alfa Timur <krisan47@gmail.com>
 * @copyright 2013 PT Sagara Xinix Solusitama
 */
class LogProvider extends Provider
{
    public function initialize()
    {
        $defaultConfig = array(
            // Your log name
            'log.name' => 'NoiseLog',

            // Path where log will be written
            'log.path' => 'logs',

            // The file format of logfile
            'log.format' => 'Y-m-d',

            // The used timezone for your logfile timestamp
            'log.timezone' => 'Asia/Jakarta'
        );

        $this->options = array_merge($defaultConfig, $this->options);

        date_default_timezone_set($this->options['log.timezone']);

        // The default date format is "Y-m-d H:i:s"
        $dateFormat = "Y-m-d H:i:s";
        // The default output format is "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n"
        $output = "[%datetime%] – [%channel%] – [%level_name%]\n    [MESSAGE] %message%\n    [CONTEXT] %context%\n    [EXTRA]   %extra%\n-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------\n";
        // Finally, create a formatter
        $formatter = new LineFormatter($output, $dateFormat);

        // Create a new directory
        $logPath = realpath($this->app->config('bono.base.path')).'/'.$this->options['log.path'];
        if (! is_dir($logPath)) {
            mkdir($logPath);
        }

        // Create a handler
        $stream = new StreamHandler($logPath.'/'.date($this->options['log.format']).'.log');

        // Set our formatter
        $stream->setFormatter($formatter);

        // Create LogWriter
        $logger = new LogWriter(array(
            'name' => $this->options['log.name'],
            'handlers' => array(
                $stream,
            ),
            'processors' => array(
                new WebProcessor(),
            ),
        ));

        // Bind our logger to Bono Container
        $this->app->container->singleton('log', function ($c) {
            $log = new Log($c['logWriter']);

            $log->setEnabled($c['settings']['log.enabled']);
            $log->setLevel($c['settings']['log.level']);

            $env = $c['environment'];
            $env['slim.log'] = $log;

            return $log;
        });

        // Set the writer
        $this->app->config('log.writer', $logger);
    }
}
