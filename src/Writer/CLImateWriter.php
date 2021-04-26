<?php

namespace PTK\Log\Writer;

use League\CLImate\CLImate;

/**
 * Writer para o console com CLImate.
 *
 * @author Everton da Rosa <everton3x@gmail.com>
 */
class CLImateWriter implements WriterInterface
{
    protected CLImate $climate;
    public function __construct()
    {
        $this->climate = new CLImate();
    }

    public function write(mixed $formatted): void
    {
        $this->climate->out($formatted);
    }
}
