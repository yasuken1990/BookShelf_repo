<?php

namespace Mitsubachi\BookShelf;

class BookShelf
{
    /**
     * Bookオブジェクトの配列
     *
     * @var array
     */
    private $books;

    /**
     * BookShelf constructor.
     *
     * @param array $books
     */
    public function __construct($books)
    {
        $this->books = $books;
    }

    /**
     * 蔵書を検索し、条件に一致するBookオブジェクトの配列を返す
     * 
     * @param array $conditions
     * @return array
     */
    public function search($conditions)
    {
        $hits = [];
        foreach ($this->books as $book) {
            if (isset($conditions['isbn'])) {
                if ($conditions['isbn'] === $book->getIsbn()) {
                    $hits[] = $book; 
                }
            }

            if (isset($conditions['title'])) {
                if (strpos($book->getTitle(), $conditions['title']) !== false) {
                   $hits[] = $book;
                }
            }
            if (isset($conditions['author'])) {
                if (strpos($book->getAuthor(), $conditions['author']) !== false) {
                    $hits[] = $book;
                }
            }
        }
        return $hits;
    }

}
