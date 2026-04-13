<?php
/**
 * Admin functions to improve administration experience.
 *
 * @package Geoffrey_Crofte
 */

// Authorize SVG and WEBP files
function geoffreycrofte_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
add_filter( 'upload_mimes', 'geoffreycrofte_mime_types' );

// Control the import for a webp image.
function geoffreycrofte_file_types( $types, $file, $filename, $mimes ) {
	if ( false !== strpos( $filename, '.webp' ) ) {
    	$types['ext'] = 'webp';
   		$types['type'] = 'image/webp';
	}
	return $types;
}
add_filter( 'wp_check_filetype_and_ext', 'geoffreycrofte_file_types', 10, 4 );