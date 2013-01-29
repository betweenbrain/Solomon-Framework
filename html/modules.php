<?php defined('_JEXEC') or die;

/**
 * File       modules.php
 * Created    1/17/13 2:21 PM
 * Author     Matt Thomas
 * Website    http://betweenbrain.com
 * Email      matt@betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

function getTopLevelMenuTitle($module) {
	$app    = JFactory::getApplication();
	$menu   = $app->getMenu();
	$active = ($menu->getActive()) ? $menu->getActive() : $menu->getDefault();
	$items  = $menu->getItems('id', $active->tree[0]);

	return (count($items) == 1) ? $items[0]->title : $module->title;
}

function dynamicMenuTitle($module, $params) {
	$isDynamic = strpos($params->get('moduleclass_sfx'), 'dynamic');
	if ($isDynamic) {
		$moduleTitle = getTopLevelMenuTitle($module);
	} else {
		$moduleTitle = $module->title;
	}

	return $moduleTitle;
}

function modChrome_div($module, $params, $attribs) {
	$id          = isset($attribs['id']) ? $attribs['id'] : NULL;
	$headerLevel = isset($attribs['level']) ? (int) $attribs['level'] : 3;
	$headerClass = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass = isset($attribs['module-class']) ? $attribs['module-class'] : NULL;
	$moduleTitle = dynamicMenuTitle($module, $params);

	if (!empty($module->content)) : ?>
	<div <?php if ($id) {
		echo 'id="' . $id . '"';
	} ?> class="moduletable<?php echo $params->get('moduleclass_sfx') ?><?php if ($moduleClass) {
		echo ' ' . $moduleClass;
	} ?>">
		<?php if ($module->showtitle) : ?>
                <h<?php echo $headerLevel ?> class="<?php echo $headerClass ?>"><?php echo $moduleTitle ?><?php echo '</h' . $headerLevel ?>>
		<?php endif ?>
		<?php echo $module->content ?>
	</div>
	<?php endif;
}

function modChrome_aside($module, $params, $attribs) {
	$id          = isset($attribs['id']) ? $attribs['id'] : NULL;
	$headerLevel = isset($attribs['level']) ? (int) $attribs['level'] : 3;
	$headerClass = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass = isset($attribs['module-class']) ? $attribs['module-class'] : NULL;
	$moduleTitle = dynamicMenuTitle($module, $params);

	if (!empty($module->content)) : ?>
	<aside <?php if ($id) {
		echo 'id="' . $id . '"';
	} ?> class="moduletable<?php echo $params->get('moduleclass_sfx') ?><?php if ($moduleClass) {
		echo ' ' . $moduleClass;
	} ?>">
		<?php if ($module->showtitle) : ?>
                <h<?php echo $headerLevel ?> class="<?php echo $headerClass ?>"><?php echo $moduleTitle ?><?php echo '</h' . $headerLevel ?>>
		<?php endif ?>
		<?php echo $module->content ?>
	</aside>
	<?php endif;
}

function modChrome_figure($module, $params, $attribs) {
	$id          = isset($attribs['id']) ? $attribs['id'] : NULL;
	$headerLevel = isset($attribs['level']) ? (int) $attribs['level'] : 3;
	$headerClass = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass = isset($attribs['module-class']) ? $attribs['module-class'] : NULL;
	$moduleTitle = dynamicMenuTitle($module, $params);

	if (!empty($module->content)) : ?>
	<figure <?php if ($id) {
		echo 'id="' . $id . '"';
	} ?> class="moduletable<?php echo $params->get('moduleclass_sfx') ?><?php if ($moduleClass) {
		echo ' ' . $moduleClass;
	} ?>">
		<?php if ($module->showtitle) : ?>
                <h<?php echo $headerLevel ?> class="<?php echo $headerClass ?>"><?php echo $moduleTitle ?><?php echo '</h' . $headerLevel ?>>
		<?php endif ?>
		<?php echo $module->content ?>
	</figure>
	<?php endif;
}

function modChrome_footer($module, $params, $attribs) {
	$id          = isset($attribs['id']) ? $attribs['id'] : NULL;
	$headerLevel = isset($attribs['level']) ? (int) $attribs['level'] : 3;
	$headerClass = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass = isset($attribs['module-class']) ? $attribs['module-class'] : NULL;
	$moduleTitle = dynamicMenuTitle($module, $params);

	if (!empty($module->content)) : ?>
	<footer <?php if ($id) {
		echo 'id="' . $id . '"';
	} ?> class="moduletable<?php echo $params->get('moduleclass_sfx') ?><?php if ($moduleClass) {
		echo ' ' . $moduleClass;
	} ?>">
		<?php if ($module->showtitle) : ?>
                <h<?php echo $headerLevel ?> class="<?php echo $headerClass ?>"><?php echo $moduleTitle ?><?php echo '</h' . $headerLevel ?>>
		<?php endif ?>
		<?php echo $module->content ?>
	</footer>
	<?php endif;
}

function modChrome_header($module, $params, $attribs) {
	$id          = isset($attribs['id']) ? $attribs['id'] : NULL;
	$headerLevel = isset($attribs['level']) ? (int) $attribs['level'] : 3;
	$headerClass = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass = isset($attribs['module-class']) ? $attribs['module-class'] : NULL;
	$moduleTitle = dynamicMenuTitle($module, $params);

	if (!empty($module->content)) : ?>
	<header <?php if ($id) {
		echo 'id="' . $id . '"';
	} ?> class="moduletable<?php echo $params->get('moduleclass_sfx') ?><?php if ($moduleClass) {
		echo ' ' . $moduleClass;
	} ?>">
		<?php if ($module->showtitle) : ?>
                <h<?php echo $headerLevel ?> class="<?php echo $headerClass ?>"><?php echo $moduleTitle ?><?php echo '</h' . $headerLevel ?>>
		<?php endif ?>
		<?php echo $module->content ?>
	</header>
	<?php endif;
}

function modChrome_nav($module, $params, $attribs) {
	$id          = isset($attribs['id']) ? $attribs['id'] : NULL;
	$headerLevel = isset($attribs['level']) ? (int) $attribs['level'] : 3;
	$headerClass = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass = isset($attribs['module-class']) ? $attribs['module-class'] : NULL;
	$moduleTitle = dynamicMenuTitle($module, $params);

	if (!empty($module->content)) : ?>
	<nav <?php if ($id) {
		echo 'id="' . $id . '"';
	} ?> class="moduletable<?php echo $params->get('moduleclass_sfx') ?><?php if ($moduleClass) {
		echo ' ' . $moduleClass;
	} ?>">
		<?php if ($module->showtitle) : ?>
                <h<?php echo $headerLevel ?> class="<?php echo $headerClass ?>"><?php echo $moduleTitle ?><?php echo '</h' . $headerLevel ?>>
		<?php endif ?>
		<?php echo $module->content ?>
	</nav>
	<?php endif;
}

function modChrome_section($module, $params, $attribs) {
	$id          = isset($attribs['id']) ? $attribs['id'] : NULL;
	$headerLevel = isset($attribs['level']) ? (int) $attribs['level'] : 3;
	$headerClass = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass = isset($attribs['module-class']) ? $attribs['module-class'] : NULL;
	$moduleTitle = dynamicMenuTitle($module, $params);

	if (!empty($module->content)) : ?>
	<section <?php if ($id) {
		echo 'id="' . $id . '"';
	} ?> class="moduletable<?php echo $params->get('moduleclass_sfx') ?><?php if ($moduleClass) {
		echo ' ' . $moduleClass;
	} ?>">
		<?php if ($module->showtitle) : ?>
                <h<?php echo $headerLevel ?> class="<?php echo $headerClass ?>"><?php echo $moduleTitle ?><?php echo '</h' . $headerLevel ?>>
		<?php endif ?>
		<?php echo $module->content ?>
	</section>
	<?php endif;
}