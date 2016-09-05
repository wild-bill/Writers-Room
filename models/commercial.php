<?php
  class Commercial {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $author;
    public $content;
    public $type;  //maybe make these private later

    public function __construct($id, $author, $content) {
      $this->id      = $id;
      $this->author  = $author;
      $this->content = $content;
      //declare type
      $this->type    = 'commercial';
      
    }


/* I'm thinking we use this same all() function to populate lists in pages, and have a switch to decide on which table to pull from */
    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM AllCommercials');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Commercial($post['id'], $post['author'], $post['content']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM AllCommercials WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Commercial($post['id'], $post['author'], $post['Friends']);
    }
    
    
    /* Do we want a "Post interface" with only the methods in it, then you can decide how to actually write them in
    	each type of post (table connection), but the files that accessed them could stay almost exactly the same? 
    	http://php.net/manual/en/language.oop5.interfaces.php
    	*/
    
    
    
    
  }
?>