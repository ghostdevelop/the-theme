jQuery(document).ready(function($){
    var custom_uploader;
    $('#upload_image_button').click(function(e) { 
        e.preventDefault();
        //If the uploader object has already been created, reopen the dialog
        if (custom_uploader) {
            custom_uploader.open();
            return;
        }
 
        //Extend the wp.media object
        custom_uploader = wp.media.frames.file_frame = wp.media({
            title: 'Kép kiválasztása',
            button: {
                text: 'Kép kiválasztása'
            },
            multiple: true
        });
 
        //When a file is selected, grab the URL and set it as the text field's value
        custom_uploader.on('select', function() {
            attachment = custom_uploader.state().get('selection').toJSON();
            //alert(attachment.url);
            $('#up_image').attr("src", attachment.url);
           // $('#upload_image').val(attachment.url);
           
			var data = {
				'action'	:	'upload_image',
				'attachment':	attachment,
				'id'		:	$('#post_id').val()
			};
			       		
			jQuery.ajax({
				type : "post",
				url : ajaxurl,
				data : data,
				beforeSend : function(){
				},
				success: function(response) {
					//console.log(response);
					$('#gallery .clear').before(response);
					
				}
			})  		        
        });
        //Open the uploader dialog
        custom_uploader.open(); 
    });
    
	$('.image_delete').live( "click", function() {
		var id = $(this).attr('data-id');			
		var imgid = $(this).attr('data-imgid');			
							
		var data = {
			'action'	:	'remove_image',
			'id'		:	id,
			'imgid'		:	imgid,
		};
	
		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
	  jQuery.ajax({
	     type : "post",
	     url : ajaxurl,
	     data : data,
	     beforeSend : function(){

	     },
	     success: function(response) {
	     	//console.log(response);
	     	$('#gallery').html(response);
	     }
	  })  		
		
	});
    

});
