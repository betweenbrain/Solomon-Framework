<?php defined('_JEXEC') or die;
/**
 * @package        Template Framework for Joomla!
 * @author         Matt Thomas http://construct-framework.com
 * @copyright      Copyright (C) 2009 - 2012 Matt Thomas. All rights reserved.
 * @license        GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 */

// Call the Construct Template Helper Class
if (JFile::exists(dirname(__FILE__) . '/helper.php')) {
	include dirname(__FILE__) . '/helper.php';
}

// To enable use of site configuration
$app = JFactory::getApplication();
// Returns a reference to the global document object
$doc = JFactory::getDocument();
// Define relative shortcut for current template directory
$template = 'templates/' . $this->template;
// Get the current view
$view = JRequest::getCmd('view');

// Common template elements (use absolute paths for security)
$header = JPATH_THEMES . '/' . $this->template . '/layouts/header.php';
$footer = JPATH_THEMES . '/' . $this->template . '/layouts/footer.php';

// Remove MooTools and core scripts
unset($doc->_scripts[$this->baseurl . '/media/system/js/mootools.js']);
unset($doc->_scripts[$this->baseurl . '/plugins/system/mtupgrade/mootools.js']);
unset($doc->_scripts[$this->baseurl . '/media/system/js/caption.js']);

#----------------------------- Moldule Counts -------------------------#

$headerAboveCount1 = (int) ($this->countModules('header-above-1') > 0);
$headerAboveCount2 = (int) ($this->countModules('header-above-2') > 0);
$headerAboveCount3 = (int) ($this->countModules('header-above-3') > 0);
$headerAboveCount4 = (int) ($this->countModules('header-above-4') > 0);
$headerAboveCount5 = (int) ($this->countModules('header-above-5') > 0);
$headerAboveCount6 = (int) ($this->countModules('header-above-6') > 0);

$headerAboveCount = $headerAboveCount1 + $headerAboveCount2 + $headerAboveCount3 + $headerAboveCount4 + $headerAboveCount5 + $headerAboveCount6;

if ($headerAboveCount) : $headerAboveClass = 'count-' . $headerAboveCount; endif;

#--------------------------------------------------------------------------#

$headerBelowCount1 = (int) ($this->countModules('header-below-1') > 0);
$headerBelowCount2 = (int) ($this->countModules('header-below-2') > 0);
$headerBelowCount3 = (int) ($this->countModules('header-below-3') > 0);
$headerBelowCount4 = (int) ($this->countModules('header-below-4') > 0);
$headerBelowCount5 = (int) ($this->countModules('header-below-5') > 0);
$headerBelowCount6 = (int) ($this->countModules('header-below-6') > 0);

$headerBelowCount = $headerBelowCount1 + $headerBelowCount2 + $headerBelowCount3 + $headerBelowCount4 + $headerBelowCount5 + $headerBelowCount6;

if ($headerBelowCount) : $headerBelowClass = 'count-' . $headerBelowCount; endif;

#--------------------------------------------------------------------------#

$navBelowCount1 = (int) ($this->countModules('nav-below-1') > 0);
$navBelowCount2 = (int) ($this->countModules('nav-below-2') > 0);
$navBelowCount3 = (int) ($this->countModules('nav-below-3') > 0);
$navBelowCount4 = (int) ($this->countModules('nav-below-4') > 0);
$navBelowCount5 = (int) ($this->countModules('nav-below-5') > 0);
$navBelowCount6 = (int) ($this->countModules('nav-below-6') > 0);

$navBelowCount = $navBelowCount1 + $navBelowCount2 + $navBelowCount3 + $navBelowCount4 + $navBelowCount5 + $navBelowCount6;

if ($navBelowCount) : $navBelowClass = 'count-' . $navBelowCount; endif;

#--------------------------------------------------------------------------#

$contentAboveCount1 = (int) ($this->countModules('content-above-1') > 0);
$contentAboveCount2 = (int) ($this->countModules('content-above-2') > 0);
$contentAboveCount3 = (int) ($this->countModules('content-above-3') > 0);
$contentAboveCount4 = (int) ($this->countModules('content-above-4') > 0);
$contentAboveCount5 = (int) ($this->countModules('content-above-5') > 0);
$contentAboveCount6 = (int) ($this->countModules('content-above-6') > 0);

$contentAboveCount = $contentAboveCount1 + $contentAboveCount2 + $contentAboveCount3 + $contentAboveCount4 + $contentAboveCount5 + $contentAboveCount6;

if ($contentAboveCount) : $contentAboveClass = 'count-' . $contentAboveCount; endif;

#--------------------------------------------------------------------------#

