<?php
/**
 * Admin notice after Theme activation
 *
 * @package Inspiro
 * @subpackage Inspiro_Lite
 * @since Inspiro 1.2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'inspiro_admin_notice' ) ) {
	/**
	 * Welcome Notice after Theme Activation
	 *
	 * @return void
	 */
	function inspiro_admin_notice() {
		global $pagenow, $inspiro_version;

		$welcome_notice        = get_option( 'inspiro_notice_welcome' );
		$current_user_can      = current_user_can( 'edit_theme_options' );
		$should_display_notice = ( $current_user_can && 'index.php' === $pagenow && ! $welcome_notice ) || ( $current_user_can && 'themes.php' === $pagenow && isset( $_GET['activated'] ) && ! $welcome_notice ); // phpcs:ignore WordPress.Security.NonceVerification.Recommended

		if ( $should_display_notice ) {
            wp_enqueue_style( 'welcome-notice', get_template_directory_uri() . '/assets/admin/css/welcome-notice.css' );

			inspiro_welcome_notice();
		}
	}
}
add_action( 'admin_notices', 'inspiro_admin_notice' );

if ( ! function_exists( 'inspiro_hide_notice' ) ) {
	/**
	 * Hide Welcome Notice in WordPress Dashboard
	 *
	 * @return void
	 */
	function inspiro_hide_notice() {
		if ( isset( $_GET['inspiro-hide-notice'] ) && isset( $_GET['_inspiro_notice_nonce'] ) ) {
			if ( ! check_admin_referer( 'inspiro_hide_notices_nonce', '_inspiro_notice_nonce' ) ) {
				wp_die( esc_html__( 'Action failed. Please refresh the page and retry.', 'inspiro-blocks' ) );
			}

			if ( ! current_user_can( 'edit_theme_options' ) ) {
				wp_die( esc_html__( 'You do not have the necessary permission to perform this action.', 'inspiro-blocks' ) );
			}

			$hide_notice = sanitize_text_field( wp_unslash( $_GET['inspiro-hide-notice'] ) );
			update_option( 'inspiro_notice_' . $hide_notice, 1 );
		}
	}
}
add_action( 'wp_loaded', 'inspiro_hide_notice' );

if ( ! function_exists( 'inspiro_welcome_notice' ) ) {
	/**
	 * Content of Welcome Notice in WordPress Dashboard
	 *
	 * @return void
	 */
	function inspiro_welcome_notice() {
		?>
		<div class="notice wpz-welcome-notice">
			<a class="notice-dismiss wpz-welcome-notice-hide" href="<?php echo esc_url( wp_nonce_url( remove_query_arg( array( 'activated' ), add_query_arg( 'inspiro-hide-notice', 'welcome' ) ), 'inspiro_hide_notices_nonce', '_inspiro_notice_nonce' ) ); ?>">
				<span class="screen-reader-text">
					<?php echo esc_html__( 'Dismiss this notice.', 'inspiro-blocks' ); ?>
				</span>
			</a>

            <div class="wpz-notice-image">
                <a href="https://www.wpzoom.com/themes/inspiro-blocks/?utm_source=wp-admin&utm_medium=inspiro-blocks-free&utm_campaign=inspiro-blocks-banner-top" title="Inspiro Blocks" target="_blank"><img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/admin/inspiro-top.png' ); ?>" width="233" alt="<?php echo esc_attr__( 'Inspiro Blocks', 'inspiro-blocks' ); ?>" /></a>
            </div>

            <div class="wpz-notice-text">

                <h3><?php echo esc_html__( 'Discover Inspiro Blocks', 'inspiro-blocks' ); ?></h3>
    			<p>
    			<?php
    			/* translators: %1$s: Inspiro theme %2$s: anchor tag open %3$s: anchor tag close */
    			printf( esc_html__( 'Thank you for installing %1$s Blocks theme! To get started please make sure you visit the %2$sgetting started page%3$s.', 'inspiro-blocks' ), 'Inspiro', '<a href="' . esc_url( admin_url( 'themes.php?page=inspiro' ) ) . '">', '</a>' );
    			?>
    			</p>
    			<div class="wpz-welcome-notice-button">
    				<a class="button button-primary" href="<?php echo esc_url( admin_url( 'themes.php?page=inspiro' ) ); ?>">
    					<?php
    					/* translators: %s: Inspiro theme */
    					printf( esc_html__( '%s Blocks Dashboard &rarr;', 'inspiro-blocks' ), 'Inspiro' );
    					?>
    				</a>
    				<a class="button button-secondary" href="<?php echo esc_url( __( 'https://www.wpzoom.com/themes/inspiro-blocks-pro/?utm_source=wp-admin&utm_medium=inspiro-blocks-free&utm_campaign=inspiro-blocks-banner-top', 'inspiro-blocks' ) ); ?>" target="_blank">
    					<?php esc_html_e( 'Discover Inspiro Blocks PRO &rarr;', 'inspiro-blocks' ); ?>
    				</a>
    			</div>
            </div>
		</div>
		<?php
	}
}
