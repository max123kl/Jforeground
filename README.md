# MediaWiki Jforeground Skin

[MediaWiki](http://www.mediawiki.org) skin that focuses on putting your content in the *foreground*. Supports responsive layouts and has classes predefined for [Semantic MediaWiki](http://semantic-mediawiki.org/wiki/Semantic_MediaWiki). Built on the [Zurb Foundation](http://foundation.zurb.com) CSS framework.



    require_once( "$IP/skins/jforeground/jforeground.php" );

This will activate Jforeground in the installation.

Make sure to activate Jforeground for all users and anonymous visitors, you need to set the `$wgDefaultSkin` variable and set it to `jforeground`.

    $wgDefaultSkin = "jforeground";

## Configuration

Use following features in `LocalSettings.php` to change the behavior. 

- `showActionsForAnon => true` displays page actions for non-logged-in visitors.
- `NavWrapperType => 'divonly'`: only a div with id `navwrapper` will be created. `'0'` - no div will be created (old behavior), other values will be used as class. 
- `showHelpUnderTools => true` a Link to "Help" will be created under "Tools".
- `showRecentChangesUnderTools => true` a Link to "recent changes" will be created under "Tools".
- `wikiName => 'Alternate WikiName'` sets top navbar name to a different output of the wiki's name. Useful if your `$wgSitename` is long but need to keep it for other purposes.
- `navbarIcon => true` to display an icon in the top navbar. See below for more information.
- `showFooterIcons => 0` suppresses the output of footer icons. Set to `true` or `1` to display them.

These are the default values:

    $wgjForegroundFeatures = array(      
        'showActionsForAnon' => false, // hide actions button for anonymous users
        'NavWrapperType' => 'divonly',
        'showHelpUnderTools' => true,
        'showRecentChangesUnderTools' => true,
        'wikiName' => 'Joomla! Documentation<sup>&#8482;</sup>',
        'navbarIcon' => 1,
        'showFooterIcons' => 1,
);

### Usage of NavWrapperType

With a setting like:

    'NavWrapperType' => 'divonly'

and the created div called `navwrapper` anonymous visitors can change the setting of navbar (fixed or sticky) by 
User-Script (Firefox-extensions like greasemonkey or scriptish), users can take a gadget or their JavaScript, CSS ... :

    $('#navwrapper').addClass('sticky');


Or you set class in LocalSettings.php with:

    'NavWrapperType' => 'contain-to-grid fixed'

and visitors will be able to remove this class by their own JavaScript or gadget ...

### Navbar Icon

With a setting like:

    'navbarIcon' => true

A top navbar icon will be set using the current image set by `$wgLogo` in `LocalSettings.php`. See http://www.mediawiki.org/wiki/Manual:$wgLogo for more information about `$wgLogo`.

The icon will be resized to fit into a maximum width of 64px x 36px wide or a 16:9 ratio.
