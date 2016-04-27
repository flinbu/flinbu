function fullSize(el) {
  var window_width = $(window).width(),
      window_height = $(window).height();
  if (!$('body').hasClass('mobile')) {
    el.height(window_height);
  } else if (el.hasClass('main')) {
    el.height(window_height);
  }
}
function fullSizeMin(el) {
  var window_width = $(window).width(),
      window_height = $(window).height();
  if (!$('body').hasClass('mobile')) {
    el.css('min-height', window_height + 'px');
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
      project_tpl = $(el.data('tpl')).html(),
      page = 1;
  page_portfolio(page, api_key, api_user, project_tpl, el);
  var nav_prev = el.parent().parent().find('.behance-nav-prev'),
      nav_next = el.parent().parent().find('.behance-nav-next');
  nav_prev.hide();
  nav_prev.attr('current-page', page);
  nav_next.attr('current-page', page);
  nav_next.click(function(e) {
    e.preventDefault();
    var current_page = parseInt($(this).attr('current-page')),
        next_page = current_page + 1;
    $(this).attr('current-page', next_page);
    nav_prev.attr('current-page', next_page);
    if (next_page > 1) {
      nav_prev.fadeIn();
    }
    page_portfolio(next_page, api_key, api_user, project_tpl, el);
  });
  nav_prev.click(function(e) {
    e.preventDefault();
    var current_page = parseInt($(this).attr('current-page')),
        next_page = current_page - 1;
    $(this).attr('current-page', next_page);
    nav_next.attr('current-page', next_page);
    if (next_page == 1) {
      nav_prev.fadeOut();
    }
    page_portfolio(next_page, api_key, api_user, project_tpl, el);
  });
}
function page_portfolio(page, key, user, tpl, container) {
  var api_url = 'http://www.behance.net/v2/users/{user}/projects',
      nav_prev = container.parent().parent().find('.behance-nav-prev'),
      nav_next = container.parent().parent().find('.behance-nav-next'),
      container_height = 'auto';
  if (page == 2) {
    container_height = container.height();
    container.height(container_height);
  }
  container.find('article').removeClass('in');
  nav_prev.prop('disabled', true);
  nav_next.prop('disabled', true);
  setTimeout(function() {
    $.ajax({
      url : api_url.replace('{user}', user),
      data : {
        api_key : key,
        page : page,
        per_page : 9
      },
      dataType : 'jsonp',
      success : function (data) {
        if (data.projects.length < 9) {
          nav_next.fadeOut();
        } else {
          nav_next.fadeIn();
        }
        container.html('');
        data.projects.forEach(function (project) {
          var project_img = (project.covers['404']) ? project.covers[404] : project.covers['202'];
          var project_html = tpl.replace(/{title}/gi, project.name).replace(/{image}/gi, project_img).replace(/{url}/gi, project.url),
              project_item = $(project_html),
              project_slug_tags = '';
          project.fields.forEach(function (tag) {
            var slug_tag = convertToSlug(tag);
            project_slug_tags += ' ' + slug_tag;
          });
          project_item.addClass(project_slug_tags);
          container.append(project_item);
          project_item.find('img').load(function() {
            var rand = Math.floor(Math.random() * 800) + 100;
            setTimeout(function() {
              project_item.addClass('in');
            }, rand);
          });
        });
        nav_prev.prop('disabled', false);
        nav_next.prop('disabled', false);
      }
    });
  }, 500);
}
function convertToSlug(Text) {
    return Text
        .toLowerCase()
        .replace(/[^\w ]+/g,'')
        .replace(/ +/g,'-');
}

function asyncBackground (el) {
  var background_full = el.data('background'),
      img = $('<img>').attr({
        'src' : background_full,
        'class' : 'hidden'
      });
  img.load(function() {
    el.attr({
      'style' : 'background-image: url(' + img.attr('src') + ');'
    }).find('.temp-background').fadeOut(function() {
      $(this).remove();
    });
    img.remove();
    el.addClass('active parallax').parallax();
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
  $.fn.fullSizeMin = function() {
    var el = $(this);
    fullSizeMin(el);
    $(window).resize(function() {
      fullSizeMin(el);
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
  $.fn.asyncBackground = function () {
    var el = $(this);
    setTimeout(function() {
      asyncBackground(el);
    }, 1000);
  }
})(jQuery);
