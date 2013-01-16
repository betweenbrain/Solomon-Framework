<?php defined('_JEXEC') or die;

/**
 * File       categories.php
 * Created    1/15/13 10:21 PM
 * Author     Matt Thomas
 * Website    http://betweenbrain.com
 * Email      matt@betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

class JElementMenuitems extends JElement {

	var $_name = 'Menuitems';

	function fetchElement($name, $value, &$node, $control_name) {
		$db = & JFactory::getDBO();

		/*
		$section  = $node->attributes('section');
		$class    = $node->attributes('class');
		if (!$class) {
		  $class = "inputbox";
		}

		if (!isset ($section)) {
		  // alias for section
		  $section = $node->attributes('scope');
		  if (!isset ($section)) {
			$section = 'content';
		  }
		}

		if ($section == 'content') {
		  // This might get a conflict with the dynamic translation
		  // - TODO: search for better solution
		  $query = 'SELECT c.id AS value, CONCAT_WS( "/",s.title, c.title ) AS text' .
			' FROM #__categories AS c' .
			' LEFT JOIN #__sections AS s ON s.id=c.section' .
			' WHERE c.published = 1' .
			' AND s.scope = '.$db->Quote($section).
			' ORDER BY s.title, c.title';
		} else {
		  $query = 'SELECT c.id AS value, c.title AS text' .
			' FROM #__categories AS c' .
			' WHERE c.published = 1' .
			' AND c.section = '.$db->Quote($section).
			' ORDER BY c.title';
		}
		*/

		$query = 'SELECT id AS value, name AS text' .
			' FROM #__menu';

		$db->setQuery($query);
		$options = $db->loadObjectList();

		return JHTML::_('select.genericlist', $options, '' . $control_name . '[' . $name . '][]', 'class="inputbox" size="25" multiple="multiple"', 'value', 'text', $value, $control_name . $name);
	}
}