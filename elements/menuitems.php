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

		$options = JHTML::_('menu.linkoptions');

		return JHTML::_('select.genericlist', $options, '' . $control_name . '[' . $name . '][]', 'class="inputbox" size="40" multiple="multiple"', 'value', 'text', $value, $control_name . $name);
	}
}