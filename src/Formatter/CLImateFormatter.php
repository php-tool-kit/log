<?php

namespace PTK\Log\Formatter;

/**
 * Formatter para utilizar as cores/backgrounds do CLImate.
 *
 * @author Everton da Rosa <everton3x@gmail.com>
 */
class CLImateFormatter extends LineFormatter {
    
    protected ?string $format;
    
    protected const FORMATS = [
        'alert' => [
            'foreground' => 'white',
            'background' => 'yellow',
            'effect' => 'bold'
        ],
        'critical' => [
            'foreground' => 'red',
            'background' => null,
            'effect' => 'bold'
        ],
        'debug' => [
            'foreground' => 'green',
            'background' => null,
            'effect' => null
        ],
        'emergency' => [
            'foreground' => 'white',
            'background' => 'red',
            'effect' => 'bold'
        ],
        'error' => [
            'foreground' => 'red',
            'background' => null,
            'effect' => null
        ],
        'info' => [
            'foreground' => null,
            'background' => 'green',
            'effect' => null
        ],
        'notice' => [
            'foreground' => 'blue',
            'background' => null,
            'effect' => 'bold'
        ],
        'warning' => [
            'foreground' => 'yellow',
            'background' => null,
            'effect' => null
        ]
    ];
    public function __construct(?string $format = null, ?string $dateTimeFormat = null) {
        $this->format = ($format === null)? "[%datetime%]\t[%climate_start_bg%][%climate_start_fg%][%climate_start_effect%][%level%][%climate_end_effect%][%climate_end_fg%][%climate_end_bg%]\t[%message%]" : $format;
        parent::__construct($this->format, $dateTimeFormat);
    }
    
    protected function applyVariables(string $level, string $message): string
    {
//        echo __METHOD__, PHP_EOL;
        $result = parent::applyVariables($level, $message);
        
        $background = self::FORMATS[$level]['background'];
        if($background === null){
            $result = str_replace('[%climate_start_bg%]', '', $result);
            $result = str_replace('[%climate_end_bg%]', '', $result);
        }
        if($background !== null){
            $result = str_replace('[%climate_start_bg%]', '<background_'.$background.'>', $result);
            $result = str_replace('[%climate_end_bg%]', '</background_'.$background.'>', $result);
        }

        $foreground = self::FORMATS[$level]['foreground'];
        if($foreground === null){
            $result = str_replace('[%climate_start_fg%]', '', $result);
            $result = str_replace('[%climate_end_fg%]', '', $result);
        }
        if($foreground !== null){
            $result = str_replace('[%climate_start_fg%]', '<'.$foreground.'>', $result);
            $result = str_replace('[%climate_end_fg%]', '</'.$foreground.'>', $result);
        }
        
        $effect = self::FORMATS[$level]['effect'];
        if($effect === null){
            $result = str_replace('[%climate_start_effect%]', '', $result);
            $result = str_replace('[%climate_end_effect%]', '', $result);
        }
        if($effect !== null){
            $result = str_replace('[%climate_start_effect%]', '<'.$effect.'>', $result);
            $result = str_replace('[%climate_end_effect%]', '</'.$effect.'>', $result);
        }
        return $result;
    }
    
    public function format(string $level, string $message, array $context = []): string
    {
//        echo __METHOD__, PHP_EOL;
        $message = $this->parseContext($message, $context);
        $message = $this->applyVariables($level, $message);
        return $message;
    }
}
