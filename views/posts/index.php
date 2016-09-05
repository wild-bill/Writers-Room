<!-- comment out for now <p>Here is a list of all posts:</p> -->

<?php foreach($elements as $post) { ?>
			<?php	/*displays each $element, which is... from a controller?. Spits it out as a list on the web page */ ?>
 
			<ul>
				<div class="floating-box"><li>
    		<?php 
			//just added in by me as a test 8.28
			/* This tests for whether or not it uses a Title, or a Name. Characters, Settings use names. Episodes, Commercials(?) use titles. It's semantics, really. */
			if(isset($post->title)){
				echo $post->title;
			}
			else{
				echo $post->name;
			}
			//test stops here. 
			
			//echo $post->title; //commenting this out for testing
			
			
			?>
    		<a href='?controller=<?php echo $post->type; ?>s&action=show&id=<?php echo $post->id; ?>'>See content</a>
    		<img src="diner_picture.png" />
				</li></div>
			</ul>
  
<?php } ?>



