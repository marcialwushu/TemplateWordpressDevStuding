<?php

function Mytheme_style(){
    wp_enqueue_style('bootstrap_css', get_template_directory_uri() .'/css/bootstrap.min.css');

    wp_enqueue_style('jquery_fanbox', get_template_directory_uri() .'/css/fancybox/jquery.fancybox.css');

    wp_enqueue_style('jcar_css', get_template_directory_uri() .'/css/jcarousel.css');

    wp_enqueue_style('flexslider_css', get_template_directory_uri() .'/css/flexslider.css');

    wp_enqueue_style('default_css', get_template_directory_uri() .'/skins/default.css');
}


add_action('wp_enqueue_scripts','Mytheme_style');


function Mytheme_js(){
    wp_enqueue_script('jquery', get_template_directory_uri() .'/js/jquery.js', array('jquery'), '',true);
    wp_enqueue_script('jqueryeasing_js', get_template_directory_uri() .'/js/jquery.easing.1.3.js', array('jquery'), '',true);
    wp_enqueue_script('bootstrap_js', get_template_directory_uri() .'/js/bootstrap.min.js', array('jquery'), '',true);
    wp_enqueue_script('fanboxpack_js', get_template_directory_uri() .'/js/jquery.fancybox.pack.js', array('jquery'), '',true);
    wp_enqueue_script('fanboxmedia_js', get_template_directory_uri() .'/js/jquery.fancybox-media.js', array('jquery'), '',true);
    wp_enqueue_script('googleprettify_js', get_template_directory_uri() .'/js/google-code-prettify/prettify.js', array('jquery'), '',true);
    wp_enqueue_script('jquery_quickland_js', get_template_directory_uri() .'/js/portfolio/jquery.quicksand.js', array('jquery'), '',true);
    wp_enqueue_script('setting_js', get_template_directory_uri() .'/js/portfolio/setting.js', array('jquery'), '',true);
    wp_enqueue_script('flexslider_js', get_template_directory_uri() .'/js/jquery.flexslider.js', array('jquery'), '',true);
    wp_enqueue_script('animate_js', get_template_directory_uri() .'/js/animate.js', array('jquery'), '',true);
    wp_enqueue_script('custom_js', get_template_directory_uri() .'/js/custom.js', array('jquery'), '',true);
}

add_action('wp_enqueue_scripts','Mytheme_js');  

function Mytheme_mainmenu(){
    register_nav_menu('primary', 'Top Navigation');
}

add_action('init', 'Mytheme_mainmenu');


//////////////////////////////////////////////////////////////////////////////////////////////////////////

function register_my_menu() {
    register_nav_menu('header-menu',__( 'Header Menu' ));
  }
  add_action( 'init', 'register_my_menu' );


function register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
        'extra-menu' => __( 'Extra Menu' )
      )
    );
  }
add_action( 'init', 'register_my_menus' );




//////////////////////////////////////////////////////////////////////////////////////////////////////////////




class BootstrapNavMenuWalker extends Walker_Nav_Menu {


	public function start_lvl( &$output, $depth = 0, $args = array() ) {

		$indent = str_repeat( "\t", $depth );
		$submenu = ($depth > 0) ? ' sub-menu' : '';
        $output	   .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
       

	}

	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {


		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$li_attributes = '';
		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		
		// managing divider: add divider class to an element to get a divider before it.
		$divider_class_position = array_search('divider', $classes);
		if($divider_class_position !== false){
			$output .= "<li class=\"divider\"></li>\n";
			unset($classes[$divider_class_position]);
		}
		
		$classes[] = ($args->has_children) ? 'dropdown' : '';
		$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
		$classes[] = 'menu-item-' . $item->ID;
		if($depth && $args->has_children){
			$classes[] = 'dropdown-submenu';
		}


		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		$attributes .= ($args->has_children) 	    ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= ($depth == 0 && $args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
		$item_output .= $args->after;


		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	

	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {
		//v($element);
		if ( !$element )
			return;

		$id_field = $this->db_fields['id'];

		//display this element
		if ( is_array( $args[0] ) )
			$args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
		else if ( is_object( $args[0] ) )
			$args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'start_el'), $cb_args);

		$id = $element->$id_field;

		// descend only when the depth is right and there are childrens for this element
		if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

			foreach( $children_elements[ $id ] as $child ){

				if ( !isset($newlevel) ) {
					$newlevel = true;
					//start the child delimiter
					$cb_args = array_merge( array(&$output, $depth), $args);
					call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
				}
				$this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
			}
			unset( $children_elements[ $id ] );
		}

		if ( isset($newlevel) && $newlevel ){
			//end the child delimiter
			$cb_args = array_merge( array(&$output, $depth), $args);
			call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
		}

		//end this element
		$cb_args = array_merge( array(&$output, $element, $depth), $args);
		call_user_func_array(array(&$this, 'end_el'), $cb_args);

	}

}

add_theme_support('post-thumbnails');

//////////////////////////////////////////////////////////////////////////////////////////////////////

function Mytheme_logo_setup(){
	add_theme_support('custom-logo',array(
		'height' =>50,
		'width' =>150,
		'flex-width' =>true,
	));
}

add_action('after_setup_theme','Mytheme_logo_setup');


function Mytheme_sidebar(){
	register_sidebar(
		array(
			'name' =>'Sidebar',
			'id' => 'sidebar-1',
			'description' => 'this is my Sidebar Area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>'
	));

}

add_action('widgets_init', 'Mytheme_sidebar');


///////////////////////Footer Widgets////////////////////////////

function Footer_widgets(){
	register_sidebar(
		array(
			'name' =>'Footer1',
			'id' => 'footer-1',
			'description' => 'Footer 1 Area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>'
	));

	register_sidebar(
		array(
			'name' =>'Footer2',
			'id' => 'footer-2',
			'description' => 'Footer 2 Area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>'
	));

	register_sidebar(
		array(
			'name' =>'Footer3',
			'id' => 'footer-3',
			'description' => 'Footer 3 Area',
			'before_widget' => '<uside id="%1$s" class="widget %2$s">',
			'after_widget' => '</uside>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>'
	));

	register_sidebar(
		array(
			'name' =>'Footer4',
			'id' => 'footer-4',
			'description' => 'Footer 4 Area',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h5 class="widget-title">',
			'after_title' => '</h5>'
	));

}

add_action('widgets_init', 'Footer_widgets');



?>