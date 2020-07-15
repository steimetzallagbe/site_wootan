<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

$manifest['name']        = __( 'Services', 'fw' );
$manifest['description'] = __(
	'This extension will add a fully fledged services module that will let you display your services', 'fw'
);
$manifest['version'] = '1.0.0';
$manifest['display'] = true;
$manifest['standalone'] = true;
$manifest['thumbnail'] = 'fa fa-university';
