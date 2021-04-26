<?php

namespace PTK\Log\Writer;

/**
 *  Writer é o mecanismo de "escrita" dos logs, que pode ser num arquivo, no console,
 *  num banco de dados, página web, etc.
 *
 * @author Everton da Rosa <everton3x@gmail.com>
 */
interface WriterInterface
{
    /**
     *
     * @param mixed $formatted
     * @return void
     */
    public function write(mixed $formatted): void;
}
