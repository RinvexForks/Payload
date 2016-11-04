<?php

namespace BrianFaust\Tests\Payload\Readers;

use BrianFaust\Payload\Readers\Reader;
use BrianFaust\Payload\Exceptions\InvalidFileTypeException;
use PHPUnit_Framework_TestCase as TestCase;

abstract class AbstractTestCase extends TestCase
{
    public function should_return_reader()
    {
        $reader = $this->getReader();

        $this->assertInstanceOf(Reader::class, $reader);
    }

    public function should_read_file()
    {
        $reader = $this->getReader();

        $contents = $reader->read(
            sprintf('%s/../stubs/data.'.$this->getFileExtension(), __DIR__)
        );

        $this->assertEquals(['hello' => 'world'], $contents);
    }

    public function should_throw_exception_when_invalid_file_type()
    {
        $this->setExpectedException(InvalidFileTypeException::class);

        $reader = $this->getReader();

        $reader->read('invalid.txt');
    }

    abstract protected function getReader();

    abstract protected function getFileExtension();
}