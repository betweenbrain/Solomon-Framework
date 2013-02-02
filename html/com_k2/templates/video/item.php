<?php defined('_JEXEC') or die;
/**
 * @version        $Id: item.php 1766 2012-11-22 14:10:24Z lefteris.kavadas $
 * @package        K2
 * @author         JoomlaWorks http://www.joomlaworks.net
 * @copyright      Copyright (c) 2006 - 2012 JoomlaWorks Ltd. All rights reserved.
 * @license        GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 */

if (JRequest::getInt('print') == 1): ?>
<a class="itemPrintThisPage" rel="nofollow" href="#" onclick="window.print();return false;">
	<span><?php echo JText::_('K2_PRINT_THIS_PAGE'); ?></span>
</a>
<?php endif; ?>

<span id="startOfPageId<?php echo JRequest::getInt('id'); ?>"></span>

<div id="k2Container" class="itemView<?php echo ($this->item->featured) ? ' itemIsFeatured' : ''; ?><?php if ($this->item->params->get('pageclass_sfx')) {
	echo ' ' . $this->item->params->get('pageclass_sfx');
} ?>">
<div class="itemHeader">
<?php
$videoProvider = $this->item->videoProvider;
$videoID       = $this->item->videoID;
$videoDuration = $this->item->videoDuration;

if ($videoProvider && $videoID) {
	echo '{' . $videoProvider . ' ' . $videoID . '}';
}
?>
<h2 class="itemTitle">
	<?php if (isset($this->item->editLink)): ?>
	<span class="itemEditLink">
			<a class="modal" rel="{handler:'iframe',size:{x:990,y:550}}" href="<?php echo $this->item->editLink; ?>">
				<?php echo JText::_('K2_EDIT_ITEM'); ?>
			</a>
		</span>
	<?php endif; ?>

	<?php echo $this->item->title; ?>

	<?php if ($this->item->params->get('itemFeaturedNotice') && $this->item->featured): ?>

	<span>
	  	<sup>
			  <?php echo JText::_('K2_FEATURED'); ?>
		  </sup>
  	</span>
	<?php endif; ?>

</h2>

