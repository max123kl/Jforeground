<?php

/**
 * Skin file for jForeground
 *
 * @file
 * @ingroup Skins
 */
class jforegroundTemplate extends BaseTemplate {
    /**
     * @param Config|null $config
     */
    public function __construct( Config $config = null ) {
        parent::__construct($config);
        global $wgjForegroundFeatures;
        $wgjForegroundFeaturesDefaults = array(
            'showActionsForAnon' => true,
            'NavWrapperType' => 'divonly',
            'showHelpUnderTools' => true,
            'showRecentChangesUnderTools' => true,
            'wikiName' => &$GLOBALS['wgSitename'],
            'navbarIcon' => false,
            'showFooterIcons' => 1,
            'addThisFollowPUBID' => 'ra-5378f70766e02197'
        );
        foreach ($wgjForegroundFeaturesDefaults as $fgOption => $fgOptionValue) {
            if ( !isset($wgjForegroundFeatures[$fgOption]) ) {
                $wgjForegroundFeatures[$fgOption] = $fgOptionValue;
            }
        }
    }

	public function execute() {
		global $wgUser;
		global $wgjForegroundFeatures;
		if (version_compare(MW_VERSION, '1.34.0', '>='))
		{
			\Wikimedia\AtEase\AtEase::suppressWarnings();
		}
		else
		{
			wfSuppressWarnings();
		}

		$this->html('headelement');
		switch ($wgjForegroundFeatures['NavWrapperType']) {
			case '0':
				break;
			case 'divonly':
				echo "<div id='navwrapper'>";
				break;
			default:
				echo "<div id='navwrapper' class='". $wgjForegroundFeatures['NavWrapperType']. "'>";
				break;
		}
		// Set default variables for footer and switch them if 'showFooterIcons' => true
		$footerLeftClass = 'small-8 large-centered columns text-center';
		$footerRightClass = 'large-12 small-12 columns';
		$poweredbyType = "nocopyright";
		$poweredbyMakeType = 'withoutImage';
		switch ($wgjForegroundFeatures['showFooterIcons']) {
			case true:
				$footerLeftClass = 'large-8 small-12 columns';
				$footerRightClass = 'large-4 small-12 columns';
				$poweredbyType = "icononly";
				$poweredbyMakeType = 'withImage';
				break;
			default:
				break;
		}
?>
<!-- START FOREGROUNDTEMPLATE -->
		<div id="top-nav" class="fixed">
		<nav id="topnav" class="top-bar top row">
			<ul class="title-area">
				<li class="name logo">
					<?php if ($wgjForegroundFeatures['navbarIcon'] != '0') { ?>
					<a href="<?php echo $this->data['nav_urls']['mainpage']['href']; ?>">
						<img alt="<?php echo $this->text('sitename'); ?>" src="<?php echo $this->text('logopath') ?>" style="max-width: 64px;height:auto; max-height:36px; display: inline-block; vertical-align:middle;"></a>
					<?php } ?>
				</li>
				<li class="toggle-topbar menu-icon">
					<a href="#"><span> </span></a>
				</li>
			</ul>

		<section class="top-bar-section">

			<ul id="top-bar-left" class="left">
				<li class="has-dropdown active" id="p-sidebar-Joomla">
					<a href="#">Joomla!</a>
						<ul class="dropdown">
							<li id="n-sidebar-Main"><a href="https://www.joomla.org"><i class="fa fa-joomla 2x-fa icon"></i>Joomla! Home</a></li>
							<li id="n-sidebar-What"><a href="https://www.joomla.org/about-joomla.html">What is Joomla?</a></li>
                            <li id="n-sidebar-Benefits"><a href="https://www.joomla.org/core-features.html">Benefits &amp; Features</a></li>
				            <li id="n-sidebar-Leadership"><a href="https://www.joomla.org/about-joomla/the-project.html">Project &amp; Leadership</a></li>
                            <li id="n-sidebar-Trademark"><a href="https://tm.joomla.org">Trademark &amp; Licensing</a></li>
                            <li class="divider"></li>
							<li id="label"><label>Support Joomla!</label></li>
                            <li id="n-sidebar-Contribute"><a href="https://www.joomla.org/contribute-to-joomla.html">Contribute</a></li>
                            <li id="n-sidebar-Sponsorship"><a href="https://www.joomla.org/sponsor.html">Sponsor</a></li>
                            <li id="n-sidebar-Partner"><a href="https://www.joomla.org/about-joomla/partners.html">Partner</a></li>
                            <li id="n-sidebar-Shop"><a href="https://shop.joomla.org/">Shop</a></li>
						</ul>
				</li>
                <li class="has-dropdown active" id="p-sidebar-Extend">
					<a href="#">Download & Extend</a>
						<ul class="dropdown">
							<li id="n-sidebar-JoomlaCode"><a href="https://downloads.joomla.org/">Downloads</a></li>
							<li id="n-sidebar-Extensions"><a href="https://extensions.joomla.org/">Extensions</a></li>
							<li id="n-sidebar-Translations"><a href="https://community.joomla.org/translations.html">Languages</a></li>
                            <li id="n-sidebar-Free-Hosted"><a href="https://launch.joomla.org">Get a free site</a></li>
						</ul>
				</li>
				<li class="has-dropdown active" id="p-sidebar-About">
					<a href="#">Discover & Learn</a>
						<ul class="dropdown">
                            <li id="n-sidebar-Docs"><a href="https://docs.joomla.org">Documentation</a></li>
                            <li id="n-sidebar-Training"><a href="https://training.joomla.org">Training</a></li>
                            <li id="n-sidebar-Certification"><a href="https://certification.joomla.org/">Certification</a></li>
                            <li id="n-sidebar-Showcase"><a href="https://showcase.joomla.org/">Site Showcase</a></li>
                            <li id="n-sidebar-Announcements"><a href="https://www.joomla.org/announcements.html">Announcements</a></li>
                            <li id="n-sidebar-Blogs"><a href="https://community.joomla.org/blogs.html">Blogs</a></li>
							<li id="n-sidebar-Magazine"><a href="https://magazine.joomla.org/">Magazine</a></li>
						</ul>
				</li>

                <li class="has-dropdown active" id="p-sidebar-News">
					<a href="#">Community & Support</a>
						<ul class="dropdown">
							<li id="n-sidebar-Community"><a href="https://community.joomla.org/">Community Portal</a></li>
							<li id="n-sidebar-Events"><a href="https://events.joomla.org/">Events</a></li>
							<li id="n-sidebar-JUGs"><a href="https://community.joomla.org/user-groups.html">User Groups</a></li>
                            <li id="n-sidebar-Forum"><a href="https://forum.joomla.org/">Forum</a></li>
                            <li id="n-sidebar-Resources"><a href="https://resources.joomla.org/">Resources Directory</a></li>
							<li id="n-sidebar-Volunteers"><a href="https://volunteers.joomla.org/">Volunteers Portal</a></li>
                            <li id="n-sidebar-Vel"><a href="https://vel.joomla.org">Vulnerable Extensions List</a></li>
						</ul>
				</li>

				<li class="has-dropdown active" id="p-sidebar-Developers">
					<a href="#">Developer Resources</a>
						<ul class="dropdown">
							<li id="n-sidebar-Developers"><a href="https://developer.joomla.org/">Developer Network</a></li>
                            <li id="n-sidebar-Security"><a href="https://developer.joomla.org/security-centre.html">Security Centre</a></li>
                            <li id="n-sidebar-Issues"><a href="https://issues.joomla.org/">Issue Tracker</a></li>
                            <li id="n-sidebar-Github"><a href="https://github.com/joomla">GitHub</a></li>
                            <li id="n-sidebar-API"><a href="https://api.joomla.org/">API Documentation</a></li>
                            <li id="n-sidebar-Framework"><a href="https://framework.joomla.org/">Joomla! Framework</a></li>
							<li id="n-sidebar-JoomlaCode"><a href="http://joomlacode.org/">JoomlaCode</a></li>
						</ul>
				</li>
			</ul>

			<ul id="top-bar-right" class="right">

				<li class="has-dropdown active"><a href="#"><i class="fa fa-cogs"></i></a>
					<ul id="toolbox-dropdown" class="dropdown">
						<?php foreach ( $this->getToolbox() as $key => $item ) { echo $this->makeListItem($key, $item); } ?>
						<?php if ($wgjForegroundFeatures['showRecentChangesUnderTools']): ?><li id="n-recentchanges"><?php echo Linker::specialLink('Recentchanges') ?></li><?php endif; ?>
						<?php if ($wgjForegroundFeatures['showHelpUnderTools']): ?><li id="n-help" <?php echo Linker::tooltip('help') ?>><a href="/S:MyLanguage/Help:Contents"><?php echo wfMessage( 'help' )->text() ?></a></li><?php endif; ?>
					</ul>
				</li>

				<?php if ($wgUser->isLoggedIn()): ?>
				<li id="personal-tools-dropdown" class="has-dropdown active"><a href="#"><i class="fa fa-user"></i></a>
					<ul class="dropdown">
						<?php foreach ( $this->getPersonalTools() as $key => $item ) { echo $this->makeListItem($key, $item); } ?>
					</ul>
				</li>

						<?php else: ?>
							<li>
								<?php if (isset($this->data['personal_urls']['anonlogin'])): ?>
								<a href="<?php echo $this->data['personal_urls']['anonlogin']['href']; ?>"><?php echo wfMessage( 'login' )->text() ?></a>
								<?php elseif (isset($this->data['personal_urls']['login'])): ?>
									<a href="<?php echo htmlspecialchars($this->data['personal_urls']['login']['href']); ?>"><?php echo wfMessage( 'login' )->text() ?></a>
									<?php else: ?>
										<?php echo Linker::link(Title::newFromText('Special:UserLogin'), wfMessage( 'login' )->text()); ?>
									<?php endif; ?>
							</li>

				<?php endif; ?>

			</ul>
		</section>
		</nav>
		</div>

		<div id="global-header">
		<nav class="global-header">
			<div class="row">
				<div class="large-6 column">
					<h1 class="page-title">
						<a href="<?php echo $this->data['nav_urls']['mainpage']['href']; ?>">
							<div class="title-name" style="display: inline-block;"><?php echo $wgjForegroundFeatures['wikiName']; ?></div>
						</a>
					</h1>
				</div>
				<div class="large-6 column hide-for-small">
					<ul class="button-group pull-right">
						<li><a href="https://downloads.joomla.org/" class="button success radius" target="_blank">Download</a></li>
						<li><a href="https://launch.joomla.org/" class="button top radius" target="_blank">Launch</a></li>
					</ul>
				</div>
			</div>
		</nav>
		</div>

		<div id="bottom-nav">
		<nav id="bottomnav" class="top-bar bottom row">
			<ul class="title-area">
				<li class="name">
				<h1 class="title-name-small">
				<a href="<?php echo $this->data['nav_urls']['mainpage']['href']; ?>">
				<div class="title-name" style="display:none;"><?php echo $wgjForegroundFeatures['wikiName']; ?></div>
				</a>
				</h1>
				</li>
				<li class="toggle-topbar menu-icon">
					<a href="#"><span></span></a>
				</li>
			</ul>

		<section class="top-bar-section">

			<ul id="top-bar-left" class="left">
					<?php foreach ( $this->getSidebar() as $boxName => $box ) { if ( ($box['header'] != wfMessage( 'toolbox' )->text())  ) { ?>
				<li class="has-dropdown active"  id='<?php echo Sanitizer::escapeId( $box['id'] ) ?>'<?php echo Linker::tooltip( $box['id'] ) ?>>
					<a href="#"><?php echo htmlspecialchars( $box['header'] ); ?></a>
						<?php if ( is_array( $box['content'] ) ) { ?>
							<ul class="dropdown">
								<?php foreach ( $box['content'] as $key => $item ) { echo $this->makeListItem( $key, $item ); } ?>
							</ul>
								<?php } } ?>
						<?php } ?>
			</ul>

			<ul id="top-bar-right" class="right">

				<li class="has-form">
					<form action="<?php $this->text( 'wgScript' ); ?>" id="searchform" class="mw-search">
						<div class="row">
						<div class="small-12 columns">
							<?php echo $this->makeSearchInput(array('placeholder' => wfMessage('searchsuggest-search')->text(), 'id' => 'searchInput') ); ?>
							<button type="submit" class="button search main"><?php echo wfMessage( 'search' )->text() ?></button>
						</div>
						</div>
					</form>
				</li>

			</ul>
		</section>
		</nav>
		</div>

		<?php if ($wgjForegroundFeatures['NavWrapperType'] != '0') echo "</div>"; ?>

		<div id="page-content">
		<div class="row">
				<div class="large-12 columns">
				<!--[if lt IE 9]>
				<div id="siteNotice" class="sitenotice panel radius"><?php echo $this->text('sitename') . ' '. wfMessage( 'jforeground-browsermsg' )->text(); ?></div>
				<![endif]-->

				<?php if ( $this->data['sitenotice'] ) { ?><div id="siteNotice" class="sitenotice"><?php $this->html( 'sitenotice' ); ?></div><?php } ?>
				<?php if ( $this->data['newtalk'] ) { ?><div id="usermessage" class="newtalk panel radius"><?php $this->html( 'newtalk' ); ?></div><?php } ?>
				<!-- Output page indicators -->
				<?php echo $this->getIndicators(); ?>
				<!-- If user is logged in output echo location -->
				<?php if ($wgUser->isLoggedIn()): ?>
				<div id="echo-notifications">
				<div id="echo-notifications-alerts"></div>
				<div id="echo-notifications-messages"></div>
				<div id="echo-notifications-notice"></div>
				</div>
				<?php endif; ?>
				</div>
		</div>

		<div id="mw-js-message" style="display:none;"></div>

		<div class="row">
				<div id="p-cactions" class="large-12 columns">
					<?php if ($wgUser->isLoggedIn() || $wgjForegroundFeatures['showActionsForAnon']): ?>
						<a href="#" data-dropdown="drop1" class="button dropdown small secondary radius"><i class="fa fa-cog"><span class="show-for-medium-up">&nbsp;<?php echo wfMessage( 'actions' )->text() ?></span></i></a>
						<ul id="drop1" class="views large-12 columns f-dropdown">
							<?php foreach( $this->data['content_actions'] as $key => $item ) { echo preg_replace(array('/\sprimary="1"/','/\scontext="[a-z]+"/','/\srel="archives"/'),'',$this->makeListItem($key, $item)); } ?>
							<?php if (version_compare(MW_VERSION, '1.32.0', '>=')): ?>
								<?php \Hooks::run( 'SkinTemplateToolboxEnd', array( &$this ) ); ?>
							<?php else: ?>
								<?php wfRunHooks( 'SkinTemplateToolboxEnd', array( &$this ) );  ?>
							<?php endif; ?>
						</ul>
						<?php if ($wgUser->isLoggedIn()): ?>
							<div id="echo-notifications"></div>
						<?php endif; ?>
					<?php endif;
					$namespace = str_replace('_', ' ', $this->getSkin()->getTitle()->getNsText());
					$displaytitle = $this->data['title'];
					if (!empty($namespace)) {
						$pagetitle = $this->getSkin()->getTitle();
						$newtitle = str_replace($namespace.':', '', $pagetitle);
						$displaytitle = str_replace($pagetitle, $newtitle, $displaytitle);
					?><h4 class="namespace label"><?php print $namespace; ?></h4><?php } ?>
					<article id="content">
					<h1 class="title"><?php print $displaytitle; ?></h1>
					<?php if ( $this->data['isarticle'] ) { ?><h3 id="tagline"><?php $this->msg( 'tagline' ) ?></h3>

					<div id="social">
						<!-- AddThis Button BEGIN -->
						<div class="addthis_sharing_toolbox"></div>
					<!-- moved to resource loader <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5378f70766e02197"></script> -->
					<!-- AddThis Button END -->
					</div>
					<?php } ?>

					<h5 class="subtitle"><?php $this->html('subtitle') ?></h5>

                    <?php if (!$wgUser->isLoggedIn()): ?>
						<div id="ad">
                        <script async="" type="text/javascript" src="//cdn.carbonads.com/carbon.js?zoneid=1673&serve=C6AILKT&placement=joomlaorg" id="_carbonads_js"></script>
						</div>
					<?php endif; ?>

					<div class="clear_both"></div>
					<div class="mw-bodytext">
						<?php $this->html('bodytext') ?>
						<div class="clear_both"></div>
					</div>

					<div class="group"><?php $this->html('catlinks'); ?></div>
					<?php $this->html('dataAfterContent'); ?>
					</article>
		    </div>
		</div>

			<footer class="row">
				<div id="footer">
					<div id="footer-left" class="<?php echo $footerLeftClass;?>">
					<ul id="footer-left">
						<?php foreach ( $this->getFooterLinks( "flat" ) as $key ) { ?>
							<li id="footer-<?php echo $key ?>"><?php $this->html( $key ) ?></li>
						<?php } ?>
					</ul>
					</div>
					<div id="footer-right-icons" class="<?php echo $footerRightClass;?>">
					<ul id="poweredby">
						<?php foreach ( $this->getFooterIcons( $poweredbyType ) as $blockName => $footerIcons ) { ?>
							<li class="<?php echo $blockName ?>"><?php foreach ( $footerIcons as $icon ) { ?>
								<?php echo $this->getSkin()->makeFooterIcon( $icon, $poweredbyMakeType ); ?>
								<?php } ?>
							</li>
						<?php } ?>
					</ul>
					</div>
				</div>
			</footer>

		</div>

		<?php $this->printTrail(); ?>

		</body>
		</html>

<?php
		if (version_compare(MW_VERSION, '1.34.0', '>='))
		{
			\Wikimedia\AtEase\AtEase::suppressWarnings(true);
		}
		else
		{
			wfRestoreWarnings();
		}
	}
}
?>
