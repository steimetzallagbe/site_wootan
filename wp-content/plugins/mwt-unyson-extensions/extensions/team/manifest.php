<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$manifest = array();

$manifest['name']        = __( 'Team', 'fw' );
$manifest['description'] = __(
	'This extension will add a fully fledged team module that will let you display your team', 'fw'
);
$manifest['version'] = '1.0.0';
$manifest['display'] = true;
$manifest['standalone'] = true;
$manifest['thumbnail'] = 'fa fa-user-o';