<ul>
	<?php if ($this->item->params->get('itemCommentsAnchor') && $this->item->params->get('itemComments') && (($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1'))): ?>

	<li>
		<?php if (!empty($this->item->event->K2CommentsCounter)): ?>

		<?php echo $this->item->event->K2CommentsCounter; ?>
		<?php else: ?>
		<?php if ($this->item->numOfComments > 0): ?>
			<a class="itemCommentsLink k2Anchor" href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
				<span><?php echo $this->item->numOfComments; ?></span> <?php echo ($this->item->numOfComments > 1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?>
			</a>
			<?php else: ?>
			<a class="itemCommentsLink k2Anchor" href="<?php echo $this->item->link; ?>#itemCommentsAnchor">
				<?php echo JText::_('K2_BE_THE_FIRST_TO_COMMENT'); ?>
			</a>
			<?php endif; ?>
		<?php endif; ?>
	</li>
	<?php endif; ?>
</ul>

<?php if ($this->item->params->get('itemRating')): ?>

<div class="itemRatingBlock">
	<div class="itemRatingForm">
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


<?php if ($this->item->params->get('itemTwitterButton', 1)): ?>

<div class="itemTwitterButton">
	<a href="https://twitter.com/share" class="twitter-share-button" data-count="horizontal"<?php if ($this->item->params->get('twitterUsername')): ?> data-via="<?php echo $this->item->params->get('twitterUsername'); ?>"<?php endif; ?>>
		<?php echo JText::_('K2_TWEET'); ?>
	</a>
	<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
</div>
	<?php endif; ?>



<p><?php echo $videoDuration ?> | <?php echo JHTML::_('date', $this->item->created, JText::_('K2_DATE_FORMAT_LC2')); ?> |
	<span class="hits"><?php echo JText::_('K2_READ'); ?>
		<b><?php echo $this->item->hits; ?></b> <?php echo JText::_('K2_TIMES'); ?></span></p>





<?php if (!empty($this->item->fulltext)): ?>
	<?php if ($this->item->params->get('itemIntroText')): ?>

	<div class="itemIntroText">
		<?php echo $this->item->introtext; ?>
	</div>
		<?php endif; ?>
	<?php if ($this->item->params->get('itemFullText')): ?>

	<div class="itemFullText">
		<?php echo $this->item->fulltext; ?>
	</div>
		<?php endif; ?>
	<?php else: ?>

<div class="itemFullText">
	<?php echo $this->item->introtext; ?>
</div>
	<?php endif; ?>

<div class="clr"></div>



<?php if ($this->item->params->get('itemCategory') || $this->item->params->get('itemTags') || $this->item->params->get('itemAttachments')): ?>
<div class="itemLinks">

	<?php if ($this->item->params->get('itemCategory')) :

	// Creat object containing additional categories this item belongs to
	$category = JTable::getInstance('K2Category', 'Table');
	$db       = JFactory::getDbo();
	$query    = ' SELECT catid' .
		' FROM #__k2_additional_categories' .
		' WHERE itemID = ' . $db->Quote($this->item->id) . '';
	$db->setQuery($query);
	$cats = $db->loadObjectList();?>

	<div class="itemCategory">
		<span><?php echo JText::_('K2_PUBLISHED_IN'); ?></span>
		<?php foreach ($cats as $key => $cat) :
		$category->load($cat->catid);
		$item->category       = $category;
		$item->category->link = urldecode(JRoute::_(K2HelperRoute::getCategoryRoute($category->id . ':' . urlencode($category->alias))));
		?>
		<a href="<?php echo $item->category->link; ?>"><?php echo $item->category->name; ?></a>
		<?php endforeach ?>
	</div>
	<?php endif; ?>

	<?php if ($this->item->params->get('itemAttachments') && count($this->item->attachments)): ?>

	<div class="itemAttachmentsBlock">
		<span><?php echo JText::_('K2_DOWNLOAD_ATTACHMENTS'); ?></span>
		<ul class="itemAttachments">
			<?php foreach ($this->item->attachments as $attachment): ?>
			<li>
				<a title="<?php echo K2HelperUtilities::cleanHtml($attachment->titleAttribute); ?>" href="<?php echo $attachment->link; ?>"><?php echo $attachment->title; ?></a>
				<?php if ($this->item->params->get('itemAttachmentsCounter')): ?>
				<span>(<?php echo $attachment->hits; ?> <?php echo ($attachment->hits == 1) ? JText::_('K2_DOWNLOAD') : JText::_('K2_DOWNLOADS'); ?>)</span>
				<?php endif; ?>
			</li>
			<?php endforeach; ?>
		</ul>
	</div>
	<?php endif; ?>

	<div class="clr"></div>
</div>
	<?php endif; ?>

<?php
/*
Note regarding 'Related Items'!
If you add:
- the CSS rule 'overflow-x:scroll;' in the element div.itemRelated {…} in the k2.css
- the class 'k2Scroller' to the ul element below
- the classes 'k2ScrollerElement' and 'k2EqualHeights' to the li element inside the foreach loop below
- the style attribute 'style="width:<?php echo $item->imageWidth; ?>px;"' to the li element inside the foreach loop below
...then your Related Items will be transformed into a vertical-scrolling block, inside which, all items have the same height (equal column heights). This can be very useful if you want to show your related articles or products with title/author/category/image etc., which would take a significant amount of space in the classic list-style display.
*/
?>

<?php if ($this->item->params->get('itemRelated') && isset($this->relatedItems)): ?>

<div class="itemRelated">
	<h3><?php echo JText::_("K2_RELATED_ITEMS_BY_TAG"); ?></h3>
	<ul>
		<?php foreach ($this->relatedItems as $key => $item): ?>
		<li class="<?php echo ($key % 2) ? "odd" : "even"; ?>">

			<?php if ($this->item->params->get('itemRelatedTitle', 1)): ?>
			<a class="itemRelTitle" href="<?php echo $item->link ?>"><?php echo $item->title; ?></a>
			<?php endif; ?>

			<?php if ($this->item->params->get('itemRelatedCategory')): ?>
			<div class="itemRelCat"><?php echo JText::_("K2_IN"); ?>
				<a href="<?php echo $item->category->link ?>"><?php echo $item->category->name; ?></a></div>
			<?php endif; ?>

			<?php if ($this->item->params->get('itemRelatedAuthor')): ?>
			<div class="itemRelAuthor"><?php echo JText::_("K2_BY"); ?>
				<a rel="author" href="<?php echo $item->author->link; ?>"><?php echo $item->author->name; ?></a></div>
			<?php endif; ?>

			<?php if ($this->item->params->get('itemRelatedImageSize')): ?>
			<img style="width:<?php echo $item->imageWidth; ?>px;height:auto;" class="itemRelImg" src="<?php echo $item->image; ?>" alt="<?php K2HelperUtilities::cleanHtml($item->title); ?>" />
			<?php endif; ?>

			<?php if ($this->item->params->get('itemRelatedIntrotext')): ?>
			<div class="itemRelIntrotext"><?php echo $item->introtext; ?></div>
			<?php endif; ?>

			<?php if ($this->item->params->get('itemRelatedFulltext')): ?>
			<div class="itemRelFulltext"><?php echo $item->fulltext; ?></div>
			<?php endif; ?>

			<?php if ($this->item->params->get('itemRelatedMedia')): ?>
			<?php if ($item->videoType == 'embedded'): ?>
				<div class="itemRelMediaEmbedded"><?php echo $item->video; ?></div>
				<?php else: ?>
				<div class="itemRelMedia"><?php echo $item->video; ?></div>
				<?php endif; ?>
			<?php endif; ?>

			<?php if ($this->item->params->get('itemRelatedImageGallery')): ?>
			<div class="itemRelImageGallery"><?php echo $item->gallery; ?></div>
			<?php endif; ?>
		</li>
		<?php endforeach; ?>
		<li class="clr"></li>
	</ul>
	<div class="clr"></div>
</div>
	<?php endif; ?>

<div class="clr"></div>

<?php if ($this->item->params->get('itemNavigation') && !JRequest::getCmd('print') && (isset($this->item->nextLink) || isset($this->item->previousLink))): ?>

<div class="itemNavigation">
	<span class="itemNavigationTitle"><?php echo JText::_('K2_MORE_IN_THIS_CATEGORY'); ?></span>

	<?php if (isset($this->item->previousLink)): ?>
	<a class="itemPrevious" href="<?php echo $this->item->previousLink; ?>">
		&laquo; <?php echo $this->item->previousTitle; ?>
	</a>
	<?php endif; ?>

	<?php if (isset($this->item->nextLink)): ?>
	<a class="itemNext" href="<?php echo $this->item->nextLink; ?>">
		<?php echo $this->item->nextTitle; ?> &raquo;
	</a>
	<?php endif; ?>

</div>
	<?php endif; ?>


<?php echo $this->item->event->AfterDisplay; ?>


<?php echo $this->item->event->K2AfterDisplay; ?>

<?php if ($this->item->params->get('itemComments') && (($this->item->params->get('comments') == '2' && !$this->user->guest) || ($this->item->params->get('comments') == '1'))): ?>

	<?php echo $this->item->event->K2CommentsBlock; ?>
	<?php endif; ?>

<?php if ($this->item->params->get('itemComments') && ($this->item->params->get('comments') == '1' || ($this->item->params->get('comments') == '2')) && empty($this->item->event->K2CommentsBlock)): ?>

<a name="itemCommentsAnchor" id="itemCommentsAnchor"></a>

<div class="itemComments">

	<?php if ($this->item->params->get('commentsFormPosition') == 'above' && $this->item->params->get('itemComments') && !JRequest::getInt('print') && ($this->item->params->get('comments') == '1' || ($this->item->params->get('comments') == '2' && K2HelperPermissions::canAddComment($this->item->catid)))): ?>

	<div class="itemCommentsForm">
		<?php echo $this->loadTemplate('comments_form'); ?>
	</div>
	<?php endif; ?>

	<?php if ($this->item->numOfComments > 0 && $this->item->params->get('itemComments') && ($this->item->params->get('comments') == '1' || ($this->item->params->get('comments') == '2'))): ?>

	<h3 class="itemCommentsCounter">
		<span><?php echo $this->item->numOfComments; ?></span> <?php echo ($this->item->numOfComments > 1) ? JText::_('K2_COMMENTS') : JText::_('K2_COMMENT'); ?>
	</h3>

	<ul class="itemCommentsList">
		<?php foreach ($this->item->comments as $key => $comment): ?>
		<li class="<?php echo ($key % 2) ? "odd" : "even"; echo (!$this->item->created_by_alias && $comment->userID == $this->item->created_by) ? " authorResponse" : ""; echo($comment->published) ? '' : ' unpublishedComment'; ?>">

	    	<span class="commentLink">
		    	<a href="<?php echo $this->item->link; ?>#comment<?php echo $comment->id; ?>" name="comment<?php echo $comment->id; ?>" id="comment<?php echo $comment->id; ?>">
				    <?php echo JText::_('K2_COMMENT_LINK'); ?>
			    </a>
		    </span>

			<?php if ($comment->userImage): ?>
			<img src="<?php echo $comment->userImage; ?>" alt="<?php echo JFilterOutput::cleanText($comment->userName); ?>" width="<?php echo $this->item->params->get('commenterImgWidth'); ?>" />
			<?php endif; ?>

			<span class="commentDate">
		    	<?php echo JHTML::_('date', $comment->commentDate, JText::_('K2_DATE_FORMAT_LC2')); ?>
		    </span>

		    <span class="commentAuthorName">
			    <?php echo JText::_('K2_POSTED_BY'); ?>
			    <?php if (!empty($comment->userLink)): ?>
			    <a href="<?php echo JFilterOutput::cleanText($comment->userLink); ?>" title="<?php echo JFilterOutput::cleanText($comment->userName); ?>" target="_blank" rel="nofollow">
				    <?php echo $comment->userName; ?>
			    </a>
			    <?php else: ?>
			    <?php echo $comment->userName; ?>
			    <?php endif; ?>
		    </span>

			<p><?php echo $comment->commentText; ?></p>

			<?php if ($this->inlineCommentsModeration || ($comment->published && ($this->params->get('commentsReporting') == '1' || ($this->params->get('commentsReporting') == '2' && !$this->user->guest)))): ?>
			<span class="commentToolbar">
					<?php if ($this->inlineCommentsModeration): ?>
				<?php if (!$comment->published): ?>
					<a class="commentApproveLink" href="<?php echo JRoute::_('index.php?option=com_k2&view=comments&task=publish&commentID=' . $comment->id . '&format=raw')?>"><?php echo JText::_('K2_APPROVE')?></a>
					<?php endif; ?>

				<a class="commentRemoveLink" href="<?php echo JRoute::_('index.php?option=com_k2&view=comments&task=remove&commentID=' . $comment->id . '&format=raw')?>"><?php echo JText::_('K2_REMOVE')?></a>
				<?php endif; ?>

				<?php if ($comment->published && ($this->params->get('commentsReporting') == '1' || ($this->params->get('commentsReporting') == '2' && !$this->user->guest))): ?>
				<a class="modal" rel="{handler:'iframe',size:{x:560,y:480}}" href="<?php echo JRoute::_('index.php?option=com_k2&view=comments&task=report&commentID=' . $comment->id)?>"><?php echo JText::_('K2_REPORT')?></a>
				<?php endif; ?>

				<?php if ($comment->reportUserLink): ?>
				<a class="k2ReportUserButton" href="<?php echo $comment->reportUserLink; ?>"><?php echo JText::_('K2_FLAG_AS_SPAMMER'); ?></a>
				<?php endif; ?>

				</span>
			<?php endif; ?>

			<div class="clr"></div>
		</li>
		<?php endforeach; ?>
	</ul>

	<div class="itemCommentsPagination">
		<?php echo $this->pagination->getPagesLinks(); ?>
		<div class="clr"></div>
	</div>
	<?php endif; ?>

	<?php if ($this->item->params->get('commentsFormPosition') == 'below' && $this->item->params->get('itemComments') && !JRequest::getInt('print') && ($this->item->params->get('comments') == '1' || ($this->item->params->get('comments') == '2' && K2HelperPermissions::canAddComment($this->item->catid)))): ?>

	<div class="itemCommentsForm">
		<?php echo $this->loadTemplate('comments_form'); ?>
	</div>
	<?php endif; ?>

	<?php $user = JFactory::getUser(); if ($this->item->params->get('comments') == '2' && $user->guest): ?>
	<div><?php echo JText::_('K2_LOGIN_TO_POST_COMMENTS'); ?></div>
	<?php endif; ?>

</div>
	<?php endif; ?>

<?php if (!JRequest::getCmd('print')): ?>
<div class="itemBackToTop">
	<a class="k2Anchor" href="<?php echo $this->item->link; ?>#startOfPageId<?php echo JRequest::getInt('id'); ?>">
		<?php echo JText::_('K2_BACK_TO_TOP'); ?>
	</a>
</div>
	<?php endif; ?>

<div class="clr"></div>
</div>

