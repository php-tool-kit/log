<?php

namespace PTK\Log\Writer;

/**
 * Writer para o console com CLImate.
 *
 * @author Everton da Rosa <everton3x@gmail.com>
 */
class CLImateWriter implements WriterInterface {
    protected $climate;
    public function __construct() {
        $this->climate = new \League\CLImate\CLImate();
    }
    
    public function write(mixed $formatted): void {
        $this->climate->out($formatted);
    }

}
