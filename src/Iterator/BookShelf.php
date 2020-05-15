<?php

namespace DesignPatterns\Iterator;

class BookShelf implements \IteratorAggregate
{
    /**
     * @var Book[] $books
     */
    private array $books = [];

    /**
     * @param  int $index
     * @return Book|null
     */
    public function getBookAt(int $index): ?Book
    {
        if ($this->hasBookAt($index) !== true) {
            return null;
        }
        return $this->books[$index];
    }

    /**
     * @param  int $index
     * @return bool
     */
    public function hasBookAt(int $index): bool
    {
        return isset($this->books[$index]);
    }

    /**
     * @param  Book $book
     * @return void
     */
    public function appendBook(Book $book): void
    {
        $this->books[] = $book;
    }

    /**
     * @return BookShelfIterator
     */
    public function getIterator(): \Iterator
    {
        // 実際は \ArrayIterator を使った方が良い
        // return new \ArrayIterator($this->books);
        return new BookShelfIterator($this);
    }
}
