<?php

if(!function_exists('floating_sidebar')){
    function floating_sidebar( $atts, $content = null ) {
       return '<div class="floating-sidebar">
                    <ul class"floating-sidebar__list">
                    '.do_shortcode($content).'
                    </ul>
                </div>';
    }
    add_shortcode('floating_sidebar', 'floating_sidebar');
}

if(!function_exists('floating_sidebar_link')) {
	function floating_sidebar_link( $atts, $content =  null) {
		extract(shortcode_atts(array(
			'link_name' => 'Anchor Link',
			'paragraph_id' => ''
		), $atts));        
        
        $output = '<li class="floating-sidebar__item"><a href="#' . $paragraph_id . '" class="floating-sidebar__link">' . $link_name . '</a></li>'; 
        
        return $output;
	}
	add_shortcode('floating_sidebar_link', 'floating_sidebar_link');		
}




// Mapping 
vc_map( array(
    "name" => __("Floating Sidebar", "floater"),
    "base" => "floating_sidebar",
    "as_parent" => array('only' => 'floating_sidebar_link'),
    "content_element" => true,
    "show_settings_on_create" => true,
    "is_container" => true,
    "js_view" => 'VcColumnView',
    "category" =>array('My Custom Elements', 'Content')
) );

vc_map( array(
    "name" => __("Floating Sidebar Link", "floater"),
    "base" => "floating_sidebar_link",
    "content_element" => true,
    "as_child" => array('only' => 'floating_sidebar'),
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Link Name", "floater"),
            "param_name" => "link_name"
        ), 
        array(
            "type" => "textfield",
            "heading" => __("Paragraph ID", "floater"),
            "param_name" => "paragraph_id"
        )
    ),
    ) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Floating_Sidebar extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Floating_Sidebar_Link extends WPBakeryShortCode {
    }
}

?>
