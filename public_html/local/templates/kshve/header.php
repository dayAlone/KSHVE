<!DOCTYPE html><html lang='ru'>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <title><?$APPLICATION->ShowTitle();?><?=(!$isIndex?" :: Кремлевская школа верховой езды":"")?></title>
  
  <script type="text/javascript" src="/layout/js/frontend.js"></script>
  <?php $APPLICATION->ShowHead();?>
  
  <link href="http://fonts.googleapis.com/css?family=Oranienbaum|Open+Sans:400,600|Open+Sans+Condensed:300,700&amp;subset=latin,cyrillic,cyrillic-ext" rel="stylesheet" type="text/css">
  <link href="/layout/css/frontend.css" rel="stylesheet">
</head>
<body class="<?=$APPLICATION->AddBufferContent("body_class");?>">
	<div id="panel"><?$APPLICATION->ShowPanel();?></div>
	<div id="nav" class="vignettes">
	  <div class="before"><?=svg('vensel-1-tl')?><?=svg('vensel-1-tr')?><?=svg('vensel-1-bl')?><?=svg('vensel-1-br')?></div><div class="after"></div>
	  <div class="content">
	    <p class="center">
	    	<a href="/" class="logo">
	    		<?=svg('logo')?>
	    	</a><br>
	    	<span class="vensel">
	    		<?=svg('vensel-3')?>
	    	</span>
	    </p>
	    <?php
		    $APPLICATION->IncludeComponent("bitrix:menu", "nav", 
		    array(
		        "ALLOW_MULTI_SELECT" => "Y",
		        "MENU_CACHE_TYPE"    => "A",
		        "ROOT_MENU_TYPE"     => "left",
		        "MAX_LEVEL"          => "1",
		        "USE_EXT"            => "Y",
		        ),
		    false);
		?>
	    <div class="footer">
	      <p class="center">
	      	<span class="vensel">
	      		<?=svg('vensel-3')?>
	      	</span>
	      </p>
	      <div class="address">Московская область, <br>Красногорский район, <br>Путилковское шоссе, строение 4</div>
	      <div class="social">
			<?php
			    $APPLICATION->IncludeComponent("bitrix:menu", "social", 
			    array(
			        "ALLOW_MULTI_SELECT" => "Y",
			        "MENU_CACHE_TYPE"    => "A",
			        "ROOT_MENU_TYPE"     => "social",
			        "MAX_LEVEL"          => "1",
			        "USE_EXT"            => "Y",
			        ),
			    false);
			?>
	      </div>
	      <div class="copyright">
	        <p>© <?=date('Y')?> Кремлевская школа верховой езды</p>
	        <p>Конный клуб и детская конно спортивная школа в Москве. Обучение верховой езде в Москве.</p>
	      </div>
	      <p class="center"><a href="http://radia.ru" target="_blank" class="radia"><?=svg('radia')?><span>создание сайта <br>radia interactive</span></a></p>
	    </div>
	  </div>
	</div>
	<div id="navbar">
		<div class="row">
			<div class="col-xs-2">
				<a href="/" class="logo"><?=svg('logo-2')?></a>
			</div>
			<div class="col-xs-3">
				<span class="contacts">
					Тел./факс: <a href="tel:84956170444">+7 (495) 617-04-44</a><br>
					E-mail: <a href="mailto:info@kremlin-ksk.ru">info@kremlin-ksk.ru</a>
				</span>
			</div>
			<div class="col-xs-2">
				<a data-toggle="modal" data-target="#Call" class="call">перезвоните мне</a>
			</div>
			<div class="col-xs-3 center">
				<div class="social">
					<?php
					    $APPLICATION->IncludeComponent("bitrix:menu", "social", 
					    array(
					        "ALLOW_MULTI_SELECT" => "Y",
					        "MENU_CACHE_TYPE"    => "A",
					        "ROOT_MENU_TYPE"     => "social",
					        "MAX_LEVEL"          => "1",
					        "USE_EXT"            => "Y",
					        ),
					    false);
					?>
			      </div>
			</div>
			<a data-toggle="modal" data-target="#NavPopup" class="nav"><?=svg('nav')?></a>
			<a href="#" class="search"><?=svg('search')?></a>

			
		</div>
		<div id="search">
			<form action="/search/">
				<input type="text" value="<?=$_REQUEST['q']?>" name="q">
			</form>
		</div>
	</div>
	<div id="content">
		
		<?if(!$isIndex):?>
			<? require($_SERVER['DOCUMENT_ROOT'].'/include/contacts.php') ?>
			<div class="text vignettes">
			<div class="before"><?=svg('vensel-1-tl')?><?=svg('vensel-1-tr')?><?=svg('vensel-1-bl')?><?=svg('vensel-1-br')?></div><div class="after"></div>
			<div class="content no-bottom-padding">
      			<h1 class="center"><?
      			if($APPLICATION->GetDirProperty("section_title"))
      				echo $APPLICATION->GetDirProperty("section_title");
      			else
      				$APPLICATION->ShowTitle();
      			?></h1>
    		</div>
    		<?php
			    $APPLICATION->IncludeComponent("bitrix:menu", "top", 
			    array(
			        "ALLOW_MULTI_SELECT" => "Y",
			        "MENU_CACHE_TYPE"    => "A",
			        "ROOT_MENU_TYPE"     => "top",
			        "MAX_LEVEL"          => "2",
			        "USE_EXT"            => "Y",
			        ),
			    false);
			?>
    			<div class="content">
		<?endif;?>
		