$contentBelowCount1 = (int) ($this->countModules('content-below-1') > 0);
$contentBelowCount2 = (int) ($this->countModules('content-below-2') > 0);
$contentBelowCount3 = (int) ($this->countModules('content-below-3') > 0);
$contentBelowCount4 = (int) ($this->countModules('content-below-4') > 0);
$contentBelowCount5 = (int) ($this->countModules('content-below-5') > 0);
$contentBelowCount6 = (int) ($this->countModules('content-below-6') > 0);

$contentBelowCount = $contentBelowCount1 + $contentBelowCount2 + $contentBelowCount3 + $contentBelowCount4 + $contentBelowCount5 + $contentBelowCount6;

if ($contentBelowCount) : $contentBelowClass = 'count-' . $contentBelowCount; endif;

#--------------------------------------------------------------------------#

$footerAboveCount1 = (int) ($this->countModules('footer-above-1') > 0);
$footerAboveCount2 = (int) ($this->countModules('footer-above-2') > 0);
$footerAboveCount3 = (int) ($this->countModules('footer-above-3') > 0);
$footerAboveCount4 = (int) ($this->countModules('footer-above-4') > 0);
$footerAboveCount5 = (int) ($this->countModules('footer-above-5') > 0);
$footerAboveCount6 = (int) ($this->countModules('footer-above-6') > 0);

$footerAboveCount = $footerAboveCount1 + $footerAboveCount2 + $footerAboveCount3 + $footerAboveCount4 + $footerAboveCount5 + $footerAboveCount6;

if ($footerAboveCount) : $footerAboveClass = 'count-' . $footerAboveCount; endif;

#------------------------------ Column Layout -----------------------------#

$column1Count = (int) ($this->countModules('column-1') > 0);
$column2Count = (int) ($this->countModules('column-2') > 0);

$columnGroupAlphaCount = $column1Count + $column2Count;

if ($columnGroupAlphaCount) : $columnGroupAlphaClass = 'count-' . $columnGroupAlphaCount; endif;

$column3Count = (int) ($this->countModules('column-3') > 0);
$column4Count = (int) ($this->countModules('column-4') > 0);

$columnGroupBetaCount = $column3Count + $column4Count;
if ($columnGroupBetaCount) : $columnGroupBetaClass = 'count-' . $columnGroupBetaCount; endif;

$columnLayout = 'main-only';

if (($columnGroupAlphaCount > 0) && ($columnGroupBetaCount == 0)) :
	$columnLayout = 'alpha-' . $columnGroupAlphaCount . '-main'; elseif (($columnGroupAlphaCount > 0) && ($columnGroupBetaCount > 0)) :
	$columnLayout = 'alpha-' . $columnGroupAlphaCount . '-main-beta-' . $columnGroupBetaCount; elseif (($columnGroupAlphaCount == 0) && ($columnGroupBetaCount > 0)) :
	$columnLayout = 'main-beta-' . $columnGroupBetaCount;
endif;

#-------------------------------- Item ID ---------------------------------#

$itemId = JRequest::getInt('Itemid', 0);

#------------------------- Menu Item Alias --------------------------------#

$menu      =& JSite::getMenu();
$itemAlias = $menu->getItem($itemId)->alias;

#------------------------------- Article ID -------------------------------#

if ($view == 'article') {
	$articleId = JRequest::getInt('id');
}
$articleId = NULL;

#------------------------------- Article Alias -------------------------------#
if ($view == 'article') {
	$article =& JTable::getInstance("content");
	$article->load($articleId);
	$articleAlias = $article->get('alias');
}
$articleAlias = NULL;

#------------------------------- Section ID -------------------------------#

function getSection($iId) {
	$db =& JFactory::getDBO();
	if (JRequest::getCmd('view', 0) == "section") {
		return JRequest::getInt('id');
	} elseif (JRequest::getCmd('view', 0) == "category") {
		$sql = "SELECT section FROM #__categories WHERE id = $iId ";
		$db->setQuery($sql);
		$row = $db->loadResult();

		return $row;
	} elseif (JRequest::getCmd('view', 0) == "article") {
		$temp = explode(":", JRequest::getInt('id'));
		$sql  = "SELECT sectionid FROM #__content WHERE id = " . $temp[0];
		$db->setQuery($sql);
		$row = $db->loadResult();

		return $row;
	}
}

$sectionId = getSection(JRequest::getInt('id'));

#----------------------------- Section Alias -----------------------------#

$section =& JTable::getInstance("section");
$section->load($sectionId);
$sectionAlias = $section->get('alias');

#------------------------------ Category ID -------------------------------#

