<?php defined('_JEXEC') or die;

/**
 * File       head.php
 * Created    1/15/13 8:12 PM
 * Author     Matt Thomas
 * Website    http://betweenbrain.com
 * Email      matt@betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */
?>
<html lang="<?php echo $this->language ?>" dir="<?php echo $this->direction ?>">

<head>
<jdoc:include type="head" /></head>

<body class="<?php echo $columnLayout; echo ' ' . $currentComponent; if($articleId) echo ' ' . $articleAlias; if ($itemId) echo ' ' . $itemAlias; if($categoryId) echo ' ' . $categoryAlias; if($sectionId) echo ' ' . $sectionAlias ?>" data-diagnostic="<?php echo 'layout:' . $columnLayout; echo ' component:'.$currentComponent; if($articleId) echo ' article:' . $articleAlias; if ($itemId) echo ' item:' . $itemAlias; if($categoryId) echo ' category:' . $categoryAlias; if($sectionId) echo ' section:' . $sectionAlias ?>">

<?php if ($this->countModules('header')) : ?>
<header id="header" class="clear clearfix">
	<jdoc:include type="modules" name="header" style="html" />
</header>
<?php endif ?>
