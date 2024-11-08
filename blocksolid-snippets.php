<?php

/*
Plugin Name: Blocksolid Snippets
Plugin URI: https://www.peripatus.uk/blocksolid-snippets
Description: Snippets of code are contained in a custom post type that can then be called via a Gutenberg block or a simple shortcode
Version: 1.1.3
Author: Peripatus Web Design
Author URI: https://www.peripatus.uk
License: GPLv2 or later
Text Domain: blocksolid-snippets
*/

// ---------------------------------------------------------------------------------------------------------------------------------------------

function blocksolid_snippets_admin_styles() {
	wp_enqueue_style( 'blocksolid-snippets-admin-styles', plugins_url( '/css/blocksolid-snippets-admin-styles.css', __FILE__ ), '', filemtime(plugin_dir_path(__FILE__).'css/blocksolid-snippets-admin-styles.css'));
}
//add_action('admin_enqueue_scripts', 'blocksolid_snippets_admin_styles');
if(is_admin()){
	add_action('enqueue_block_assets', 'blocksolid_snippets_admin_styles');
}

// ---------------------------------------------------------------------------------------------------------------------------------------------

function blocksolid_snippets_create_snippet_post_type(){

	function blocksolid_snippets_create_snippets() {

	  $menu_icon = '<?xml version="1.0" encoding="UTF-8"?><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1000pt" height="1000pt" viewBox="0 0 1000 1000" version="1.1"><g id="surface1"><path style=" stroke:none;fill-rule:nonzero;fill:rgb(19.993591%,19.993591%,19.993591%);fill-opacity:1;" d="M 773.816406 785.039063 C 759.34375 799.472656 737.726563 802.65625 718.246094 799.691406 C 694.851563 796.132813 673.195313 784.222656 656.09375 768.097656 C 639.035156 752.019531 625.882813 731.359375 620.472656 708.414063 C 615.925781 689.117188 616.847656 666.839844 629.398438 650.574219 C 641.921875 634.355469 662.757813 628.867188 682.449219 630.402344 C 706.039063 632.238281 728.472656 643.0625 746.328125 658.296875 C 764.070313 673.429688 778.175781 693.265625 785.078125 715.648438 C 791.003906 734.847656 791.960938 757.449219 781.386719 775.289063 C 779.28125 778.839844 776.738281 782.121094 773.816406 785.039063 Z M 499.203125 568.59375 C 481.242188 568.59375 464.015625 560.011719 453.148438 545.714844 C 442.128906 531.210938 438.574219 511.882813 443.671875 494.394531 C 448.625 477.40625 461.472656 463.296875 477.917969 456.773438 C 494.851563 450.058594 514.472656 451.855469 529.894531 461.542969 C 544.992188 471.027344 555.085938 487.320313 556.777344 505.078125 C 558.496094 523.097656 551.570313 541.207031 538.214844 553.433594 C 527.617188 563.136719 513.574219 568.59375 499.203125 568.59375 Z M 372.019531 726.234375 C 362.914063 747.390625 347.519531 765.796875 328.855469 779.214844 C 310.242188 792.59375 287.261719 801.480469 264.097656 800.675781 C 254.949219 800.359375 245.761719 798.453125 237.539063 794.339844 C 227.910156 789.515625 220.054688 781.679688 215.238281 772.039063 C 205.886719 753.304688 207.9375 730.550781 214.742188 711.375 C 222.535156 689.425781 237.175781 670.121094 255.304688 655.632813 C 273.609375 641 296.484375 630.867188 320.132813 630.175781 C 329.109375 629.914063 338.226563 631.078125 346.660156 634.253906 C 356.65625 638.019531 365.367188 644.75 371.230469 653.714844 C 382.527344 670.988281 382.234375 693.496094 376.820313 712.710938 C 375.523438 717.320313 373.910156 721.839844 372.019531 726.234375 Z M 802.222656 617.125 C 786.433594 601.371094 768.042969 588.203125 747.875 578.652344 C 729.261719 569.839844 709.117188 564.105469 688.566406 562.398438 C 676.859375 561.425781 665 561.867188 653.261719 561.867188 C 652.550781 561.867188 652.550781 561.84375 652.0625 561.355469 C 651.183594 560.476563 650.304688 559.597656 649.429688 558.71875 C 646.015625 555.300781 642.605469 551.882813 639.191406 548.464844 C 630.21875 539.476563 621.242188 530.488281 612.265625 521.496094 C 609.257813 518.484375 606.246094 515.46875 603.238281 512.457031 C 602.660156 511.878906 602.085938 511.300781 601.511719 510.726563 C 601.402344 510.617188 601.546875 510.5625 601.644531 510.46875 C 603.875 508.230469 606.105469 505.996094 608.335938 503.761719 C 613.273438 498.816406 618.214844 493.871094 623.152344 488.921875 C 630.15625 481.90625 637.160156 474.890625 644.167969 467.871094 C 652.601563 459.425781 661.035156 450.980469 669.46875 442.53125 C 678.6875 433.296875 687.910156 424.058594 697.132813 414.820313 C 706.5 405.4375 715.871094 396.050781 725.242188 386.664063 C 734.121094 377.773438 743 368.878906 751.878906 359.984375 C 759.628906 352.222656 767.378906 344.460938 775.125 336.699219 C 781.105469 330.710938 787.085938 324.722656 793.0625 318.734375 C 796.632813 315.15625 800.203125 311.582031 803.769531 308.007813 C 808.644531 303.125 813.28125 298.054688 817.371094 292.480469 C 827.730469 278.359375 834.960938 262.078125 839.289063 245.144531 C 843.726563 227.808594 845.183594 209.710938 843.78125 191.875 C 842.386719 174.199219 838.160156 156.671875 830.835938 140.503906 C 827.253906 132.59375 822.921875 125.015625 817.828125 117.976563 C 815.300781 114.484375 812.585938 111.128906 809.691406 107.933594 C 809.308594 107.511719 806.070313 103.875 805.875 104.070313 C 804.4375 105.496094 803.003906 106.917969 801.570313 108.339844 C 798.128906 111.753906 794.6875 115.167969 791.246094 118.578125 C 786.089844 123.695313 780.929688 128.8125 775.769531 133.929688 C 769.183594 140.464844 762.59375 146.996094 756.007813 153.53125 C 748.277344 161.199219 740.550781 168.863281 732.820313 176.53125 C 724.238281 185.042969 715.65625 193.554688 707.074219 202.066406 C 697.929688 211.136719 688.78125 220.210938 679.636719 229.28125 C 670.214844 238.625 660.792969 247.972656 651.371094 257.316406 C 641.960938 266.648438 632.550781 275.984375 623.140625 285.316406 C 614.03125 294.351563 604.921875 303.386719 595.8125 312.421875 C 587.289063 320.871094 578.769531 329.324219 570.25 337.773438 C 562.605469 345.355469 554.964844 352.9375 547.320313 360.519531 C 540.84375 366.941406 534.363281 373.367188 527.886719 379.792969 C 522.863281 384.777344 517.839844 389.757813 512.816406 394.742188 C 509.535156 397.996094 506.253906 401.25 502.972656 404.507813 C 501.71875 405.746094 500.46875 406.988281 499.21875 408.230469 C 499.1875 408.257813 496.390625 405.449219 496.230469 405.289063 C 493.175781 402.261719 490.121094 399.230469 487.070313 396.203125 C 482.238281 391.414063 477.410156 386.621094 472.578125 381.832031 C 466.261719 375.566406 459.941406 369.296875 453.621094 363.03125 C 446.105469 355.574219 438.585938 348.117188 431.066406 340.660156 C 422.636719 332.296875 414.203125 323.9375 405.773438 315.574219 C 396.722656 306.59375 387.664063 297.613281 378.613281 288.632813 C 369.222656 279.320313 359.832031 270.007813 350.445313 260.695313 C 341.007813 251.335938 331.570313 241.976563 322.136719 232.617188 C 312.941406 223.5 303.746094 214.378906 294.550781 205.261719 C 285.886719 196.664063 277.222656 188.070313 268.554688 179.476563 C 260.710938 171.695313 252.863281 163.910156 245.015625 156.128906 C 238.277344 149.445313 231.535156 142.757813 224.796875 136.074219 C 219.449219 130.773438 214.105469 125.46875 208.757813 120.167969 C 205.097656 116.535156 201.433594 112.902344 197.769531 109.269531 C 196.082031 107.59375 194.390625 105.917969 192.699219 104.238281 C 192.617188 104.160156 192.535156 104.078125 192.457031 104 C 192.277344 103.824219 184.980469 112.253906 184.34375 113.042969 C 178.910156 119.785156 174.222656 127.121094 170.292969 134.839844 C 162.253906 150.605469 157.335938 167.902344 155.257813 185.457031 C 153.152344 203.238281 153.929688 221.394531 157.65625 238.910156 C 161.300781 256.066406 167.820313 272.699219 177.480469 287.371094 C 182.246094 294.609375 187.8125 301.175781 193.921875 307.296875 C 197.160156 310.539063 200.398438 313.78125 203.636719 317.023438 C 209.359375 322.757813 215.082031 328.492188 220.808594 334.222656 C 228.378906 341.804688 235.945313 349.386719 243.515625 356.972656 C 252.296875 365.761719 261.070313 374.554688 269.847656 383.34375 C 279.195313 392.703125 288.539063 402.066406 297.882813 411.425781 C 307.15625 420.714844 316.429688 430 325.703125 439.289063 C 334.265625 447.863281 342.824219 456.4375 351.386719 465.015625 C 358.597656 472.234375 365.808594 479.457031 373.019531 486.679688 C 378.238281 491.910156 383.460938 497.136719 388.679688 502.363281 C 391.269531 504.960938 393.859375 507.554688 396.449219 510.148438 C 397.078125 510.777344 396.953125 510.65625 396.277344 511.335938 C 393.796875 513.820313 391.316406 516.304688 388.835938 518.789063 C 379.996094 527.640625 371.160156 536.496094 362.324219 545.347656 C 356.832031 550.847656 351.339844 556.347656 345.851563 561.847656 C 345.742188 561.953125 345.207031 561.867188 345.066406 561.867188 C 344.097656 561.867188 343.125 561.867188 342.15625 561.867188 C 339.066406 561.867188 335.980469 561.867188 332.890625 561.867188 C 327.578125 561.867188 322.253906 561.773438 316.945313 561.972656 C 296.515625 562.726563 276.320313 567.554688 257.523438 575.515625 C 237.179688 584.132813 218.453125 596.414063 202.203125 611.355469 C 186.992188 625.339844 173.890625 641.640625 163.71875 659.632813 C 154.394531 676.128906 147.53125 694.058594 143.847656 712.664063 C 140.402344 730.074219 139.753906 748.089844 142.550781 765.640625 C 145.230469 782.496094 151.136719 798.835938 160.304688 813.261719 C 170.644531 829.527344 185 843.125 201.785156 852.601563 C 220.308594 863.058594 241.421875 868.332031 262.621094 868.9375 C 282.96875 869.519531 303.339844 865.898438 322.46875 859.03125 C 342.988281 851.664063 362.109375 840.5625 378.929688 826.714844 C 396.148438 812.535156 411.0625 795.496094 422.648438 776.429688 C 433.335938 758.847656 441.199219 739.496094 445.335938 719.324219 C 447.289063 709.785156 448.40625 700.070313 448.582031 690.332031 C 448.664063 685.582031 448.523438 680.828125 448.148438 676.089844 C 447.960938 673.746094 447.71875 671.410156 447.414063 669.078125 C 447.269531 667.964844 447.109375 666.855469 446.9375 665.746094 C 446.890625 665.449219 446.839844 665.523438 446.964844 665.398438 C 452.613281 659.738281 458.261719 654.082031 463.910156 648.425781 C 472.773438 639.550781 481.632813 630.675781 490.496094 621.800781 C 493.398438 618.890625 496.300781 615.984375 499.207031 613.078125 C 504.351563 618.230469 509.492188 623.382813 514.636719 628.535156 C 523.578125 637.496094 532.519531 646.453125 541.464844 655.410156 C 544.316406 658.265625 547.167969 661.125 550.019531 663.980469 C 550.507813 664.472656 550.996094 664.960938 551.484375 665.449219 C 551.636719 665.601563 551.289063 666.886719 551.253906 667.132813 C 551.078125 668.339844 550.917969 669.546875 550.777344 670.753906 C 550.5 673.09375 550.28125 675.4375 550.125 677.785156 C 548.804688 697.285156 551.46875 716.964844 557.257813 735.605469 C 563.496094 755.703125 573.355469 774.621094 585.910156 791.488281 C 599.355469 809.5625 615.894531 825.390625 634.570313 837.984375 C 652.234375 849.894531 671.898438 858.921875 692.582031 864.09375 C 712.515625 869.082031 733.441406 870.480469 753.78125 867.289063 C 774.640625 864.023438 794.675781 855.8125 811.339844 842.769531 C 825.621094 831.589844 837.191406 817.125 845.015625 800.769531 C 852.4375 785.261719 856.464844 768.257813 857.386719 751.117188 C 858.363281 733.070313 855.949219 714.90625 850.839844 697.589844 C 845.367188 679.035156 836.796875 661.4375 825.859375 645.492188 C 818.886719 635.328125 810.945313 625.832031 802.222656 617.125 "/></g></svg>';

	  $labels = array(
	    'name' => _x('Snippets', 'post type general name'),
	    'singular_name' => _x('Snippet', 'post type singular name'),
	    'add_new' => _x('Add New', 'Snippet'),
	    'add_new_item' => __('Add New Snippet'),
	    'edit_item' => __('Edit Snippet'),
	    'new_item' => __('New Snippet'),
	    'view_item' => __('View Snippets'),
	    'search_items' => __('Search Snippets'),
	    'not_found' =>  __('No snippets found'),
	    'not_found_in_trash' => __('No snippets found in Trash'),
	    'parent_item_colon' => ''
	  );

	  // https://github.com/WordPress/gutenberg/issues/53511 - "When does the Block Editor get iFramed?" - added "custom-fields" to Snippets to allow use of Options > Preferences > Panels > Custom fields switch.  This is required to stop in-iframe editing which in turn allows a non modal popup classic editor panel

	  $supports = array('title','editor','revisions','thumbnail','author','page-attributes','custom-fields');

	  register_post_type( 'snippet',
	    array(
			'labels' => $labels,
			'public' => true,
			"menu_icon" => 'data:image/svg+xml;base64,'.base64_encode( $menu_icon ),
			'supports' => $supports,
			'show_in_nav_menus'     => false,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => true,
			'hierarchical' => false,
			'rewrite' => array('slug' => 'snippet', 'with_front' => true), //Prefix with "snippets" in permalink
			'map_meta_cap'        => true,
			'show_in_rest' => true, // Blocks support
	    )
	  );
	}

	add_action( 'init', 'blocksolid_snippets_create_snippets', 0 );

}

