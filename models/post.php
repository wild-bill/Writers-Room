<?php

/* This class looks like it was being used as a test class since I knew "Post" was working (since it was the original class this was all modeled on.
	This will eventually have to be deleted but I'll leave for now until doing a general clean up. */

  class Post {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $author;
    public $content;

    public function __construct($id, $author, $content) {
      $this->id      = $id;
      $this->author  = $author;
      $this->content = $content;
      $type = 'post';
    }


/* I'm thinking we use this same all() function to populate lists in pages, and have a switch to decide on which table to pull from */
    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM AllCharacters');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Post($post['id'], $post['author'], $post['content']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM AllCharacters WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Post($post['id'], $post['author'], $post['Friends']);
    }
    
    
    /* Do we want a "Post interface" with only the methods in it, then you can decide how to actually write them in
    	each type of post (table connection), but the files that accessed them could stay almost exactly the same? 
    	http://php.net/manual/en/language.oop5.interfaces.php
    	*/
    
    
    
    
  }
?>