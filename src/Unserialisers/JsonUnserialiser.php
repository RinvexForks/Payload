<?php

namespace BrianFaust\Payload\Unserialisers;

use BrianFaust\Payload\Contracts\Unserialiser;
use BrianFaust\Payload\Utils\Mapper;

class JsonUnserialiser implements Unserialiser
{
    public function unserialise($input, $class = null)
    {
        $contents = json_decode($input);

        if (!is_null($class)) {
            return (new Mapper())->map($contents, $class);
        }

        return (array) $contents;
    }
}