blocksolid_snippets_create_snippet_post_type();

// ---------------------------------------------------------------------------------------------------------------------------------------------

// Gutenberg block

add_action('init', function() {

	if (blocksolid_snippets_get_admin_post_type()!='snippet'){
		// Skip block registration if Gutenberg is not enabled/merged.
		if (!function_exists('register_block_type')) {
			return;
		}

		wp_register_script( 'blocksolid-snippets-js', plugins_url( '/gutenberg/blocksolid-snippets.js', __FILE__ ), array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), '1.0', false );
		register_block_type('pwd/snippets', array(
				'editor_script' => 'blocksolid-snippets-js',
				'render_callback' => 'blocksolid_snippets_block_handler',
				'attributes' => [
					'snippet_title' => [
						'type' => 'string',
						'default' => ''
					]
				]
		));

	}else{
		return;
	}

});

// ---------------------------------------------------------------------------------------------------------------------------------------------

/**
 * Handler for post title block
 * @param $atts
 *
 * @return string
 */
function blocksolid_snippets_block_handler($atts){

	$snippet_render = blocksolid_snippet($atts[ 'snippet_title' ], true, 'snippet', true, false);
	return $snippet_render;

}

// ---------------------------------------------------------------------------------------------------------------------------------------------

function blocksolid_snippet_by_title_with_feedback($page_title, $format, $post_type){

	if ($page_title != ""){

        $posts = get_posts(
        	array(
        		'post_type'              => $post_type,
        		'title'                  => $page_title,
        		'post_status'            => 'publish',
        		'numberposts'            => 1,
        		'update_post_term_cache' => false,
        		'update_post_meta_cache' => false,
        		'orderby'                => 'post_date ID',
        		'order'                  => 'ASC',
        	)
        );

        if ( ! empty( $posts ) ) {
        	$post = $posts[0];
        } else {
        	$post = null;
        }

	    if ($post){
	        return ($post);
	    }else{
	        return false;
	    }
	}else{
        return false;
	}

}

