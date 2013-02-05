<?php
/**
 * @version        $Id: tags.php 1812 2013-01-14 18:45:06Z lefteris.kavadas $
 * @package        K2
 * @author         JoomlaWorks http://www.joomlaworks.net
 * @copyright      Copyright (c) 2006 - 2013 JoomlaWorks Ltd. All rights reserved.
 * @license        GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k<?php if ($params->get('moduleclass_sfx')) {
	echo ' ' . $params->get('moduleclass_sfx');
} ?>">
	<ul>
		<?php foreach ($tags as $tag): ?>
		<?php if (!empty($tag->tag)): ?>
			<li>
				<a href="<?php echo $tag->link; ?>" title="<?php echo $tag->count . ' ' . JText::_('K2_ITEMS_TAGGED_WITH') . ' ' . K2HelperUtilities::cleanHtml($tag->tag); ?>"><?php echo $tag->tag; ?></a>
				<?php echo $tag->count ?>
			</li>
			<?php endif; ?>
		<?php endforeach; ?>
	</ul>
	<div class="clr"></div>
</div>
