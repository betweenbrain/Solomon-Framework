<?php defined('_JEXEC') or die;

/**
 * File       twoColumn.php
 * Created    1/16/13 7:11 PM
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
<h1>Two Column Layout</h1>
<?php if ($this->countModules('nav')) : ?>
<nav id="nav" class="clear clearfix">
	<jdoc:include type="modules" name="nav" style="raw" />
</nav>
<?php endif ?>

<div class="tags clearfix">
	<jdoc:include type="modules" name="tags" style="xhtml"/>
</div

<jdoc:include type="component" />

<?php
// Load common footer
if (JFile::exists($footer)) {
	include $footer;
}