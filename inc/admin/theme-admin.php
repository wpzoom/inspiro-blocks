<?php
/**
 * Theme admin functions.
 *
 * @package inspiro-blocks
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
* Add admin menu
*
* @since 1.0.0
*/
function inspiro_blocks_theme_admin_menu() {
	add_theme_page(
		esc_html__( 'Inspiro Blocks Getting Started', 'inspiro-blocks' ),
		esc_html__( 'Inspiro Blocks Theme', 'inspiro-blocks' ),
		'edit_theme_options',
		'inspiro_blocks-theme',
		'inspiro_blocks_admin_page_content',
		30
	);
}
add_action( 'admin_menu', 'inspiro_blocks_theme_admin_menu' );


/**
* Add admin page content
*
* @since 1.0.0
*/
function inspiro_blocks_admin_page_content() {
	$theme = wp_get_theme();
	$theme_name = 'inspiro-blocks';
	$active_theme_name = $theme->get('Name');

	?>

		<div class="inspiro-blocks-page-header">
			<div class="inspiro-blocks-page-header__container">
				<div class="inspiro-blocks-page-header__branding">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/admin/img/theme_logo.png' ); ?>" class="inspiro-blocks-page-header__logo" alt="<?php echo esc_attr__( 'inspiro-blocks', 'inspiro-blocks' ); ?>" />
				</div>
				<div class="inspiro-blocks-page-header__tagline">
					<span  class="inspiro-blocks-page-header__tagline-text">
						<?php echo esc_html__( 'Designed by ', 'inspiro-blocks' ); ?>
						<a href="https://www.wpzoom.com/"><?php echo esc_html__( 'WPZOOM', 'inspiro-blocks' ); ?></a>
					</span>					
				</div>				
			</div>
		</div>

		<div class="wrap inspiro-blocks-container">
			<div class="inspiro-blocks-grid">

				<div class="inspiro-blocks-grid-content">
					<div class="inspiro-blocks-body">

                        <a href="https://www.wpzoom.com/themes/inspiro/" target="_blank"><img class="center theme_screenshot" src="<?php echo esc_url( get_template_directory_uri() . '/screenshot.png' ); ?>" alt="<?php echo esc_attr__( 'inspiro-blocks', 'inspiro-blocks' ); ?>" /></a>

						<h1 class="inspiro-blocks-title"><?php esc_html_e( 'Getting Started', 'inspiro-blocks' ); ?></h1>
						<p class="inspiro-blocks-intro-text">
							<?php echo esc_html__( 'Inspiro Blocks is the Full Site Editing version (Block theme) of the popular Inspiro theme. This version of the theme supports the new Full Site Editor. Using the new Site Editor, you have complete control over the design of your website without using any 3rd party page builders which slow down your website. You can now change not just the colors and fonts in your theme but also make changes to the layout and global sections like the header and footer.', 'inspiro-blocks' ); ?>
						</p>
						<p class="inspiro-blocks-intro-text">
						<a href="https://www.wpzoom.com/documentation/inspiro-blocks/" target="_blank"><?php echo esc_html__( 'Inspiro Blocks Documentation', 'inspiro-blocks' ); ?></a> &nbsp;&nbsp; <strong><a href="https://www.wpzoom.com/themes/inspiro/" target="_blank"><?php echo esc_html__( 'Get Inspiro Premium', 'inspiro-blocks' ); ?></a>*</strong>

						</p>
						<br><br><hr>
						<br><br>

                        <a href="https://www.wpzoom.com/newsletter/" target="_blank"><img class="center theme_screenshot" src="<?php echo esc_url( get_template_directory_uri() . '/assets/admin/img/pro.png' ); ?>" alt="<?php echo esc_attr__( 'inspiro-blocks', 'inspiro-blocks' ); ?>" /></a>

						<h1 class="inspiro-blocks-title"><?php esc_html_e( 'Coming Soon: Inspiro Blocks PRO!', 'inspiro-blocks' ); ?></h1>

                        <h2><?php esc_html_e( 'Get Access to More Demos, Patterns, Header & Footer Layouts with the PRO Version!', 'inspiro-blocks' ); ?></h2>
						<p class="inspiro-blocks-intro-text">
							<?php echo __( 'Inspiro Blocks PRO will include multiple starter site to build any type of website you want. We\'ll also add more block patterns and page templates. Subscribe to our newsletter to hear the first when the PRO version is available!', 'inspiro-blocks' ); ?>
						</p>

						<p><a href="https://www.wpzoom.com/newsletter/" class="button button-primary button-hero" style="text-decoration: none;" target="_blank"><?php esc_html_e( 'Subscribe to our Newsletter &rarr;', 'inspiro-blocks' ); ?></a></p>

                        <br><br><hr>
                        <br><br>
                        <p>*<?php esc_html_e( 'Currently, there is a Premium version only for the Inspiro Classic theme, which integrates the Elementor page builder and doesn\'t support the Full Site Editor. A new PRO version that supports the Full Site Editor will soon be released.', 'inspiro-blocks' ); ?></p>
                        <p><a href="https://www.wpzoom.com/full-site-editing/block-themes-vs-classic-themes/" target="_blank"><?php echo esc_html__( 'Block Themes vs Classic Themes: 4 Key Differences', 'inspiro-blocks' ); ?></a></p>

					</div> <!-- .body -->

				</div> <!-- .content -->
				
				<!-- Sidebar -->
				<aside class="inspiro-blocks-grid-sidebar">
					<div class="inspiro-blocks-grid-sidebar-widget-area">

                        <div class="inspiro-blocks-widget">
                            <h2 class="inspiro-blocks-widget-title"><?php echo esc_html__( 'Get Inspiro Premium!', 'inspiro-blocks' ); ?></h2>
                            <p><?php echo esc_html__( 'Looking to do more with Inspiro? Get the Premium version of the Inspiro Classic theme to get instant access to 9 Starter Sites, Portfolio with Video Integration, and more!', 'inspiro-blocks' ); ?></p>
                            <a href="https://www.wpzoom.com/themes/inspiro/" class="button button-primary button-hero" style="text-decoration: none;" target="_blank"><?php esc_html_e( 'Get the Premium Version &rarr;', 'inspiro-blocks' ); ?></a>
                        </div>


						<div class="inspiro-blocks-widget">
							<h2 class="inspiro-blocks-widget-title"><?php echo esc_html__( 'Useful Links', 'inspiro-blocks' ); ?></h2>

							<ul class="inspiro-blocks-useful-links">
                                <li>
                                    <strong><a href="https://www.wpzoom.com/themes/inspiro/" target="_blank"><?php echo esc_html__( 'Inspiro Premium', 'inspiro-blocks' ); ?></a> - <em>NEW</em></strong>
                                </li>
								<li>
									<a href="https://www.wpzoom.com/documentation/inspiro-blocks/" target="_blank"><?php echo esc_html__( 'Inspiro Blocks Documentation', 'inspiro-blocks' ); ?></a>
								</li>
								<li>
									<a href="https://wordpress.org/support/theme/inspiro-blocks/" target="_blank"><?php echo esc_html__( 'Support', 'inspiro-blocks' ); ?></a>
								</li>
								<li>
									<a href="https://www.wpzoom.com/themes/" target="_blank"><?php echo esc_html__( 'View our Premium Themes', 'inspiro-blocks' ); ?></a>
								</li>
                                <li>
                                    <a href="https://www.wpzoom.com/plugins/" target="_blank"><?php echo esc_html__( 'View our Premium Plugins', 'inspiro-blocks' ); ?></a>
                                </li>
							</ul>
						</div>

						<div class="inspiro-blocks-widget">
							<h2 class="inspiro-blocks-widget-title"><?php echo esc_html__( 'Leave us a review', 'inspiro-blocks' ); ?></h2>
							<p><?php echo esc_html__( 'Are you are enjoying inspiro-blocks? We would love to hear your feedback.', 'inspiro-blocks' ); ?></p>
							<a href="https://wordpress.org/support/theme/inspiro-blocks/reviews/" class="button button-primary button-hero" style="text-decoration: none;" target="_blank"><?php esc_html_e( 'Submit a review', 'inspiro-blocks' ); ?></a>
						</div>

					</div>					
				</aside>	

			</div> <!-- .grid -->

		</div>
	<?php
}
