<?php
/**
 * Custom template tags of this theme
 *
 * @since 1.0.0
 */

/**
 * Retrieves the stylesheet file url
 *
 * @since 1.0.0
 *
 * @param string $dir The directory path of file inside template.
 * @param string $filename The name of stylesheet file.
 *
 * @return string The file URL
 */
function ri_get_file_url( $dir = '/assets/css/', $filename = 'style.css' ) {
	return get_template_directory_uri() . $dir . $filename;
}

/**
 * Retrieves the stylesheet file url
 *
 * @since 1.0.0
 *
 * @param string $dir The directory path of file inside template.
 * @param string $filename The name of stylesheet file.
 *
 * @return string The stylesheet URI
 */
function ri_get_uri_file( $dir = '/assets/css/', $filename = 'style.css' ) {
	return get_template_directory() . $dir . $filename;
}

/**
 * Retrieves the stylesheet version file url
 *
 * @since 1.0.0
 *
 * @param string $dir The directory path of file inside template.
 * @param string $filename The name of stylesheet file.
 *
 * @return string The stylesheet version
 */
function ri_get_version_file( $dir = '/assets/css/', $filename = 'style.css' ) {
	return filemtime( ri_get_uri_file( $dir, $filename ) );
}