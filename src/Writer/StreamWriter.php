<?php

namespace PTK\Log\Writer;

/**
 * Description of StdOutWriter
 *
 * @author evert
 */
class StreamWriter implements WriterInterface {
    
    protected $handle;
    
    public function __construct(string $stream) {
        $this->handle = fopen($stream, 'a');
    }
    
    public function write($formatted): void {
        fgets($this->handle, $formatted);
    }

}
