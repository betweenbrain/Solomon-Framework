<?php defined('_JEXEC') or die;

/**
 * File       index.php
 * Created    1/15/13 8:16 PM
 * Author     Matt Thomas
 * Website    http://betweenbrain.com
 * Email      matt@betweenbrain.com
 * Support    https://github.com/betweenbrain/cloaked-sansa/issues
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
$header = JPATH_THEMES . '/' . $this->template . '/layouts/header.php';
$footer = JPATH_THEMES . '/' . $this->template . '/layouts/footer.php';
$layout = $layout->getIncludeFile();

// Load template header
if (JFile::exists($header)) {
	include $header;
}

// Load template body, see line 221 of logic.php
if ($layout) {
	include $layout;
}

// Load footer
if (JFile::exists($footer)) {
	include $footer;
}