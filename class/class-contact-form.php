<?php 
	if(!class_exists('ClassConctactForm')) {
	
	    class ClassConctactForm {
	    
		    public static function load(){
				add_action( 'wpcf7_init', array( 'ClassConctactForm', 'remove_submit' ), 50);
				add_action( 'wpcf7_init', array( 'ClassConctactForm', 'add_submit' ), 100);
		    }    	    
			
			static function add_submit() {
				wpcf7_add_form_tag( 'submit', array( 'ClassConctactForm', 'submit_tag_handler' ));
			}
		    
			static function remove_submit() {
				wpcf7_remove_form_tag( 'submit' );
				
			}
			
			static function submit_tag_handler( $tag ) {
				$tag = new WPCF7_FormTag( $tag );
			
				$class = wpcf7_form_controls_class( $tag->type );
			
				$atts = array();
			
				$atts['class'] = $tag->get_class_option( $class );
				$atts['id'] = $tag->get_id_option();
				$atts['tabindex'] = $tag->get_option( 'tabindex', 'int', true );
			
				$value = isset( $tag->values[0] ) ? $tag->values[0] : '';
			
				if ( empty( $value ) ) {
					$value = __( 'Send', 'contact-form-7' );
				}
			
				$atts['type'] = 'submit';
			
				$atts = wpcf7_format_atts( $atts );
			
				$html = sprintf( '<button %1$s> %2$s</button>', $atts, $value );
			
				return $html;
			}
			
	    }
	    
	}
	
	ClassConctactForm::load();

