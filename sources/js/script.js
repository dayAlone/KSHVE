(function() {
  var animate, autoHeight, delay, size, vignettes;

  delay = function(ms, func) {
    return setTimeout(func, ms);
  };

  autoHeight = function(el) {
    var count, heights, i, item, items, loops, padding, step, x, _i, _ref;
    if (el.length > 0) {
      item = el.find('.item');
      padding = el.css('padding-left').split('px')[0] * 2;
      step = Math.ceil((el.width() - padding * 2) / item.width());
      count = item.length;
      loops = Math.ceil(count / step);
      i = 0;
      el.find('.item').removeAttr('style');
      while (i < count) {
        items = {};
        for (x = _i = 0, _ref = step - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; x = 0 <= _ref ? ++_i : --_i) {
          if (item[i + x]) {
            items[x] = item[i + x];
          }
        }
        heights = [];
        $.each(items, function() {
          return heights.push($(this).height());
        });
        console.log(step, heights);
        $.each(items, function() {
          return $(this).height(Math.max.apply(Math, heights));
        });
        i += step;
      }
      if (el.hasClass('one-row')) {
        return el.height(Math.max.apply(Math, heights));
      }
    }
  };

  animate = function(el, eff, act, callback, fallback) {
    if (act === 'show') {
      $(el).show();
    }
    if (fallback) {
      fallback();
    }
    return $(el).addClass('animated ' + eff).one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
      $(this).removeClass('animated ' + eff);
      if (act === 'hide') {
        $(el).hide();
      }
      if (callback) {
        return callback();
      }
    });
  };

  vignettes = function() {
    return $('.vignettes').each(function() {
      $(this).find('>.after').height($(this).height() - 12).width($(this).width() - 70);
      return $(this).find('>.before').height($(this).height() - 70).width($(this).width() - 12);
    });
  };

  size = function() {
    $('body').width($(window).width());
    if ($('body').hasClass('index')) {
      $('#mission').removeAttr('style');
      if ($('#mission').height() + $('#news').height() < $(window).height()) {
        $('#mission').height($(window).height() - $('#news').height() - 2);
      }
      $('#banner').height($('#mission').height() - $('#contacts').height());
      $('#news .item .date .after, #news .item .date .before').width(function() {
        var a, b;
        a = $(this).parent().find('.text').width();
        b = $(this).parent().width();
        return (b - a - 40) / 2;
      });
      $('#slide').height($('#banner').height() - 110);
    }
    $('#nav ul').css({
      'top': function() {
        var a, b, c, d, z;
        a = $('#nav').height();
        b = $('#nav .footer').height() + parseInt($('#nav .footer').css('bottom').split('px')[0]);
        c = $('#nav p.center').height() + parseInt($('#nav .content').css('padding-top').split('px')[0]);
        d = $('#nav ul').height();
        z = (a - b - c) / 2;
        console.log(z);
        return c + z - d / 2;
      }
    });
    $('#content > .text').css('min-height', $(window).height() - 60);
    autoHeight($('.text .news, .text .reviews, .text .list'));
    vignettes();
    $('.text .news .item:last, .text .reviews .item:last, .vignettes *').one('transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd', function() {
      return vignettes();
    });
    return true;
  };

  $(document).ready(function() {
    var x;
    $("a[rel^='prettyPhoto']").prettyPhoto({
      social_tools: "",
      deeplinking: false
    });
    $('.gallery .slider').slick({
      slidesToShow: 6,
      customPaging: 10,
      responsive: [
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 4
          }
        }, {
          breakpoint: 1280,
          settings: {
            slidesToShow: 5
          }
        }, {
          breakpoint: 1600,
          settings: {
            slidesToShow: 6
          }
        }
      ]
    });
    $('.history .triggers a').click(function(e) {
      var year;
      $(".history .item.animated").removeClass("animated, fadeInDown, fadeOutDown");
      $('.history .triggers a.active').removeClass('active');
      $(this).addClass('active');
      year = $(this).text();
      animate($(".history").find(".item.active"), 'fadeOutDown', 'hide', function() {
        $(".history").find(".item.active").removeClass('active');
        return animate($(".history .item[data-year=" + year + "]"), 'fadeInDown', 'show', false, function() {
          $(".history .item[data-year=" + year + "]").addClass("active");
          return vignettes();
        });
      });
      return e.preventDefault();
    });
    $('.stock a, #slide .arrow').click(function(e) {
      if ($('#slide').is(':hidden')) {
        animate($('#slide'), 'fadeInDownBig', 'show');
        delay(300, function() {
          $('.stock .arrow, .stock .shadow').hide();
          return $('.fotorama').data('fotorama').resize({
            height: $('#slide').height()
          });
        });
      } else {
        animate($('#slide'), 'fadeOutUpBig', 'hide');
        delay(300, function() {
          return $('.stock .arrow, .stock .shadow').show();
        });
      }
      return e.preventDefault();
    });
    $('#contacts input[type="text"]').on('focusout', function() {
      return $('#contacts').toggleClass('open');
    });
    $('#contacts a.search').click(function(e) {
      $('#contacts').toggleClass('open');
      $('#contacts input[type="text"]').focus();
      return e.preventDefault();
    });
    $('.ribbon span').arctext({
      radius: 1200
    });
    delay(300, function() {
      return size();
    });
    x = void 0;
    return $(window).resize(function() {
      clearTimeout(x);
      return x = delay(400, function() {
        return size();
      });
    });
  });

}).call(this);
