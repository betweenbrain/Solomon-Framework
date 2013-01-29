<?php defined('_JEXEC') or die;
/**
 * @version        $Id: default.php 1766 2012-11-22 14:10:24Z lefteris.kavadas $
 * @package        K2
 * @author         JoomlaWorks http://www.joomlaworks.net
 * @copyright      Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license        GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2ItemsBlock<?php if ($params->get('moduleclass_sfx')) {	echo ' ' . $params->get('moduleclass_sfx');} ?>">

	<?php if ($params->get('itemPreText')): ?>
	<p class="modulePretext"><?php echo $params->get('itemPreText'); ?></p>
	<?php endif; ?>

	<?php if (count($items)): ?>
	<ul>
		<?php foreach ($items as $key => $item): ?>
		<li class="<?php
			echo ($key % 2) ? "odd" : "even";
			if ($key == 0) {
				echo ' first';
			}
			if (count($items) == $key + 1) {
				echo ' last';
			}
			?>">

			<!-- Plugins: BeforeDisplay -->
			<?php echo $item->event->BeforeDisplay; ?>

			<!-- K2 Plugins: K2BeforeDisplay -->
			<?php echo $item->event->K2BeforeDisplay; ?>

			<!-- K2 Plugin: K2VideoData -->
			<?php
			$videoImage    = $item->videoImage;
			$videoDuration = $item->videoDuration;
			?>

			<img src="<?php echo  $item->videoImage;?>" title="<?php echo $item->title; ?>" />

			<p><?php echo $item->title; ?> <?php echo $videoDuration ?></p>

			<!-- Plugins: AfterDisplayTitle -->
			<?php echo $item->event->AfterDisplayTitle; ?>

			<!-- K2 Plugins: K2AfterDisplayTitle -->
			<?php echo $item->event->K2AfterDisplayTitle; ?>

			<!-- Plugins: BeforeDisplayContent -->
			<?php echo $item->event->BeforeDisplayContent; ?>

			<!-- K2 Plugins: K2BeforeDisplayContent -->
			<?php echo $item->event->K2BeforeDisplayContent; ?>

			<!-- Plugins: AfterDisplayContent -->
			<?php echo $item->event->AfterDisplayContent; ?>

			<!-- K2 Plugins: K2AfterDisplayContent -->
			<?php echo $item->event->K2AfterDisplayContent; ?>

			<!-- Plugins: AfterDisplay -->
			<?php echo $item->event->AfterDisplay; ?>

			<!-- K2 Plugins: K2AfterDisplay -->
			<?php echo $item->event->K2AfterDisplay; ?>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>

</div>
