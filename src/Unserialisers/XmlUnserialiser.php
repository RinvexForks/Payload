<?php

namespace BrianFaust\Payload\Unserialisers;

use BrianFaust\Payload\Contracts\Unserialiser;
use BrianFaust\Payload\Utils\Mapper;

class XmlUnserialiser implements Unserialiser
{
    public function unserialise($input, $class = null)
    {
        $contents = json_decode(json_encode(simplexml_load_string($input, null, LIBXML_NOCDATA)));

        if (!is_null($class)) {
            return (new Mapper())->map($contents, $class);
        }

        return (array) $contents;
    }
}