<?php
/*
 * This file is part of the Sonata project.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\FormatterBundle\Tests\Formatter;

use Sonata\FormatterBundle\Formatter\RawFormatter;
use Sonata\FormatterBundle\Formatter\Pool;

class PoolTest extends \PHPUnit_Framework_TestCase
{
    public function testPool()
    {
        $formatter = new RawFormatter();

        $pool = new Pool;

        $this->assertFalse($pool->has('foo'));

        $pool->add('foo', $formatter);

        $this->assertTrue($pool->has('foo'));

        $this->assertEquals('Salut', $pool->transform('foo', 'Salut'));
    }

    public function testNonExistantFormatter()
    {
        $this->setExpectedException('RuntimeException');

        $pool = new Pool;
        $pool->get('foo');
    }
}

