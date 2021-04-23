<?php

namespace PTK\Log\Writer;

/**
 *
 * @author evert
 */
interface WriterInterface {
    public function write($formatted): void;
}
