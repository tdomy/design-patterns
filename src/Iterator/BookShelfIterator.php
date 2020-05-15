<?php

namespace DesignPatterns\Iterator;

class BookShelfIterator implements \Iterator
{
    private BookShelf $book_shelf;
    private int $index;

    /**
     * @param  BookShelf $book_shelf
     */
    public function __construct(BookShelf $book_shelf)
    {
        $this->book_shelf = $book_shelf;
        $this->index = 0;
    }

    /**
     * 現在の要素を返す
     *
     * @return Book
     */
    public function current(): Book
    {
        return $this->book_shelf->getBookAt($this->index);
    }

    /**
     * 現在の要素のキーを返す
     *
     * @return int
     */
    public function key(): int
    {
        return $this->index;
    }

    /**
     * 次の要素に進む
     *
     * @return void
     */
    public function next(): void
    {
        ++$this->index;
    }

    /**
     * 最初の要素に巻き戻す
     *
     * @return void
     */
    public function rewind(): void
    {
        $this->index = 0;
    }

    /**
     * 現在位置が有効かどうか調べる
     *
     * @return bool
     */
    public function valid(): bool
    {
        return $this->book_shelf->hasBookAt($this->index);
    }
}
