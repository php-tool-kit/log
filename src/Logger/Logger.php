<?php

namespace PTK\Log\Logger;

use Psr\Log\LoggerInterface;
use Psr\Log\LogLevel;
use PTK\Log\Formatter\FormatterInterface;
use PTK\Log\Writer\WriterInterface;

/**
 * Mecanismo de log de mensagens compatível com PSR-3 do PHP-FIG
 *
 * @author evert
 */
class Logger implements LoggerInterface {

    /**
     * 
     * @var WriterInterface
     */
    protected WriterInterface $defaultWriter;
    
    /**
     * 
     * @var FormatterInterface
     */
    protected FormatterInterface $defaultFormatter;
    
    /**
     * 
     * @var array<FormatterInterface>
     */
    protected array $formatters = [];
    
    /**
     * 
     * @var array<WriterInterface>
     */
    protected array $writers = [];

    /**
     * 
     * @param WriterInterface $defaultWriter
     * @param FormatterInterface $defaultFormatter
     */
    public function __construct(WriterInterface $defaultWriter, FormatterInterface $defaultFormatter) {
        $this->defaultWriter = $defaultWriter;
        $this->defaultFormatter = $defaultFormatter;
    }

    public function alert($message, mixed $context = []): void {
        $this->log(LogLevel::ALERT, $message, $context);
    }

    public function critical($message, mixed $context = []): void {
        $this->log(LogLevel::CRITICAL, $message, $context);
    }

    public function debug($message, mixed $context = []): void {
        $this->log(LogLevel::DEBUG, $message, $context);
    }

    public function emergency($message, mixed $context = []): void {
        $this->log(LogLevel::EMERGENCY, $message, $context);
    }

    public function error($message, mixed $context = []): void {
        $this->log(LogLevel::ERROR, $message, $context);
    }

    public function info($message, mixed $context = []): void {
        $this->log(LogLevel::INFO, $message, $context);
    }

    public function log($level, $message, array $context = []): void {
        $formatter = $this->getFormatterForLevel($level);
        $writer = $this->getWriterForLevel($level);
        $formated = $formatter->format($level, $message, $context);
        $writer->write($formated);
    }

    public function notice($message, mixed $context = []): void {
        $this->log(LogLevel::NOTICE, $message, $context);
    }

    public function warning($message, mixed $context = []): void {
        $this->log(LogLevel::WARNING, $message, $context);
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
    
    public function setFormatterForLevel($level, FormatterInterface $formatter): void
    {
        $this->formatters[$level] = $formatter;
    }
    
    public function setWriterForLevel($level, WriterInterface $writer): void
    {
        $this->writers[$level] = $writer;
    }
}
