<?php
    function load_backend_enqueue() {
        if(constant("IS_VIRTUAL_ENV")){ 
            $enqueueDev = 'virtual';
            wp_enqueue_script( $enqueueDev.'-backend', 'http://localhost:9000/virtual.backend.js', [], '', true );        
        } else {
            $enqueueProd = 'static';  
            wp_enqueue_style($enqueueProd.'-backend', get_stylesheet_directory_uri(). '/dist/css/backend.'.constant("enqueue-hash").'.css',[] ,null);
            wp_enqueue_script($enqueueProd.'-backend', get_template_directory_uri() . '/dist/js/backend.'.constant("enqueue-hash").'.js', [], null, true );  
        }
    }
    
    add_action('admin_enqueue_scripts', 'load_backend_enqueue');
