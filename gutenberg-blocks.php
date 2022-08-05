<?php
/**
 * Plugin Name:       Gutenberg Blocks
 * Description:       Aditional Gutenberg Blocks and patterns library.
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           1.0.0
 * Author:            Felipe López - Espacio Digital
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       g-blocks
 *
 * @package           create-block
 */

add_filter( 'should_load_separate_core_block_assets', '__return_true' );

function create_block_multi_block_plugin_block_init() {
	$blocks = array(
			'card',
			'login',
	);

	foreach($blocks as $block) {
		register_block_type( plugin_dir_path( __FILE__ ) . '/src/block-library/' . $block . '/');
	}
}
add_action( 'init', 'create_block_multi_block_plugin_block_init' );

function create_patterns_init() {
	// Register block patterns styles

	wp_enqueue_style( 'g-block-patterns-styles', plugin_dir_url( __FILE__ ) . 'patterns-styles.css' );

	// Register block pattern category for the plugin patterns

	register_block_pattern_category( 'g-blocks', [ 'label' => __( 'Gutenberg Blocks', 'g-blocks' ) ] );

	// Register patterns

	register_block_pattern(
		'g-blocks/full-screen-login',
		[
			'title' => __( 'Full Screen Login', 'g-blocks' ),
			'description' => __( 'Two columns full screen layout for login', 'g-blocks' ),
			'categories' => [ 'g-blocks' ],
			'content' => '<!-- wp:group {"tagName":"section","align":"full","className":"g-block-pattern g-blocks-full-screen-login"} -->
			<section class="wp-block-group alignfull g-block-pattern g-blocks-full-screen-login"><!-- wp:columns {"align":"full"} -->
			<div class="wp-block-columns alignfull"><!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:cover {"url":"' . plugin_dir_url( __FILE__ ) .  'resources/img/placeholder.png","id":94,"dimRatio":0,"isDark":false} -->
			<div class="wp-block-cover is-light"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-94" alt="" src="' . plugin_dir_url( __FILE__ ) .  'resources/img/placeholder.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
			<p class="has-text-align-center has-large-font-size"></p>
			<!-- /wp:paragraph --></div></div>
			<!-- /wp:cover --></div>
			<!-- /wp:column -->
			
			<!-- wp:column {"verticalAlignment":"center","width":"50%","className":"login-column"} -->
			<div class="wp-block-column is-vertically-aligned-center login-column" style="flex-basis:50%"><!-- wp:shortcode /--></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></section>
			<!-- /wp:group -->',
		]
	);

	register_block_pattern(
		'g-blocks/hero',
		[
			'title' => __( 'Hero', 'g-blocks' ),
			'description' => __( 'Customizable hero with heading, paragraph and button', 'g-blocks' ),
			'categories' => [ 'g-blocks' ],
			'content' => '<!-- wp:group {"tagName":"section","align":"full","className":"g-block-pattern g-blocks-hero"} -->
			<section class="wp-block-group alignfull g-block-pattern g-blocks-hero"><!-- wp:cover {"url":"' . plugin_dir_url( __FILE__ ) .  'resources/img/placeholder.png","id":119,"dimRatio":50,"contentPosition":"center left","isDark":false,"align":"full"} -->
			<div class="wp-block-cover alignfull is-light has-custom-content-position is-position-center-left"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-119" alt="" src="' . plugin_dir_url( __FILE__ ) .  'resources/img/placeholder.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":1} -->
			<h1>Headline</h1>
			<!-- /wp:heading -->
			
			<!-- wp:paragraph {"align":"left"} -->
			<p class="has-text-align-left">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt</p>
			<!-- /wp:paragraph -->
			
			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link">Button</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div></div>
			<!-- /wp:cover --></section>
			<!-- /wp:group -->',
		]
	);

	register_block_pattern(
		'g-blocks/two-column-content-img',
		[
			'title' => __( 'Two Column Content Section with Image', 'g-blocks' ),
			'description' => __( 'Two Column Content Section with Image', 'g-blocks' ),
			'categories' => [ 'g-blocks' ],
			'content' => '<!-- wp:group {"tagName":"section","align":"full","className":"g-block-pattern g-blocks-two-column-content-img"} -->
			<section class="wp-block-group alignfull g-block-pattern g-blocks-two-column-content-img"><!-- wp:columns {"verticalAlignment":"center","align":"full"} -->
			<div class="wp-block-columns alignfull are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"id":133,"sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="' . plugin_dir_url( __FILE__ ) .  'resources/img/placeholder.png" alt="" class="wp-image-133"/></figure>
			<!-- /wp:image --></div>
			<!-- /wp:column -->
			
			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading -->
			<h2>Lorem ipsum dolor consectetuer adipiscing elitsed diam nonummy</h2>
			<!-- /wp:heading -->
			
			<!-- wp:paragraph -->
			<p>Lorem ipsum dolor sit amet consectetur adipiscing elit egestas nulla lobortis, urna maecenas eleifend euismod rutrum eu pharetra taciti purus. Nec natoque cum et mattis sem semper, senectus porttitor ultricies vivamus. Hendrerit interdum vitae cursus quam nam iaculis rhoncus lectus, non potenti integer vulputate tortor congue enim mauris a, litora pellentesque dignissim etiam ornare gravida nisl. Augue neque nascetur posuere nisi nunc dui, mollis donec laoreet montes inceptos.</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></section>
			<!-- /wp:group -->',
		]
	);

	register_block_pattern(
		'g-blocks/two-column-content-img',
		[
			'title' => __( 'Two Column Content Section with Image', 'g-blocks' ),
			'description' => __( 'Two Column Content Section with Image', 'g-blocks' ),
			'categories' => [ 'g-blocks' ],
			'content' => '<!-- wp:group {"tagName":"section","align":"full","className":"g-block-pattern g-blocks-two-column-content-img"} -->
			<section class="wp-block-group alignfull g-block-pattern g-blocks-two-column-content-img"><!-- wp:columns {"verticalAlignment":"center","align":"full"} -->
			<div class="wp-block-columns alignfull are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:image {"id":133,"sizeSlug":"full","linkDestination":"none"} -->
			<figure class="wp-block-image size-full"><img src="' . plugin_dir_url( __FILE__ ) .  'resources/img/placeholder.png" alt="" class="wp-image-133"/></figure>
			<!-- /wp:image --></div>
			<!-- /wp:column -->
			
			<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:heading -->
			<h2>Lorem ipsum dolor consectetuer adipiscing elitsed diam nonummy</h2>
			<!-- /wp:heading -->
			
			<!-- wp:paragraph -->
			<p>Lorem ipsum dolor sit amet consectetur adipiscing elit egestas nulla lobortis, urna maecenas eleifend euismod rutrum eu pharetra taciti purus. Nec natoque cum et mattis sem semper, senectus porttitor ultricies vivamus. Hendrerit interdum vitae cursus quam nam iaculis rhoncus lectus, non potenti integer vulputate tortor congue enim mauris a, litora pellentesque dignissim etiam ornare gravida nisl. Augue neque nascetur posuere nisi nunc dui, mollis donec laoreet montes inceptos.</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></section>
			<!-- /wp:group -->',
		]
	);

	register_block_pattern(
		'g-blocks/two-column-content-fullimg',
		[
			'title' => __( 'Two Column Content Section with Full Cover Image', 'g-blocks' ),
			'description' => __( 'Two Column Content Section with Full Cover Image', 'g-blocks' ),
			'categories' => [ 'g-blocks' ],
			'content' => '<!-- wp:group {"tagName":"section","align":"full","className":"g-block-pattern g-blocks-two-column-content-fullimg"} -->
			<section class="wp-block-group alignfull g-block-pattern g-blocks-two-column-content-fullimg"><!-- wp:columns {"verticalAlignment":"center","align":"full"} -->
			<div class="wp-block-columns alignfull are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"50%","className":"image-column"} -->
			<div class="wp-block-column is-vertically-aligned-center image-column" style="flex-basis:50%"><!-- wp:cover {"url":"' . plugin_dir_url( __FILE__ ) .  'resources/img/placeholder.png","id":133,"dimRatio":0,"isDark":false,"style":{"color":{}}} -->
			<div class="wp-block-cover is-light"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-133" alt="" src="' . plugin_dir_url( __FILE__ ) .  'resources/img/placeholder.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","fontSize":"large"} -->
			<p class="has-text-align-center has-large-font-size"></p>
			<!-- /wp:paragraph --></div></div>
			<!-- /wp:cover --></div>
			<!-- /wp:column -->
			
			<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
			<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:heading -->
			<h2>Lorem ipsum dolor consectetuer adipiscing elitsed diam nonummy</h2>
			<!-- /wp:heading -->
			
			<!-- wp:paragraph -->
			<p>Lorem ipsum dolor sit amet consectetur adipiscing elit egestas nulla lobortis, urna maecenas eleifend euismod rutrum eu pharetra taciti purus. Nec natoque cum et mattis sem semper, senectus porttitor ultricies vivamus. Hendrerit interdum vitae cursus quam nam iaculis rhoncus lectus, non potenti integer vulputate tortor congue enim mauris a, litora pellentesque dignissim etiam ornare gravida nisl. Augue neque nascetur posuere nisi nunc dui, mollis donec laoreet montes inceptos.</p>
			<!-- /wp:paragraph --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></section>
			<!-- /wp:group -->',
		]
	);
}

add_action( 'init', 'create_patterns_init' );