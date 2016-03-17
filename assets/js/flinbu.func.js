function fullSize(el) {
  var window_width = $(window).width(),
      window_height = $(window).height();
  el.height(window_height);
}

(function ($) {
  $.fn.fullSize = function() {
    var el = $(this);
    fullSize(el);
    $(window).resize(function() {
      fullSize(el);
    });
  }
})(jQuery);
