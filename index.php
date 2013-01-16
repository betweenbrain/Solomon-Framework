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

// Load template logic
$logic   = JPATH_THEMES . '/' . $this->template . '/elements/logic.php';
$header  = JPATH_THEMES . '/' . $this->template . '/layouts/header.php';
$default = JPATH_THEMES . '/' . $this->template . '/layouts/default.php';
$footer  = JPATH_THEMES . '/' . $this->template . '/layouts/footer.php';

if (JFile::exists($logic)) {
	include $logic;
}
if (JFile::exists($header)) {
	include $header;
}

// Layouts
$layout = $layoutOverride->getIncludeFile();

if ($layout) {
	include_once $layout;
} else {
	include_once $default;
}

if (JFile::exists($footer)) {
	include $footer;
}