function blocksolid_snippet($post_title,$preserve_formatting,$post_type,$is_admin,$site){ // Returns HTML

	$the_post_to_find = blocksolid_snippet_by_title_with_feedback($post_title, OBJECT, $post_type);

    if (is_object($the_post_to_find)){

    	$the_post_content_id = $the_post_to_find->ID;

    	if ($the_post_content_id){

    		$status = get_post_status($the_post_to_find);

    		if ( 'publish' !== $status ){
    	    	return; // do not show unpublished posts
    		}

    		if ($preserve_formatting){
				//WPBMap::addAllMappedShortcodes();
	    		if ($is_admin){
	    			$the_post_content = apply_filters('the_content', $the_post_to_find->post_content ); //Formatting retained
				}else{
					return do_shortcode(do_blocks($the_post_to_find->post_content));
				}

    		}else{
    			$the_post_content = apply_filters('single_post_title', $the_post_to_find->post_content ); //Formatting removed
    		}

    	}else{
    		$the_post_content = $post_title." Not Found!";
    	}

    }else{
    	return false;
    }

	return($the_post_content);
}

function blocksolid_snippet_via_shortcode($atts = array(), $content = null){ // - http://wordpress.stackexchange.com/questions/84450/
	$post_title 	= (isset($atts['post_title'])) ? $atts['post_title'] : false;
	$preserve_formatting 	= (isset($atts['preserve_formatting'])) ? $atts['preserve_formatting'] : true;
	$post_type 	= (isset($atts['post_type'])) ? $atts['post_type'] : 'snippet';
	$is_admin 	= (isset($atts['is_admin'])) ? $atts['is_admin'] : false;
	$site 	= (isset($atts['site'])) ? $atts['site'] : '';
	if (blocksolid_snippets_get_admin_post_type()!='snippet'){
	    return blocksolid_snippet($post_title,$preserve_formatting,$post_type,$is_admin,$site);
	}else{
		return false;
	}
}
add_shortcode('blocksolid_snippet','blocksolid_snippet_via_shortcode');

function blocksolid_snippets_get_admin_post_type () {
    global $post, $parent_file, $typenow, $current_screen, $pagenow;

    $post_type = NULL;

    if($post && (property_exists($post, 'post_type') || method_exists($post, 'post_type')))
        $post_type = $post->post_type;

    if(empty($post_type) && !empty($current_screen) && (property_exists($current_screen, 'post_type') || method_exists($current_screen, 'post_type')) && !empty($current_screen->post_type))
        $post_type = $current_screen->post_type;

    if(empty($post_type) && !empty($typenow))
        $post_type = $typenow;

    if(empty($post_type) && function_exists('get_current_screen'))
        $post_type = get_current_screen();

    if(empty($post_type) && isset($_REQUEST['post']) && !empty($_REQUEST['post']) && function_exists('get_post_type') && $get_post_type = get_post_type((int)$_REQUEST['post']))
        $post_type = $get_post_type;

    if(empty($post_type) && isset($_REQUEST['post_type']) && !empty($_REQUEST['post_type']))
        $post_type = sanitize_key($_REQUEST['post_type']);

    if(empty($post_type) && 'edit.php' == $pagenow)
        $post_type = 'post';

    return $post_type;
}

?>