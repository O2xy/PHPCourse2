<?php
class Article {
    public $id;
    public $title;
    public $content;
    public $author;

   /* const TYPE_BLOG = 'blog';
    const TYPE_NEWS = 'news';

    public static $types = [
        self::TYPE_BLOG,
        self::TYPE_NEWS
    ];

    public static function addType(string $type) {
        self::$types[] = $type;
    }
*/
    public function display() {
        $this->displayTitle();
        $this->displayContent();
    }

    protected function displayTitle() {
        echo "<h1>{$this->title}</h1>";
    }

    private function displayContent() {
        echo "<p>{$this->content}</p>";
    }

    public function __construct($id, $title, $content, $author)
    {
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
    }


}

class News extends Article {
    public $date;

    public function __construct($id, $title, $content, $author, $date)
    {
        parent::__construct($id, $title, $content, $author);
        $this->date = $date;
    }

    public function displayDate() {
        echo "<p>{$this->date}</p>";
    }

    public function display()
    {
        parent::display();
        $this->displayDate();
    }
}


$article = new Article(1, 'article 1', 'gkljhkldfjkldjkldgj', 'Vasya Pupkin');
$article->display();

$article2 = new News(2,'article 2','123212121321312213','Petya Vasechkin', date("Y-m-d"));
$article2->display();


