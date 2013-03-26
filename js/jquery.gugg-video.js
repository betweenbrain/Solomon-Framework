/**
 * File
 * Created    3/25/13 4:28 PM
 * Author     Matt Thomas
 * Website    http://betweenbrain.com
 * Email      matt@betweenbrain.com
 * Support    https://github.com/betweenbrain/
 * Copyright  Copyright (C) 2013 betweenbrain llc. All Rights Reserved.
 * License    GNU GPL v3 or later
 */

/*global $, jQuery*/

(function ($) {
    "use strict";
    $().ready(function () {
        var $this = $('li li.active'), $parent = $this.closest('li.parent'), $itemText = $this.find('span').html(), $parentSpan = $this.closest('li.parent').find('span').first();
        if ($parent.length) {
            $parent.attr('class', $parent.attr('class') + ' current');
            $this.attr('class', $this.attr('class') + ' current');
            $parentSpan.html($parentSpan.html() + ': ' + $itemText);
        } else {
            var $this = $('li.active');
            $this.attr('class', $this.attr('class') + ' current');
        }
    });
}(jQuery));