<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
$APPLICATION->SetPageProperty('line', "false");
?>
<div class="list">
  <?php
    $col = 2;
    if($arParams['DETAIL_URL']=='#')
      $tag = 'span';
    else
      $tag = 'a';
    foreach ($arResult['ITEMS'] as $i=>$item) {
            if($i % $col == 0) {
            if ($i != 0) echo "</div>";
            echo "<div class=\"row\">";
        }
        ?>
            <div class="col-md-<?=12/$col?>">
              <div class="item">
                  <<?=$tag?> style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>)" class="image"></<?=$tag?>>
                  <<?=$tag?> class="title"><?=$item['NAME']?></<?=$tag?>>
                  <p><?=$item['PREVIEW_TEXT']?></p>
              </div>
            </div>
        <?
    }
  ?>
  </div>
</div>
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
  <?=$arResult["NAV_STRING"]?>
<?endif;?>