<?php

require __DIR__ . '/../vendor/autoload.php';

use DesignPatterns\Iterator\Book;
use DesignPatterns\Iterator\BookShelf;

$book_shelf = new BookShelf();
$book_shelf->appendBook(new Book('Around the World in 80 Days'));
$book_shelf->appendBook(new Book('Bible'));
$book_shelf->appendBook(new Book('Cinderella'));
$book_shelf->appendBook(new Book('Daddy-Long-Legs'));

// BookShelf クラスは \IteratorAggregate を実装しているので、foreachで回せる
foreach ($book_shelf as $book) {
    printf("%s\n", $book->getName());
}
