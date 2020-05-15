<?php

namespace DesignPatternsTest\Iterator;

use DesignPatterns\Iterator\Book;
use DesignPatterns\Iterator\BookShelf;
use DesignPatterns\Iterator\BookShelfIterator;
use Mockery;
use PHPUnit\Framework\TestCase;

class BookShelfIteratorTest extends TestCase
{
    public function testMethodsToOperateIndex()
    {
        /** @var BookShelf $book_shelf */
        $book_shelf = Mockery::mock(BookShelf::class);
        $iterator = new BookShelfIterator($book_shelf);

        $this->assertSame(0, $iterator->key());

        $iterator->next();
        $this->assertSame(1, $iterator->key());

        $iterator->next();
        $this->assertSame(2, $iterator->key());

        $iterator->rewind();
        $this->assertSame(0, $iterator->key());
    }

    public function testCurrent()
    {
        $book = Mockery::mock(Book::class);
        $book2 = Mockery::mock(Book::class);
        $book_shelf = Mockery::mock(BookShelf::class);
        $book_shelf->shouldReceive('getBookAt')->with(0)->andReturn($book);
        $book_shelf->shouldReceive('getBookAt')->with(1)->andReturn($book2);

        /** @var BookShelf $book_shelf */
        $iterator = new BookShelfIterator($book_shelf);
        $this->assertSame($iterator->current(), $book);

        $iterator->next();
        $this->assertSame($iterator->current(), $book2);
    }

    public function testValid()
    {
        $book_shelf = Mockery::mock(BookShelf::class);
        $book_shelf->shouldReceive('hasBookAt')->with(0)->andReturn(true);
        $book_shelf->shouldReceive('hasBookAt')->with(1)->andReturn(false);

        /** @var BookShelf $book_shelf */
        $iterator = new BookShelfIterator($book_shelf);
        $this->assertTrue($iterator->valid());

        $iterator->next();
        $this->assertFalse($iterator->valid());
    }
}
