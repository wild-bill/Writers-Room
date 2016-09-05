<?php

	/* This is the Episode class. It reaches out to the database and creates an Episode object based on what is in the table. There
		is more to it than that but that is what I'll write for now.
		
		8.27 - I made some changes because I am using CombinedKey as the name of the key in the database, whereas in most of the code that variable is referred to as "id". This lets me get away with it,
			however I have to wonder about application wide issues. Is it as easy as changing all of the models to reflect the correct name, or is it going to mess up the view/not let me use a consistent view/
			require one view per model or whatever. 
	
	*/

  class Episode {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    //public $id;
    //public $author;
    //public $content;
	//public $type;  //these are different now with a new table loaded
	
	public $id;
	public $combined_key;  //decided to take this out and just stick with ID for consistency and because I don't feel like "fighting" with php   8.28
	public $season;
	public $episode;
	public $title;
	public $description;
	public $wordpress_description;
	public $notes;
	public $characters;
	public $settings;
	public $commercials;
	public $script;
	public $length;
	public $date;
	public $artwork;

    public function __construct($id, $title, $description) {
      //$this->combined_key = $combined_key;
	  $this->id = $id;  //trying this way instead so that "id" can stay consistent.
      $this->title  = $title;
      $this->description = $description;
      //declare type
      $this->type    = 'episode';
    }



/* I'm thinking we use this same all() function to populate lists in pages, and have a switch to decide on which table to pull from */
    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM AllEpisodes');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Episode($post['id'], $post['Title'], $post['Description']); //maybe we want to use something other than "id"...I have to see where this is going to be displayed
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      //$id = intval($id); - the key is no longer an int
      // /$req = $db->prepare('SELECT * FROM AllEpisodes WHERE id = :id');
	  $req = $db->prepare('SELECT * FROM AllEpisodes WHERE id = :id');  //trying this one out
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));   // 8.27 changed this around...think there is an issue lying here but not 100% what it is
      $post = $req->fetch();

      return new Episode($post['id'], $post['Title'], $post['Description']);
    }
    
    
    /* Do we want a "Post interface" with only the methods in it, then you can decide how to actually write them in
    	each type of post (table connection), but the files that accessed them could stay almost exactly the same? 
    	http://php.net/manual/en/language.oop5.interfaces.php
    	*/
    
    
    
    
  }
?>