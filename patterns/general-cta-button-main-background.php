<?php
/**
 * Title: Call-to-action with text, button.
 * Slug: inspiro-blocks/general-cta-button-main-background
 * Categories: inspiro-blocks-general
 * Viewport Width: 1280
 */
?>
<!-- wp:columns {"verticalAlignment":null,"style":{"spacing":{"padding":{"top":"var:preset|spacing|60","left":"0","bottom":"var:preset|spacing|60"}}}} -->
<div class="wp-block-columns" style="padding-top:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--60);padding-left:0"><!-- wp:column {"verticalAlignment":"center","width":"66.66%","layout":{"type":"constrained","justifyContent":"left"}} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:66.66%"><!-- wp:heading -->
<h2><?php echo esc_html__( 'Thinking about joining our team?', 'inspiro-blocks' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html__( 'Check out our open positions, or drop us a line, say hi.', 'inspiro-blocks' ); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"33.33%"} -->
<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33.33%"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons"><!-- wp:button {"style":{"border":{"radius":"0px"},"typography":{"textTransform":"uppercase"}},"className":"is-style-fill"} -->
<div class="wp-block-button is-style-fill" style="text-transform:uppercase"><a class="wp-block-button__link wp-element-button" style="border-radius:0px"><?php echo esc_html__( 'View Job Openings', 'inspiro-blocks' ); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->