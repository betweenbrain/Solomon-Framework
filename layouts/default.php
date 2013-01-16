<?php defined('_JEXEC') or die;

/**
 * File       default.php
 * Created    1/15/13 8:12 PM
 * Author     Matt Thomas
 * Website    http://betweenbrain.com
 * Email      matt@betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */
?>

<?php if ($this->getBuffer('message')) : ?>
<jdoc:include type="message" />
<?php endif ?>

<jdoc:include type="component" />