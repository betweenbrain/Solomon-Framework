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

<body class="<?php echo $columnLayout; echo ' '.$currentComponent; if($articleId) echo ' '.$articleAlias .'-article'; if ($itemId) echo ' '.$itemAlias.'-item'; if($categoryId) echo ' '.$catAlias .'-category'; if($sectionId) echo ' '.$sectionAlias.'-section' ?>">

<header id="header" class="clear clearfix">

	<?php if ($this->countModules('header')) : ?>
	<jdoc:include type="modules" name="header" style="html" />
	<?php endif ?>

</header>