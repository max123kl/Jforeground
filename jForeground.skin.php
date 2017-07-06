<?php

/**
 * Skin file for jForeground
 *
 * @file
 * @ingroup Skins
 */
 

class Skinjforeground extends SkinTemplate {
	public $skinname = 'jforeground', $stylename = 'jforeground', $template = 'jforegroundTemplate', $useHeadElement = true;

	public function setupSkinUserCss(OutputPage $out) {
		parent::setupSkinUserCss($out);
		global $wgjForegroundFeatures;
		$wgjForegroundFeaturesDefaults = array(
			'showActionsForAnon' => true,
			'NavWrapperType' => 'divonly',
			'showHelpUnderTools' => true,
			'showRecentChangesUnderTools' => true,
			'wikiName' => &$GLOBALS['wgSitename'],
			'navbarIcon' => false,
			'IeEdgeCode' => 1,
			'showFooterIcons' => 1,
			'addThisFollowPUBID' => 'ra-5378f70766e02197'
		);
		foreach ($wgjForegroundFeaturesDefaults as $fgOption => $fgOptionValue) {
			if ( !isset($wgjForegroundFeatures[$fgOption]) ) {
				$wgjForegroundFeatures[$fgOption] = $fgOptionValue;
			}
		}
		switch ($wgjForegroundFeatures['IeEdgeCode']) {
			case 1:
				$out->addHeadItem('ie-meta', '<meta http-equiv="X-UA-Compatible" content="IE=edge" />');
				break;
			case 2:
				if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
					header('X-UA-Compatible: IE=edge');
				break;
		}
		$out->addModuleStyles('skins.jforeground');
	}

	public function initPage( OutputPage $out ) {
		global $wgLocalStylePath;
		parent::initPage($out);

		$viewport_meta = 'width=device-width, user-scalable=yes, initial-scale=1.0';
	  $out->addMeta('viewport', $viewport_meta);
		$out->addModuleScripts('skins.jforeground');
	}

}

