<?php

namespace PTK\Log\Formatter;

/**
 * Description of FormatterAbstract
 *
 * @author evert
 */
abstract class FormatterAbstract implements FormatterInterface {
    
    protected ?string $format;
    
    public function __construct(?string $format = null) {
        $this->format = $format;
    }

    abstract public function format($message, mixed $context = []);

    public function getFormat(): string {
        return $this->format;
    }

    public function setFormat(string $format): FormatterInterface {
        $this->format = $format;
        return $this;
    }
    
    /**
     * Chamada por self::format()
     * 
     * @param string $format
     * @param mixed $context
     * @return string
     */
    protected function parseContext(string $format, mixed $context = []): string {
        
    }
    /**
     * Chamada por self::format()
     * 
     * Aplica no formato algumas variáveis prédefinidas delimitadas por [%varname%]
     * 
     * Variáveis:
     * 
     * - message
     * - context
     * - datetime
     * - date
     * - time
     * - ...
     * 
     * 
     * 
     * @param string $format
     * @return string
     */
    protected function applyVariables(string $format): string {
        
    }

}
