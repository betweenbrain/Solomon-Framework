<?php defined('_JEXEC') or die;

/**
 * File       default.php
 * Created    1/15/13 8:12 PM
 * Author     Matt Thomas
 * Website    http://betweenbrain.com
 * Email      matt@betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */
// Load common header
if (JFile::exists($header)) {
	include $header;
}

?>
<h1>Default Layout</h1>
<?php if ($this->countModules('nav')) : ?>
<nav id="nav" class="clear clearfix">
	<jdoc:include type="modules" name="nav" style="raw" />
</nav>
<?php endif ?>

<?php if ($this->getBuffer('message')) : ?>
<jdoc:include type="message" />
<?php endif ?>

<jdoc:include type="component" />

<?php
// Load common footer
if (JFile::exists($footer)) {
	include $footer;
}





