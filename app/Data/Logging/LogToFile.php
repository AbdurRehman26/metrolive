<?php

namespace App\Data\Logging;

class LogToFile implements LoggerInterface
{
    private array $logs;
    private $fileName = '';

    public function __construct(string $fileName = 'logging.log')
    {
        $this->fileName = $fileName;
    }

    public function log(string $text)
    {
        $this->logs[] = $text;
    }

    protected function toString(): string
    {
        return implode(' ,', $this->logs);
    }

    public function save()
    {
        $logFile = fopen($this->fileName, 'w');
        fwrite($logFile, $this->toString());
        fclose($logFile);
    }
}
