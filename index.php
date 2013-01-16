<?php

/**
 * File       index.php
 * Created    1/15/13 8:16 PM
 * Author     Matt Thomas
 * Website    http://betweenbrain.com
 * Email      matt@betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

// Load Joomla filesystem package
jimport('joomla.filesystem.file');

$logic = JPATH_THEMES . '/' . $this->template . '/elements/logic.php';

// Load logic
if (JFile::exists($logic)) {
	include_once $logic;
}

// Template
$header          = JPATH_THEMES . '/' . $this->template . '/layouts/header.php';
$default         = JPATH_THEMES . '/' . $this->template . '/layouts/default.php';
$footer          = JPATH_THEMES . '/' . $this->template . '/layouts/footer.php';
$override        = $layoutOverride->getIncludeFile();
$twoColumn       = $this->params->get('twoColumnLayout');
$twoColumnLayout = JPATH_THEMES . '/' . $this->template . '/layouts/twoColumn.php';

// Load template header
if (JFile::exists($header)) {
	include $header;
}

// Load template body
if (in_array($itemId, $twoColumn) && JFile::exists($twoColumnLayout)) {
	include $twoColumnLayout;
} elseif ($override) {
	include $override;
} else {
	include $default;
}

// Load footer
if (JFile::exists($footer)) {
	include $footer;
}