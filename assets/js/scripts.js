// Avoid `console` errors in browsers that lack a console.
(function() {
  var method;
  var noop = function() {};
  var methods = ['assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error', 'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log', 'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd', 'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
      console[method] = noop;
    }
  }
}());
if (typeof jQuery === 'undefined') {
  console.warn('jQuery hasn\'t loaded');
} else {
  console.log('jQuery has loaded');
}
// Place any jQuery/helper plugins in here.
$(document).ready(function() {


  $.fn.hasAnyClass = function() {
    for (var i = 0; i < arguments.length; i++) {
      var classes = arguments[i].split(", ");
      for (var j = 0; j < classes.length; j++) {
        if (this.hasClass(classes[j])) {
          return true;
        }
      }
    }
    return false;
  }

  $('.current-menu-item, .current-menu-parent').addClass('active_menu');
$('.headnav').find('.current-menu-parent').each(function(index, el) {
  $(this).closest('.menu-item-has-children').addClass('active_menu active');
  $(this).addClass('active');
});


if ($('body').find('.menu-gen').length ) {
  //$('.active_menu').hasClass('menu-item-has-children').addClass('menu-side');
  $('.menu-gen ul').html($('.headnav > .active_menu.menu-item-has-children > ul').html());
  $('.menu-gen h3').html($('.headnav > .active_menu.menu-item-has-children > a').html());
}


});
