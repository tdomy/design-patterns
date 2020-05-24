<?php

namespace DesignPatternsTest\Iterator;

use DesignPatterns\Iterator\Book;
use DesignPatterns\Iterator\BookShelf;
use DesignPatternsTest\TestCase;
use Mockery;
use ReflectionClass;

class BookShelfTest extends TestCase
{
    public function testAppendBook()
    {
        $book_shelf = new BookShelf();
        $reflection = new ReflectionClass($book_shelf);
        $property = $reflection->getProperty('books');
        $property->setAccessible(true);

        $this->assertEmpty($property->getValue($book_shelf));

        /** @var Book $book */
        $book = Mockery::mock(Book::class);
        $book_shelf->appendBook($book);

        /** @var Book $book2 */
        $book2 = Mockery::mock(Book::class);
        $book_shelf->appendBook($book2);

        $books = $property->getValue($book_shelf);
        $this->assertCount(2, $property->getValue($book_shelf));
        $this->assertSame($book, $books[0]);
        $this->assertSame($book2, $books[1]);
    }

    public function testGetBookAt()
    {
        /** @var Book $book */
        $book = Mockery::mock(Book::class);
        /** @var Book $book */
        $book2 = Mockery::mock(Book::class);

        $book_shelf = $this->createTestInstance([$book, $book2]);

        $this->assertSame($book, $book_shelf->getBookAt(0));
        $this->assertSame($book2, $book_shelf->getBookAt(1));
        $this->assertNull($book_shelf->getBookAt(2));
    }

    public function testHasBookAt()
    {
        /** @var Book $book */
        $book = Mockery::mock(Book::class);
        /** @var Book $book */
        $book2 = Mockery::mock(Book::class);

        $book_shelf = $this->createTestInstance([$book, $book2]);

        $this->assertTrue($book_shelf->hasBookAt(0));
        $this->assertTrue($book_shelf->hasBookAt(1));
        $this->assertFalse($book_shelf->hasBookAt(2));
    }

    public function testGetIterator()
    {
        $book_shelf = new BookShelf();
        $this->assertInstanceOf(\Iterator::class, $book_shelf->getIterator());
    }

    private function createTestInstance(array $books): BookShelf
    {
        $book_shelf = new BookShelf();
        foreach ($books as $book) {
            $book_shelf->appendBook($book);
        }

        return $book_shelf;
    }
}
