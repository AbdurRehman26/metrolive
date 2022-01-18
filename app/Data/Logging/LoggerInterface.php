<?php

namespace App\Data\Logging;

interface LoggerInterface
{
    public function save();
    public function log(string $string);
}
