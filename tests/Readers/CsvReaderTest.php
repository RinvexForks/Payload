<?php

/*
 * This file is part of Payload.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Tests\Payload\Readers;

use BrianFaust\Payload\Readers\CsvReader;

class CsvReaderTest extends AbstractTestCase
{
    public function should_read_file()
    {
        $reader = $this->getReader();

        $contents = $reader->read(
            sprintf('%s/../stubs/data.'.$this->getFileExtension(), __DIR__)
        );

        $this->assertEquals([['hello'], ['world']], $contents);
    }

    protected function getFileExtension()
    {
        return 'csv';
    }

    protected function getReader()
    {
        return new CsvReader();
    }
}
