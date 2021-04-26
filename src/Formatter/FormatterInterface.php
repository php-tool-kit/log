<?php

namespace PTK\Log\Formatter;

/**
 *
 * @author Everton da Rosa <everton3x@gmail.com>
 */
interface FormatterInterface
{

    public function __construct(?string $format = null, ?string $dateTimeFormat = null);

    /**
     *
     * @param string $level
     * @param string $message
     * @param array<mixed> $context
     * @return string
     */
    public function format(string $level, string $message, array $context = []): string;

    public function setFormat(string $format): FormatterInterface;

    public function getFormat(): ?string;

    public function setDateTimeFormat(string $format): void;

    public function getDateTimeFormat(): ?string;
}
