<?php
/**
 * @version        $Id: category_item.php 1766 2012-11-22 14:10:24Z lefteris.kavadas $
 * @package        K2
 * @author         JoomlaWorks http://www.joomlaworks.net
 * @copyright      Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license        GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

// Load template language file for override
$lang =& JFactory::getLanguage();
$lang->load('tpl_cloaked_sansa', JPATH_SITE);

// Define default image size (do not change)
K2HelperUtilities::setDefaultImage($this->item, 'itemlist', $this->params);

$videoImage    = $this->item->videoImage;
$videoDuration = $this->item->videoDuration;
?>
<div class="catItemView group<?php echo ucfirst($this->item->itemGroup); ?><?php echo ($this->item->featured) ? ' catItemIsFeatured' : ''; ?><?php if ($this->item->params->get('pageclass_sfx')) {
	echo ' ' . $this->item->params->get('pageclass_sfx');
} ?>">
	<a href="<?php echo $this->item->link; ?>">
		<img src="<?php echo  $this->item->videoImage;?>" />
		<p class="title"><?php echo $this->item->title; ?> <?php echo $videoDuration ?></p>
	</a>

<div class="details">
	<b><?php echo $this->item->hits; ?> <?php echo JText::_('K2_TIMES'); ?></b>
	<h1><?php echo $this->item->title; ?></h1>
	<p><?php echo $videoDuration ?> | <?php echo JHTML::_('date', $this->item->created, JText::_('K2_DATE_FORMAT_LC2')); ?></p>

	<div class="catItemIntroText">
		<?php echo $this->item->introtext; ?>
	</div>
	<p>
		<a class="k2ReadMore" href="<?php echo $this->item->link; ?>">
			<?php echo JText::_('K2_READ_MORE'); ?>
		</a>
	</p>
	<?php if ($this->item->params->get('catItemRating')): ?>
	<div class="catItemRatingBlock">
		<ul class="itemRatingList">
			<li class="itemCurrentRating" id="itemCurrentRating<?php echo $this->item->id; ?>" style="width:<?php echo $this->item->votingPercentage; ?>%;"></li>
			<li>
				<a href="#" rel="<?php echo $this->item->id; ?>" title="<?php echo JText::_('Mark as Popular'); ?>" class="five-stars">5</a>
			</li>
		</ul>
		<span><?php echo JText::_('Mark as Popular'); ?></span>

		<div class="clr"></div>
	</div>
	<div class="clr"></div>
	</div>
	<?php endif; ?>
</div>
</div>

