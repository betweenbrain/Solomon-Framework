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
        $('li.active').each(function (index) {
            // If only one li.active, give it current class
            if (!$(this).siblings('li').hasClass('active')) {
                $(this).attr('class', $(this).attr('class') + ' current');
            }
            // If more than one li.active, give second and beyond current class
            if ($(this).siblings('li').hasClass('active') && index == "1") {
                $(this).attr('class', $(this).attr('class') + ' current');
            }
            if ($(this).closest('li.parent').length && index >= "2") {
                var $itemText = $(this).find('span').html(), $parentSpan = $(this).closest('li.parent').find('span').first();
                $parentSpan.html($parentSpan.html() + ': ' + $itemText);
            }
        });
    });
}(jQuery));