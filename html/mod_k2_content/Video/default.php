<?php defined('_JEXEC') or die;
/**
 * @version        $Id: default.php 1766 2012-11-22 14:10:24Z lefteris.kavadas $
 * @package        K2
 * @author         JoomlaWorks http://www.joomlaworks.net
 * @copyright      Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license        GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

?>

<div id="k2ModuleBox<?php echo $module->id; ?>" class="k2ItemsBlock<?php if ($params->get('moduleclass_sfx')) {
	echo ' ' . $params->get('moduleclass_sfx');
} ?>">
	<?php if ($params->get('itemPreText')): ?>
	<p class="modulePretext"><?php echo $params->get('itemPreText'); ?></p>
	<?php endif; ?>
	<?php if (count($items)): ?>
	<ul>
		<?php foreach ($items as $key => $item): ?>
		<li class="<?php
			echo ($key % 2) ? "odd" : "even";
			if (count($items) == $key + 1) {
				echo ' last';
			}
			?>">
			<?php
		$videoImage    = $item->videoImage;
		$videoDuration = $item->videoDuration;
		?>
			<a href="<?php echo $item->link; ?>"><img src="<?php echo  $item->videoImage;?>" title="<?php echo $item->title; ?>" />
			<p class="title><?php echo $item->title . '<span class="duration">' . $videoDuration . '</span>' ?></p>
			</a>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>

</div>
