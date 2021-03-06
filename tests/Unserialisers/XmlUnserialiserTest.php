<?php

/*
 * This file is part of Payload.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Tests\Payload\Unserialisers;

use BrianFaust\Payload\Unserialisers\XmlUnserialiser;

class XmlUnserialiserTest extends AbstractTestCase
{
    protected function getInput()
    {
        return '<?xml version="1.0"?><response><hello>world</hello></response>';
    }

    protected function getUnserialiser()
    {
        return new XmlUnserialiser();
    }
}
