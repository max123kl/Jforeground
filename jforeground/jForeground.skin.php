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
		<nav class="top-bar top row">
			<ul class="title-area">
				<li class="name logo">
					<?php if ($wgForegroundFeatures['navbarIcon'] != '0') { ?>
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
							<li id="n-sidebar-Main"><a href="http://www.joomla.org"><i class="fa fa-joomla 2x-fa icon"></i>Joomla! Home</a></li>
							<li class="divider"></li>
							<li id="label"><label>Recent News</label></li>
							<li id="n-sidebar-Announce"><a href="http://www.joomla.org/announcements.html">Announcements</a></li>
							<li id="n-sidebar-Blogs"><a href="http://community.joomla.org/blogs/community.html">Blogs</a></li>
							<li id="n-sidebar-DeveloperNews"><a href="http://developer.joomla.org/news.html">Developer News</a></li>
							<li class="divider"></li>
							<li id="label"><label>Support Joomla!</label></li>
							<li id="n-sidebar-Shop"><a href="http://shop.joomla.org">Shop Joomla! Gear</a></li>
							<li id="n-sidebar-Contribute"><a href="http://opensourcematters.org/joomla/support-joomla.html">Contributions</a></li>						
						</ul>
				</li>
				<li class="has-dropdown active" id="p-sidebar-About">
					<a href="#"></i>About</a>
						<ul class="dropdown">
							<li id="n-sidebar-About"><a href="http://www.joomla.org/about-joomla.html">About Joomla!</a></li>
							<li id="n-sidebar-Features"><a href="http://www.joomla.org/core-features.html">Core Features</a></li>
							<li id="n-sidebar-Project"><a href="http://www.joomla.org/about-joomla/the-project.html">The Project</a></li>
							<li id="n-sidebar-Shop"><a href="http://www.joomla.org/about-joomla/the-project/leadership-team.html">Leadership</a></li>
							<li id="n-sidebar-Developers"><a href="http://opensourcematters.org/joomla/support-joomla.html">Open Source Matters</a></li>						
						</ul>
				</li>
				<li class="has-dropdown active" id="p-sidebar-Community">
					<a href="#"></i>Community</a>
						<ul class="dropdown">
							<li id="n-sidebar-Community"><a href="http://community.joomla.org">Joomla! Community Portal</a></li>
							<li id="n-sidebar-Events"><a href="http://events.joomla.org">Joomla! Events</a></li>
							<li id="n-sidebar-JUX"><a href="http://ux.joomla.org">Joomla! UX</a></li>
							<li id="n-sidebar-JUGs"><a href="http://community.joomla.org/user-groups.html">Joomla! User Groups</a></li>
							<li id="n-sidebar-Volunteers"><a href="http://volunteers.joomla.org">Joomla! Volunteers Portal</a></li>
						</ul>
				</li>
				<li class="has-dropdown active" id="p-sidebar-Support">
					<a href="#"></i>Support</a>
						<ul class="dropdown">
							<li id="n-sidebar-Forum"><a href="http://forum.joomla.org/">Joomla! Forum</a></li>
							<li id="n-sidebar-Docs"><a href="https://docs.joomla.org">Joomla! Documentation</a></li>
							<li id="n-sidebar-Issues"><a href="http://issues.joomla.org">Joomla! Issue Tracker</a></li>
							<li id="n-sidebar-Resources"><a href="http://resources.joomla.org/">Joomla! Resources</a></li>
						</ul>
				</li>
				<li class="has-dropdown active" id="p-sidebar-Read">
					<a href="#"></i>Read</a>
						<ul class="dropdown">
							<li id="n-sidebar-Magazine"><a href="http://magazine.joomla.org">Joomla! Magazine</a></li>
							<li id="n-sidebar-Connect"><a href="http://community.joomla.org/connect.html">Joomla! Connect</a></li>
							<li id="n-sidebar-MailLists"><a href="http://www.joomla.org/mailing-lists.html">Joomla! Mailing Lists</a></li>
						</ul>
				</li>
				<li class="has-dropdown active" id="p-sidebar-Extend">
					<a href="#"></i>Extend</a>
						<ul class="dropdown">
							<li id="n-sidebar-Extensions"><a href="http://extensions.joomla.org">Extensions</a></li>
							<li id="n-sidebar-Showcase"><a href="http://community.joomla.org/showcase">Showcase Directory</a></li>
							<li id="n-sidebar-Translations"><a href="http://community.joomla.org/translations.html">Translations</a></li>
							<li id="n-sidebar-Ideas"><a href="http://ideas.joomla.org">Ideas</a></li>
						</ul>
				</li>
				<li class="has-dropdown active" id="p-sidebar-Developers">
					<a href="#"></i>Developers</a>
						<ul class="dropdown">
							<li id="n-sidebar-Developers"><a href="http://developer.joomla.org">Joomla! Developers</a></li>
							<li id="n-sidebar-Framework"><a href="http://framework.joomla.org">Joomla! Framework</a></li>
							<li id="n-sidebar-DevDocs"><a href="https://docs.joomla.org/Portal:Developers">Developer Documentation</a></li>
							<li id="n-sidebar-BugSquad"><a href="https://docs.joomla.org/Bug_Squad">Bug Squad</a></li>
							<li id="n-sidebar-API"><a href="https://api.joomla.org/">Joomla! API</a></li>
							<li id="n-sidebar-JoomlaCode"><a href="http://joomlacode.org/">JoomlaCode</a></li>
						</ul>
				</li>
			</ul>

			<ul id="top-bar-right" class="right">

				<li class="has-dropdown active"><a href="#"><i class="fa fa-cogs"></i></a>
					<ul id="toolbox-dropdown" class="dropdown">
						<?php foreach ( $this->getToolbox() as $key => $item ) { echo $this->makeListItem($key, $item); } ?>
						<?php if ($wgjForegroundFeatures['showRecentChangesUnderTools']): ?><li id="n-recentchanges"><?php echo Linker::specialLink('Recentchanges') ?></li><?php endif; ?>
						<?php if ($wgjForegroundFeatures['showHelpUnderTools']): ?><li id="n-help" <?php echo Linker::tooltip('help') ?>><a href="/wiki/Help:Contents"><?php echo wfMessage( 'help' )->text() ?></a></li><?php endif; ?>
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
				<div class="large-7 column">
					<h1 class="page-title">
										<a href="<?php echo $this->data['nav_urls']['mainpage']['href']; ?>">
					<?php if ($wgjForegroundFeatures['navbarIcon'] != '0') { ?>
						<img alt="<?php echo $this->text('sitename'); ?>" src="<?php echo $this->text('logopath') ?>" style="max-width: 64px;height:auto; max-height:36px; display: inline-block; vertical-align:middle;">
					<?php } ?>					
					<div class="title-name" style="display: inline-block;"><?php echo $wgjForegroundFeatures['wikiName']; ?></div>
					</a>
					</h1> 
				</div>
				<div class="large-5 column hide-for-small">
					<ul class="button-group pull-right">
						<li><a href="http://www.joomla.org/download.html" class="button success radius">Download <span class="hide-for-medium">Joomla</span></a></li>
						<li><a href="http://demo.joomla.org/" class="button top radius">Demo <span class="hide-for-medium">Joomla</span></a></li>
					</ul>
				</div>
			</div>
		</nav>
		</div>
		
		<div id="bottom-nav">
		<nav class="top-bar bottom row">
			<ul class="title-area">
				<li class="name">
				</li>
				<li class="toggle-topbar menu-icon">
					<a href="#"><span> </span></a>
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
				</div>
		</div>

		<div id="mw-js-message" style="display:none;"></div>

		<div class="row">
				<div id="p-cactions" class="large-12 columns">
					<?php if ($wgUser->isLoggedIn() || $wgjForegroundFeatures['showActionsForAnon']): ?>
						<a href="#" data-dropdown="drop1" class="button dropdown small secondary radius"><i class="fa fa-cog"><span class="show-for-medium-up">&nbsp;<?php echo wfMessage( 'actions' )->text() ?></span></i></a>
						<ul id="drop1" class="views large-12 columns f-dropdown">
							<?php foreach( $this->data['content_actions'] as $key => $item ) { echo preg_replace(array('/\sprimary="1"/','/\scontext="[a-z]+"/','/\srel="archives"/'),'',$this->makeListItem($key, $item)); } ?>
							<?php wfRunHooks( SkinTemplateToolboxEnd, array( &$this, true ) );  ?>
						</ul>
						<?php if ($wgUser->isLoggedIn()): ?>
							<div id="echo-notifications" class="nomobile"></div>
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
						<div class="addthis_toolbox addthis_default_style addthis_16x16_style">
						<a class="addthis_button_twitter"></a>
						<a class="addthis_button_facebook"></a>
						<a class="addthis_button_google_plusone_share"></a>
						<a class="addthis_button_linkedin"></a>
						<a class="addthis_button_pinterest_share"></a>
						<a class="addthis_button_email"></a>
						<a class="addthis_button_compact"></a><a class="addthis_counter addthis_bubble_style"></a>
						</div>
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
							<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?php echo $wgjForegroundFeatures['addThisFollowPUBID'];?>"></script>
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
		</body>
		</html>

<?php
		wfRestoreWarnings();
	}
}
?>