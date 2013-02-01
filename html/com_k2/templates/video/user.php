<?php
/**
 * @version		$Id: user.php 1618 2012-09-21 11:23:08Z lefteris.kavadas $
 * @package		K2
 * @author		JoomlaWorks http://www.joomlaworks.net
 * @copyright	Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license		GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die;

// Get user stuff (do not change)
$user = JFactory::getUser();

?>



<div id="k2Container" class="userView<?php if($this->params->get('pageclass_sfx')) echo ' '.$this->params->get('pageclass_sfx'); ?>">

	<?php if($this->params->get('show_page_title') && $this->params->get('page_title')!=$this->user->name): ?>

	<div class="componentheading<?php echo $this->params->get('pageclass_sfx')?>">
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</div>
	<?php endif; ?>

	<?php if($this->params->get('userFeedIcon',1)): ?>

	<div class="k2FeedIcon">
		<a href="<?php echo $this->feed; ?>" title="<?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?>">
			<span><?php echo JText::_('K2_SUBSCRIBE_TO_THIS_RSS_FEED'); ?></span>
		</a>
		<div class="clr"></div>
	</div>
	<?php endif; ?>

	<?php if ($this->params->get('userImage') || $this->params->get('userName') || $this->params->get('userDescription') || $this->params->get('userURL') || $this->params->get('userEmail')): ?>
	<div class="userBlock">
	
		<?php if(isset($this->addLink) && JRequest::getInt('id')==$user->id): ?>

		<span class="userItemAddLink">
			<a class="modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->addLink; ?>">
				<?php echo JText::_('K2_POST_A_NEW_ITEM'); ?>
			</a>
		</span>
		<?php endif; ?>
	
		<?php if ($this->params->get('userImage') && !empty($this->user->avatar)): ?>
		<img src="<?php echo $this->user->avatar; ?>" alt="<?php echo $this->user->name; ?>" style="width:<?php echo $this->params->get('userImageWidth'); ?>px; height:auto;" />
		<?php endif; ?>
		
		<?php if ($this->params->get('userName')): ?>
		<h2><?php echo $this->user->name; ?></h2>
		<?php endif; ?>
		
		<?php if ($this->params->get('userDescription') && trim($this->user->profile->description)): ?>
		<div class="userDescription"><?php echo $this->user->profile->description; ?></div>
		<?php endif; ?>
		
		<?php if (($this->params->get('userURL') && isset($this->user->profile->url) && $this->user->profile->url) || $this->params->get('userEmail')): ?>
		<div class="userAdditionalInfo">
			<?php if ($this->params->get('userURL') && isset($this->user->profile->url) && $this->user->profile->url): ?>
			<span class="userURL">
				<?php echo JText::_('K2_WEBSITE_URL'); ?>: <a href="<?php echo $this->user->profile->url; ?>" target="_blank" rel="me"><?php echo $this->user->profile->url; ?></a>
			</span>
			<?php endif; ?>

			<?php if ($this->params->get('userEmail')): ?>
			<span class="userEmail">
				<?php echo JText::_('K2_EMAIL'); ?>: <?php echo JHTML::_('Email.cloak', $this->user->email); ?>
			</span>
			<?php endif; ?>	
		</div>
		<?php endif; ?>

		<div class="clr"></div>
		
		<?php echo $this->user->event->K2UserDisplay; ?>
		
		<div class="clr"></div>
	</div>
	<?php endif; ?>



	<?php if(count($this->items)): ?>

	<div class="userItemList">
		<?php foreach ($this->items as $item): ?>
		

		<div class="userItemView<?php if(!$item->published || ($item->publish_up != $this->nullDate && $item->publish_up > $this->now) || ($item->publish_down != $this->nullDate && $item->publish_down < $this->now)) echo ' userItemViewUnpublished'; ?><?php echo ($item->featured) ? ' userItemIsFeatured' : ''; ?>">
		

			<?php echo $item->event->BeforeDisplay; ?>
			

			<?php echo $item->event->K2BeforeDisplay; ?>
		
			<div class="userItemHeader">			
				<?php if($this->params->get('userItemDateCreated')): ?>

				<span class="userItemDateCreated">
					<?php echo JHTML::_('date', $item->created , JText::_('K2_DATE_FORMAT_LC2')); ?>
				</span>
				<?php endif; ?>
				
			  <?php if($this->params->get('userItemTitle')): ?>

			  <h3 class="userItemTitle">
					<?php if(isset($item->editLink)): ?>

					<span class="userItemEditLink">
						<a class="modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $item->editLink; ?>">
							<?php echo JText::_('K2_EDIT_ITEM'); ?>
						</a>
					</span>
					<?php endif; ?>

			  	<?php if ($this->params->get('userItemTitleLinked') && $item->published): ?>
					<a href="<?php echo $item->link; ?>">
			  		<?php echo $item->title; ?>
			  	</a>
			  	<?php else: ?>
			  	<?php echo $item->title; ?>
			  	<?php endif; ?>
			  	<?php if(!$item->published || ($item->publish_up != $this->nullDate && $item->publish_up > $this->now) || ($item->publish_down != $this->nullDate && $item->publish_down < $this->now)): ?>
			  	<span>
		  			<sup>
		  				<?php echo JText::_('K2_UNPUBLISHED'); ?>
		  			</sup>
	  			</span>
	  			<?php endif; ?>
			  </h3>
			  <?php endif; ?>
		  </div>
		

		  <?php echo $item->event->AfterDisplayTitle; ?>
		  

		  <?php echo $item->event->K2AfterDisplayTitle; ?>

		  <div class="userItemBody">
		

			  <?php echo $item->event->BeforeDisplayContent; ?>
			  

			  <?php echo $item->event->K2BeforeDisplayContent; ?>
		
			  <?php if($this->params->get('userItemImage') && !empty($item->imageGeneric)): ?>

			  <div class="userItemImageBlock">
				  <span class="userItemImage">
				    <a href="<?php echo $item->link; ?>" title="<?php if(!empty($item->image_caption)) echo K2HelperUtilities::cleanHtml($item->image_caption); else echo K2HelperUtilities::cleanHtml($item->title); ?>">
				    	<img src="<?php echo $item->imageGeneric; ?>" alt="<?php if(!empty($item->image_caption)) echo K2HelperUtilities::cleanHtml($item->image_caption); else echo K2HelperUtilities::cleanHtml($item->title); ?>" style="width:<?php echo $this->params->get('itemImageGeneric'); ?>px; height:auto;" />
				    </a>
				  </span>
				  <div class="clr"></div>
			  </div>
			  <?php endif; ?>
			  
			  <?php if($this->params->get('userItemIntroText')): ?>

			  <div class="userItemIntroText">
			  	<?php echo $item->introtext; ?>
			  </div>
			  <?php endif; ?>
		
				<div class="clr"></div>


			  <?php echo $item->event->AfterDisplayContent; ?>
			  

			  <?php echo $item->event->K2AfterDisplayContent; ?>
		
			  <div class="clr"></div>
		  </div>
		
		  <?php if($this->params->get('userItemCategory') || $this->params->get('userItemTags')): ?>
		  <div class="userItemLinks">

				<?php if($this->params->get('userItemCategory')): ?>

				<div class="userItemCategory">
					<span><?php echo JText::_('K2_PUBLISHED_IN'); ?></span>
					<a href="<?php echo $item->category->link; ?>"><?php echo $item->category->name; ?></a>
				</div>
				<?php endif; ?>
				
			  <?php if($this->params->get('userItemTags') && isset($item->tags)): ?>

			  <div class="userItemTagsBlock">
				  <span><?php echo JText::_('K2_TAGGED_UNDER'); ?></span>
				  <ul class="userItemTags">
				    <?php foreach ($item->tags as $tag): ?>
				    <li><a href="<?php echo $tag->link; ?>"><?php echo $tag->name; ?></a></li>
				    <?php endforeach; ?>
				  </ul>
				  <div class="clr"></div>
			  </div>
			  <?php endif; ?>

				<div class="clr"></div>
		  </div>
		  <?php endif; ?>  
		
			<div class="clr"></div>

			<?php if($this->params->get('userItemCommentsAnchor') && ( ($this->params->get('comments') == '2' && !$this->user->guest) || ($this->params->get('comments') == '1')) ): ?>

			<div class="userItemCommentsLink">
				<?php if(!empty($item->event->K2CommentsCounter)): ?>

					<?php echo $item->event->K2CommentsCounter; ?>
				<?php else: ?>
					<?php if($item->numOfComments > 0): ?>
					<a href="<?php echo $item->link; ?>#itemCommentsAnchor">
						<?php echo $item->numOfComments; ?> <?php echo ($item->numOfComments>1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?>
					</a>
					<?php else: ?>
					<a href="<?php echo $item->link; ?>#itemCommentsAnchor">
						<?php echo JText::_('K2_BE_THE_FIRST_TO_COMMENT'); ?>
					</a>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<?php endif; ?>
		  
			<?php if ($this->params->get('userItemReadMore')): ?>

			<div class="userItemReadMore">
				<a class="k2ReadMore" href="<?php echo $item->link; ?>">
					<?php echo JText::_('K2_READ_MORE'); ?>
				</a>
			</div>
			<?php endif; ?>
			
			<div class="clr"></div>


		  <?php echo $item->event->AfterDisplay; ?>
		  

		  <?php echo $item->event->K2AfterDisplay; ?>
			
			<div class="clr"></div>
		</div>

		
		<?php endforeach; ?>
	</div>


	<?php if(count($this->pagination->getPagesLinks())): ?>
	<div class="k2Pagination">
		<?php echo $this->pagination->getPagesLinks(); ?>
		<div class="clr"></div>
		<?php echo $this->pagination->getPagesCounter(); ?>
	</div>
	<?php endif; ?>
	
	<?php endif; ?>

</div>


