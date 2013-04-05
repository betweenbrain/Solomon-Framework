<?php defined('_JEXEC') or die;

/**
 * File       video.php
 * Created    1/17/13 11:49 AM
 * Author     Matt Thomas
 * Website    http://betweenbrain.com
 * Email      matt@betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

$doc->addStyleSheet($template . '/css/video.css', 'text/css', 'screen');
$doc->addScript($template . '/js/jquery.gugg-video.js');

// Load common header
if (JFile::exists($header)) {
	include $header;
}

?>
<header>
	<div class="top-edge">
		<span class="red"></span><span class="gold"></span><span class="teal"></span><span class="blue"></span><span class="gold"></span><span class="green"></span>
	</div>
	<div class="container">
		<?php if ($this->countModules('nav')) : ?>
			<nav class="clear clearfix">
				<jdoc:include type="modules" name="nav" style="raw" />
			</nav>
		<?php endif ?>
	</div>
</header>

	<div class="container">

		<?php if ($this->getBuffer('message')) : ?>
			<jdoc:include type="message" />
		<?php endif ?>

		<jdoc:include type="modules" name="tags" style="xhtml" />

		<jdoc:include type="component" />
		<?php // Load modules onlly if K2 view is an itemlist (category)
		if (JRequest::getCmd('view', 0) == "itemlist" && JRequest::getCmd('option') == "com_k2") : ?>
			<div id="content-below" class="clearfix <?php echo $contentBelowClass ?>">
				<?php if ($this->countModules('content-below-1')) : ?>
					<div class="content-below-1 clearfix">
						<jdoc:include type="modules" name="content-below-1" style="xhtml" />
					</div>
				<?php endif ?>

				<?php if ($this->countModules('content-below-2')) : ?>
					<div class="content-below-2 clearfix">
						<jdoc:include type="modules" name="content-below-2" style="xhtml" />
					</div>
				<?php endif ?>

				<?php if ($this->countModules('content-below-3')) : ?>
					<div class="content-below-3 clearfix">
						<jdoc:include type="modules" name="content-below-3" style="xhtml" />
					</div>
				<?php endif ?>

				<?php if ($this->countModules('content-below-4')) : ?>
					<div class="content-below-4 clearfix">
						<jdoc:include type="modules" name="content-below-4" style="xhtml" />
					</div>
				<?php endif ?>

				<?php if ($this->countModules('content-below-5')) : ?>
					<div class="content-below-5 clearfix">
						<jdoc:include type="modules" name="content-below-5" style="xhtml" />
					</div>
				<?php endif ?>

				<?php if ($this->countModules('content-below-6')) : ?>
					<div class="content-below-6 clearfix">
						<jdoc:include type="modules" name="content-below-6" style="xhtml" />
					</div>
				<?php endif ?>
			</div>
		<?php endif ?>
	</div>
<?php
// Load common footer
if (JFile::exists($footer)) {
	include $footer;
}