class jforegroundTemplate extends BaseTemplate {
	public function execute() {
		global $wgUser;
		global $wgjForegroundFeatures;
		wfSuppressWarnings();
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
							<li class="divider"></li>
							<li id="label"><label>Support Joomla!</label></li>
                            <li id="n-sidebar-Contribute"><a href="https://www.joomla.org/contribute-to-joomla.html">Contribute</a></li>
                            <li id="n-sidebar-Shop"><a href="https://shop.joomla.org/">The Joomla! Shop</a></li>
                            <li id="n-sidebar-Sponsorship"><a href="https://www.joomla.org/sponsor.html">Sponsorship</a></li>
							<li id="label"><label>Try Joomla!</label></li>
							<li id="n-sidebar-Demo"><a href="https://demo.joomla.org">Demo</a></li>
							<li id="n-sidebar-Free-Hosted"><a href="https://www.joomla.com">Free Hosted Website</a></li>
						</ul>
				</li>					
				<li class="has-dropdown active" id="p-sidebar-About">
					<a href="#">About</a>
						<ul class="dropdown">
							<li id="n-sidebar-About"><a href="https://www.joomla.org/about-joomla.html">About Joomla!</a></li>
							<li id="n-sidebar-Features"><a href="https://www.joomla.org/core-features.html">Core Features</a></li>
							<li id="n-sidebar-Project"><a href="https://www.joomla.org/about-joomla/the-project.html">The Project</a></li>
							<li id="n-sidebar-Shop"><a href="https://www.joomla.org/about-joomla/the-project/leadership-team.html">Leadership</a></li>
							<li id="n-sidebar-OSM"><a href="http://opensourcematters.org">Open Source Matters</a></li>
						</ul>
				</li>
				<li class="has-dropdown active" id="p-sidebar-Extend">
					<a href="#">Download & Extend</a>
						<ul class="dropdown">
							<li id="n-sidebar-JoomlaCode"><a href="https://downloads.joomla.org/">Joomla! Downloads</a></li>
							<li id="n-sidebar-Extensions"><a href="http://extensions.joomla.org/">Extensions Directory</a></li>
							<li id="n-sidebar-Translations"><a href="https://community.joomla.org/translations.html">Languages Packages</a></li>
							<li id="n-sidebar-Showcase"><a href="https://showcase.joomla.org/">Showcase Directory</a></li>
							<li id="n-sidebar-Certification"><a href="https://certification.joomla.org/">Certification Program</a></li>
						</ul>
				</li>
                		<li class="has-dropdown active" id="p-sidebar-News">
					<a href="#">News</a>
						<ul class="dropdown">
							<li id="n-sidebar-Announcements"><a href="https://www.joomla.org/announcements.html">Announcements</a></li>
							<li id="n-sidebar-Blogs"><a href="https://community.joomla.org/blogs.html">Blogs</a></li>
							<li id="n-sidebar-Magazine"><a href="http://magazine.joomla.org/">Magazine</a></li>
							<li id="n-sidebar-Connect"><a href="https://community.joomla.org/connect.html">Joomla! Connect</a></li>
							<li id="n-sidebar-Mailing"><a href="https://www.joomla.org/mailing-lists.html">Mailing Lists</a></li>
						</ul>
				</li>
				<li class="has-dropdown active" id="p-sidebar-Community">
					<a href="#">Community</a>
						<ul class="dropdown">
							<li id="n-sidebar-Community"><a href="https://community.joomla.org/">Community Portal</a></li>
							<li id="n-sidebar-Events"><a href="https://events.joomla.org/">Joomla! Events</a></li>
							<li id="n-sidebar-TM"><a href="https://tm.joomla.org/">Trademark &amp; Licensing</a></li>
							<li id="n-sidebar-JUGs"><a href="https://community.joomla.org/user-groups.html">User Groups</a></li>
							<li id="n-sidebar-Showcase"><a href="https://showcase.joomla.org/">Showcase Directory</a></li>
							<li id="n-sidebar-Volunteers"><a href="https://volunteers.joomla.org/">Volunteers Portal</a></li>
						</ul>
				</li>
				<li class="has-dropdown active" id="p-sidebar-Support">
					<a href="#">Support</a>
						<ul class="dropdown">
							<li id="n-sidebar-Forum"><a href="http://forum.joomla.org/">Forum</a></li>
							<li id="n-sidebar-Docs"><a href="https://docs.joomla.org">Documentation</a></li>
							<li id="n-sidebar-Issues"><a href="https://issues.joomla.org/">Issue Tracker</a></li>
							<li id="n-sidebar-Resources"><a href="http://resources.joomla.org/">Resources Directory</a></li>
                            <li id="n-sidebar-Training"><a href="https://community.joomla.org/joomla-training.html">Joomla! Training</a></li>
						</ul>
				</li>
				<li class="has-dropdown active" id="p-sidebar-Developers">
					<a href="#">Developers</a>
						<ul class="dropdown">
							<li id="n-sidebar-Developers"><a href="https://developer.joomla.org/">Developer Network</a></li>
							<li id="n-sidebar-DevDocs"><a href="https://docs.joomla.org/Main_Page">Documentation</a></li>
							<li id="n-sidebar-BugSquad"><a href="https://docs.joomla.org/Bug_Squad">Bug Squad</a></li>
                            <li id="n-sidebar-Security"><a href="https://developer.joomla.org/security-centre.html">Security Centre</a></li>
							<li id="n-sidebar-API"><a href="https://api.joomla.org/">API Documentation</a></li>
							<li id="n-sidebar-JoomlaCode"><a href="http://joomlacode.org/">JoomlaCode</a></li>
							<li id="n-sidebar-Framework"><a href="https://framework.joomla.org/">Joomla! Framework</a></li>
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
						<li><a href="https://demo.joomla.org/" class="button top radius" target="_blank">Demo</a></li>
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
							<?php wfRunHooks( 'SkinTemplateToolboxEnd', array( &$this ) );  ?>
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
					<div class="clear_both"></div>
					<div class="mw-bodytext">
						<?php $this->html('bodytext') ?>
						<div class="clear_both"></div>
					</div>

					<?php if (!$wgUser->isLoggedIn()): ?>
										
					<div id="google-adsense-container">
					<small class="muted">Advertisement</small><br /><ins data-revive-zoneid="57" data-revive-id="4bacaeba2f8655edc9ca810c946aab5a"></ins>
					</div>
					<script async="" src="//ads.joomla.org/www/delivery/asyncjs.php"></script>
					
					<?php endif; ?>

					<div class="group"><?php $this->html('catlinks'); ?></div>
					<?php $this->html('dataAfterContent'); ?>
					</article>
		    </div>
		</div>

			<footer class="row">
				<div id="footer">
					<?php if ($wgjForegroundFeatures['addThisFollowPUBID'] != '') { ?>
						<div class="social-footer large-12 small-12 columns">
							<div class="social-links">
							<!-- Go to www.addthis.com/dashboard to customize your tools -->
							<div class="addthis_horizontal_follow_toolbox"></div>
							</div>
						</div>
					<?php } ?>
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
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?php echo $wgjForegroundFeatures['addThisFollowPUBID'];?>" async="async"></script>
		</body>
		</html>

<?php
		wfRestoreWarnings();
	}
}
?>