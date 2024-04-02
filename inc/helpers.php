<?php

if (!function_exists(('tn_get_template_part'))) {
    function tn_get_template_part($file, $args = []) {        
        extract($args, EXTR_SKIP );
        
        if(file_exists($file)) {
            ob_start();
            include( $file );
            $html = ob_get_clean();
            echo $html;
        }
    }
}