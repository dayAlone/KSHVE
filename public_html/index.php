<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Кремлевская школа верховой езды");
$APPLICATION->SetPageProperty('body_class', "index");
?>
  <div class="row">
    <div class="col-md-4 col-xs-4">
      <div id="mission" class="vignettes">
        <div class="before"><?=svg('vensel-1-tl')?><?=svg('vensel-1-tr')?><?=svg('vensel-1-bl')?><?=svg('vensel-1-br')?></div><div class="after"></div>
        <div class="content">
          <p class="center"><span class="ribbon"></span><span class="vensel2"><?=svg('vensel-2')?></span></p>
          <h2 class="center">Миссия «Кремлевской школы верховой езды» - Культура и традиции верховой езды на благо людям.</h2>
          <p>Конноспортивный клуб «Кремлевская школа верховой езды» был создан в ноябре 2006 года. В число учредителей входит Федеральная служба охраны Российской Федерации. Деятельность Школы базируется на принципах любви к Родине, укрепления семейных ценностей и популяризации здорового образа жизни, активного отдыха, воспитания в детях любви к животным и природе. </p>
          <p>КШВЕ как совместный проект государства и частного бизнеса - пример взаимодействия государства и общества на благо возрождения традиций российской государственности. «Кремлевская школа верховой езды» - это гармоничное сочетание культуры верховой езды, творчества и общения. Это удивительно теплая, позитивная, открытая и дружелюбная атмосфера. Здесь ценят, дорожат и бережно хранят традиции искусства верховой езды, приумножая и питая их своей энергией созидания.</p>
          <p class="center"><span class="vensel"><?=svg('vensel-3')?></span></p>
        </div>
      </div>
    </div>
    <div class="col-md-8 col-xs-8">
      <? require($_SERVER['DOCUMENT_ROOT'].'/include/contacts.php') ?>
      <div id="banner">
        <div class="stock">
        	<a href="#" class="arrow">
				<?=svg('stock-arrow')?>
			</a>
			<a href="#" class="content">
        		<span class="before">
        			<?=svg('vensel-4')?>
        		</span>
        		</span>Специальные предложения
        		<span class="after">
        			<?=svg('vensel-5')?>
        		</span>
        	</a>
          <div class="shadow"></div>
        </div>
        <div id="slide">
        	<a href="#" class="arrow">
        		<?=svg('stock-arrow')?>
        	</a>
        	<?$APPLICATION->IncludeComponent("radia:resp_slider", ".default", array(
      			"IBLOCK_TYPE" => "-",
      			"IBLOCK_ID" => "3",
      			"ENABLE_JQUERY" => "N",
      			"MY_DATA" => "",
      			"SIZES_HEIGHT" => "100%",
      			"SIZES_WIDTH" => "100%",
      			"EFFECT_SPEED" => "600",
      			"BACKGROUND_COLOR" => "#000000",
      			"DARK_COLOR" => "#000000",
      			"BRIGHT_COLOR" => "#FFFFFF",
      			"BUTTON_COLOR" => "#2823d4",
      			"DOTS_SHOW" => "N",
      			"ARROWS_SHOW" => "Y",
      			"ARROWS_TYPE" => "small",
      			"ARROWS_PREVIEW_SHOW" => "N",
      			"EFFECT_TYPE" => "slide",
      			"SLIDE_AUTOPLAY" => "N",
      			"CACHE_TYPE" => "A",
      			"CACHE_TIME" => "36000000"
      			),
      			false
      		);?>
        </div>
        <img src="/layout/images/collage.png" id="img">
        <div class="partners">
          <div class="row">
            <div class="col-md-2 col-xs-2">
              <div class="title">Наши<br>партнеры</div>
            </div>
            <div class="col-md-10 col-xs-10">
            	<?php
                global $partners_filter;
                $partners_filter = array("!PROPERTY_INDEX"=>false);
			          $APPLICATION->IncludeComponent("bitrix:news.list", "partners", 
			          array(
			          "IBLOCK_ID"            => 2,
			          "NEWS_COUNT"           => "0",
			          "SORT_BY1"             => "SORT",
			          "SORT_ORDER1"          => "ASC",
                "FILTER_NAME"          => "partners_filter",
			          "PROPERTY_CODE"        => Array("LINK", "LOGO"),
			          "DETAIL_URL"           => "#",
			          "CACHE_TYPE"           => "A",
			          "DISPLAY_PANEL"        => "N",
			          "DISPLAY_TOP_PAGER"    => "N",
			          "DISPLAY_BOTTOM_PAGER" => "N",
			          "SET_TITLE"            => "N"
			             ),
			             false
			          );
			      ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="news" class="vignettes">
    <div class="before"><?=svg('vensel-1-tl')?><?=svg('vensel-1-tr')?><?=svg('vensel-1-bl')?><?=svg('vensel-1-br')?></div><div class="after"></div>
    <div class="after"></div>
    <div class="content">
      <?php
      	  global $news_filter;
      	  $news_filter = array(
				"<=PROPERTY_DATE" => date('Y-m-d')." 23:59:59"
		  );
          $APPLICATION->IncludeComponent("bitrix:news.list", "news_index", 
          array(
          "IBLOCK_ID"            => 1,
          "NEWS_COUNT"           => "3",
          "SORT_BY1"             => "PROPERTY_DATE",
          "SORT_ORDER1"          => "DESC",
          "FILTER_NAME"          => "news_filter",
          "PROPERTY_CODE"        => Array("DATE"),
          "DETAIL_URL"           => "/about/news/#CODE#/",
          "CACHE_TYPE"           => "A",
          "DISPLAY_PANEL"        => "N",
          "DISPLAY_TOP_PAGER"    => "N",
          "DISPLAY_BOTTOM_PAGER" => "N",
          "SET_TITLE"            => "N"
             ),
             false
          );
      ?>
    </div>
    <a href="/about/news/" class="more"><span class="text"><span class="before"><?=svg('vensel-4')?></span>К другим новостям<span class="after"><?=svg('vensel-5')?></span></span></a>
  </div>
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>