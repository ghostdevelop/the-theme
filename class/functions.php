<?php
	function load_component($options = array()){
		$component = '/components/' . $options['type'] . '/' . $options['type'] . '.php';
		
		include(locate_template( $component, false, false ));		
	}