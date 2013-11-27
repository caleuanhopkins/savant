<?php require_once('_inc/header.php'); ?>
	<form action="<?php echo $this->base->url.'/posts.php?action=update'; ?>" class="row" method="POST">
		<section class="span7">
			<input type="hidden" name="post[id]" value="<?php echo (!empty($post[0]['id'])? $post[0]['id']: '') ;?>" />
			<h3><?php echo (!empty($post[0]['title'])? 'Edit '.$post[0]['title']: 'New Posts') ;?></h3>
			<div class="control-group">
		    	<label class="control-label" for="content">Title</label>
		    	<div class="controls">
		    		<input type="text" name="post[title]" id="title" placeholder="Your Post Title" <?php echo (!empty($post[0]['title'])? 'value="'.$post[0]['title'].'"': '') ;?> />
		    	</div>
		    </div>
		    <div class="control-group">
		    	<label class="control-label" for="content">Post Img</label>
		    	<div class="controls">
		    		<input type="text" name="post[fimg]" id="img" placeholder="URL for post image" <?php echo (!empty($post[0]['fimg'])? 'value="'.$post[0]['fimg'].'"': '') ;?> />
		    	</div>
		    </div>
		    <div class="control-group">
		    	<label class="control-label" for="wmd-input">Content</label>
			    <div class="wmd-panel controls">
				     <div id="wmd-button-bar"></div>
				     <textarea class="wmd-input" name="post[content]" id="wmd-input"><?php echo (!empty($post[0]['content'])?$post[0]['content']: '*Start Typing Here*') ;?></textarea>
				</div>
		    </div>
		    <div class="control-group">
		    	<div class="controls">
		    		<button type="submit" class="btn">Save Post</button>
		    	</div>
		    </div>
		</section>
		<section class="span4" style="padding-left:20px; border-left:1px solid #eee;">
	    	<div id="wmd-preview" class="wmd-panel wmd-preview"></div>
	    </section>
	</form>
<?php require_once('_inc/footer.php'); ?>