<?php

namespace PTK\Log\Logger;

use Psr\Log\LoggerInterface;
use PTK\Log\Formatter\FormatterInterface;
use PTK\Log\Writer\WriterInterface;

/**
 * Description of Logger
 *
 * @author evert
 */
class Logger implements LoggerInterface {

    protected WriterInterface $defaultWriter;
    protected FormatterInterface $defaultFormatter;
    
    protected array $formatters = [];
    protected array $writers = [];

    public function __construct(WriterInterface $defaultWriter, FormatterInterface $defaultFormatter) {
        $this->defaultWriter = $defaultWriter;
        $this->defaultFormatter = $defaultFormatter;
    }

    public function alert($message, mixed $context = []): void {
        
    }

    public function critical($message, mixed $context = []): void {
        
    }

    public function debug($message, mixed $context = []): void {
        
    }

    public function emergency($message, mixed $context = []): void {
        
    }

    public function error($message, mixed $context = []): void {
        
    }

    public function info($message, mixed $context = []): void {
        
    }

    public function log($level, $message, array $context = []): void {
        $formatter = $this->getFormatterForLevel($level);
        $writer = $this->getWriterForLevel($level);
        $formated = $formatter->format($message, $context);
        $writer->write($formated);
    }

    public function notice($message, mixed $context = []): void {
        
    }

    public function warning($message, mixed $context = []): void {
        
    }

    protected function getFormatterForLevel($level): FormatterInterface {
        if(key_exists($level, $this->formatters)){
            return $this->formatters[$level];
        }
        return $this->defaultFormatter;
    }

    protected function getWriterForLevel($level): WriterInterface {
        if(key_exists($level, $this->writers)){
            return $this->writers[$level];
        }
        return $this->defaultWriter;
    }

}
