<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
if(count($arResult['ITEMS'])>0):
?>
<div class="list">
  <?php
    $col = 2;
    if($arParams['DETAIL_URL']=='#')
    {
      $tag = 'span';
      $rel = "rel='prettyPhoto[]'";
    }
    else
      $tag = 'a';
    foreach ($arResult['ITEMS'] as $i=>$item) {
            if($i % $col == 0) {
            if ($i != 0) echo "</div>";
            echo "<div class=\"row\">";
            if($tag=='span')
              $item['DETAIL_PAGE_URL'] = $item['PREVIEW_PICTURE']['SRC'];
        }
        ?>
            <div class="col-md-<?=12/$col?>">
              <div class="item">
                  <? if(strlen($item['PREVIEW_PICTURE']['SMALL'])>0): ?>
                    <a href='<?=$item['DETAIL_PAGE_URL']?>' <?=$rel?> style="background-image: url(<?=$item['PREVIEW_PICTURE']['SMALL']?>)" class="image"></a>
                  <? endif;?>
                  <<?=$tag?> <?=($tag=='a'?"href='".$item['DETAIL_PAGE_URL']."'":"")?> class="title"><?=$item['NAME']?></<?=$tag?>>
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
<?endif;?>