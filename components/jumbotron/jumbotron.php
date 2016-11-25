<?php $Jumbotron = new Jumbotron($options)?>
<div id="<?php echo $Jumbotron->id ?>" class="<?php echo $Jumbotron->type ?>">
	<?php $content = new WP_Query($options['query']);?>
	<?php if ($content->have_posts()): $content->the_post()?>
		<h1><?php echo (isset($options['title']) ? $options['title'] : get_the_title())?></h1>
		<p><?php echo (isset($options['excerpt']) ? $options['excerpt'] : get_the_excerpt())?></p>
		<?php if (!isset($options['hide_button'])):?>	
			<a href="<?php echo (isset($options['url']) ? $options['url'] : get_the_permalink())?>" class="btn <?php echo (isset($options['btn_class']) ? $options['btn_class'] : 'btn-default')?>"><?php echo (isset($options['button']) ? $options['button'] :  _e('Megnézem', 'the-theme'))?></a>
		<?php endif;?>
	<?php endif;?>
</div>