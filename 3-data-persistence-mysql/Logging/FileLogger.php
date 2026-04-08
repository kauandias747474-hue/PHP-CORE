<?php

namespace App\Utils;

use Exception;
use DateTime;
use DateTimeZone;

class FileLogger
{
    private $filePath;

    public function __construct($filePath = null)
    {
       
        date_default_timezone_set('America/Sao_Paulo');
        
        $this->filePath = $filePath ? $filePath : $this->getLogFilePath();
        $this->prepareDirectory();
    }

    public function info($message) { $this->writeLog('INFO', $message); }
    public function error($message) { $this->writeLog('ERROR', $message); }

    public function writeLog($level, $message)
    {
    
        $date = new DateTime('now', new DateTimeZone('America/Sao_Paulo'));
        $timestamp = $date->format('Y-m-d H:i:s');
        
        $formattedMessage = $this->formatMessage($message);
        $logEntry = "[" . $timestamp . "] [" . strtoupper($level) . "]: " . $formattedMessage . PHP_EOL;

        if (false === file_put_contents($this->filePath, $logEntry, FILE_APPEND | LOCK_EX)) {
            throw new Exception("Erro ao escrever no arquivo log.");
        }
    }

    private function formatMessage($message)
    {
      
        return strtoupper((string)$message);
    }

    private function getLogFilePath()
    {
        return __DIR__ . '/app.log';
    }

    private function prepareDirectory()
    {
        $dir = dirname($this->filePath);
        if (!empty($dir) && !is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
    }
}
