function fullSize(el) {
  var window_width = $(window).width(),
      window_height = $(window).height();
  el.height(window_height);
}
function parallax(el) {
  $(window).scroll(function () {
    var yPos = -($(window).scrollTop() / el.data('speed')),
        coords = '50% ' + yPos + 'px';
    el.css({
      backgroundPosition: coords
    });
  });
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
