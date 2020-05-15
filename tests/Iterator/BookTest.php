<?php

namespace DesignPatternsTest\Iterator;

use DesignPatterns\Iterator\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    /**
     * @dataProvider bookNameProvider
     */
    public function testGetName($name)
    {
        $book = new Book($name);
        $this->assertSame($name, $book->getName());
    }

    public function bookNameProvider()
    {
        return [
            ['Good Experiences in My Life'],
            ['面白そうであまり面白くない本'],
        ];
    }
}
