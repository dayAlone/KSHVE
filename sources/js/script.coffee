delay = (ms, func) -> setTimeout func, ms

autoHeight = (el) ->
	if el.length > 0
		item    = el.find('.item')
		padding = el.css('padding-left').split('px')[0]*2
		step    = Math.ceil((el.width()-padding*2)/item.width())
		count   = item.length
		loops   = Math.ceil(count/step)
		i       = 0
		
		el.find('.item').removeAttr 'style'

		while i < count
			items = {}
			for x in [0..step-1]
				items[x] = item[i+x] if item[i+x]
				
			heights = []
			$.each items, ()->
				heights.push($(this).height())

			console.log step, heights
			
			$.each items, ()->
				$(this).height Math.max.apply(Math,heights)
			
			i += step

		if el.hasClass 'one-row'
			el.height Math.max.apply(Math,heights)

animate = (el, eff, act, callback, fallback)->
	if act == 'show'
		$(el).show()

	fallback() if fallback

	$(el).addClass('animated '+eff).one 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', ()->
		$(this).removeClass('animated '+eff);
		if act == 'hide'
			$(el).hide()
		callback() if callback

vignettes = ()->
	$('.vignettes').each ()->
		$(this).find('>.after')
			.height($(this).height()-12)
			.width($(this).width()-70)
		$(this).find('>.before')
			.height($(this).height()-70)
			.width($(this).width()-12)

size = ()->
	$('body').width($(window).width())
	
	if $('body').hasClass 'index'
		$('#mission').removeAttr 'style'
		$('#mission').height($(window).height()-$('#news').height()-2) if $('#mission').height() + $('#news').height() < $(window).height()
		$('#banner').height($('#mission').height()-$('#contacts').height())
		$('#news .item .date .after, #news .item .date .before').width ()->
			a = $(this).parent().find('.text').width()
			b = $(this).parent().width()
			return (b-a-40)/2
		$('#slide').height($('#banner').height()-110)

	$('#nav ul').css
		'top' : ()->
			a = $('#nav').height()
			b = $('#nav .footer').height() + parseInt($('#nav .footer').css('bottom').split('px')[0])
			c = $('#nav p.center').height() + parseInt($('#nav .content').css('padding-top').split('px')[0])
			d = $('#nav ul').height()
			z = (a - b - c)/2
			pos = c + z - d/2
			if $.cookie('nav_position') != pos
				$.cookie('nav_position', pos);
			return pos

	$('#content > .text').css 'min-height', $(window).height()-60

	autoHeight($('.text .news, .text .reviews, .text .list'))

	vignettes()

	$('.text .news .item:last, .text .reviews .item:last, .vignettes *').one 'transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd', ()->
		vignettes()

	return true

init_popup = ()->
	$("a[rel^='prettyPhoto']").prettyPhoto
		social_tools: ""
		deeplinking: false
		gallery_markup: ""

$(document).ready ->

	init_popup()

	$('.gallery .slider').slick
		onInit: ()->
			init_popup()
		onAfterChange: ()->
			init_popup()
		slidesToShow: 6
		customPaging: 10
		responsive: [{
			breakpoint: 768,
			settings:{
					slidesToShow: 4
				}
			},
			{
				breakpoint: 1280,
				settings:{
					slidesToShow: 5
				}
			},
			{
				breakpoint: 1600,
				settings:{
					slidesToShow: 6
			}
		}]

	$('.history .triggers a').click (e)->
		$(".history .item.animated").removeClass "animated, fadeInDown, fadeOutDown"
		$('.history .triggers a.active').removeClass 'active'
		$(this).addClass 'active'
		year = $(this).text()
		animate $(".history").find(".item.active"), 'fadeOutDown','hide', ()->
			$(".history").find(".item.active").removeClass 'active'
			animate $(".history .item[data-year=#{year}]"), 'fadeInDown','show', false, ()->
				$(".history .item[data-year=#{year}]").addClass "active"
				vignettes()
			
			
		e.preventDefault()

	$('.stock a, #slide .arrow').click (e)->
		if($('#slide').is(':hidden'))
			animate $('#slide'), 'fadeInDownBig', 'show'
			delay 300, ()->
				$('.stock .arrow, .stock .shadow').hide()
				$('.fotorama').data('fotorama').resize
 					height: $('#slide').height()
		else
			animate $('#slide'), 'fadeOutUpBig', 'hide'
			delay 300, ()->
				$('.stock .arrow, .stock .shadow').show()
		e.preventDefault()

	$('#contacts input[type="text"]').on 'focusout', ()->
		$('#contacts').toggleClass('open')

	$('#contacts a.search').click (e)->
		$('#contacts').toggleClass('open')
		$('#contacts input[type="text"]').focus()
		e.preventDefault()

	$('.ribbon span').arctext
		radius: 1200


	delay 300, ()->
		size()

	x = undefined
	$(window).resize ->
		clearTimeout(x)
		x = delay 400, ()->
			size()
   
