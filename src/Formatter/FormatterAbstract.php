<?php

namespace PTK\Log\Formatter;

/**
 * Description of FormatterAbstract
 *
 * @author evert
 */
abstract class FormatterAbstract implements FormatterInterface {
    
    /**
     * 
     * @var string|null
     */
    protected ?string $format;
    
    /**
     * 
     * @var string|null
     */
    protected ?string $dateTimeFormat;
    
    /**
     * 
     * @param string|null $format
     * @param string|null $$dateTimeFormat
     */
    public function __construct(?string $format = null, ?string $dateTimeFormat = null) {
        $this->format = $format;
        $this->dateTimeFormat = $dateTimeFormat;
    }

    abstract public function format($level, $message, mixed $context = []);
    
    abstract protected function parseContext(string $message, mixed $context): string;

    public function getFormat(): string {
        return $this->format;
    }

    public function setFormat(string $format): FormatterInterface {
        $this->format = $format;
        return $this;
    }
    
    public function setDateTimeFormat(string $format): void {
        $this->dateTimeFormat = $format;
    }
    
    public function getDateTimeFormat(): string {
        return $this->dateTimeFormat;
    }

}
