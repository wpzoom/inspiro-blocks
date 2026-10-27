<?php
/**
 * Inspiro Premium starter sites shown on the "Premium Demos" tab
 * of the theme dashboard (Appearance > Inspiro Blocks Theme).
 *
 * Inspiro Premium is WPZOOM's flagship theme with 50+ starter sites, so the
 * free Inspiro Blocks theme promotes those demos alongside the Inspiro Blocks
 * PRO ones. The list is fetched from a remote JSON feed (cached for a day) so
 * new starter sites show up without a theme update, with a bundled fallback
 * list used when the feed is unavailable.
 *
 * @package Inspiro_Blocks
 * @since   1.1.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Remote feed URL for Inspiro Premium starter sites.
 *
 * @return string
 */
function inspiro_blocks_premium_starter_sites_feed_url() {
	return apply_filters(
		'inspiro_blocks/premium_starter_sites_feed_url',
		'https://www.wpzoom.com/frame/inspiro-starter-sites.json'
	);
}

/**
 * UTM parameters appended to every outgoing link in the starter sites grid.
 *
 * @return array
 */
function inspiro_blocks_premium_starter_sites_utm() {
	return array(
		'utm_source'   => 'wp-admin',
		'utm_medium'   => 'inspiro-blocks-free',
		'utm_campaign' => 'inspiro-premium-demos',
	);
}

/**
 * Normalize a single raw demo entry (from the feed or the bundled fallback)
 * into the shape the template expects. Returns null for unusable entries.
 *
 * @param array $demo Raw entry with title, url, demo, image, builders, is_new.
 * @return array|null
 */
function inspiro_blocks_normalize_starter_site( $demo ) {
	if ( ! is_array( $demo ) || empty( $demo['title'] ) || empty( $demo['demo'] ) ) {
		return null;
	}

	$builders = ( ! empty( $demo['builders'] ) && is_array( $demo['builders'] ) ) ? $demo['builders'] : array();
	$builders = array_values(
		array_intersect(
			array_map( 'sanitize_key', $builders ),
			array( 'elementor', 'gutenberg' )
		)
	);

	$utm         = inspiro_blocks_premium_starter_sites_utm();
	$premium_url = ! empty( $demo['url'] ) ? add_query_arg( $utm, $demo['url'] ) : '';

	return array(
		'title'       => sanitize_text_field( $demo['title'] ),
		'image'       => ! empty( $demo['image'] ) ? esc_url_raw( $demo['image'] ) : '',
		'demo_url'    => esc_url_raw( $demo['demo'] ),
		'premium_url' => esc_url_raw( $premium_url ),
		'builders'    => $builders,
		'is_new'      => ! empty( $demo['is_new'] ),
	);
}

/**
 * Fetch the Inspiro Premium starter sites from the remote feed.
 *
 * Cached for a day on success. A failure (no connection, non-200 response,
 * malformed JSON) is cached for an hour so the admin page does not hit the
 * endpoint on every load, and an empty array is returned so the caller can
 * fall back to the bundled list.
 *
 * @return array
 */
function inspiro_blocks_get_premium_starter_sites_remote() {
	$cache_key = 'inspiro_blocks_premium_starter_sites';
	$cached    = get_transient( $cache_key );

	if ( false !== $cached ) {
		return is_array( $cached ) ? $cached : array();
	}

	$response = wp_remote_get( inspiro_blocks_premium_starter_sites_feed_url(), array( 'timeout' => 10 ) );

	if ( is_wp_error( $response ) || 200 !== (int) wp_remote_retrieve_response_code( $response ) ) {
		set_transient( $cache_key, array(), HOUR_IN_SECONDS );
		return array();
	}

	$data = json_decode( wp_remote_retrieve_body( $response ), true );

	if ( empty( $data['demos'] ) || ! is_array( $data['demos'] ) ) {
		set_transient( $cache_key, array(), HOUR_IN_SECONDS );
		return array();
	}

	$sites = array();
	foreach ( $data['demos'] as $demo ) {
		$site = inspiro_blocks_normalize_starter_site( $demo );
		if ( $site ) {
			$sites[] = $site;
		}
	}

	if ( empty( $sites ) ) {
		set_transient( $cache_key, array(), HOUR_IN_SECONDS );
		return array();
	}

	$ttl = apply_filters( 'inspiro_blocks/premium_starter_sites_cache_ttl', DAY_IN_SECONDS );
	set_transient( $cache_key, $sites, $ttl );

	return $sites;
}

/**
 * Bundled subset of Inspiro Premium starter sites, used when the remote feed
 * is unavailable. Keep this short; the feed is the source of truth.
 *
 * @return array
 */