function getCategory() {
	$db =& JFactory::getDBO();
	if (JRequest::getCmd('view', 0) == "section") {
		return NULL;
	} elseif (JRequest::getCmd('view', 0) == "category") {
		return JRequest::getInt('id');
	} elseif (JRequest::getCmd('view', 0) == "article") {
		$temp = explode(":", JRequest::getInt('id'));
		$sql  = "SELECT catid FROM #__content WHERE id = " . $temp[0];
		$db->setQuery($sql);
		$row = $db->loadResult();

		return $row;
	}
}

$categoryId = getCategory();

#----------------------------- Category Alias -----------------------------#

$category =& JTable::getInstance("category");
$category->load($categoryId);
$categoryAlias = $category->get('alias');

#----------------------------- Component Name -----------------------------#

$currentComponent = JRequest::getCmd('option');

#------------------- Template Layout Logic -----------------------#

$layout              = new ConstructTemplateHelper ();
$layout->includeFile = array();
$twoColumn           = $this->params->get('twoColumn');
$oneThird            = $this->params->get('oneThird');
$twoThird            = $this->params->get('twoThird');

/**
 * Function to check if the currently menu item matches the supplied condition
 *
 * @param $condition a single string, or array, of selected menu items
 * @return bool
 */
function isLayout($condition) {
	$itemId = JRequest::getInt('Itemid', 0);
	if (is_array($condition)) {
		if (in_array($itemId, $condition)) {
			return TRUE;
		}
	} // Single item assignment is not an array
	elseif ($itemId == $condition) {
		return TRUE;
	}

	return FALSE;
}

// Check for article specific layouts first, they are more specific than menu items
$layout->includeFile[] = $template . '/layouts/article/' . $articleAlias . '.php';
// All articles layout
$layout->includeFile[] = $template . '/layouts/article/article.php';
// Menu item specific layout assignments via parameter
if (isLayout($twoColumn)) {
	$layout->includeFile[] = $template . '/layouts/twoColumn.php';
} elseif (isLayout($oneThird)) {
	$layout->includeFile[] = $template . '/layouts/oneThird.php';
} elseif (isLayout($twoThird)) {
	$layout->includeFile[] = $template . '/layouts/twoThird.php';
}
// Non-parameter menu item specific layouts
$layout->includeFile[] = $template . '/layouts/item/' . $itemAlias . '.php';
// Single category specific layouts
$layout->includeFile[] = $template . '/layouts/category/' . $categoryAlias . '.php';
// All categories layout
if ($view == 'category') {
	$layout->includeFile[] = $template . '/layouts/category/category.php';
}
// Single section specific layout
$layout->includeFile[] = $template . '/layouts/section/' . $sectionAlias . '.php';
// All sections layout
$layout->includeFile[] = $template . '/layouts/section/section.php';
// Single component specific layout
$layout->includeFile[] = $template . '/layouts/component/' . $currentComponent . '.php';
// Default layout
$layout->includeFile[] = $template . '/layouts/default.php';

#------------------ Dynamic Style Sheets ------------------------#

$styleSheet              = new ConstructTemplateHelper ();
$styleSheet->includeFile = array();

// Single article specific stylesheet
$styleSheet->includeFile[] = $template . '/css/article/' . $articleAlias . '.css';
// All articles stylesheet
$styleSheet->includeFile[] = $template . '/css/article/article.css';
// Single menu item specific stylesheet
$styleSheet->includeFile[] = $template . '/css/item/' . $itemAlias . '.css';
// Single category specific stylesheet
$styleSheet->includeFile[] = $template . '/css/category/' . $categoryAlias . '.css';
// All categories stylesheet
if ($view == 'category') {
	$styleSheet->includeFile[] = $template . '/css/category/category.css';
}
// Single section specific stylesheet
$styleSheet->includeFile[] = $template . '/css/section/' . $sectionAlias . '.css';
// All sections stylesheet
$styleSheet->includeFile[] = $template . '/css/section/section.css';
// Single component specific stylesheet
$styleSheet->includeFile[] = $template . '/css/component/' . $currentComponent . '.css';

#---------------------------- Head Elements --------------------------------#

// Custom tags
$doc->addCustomTag('<meta name="copyright" content="' . htmlspecialchars($app->getCfg('sitename')) . '" />');

// Transparent favicon
$doc->addFavicon($template . '/favicon.png', 'image/png', 'icon');

// Stylesheets
$doc->addStyleSheet($template . '/css/screen.css', 'text/css', 'screen');

// Dynamic style sheet returned from our template helper
$styleSheet =& $styleSheet->getIncludeFile();
if ($styleSheet) {
	$doc->addStyleSheet($styleSheet, 'text/css', 'screen');
}