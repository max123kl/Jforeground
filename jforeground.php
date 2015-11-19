<?php

/**
 * jForeground Skin
 *
 * @file
 * @ingroup Skins
 * @author Garrick Van Buren, Jamie Thingelstad, Tom Hutchison
 * @license 2-clause BSD
 */

if( !defined( 'MEDIAWIKI' ) ) {
   die( 'This is a skin to the MediaWiki package and cannot be run standalone.' );
}

$wgExtensionCredits['skin'][] = array(
	'path'		 => __FILE__,
	'name'		 => 'jForeground',
	'url'		 => 'http://foreground.thingelstad.com/',
	'version'	 => 1.1,
	'author'	 => array(
		'Garrick Van Buren',
		'Jamie Thingelstad',
		'Tom Hutchison',
		'...'
		),
	'descriptionmsg' => 'jforeground-desc'
);

$wgValidSkinNames['jforeground'] = 'jForeground';

$wgAutoloadClasses['SkinjForeground'] = __DIR__ . '/jForeground.skin.php';

$wgMessagesDirs['SkinjForeground'] = __DIR__ . '/i18n';
$wgExtensionMessagesFiles['SkinjForeground'] = __DIR__ . '/jForeground.i18n.php';

$wgResourceModules['skins.jforeground'] = array(
	'styles'         => array(
    	'jforeground/assets/stylesheets/normalize.css',
        'jforeground/assets/stylesheets/font-awesome.css',
    	'jforeground/assets/stylesheets/foundation.css',
    	'jforeground/assets/stylesheets/jforeground.css',
        'jforeground/assets/stylesheets/jforeground-print.css',
    	'jforeground/assets/stylesheets/jquery.autocomplete.css',
    	'jforeground/assets/stylesheets/responsive-tables.css',
    	'jforeground/assets/stylesheets/icomoon.css',
	'jforeground/assets/stylesheets/joomla.css'
    ),
    'scripts'        => array(
        'jforeground/assets/scripts/vendor/custom.modernizr.js',
        'jforeground/assets/scripts/vendor/fastclick.js',
        'jforeground/assets/scripts/vendor/responsive-tables.js',
        'jforeground/assets/scripts/foundation/foundation.js',
        'jforeground/assets/scripts/foundation/foundation.topbar.js',
        'jforeground/assets/scripts/foundation/foundation.dropdown.js',
        'jforeground/assets/scripts/foundation/foundation.section.js',
        'jforeground/assets/scripts/foundation/foundation.clearing.js',
        'jforeground/assets/scripts/foundation/foundation.cookie.js',
        'jforeground/assets/scripts/foundation/foundation.placeholder.js',
        'jforeground/assets/scripts/foundation/foundation.forms.js',
        'jforeground/assets/scripts/foundation/foundation.alerts.js',
        'jforeground/assets/scripts/jforeground.js'
    ),
    'remoteBasePath' => &$GLOBALS['wgStylePath'],
    'localBasePath'  => &$GLOBALS['wgStyleDirectory']
);
