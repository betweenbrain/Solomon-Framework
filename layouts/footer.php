<?php defined('_JEXEC') or die;

/**
 * File       footer.php
 * Created    1/15/13 8:12 PM
 * Author     Matt Thomas
 * Website    http://betweenbrain.com
 * Email      matt@betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */
?>
</body>
<footer id="footer" class="clear clearfix">

	<?php if ($this->countModules('syndicate')) : ?>
	<div id="syndicate">
		<jdoc:include type="modules" name="syndicate" />
	</div>
	<?php endif ?>

	<?php if ($this->countModules('footer')) : ?>
	<jdoc:include type="modules" name="footer" style="html" />
	<?php endif ?>

</footer>

<?php if ($this->countModules('debug')) : ?>
<jdoc:include type="modules" name="debug" style="raw" />
<?php endif ?>

<?php if ($this->countModules('analytics')) : ?>
<jdoc:include type="modules" name="analytics" />
<?php endif ?>

</body>
</html>
