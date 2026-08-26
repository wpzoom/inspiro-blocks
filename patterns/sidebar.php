<?php
/**
 * Title: Sidebar
 * Slug: inspiro-blocks/sidebar
 * Categories: inspiro-blocks-general
 * Viewport Width: 1200
 */
?>
<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2><?php echo esc_html__( 'Subscribe', 'inspiro-blocks' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p><?php echo esc_html__( 'Sign up with your email address to receive our weekly news', 'inspiro-blocks' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<form action="/action_page.php">
    <input type="text" placeholder="<?php echo esc_attr__( 'Name', 'inspiro-blocks' ); ?>" name="name" required="">
    <input type="text" placeholder="<?php echo esc_attr__( 'Email address', 'inspiro-blocks' ); ?>" name="mail" required="">
    <input type="submit" value="<?php echo esc_attr__( 'Subscribe', 'inspiro-blocks' ); ?>">
</form>
<!-- /wp:html -->

<!-- wp:separator {"style":{"color":{"background":"#6d6d7845"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#6d6d7845;color:#6d6d7845"/>
<!-- /wp:separator -->

<!-- wp:spacer {"height":"64px"} -->
<div style="height:64px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2><?php echo esc_html__( 'Latest news', 'inspiro-blocks' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:latest-posts /-->

<!-- wp:separator {"style":{"color":{"background":"#6d6d784f"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#6d6d784f;color:#6d6d784f"/>
<!-- /wp:separator -->

<!-- wp:spacer {"height":"64px"} -->
<div style="height:64px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2><?php echo esc_html__( 'Categories', 'inspiro-blocks' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:categories {"showPostCounts":true} /-->

<!-- wp:separator {"style":{"color":{"background":"#6d6d784f"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#6d6d784f;color:#6d6d784f"/>
<!-- /wp:separator -->

<!-- wp:spacer {"height":"64px"} -->
<div style="height:64px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:heading -->
<h2><?php echo esc_html__( 'Search', 'inspiro-blocks' ); ?></h2>
<!-- /wp:heading -->

<!-- wp:search {"label":"<?php echo esc_attr__( 'Search', 'inspiro-blocks' ); ?>","showLabel":false,"placeholder":"<?php echo esc_attr__( 'Enter your keywords', 'inspiro-blocks' ); ?>","buttonText":"<?php echo esc_attr__( 'Search', 'inspiro-blocks' ); ?>"} /-->

<!-- wp:separator {"style":{"color":{"background":"#6d6d784f"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#6d6d784f;color:#6d6d784f"/>
<!-- /wp:separator -->

<!-- wp:spacer {"height":"64px"} -->
<div style="height:64px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer --></div>
<!-- /wp:group -->