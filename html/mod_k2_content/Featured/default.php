<?php defined('_JEXEC') or die;
/**
 * @version        $Id: default.php 1766 2012-11-22 14:10:24Z lefteris.kavadas $
 * @package        K2
 * @author         JoomlaWorks http://www.joomlaworks.net
 * @copyright      Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license        GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="featured k2ItemsBlock<?php if ($params->get('moduleclass_sfx')) {
	echo ' ' . $params->get('moduleclass_sfx');
} ?>">
	<?php if ($params->get('itemPreText')): ?>
	<p class="modulePretext"><?php echo $params->get('itemPreText'); ?></p>
	<?php endif; ?>
	<?php if (count($items)): ?>
	<ol>
		<?php foreach ($items as $key => $item): ?>
		<?php // test if not leading item and is odd
		if (($key != 0) && ($key & 1)) : ?>
		<li class="block">
			<ul>
		<?php endif ?>
		<li class="<?php echo ($key % 2) ? "odd" : "even"; if ($key == 0) {
			echo ' featured';
		}    if (count($items) == $key + 1) {
			echo ' last';
		}?>">
			<?php
			$videoImage    = $item->videoImage;
			$videoDuration = $item->videoDuration;
			?>
			<a href="<?php echo $item->link; ?>"><img src="<?php echo  $item->videoImage;?>" title="<?php echo $item->title; ?>" />
				<p class="title"><?php echo '<span class="order">' . ($key + 1) . '</span>' . $item->title . '<span class="duration">' . $videoDuration . '</span>'?></p>
			</a>
		</li>
		<?php // test if not leading item and is even
		if (($key != 0) && ($key % 2 == 0)) : ?>
			</ul>
		</li>
		<?php endif ?>

		<?php endforeach; ?>
	</ol>
	<?php endif; ?>
</div>
