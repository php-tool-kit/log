<?php

namespace PTK\Log\Writer;

use Exception;

/**
 * Writer prar streams abertos por fopen().
 *
 * @author Everton da Rosa <everton3x@gmail.com>
 */
class StreamWriter implements WriterInterface
{

    /**
     *
     * @var resource
     */
    protected $handle;

    /**
     *
     * @param string $stream
     */
    public function __construct(string $stream)
    {
        $resource = fopen($stream, 'a');
        if ($resource === false) {
            throw new Exception($stream);
        }
        $this->handle = $resource;
    }

    /**
     *
     * @param mixed $formatted
     * @return void
     */
    public function write(mixed $formatted): void
    {
        fwrite($this->handle, $formatted);
    }
}
