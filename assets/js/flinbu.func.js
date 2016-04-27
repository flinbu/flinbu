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
function behancePortfolio(el) {
  var api_key = el.data('key'),
      api_user = el.data('user'),
      project_tpl = $(el.data('tpl')).html();
  page_portfolio(2, api_key, api_user, project_tpl, el);
}
function page_portfolio(page, key, user, tpl, container) {
  var api_url = 'http://www.behance.net/v2/users/{user}/projects';
  container.html('');
  $.ajax({
    url : api_url.replace('{user}', user),
    data : {
      api_key : key,
      page : page,
      per_page : 9
    },
    dataType : 'jsonp',
    success : function (data) {
      data.projects.forEach(function (project) {
        var project_html = tpl.replace(/{title}/gi, project.name).replace(/{image}/gi, project.covers['404']).replace(/{url}/gi, project.url),
            project_item = $(project_html),
            project_slug_tags = '';
        project.fields.forEach(function (tag) {
          var slug_tag = convertToSlug(tag);
          project_slug_tags += ' ' + slug_tag;
        });
        project_item.addClass(project_slug_tags);
        container.append(project_item);
      });
    }
  });
}
function convertToSlug(Text) {
    return Text
        .toLowerCase()
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'-')
        ;
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
  $.fn.behancePortfolio = function () {
    var el = $(this);
    behancePortfolio(el);
  }
})(jQuery);
