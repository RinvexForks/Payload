<?php

namespace BrianFaust\Payload\Unserialisers;

use BrianFaust\Payload\Contracts\Unserialiser;
use BrianFaust\Payload\Utils\Mapper;
use BrianFaust\Csv\Reader;

class CsvUnserialiser implements Unserialiser
{
    public function unserialise($input, $class = null)
    {
        $reader = Reader::createFromString($input);

        $contents = $reader->fetchAll();

        // @deprecated for the moment
        // for ($i = 0; $i < count($contents); ++$i) {
        //     if ($i <= 0) {
        //         continue;
        //     }

        //     $contents[$i] = array_combine($contents[0], $contents[$i]);
        // }

        if (!is_null($class)) {
            return (new Mapper())->map($contents, $class);
        }

        return $contents;
    }
}