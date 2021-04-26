<?php

namespace PTK\Log\Formatter;

/**
 * Description of LinteFormatter
 *
 * @author Everton da Rosa <everton3x@gmail.com>
 */
class LineFormatter extends FormatterAbstract
{

    protected const SIMPLE_FORMAT = "[%datetime%]\t[%level%]\t[%message%]" . PHP_EOL;

    protected const DEFAULT_DATE_FORMAT = 'Y-m-d H:i:s';

    public function __construct(?string $format = null, ?string $dateTimeFormat = null)
    {
        $this->format = ($format === null) ? self::SIMPLE_FORMAT : $format;
        $this->dateTimeFormat = ($dateTimeFormat === null) ? self::DEFAULT_DATE_FORMAT : $dateTimeFormat;
    }

    /**
     *
     * @param string $level
     * @param string $message
     * @param array<mixed> $context
     * @return string
     */
    public function format(string $level, string $message, array $context = []): string
    {
        $message = $this->parseContext($message, $context);
        $message = $this->applyVariables($level, $message);
        return $message;
    }

    /**
     * Aplica os valores de contexto na mensagem.
     *
     * @param string $message
     * @param mixed $context
     * @return string
     */
    protected function parseContext(string $message, mixed $context): string
    {
        foreach ($context as $field => $value) {
            $message = str_replace('{' . $field . '}', $value, $message);
        }
        return $message;
    }
    /**
     * Aplica as variáveis no formato.
     *
     *
     * Aplica no formato algumas variáveis prédefinidas delimitadas por [%varname%]
     *
     * Variáveis:
     *
     * - message
     * - datetime
     *
     *
     * @param string $level
     * @param string $message
     *
     * @return string
     */
    protected function applyVariables(string $level, string $message): string
    {
        if ($this->format === null) {
            return '';
        }
        if ($this->dateTimeFormat === null) {
            $this->dateTimeFormat = self::DEFAULT_DATE_FORMAT;
        }
        $datetime = date($this->dateTimeFormat);
        $result = '';
        $result .= str_replace('[%datetime%]', $datetime, $this->format);
        $result .= str_replace('[%level%]', $level, $result);
        $result .= str_replace('[%message%]', $message, $result);

        return $result;
    }
}
