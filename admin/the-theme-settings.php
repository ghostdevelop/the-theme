<?php 
// Check that the user is allowed to update options
if (!current_user_can('manage_options')) {
    wp_die('You do not have sufficient permissions to access this page.');
}

?>
<div class="wrap">
	<h2><?php _e('The Theme beállítások', 'the-theme')?></h2>
	<form method="post" action="options.php">
		<?php @settings_fields('the-theme-group'); ?>
		<?php @do_settings_fields('the-theme-group'); ?>		
		<table class="webcon_admin_table widefat">
			<tr>
				<th>Megjelenési beállítások</th>
			</tr>
			<tr valign="top">
				<td>
					<label for="header_text_2">Logo</label>
					<img src="<?php echo get_option('logo');?>" style="width:100px;" id="logo_img" />
					<div class="uploader">
						<input type="hidden" name="logo" id="logo_url" value="<?php echo get_option('logo');?>"/>
						<button id="logo_button" class="upload_button button" >Feltölt</button>
					</div>
				</td>				
			</tr>
		</table> 						
		<table class="webcon_admin_table widefat">
			<tr>
				<th>Közösségi média</th>
			</tr>
			<tr valign="top">
				<td>
					<label for="twitter">Twitter</label>
					<input type="text" name="twitter" value="<?php echo get_option('twitter');?>"/>
				</td>	
				<td>
					<label for="facebook">Facebook</label>
					<input type="text" name="facebook" value="<?php echo get_option('facebook');?>"/>
				</td>	
				<td>
					<label for="gplus">G+</label>
					<input type="text" name="gplus" value="<?php echo get_option('gplus');?>"/>
				</td>			
			</tr>
		</table> 
		<?php @submit_button(); ?>
	</form>
</div>
<?php wp_enqueue_media();	?>
<script>
jQuery(document).ready(function($){
                 
	var _custom_media = true,
	_orig_send_attachment = wp.media.editor.send.attachment;
 
	$('.upload_button').click(function(e) {
		var send_attachment_bkp = wp.media.editor.send.attachment;
		var button = $(this);
		var id = button.attr('id').replace('_button', '');
		_custom_media = true;
		wp.media.editor.send.attachment = function(props, attachment){
			if ( _custom_media ) {
				$('#logo_url').val(attachment.url);
				$("#logo_img").attr('src', attachment.url);
			} else {
				return _orig_send_attachment.apply( this, [props, attachment] );
			};
		}
 
		wp.media.editor.open(button);
		return false;
	});
 
	$('.add_media').on('click', function(){
		_custom_media = false;
	});
});
</script>