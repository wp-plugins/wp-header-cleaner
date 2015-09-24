<?php
defined( 'ABSPATH' ) OR exit;

/*
Plugin Name: WP Header Cleaner
Plugin URI: http://wordpress.org/extend/plugins/wp-header-cleaner/
Description: Easy way to clean unwanted links from header & footer.
Version: 1.0
Author: Chandrakesh Kumar    
Author URI: http://www.wpchandra.com/ 
Tags: clean,head header cleaner, wordpress
*/   
     
// ===============================  WP Header Cleaner  ======================================
class WP_Clean_Header {
	
	public function __construct(){
       add_action('init', array( $this, 'cleanup_head' ));
    }
	 // WordPress cleanup function
	public function cleanup_head() {
	remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
	remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
	remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
	remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
	remove_action( 'wp_head', 'index_rel_link' ); // index link
	remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
	remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
	remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
	remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
	remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);    // #5
    add_filter('the_generator', '__return_false');            // #6
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );  // #8
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
	}
	  
}
$wp_header_cleaner = new WP_Clean_Header();

















