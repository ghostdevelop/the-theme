<?php $SingleContent = new SingleContent($options)?>
<div id="<?php echo $SingleContent->id?>" class="<?php echo $SingleContent->type?>">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<h1><?php the_title()?></h1>
		<hr>
		<div class="entry-content">
			<?php the_content()?>
		</div>
	</div>
</div>