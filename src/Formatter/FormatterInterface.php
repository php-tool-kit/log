<?php

namespace PTK\Log\Formatter;

/**
 *
 * @author evert
 */
interface FormatterInterface {
    
    public function __construct(?string $format = null, ?string $dateTimeFormat = null);
    
    public function format($level, $message, mixed $context = []);
    
    public function setFormat(string $format): FormatterInterface;
    
    public function getFormat(): string;
    
    public function setDateTimeFormat(string $format): void;
    
    public function getDateTimeFormat(): string;
}
