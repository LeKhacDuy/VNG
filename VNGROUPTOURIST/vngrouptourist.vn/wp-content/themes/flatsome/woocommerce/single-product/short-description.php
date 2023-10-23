<?php
/**
 * Single product short description
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post;

if ( ! $post->post_excerpt ) {
	return;
}

?>
<!--<div class="product-short-description short-tour-des">-->
	<!--<p> Mô tả ngắn: </p>-->
<!--	<?php //echo get_the_excerpt(); ?>-->

<!--</div>-->
