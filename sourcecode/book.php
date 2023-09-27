class Book {
    private $title;
    private $author;
    private $isbn;
    private $genre;
    private $publicationYear;
    private $quantity;
    private $availableQuantity;

    public function __construct($title, $author, $isbn, $genre, $publicationYear, $quantity) {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->genre = $genre;
        $this->publicationYear = $publicationYear;
        $this->quantity = $quantity;
        $this->availableQuantity = $quantity;
    }

    public function checkAvailability() {
        return $this->availableQuantity > 0;
    }

    public function borrow() {
        if ($this->availableQuantity > 0) {
            $this->availableQuantity--;
            return true;
        } else {
            return false;
        }
    }

    public function returnBook() {
        if ($this->availableQuantity < $this->quantity) {
            $this->availableQuantity++;
            return true;
        } else {
            return false;
        }
    }
}

