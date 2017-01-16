<?php $SingleContent = new SingleContent($options)?>
<div id="<?php echo $SingleContent->id?>" class="<?php echo $SingleContent->type?>">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="title-holder">
			<h1 class="single-title"><?php the_title()?></h1>
			<hr>
		</div>
		<div class="entry-content">
			<?php the_content()?>
		</div>
	</div>
</div>