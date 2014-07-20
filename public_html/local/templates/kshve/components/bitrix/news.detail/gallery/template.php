<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="gallery">
    <p class="center"><?=svg('ribbon2')?></p>
    <div class="slider">
        <? foreach ($arResult['IMAGES'] as $img):?>
            <div class="item">
                <a href="<?=$img['value']?>" rel="prettyPhoto[]" style="background-image: url(<?=$img['small']?>)" class="image">
                </a>
            </div>
        <? endforeach;?>
    </div>
</div>
