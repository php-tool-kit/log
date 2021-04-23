<?php

namespace PTK\Log\Formatter;

/**
 * Description of LinteFormatter
 *
 * @author evert
 */
class LineFormatter extends FormatterAbstract {
    
    protected const SIMPLE_FORMAT = "[%datetime%] [%level%] [%message%] [%context%]".PHP_EOL;
    
    public function __construct(?string $format = null) {
        $this->format = ($format === null)? self::SIMPLE_FORMAT : $format;
        
        parent::__construct($format);
    }
    public function format($message, mixed $context = []) {
        $formated = $this->parseContext($this->format, $context);
        $formated = $this->applyVariables($formated);
        return $formated;
    }

}
