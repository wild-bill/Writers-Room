<?php
  class Character {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $author;
    public $content;
	public $type;  //maybe make these private later
	
	public $name;
	public $nicknames;
	public $address;
	public $appearance;
	public $description;
	public $friends; //should this be an array?
	public $enemies; //should this be an array?
	public $neutral; //should this be an array?
	public $episodes_involved_in;
	public $voice;
	
	
    public function __construct($id, $name) {
      $this->id      = $id;
      $this->name  = $name;
	  //think we want to add the rest of the vars here so we can choose to use them later
  
      //declare type
      $this->type    = 'character';
    }



/* I'm thinking we use this same all() function to populate lists in pages, and have a switch to decide on which table to pull from */
    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM AllCharacters');

      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
        $list[] = new Character($post['id'], $post['Name']); //case sensitive here
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

      return new Character($post['id'], $post['Name'], $post['Voice']);  //leaving voice in here as a test
    }
    
    
    /* Do we want a "Post interface" with only the methods in it, then you can decide how to actually write them in
    	each type of post (table connection), but the files that accessed them could stay almost exactly the same? 
    	http://php.net/manual/en/language.oop5.interfaces.php
		
		When I say interface here I mean like an implentable interface like OOP. So interface from technical standpoint, not as a general term. 
    	*/
    
    
    
    
  }
?>