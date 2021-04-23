<?php

namespace PTK\Log\Formatter;

/**
 *
 * @author evert
 */
interface FormatterInterface {
    
    public function __construct(?string $format = null);
    
    public function format($message, mixed $context = []);
    
    public function setFormat(string $format): FormatterInterface;
    
    public function getFormat(): string;
}
