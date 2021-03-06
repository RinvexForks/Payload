<?php

/*
 * This file is part of Payload.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Payload\Readers;

use BrianFaust\Payload\Unserialisers\CsvUnserialiser;

class CsvReader extends Reader
{
    protected $extensions = ['csv'];

    public function read($path, $class = null)
    {
        return (new CsvUnserialiser())->unserialise($this->contents($path), $class);
    }
}