function inspiro_blocks_get_premium_starter_sites_fallback() {
	$demos = array(
		array(
			'title'    => 'Business / Portfolio',
			'url'      => 'https://www.wpzoom.com/themes/inspiro/starter-sites/business-portfolio/',
			'demo'     => 'https://demo.wpzoom.com/inspiro/',
			'image'    => 'https://wpzoom.s3.amazonaws.com/elementor/templates/assets/thumbs/inspiro/home-thumb.png',
			'builders' => array( 'elementor', 'gutenberg' ),
			'is_new'   => false,
		),
		array(
			'title'    => 'Gutenberg (Block Editor)',
			'url'      => 'https://www.wpzoom.com/themes/inspiro/starter-sites/gutenberg-block-editor/',
			'demo'     => 'https://demo.wpzoom.com/inspiro-premium-blocks/',
			'image'    => 'https://www.wpzoom.com/wp-content/uploads/2024/12/inspiro-pp-blocks-1.png',
			'builders' => array( 'gutenberg' ),
			'is_new'   => false,
		),
		array(
			'title'    => 'STUDIO*',
			'url'      => 'https://www.wpzoom.com/themes/inspiro/starter-sites/studio/',
			'demo'     => 'https://demo.wpzoom.com/inspiro-studio/',
			'image'    => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-studio/home2-thumb.png',
			'builders' => array( 'elementor', 'gutenberg' ),
			'is_new'   => true,
		),
		array(
			'title'    => 'Creative Agency',
			'url'      => 'https://www.wpzoom.com/themes/inspiro/starter-sites/creative-agency/',
			'demo'     => 'https://demo.wpzoom.com/inspiro-creative/',
			'image'    => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-creative/home-thumb.png',
			'builders' => array( 'gutenberg' ),
			'is_new'   => true,
		),
		array(
			'title'    => 'Business',
			'url'      => 'https://www.wpzoom.com/themes/inspiro/starter-sites/business/',
			'demo'     => 'https://demo.wpzoom.com/inspiro-business/',
			'image'    => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro-pro/business/home-thumb.png',
			'builders' => array( 'elementor', 'gutenberg' ),
			'is_new'   => false,
		),
		array(
			'title'    => 'Video Portfolio (Blocks)',
			'url'      => 'https://www.wpzoom.com/themes/inspiro/starter-sites/video-portfolio-blocks/',
			'demo'     => 'https://demo.wpzoom.com/inspiro-video-blocks/',
			'image'    => 'https://www.wpzoom.com/wp-content/uploads/2025/02/inspiro-video-blocks.png',
			'builders' => array( 'gutenberg' ),
			'is_new'   => false,
		),
		array(
			'title'    => 'Consulting Company',
			'url'      => 'https://www.wpzoom.com/themes/inspiro/starter-sites/consulting-company/',
			'demo'     => 'https://demo.wpzoom.com/inspiro-advisory-blocks/',
			'image'    => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-advisory-blocks/home-thumb.png',
			'builders' => array( 'gutenberg' ),
			'is_new'   => true,
		),
		array(
			'title'    => 'Green Energy',
			'url'      => 'https://www.wpzoom.com/themes/inspiro/starter-sites/green-energy/',
			'demo'     => 'https://demo.wpzoom.com/inspiro-energy/',
			'image'    => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-energy/home-thumb.png',
			'builders' => array( 'elementor', 'gutenberg' ),
			'is_new'   => true,
		),
		array(
			'title'    => 'Fine Dining Restaurant',
			'url'      => 'https://www.wpzoom.com/themes/inspiro/starter-sites/fine-dining-restaurant/',
			'demo'     => 'https://demo.wpzoom.com/inspiro-fine-dining-blocks/',
			'image'    => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-fine-dining-blocks/home-thumb.png',
			'builders' => array( 'gutenberg' ),
			'is_new'   => true,
		),
		array(
			'title'    => 'Remix',
			'url'      => 'https://www.wpzoom.com/themes/inspiro/starter-sites/remix/',
			'demo'     => 'https://demo.wpzoom.com/inspiro-remix/',
			'image'    => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-remix/home-thumb.png',
			'builders' => array( 'gutenberg' ),
			'is_new'   => true,
		),
		array(
			'title'    => 'Persona',
			'url'      => 'https://www.wpzoom.com/themes/inspiro/starter-sites/persona/',
			'demo'     => 'https://demo.wpzoom.com/inspiro-persona/',
			'image'    => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-persona/home-thumb.png',
			'builders' => array( 'gutenberg' ),
			'is_new'   => true,
		),
		array(
			'title'    => 'Interior Design',
			'url'      => 'https://www.wpzoom.com/themes/inspiro/starter-sites/interior-design/',
			'demo'     => 'https://demo.wpzoom.com/inspiro-interior-design-blocks/',
			'image'    => 'https://wpzoom.s3.us-east-1.amazonaws.com/elementor/templates/assets/thumbs/inspiro/inspiro-interior-design-blocks/home-thumb.png',
			'builders' => array( 'gutenberg' ),
			'is_new'   => true,
		),
	);

	$sites = array();
	foreach ( $demos as $demo ) {
		$site = inspiro_blocks_normalize_starter_site( $demo );
		if ( $site ) {
			$sites[] = $site;
		}
	}

	return $sites;
}

/**
 * Inspiro Premium starter sites to display: remote feed first, bundled fallback otherwise.
 *
 * @return array
 */
function inspiro_blocks_get_premium_starter_sites() {
	$sites = inspiro_blocks_get_premium_starter_sites_remote();

	if ( empty( $sites ) ) {
		$sites = inspiro_blocks_get_premium_starter_sites_fallback();
	}

	return apply_filters( 'inspiro_blocks/premium_starter_sites', $sites );
}
