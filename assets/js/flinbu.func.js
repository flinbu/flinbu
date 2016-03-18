function fullSize(el) {
  var window_width = $(window).width(),
      window_height = $(window).height();
  if (!$('body').hasClass('mobile')) {
    el.height(window_height);
  } else if (el.hasClass('main')) {
    el.height(window_height);
  }
}
function parallax(el) {
  if (!$('body').hasClass('mobile')) {
    $(window).scroll(function () {
      var yPos = -($(window).scrollTop() / el.data('speed')),
          coords = '50% ' + yPos + 'px';
      el.css({
        backgroundPosition: coords
      });
    });
  }
}
(function ($) {
  $.fn.fullSize = function() {
    var el = $(this);
    fullSize(el);
    $(window).resize(function() {
      fullSize(el);
    });
  };
  $.fn.parallax = function () {
    var el = $(this);
    parallax(el);
  };
})(jQuery);
