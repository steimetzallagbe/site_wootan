"use strict";
jQuery(function ($) {
    var selector = '.fw-framework-widget-options-widget';
    var timeoutId;

    $(document).on('remove', selector, function () { // ReInit options on html replace (on widget Save)
        clearTimeout(timeoutId);
        timeoutId = setTimeout(function () { // wait a few milliseconds for html replace to finish
            fwEvents.trigger('fw:options:init', {$elements: $(selector)});
        }, 200);
    });
    $(document).on('widget-updated widget-added', function (e) {
        clearTimeout(timeoutId);
        timeoutId = setTimeout(function () { // wait a few milliseconds for html replace to finish
            fwEvents.trigger('fw:options:init', {$elements: $(selector)});
        }, 200);
    });
});