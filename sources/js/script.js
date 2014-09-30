(function() {
  var animate, autoHeight, delay, getCaptcha, init_popup, setCaptcha, size, vignettes;

  delay = function(ms, func) {
    return setTimeout(func, ms);
  };

  autoHeight = function(el) {
    var count, heights, i, item, item_padding, items, loops, padding, step, x, _i, _ref;
    if (el.length > 0) {
      item = el.find('.item');
      console.log(item.width());
      item_padding = item.css('padding-left').split('px')[0] * 2;
      padding = el.css('padding-left').split('px')[0] * 2;
      step = Math.ceil((el.width() - padding * 2) / item.width());
      count = item.length;
      loops = Math.ceil(count / step);
      i = 0;
      if (el.hasClass('news') && step > 5) {
        step = 5;
      }
      console.log(step);
      el.find('.item').removeAttr('style');
      while (i < count) {
        items = {};
        for (x = _i = 0, _ref = step - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; x = 0 <= _ref ? ++_i : --_i) {
          if (item[i + x]) {
            items[x] = item[i + x];
          }
        }
        console.log(items);
        heights = [];
        $.each(items, function() {
          return heights.push($(this).height());
        });
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
    vignettes();
    delay(100, function() {
      $('#nav ul').css({
        'top': function() {
          var a, b, c, d, pos, z;
          a = $('#nav').height();
          b = $('#nav .footer').height() + parseInt($('#nav .footer').css('bottom').split('px')[0]);
          c = $('#nav p.center').height() + parseInt($('#nav .content').css('padding-top').split('px')[0]);
          d = $('#nav ul').height();
          z = (a - b - c) / 2;
          pos = c + z - d / 2;
          if ($.cookie('nav_position') !== pos) {
            $.cookie('nav_position', pos);
          }
          return pos;
        }
      });
      $('#content > .text').css('min-height', $(window).height() - 60);
      $('.text .news .item:last, .text .reviews .item:last, .vignettes *').one('transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd', function() {
        return vignettes();
      });
      return autoHeight($('.text .news, .text .reviews, .text .list'));
    });
    return true;
  };

  init_popup = function() {
    return $("a[rel^='prettyPhoto']").prettyPhoto({
      social_tools: "",
      deeplinking: false,
      gallery_markup: ""
    });
  };

  getCaptcha = function() {
    return $.get('/include/captcha.php', function(data) {
      return setCaptcha(data);
    });
  };

  setCaptcha = function(code) {
    $('input[name=captcha_code]').val(code);
    return $('.captcha_img').attr('src', '/include/captcha.php?captcha_sid=' + code);
  };

  $(document).ready(function() {
    var x;
    init_popup();
    $(window).scroll(function() {
      return $('body.mobile #nav').css({
        top: $(window).scrollTop()
      });
    });
    $('body').addClass($.browser.platform);
    if ($.browser.mobile) {
      $('body').addClass('mobile');
    }
    $('a.show-form').click(function(e) {
      $(this).parents('.content').find('form:hidden').slideDown(function() {
        return vignettes();
      });
      return e.preventDefault();
    });
    $('.gallery .slider').slick({
      onInit: function() {
        return init_popup();
      },
      onAfterChange: function() {
        return init_popup();
      },
      slidesToShow: 6,
      infinite: false,
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
    $('#contacts a.search').click(function(e) {
      console.log($('#contacts').hasClass('open'));
      if (!$('#contacts').hasClass('open')) {
        $('#contacts').addClass('open');
        $('#contacts input[type="text"]').focus();
      } else {
        $('#contacts form').submit();
      }
      return e.preventDefault();
    });
    $('#navbar a.search').click(function(e) {
      if (!$('#navbar').hasClass('open')) {
        $('#navbar #search').width($('#navbar').width() - 60);
        $('#navbar').addClass('open');
        $('#navbar input[type="text"]').focus();
      } else {
        $('#navbar form').submit();
      }
      return e.preventDefault();
    });
    $('#Call .refresh').click(function(e) {
      getCaptcha();
      return e.preventDefault();
    });
    $(document).on('click', function(e) {
      if ($('#contacts').hasClass('open') && $(e.target).parents('#contacts').length === 0) {
        $('#contacts').removeClass('open');
      }
      if ($('#navbar').hasClass('open') && $(e.target).parents('#navbar').length === 0) {
        return $('#navbar').removeClass('open');
      }
    });
    $('input[name="phone"]').mask('+7 (000) 000 00 00');
    $('#Call form').submit(function(e) {
      var data;
      data = $(this).serialize();
      $.post('/include/form.php', data, function(data) {
        data = $.parseJSON(data);
        console.log(data);
        if (data.status === "ok") {
          $('#Call form').hide();
          return $('#Call .success').show();
        } else if (data.status === "error") {
          $('#Call input[name=captcha_word]').addClass('parsley-error');
          return getCaptcha();
        }
      });
      return e.preventDefault();
    });
    $('#Call').on('hidden.bs.modal', function() {
      $('#Call form input[type="email"],#Call form input[type="text"], #Call form textarea').removeClass('parsley-error').removeAttr("value");
      console.log(12);
      $('#Call form').trigger('reset').show();
      return $('#Call .success').hide();
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
      return x = delay(300, function() {
        return size();
      });
    });
  });

}).call(this);
